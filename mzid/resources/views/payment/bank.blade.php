@extends('frontEnd.layouts.master')
@section('title','Choose Bank Page')
@section('slider')
@endsection
@section('content')
<h2 class="test-title text-center">Pilih Bank</h2>
<div class="bank" style="margin-top: 150px;">
    <div class="card-bank">
        <div class="imgBx">
            <img src="{{url('frontEnd/img/bank/bri.png')}}">
        </div>
        <div class="contentBx">
            <h3>Bank BRI</h3>
            <h2 class="bank-name"><small>Virtual Bank</small></h2>
            <a data-toggle="modal" data-target="#modalBri" class="buy">Bayar</a>
        </div>
    </div>
    <div class="card-bank">
        <div class="imgBx">
            <img src="{{url('frontEnd/img/bank/bca.png')}}">
        </div>
        <div class="contentBx">
            <h3>Bank BCA</h3>
            <h2 class="bank-name">Virtual Bank</h2>
            <a data-toggle="modal" data-target="#modalBca" class="buy">Bayar</a>
        </div>
    </div>
    <div class="card-bank">
        <div class="imgBx">
            <img src="{{url('frontEnd/img/bank/bni.png')}}">
        </div>
        <div class="contentBx">
            <h3>Bank BNI</h3>
            <h2 class="bank-name">Virtual Bank</h2>
            <a data-toggle="modal" data-target="#modalBni" class="buy">Bayar</a>
        </div>
    </div>
    <div class="card-bank">
        <div class="imgBx">
            <img src="{{url('frontEnd/img/bank/mandiri.png')}}">
        </div>
        <div class="contentBx">
            <h3>Bank Mandiri</h3>
            <h2 class="bank-name">Virtual Bank</h2>
            <a data-toggle="modal" data-target="#modalMandiri" class="buy">Bayar</a>
        </div>
    </div>
</div>
<div style="margin-bottom: 338px;"></div>


<div class="modal fade" id="modalBri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{url('/payment-bank')}}" method="post" class="form-horizontal" style=" padding: 30px;" enctype="multipart/form-data">
            <div class="modal-content modal-zan">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" value="{{$who_buying->id}}"></br>
                    <input type="hidden" class="form-control" name="user_id" value="{{$who_buying->user_id}}"></br>
                    <input type="hidden" class="form-control" name="session_id" value="{{$who_buying->session_id}}"></br>
                    <input type="hidden" name="user_email" value="{{$who_buying->user_email}}">
                    <input type="hidden" name="name" value="{{$who_buying->name}}">
                    <input type="hidden" name="address" value="{{$who_buying->address}}">
                    <input type="hidden" name="city" value="{{$who_buying->city}}">
                    <input type="hidden" name="pincode" value="{{$who_buying->pincode}}">
                    <input type="hidden" name="province" value="{{$who_buying->province}}">
                    <input type="hidden" name="mobile" value="{{$who_buying->mobile}}">
                    <input type="hidden" name="coupon_code" value="{{$who_buying->coupon_code}}">
                    <input type="hidden" name="coupon_amount" value="{{$who_buying->coupon_amount}}">
                    <input type="hidden" name="payment_method" value="Bank BRI">
                    <input type="hidden" name="grand_total" value="{{$who_buying->grand_total}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <legend>Pembayaran</legend>
                    <div class="top-bri-modal">
                        <p>Total Pembayaran :</p>
                        <div class="total">
                            <span>IDR{{number_format($who_buying->grand_total)}}</span>
                        </div>
                    </div>
                    <div class="kode-bri-modal">
                        <p>Kode Pembayaran </p>
                        <h2>{{$who_buying->id}}{{$who_buying->mobile}}</h2>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="upload-zan"></br>
                            <p>Bukti Pembayaran </p>
                            <input type="file" name="image_poof" style="margin-top: 60px; margin-left:30px;"></br>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="order_status" value="paid">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="margin-top: 0;">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalBca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{url('/payment-bank')}}" method="post" class="form-horizontal" style=" padding: 30px;" enctype="multipart/form-data">
            <div class="modal-content modal-zan">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" value="{{$who_buying->id}}"></br>
                    <input type="hidden" class="form-control" name="user_id" value="{{$who_buying->user_id}}"></br>
                    <input type="hidden" class="form-control" name="session_id" value="{{$who_buying->session_id}}"></br>
                    <input type="hidden" name="user_email" value="{{$who_buying->user_email}}">
                    <input type="hidden" name="name" value="{{$who_buying->name}}">
                    <input type="hidden" name="address" value="{{$who_buying->address}}">
                    <input type="hidden" name="city" value="{{$who_buying->city}}">
                    <input type="hidden" name="pincode" value="{{$who_buying->pincode}}">
                    <input type="hidden" name="province" value="{{$who_buying->province}}">
                    <input type="hidden" name="mobile" value="{{$who_buying->mobile}}">
                    <input type="hidden" name="coupon_code" value="{{$who_buying->coupon_code}}">
                    <input type="hidden" name="coupon_amount" value="{{$who_buying->coupon_amount}}">
                    <input type="hidden" name="payment_method" value="Bank Bca">
                    <input type="hidden" name="grand_total" value="{{$who_buying->grand_total}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <legend>Pembayaran</legend>
                    <div class="top-bri-modal">
                        <p>Total Pembayaran :</p>
                        <div class="total">
                            <span>IDR{{number_format($who_buying->grand_total)}}</span>
                        </div>
                    </div>
                    <div class="kode-bri-modal">
                        <p>Kode Pembayaran </p>
                        <h2>{{$who_buying->id}}{{$who_buying->mobile}}</h2>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="upload-zan"></br>
                            <p>Bukti Pembayaran </p>
                            <input type="file" name="image_poof" style="margin-top: 60px; margin-left:30px;"></br>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="order_status" value="paid">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="margin-top: 0;">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalBni" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{url('/payment-bank')}}" method="post" class="form-horizontal" style=" padding: 30px;" enctype="multipart/form-data">
            <div class="modal-content modal-zan">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" value="{{$who_buying->id}}"></br>
                    <input type="hidden" class="form-control" name="user_id" value="{{$who_buying->user_id}}"></br>
                    <input type="hidden" class="form-control" name="session_id" value="{{$who_buying->session_id}}"></br>
                    <input type="hidden" name="user_email" value="{{$who_buying->user_email}}">
                    <input type="hidden" name="name" value="{{$who_buying->name}}">
                    <input type="hidden" name="address" value="{{$who_buying->address}}">
                    <input type="hidden" name="city" value="{{$who_buying->city}}">
                    <input type="hidden" name="pincode" value="{{$who_buying->pincode}}">
                    <input type="hidden" name="province" value="{{$who_buying->province}}">
                    <input type="hidden" name="mobile" value="{{$who_buying->mobile}}">
                    <input type="hidden" name="coupon_code" value="{{$who_buying->coupon_code}}">
                    <input type="hidden" name="coupon_amount" value="{{$who_buying->coupon_amount}}">
                    <input type="hidden" name="payment_method" value="Bank Bni">
                    <input type="hidden" name="grand_total" value="{{$who_buying->grand_total}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <legend>Pembayaran</legend>
                    <div class="top-bri-modal">
                        <p>Total Pembayaran :</p>
                        <div class="total">
                            <span>IDR{{number_format($who_buying->grand_total)}}</span>
                        </div>
                    </div>
                    <div class="kode-bri-modal">
                        <p>Kode Pembayaran </p>
                        <h2>{{$who_buying->id}}{{$who_buying->mobile}}</h2>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="upload-zan"></br>
                            <p>Bukti Pembayaran </p>
                            <input type="file" name="image_poof" style="margin-top: 60px; margin-left:30px;"></br>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="order_status" value="paid">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="margin-top: 0;">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalMandiri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{url('/payment-bank')}}" method="post" class="form-horizontal" style=" padding: 30px;" enctype="multipart/form-data">
            <div class="modal-content modal-zan">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" value="{{$who_buying->id}}"></br>
                    <input type="hidden" class="form-control" name="user_id" value="{{$who_buying->user_id}}"></br>
                    <input type="hidden" class="form-control" name="session_id" value="{{$who_buying->session_id}}"></br>
                    <input type="hidden" name="user_email" value="{{$who_buying->user_email}}">
                    <input type="hidden" name="name" value="{{$who_buying->name}}">
                    <input type="hidden" name="address" value="{{$who_buying->address}}">
                    <input type="hidden" name="city" value="{{$who_buying->city}}">
                    <input type="hidden" name="pincode" value="{{$who_buying->pincode}}">
                    <input type="hidden" name="province" value="{{$who_buying->province}}">
                    <input type="hidden" name="mobile" value="{{$who_buying->mobile}}">
                    <input type="hidden" name="coupon_code" value="{{$who_buying->coupon_code}}">
                    <input type="hidden" name="coupon_amount" value="{{$who_buying->coupon_amount}}">
                    <input type="hidden" name="payment_method" value="Bank Mandiri">
                    <input type="hidden" name="grand_total" value="{{$who_buying->grand_total}}">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <legend>Pembayaran</legend>
                    <div class="top-bri-modal">
                        <p>Total Pembayaran :</p>
                        <div class="total">
                            <span>IDR{{number_format($who_buying->grand_total)}}</span>
                        </div>
                    </div>
                    <div class="kode-bri-modal">
                        <p>Kode Pembayaran </p>
                        <h2>{{$who_buying->id}}{{$who_buying->mobile}}</h2>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="upload-zan"></br>
                            <p>Bukti Pembayaran </p>
                            <input type="file" name="image_poof" style="margin-top: 60px; margin-left:30px;"></br>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="order_status" value="paid">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" style="margin-top: 0;">Upload</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection