<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Review;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use File;

class ReviewController extends Controller
{
    public $successStatus = 200;
    public function show(Request $request)
    {
        $id = $request->id_menu;
        $review = DB::table('reviews')
      ->join('users', 'reviews.id_user', '=', 'users.id')
      ->select('users.name', 'reviews.*')
      ->where('reviews.id_menu', $id)
      ->where('reviews.deleted', 0)
      ->orderBy('reviews.id','desc')
      ->get();


        if ($review->isEmpty()) {
            return response()->json(['status'=>'error','data'=>'Menu ini belum memiliki Review'], 404);
        } else {
            return response()->json(['status'=>'success','data'=>$review]);
        }
    }

    // menyimpan data
    public function create(request $request)
    {
        $input = $request->all();
        $data = Review::create($input);
        $id_menu = $request->id_menu;
        $total_rating = DB::table('reviews')->select(DB::raw('Round(AVG(rating),1)as tot_rating'))
      ->where('deleted', 0)->where('id_menu', $id_menu)
      ->first();
        DB::table('menus')
            ->where('id', $request->id_menu)
            ->update(['rating' => $total_rating->tot_rating]);
        return response()->json(['success'=>'Review Anda Berhasil Di Tambahkan'], $this->successStatus);
    }

    public function update(request $request)
    {
        $id = $request->id;
        $id_menu = $request->id_menu;
        $review = Review::find($id);
        if (empty($review)) {
            return response()->json(['error'=>'review Anda Tidak Ditemukan'], 404);
        } else {
            $input = $request->all();
            $review->update($input);
            $total_rating = DB::table('reviews')->select(DB::raw('Round(AVG(rating),1)as tot_rating'))
          ->where('deleted', 0)->where('id_menu', $id_menu)
          ->first();
            DB::table('menus')
                ->where('id', $request->id_menu)
                ->update(['rating' => $total_rating->tot_rating]);
            return response()->json(['success'=>'Review Anda Berhasil Di Perbaharui'], $this->successStatus);
        }
    }

    // delete
    public function delete(Request $request)
    {
        $id = $request->id_review;
        $id_menu = $request->id_menu;
        $review = Review::find($id);
        $review->deleted = 1;
        $review->save();

        $total_rating = DB::table('reviews')->select(DB::raw('Round(AVG(rating),1)as tot_rating'))
      ->where('deleted', 0)->where('id_menu', $id_menu)
      ->first();
        DB::table('menus')
            ->where('id', $request->id_menu)
            ->update(['rating' => $total_rating->tot_rating]);
        return response()->json(['success'=>'Review Anda Berhasil Di Hapus'], $this->successStatus);
    }

    public function getMyReview(Request $request)
    {
        // $review = Review::where('id_user', $request->id_user)->where('deleted', 0)->get();
        $review = DB::table('reviews')
      ->join('menus', 'reviews.id_menu', '=', 'menus.id')
      ->select('menus.nama_menu', 'reviews.*')
      ->where('reviews.id_user', $request->id_user)
      ->where('reviews.deleted', 0)
      ->orderBy('reviews.id','desc')
      ->get();

        if ($review->isEmpty()) {
            return response()->json(['status'=>'error','data'=>'Anda Belum Memiliki Review'], 404);
        } else {
            return response()->json(['status'=>'success','data'=>$review],200);
        }
    }
}
