@extends('admin.layouts.master')

@section('title', 'Lihat Produk | MZ.ID')

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title mb-0">Hello, Admin!</h3>
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Produk</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">{{$show_product->name}}</a>
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
                        <li><a data-action="collapse"><i class="fa fa-minus" aria-hidden="true"></i></a></li>
                        <li><a data-action="reload"><i class="fa fa-repeat" aria-hidden="true"></i></a></li>
                        <li><a data-action="expand"><i class="fa fa-window-maximize" aria-hidden="true"></i></a></li>
                        <li><a data-action="close"><i class="fa fa-times" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div align="center">
                <a href="javascript: void(0);">
                    <img src="{{'/storage/'.$show_product->image}}" class="rounded mr-75" alt="profile image" height="250" width="250">
                </a>
            </div>
            <form class="form form-horizontal form-bordered">
                <div class="form-body">
                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="name">Nama Produk</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" readonly="readonly" value="{{$show_product->name}}" name="name">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="code">Kode Produk</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" readonly="readonly" value="{{$show_product->code}}" name="code">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="name">Kategori</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" readonly="readonly" value="{{$show_category->name}}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 label-control" for="price">Harga</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" readonly="readonly" value="IDR {{$show_product->price}}">

                        </div>
                    </div>
                    <div class="form-group row last">
                        <label class="col-md-4 label-control" for="description">Deskripsi</label>
                        <div class="col-md-4">
                            <textarea class="form-control" readonly value="">{{$show_product->description}}</textarea>
                        </div>
                    </div>
                </div>
            </form>
            <br>
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
                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <table class="table display nowrap table-striped table-bordered scroll-horizontal-vertical">
                        <thead>
                            <tr style="text-align: center; vertical-align: middle;">
                                <th>SKU</th>
                                <th>Kolom 3</th>
                                <th>Harga</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($show_attribute as $attribute)
                            <input type="hidden" name="id[]" value="{{$attribute->id}}">
                            <tr style="text-align: center; vertical-align: middle;">
                                <td>
                                    <input type="text" name="sku[]" id="sku" class="form-control" value="{{$attribute->sku}}" readonly="readonly">
                                </td>
                                <td>
                                    <input type="text" name="size[]" id="size" class="form-control" value="{{$attribute->size}}" readonly="readonly">
                                </td>
                                <td>
                                    <input type="text" name="price[]" id="price" class="form-control" value="{{$attribute->price}}" readonly="readonly">
                                </td>
                                <td>
                                    <input type="text" name="stock[]" id="stock" class="form-control" value="{{$attribute->stock}}" readonly="readonly">
                                </td>
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Galeri Produk</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body card-dashboard">
                    <table class="table display nowrap table-striped table-bordered scroll-horizontal-vertical">
                        <thead>
                            <tr>
                                <th style="text-align: center;vertical-align: middle;">No</th>
                                <!-- <th>Nama SKU</th> -->
                                <th style="text-align: center;vertical-align: middle;">Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($show_image as $imageGallery)

                            <tr>
                                <td style="text-align: center;vertical-align: middle;">{{$i++}}</td>

                                <td style="text-align: center;vertical-align: middle;"><img src="{{'/storage/'.$imageGallery->image}}" class="img-responsive" alt="Image" width="80" height="80"></td>
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