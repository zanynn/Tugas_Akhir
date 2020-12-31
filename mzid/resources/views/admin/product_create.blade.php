@extends('admin.layouts.master')

@section('title', 'Tambah Data Produk | MZ.ID')

@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title mb-0">Bordered Forms</h3>
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Produk</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Tambah Produk</a>
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="bordered-layout-basic-form">Tambah Data Produk</h4>
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
            <div class="card-content collpase show">
                <div class="card-body">
                    <form action="/admin/product/create" class="form form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <!-- <h4 class="form-section"><i class="feather icon-user"></i> Personal Info</h4> -->
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="projectinput1">Kategori</label>
                                <div class="col-md-7">
                                    <select name="category_id" class="select2 form-control" id="default-select">
                                        @foreach($categories as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                        <?php
                                        if ($key != 0) {
                                            $sub_categories = DB::table('categories')->select('id', 'name')->where('parent_id', $key)->get();
                                            if (count($sub_categories) > 0) {
                                                foreach ($sub_categories as $sub_category) {
                                                    echo '<option value="' . $sub_category->id . '">&nbsp;&nbsp;--' . $sub_category->name . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="name">Nama Produk</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" required="required" name="name" placeholder="Masukkan Nama Produk">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="code">Kode Produk</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" required="required" value="{{old('code')}}" name="code" placeholder="Masukkan Kode Produk">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="color">Warna</label>
                                <div class="col-md-7">
                                    <input type="text" required="required" class="form-control" value="{{old('color')}}" name="color" placeholder="Masukkan Warna Produk">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="description">Deskripsi</label>
                                <div class="col-md-7">
                                    <textarea required="required" class="form-control" value="{{old('color')}}" name="description" placeholder="Masukkan Deskripsi Produk"></textarea></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="price">Harga</label>
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">IDR </span>
                                        </div>
                                        <input type="text" class="form-control" required="required" value="{{old('price')}}" name=" price" placeholder="cth: 100000">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group row last">
                                <label class="col-md-2 label-control" for="image">Gambar</label>
                                <div class="col-md-7">
                                    <input type="file" id="file" required="required" name="image">
                                    <span class="file-custom"></span>
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                </div>
                            </div>

                            <div class="form-actions clearfix">
                                <div class="buttons-group float-right">
                                    <button type="submit" class="btn btn-primary mr-1">
                                        <i class="fa fa-check-square-o"></i> Tambahkan Produk
                                    </button>
                                    <button type="button" class="btn btn-warning mr-1">
                                        <i class="feather icon-x"></i> Batal
                                    </button>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection