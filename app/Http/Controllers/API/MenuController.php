<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Menu;
use App\Promo;
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
                    $data['gambar_menu']= url('/').'/fotomenu/'.$value->gambar_menu;
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
                    $image_path = "fotomenu/".$menu->gambar_menu;  // Value is not URL but directory file path
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
    
    public function addPromo(Request $request)
    {
        $input = $request->all();

        //upload foto
        if ($request->hasFile('gambar')) {
            $foto = $request->file('gambar');
            $ext = $foto->getClientOriginalExtension();

            if ($request->file('gambar')->isValid()) {
                $foto_name = date('YmdHis').".$ext";
                $upload_path = 'fotopromo';
                $request->file('gambar')->move($upload_path, $foto_name);
                $input['gambar'] = $foto_name;
            }
        }

        $data = Promo::create($input);

        return response()->json(['success'=>'Promo Anda Berhasil Di Tambahkan'], $this->successStatus);
    }

    public function updatePromo(Request $request)
    {
        $id= $request->id;
        $promo = Promo::find($id);
        if (empty($promo)) {
            return response()->json(['error'=>'Promo Anda Tidak Ditemukan'], $this->successStatus);
        } else {
            $input = $request->all();
            if ($request->hasFile('gambar')) {
                $foto = $request->file('gambar');
                $ext = $foto->getClientOriginalExtension();

                if ($request->file('gambar')->isValid()) {
                    $foto_name = date('YmdHis').".$ext";
                    $upload_path = 'fotopromo';
                    $request->file('gambar')->move($upload_path, $foto_name);
                    $input['gambar'] = $foto_name;
                    $image_path = "fotopromo/".$promo->gambar;  // Value is not URL but directory file path
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }
            $promo->update($input);
            return response()->json(['success'=>'Promo Anda Berhasil Di Perbaharui'], $this->successStatus);
        }
    }

    public function deletePromo(Request $request)
    {
        $id= $request->id_promo;
        $menu = Promo::find($id);
        $menu->deleted = 1;
        $menu->save();


        return response()->json(['success'=>'Promo Anda Berhasil Di Hapus'], $this->successStatus);
    }

    public function getPromo(Request $request)
    {
        $lat = $request->lat;
        $lng = $request->lng;
        $req_jarak = $request->req_jarak;
        $req_nama = $request->req_nama;
        $row = $request->row;
        $harga = $request->harga;

        if (!empty($lat)||!empty($lng)) {
            $recom = DB::select("SELECT id_menu, id_resto, lat_resto, lng_resto, nama_resto, nama_menu, distance, harga_menu, phone, gambar_menu, alamat, status, rating, menu_deskripsi, gambar_resto, id_promo, keterangan_promo, gambar_promo, harga_promo, mulai_promo, batas_promo, promo_deleted From (SELECT restos.id as id_resto, menus.gambar_menu as gambar_menu, promos.id as id_promo, promos.gambar as gambar_promo, promos.keterangan as keterangan_promo, promos.harga as harga_promo, promos.mulai as mulai_promo, promos.batas as batas_promo, promos.deleted as promo_deleted, restos.gambar_resto as gambar_resto, menus.status as status, restos.alamat as alamat, menus.rating as rating, menus.menu_deskripsi as menu_deskripsi,menus.suspend as suspend, restos.nama as nama_resto,menus.id as id_menu, menus.nama_menu as nama_menu, restos.phone as phone,restos.status as resto_status,restos.deleted as resto_deleted, menus.deleted as deleted, menus.harga as harga_menu, restos.lat as lat_resto, restos.lng as lng_resto, Round((6371000 * acos (cos (radians(".$lat."))*cos(radians(lat))* cos( radians(".$lng.") - radians(lng) )+ sin (radians(".$lat.") )* sin(radians(lat)))),2) AS distance FROM restos INNER JOIN menus ON restos.id = menus.id_resto INNER JOIN promos ON menus.id = promos.id_menu ORDER BY menus.harga ASC, distance ASC) AS InnerQuery WHERE promo_deleted='0' AND status='1' AND resto_status='1' AND resto_deleted='0' AND deleted='0' AND suspend='0' AND mulai_promo <= CURDATE() AND batas_promo >= CURDATE() AND harga_menu <= ".$harga." AND (nama_menu LIKE '%".$req_nama."%' OR menu_deskripsi LIKE '%".$req_nama."%') ORDER BY distance ASC, harga_menu ASC LIMIT ".$row);
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
                    $data['phone']=$value->phone;
                    if (empty($value->menu_deskripsi)) {
                        $data['menu_deskripsi']='0';
                    } else {
                        $data['menu_deskripsi']=$value->menu_deskripsi;
                    }
                    if (empty($value->gambar_menu)) {
                        $data['gambar_menu']='0';
                    } else {
                        $data['gambar_menu']= url('/').'/fotomenu/'.$value->gambar_menu;
                    }
                    if (empty($value->gambar_resto)) {
                    $data['gambar_resto']='0';
                } else {
                    $data['gambar_resto']= url('/').'/fotorestoran/'.$value->gambar_resto;
                }
                    $data['status']=$value->status;
                    $data['rating']=$value->rating;
                    $data['id_promo']=$value->id_promo;
                    $data['harga_promo']=$value->harga_promo;
                    $data['keterangan_promo']=$value->keterangan_promo;
                    $data['mulai_promo']=$value->mulai_promo;
                    $data['batas_promo']=$value->batas_promo;
                    // $data['gambar_promo']=$value->gambar_promo;
                    if (empty($value->gambar_promo)) {
                        $data['gambar_promo']='0';
                    } else {
                        $data['gambar_promo']= url('/').'/fotopromo/'.$value->gambar_promo;
                    }
                    $data1[] = $data;
                }
                return response()->json(['status'=>'success','data'=>$data1]);
            }
        } else {
            return response()->json(['status'=>'error', 'data'=>'Kriteria Kurang'],404);
        }
    }
    
    public function getSinglePromo(Request $request)
    {
        $id = $request->id_menu;
        $today = date("Y-m-d");
        $promo = Promo::where('id_menu', $id)->orderBy('updated_at', 'desc')
            ->where('batas','>=', $today)
            ->where('deleted', 0)
            ->get();

            if(!empty($promo)){
                return response()->json(['success' => $promo], $this->successStatus);
            }else{
                return response()->json(['success' => 'Menu Tidak Memiliki Promo'], 404);
            }
    }
}
