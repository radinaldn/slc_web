@extends('master.layout')

@section('title','Dashboard | Smart Living Cost')

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
        <a class="nav-main-link active" href="#">
          <i class="nav-main-link-icon si si-home"></i>
          <span class="nav-main-link-name">Dashboard</span>
        </a>
      </li>
      <li class="nav-main-heading">Menu Utama</li>
      <li class="nav-main-item">
        <a class="nav-main-link" href="{{route('restolist')}}">
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
        Dashboard <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Selamat Datang, {{Session::get('name')}}</small>
      </h1>
      <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-alt">
          <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="#">Dashboard</a>
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
  <div class="row text-center">
    <div class="col-3">
      <a class="block block-rounded block-bordered block-link-pop block-themed" href="#">
        <div class="block-header block-header-default bg-default">
          <h3 class="block-title">
            Total Pengguna Aplikasi
          </h3>
        </div>
        <div class="block-content">
          <p><i class="fa fa-users fa-6x" style="color:#5c80d1"></i>
            <br> {{$total_users}} Orang
          </p>
        </div>
      </a>
    </div>
    <div class="col-3">
      <a class="block block-rounded block-bordered block-link-pop block-themed" href="#">
        <div class="block-header block-header-default bg-modern">
          <h3 class="block-title">
            Total Restoran
          </h3>
        </div>
        <div class="block-content">
          <p><i class="fa fa-store-alt fa-6x" style="color:#14adc4"></i>
            <br> {{$total_resto}} Restoran
          </p>
        </div>
      </a>
    </div>
    <div class="col-3">
      <a class="block block-rounded block-bordered block-link-pop block-themed" href="#">
        <div class="block-header block-header-default bg-warning">
          <h3 class="block-title">
            Total Menu
          </h3>
        </div>
        <div class="block-content">
          <p><i class="fa fa-utensils fa-6x" style="color:#f3b760"></i>
            <br> {{$total_menus}} Menu
          </p>
        </div>
      </a>
    </div>
    <div class="col-3">
      <a class="block block-rounded block-bordered block-link-pop block-themed" href="#">
        <div class="block-header block-header-default bg-danger">
          <h3 class="block-title">
            Total Review
          </h3>
        </div>
        <div class="block-content">
          <p><i class="fa fa-comment-dots fa-6x" style="color:#d26a5c"></i>
            <br> {{$total_review}} Review
          </p>
        </div>
      </a>
    </div>
  </div>
  <!-- END Your Block -->
</div>
<!-- END Page Content -->

@endsection
