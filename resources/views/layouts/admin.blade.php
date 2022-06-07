<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets')}}/img/logo.png" rel="icon">
  <link href="{{asset('assets')}}/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('assets')}}/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{url('/IndexKeasramaan')}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets')}}/img/logo.png">
        <span class="d-none d-lg-block">Koperasi</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
      <span class="d-none d-lg-block">Koperasi Institut Teknologi Del</span>
      </form>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{url('assets')}}/FotoProfil/" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6></h6>
              <span>Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{url('/DataKeasramaan')}}">
                <i class="bi bi-person"></i>
                <span>Data Diri</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
               {{ __('Logout') }}
           </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
           </form>

            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav>

  </header>

  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="nav-link" href="{{url('/AdminIndex')}}">
          <span>Menu</span>
        </a>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/AdminIndex')}}">
          <i class="bi bi-grid"> </i>
          <span>Beranda</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/DataProduk')}}">
          <i class="bi bi-person"></i>
          <span>Produk</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('item')}}">
          <i class="bi bi-envelope"></i>
          <span>Makanan Dan Minuman</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/PeraturanKeasramaan')}}">
          <i class="bi bi-card-list"></i>
          <span>Peraturan</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/RuangKamarKeasramaan')}}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Ruang kamar</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  @yield('container')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>2022 DEVELOPED BY KELOMPOK 6 PAM</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets')}}/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{asset('assets')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('assets')}}/vendor/chart.js/chart.min.js"></script>
  <script src="{{asset('assets')}}/vendor/echarts/echarts.min.js"></script>
  <script src="{{asset('assets')}}/vendor/quill/quill.min.js"></script>
  <script src="{{asset('assets')}}/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{asset('assets')}}/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{asset('assets')}}/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets')}}/js/main.js"></script>

</body>

</html>