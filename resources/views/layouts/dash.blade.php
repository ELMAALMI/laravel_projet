<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Feentech | dash</title>
  <!-- Favicon -->
  <link rel="icon" href=" {{asset("img/brand/blue.png")}} " type="image/png">
    <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset("vendor/nucleo/css/nucleo.css") }}" type="text/css">
  <link rel="stylesheet" href="{{asset("vendor/@fortawesome/fontawesome-free/css/all.min.css")}}" type="text/css">
  <link rel="stylesheet" href="{{asset("css/style.css")}}">
  <link rel="stylesheet" href="{{asset("css/jquery.dataTables.min.css")}}">
  <!-- tadatable -->
  <link rel="stylesheet" href="{{asset("vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("css/summernote.css")}}">


  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('css/argon.css?v=1.2.0')}}" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'home'  ? 'active' : null }}" href="{{ url('home')}}">
                <i class="ni ni-tv-2 "></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::segment(1) === 'colaborateur'  ? 'active' : null }}" href="{{ url('colaborateur') }}">
                  <i class="fa fa-users"></i>
                  <span class="nav-link-text">Collaborateurs</span>
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'service'  ? 'active' : null }}" href="{{ url('service') }}">
                <i class="ni ni-building"></i>
                <span class="nav-link-text">Jobs & Service</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'clients' ? 'active' : null }}" href="{{ url('clients') }}">
                <i class="fa fa-users"></i>
                <span class="nav-link-text">Clients</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'projet' ? 'active' : null }}" href="{{ url('projet') }}">
                <i class="ni ni-single-copy-04"></i>
                <span class="nav-link-text">Projets</span>
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ Request::segment(1) === 'fournisseur' ? 'active' : null }}" href="{{ url('/fournisseur')}}">
                <i class="ni ni-collection"></i>
                <span class="nav-link-text">Fournisseur</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'produit' ? 'active' : null }}" href="{{ url('/produit')}}">
                <i class="ni ni-bag-17"></i>
                <span class="nav-link-text">Produit</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::segment(1) === 'marketing' ? 'active' : null }}" href="{{ url('/marketing')}}">
                <i class="fa fa-mail-bulk"></i>
                <span class="nav-link-text">Marketing digital</span>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ asset('img/theme/team-4.jpg') }}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{route('logout')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <button type="submit" class="dropdown-item">
                    <i class="ni ni-button-power"></i>
                    <span>Logout</span>
                  </button>
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<style>
 .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  color: white !important;
  border: none;
  background-color: white;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111));
  background: -webkit-linear-gradient(top, #585858 0%, #111 100%);
  background: -moz-linear-gradient(top, #585858 0%, #111 100%);
  background: -ms-linear-gradient(top, #585858 0%, #111 100%);
  background: -o-linear-gradient(top, #585858 0%, #111 100%);
  background: white;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:active {
    outline: none;
    background-color: white;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #2b2b2b), color-stop(100%, #0c0c0c));
    background: -webkit-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
    background: -moz-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
    background: -ms-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
    background: -o-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%);
    background: white;
    box-shadow: inset 0 0 0px #111;
}
.dataTables_wrapper .dataTables_paginate .paginate_button 
{
    padding: 0 !important;
}
.dataTables_wrapper 
{
    width: 100%;
    margin-bottom: 39px;
}
</style>

    @yield('contents')

<!-- Argon Scripts -->
<!-- Core -->

<script src="{{ asset('vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
<!-- Optional JS -->
<script src="{{ asset('vendor/chart.js/dist/Chart.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script src="{{ asset('vendor/chart.js/dist/Chart.extension.js') }}"></script>
<!-- notify -->
<script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-datetimepicker.js') }}"></script>
<script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendor/summernote/summernote-updated.min.js') }}"></script>
<script src="{{ asset('vendor/summernote/summernote-active.js') }}"></script>

<script src="{{ asset('js/argon.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
  var urlproduit = " {{url('/getdataproduit')}} " ;
  var urlchiffre = " {{url('/getdatachiffre')}} " ;
  var urlrevenu  = " {{url('/getdatarevenu')}} "  ;
  var urlservice = " {{url('/getdatservice')}} "  ;
</script>
<script src="{{ asset('js/chartjs.js') }}"></script>
</body>

</html>
