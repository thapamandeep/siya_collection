@extends('site.layout.template')
@section('content')

<div class="payment-wrapper">

    <div class="payment-card">

        <h2>Select Payment Method</h2>

        <form action="{{route('post.initiate')}}" method="POST">
            @csrf

            <label class="payment-option">
                <input type="radio" name="method" value="esewa">
                <span>eSewa</span>
            </label>

            <label class="payment-option">
                <input type="radio" name="method" value="khalti">
                <span>Khalti</span>
            </label>

            <label class="payment-option">
                <input type="radio" name="method" value="fonepay">
                <span>Fonepay</span>
            </label>

            <button type="submit" class="pay-btn">Pay Now</button>
        </form>

    </div>

</div>

@endsection