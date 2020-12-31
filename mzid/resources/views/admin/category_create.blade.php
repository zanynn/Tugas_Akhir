@extends('admin.layouts.master')

@section('title', 'Tambah Data Kategori Produk | MZ.ID')

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
                <h4 class="card-title" id="bordered-layout-basic-form">Tambah Data Kategori</h4>
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
                    <form action="/admin/category/create" class="form form-horizontal form-bordered" method="post" name="basic_validate" novalidate="novalidate">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-body">
                            <!-- <h4 class="form-section"><i class="feather icon-user"></i> Personal Info</h4> -->
                            <div class="form-group controls row">
                                <label class="col-md-2 label-control" for="name">Nama Kategori</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" required="required" value="{{old('name')}}" name="name" placeholder="Masukkan Nama Kategori" required="required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="projectinput1">Level Kategori</label>
                                <div class="col-md-7">
                                    <select class="select2 form-control" name="parent_id" id="default-select">
                                        @foreach($cate_levels as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
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
                                    <textarea class="form-control" value="{{old('description')}}" name="description" placeholder="Masukkan Deskripsi Kategori" required="required"></textarea>
                                </div>
                            </div>

                            <div class="form-group row last">
                                <label class="col-md-2 label-control" for="projectinput4">Enable</label>
                                <div class="col-md-7">
                                    <input type="checkbox" id="input-15" name="status" value="1">
                                </div>
                            </div>

                            <div class="form-actions clearfix">
                                <div class="buttons-group float-right">
                                    <button type="submit" class="btn btn-primary mr-1">
                                        <i class="fa fa-check-square-o"></i> Tambahkan
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