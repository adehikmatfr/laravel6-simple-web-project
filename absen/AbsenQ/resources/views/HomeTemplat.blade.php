<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$title}}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{url('pages')}}/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{url('pages')}}/assets/vendors/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="{{url('pages')}}/assets/vendors/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="{{url('pages')}}/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{url('pages')}}/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{url('pages')}}/assets/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="{{url('')}}/css/qr.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{url('pages')}}/assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('pages')}}/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('pages')}}/assets/css/demo_1/style.css">

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{url('pages')}}/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{url('pages')}}/assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{url('pages')}}/assets/images/favicon.png" />
  </head>
  <body>
  <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="">
            <img src="{{url('pages')}}/assets/images/logo.svg" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="">
            <img src="{{url('pages')}}/assets/images/logo-mini.svg" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator" id="notificationDropdown" href="" data-toggle="dropdown">
                <i class="mdi mdi-email-outline"></i>
                <span class="count bg-success">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                <a class="dropdown-item py-3 border-bottom">
                  <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-alert m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                    <p class="font-weight-light small-text mb-0"> Just now </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-settings m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                    <p class="font-weight-light small-text mb-0"> Private message </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-airballoon m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                    <p class="font-weight-light small-text mb-0"> 2 days ago </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="{{url('images')}}/{{$user->img}}" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="{{url('images')}}/{{$user->img}}" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">{{$user->nama}}</p>
                </div>
                <a href="{{route('profile')}}" class="dropdown-item">My Profile <i class="dropdown-item-icon ti-dashboard"></i></a>
                
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="{{route('profile')}}" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{url('images')}}/{{$user->img}}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{$user->nama}}</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('')}}/home">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
          @if($user->id_jabatan==1)
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}/kelas">Kelas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}/jurusan">Jurusan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}/jabatan">Jabatan</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#u-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Master User</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="u-basic"> 
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}/admin/user">Users</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}/guru/walikelas">Guru Wali Kelas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}/guru/kaprog">Guru Kaprog</a>
                  </li>
                </ul>
              </div>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#u" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Data Absen</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="u">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}/absen/siswa/1">Kehadiran</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}/absen/siswa/2">Alfa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}/absen/siswa/3">Ijin</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}/absen/siswa/4">Sakit</a>
                  </li>
                </ul>
              </div>
            </li>
            @if($user->id_jabatan==5)
            <li class="nav-item">
              <a class="nav-link" href="{{url('')}}/siswa/absen">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Absen</span>
              </a>
            </li>
            @endif
            @if($user->id_jabatan!=5)
            <li class="nav-item">
              <a class="nav-link" href="{{url('')}}/admin/report">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Report</span>
              </a>
            </li>
            @endif
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/login.html"> Login </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/register.html"> Register </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
            <a href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                </form>
                <span class="menu-title">Sign Out</span>
              </a>
            </li>
          </ul>
        </nav>
      @yield('content')

      <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
              </span>
            </div>
          </footer>

      <script src="{{url('pages')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{url('pages')}}/assets/vendors/js/vendor.bundle.addons.js"></script>
    <script src="{{url('pages')}}/assets/js/jquery-3.3.1.js"></script>
    <script src="{{url('pages')}}/assets/js/demo_1/dashboard.js"></script>
    <script src="{{url('pages')}}/assets/js/shared/off-canvas.js"></script>
    <script src="{{url('pages')}}/assets/js/shared/misc.js"></script>
    <script src="{{url('pages')}}/assets/js/shared/chart.js"></script>
    <script src="{{url('pages')}}/assets/js/gmap.js"></script>
    <script src="{{url('pages')}}/assets/js/qrcodelib.js"></script>
    <!-- <script src="{{url('pages')}}/assets/js/WebCodeCam.min.js"></script>
    <script src="{{url('pages')}}/assets/js/WebCodeCam.js"></script>
    <script src="{{url('pages')}}/assets/js/main.js"></script> -->
      @yield('placeJS')
  </body>
</html>