@extends('frontEnd.layouts.master')
@section('title','Search | MZ.ID')
@include('frontEnd.layouts.btn-fixed')
@section('content')
<link href="{{asset('frontEnd/css/font-awesome.min.css')}}" rel="stylesheet">

<section style="margin-top: 150px;">

    <h2 class="test-title text-center">Our Team</h2>
</section>
<div class="container-about">
    <img class="wood" src="{{url('frontEnd/img/about/wood2.png')}}">
    <div class="card">
        <div class="img-box">
            <img src="{{url('frontEnd/img/about/elman.jpg')}}">
        </div>
        <div class="content">
            <h2>Abdul Rahman Saleh<br><span>Back-End UI Developer</span></h2>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> elrahman259@gmail.com
                <br><i class="fa fa-phone" aria-hidden="true"></i> 082143614124</p>
            <ul>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="img-box">
            <img src="{{url('frontEnd/img/about/buwilda.png')}}">
        </div>
        <div class="content">
            <h2>Wilda Imama Sabilla, S.Kom., M.Kom.<br><span>Managing Directory</span></h2>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> wildaimama@polinema.ac.id
                <br><i class="fa fa-phone" aria-hidden="true"></i> 085649655285</p>
            <ul>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="img-box">
            <img src="{{url('frontEnd/img/about/zan.jpg')}}">
        </div>
        <div class="content">
            <h2>Muhammad Fauzan Tri Aji<br><span>Front-End UI Developer</span></h2>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> zanynnnn@gmail.com
                <br><i class="fa fa-phone" aria-hidden="true"></i> 089666930901</p>
            <ul>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<section style="margin-top: 380px;"></section>
@endsection