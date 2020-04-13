<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>Smart Living Cost | Daftar Admin</title>

  <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
  <meta name="author" content="pixelcave">
  <meta name="robots" content="noindex, nofollow">

  <!-- Open Graph Meta -->
  <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
  <meta property="og:site_name" content="OneUI">
  <meta property="og:description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
  <meta property="og:type" content="website">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <meta name="csrf_token" content="{{csrf_token()}}">

  <!-- Icons -->
  <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
  <link rel="shortcut icon" href="{{asset("slc/img/budget.png")}}">
  <link rel="icon" type="image/png" sizes="192x192" href="{{asset("slc/img/budget.png")}}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset("slc/img/budget.png")}}">
  <!-- END Icons -->

  <!-- Stylesheets -->
  <!-- Fonts and OneUI framework -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
  <link rel="stylesheet" id="css-main" href="{{asset("assets/css/oneui.min.css")}}">

  <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
  <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
  <!-- END Stylesheets -->
</head>

<body>
  <!-- Page Container -->
  <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header

        HEADER STYLE

            ''                                          Light themed Header
            'page-header-dark'                          Dark themed Header

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
  <div id="page-container">

    <!-- Main Container -->
    <main id="main-container">

      <!-- Page Content -->
      <div class="hero-static d-flex align-items-center">
        <div class="w-100">
          <!-- Sign Up Section -->
          <div class="content content-full bg-white">
            <div class="row justify-content-center">
              <div class="col-md-8 col-lg-6 col-xl-4 py-4">
                <!-- Header -->
                <div class="text-center">
                  <p class="mb-2">
                    <i class="text-primary">
                      <img src="{{asset("slc/img/budget.png")}}" width="40" height="40" /></i>
                  </p>
                  <h1 class="h4  mb-1">
                    Daftar Akun Admin
                  </h1>
                  <h2 class="h6 font-w400 text-muted mb-3">
                    Jadilah Admin Untuk Mengelola Komunitas 
                  </h2>
                  @if ($errors->any())
                  @foreach ($errors->all() as $error)
                  <div class="alert alert-warning alert-dismissable" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="mb-0">{{ $error }}</p>
                  </div>
                  @endforeach
                  @endif
                </div>
                <!-- END Header -->

                <!-- Sign Up Form -->
                <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js) -->
                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signup" action="{{route('createAdmin')}}" method="POST">
                  {{ csrf_field() }}
                  <div class="py-3">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg form-control-alt" id="signup-username" name="name" placeholder="Nama">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-lg form-control-alt" id="signup-email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password-confirm" name="password_confirmation" placeholder="Konfirmasi Password">
                    </div>
                    <div class="form-group">
                      <div class="d-md-flex align-items-md-center justify-content-md-between">
                        <div class="custom-control custom-switch">
                          {{-- <input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember"> --}}
                          {{-- <label class="custom-control-label font-w400" for="login-remember">Remember Me</label> --}}
                        </div>
                        {{-- <div class="py-2">
                          <a class="font-size-sm" href="{{route('login')}}">Sudah Punya Akun?</a>
                        </div> --}}
                      </div>
                    </div>
                    <div class="form-group row justify-content-center mb-0">
                      <div class="col-md-6 col-xl-5">
                        <button type="submit" class="btn btn-block btn-success">
                          <i class="fa fa-fw fa-plus mr-1"></i> Daftar
                        </button>
                      </div>
                    </div>
                </form>
                <!-- END Sign Up Form -->
              </div>
            </div>
          </div>
          <!-- END Sign Up Section -->

          <!-- Footer -->
          <div class="font-size-sm text-center text-muted py-3">
            <strong>Smart Living Cost</strong> &copy; <span data-toggle="year-copy"></span>
          </div>
          <!-- END Footer -->
        </div>
      </div>
      <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
  </div>
  <!-- END Page Container -->

  <!-- Terms Modal -->
  <div class="modal fade" id="one-signup-terms" tabindex="-1" role="dialog" aria-labelledby="one-signup-terms" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
      <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
          <div class="block-header bg-primary-dark">
            <h3 class="block-title">Terms &amp; Conditions</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
              </button>
            </div>
          </div>
          <div class="block-content">
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst
              proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst
              proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst
              proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst
              proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst
              proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
          </div>
          <div class="block-content block-content-full text-right border-top">
            <button type="button" class="btn btn-sm btn-link mr-2" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">I Agree</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Terms Modal -->


  <!--
            OneUI JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/js.cookie.min.js
        -->
  <script src="{{asset("assets/js/oneui.core.min.js")}}"></script>

  <!--
            OneUI JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
  <script src="{{asset("assets/js/oneui.app.min.js")}}"></script>

  <!-- Page JS Plugins -->
  <script src="{{asset("assets/js/plugins/jquery-validation/jquery.validate.min.js")}}"></script>

  <!-- Page JS Code -->
  <script src="{{asset("assets/js/pages/op_auth_signup.min.js")}}"></script>
</body>

</html>
