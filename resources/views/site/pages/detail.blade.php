@extends('site.layout.template')

@section('content')

<div class="product-detail-container">

    <div class="product-detail">

        <!-- LEFT IMAGE -->
        <div class="product-image">
            <img src="{{ asset('storage/album/'.$product->image) }}" alt="{{ $product->name }}">
        </div>

        <!-- RIGHT INFO -->
        <div class="product-info">

            <h1 class="product-title">{{ $product->name }}</h1>

            <p class="product-price">Rs. {{ $product->cost }}</p>

            <p class="product-description">
                {{ $product->description }}
            </p>

            <!-- Quantity -->
            <div class="quantity-box">
                <label>Quantity:</label>
                <input type="number" value="1" min="1">
            </div>

            <!-- Buttons -->
            <div class="product-actions">
                <button class="add-cart-btn">Add to Cart</button>
                <button class="buy-now-btn">Buy Now</button>
            </div>

        </div>

    </div>

</div>

@endsection