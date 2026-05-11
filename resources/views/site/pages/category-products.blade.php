@extends('site.layout.template')

@section('content')

<section class="shop-section">

    <div class="shop-header">
        <h2 class="shop-title">
            {{ $category->name }} Products
        </h2>
    </div>

    @if($category->products->count() > 0)

    <div class="shop-grid">

        @foreach($category->products as $product)

        <div class="shop-card">

            <a href="{{ route('get.detail', $product->id) }}">
                <div class="shop-image">
                    <img src="{{ asset('storage/album/'.$product->image) }}" 
                         alt="{{ $product->name }}">
                </div>
            </a>

            <div class="shop-info">
                <h3>{{ $product->name }}</h3>
                <p class="shop-price">Rs. {{ $product->cost }}</p>
            </div>

        </div>

        @endforeach

    </div>

    @else
        <p>No products in this category</p>
    @endif

</section>

@endsection