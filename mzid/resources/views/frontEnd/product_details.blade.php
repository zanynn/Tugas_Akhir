@extends('frontEnd.layouts.master')
@section('title','Detail | MZ.ID')
@include('frontEnd.layouts.btn-fixed')
@section('slider')
@endsection
@section('content')
<section class="product2">
    <div class="row">
        <div class="col-sm-3 text-center">
            @include('frontEnd.layouts.category_menu')
        </div>
        <div class="col-sm-9 padding-right">
            <div class="cardImgzan0">
                @if(Session::has('message'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('message')}}
                </div>
                @endif
                <div class="imgBx">
                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                        <a href="{{'/storage/'.$detail_product->image}}">
                            <img src="{{'/storage/'.$detail_product->image}}" width="450" alt="" id="dynamicImage">
                        </a>
                    </div>
                    <ul class="thumbnails" style="margin-left: -10px;">
                        <li class="zanPmini">
                            @foreach($imagesGalleries as $imagesGallery)
                            <a class="zanPminiImg" href="{{'/storage/'.$imagesGallery->image}}" data-standard="{{'/storage/'.$imagesGallery->image}}">
                                <img src="{{'/storage/'.$imagesGallery->image}}" alt="" width="75" style="padding: 8px;">
                            </a>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
            <form action="{{route('addToCart')}}" method="post" role="form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="product_id" value="{{$detail_product->id}}">
                <input type="hidden" name="product_name" value="{{$detail_product->name}}">
                <input type="hidden" name="product_code" value="{{$detail_product->code}}">
                <input type="hidden" name="product_color" value="{{$detail_product->color}}">
                <input type="hidden" name="user_email" value="{{Auth::user()->email}}">
                <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">

                <div class="zanAvailableBx">
                    @if($totalStock>0)
                    <span id="availableStock" class="av">Stok Tersedia</span>
                    @else
                    <span id="availableStock" class="av">Tidak Tersedia</span>
                    @endif
                </div>
                <div class="cardImgzan">
                    <div class="contentBx">
                        <h3 class="name1">{{$detail_product->name}}</h3>
                        <h3 class="code">{{$detail_product->code}}</h3>
                        <h3 class="desc">
                            {{$detail_product->description}}
                        </h3>
                        <span id="dynamic_price" class="price">IDR{{number_format($detail_product->price)}}</span>
                        <span>
                            <select name="size" id="idSize" class="form-control">
                                <option value="">Select Size</option>
                                @foreach($detail_product->attributes as $attrs)
                                <option value="{{$detail_product->id}}-{{$attrs->size}}">{{$attrs->size}}</option>
                                @endforeach
                            </select>
                        </span>
                        <h3 class="code">Quantity:</h3>
                        <input class="inputqty0" type="text" name="quantity" value="{{$totalStock}}" id="inputStock" />
                        @if($totalStock>0)
                        <button type="submit" class="buy" id="buttonAddToCart">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                        @endif
                        <a href=""><img src="{{asset('frontEnd/images/product-details/share.png')}}" class="zanShare" alt="" /></a>
                    </div>
                </div>
        </div>
    </div>
    </div>
    <!--recommended_items-->
    <h2 class="test-title-small">Kategori yang sama</h2>

    <?php $countChunk = 0; ?>
    @foreach($relateProducts->chunk(3) as $chunk)
    <?php $countChunk++; ?>
    <div class="item<?php if ($countChunk == 1) {
                        echo ' active';
                    } ?>">
        @php $i = 0; @endphp
        @foreach($chunk as $item)
        @if(++$i <= 1) <div class="card-zanRec">
            <div class="single-products">
                <div class="imgBx">
                    <img src="{{'/storage/'.$item->image}}" alt="" style="width: 150px;" />
                    <div class="contentBx">
                        <h3>{{$item->name}}</h3>
                        <h2 class="price">IDR{{number_format($item->price)}}</h2>
                        <a href="{{url('/product-detail',$item->id)}}" class="buy">View Product</a>
                    </div>
                </div>
            </div>
    </div>
    @endif
    @endforeach
    @endforeach
    </div>
</section>
<script>
    document.querySelector('.custom-select-wrapper').addEventListener('click', function() {
        this.querySelector('.custom-select').classList.toggle('open');

        for (const option of document.querySelectorAll(".custom-option")) {
            option.addEventListener('click', function() {
                if (!this.classList.contains('selected')) {
                    this.parentNode.querySelector('.custom-option.selected').classList.remove('selected');
                    this.classList.add('selected');
                    this.closest('.custom-select').querySelector('.custom-select__trigger span').textContent = this.textContent;
                }
            })
        }
        window.addEventListener('click', function(e) {
            const select = document.querySelector('.custom-select')
            if (!select.contains(e.target)) {
                select.classList.remove('open');
            }
        });

    })
</script>
@endsection