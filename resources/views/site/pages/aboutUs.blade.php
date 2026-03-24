@extends('site.layout.template')

@section('content')

<div class="about-container">

    <div class="about-wrapper">

        <!-- LEFT SIDE (TEXT) -->
         @foreach($abouts as $about)
        <div class="about-content">
            <h1>{{$about->title}}</h1>

            <p class="about-text">
              {{$about->description}}
            </p>

            

            <div class="about-highlight">
                <h3>Why Choose Us?</h3>
                <ul>
                    <li>✔ Premium Quality Products</li>
                    <li>✔ Affordable Price</li>
                    <li>✔ Fast Delivery</li>
                    <li>✔ Customer Satisfaction</li>
                </ul>
            </div>
        </div>

        <!-- RIGHT SIDE (IMAGE) -->
        <div class="about-image">
            
            <img src="{{ asset('storage/photos/'.$about->image) }}" alt="About Siya Collection">
        </div>
@endforeach
    </div>

</div>

@endsection