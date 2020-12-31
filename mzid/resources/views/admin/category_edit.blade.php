@extends('admin.layouts.master')

@section('title', 'Edit Data Kategori Produk | MZ.ID')

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
                <h4 class="card-title" id="bordered-layout-basic-form">Edit Data Kategori</h4>
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
                    <form action="/admin/category/update/{{$categories->id}}" class="form form-horizontal form-bordered" method="post" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-body">
                            <!-- <h4 class="form-section"><i class="feather icon-user"></i> Personal Info</h4> -->
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="p_name">Nama Kategori</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="name" id="name" value="{{$categories->name}}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="projectinput1">Level Kategori</label>
                                <div class="col-md-7">
                                    <select class="select2 form-control" name="parent_id" id="default-select">
                                        {{--@foreach($cate_levels as $key=>$value)
                                            <option value="{{$key}}" {{($categories->parent_id==$key)?' selected':''}}>{{$value}}</option>
                                        @endforeach--}}

                                        @foreach($cate_levels as $key=>$value)
                                        <option value="{{$key}}" {{($categories->parent_id==$key)?' selected':''}}>{{$value}}</option>
                                        <?php
                                        if ($key != 0) {
                                            $subCategory = DB::table('categories')->select('id', 'name')->where('parent_id', $key)->get();
                                            if (count($subCategory) > 0) {
                                                foreach ($subCategory as $subCate) {
                                                    echo '<option value="' . $subCate->id . '">&nbsp;&nbsp;--' . $subCate->name . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="code">Keterangan</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" name="description" id="description" rows="3">{{$categories->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row last">
                                <label class="col-md-2 label-control" for="projectinput4">Enable</label>
                                <div class="col-md-7">
                                    <input type="checkbox" id="input-15" name="status" value="1" {{($categories->status==0)?'':'checked'}}>
                                </div>
                            </div>

                            <div class="form-actions clearfix">
                                <div class="buttons-group float-right">
                                    <button type="submit" class="btn btn-primary mr-1">
                                        <i class="fa fa-check-square-o"></i> Simpan
                                    </button>
                                    <a class="btn btn-warning mr-1" href="{{route('product-category')}}">
                                        <i class="feather icon-x"></i> Batal
                                    </a>

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