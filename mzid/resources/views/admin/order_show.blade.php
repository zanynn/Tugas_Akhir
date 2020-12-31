@extends('admin.layouts.master')

@section('title', 'Invoice Pembelian | MZ.ID')

@section('style')
<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/pages/app-invoice.min.css">
<!-- END: Page CSS-->
@endsection
@section('content-header')
<div class="content-header-left col-md-6 col-12 mb-2">
    <h3 class="content-header-title mb-0">Data Pembelian</h3>
    <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Pembelian</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Invoice</a>
                </li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="app-invoice-wrapper">
    <div class="row">
        <div class="col-xl-9 col-md-8 col-12 printable-content">
            <!-- using a bootstrap card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body p-2">
                    <!-- card-header -->
                    <div class="card-header px-0">
                        <div class="row">
                            <div class="col-md-12 col-lg-7 col-xl-4 mb-50">
                                <span class="invoice-id font-weight-bold">Invoice# </span>
                                <span>{{$orders->id}}{{$orders->mobile}}</span>
                            </div>
                            <div class="col-md-12 col-lg-5 col-xl-8">
                                <div class="d-flex align-items-center justify-content-end justify-content-xs-start">
                                    <div class="issue-date pr-2">
                                        <span class="font-weight-bold no-wrap">Tanggal: </span>
                                        <span>{{$orders->created_at}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- invoice logo and title -->
                    <div class="invoice-logo-title row py-2">
                        <div class="col-6 d-flex flex-column justify-content-center align-items-start">
                            <h2 class="text-primary">Invoice</h2>
                            <span>MZ.ID Online Shop</span>
                        </div>
                        <div class="col-6 d-flex justify-content-end invoice-logo">
                            <img src="/adminstyle/app-assets/images/logo/pixinvent-logo.png" alt="company-logo" height="46" width="164">
                        </div>
                    </div>
                    <hr>

                    <!-- invoice address and contacts -->
                    <div class="row invoice-adress-info py-2">
                        <div class="col-6 mt-1 from-info">
                            <div class="info-title mb-1">
                                <span>Billing To: </span>
                            </div>
                            <div class="company-name mb-1">
                                <span class="text-muted">{{$users->name}}</span>
                            </div>
                            <div class="company-address mb-1">
                                <span class="text-muted">{{$users->address}}, {{$users->city}}, {{$users->province}}</span>
                            </div>
                            <div class="company-email  mb-1 mb-1">
                                <span class="text-muted">{{$users->email}}</span>
                            </div>
                            <div class="company-phone  mb-1">
                                <span class="text-muted">{{$users->mobile}}</span>
                            </div>
                        </div>
                        <div class="col-6 mt-1 to-info">
                            <div class="info-title mb-1">
                                <span>Shipped To:</span>
                            </div>
                            <div class="company-name mb-1">
                                <span class="text-muted">{{$orders->name}}</span>
                            </div>
                            <div class="company-address mb-1">
                                <span class="text-muted">{{$orders->address}}, {{$orders->city}}, {{$orders->province}}</span>
                            </div>
                            <div class="company-email mb-1">
                                <span class="text-muted">{{$orders->user_email}}</span>
                            </div>
                            <div class="company-phone  mb-1">
                                <span class="text-muted">{{$orders->mobile}}</span>
                            </div>
                        </div>
                    </div>

                    <!--product details table -->
                    <div class="product-details-table py-2 table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">ITEM</th>
                                    <th scope="col">KODE</th>
                                    <th scope="col">BIAYA</th>
                                    <th scope="col">QTY</th>
                                    <th scope="col">HARGA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carts as $cart)
                                @if($cart->session_id == $orders->session_id)
                                <tr>
                                    <td>{{$cart->product_name}}</td>
                                    <td>{{$cart->product_code}}</td>
                                    <td>{{$cart->price}}</td>
                                    <td>{{$cart->quantity}}</td>
                                    <td class="font-weight-bold">{{$cart->price*$cart->quantity}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>

                    <!-- invoice total -->
                    <div class="invoice-total py-2">
                        <div class="row">
                            <div class="col-4 col-sm-6 mt-75">
                                <p>Thanks for your business.</p>
                            </div>
                            <div class="col-8 col-sm-6 d-flex justify-content-end mt-75">
                                <ul class="list-group cost-list">
                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                        <span class="cost-title mr-2">Subtotal </span>
                                        <span class="cost-value">IDR{{number_format($orders->grand_total + $orders->coupon_amount)}}K</span>
                                    </li>
                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                        <span class="cost-title mr-2">Discount </span>
                                        <span class="cost-value">-IDR{{number_format($orders->coupon_amount)}}K</span>
                                    </li>
                                    <li class="dropdown-divider"></li>
                                    <li class="list-group-item each-cost border-0 p-50 d-flex justify-content-between">
                                        <span class="cost-title mr-2">Invoice Total </span>
                                        <span class="cost-value">IDR {{number_format($orders->grand_total)}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- buttons section -->
        <div class="col-xl-3 col-md-4 col-12 action-btns">
            <div class="card">
                <div class="card-body p-2">
                    <div class="form-group">
                        <h5>Bukti Pembayaran</h5>
                        <p align="justify">Ketika pelanggan telah melakukan pembayaran, maka akan muncul tombol di bawah ini <i class="icon-arrow-down"></i></p>
                        <!-- Button trigger modal -->

                        @if($orders->image_poof != null)
                        <button type="button" class="btn btn-primary block btn-lg" data-toggle="modal" data-target="#default">
                            Lihat Bukti Pembayaran
                        </button>
                        @endif
                        <!-- Modal -->
                        <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel1">BUKTI PEMBAYARAN</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" align="center">
                                        <h5>{{$orders->payment_method}}</h5>
                                        <img src="{{('/storage/'.$orders->image_poof)}}" alt="Card image" width="400" height="500">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@section('footer')
<!-- BEGIN: Page JS-->
<script src="/adminstyle/app-assets/js/scripts/pages/app-invoice.min.js"></script>
<!-- END: Page JS-->
@endsection