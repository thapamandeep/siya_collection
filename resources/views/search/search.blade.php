@extends('site.layout.template')

@section('content')

<section class="shop-section">

    <!-- HEADER -->
    <div class="shop-header">
        <h2 class="shop-title">
            Search Result For: "{{ $search }}"
        </h2>
    </div>

    @if($products->count() > 0)

    <!-- PRODUCTS -->
    <div class="shop-grid">

        @foreach($products as $product)

        <div class="shop-card">

            <a href="{{ route('get.detail', $product->id) }}">

                <div class="shop-image">
                    <img src="{{ asset('storage/album/'.$product->image) }}" 
                         alt="{{ $product->name }}">
                </div>

            </a>

            <div class="shop-info">
                <h3>{{ $product->name }}</h3>

                <p class="shop-price">
                    Rs. {{ $product->cost }}
                </p>
            </div>

            <div class="shop-action">

                <a href="{{ route('get.detail', $product->id) }}">
                    <button class="shop-btn">
                        Buy Now
                    </button>
                </a>

                <span class="shop-quantity">
                    {{ $product->quantity }}
                </span>

            </div>

        </div>

        @endforeach

    </div>

    @else

    <div class="shop-header">
        <h2 class="shop-title">
            No products found 😢
        </h2>
    </div>

    @endif

</section>

@endsection