@extends('admin.layouts.master')

@section('title', 'Edit Data Produk | MZ.ID')

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
                <li class="breadcrumb-item active"><a href="#">Edit</a>
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
                <h4 class="card-title" id="bordered-layout-basic-form">Edit Data Produk</h4>
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
                    <!-- <div class="card-text">
                        <p>Add <code>.form-bordered</code> to form tag to add border to a form-group. In this example
                            <code>.form-horizontal</code> is used to show the bordered form functionality.</p>
                    </div> -->
                    <form action="/admin/product/update/{{$edit_product->id}}" class="form form-horizontal form-bordered" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <!-- <h4 class="form-section"><i class="feather icon-user"></i> Personal Info</h4> -->
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="projectinput1">Kategori</label>
                                <div class="col-md-7">
                                    <select name="category_id" class="select2 form-control" id="default-select">
                                        @foreach($categories as $key=>$value)
                                        <option value="{{$key}}" {{$edit_category->id==$key?' selected':''}}>{{$value}}</option>
                                        <?php
                                        if ($key != 0) {
                                            $sub_categories = DB::table('categories')->where('parent_id', $key)->get();
                                            if (count($sub_categories) > 0) {
                                                foreach ($sub_categories as $sub_category) { ?>
                                                    <option value="{{$sub_category->id}}" {{$edit_category->id==$sub_category->id? 'selected':''}}>&nbsp;&nbsp;--{{$sub_category->name}}</option>
                                        <?php }
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
                                    <input type="text" class="form-control" required="required" value="{{$edit_product->name}}" name="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="code">Kode Produk</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" required="required" value="{{$edit_product->code}}" name="code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="color">Warna</label>
                                <div class="col-md-7">
                                    <input type="text" required="required" class="form-control" value="{{$edit_product->color}}" name="color">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="description">Deskripsi</label>
                                <div class="col-md-7">
                                    <textarea required="required" class="form-control" name="description">{{$edit_product->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="projectinput4">Harga</label>
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">IDR </span>
                                        </div>
                                        <input type="text" class="form-control" required="required" value="{{$edit_product->price}}" name="price">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row last">
                                <label class="col-md-2 label-control" for="projectinput4">Gambar</label>
                                <div class="col-md-7">
                                    <input type="file" id="file" name="image">
                                    <span class="file-custom"></span>
                                    <!-- <label id="projectinput8" class="file center-block">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </label> -->
                                    @if($edit_product->image!=null)
                                    &nbsp;&nbsp;&nbsp;
                                    <img src="{{'/storage/'.$edit_product->image}}" width="35" alt="">
                                    @else
                                    <p>no image</p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-actions clearfix">
                                <div class="buttons-group float-right">
                                    <button type="submit" class="btn btn-primary mr-1">
                                        <i class="fa fa-check-square-o"></i> Simpan
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