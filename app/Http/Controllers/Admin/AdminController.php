<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Resto;
use App\Menu;
use App\Review;
use App\Report;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
        ]);


        $data =  new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->isAdmin = 1;
        $data->save();
        return redirect('/admin/login')->with('alert-success', 'Registrasi Admin Berhasil');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginCheck(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $data = User::where('email', $email)->where('isAdmin', 1)->first();
        if ($data) { //apakah email tersebut ada atau tidak
            if (Hash::check($password, $data->password)) {
                Session::put('id', $data->id);
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('login', true);
                return redirect('/admin/dashboard');
            } else {
                return redirect('/admin/login')->with('alert', 'Password atau Email Anda Salah');
            }
        } else {
            return redirect('/admin/login')->with('alert', 'Maaf, Email Anda Tidak Terdaftar Sebagai Admin');
        }
    }

    public function index()
    {
        if (!Session::get('login')) {
            return redirect('/admin/login')->with('alert', 'Anda Harus Login Terlebih Dahulu');
        } else {
            $total_users = User::count();
            $total_menus = Menu::where('deleted', 0)->count();
            $total_resto = Resto::where('deleted', 0)->count();
            $total_review = Review::where('deleted', 0)->count();
            $total_menu_bermasalah = Report::where('deleted', 0)->count();
            return view(
                'layouts.dashboard',
                ['total_users' => $total_users,
                'total_menus' => $total_menus,
                'total_resto' => $total_resto,
                'total_review' => $total_review,
                'total_menu_bermasalah' => $total_menu_bermasalah]
            );
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/admin/login')->with('alert', 'Anda Telah Keluar');
    }
}
