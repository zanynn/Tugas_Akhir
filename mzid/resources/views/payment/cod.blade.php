@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')
<div class="container" style="margin-top: 150px;">
    <form action="{{url('/payment-cod')}}" method="post" class="form-horizontal" style=" padding: 30px;">
        <input type="hidden" class="form-control" name="id" value="{{$user_order->id}}"></br>
        <input type="hidden" class="form-control" name="user_id" value="{{$user_order->user_id}}"></br>
        <input type="hidden" class="form-control" name="session_id" value="{{$user_order->session_id}}"></br>
        <input type="hidden" name="user_email" value="{{$user_order->user_email}}">
        <input type="hidden" name="name" value="{{$user_order->name}}">
        <input type="hidden" name="address" value="{{$user_order->address}}">
        <input type="hidden" name="city" value="{{$user_order->city}}">
        <input type="hidden" name="pincode" value="{{$user_order->pincode}}">
        <input type="hidden" name="province" value="{{$user_order->province}}">
        <input type="hidden" name="mobile" value="{{$user_order->mobile}}">
        <input type="hidden" name="coupon_code" value="{{$user_order->coupon_code}}">
        <input type="hidden" name="coupon_amount" value="{{$user_order->coupon_amount}}">
        <input type="hidden" name="payment_method" value="COD">
        <input type="hidden" name="grand_total" value="{{$user_order->grand_total}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="order_status">
        <h3 class=" table-font-color text-center">PESANAN ANDA TELAH DILAKUKAN</h3>
        <p class="table-font-color text-center">Terima kasih atas Pesanan Anda yang menggunakan Opsi Cash On Delivery</p>
        <p class="table-font-color text-center">Kami akan menghubungi Anda melalui Email Anda (<b>{{$user_order->user_email}}</b>) atau Nomor Telepon Anda (<b>{{$user_order->mobile}}</b>)</p>
        <button class="zan-button-cod" type="submit">Kembali Ke Home</button>
</div>
<div style="margin-bottom: 338px;"></div>
@endsection