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

 <!-- PROFILE SECTION -->
<div id="profileSection" class="profile-container" >
    
    <div class="profile-card">

    @if(Auth::check())
 
    
        <div class="profile-header">
                <span id="closeProfile" class="close-btn">&times;</span>
            <h2>{{ auth()->user()->name }}</h2>
            <p>{{ auth()->user()->email }}</p>
        </div>

        <div class="profile-body">

            <div class="profile-row">
                <label>Name:</label>
                <span>{{ auth()->user()->name }}</span>
            </div>

            <div class="profile-row">
                <label>Email:</label>
                <span>{{ auth()->user()->email }}</span>
            </div>

            <div class="profile-row">
                <label>Phone:</label>
                <span>{{ auth()->user()->phone_number ?? 'N/A' }}</span>
            </div>

            <div class="profile-row">
                <label>Address:</label>
                <span>{{ auth()->user()->address ?? 'N/A' }}</span>
            </div>

        </div>

        <div class="profile-footer">
            <a href="{{route('get.edit.profile',Auth::user()->id)}}" class="edit-btn">Edit Profile</a>
        </div>
        @else
        <a href="{{route('get.login.page')}}"></a>
@endif
    </div>

</div>


@foreach($categories as $category)

<section class="shop-section">

    <!-- ✅ Category Name -->
    <h2 class="shop-title">{{ $category->name }}</h2>

    <div class="shop-grid">

        @foreach($category->products as $product)

        <div class="shop-card">

            <a href="{{route('get.detail',$product->id)}}">
                <div class="shop-image">
                    <img src="{{ asset('storage/album/'.$product->image) }}" alt="{{ $product->name }}">
                </div>
            </a>

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

@endforeach
@endsection