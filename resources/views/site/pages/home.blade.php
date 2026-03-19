@extends('site.layout.template')

@section('content')



<section class="hero swiper-container main-swiper">
    <div class="swiper-wrapper">
        @foreach($heroes as $hero)
        <div class="swiper-slide">
            <div class="hero-left">
                <img src="{{ asset('storage/album/'.$hero->image) }}" alt="">
            </div>
            <div class="hero-right">
                <h4>{{$hero->discount}}</h4>
                <h1>{{$hero->title}}</h1>
                <p>{{$hero->message}}</p>
                <button class="shop-btn">Shop Now</button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination (dots) -->
    <div class="swiper-pagination"></div>
</section>

   
<section class="products-section">
    <h2 class="section-title">Our Products</h2>

    <div class="product-grid">
        @foreach($products as $product)
        <div class="product-card">
            <div class="product-img">
               <a href="{{route('get.detail',$product->id)}}"><img src="{{ asset('storage/album/'.$product->image) }}" alt=""></a> 
            </div>

            <div class="product-info">
                <h3>{{$product->name}}</h3>
                <p class="price">Rs. {{$product->cost}}</p>
                <button class="buy-btn">Buy Now</button>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection