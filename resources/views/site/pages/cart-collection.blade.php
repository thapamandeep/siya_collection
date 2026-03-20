@extends('site.layout.template')

@section('content')

<div class="cart-wrapper">

    <h2 class="cart-title">Your Cart</h2>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert-error">{{ session('error') }}</div>
    @endif

    <div class="cart-container">

        <!-- LEFT: TABLE -->
        <div class="cart-table-wrapper">

            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @php $grandTotal = 0; @endphp

                    @forelse($carts as $cart)

                        @php
                            $grandTotal += $cart->total_cost;
                        @endphp

                        <tr>
                            <td class="product-cell">
                                <img src="{{ asset('storage/album/'.$cart->product->image) }}">
                                <span>{{ $cart->product->name }}</span>
                            </td>

                            <td>Rs. {{ $cart->product->cost }}</td>

                            <td>{{ $cart->quantity }}</td>

                            <td>Rs. {{ $cart->total_cost }}</td>

                            <td>
                               <a href="{{route('get.delete.cart',$cart->id)}}"> <button 
                                    class="remove-btn"
                                    type="button" >
                                    Remove
                                </button></a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5">No items in cart</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

        <!-- RIGHT: SUMMARY -->
        <div class="cart-summary">
            <h3>Order Summary</h3>

            <div class="summary-row">
                <span>Total</span>
                <span>Rs. {{ $grandTotal }}</span>
            </div>
<form action="{{route('post.purchase')}}" method="post">@csrf
            <button class="checkout-btn">Purchase</button>

            </form>
        </div>

    </div>

</div>

@endsection