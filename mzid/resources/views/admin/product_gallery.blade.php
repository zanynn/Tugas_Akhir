@extends('admin.layouts.master')

@section('title', 'Galeri Produk | MZ.ID')

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title mb-0">Galeri Produk</h3>
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Produk</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Galeri</a>
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="repeat-form">Produk</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
            </div>
            <!-- alert -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible mb-2 text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{session('success')}}
            </div>
            @elseif(session('danger'))
            <div class="alert alert-danger alert-dismissible mb-2 text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{session('danger')}}
            </div>
            @endif
            <!--end alert -->
            <div align="center">
                <a href="javascript: void(0);">
                    <img src="{{'/storage/'.$product->image}}" class="rounded mr-75" alt="profile image" height="250" width="250">
                </a>
            </div>
            <form novalidate class="form form-horizontal form-bordered">
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="name">Nama Produk</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" readonly="readonly" value="{{$product->name}}" name="name">
                        </div>
                    </div>
                    <div class="form-group row last">
                        <label class="col-md-4 label-control" for="name">Kode Produk</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" readonly="readonly" value="{{$product->code}}" name="code">
                        </div>
                    </div>
                </div>
            </form>

            <div class="card-body">
                <h4 class="form-section">Penambahan Galeri Produk</h4>
                <div class="repeater-default" style="padding-left: 40px;">
                    <div>
                        <div>

                            <form action="" class="form row" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="form-group mb-1 col-sm-12 col-md-6">

                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="form-group overflow-hidden">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="icon-plus4"></i> Upload
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Galeri Produk</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="fa fa-minus" aria-hidden="true"></i></a></li>
                        <li><a data-action="reload"><i class="fa fa-repeat" aria-hidden="true"></i></a></li>
                        <li><a data-action="expand"><i class="fa fa-window-maximize" aria-hidden="true"></i></a></li>
                        <li><a data-action="close"><i class="fa fa-times" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <table class="table display nowrap table-striped table-bordered scroll-horizontal-vertical">
                        <thead>
                            <tr style="text-align: center; vertical-align: middle;">
                                <th style="text-align: center;vertical-align: middle;">No</th>
                                <!-- <th>Nama SKU</th> -->
                                <th style="text-align: center;vertical-align: middle;">Gambar</th>
                                <th style="text-align: center;vertical-align: middle;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($imageGalleries as $imageGallery)
                            <tr style="text-align: center; vertical-align: middle;">
                                <td>{{$i++}}</td>
                                <td><img src="{{'/storage/'.$imageGallery->image}}" class="img-responsive" alt="Image" width="60"></td>
                                <td><a href="#" class="btn btn-danger delete" gallery-id="{{$imageGallery->id}}" product-name="{{$product->name}}">Hapus</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- </section> -->
</div>
@endsection

@section('footer')
<script src="/adminstyle/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js"></script>
<script src="/adminstyle/app-assets/js/scripts/forms/form-repeater.min.js"></script>
<script>
    $('.delete').click(function() {
        var gallery_id = $(this).attr('gallery-id');
        var product_name = $(this).attr('product-name');
        swal({
                title: "Apakah anda yakin?",
                text: "Menghapus galeri dari produk " + product_name + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/product-gallery/delete/" + gallery_id;
                }
            });
    });
</script>
@endsection