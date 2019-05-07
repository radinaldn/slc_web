@extends('master.layout')

@section('title','Restoran | Smart Living Cost')

@section('sidebar')
<!-- Sidebar -->
<!--
      Sidebar Mini Mode - Display Helper classes

      Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
      Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
          If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

      Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
      Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
      Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
  -->
<nav id="sidebar" aria-label="Main Navigation">
  <!-- Side Header -->
  <div class="content-header bg-white-5">
    <!-- Logo -->
    <a class="font-w600 text-dual" href="#">
      <i class="text-primary">
        <img src="{{asset("slc/img/budget.png")}}" width="25" height="25" /></i>
      <span class="smini-hide">
        <span class="font-w700 font-size-h5">Smart Living Cost</span>
      </span>
    </a>
    <!-- END Logo -->

  </div>
  <!-- END Side Header -->

  <!-- Side Navigation -->
  <div class="content-side content-side-full">
    <ul class="nav-main">
      <li class="nav-main-item">
        <a class="nav-main-link" href="{{route('index')}}">
          <i class="nav-main-link-icon si si-home"></i>
          <span class="nav-main-link-name">Dashboard</span>
        </a>
      </li>
      <li class="nav-main-heading">Menu Utama</li>
      <li class="nav-main-item">
        <a class="nav-main-link active" href="#">
          <i class="nav-main-link-icon si si-map"></i>
          <span class="nav-main-link-name">Restoran</span>
        </a>
      </li>
      <li class="nav-main-item">
        <a class="nav-main-link" href="#">
          <i class="nav-main-link-icon si si-note"></i>
          <span class="nav-main-link-name">Menu</span>
        </a>
      </li>
      <li class="nav-main-heading">Pengaduan</li>
      <li class="nav-main-item">
        <a class="nav-main-link" href="#">
          <i class="nav-main-link-icon si si-speech"></i>
          <span class="nav-main-link-name">Menu Bermasalah</span>
        </a>
      </li>
    </ul>
  </div>
  <!-- END Side Navigation -->
</nav>
<!-- END Sidebar -->
@endsection

@section('content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-sm-fill h3 my-2">
        Restoran <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Kelola Seluruh Data Restoran</small>
      </h1>
      <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-alt">
          <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="#">Restoran</a>
          </li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
  <!-- Your Block -->
  <div class="block">
    <div class="block-header">
      <h3>
        Data Restoran Anda
      </h3>
      <div class="pull-right">
          <a href="{{url('/admin/restoran/create')}}"><button  class="btn btn-success"><i class="fa fa-fw fa-plus"></i> Tambah Restoran</button></a>
      </div>
    </div>
    <div class="block-content">
      @if ($restoranlist->count()>0)


      <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
        <thead>
          <tr>
            <th class="text-center" style="width: 80px;">Nomor</th>
            <th>Nama</th>
            <th class="text-center" style="width: 15%;">Latitude</th>
            <th class="text-center" style="width: 15%;">Longitude</th>
            <th class="text-center" style="width: 15%;">Alamat</th>
            <th class="text-center" style="width: 15%;">Status</th>
            <th class="text-center" style="width: 15%;">Gambar</th>
            <th class="text-center" style="width: 15%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($restoranlist as $key => $value)
          <tr>
            <td class="text-center">{{$key+1}}</td>
            <td class="text-center">{{$value->nama}}</td>
            <td class="text-center">{{$value->lat}} </td>
            <td class="text-center">{{$value->lng}}</td>
            <td class="text-center">{{$value->alamat}}</td>
            <td class="text-center">
              @if($value->status == 0)
                <span class="badge badge-warning">Tutup</span>
                @else
                <span class="badge badge-success">Buka</span>
                @endif</td>
            <td class="text-center"><img src="{{asset('fotorestoran/'.$value->gambar_resto)}}" alt="{{($value->gambar_resto)}}" width="70" height="95" /></td>
            <td class="text-center">
              <button type="button" class="btn btn-rounded btn-success"
               data-toggle="tooltip" data-placement="top" title="Edit">
                <i class="fa fa-fw fa-pencil-alt"></i>
              </button>
              <button type="button" class="btn btn-rounded btn-danger"
               data-toggle="tooltip" data-placement="top" title="Hapus">
                <i class="fa fa-fw fa-trash-alt"></i>
              </button>
              <button type="button" class="btn btn-rounded btn-primary"
               data-toggle="tooltip" data-placement="top" title="Tambah Menu">
                <i class="fa fa-fw fa-plus"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>
      @else
      <p class="text-center"> Anda Belum Memiliki Daftar Restoran</p>
      @endif
    </div>
  </div>
  <!-- END Your Block -->
</div>
<!-- END Page Content -->

@endsection
