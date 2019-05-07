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
              <img src="{{asset("slc/img/budget.png")}}" width="25" height="25"/></i>
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
                  <a class="nav-main-link active" href="be_pages_dashboard.html">
                      <i class="nav-main-link-icon si si-home"></i>
                      <span class="nav-main-link-name">Dashboard</span>
                  </a>
              </li>
              <li class="nav-main-heading">Menu Utama</li>
              <li class="nav-main-item">
                  <a class="nav-main-link" href="#">
                      <i class="nav-main-link-icon si si-users"></i>
                      <span class="nav-main-link-name">Pengguna</span>
                  </a>
              </li>
              <li class="nav-main-item">
                  <a class="nav-main-link" href="#">
                      <i class="nav-main-link-icon si si-map"></i>
                      <span class="nav-main-link-name">Restoran</span>
                  </a>
              </li>
              <li class="nav-main-item">
                  <a class="nav-main-link" href="#">
                      <i class="nav-main-link-icon si si-bubbles"></i>
                      <span class="nav-main-link-name">Review</span>
                  </a>
              </li>
              <li class="nav-main-heading">Laporan</li>
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
        Blank (Block) <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">That feeling of delight when you start your awesome new project!</small>
      </h1>
      <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-alt">
          <li class="breadcrumb-item">Generic</li>
          <li class="breadcrumb-item" aria-current="page">
            <a class="link-fx" href="">Blank (Block)</a>
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
      <h3 class="block-title">
        Block Title
      </h3>
      <div class="block-options">
        <button type="button" class="btn-block-option">
          <i class="si si-settings"></i>
        </button>
      </div>
    </div>
    <div class="block-content">
      <p>Your content..</p>
    </div>
  </div>
  <!-- END Your Block -->
</div>
<!-- END Page Content -->

@endsection
