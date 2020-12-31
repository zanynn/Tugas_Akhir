<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title> @yield('title') </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <link rel="apple-touch-icon" href="/adminstyle/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/vendors/css/forms/selects/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/vendors/css/extensions/unslider.css">




    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/fonts/meteocons/style.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/pages/card-statistics.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/pages/vertical-timeline.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/pages/page-users.min.css">
    <link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/plugins/forms/validation/form-validation.css">


    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/adminstyle/assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @yield('style')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<div class="loader_bg">
    <div class="loader"></div>
</div>

<body class="vertical-layout vertical-menu-modern 2-columns  fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow" id="m-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-header" id="m-sidebar">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto" id="m-sidebar"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fa fa-toggle-off" aria-hidden="true"></i></a></li>
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="index-2.html"><img class="brand-logo" alt="stack admin logo" src="/adminstyle/app-assets/images/logo/stack-logo-light.png">
                            <h2 class="brand-text">MZ.ID</h2>
                        </a></li>
                    <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="fa fa-toggle-on" aria-hidden="true" data-ticon="feather.icon-toggle-right"></i></a></li>
                    <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav ml-auto float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                @if(Auth::user()->image != null)
                                <div class=" avatar avatar-online"><img src="{{'/storage/'. Auth::user()->image}}" alt="avatar"><i></i>
                                </div>
                                @else
                                <div class="avatar avatar-online"><img src="/img/usericon.png" alt="avatar"><i></i></div>
                                @endif
                                <span class="user-name" style="color:#fff; font-weight:400;">{{Auth::user()->name}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="/admin/user/edit/{{Auth::user()->id}}"><i class="icon-user"></i> Edit Profile</a>
                                <a class="dropdown-item" href="/logout"><i class="icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" id="m-sidebar">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation m-sidebar" data-menu="menu-navigation">
                <!-- <li class=" navigation-header"><span>General</span><i class=" feather icon-minus" data-toggle="tooltip" data-placement="right" data-original-title="General"></i>
                </li> -->
                <li class=" nav-item" id="m-sidebar"><a href="{{route('dashboard')}}">&nbsp;<i class="fa fa-home"></i><span class="menu-title"> <strong>Home</strong></span></a>
                </li>
                <li class=" nav-item" id="m-sidebar"><a href="#"><i class="fa fa-cubes" aria-hidden="true"></i><span class="menu-title" data-i18n="Dashboard"><strong>Produk</strong></span></a>
                    <ul class="menu-content">
                        <li class="{{Route::is('product') ? 'active' : '' }}" id="m-sidebar"><a class="menu-item" href="{{route('product')}}">Data Produk</a>
                        </li>
                        <li class="{{Route::is('add-product') ? 'active' : '' }}" id="m-sidebar"><a class=" menu-item" href="{{route('add-product')}}" data-i18n="Analytics">Tambah Data Produk</a>
                        </li>
                        <li class="{{Route::is('product-category') ? 'active' : '' }}" id="m-sidebar"><a class="menu-item" href="{{route('product-category')}}" data-i18n="Fitness">Kategori Produk</a>
                        </li>
                        <li class="{{Route::is('add-category') ? 'active' : '' }}" id="m-sidebar"><a class="menu-item" href="{{route('add-category')}}" data-i18n="CRM">Tambah Kategori</a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item" id="m-sidebar"><a href="#">&nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="menu-title" data-i18n="Dashboard"> <strong>Pembelian</strong></span></a>
                    <ul class="menu-content">
                        <li id="m-sidebar"><a class="menu-item" href="{{route('order')}}">Data Pembelian</a>
                        </li>
                        <!-- <li><a class="menu-item" href="#" data-i18n="Analytics">Tambah Data </a>
                        </li> -->
                        <li id="m-sidebar"><a class="menu-item" href="{{route('order-pdf')}}">Laporan</a>
                        </li>
                        <!-- <li><a class="menu-item" href="dashboard-crm.html" data-i18n="CRM">CRM</a>
                        </li> -->
                    </ul>
                </li>
                <li class=" nav-item" id="m-sidebar"><a href="#">&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true"></i><span class="menu-title" data-i18n="Dashboard"><strong>User</strong></span></a>
                    <ul class="menu-content">
                        <li class="{{Route::is('user') ? 'active' : '' }}" id="m-sidebar"><a class="menu-item" href="{{route('user')}}">Data User</a>
                        </li>
                        <li class="{{Route::is('add-user') ? 'active' : '' }}" id="m-sidebar"><a class="menu-item" href="{{route('add-user')}}" data-i18n="Analytics">Tambah Data</a>
                        </li>
                        <!-- <li><a class="menu-item" href="dashboard-crm.html" data-i18n="CRM">CRM</a>
                        </li> -->
                    </ul>
                </li>
                <li class=" nav-item" id="m-sidebar"><a href="#"><i class="fa fa-credit-card-alt" aria-hidden="true"></i><span class="menu-title" data-i18n="Dashboard"><strong>Kupon</strong></span></a>
                    <ul class="menu-content" id="m-sidebar">
                        <li class="{{Route::is('coupon') ? 'active' : '' }}" id="m-sidebar"><a class="menu-item" href="{{route('coupon')}}">Data Kupon</a>
                        </li>
                        <li class="{{Route::is('add-coupon') ? 'active' : '' }}" id="m-sidebar"><a class="menu-item" href="{{route('add-coupon')}}" data-i18n="Analytics">Tambah Data</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper" id="m-content">
            <div class="content-header row">
            </div>
            @yield('content-header')
            <div class="content-body">


                @yield('content')


            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->

    <!-- End: Customizer-->

    <!-- Buynow Button-->
    <!-- <div class="buy-now"><a href="https://1.envato.market/stack_admin" target="_blank" class="btn bg-gradient-directional-purple white btn-purple btn-glow px-2">Buy Now</a></div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div> -->

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Supported By: <a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">PIXINVENT </a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with <i class="icon-heart pink"></i></span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="/adminstyle/app-assets/vendors/js/vendors.min.js"></script>


    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- <script src="/adminstyle/app-assets/vendors/js/charts/apexcharts/apexcharts.min.js"></script> -->
    <script src="/adminstyle/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/adminstyle/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="/adminstyle/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="/adminstyle/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/adminstyle/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- END: Page Vendor JS-->


    <!-- BEGIN: Theme JS-->
    <script src="/adminstyle/app-assets/js/core/app-menu.min.js"></script>
    <script src="/adminstyle/app-assets/js/core/app.min.js"></script>
    <script src="/adminstyle/app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/adminstyle/app-assets/js/scripts/pages/page-users.min.js"></script>
    <script src="/adminstyle/app-assets/js/scripts/cards/card-statistics.min.js"></script>
    <script src="/adminstyle/app-assets/js/scripts/forms/quill/form-text-editor.min.js"></script>
    <script src="/adminstyle/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>

    <!-- END: Page JS-->
    <script>
        setTimeout(function() {
            $('.loader_bg').fadeToggle();
        }, 1000);
    </script>
    @yield('footer')
</body>
<!-- END: Body-->

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Dec 2020 02:28:09 GMT -->

</html>