@extends('site.layout.template')
@section('content')

<div class="payment-wrapper">

    <div class="payment-card">

        <h2>Select Payment Method</h2>

        {{-- 🔥 eSewa Payment --}}
        <form action="https://esewa.com.np" method="get">

            <!-- Amount -->
            <input value="{{ $total }}" name="tAmt" type="hidden">
            <input value="{{ $total }}" name="amt" type="hidden">
            <input value="0" name="txAmt" type="hidden">
            <input value="0" name="psc" type="hidden">
            <input value="0" name="pdc" type="hidden">

            <!-- Merchant code -->
            <input value="EPAYTEST" name="scd" type="hidden">

            <!-- Unique ID -->
            <input value="{{ uniqid() }}" name="pid" type="hidden">

            <!-- Success / Fail -->
            <input value="https://google.com" type="hidden" name="su">
            <input value="https://google.com" type="hidden" name="fu">

            <button type="submit" class="pay-btn">Pay with eSewa</button>

        </form>

        <br>

        {{-- 🔜 Khalti (future) --}}
        <button class="pay-btn" disabled>Khalti (Coming Soon)</button>

        <br><br>

        {{-- 🔜 Fonepay --}}
        <button class="pay-btn" disabled>Fonepay (Coming Soon)</button>

    </div>

</div>

@endsection