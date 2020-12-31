@extends('admin.layouts.master')

@section('title', 'Edit Data Kupon | MZ.ID')

@section('content-header')
<link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/plugins/pickers/daterange/daterange.min.css">
<link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/vendors/css/pickers/pickadate/pickadate.css">
<link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/vendors/css/forms/toggle/switchery.min.css">


<div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title mb-0">Bordered Forms</h3>
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Produk</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Edit Kupon</a>
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
                    <form action="/admin/coupon/update/{{$coupons->id}}" class="form form-horizontal form-bordered" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-body">
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="coupon_code">Kode Kupon</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="coupon_code" value="{{$coupons->coupon_code}}" required="required" minlength="5" maxlength="15">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="amount">Jumlah Potongan</label>
                                <div class="col-md-7">
                                    <input type="number" class="form-control" name="amount" value="{{$coupons->amount}}" required="required" min="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="coupon_code">Jenis Potongan</label>
                                <div class="col-md-7">
                                    <select name="amount_type" id="amount_type" class="form-control">
                                        <option value="Percentage">Percentage</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 label-control" for="amount_type">Tanggal Kadaluarsa</label>
                                <div class="col-md-7">
                                    <!-- <input type="text" name="expiry_date" class="form-control birthdate-picker" required="required" value="" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"> -->
                                    <input type="text" class="form-control" name="expiry_date" value="{{$coupons->expiry_date}}" required="required">
                                    <span>Format YYYY-MM-DD</span>
                                </div>
                            </div>
                            <div class="form-group row last">
                                <label class="col-md-2 label-control" for="status">Enable</label>
                                <div class="col-md-7">
                                    <input type="checkbox" id="input-15" name="status" value="1" {{($coupons->status==0)?'':'checked'}}>
                                </div>
                            </div>

                            <div class="form-actions clearfix">
                                <div class="buttons-group float-right">
                                    <button type="submit" class="btn btn-primary mr-1">
                                        <i class="fa fa-check-square-o"></i> Simpan
                                    </button>
                                    <a class="btn btn-warning mr-1" href="{{route('coupon')}}">
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

@section('footer')
<script src="/adminstyle/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="/adminstyle/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="/adminstyle/app-assets/vendors/js/forms/toggle/switchery.min.js"></script>
@endsection