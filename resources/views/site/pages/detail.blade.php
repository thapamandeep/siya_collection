@extends('site.layout.template')

@section('content')

<div class="product-wrapper">

    <!-- SUCCESS MESSAGE -->
  

    <!-- PRODUCT CARD -->
    <div class="product-card">

      @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- ERROR MESSAGE -->
    @if(session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif

        <!-- LEFT IMAGE -->
        <div class="product-left">
            <div class="image-box">
                <img src="{{ asset('storage/album/'.$product->image) }}" alt="{{ $product->name }}">
            </div>
        </div>

        <!-- RIGHT DETAILS -->
        <div class="product-right">

            <h1 class="title">{{ $product->name }}</h1>

            <p class="price">Rs. {{ $product->cost }}</p>

            <p class="desc">{{ $product->description }}</p>

            <!-- FORM -->
            <form action="{{ route('post.add.cart',$product->id) }}" method="POST">
                @csrf

                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <!-- SIZE SELECT -->
<div class="sizes">
    <label>Select Size</label>

    <div class="size-options">
        @foreach($product->sizes as $size)
            <label class="size-option">

                <input 
                    type="radio" 
                    name="size_id" 
                    value="{{ $size->id }}"
                >

                <span>
                    {{ $size->name }} 
                 
                </span>

            </label>
        @endforeach
    </div>
</div>

                <!-- QUANTITY -->
                <div class="qty">
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="1" min="1">
                </div>

                <!-- BUTTONS -->
                <div class="actions">
                    <button type="submit" class="btn-cart">Add to Cart</button>
                    <button type="button" class="btn-buy">Buy Now</button>
                </div>

            </form>

        </div>

    </div>

 
</div>

   <!-- =========================
     REVIEWS SECTION
========================= -->
<div class="reviews-section">

    <h2>Customer Reviews</h2>

    @if($product->reviews->count() > 0)

        @foreach($reviews as $review)

            <div class="review-item">

                <div class="review-header">
                    <strong>{{ $review->user->name ?? 'User' }}</strong>
                    <span class="review-rating">
                        ⭐ {{ $review->rate }}
                    </span>
                </div>

                <p class="review-message">
                    {{ $review->message }}
                </p>

                <small class="review-date">
                    {{ $review->created_at->format('d M Y') }}
                </small>

            </div>

        @endforeach

    @else
        <p class="no-reviews">No reviews yet 😢</p>
    @endif

</div>

@endsection