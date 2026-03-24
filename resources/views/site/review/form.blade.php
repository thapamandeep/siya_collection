@extends('site.layout.template')
@section('content')
<div class="review-wrapper">

    <div class="review-card">

        <!-- LEFT SIDE -->
        <div class="review-left">
            <img src="{{ asset('storage/album/'.$product->image) }}" alt="product">
            <h4>{{ $product->name }}</h4>
        </div>

        <!-- RIGHT SIDE -->
        <div class="review-right">

            <h2>Write a Review</h2>

            <form action="{{route('post.product.review',$product->id)}}" method="POST">
                @csrf


                <div class="form-group">
                    <label>Rating</label>
                    <select name="rate" >
                        <option value="">Select Rating</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Your Review</label>
                    <textarea name="message" rows="4" ></textarea>
                </div>

                <button type="submit" class="submit-btn">Submit Review</button>

                @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
@endif

            </form>

        </div>

    </div>

</div>
@endsection