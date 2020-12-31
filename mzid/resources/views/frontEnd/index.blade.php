@extends('frontEnd.layouts.master')
@section('title','Home | MZ.ID')
@include('frontEnd.layouts.btn-fixed')
@section('content')
@include('frontEnd.layouts.slider')
<section class="product">
    @include('frontEnd.layouts.search')
    <h2 class="test-title text-center">What we have to offer</h2>
    <div class="row">
        <div class="col-sm-3 text-center">
            @include('frontEnd.layouts.category_menu')
        </div>
        <div class="col-sm-9 padding-right">
            @php $i = 0; @endphp
            @foreach($products as $product)
            @if($product->category->status==1)
            @if(++$i <= 6) <div class="col-sm-4">
                <div class="card-zan">
                    <div class="imgBx">
                        <img src="{{'/storage/'.$product->image}}">
                    </div>
                    <div class="contentBx">
                        <h3>{{$product->name}}</h3>
                        <h2 class="price">IDR{{number_format($product->price)}}</h2>
                        @guest
                        <a href="/MustLogin" class="buy">View Product</a>
                        @else
                        <a href="{{url('/product-detail',$product->id)}}" class="buy">View Product</a>
                        @endguest
                    </div>
                </div>
        </div>
        @endif
        @endif
        @endforeach
        <a href="/list-products" class="btn btn-trzan float-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> See More</a>
    </div>
    </div>
</section>
@endsection