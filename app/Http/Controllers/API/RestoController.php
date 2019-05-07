<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\User;
use App\OauthAccessToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Resto;
use Illuminate\Support\Facades\DB;
use File;

class RestoController extends Controller
{
    public $successStatus = 200;
    // menampilkan semua data
    public function index()
    {
        $resto =  Resto::all();
        return response()->json(['status'=>'success','data'=>$resto]);
    }

    public function show()
    {
        $user=User::find(Auth::guard('api')->id());
        $resto = Resto::where('id_inputer', $user->id)
                ->where('deleted', 0)
                ->get();
        if ($resto->isEmpty()) {
            return response()->json(['status'=>'error','data'=>'Maaf Anda Tidak Memiliki Restoran'], 404);
        } else {
            foreach ($resto as $key => $value) {
                $data['id']=$value->id;
                $data['id_inputer']=$value->id_inputer;
                $data['nama']=$value->nama;
                $data['lat']=$value->lat;
                $data['lng']=$value->lng;
                if (empty($value->gambar_resto)) {
                    $data['gambar_resto']='0';
                } else {
                    $data['gambar_resto']='http://192.168.43.71/slc/public/fotorestoran/'.$value->gambar_resto;
                }
                $data['alamat']=$value->alamat;
                $data['status']=$value->status;
                $data1[] = $data;
            }
            return response()->json(['status'=>'success','data'=>$data1]);
        }
    }

    public function recommend(request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        $req_jarak = $request->req_jarak;
        $req_nama = $request->req_nama;
        $row = $request->row;
        $harga = $request->harga;

        if (!empty($lat)||!empty($lng)) {
            $recom = DB::select("SELECT id_menu, id_resto, lat_resto, lng_resto, nama_resto, nama_menu, distance, harga_menu, gambar_menu, alamat, status, rating, menu_deskripsi
        From (SELECT restos.id as id_resto, menus.gambar_menu as gambar_menu, menus.status as status, restos.alamat as alamat, menus.rating as rating, menus.menu_deskripsi as menu_deskripsi,menus.suspend as suspend,
          restos.nama as nama_resto,menus.id as id_menu, menus.nama_menu as nama_menu, restos.status as resto_status,restos.deleted as resto_deleted, menus.deleted as deleted,
          menus.harga as harga_menu, restos.lat as lat_resto, restos.lng as lng_resto, Round((6371000 * acos (cos (radians(".$lat."))*
          cos(radians(lat))* cos( radians(".$lng.") - radians(lng) )+ sin (radians(".$lat.") )*
          sin(radians(lat)))),2) AS distance FROM restos INNER JOIN menus ON restos.id = menus.id_resto
          ORDER BY menus.harga ASC, distance ASC) AS InnerQuery WHERE distance <= ".$req_jarak."  AND status='1' AND resto_status='1'
          AND resto_deleted='0' AND deleted='0' AND suspend='0'
          AND harga_menu <= ".$harga." AND (nama_menu LIKE '%".$req_nama."%' OR menu_deskripsi LIKE '%".$req_nama."%')
          ORDER BY distance ASC, harga_menu ASC LIMIT ".$row);
            if (sizeof($recom)==0) {
                return response()->json(['status'=>'error','data'=>'Maaf, Restoran yang sesuai dengan Kriteria Anda Tidak Tersedia'], 404);
            } else {
                foreach ($recom as $key => $value) {
                    $data['id_menu']=$value->id_menu;
                    $data['id_resto']=$value->id_resto;
                    $data['lat_resto']=$value->lat_resto;
                    $data['lng_resto']=$value->lng_resto;
                    $data['nama_resto']=$value->nama_resto;
                    $data['alamat']=$value->alamat;
                    $data['nama_menu']=$value->nama_menu;
                    $data['distance']=$value->distance;
                    $data['harga_menu']=$value->harga_menu;
                    if (empty($value->menu_deskripsi)) {
                        $data['menu_deskripsi']='0';
                    } else {
                        $data['menu_deskripsi']=$value->menu_deskripsi;
                    }
                    if (empty($value->gambar_menu)) {
                        $data['gambar_menu']='0';
                    } else {
                        $data['gambar_menu']='http://192.168.43.71/slc/public/fotomenu/'.$value->gambar_menu;
                    }
                    $data['status']=$value->status;
                    $data['rating']=$value->rating;
                    $data1[] = $data;
                }
                return response()->json(['status'=>'success','data'=>$data1]);
            }
        } else {
            return response()->json(['status'=>'error', 'data'=>'Kriteria Kurang'],404);
        }
    }

    // menyimpan data
    public function create(request $request)
    {
        $input = $request->all();
        //upload foto
        if ($request->hasFile('gambar_resto')) {
            $foto = $request->file('gambar_resto');
            $ext = $foto->getClientOriginalExtension();

            if ($request->file('gambar_resto')->isValid()) {
                $foto_name = date('YmdHis').".$ext";
                $upload_path = 'fotorestoran';
                $request->file('gambar_resto')->move($upload_path, $foto_name);
                $input['gambar_resto'] = $foto_name;
            }
        }

        $data = Resto::create($input);

        return response()->json(['success'=>'Restoran Anda Berhasil Di Tambahkan'], $this->successStatus);
    }

    // mengupdate Data
    public function update(request $request)
    {
        $id= $request->id;
        $resto = Resto::find($id);
        if (empty($resto)) {
            return response()->json(['error'=>'Restoran Anda Tidak Ditemukan'], 404);
        } else {
            $input = $request->all();
            if ($request->hasFile('gambar_resto')) {
                $foto = $request->file('gambar_resto');
                $ext = $foto->getClientOriginalExtension();

                if ($request->file('gambar_resto')->isValid()) {
                    $foto_name = date('YmdHis').".$ext";
                    $upload_path = 'fotorestoran';
                    $request->file('gambar_resto')->move($upload_path, $foto_name);
                    $input['gambar_resto'] = $foto_name;
                    $image_path = "fotorestoran/".$resto->gambar_resto;  // Value is not URL but directory file path
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }
            $resto->update($input);
            return response()->json(['success'=>'Restoran Anda Berhasil Di Perbaharui'], $this->successStatus);
        }
    }

    // delete
    public function delete(Request $request)
    {
        $id= $request->id_resto;
        $resto = Resto::find($id);
        $resto->deleted = 1;
        $resto->save();


        return response()->json(['success'=>'Restoran Anda Berhasil Di Hapus'], $this->successStatus);
    }

    public function setStatus(Request $request)
    {
        $id= $request->id_resto;
        $resto = Resto::find($id);
        $resto->status = $request->status;
        $resto->save();

        return response()->json(['success'=>'Status Resto Berubah'], $this->successStatus);
    }
}
