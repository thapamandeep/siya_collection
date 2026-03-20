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
                <button class="heroe-shop-btn">Shop Now</button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination (dots) -->
    <div class="swiper-pagination"></div>
</section>

<section class="shop-section">

    <h2 class="shop-title">Our Products</h2>

    <div class="shop-grid">

        @foreach($products as $product)

        <div class="shop-card">

           <a href="{{route('get.detail',$product->id)}}"> <div class="shop-image">
                <img src="{{ asset('storage/album/'.$product->image) }}" alt="{{ $product->name }}">
            </div></a>

            <div class="shop-info">
                <h3>{{ $product->name }}</h3>
                <p class="shop-price">Rs. {{ $product->cost }}</p>
            </div>

            <div class="shop-action">
                <a href="{{ route('get.detail', $product->id) }}">
                    <button class="shop-btn">Buy Now</button>
                </a>
            </div>

        </div>

        @endforeach

    </div>

</section>
@endsection