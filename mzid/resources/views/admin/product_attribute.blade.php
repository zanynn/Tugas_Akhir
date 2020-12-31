@extends('admin.layouts.master')

@section('title', 'Tambah Atribut Produk - MZ.ID COMP Online Shop')

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title mb-0">Atribut Produk</h3>
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Produk</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Atribut</a>
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
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                    </ul>
                </div>
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
                    <img src="{{'/storage/'.$products->image}}" class="rounded mr-75" alt="profile image" height="250" width="250">
                </a>
            </div>
            <form novalidate class="form form-horizontal form-bordered">
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="name">Nama Produk</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="{{$products->name}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="code">Kode Produk</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="{{$products->code}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row last">
                        <label class="col-md-4 label-control" for="color">Warna Produk</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" value="{{$products->color}}" readonly>
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-body">
                <h4 class="form-section">Penambahan Atribut</h4>
                <div class="repeater-default" style="padding-left: 40px;">
                    <div>
                        <div>
                            <form action="" class="form row" method="post" role="form">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="product_id" value="{{$products->id}}">
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label for="sku">SKU</label>
                                    <br>
                                    <input type="text" class="form-control" required="required" name="sku" placeholder="Masukkan SKU">
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label for="kolom3">Ukuran</label>
                                    <br>
                                    <input type="text" class="form-control" required="required" name="size" placeholder="Masukkan Ukuran">
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label for="harga">Harga</label>
                                    <br>
                                    <input type="text" class="form-control" required="required" name="price" placeholder="Masukkan harga">
                                </div>
                                <div class="form-group mb-1 col-sm-12 col-md-3">
                                    <label for="stok">Stok</label>
                                    <br>
                                    <input type="text" class="form-control" required="required" name="stock" placeholder="Masukkan Stok">
                                </div>
                                <div class="form-group overflow-hidden">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-mini">
                                            <i class="icon-plus4"></i> Tambahkan
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
                <h4 class="card-title">Atribut Produk</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus"></i></a></li>
                        <li><a data-action="reload"><i class="icon-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="icon-maximize"></i></a></li>
                        <li><a data-action="close"><i class="icon-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">

                    <form action="/admin/product-attribute/update/{{$products->id}}" method="post" role="form">

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <table class="table display nowrap table-striped table-bordered scroll-horizontal-vertical">
                            <thead>
                                <tr style="text-align: center; vertical-align: middle;">
                                    <th>SKU</th>
                                    <th>Ukuran</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attributes as $attribute)
                                <input type="hidden" name="id[]" value="{{$attribute->id}}">
                                <tr style="text-align: center; vertical-align: middle;">
                                    <td class="taskDesc">
                                        <input type="text" name="sku[]" id="sku" class="form-control" value="{{$attribute->sku}}" required="required">
                                    </td>
                                    <td class="taskStatus">
                                        <input type="text" name="size[]" id="size" class="form-control" value="{{$attribute->size}}" required="required">
                                    </td>
                                    <td class="taskOptions">
                                        <input type="text" name="price[]" id="price" class="form-control" value="{{$attribute->price}}" required="required">
                                    </td>
                                    <td class="taskOptions">
                                        <input type="text" name="stock[]" id="stock" class="form-control" value="{{$attribute->stock}}" required="required">
                                    </td>
                                    <td style="text-align: center; ">
                                        <button type="submit" class="badge badge-warning" style="border: none;">Update</button>
                                        <a href="/admin/product-attribute/delete/{{$attribute->id}}" rel="{{$attribute->id}}" rel1="delete-attribute" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
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
@endsection