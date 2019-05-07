<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Menu;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public $successStatus = 200;
    public function show(Request $request)
    {
        $id = $request->id_resto;
        $menu = Menu::where('id_resto', $id)->where('deleted', 0)->get();
        if ($menu->isEmpty()) {
            return response()->json(['status'=>'success','data'=>'Maaf Anda Belum Memiliki Menu'], 404);
        } else {
            foreach ($menu as $key => $value) {
                $data['id']=$value->id;
                $data['id_resto']=$value->id_resto;
                $data['nama_menu']=$value->nama_menu;
                $data['harga']=$value->harga;
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
                $data['status']=$value->status;
                $data['rating']=$value->rating;
                $data1[] = $data;
            }
            return response()->json(['status'=>'success','data'=>$data1], 200);
        }
    }

    // menyimpan data
    public function create(request $request)
    {
        $input = $request->all();

        //upload foto
        if ($request->hasFile('gambar_menu')) {
            $foto = $request->file('gambar_menu');
            $ext = $foto->getClientOriginalExtension();

            if ($request->file('gambar_menu')->isValid()) {
                $foto_name = date('YmdHis').".$ext";
                $upload_path = 'fotomenu';
                $request->file('gambar_menu')->move($upload_path, $foto_name);
                $input['gambar_menu'] = $foto_name;
            }
        }

        $data = Menu::create($input);

        return response()->json(['success'=>'Menu Anda Berhasil Di Tambahkan'], $this->successStatus);
    }

    public function update(request $request)
    {
        $id= $request->id;
        $menu = Menu::find($id);
        if (empty($menu)) {
            return response()->json(['error'=>'Menu Anda Tidak Ditemukan'], $this->successStatus);
        } else {
            $input = $request->all();
            if ($request->hasFile('gambar_menu')) {
                $foto = $request->file('gambar_menu');
                $ext = $foto->getClientOriginalExtension();

                if ($request->file('gambar_menu')->isValid()) {
                    $foto_name = date('YmdHis').".$ext";
                    $upload_path = 'fotomenu';
                    $request->file('gambar_menu')->move($upload_path, $foto_name);
                    $input['gambar_menu'] = $foto_name;
                    $image_path = "fotomenu/".$menu->gambar_resto;  // Value is not URL but directory file path
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }
            $menu->update($input);
            return response()->json(['success'=>'Menu Anda Berhasil Di Perbaharui'], $this->successStatus);
        }
    }

    // delete
    public function delete(Request $request)
    {
        $id= $request->id_menu;
        $menu = Menu::find($id);
        $menu->deleted = 1;
        $menu->save();


        return response()->json(['success'=>'Menu Anda Berhasil Di Hapus'], $this->successStatus);
    }

    public function setStatus(Request $request)
    {
        $id= $request->id_menu;
        $menu = Menu::find($id);
        $menu->status = $request->status;
        $menu->save();

        return response()->json(['success'=>'Status Menu Berubah'], $this->successStatus);
    }

    public function getSingleMenu(Request $request)
    {
        $id = $request->id_menu;
        // $menu = Menu::where('id',$id)->where('deleted', 0)->get();
        $menu = DB::table('menus')
                ->join('restos', 'menus.id_resto', '=', 'restos.id')
                ->select('restos.nama', 'menus.*')
                ->where('menus.id', $id)
                ->where('menus.deleted', '0')
                ->where('restos.deleted', '0')
                ->get();

        if ($menu->isEmpty()) {
            return response()->json(['error'=>'Menu Tidak ditemukan'], 404);
        } else {
            return response()->json(['status'=>'success','data'=>$menu], 200);
        }
    }
}
