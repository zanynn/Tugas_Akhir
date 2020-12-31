@extends('admin.layouts.master')

@section('title', 'Welcome Administrator! | MZ.ID')

@section('style')
<link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/pages/timeline.min.css">
<link rel="stylesheet" type="text/css" href="/adminstyle/app-assets/css/pages/users.min.css">
@endsection

@section('content-header')
<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-primary bg-darken-2">
                        <i class="icon-camera font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                        <h5>Products</h5>
                        <h5 class="text-bold-400 mb-0"><i class="icon-plus"></i> {{$totalproduct}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-danger bg-darken-2">
                        <i class="icon-user font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-danger white media-body">
                        <h5>Users</h5>
                        <h5 class="text-bold-400 mb-0"><i class="icon-arrow-up"></i> {{$totaluser}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-warning bg-darken-2">
                        <i class="icon-basket-loaded font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-warning white media-body">
                        <h5>Orders</h5>
                        <h5 class="text-bold-400 mb-0"><i class="icon-arrow-up"></i> {{$totalorder}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-success bg-darken-2">
                        <i class="icon-wallet font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-success white media-body">
                        <h5>Total Profit</h5>
                        <h5 class="text-bold-400 mb-0"><i class="icon-arrow-up"></i> Rp {{number_format($profit)}}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row match-height">
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Products Sales</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="icon-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="icon-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <!-- <div class="card-body">
                    <div class="text-center">
                        <input type="text" data-width="80%" value="" class="knob angle-offset" data-angleOffset="90" data-readOnly="true" data-linecap="round" data-fgColor="#FF7588">
                    </div>
                </div> -->

                <div class="card-body text-center">
                    <div class="card-header mb-2">
                        <span class="success">Total Profits</span>
                        <h3 class="font-large-2 blue-grey darken-1">IDR{{number_format($profit)}}</h3>
                    </div>
                    <div class="card-content">
                        <input type="text" value="{{$ordersPrecentage}}" class="knob hide-value responsive angle-offset" data-angleOffset="0" data-thickness=".15" data-linecap="round" data-width="150" data-height="150" data-inputColor="#e1e1e1" data-readOnly="true" data-fgColor="#16D39A" data-knob-icon="icon-note">
                        <ul class="list-inline clearfix mt-2">
                            @if($ordersPrecentage >= 50)
                            <li>
                                <h1 class="blue-grey darken-1 text-bold-400">{{$ordersPrecentage}}%</h1>

                                <span class="success"><i class="icon-like"></i> Good</span>

                            </li>
                            @elseif($ordersPrecentage <= 49) <li class="pl-2">
                                <h1 class="blue-grey darken-1 text-bold-400">{{$ordersPrecentage}}%</h1>
                                <span class="warning darken-2"><i class="icon-dislike"></i> Negative</span>
                                </li>
                                @endif
                                <!-- <li class="pl-2">
                                            <h1 class="blue-grey darken-1 text-bold-400">5%</h1>
                                            <span class="warning darken-2"><i class="icon-dislike"></i> Negative</span>
                                        </li> -->
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Buyers</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content px-1">
                <div id="recent-buyers" class="media-list height-300 position-relative">
                    @foreach($orders as $order)
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            @if($order->user->image != null)
                            <div class="avatar avatar-online avatar-md"><img class="media-object rounded-circle" src="{{'/storage/'.$order->user->image}}" alt="Generic placeholder image"><i></i></div>
                            @else
                            <div class="avatar avatar-online avatar-md"><img class="media-object rounded-circle" src="/img/usericon.png" alt="Generic placeholder image"><i></i></div>
                            @endif
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading"><b>{{$order->name}}</b> | <span class="font-small-1 pt-2" style="font-color:rgba(255, 255, 255, 0.918);">{{$order->created_at->diffForHumans()}}</span> <span class="font-medium-4 float-right pt-1">Rp {{number_format($order->grand_total)}}</span></h6>
                            <p class="list-group-item-text mb-0">
                                @if($order->order_status == 'paid')
                                <span class="badge badge-success badge-pill">PAID</span>
                                @elseif($order->order_status == 'success')
                                <span class="badge badge-success badge-pill">SUCCESS</span>
                                @elseif($order->order_status == 'unpaid')
                                <span class="badge badge-danger badge-pill">UNPAID</span>
                                @endif
                            </p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<section id="user-profile-cards-with-cover-image" class="row mt-2">
    <div class="col-12">
        <h4 class="text-uppercase">Admin Profile</h4>
    </div>

    <div class="col-xl-4 col-md-6 col-12">
        <div class="card profile-card-with-cover box-shadow-2">
            <div class="card-img-top img-fluid bg-cover height-200" style="background: url('/adminstyle/app-assets/images/portrait/polinema.png');"></div>
            <div class="card-profile-image">
                <img src="/adminstyle/app-assets/images/portrait/elman.png" class="rounded-circle img-border box-shadow-4" alt="Card image">
            </div>
            <div class="profile-card-with-cover-content text-center">
                <div class="card-body">
                    <h4 class="card-title">Abdul Rahman Saleh</h4>

                    <ul class="list-inline list-inline-pipe">
                        <li>1931710038@polinema.ac.id</li>
                    </ul>
                    <h6 class="card-subtitle text-muted">Admin UI Developer</h6>
                </div>
                <div class="text-center">
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-google"><span class="fa fa-google font-medium-4"></span></a>
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-twitter"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-instagram"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="btn btn-social-icon mb-1 btn-github"><span class="fa fa-github font-medium-4"></span></a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-4 col-md-6 col-12">
        <div class="card profile-card-with-cover box-shadow-2">
            <div class="card-img-top img-fluid bg-cover height-200" style="background: url('/adminstyle/app-assets/images/portrait/polinema.png');"></div>
            <div class="card-profile-image">
                <img src="/adminstyle/app-assets/images/portrait/bu-wilda.png" class="rounded-circle img-border box-shadow-4" alt="Card image">
            </div>
            <div class="profile-card-with-cover-content text-center">
                <div class="card-body">
                    <h4 class="card-title">Wilda Imama Sabilla, S.Kom., M.Kom.</h4>

                    <ul class="list-inline list-inline-pipe">
                        <li>wildaimama@polinema.ac.id</li>
                    </ul>
                    <h6 class="card-subtitle text-muted">Managing Director</h6>
                </div>
                <div class="text-center">
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-google"><span class="fa fa-google font-medium-4"></span></a>
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-twitter"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-instagram"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="btn btn-social-icon mb-1 btn-github"><span class="fa fa-github font-medium-4"></span></a>
                </div>
            </div>
        </div>
    </div>




    <div class="col-xl-4 col-md-6 col-12">
        <div class="card profile-card-with-cover box-shadow-2">
            <div class="card-img-top img-fluid bg-cover height-200" style="background: url('/adminstyle/app-assets/images/portrait/polinema.png');"></div>
            <div class="card-profile-image">
                <img src="/adminstyle/app-assets/images/portrait/fauzan.png" class="rounded-circle img-border box-shadow-4" alt="Card image">
            </div>
            <div class="profile-card-with-cover-content text-center">
                <div class="card-body">
                    <h4 class="card-title">Muhammad Fauzan Tri Aji</h4>

                    <ul class="list-inline list-inline-pipe">
                        <li>1931710150@polinema.ac.id</li>
                    </ul>
                    <h6 class="card-subtitle text-muted">User UI Developer</h6>
                </div>
                <div class="text-center">
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-google"><span class="fa fa-google font-medium-4"></span></a>
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-twitter"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="btn btn-social-icon mr-1 mb-1 btn-instagram"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="btn btn-social-icon mb-1 btn-github"><span class="fa fa-github font-medium-4"></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
<script src="/adminstyle/app-assets/vendors/js/extensions/jquery.knob.min.js"></script>
<script src="/adminstyle/app-assets/js/scripts/extensions/knob.min.js"></script>
<script src="/adminstyle/app-assets/vendors/js/charts/raphael-min.js"></script>
<script src="/adminstyle/app-assets/vendors/js/charts/morris.min.js"></script>
<script src="/adminstyle/app-assets/vendors/js/extensions/unslider-min.js"></script>
<script src="/adminstyle/app-assets/vendors/js/timeline/horizontal-timeline.js"></script>
<script src="/adminstyle/app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
<script src="/adminstyle/app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
@endsection