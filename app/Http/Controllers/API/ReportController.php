<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Report;
use App\Http\Controllers\Controller;
use App\User;
use App\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notifications\SuspendedMenu;
use App\Notifications\DissuspendedMenu;
use Illuminate\Support\Facades\Notification;

class ReportController extends Controller
{
    public function sendReport(Request $request)
    {
        $user=User::find(Auth::guard('api')->id());
        $input['id_user']=$user->id;
        $input['id_menu']=$request->id_menu;
        $input['comment']=$request->comment;
        Report::create($input);
        return response()->json(['success'=>'Laporan Anda Telah ditambahkan'], 200);
    }

    public function getReport()
    {
        $reported = DB::table('reports')
              ->join('menus', 'reports.id_menu', '=', 'menus.id')
              ->select('reports.id_menu', 'menus.nama_menu', 'menus.gambar_menu',  'menus.menu_deskripsi',  'menus.rating', 'menus.harga', 'menus.suspend')
              ->groupBy('reports.id_menu', 'menus.nama_menu', 'menus.gambar_menu',  'menus.menu_deskripsi',  'menus.rating', 'menus.harga', 'menus.suspend')
              ->get();

        // $reported = $report->groupBy('menus.id');

        if ($reported->isEmpty()) {
            return response()->json(['status'=>'success','data'=>'Tidak Ada Laporan Terhadap Menu'], 404);
        } else {
            foreach ($reported as $key => $value) {
                $data['id_menu']=$value->id_menu;
                $data['nama_menu']=$value->nama_menu;
                // $data['harga']=$value->harga;
                if (empty($value->gambar_menu)) {
                    $data['gambar_menu']='0';
                } else {
                    $data['gambar_menu']='http://192.168.43.71/slc/public/fotomenu/'.$value->gambar_menu;
                }
                if (empty($value->menu_deskripsi)) {
                    $data['menu_deskripsi']='0';
                } else {
                    $data['menu_deskripsi']=$value->menu_deskripsi;
                }
                $data['rating']=$value->rating;
                $data['suspend']=$value->suspend;
                $data['harga']=$value->harga;
                $data1[] = $data;
            }
            return response()->json(['status'=>'success','data'=>$data1], 200);
        }
    }

    public function getReportedComment(Request $request)
    {
      $user = DB::table('reports')
            ->join('users', 'reports.id_user', '=', 'users.id')
            ->select('users.name', 'reports.*')
            ->where('reports.id_menu', $request->id_menu)
            ->get();
      if ($user->isEmpty()) {
        return response()->json(['status'=>'success','data'=>'Tidak Ada Laporan Terhadap Menu'], 404);
      }else{
        return response()->json(['status'=>'success','data'=>$user], 200);
      }
    }

    public function suspend(Request $request)
    {
      $menu = DB::table('menus')
            ->join('restos', 'menus.id_resto', '=', 'restos.id')
            ->select('restos.id_inputer', 'restos.id','restos.nama', 'menus.nama_menu')
            ->where('menus.id', $request->id_menu)
            ->first();


      $pemilik = User::where('id', $menu->id_inputer)->first();

            if ($request->suspend == 1) {
              $pemilik->notify(new SuspendedMenu($menu->nama_menu, $menu->nama));
              $menu_suspend = Menu::find($request->id_menu);
              $menu_suspend->suspend = 1;
              $menu_suspend->save();
                return response()->json(['status'=>'success','data'=>'Menu Telah Di Suspend'], 200);
            } else {
              $pemilik->notify(new DissuspendedMenu($menu->nama_menu, $menu->nama));
              $menu_suspend = Menu::find($request->id_menu);
              $menu_suspend->suspend = 0;
              $menu_suspend->save();
                return response()->json(['status'=>'success','data'=>'Menu Telah Di Dissuspend'], 200);
            }
    }
}
