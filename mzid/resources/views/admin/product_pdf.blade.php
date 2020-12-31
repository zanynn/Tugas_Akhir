<!DOCTYPE html>
<!--
Template Name: Stack - Stack - Bootstrap 4 Admin Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/stack_admin
Renew Support: https://1.envato.market/stack_admin
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">

<!-- Mirrored from pixinvent.com/stack-responsive-bootstrap-4-admin-template/html/ltr/vertical-modern-menu-template/dt-extensions-responsive.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 13 Dec 2020 02:38:06 GMT -->

<head>
    <title>Laporan Data Produk | MZ.ID</title>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Responsive Datatable - Stack Responsive Bootstrap 4 Admin Template</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet"> -->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/vendors/css/tables/extensions/fixedHeader.dataTables.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/css/components.min.css')}}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/app-assets/css/core/colors/palette-gradient.min.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{public_path('/adminstyle/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;

        }
    </style>
</head>

<body style="background:#FFF;">
    <table align="center" style="border-bottom: 1px solid black; font-size:12px;">
        <tbody>
            <tr>
                <td><img src="{{public_path('/adminstyle/app-assets/images/portrait/logo-polinema.png')}}" style="width: 100px; height:100px;"></td>
                <td align="center">
                    <p><strong>KEMENTRIAN RISET TEKNOLOGI, DAN PENDIDIKAN TINGGI<br>POLITEKNIK NEGERI MALANG<br>JURUSAN TEKNOLOGI INFORMASI
                            <br>PROGRAM STUDI MANAJEMEN INFORMATIKA</strong><br> Jl.Soekarno Hatta PO BOX 04 Malang Telp. (0341) 404424 pes. 1122<br>
                        http://www.polinema.ac.id</p>
                </td>
                <td><img src="{{public_path('/adminstyle/app-assets/images/portrait/logo-jas-anz.png')}}" style="width: 100px; height:100px;"></td>
            </tr>
        </tbody>
    </table>
    <br>
    <center>
        <h2>Laporan Data Produk</h2>
    </center>
    <section id="child-rows">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered responsive">
                                <thead>
                                    <tr style="text-align: center; vertical-align: middle;">
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Kode</th>
                                        <th>Produk</th>
                                        <th>Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach($products as $product)

                                    <tr style="text-align: center; vertical-align: middle; padding:1px 1px 1px 1px;">
                                        <td>{{$i++}}</td>
                                        <td><img src="{{public_path('/storage/'.$product->image)}}" alt="" width="50"></td>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="form-actions clearfix">
                                <div class="buttons-group float-right">
                                    <h5 class="mr-2">
                                        Tertanda,
                                    </h5>
                                </div>
                            </div>
                            <br>
                            <div class="form-actions clearfix">
                                <div class="buttons-group float-right">
                                    <h4 class="mr-2">
                                        <strong><u>MZ.ID</u></strong>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- BEGIN: Vendor JS-->
    <script src="{{public_path('/adminstyle/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->


    <!-- BEGIN: Page JS-->
    <script src="{{public_path('/app-assets/js/scripts/tables/datatables-extensions/datatable-responsive.min.js')}}"></script>
    <!-- END: Page JS-->
</body>

</html>