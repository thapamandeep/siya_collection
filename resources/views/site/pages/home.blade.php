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

@endsection