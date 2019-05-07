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


class RestoranController extends Controller
{
    public function index()
    {
      // $restoranlist = Resto::where('id_inputer', Session::get('id'))->get();
      $restoranlist = Resto::all();
      return view('layouts.restoran',compact('restoranlist'));
    }

    public function create()
    {
      // $restoranlist = Resto::where('id_inputer', Session::get('id'))->get();
      $restoranlist = Resto::all();
      return view('layouts.restoranadd',compact('restoranlist'));
    }
}
