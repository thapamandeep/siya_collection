@extends('site.layout.template')

@section('content')

<div class="contact-wrapper">

    <!-- LEFT SIDE (FORM) -->
    <div class="contact-left">

        <div class="contact-inner">

            <div class="contact-header">
                <h2>Contact Us</h2>
                <p>Feel free to send us a message 😊</p>
            </div>

            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{route('post.contact.us')}}" method="POST">
                @csrf

                <!-- Name -->
                <div class="contact-row">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name">
                    @error('name')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Email -->
                <div class="contact-row">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                    @error('email')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Message -->
                <div class="contact-row">
                    <label>Message</label>
                    <textarea name="message" rows="4" placeholder="Write your message...">{{ old('message') }}</textarea>
                    @error('message')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Button -->
                <button type="submit" class="send-btn">Send Message</button>

            </form>

        </div>

    </div>

    <!-- RIGHT SIDE (IMAGE + BLACK BG) -->
  <div class="contact-right">
    <div class="contact-image-box">
        <img src="{{ asset('img/contact-us.png') }}" alt="Contact Image">
         
    </div>
</div>
</div>

@endsection