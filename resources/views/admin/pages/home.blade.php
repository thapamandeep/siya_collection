@extends('admin.layout.app')
@section('content')

<div class="content">

    <h1>Welcome to Siya Collection</h1>
    <p>Your online fashion store dashboard</p>

    <div class="dashboard-cards">
@php
use App\Models\Product;
$total_products = Product::count();
@endphp

<div class="card">
    <h3><i class="fas fa-box"></i> Total Products</h3>
    <p>{{ $total_products }}</p>
</div>

@php
use App\Models\Order;
$total_orders = Order::count();
@endphp
        <div class="card">
            <h3><i class="fas fa-shopping-cart"></i> Total Orders</h3>
            <p>{{$total_orders}}</p>
        </div>

        @php 
        use App\Models\User;
        $total_user = User::count();
        @endphp
        <div class="card">
            <h3><i class="fas fa-user"></i> Total Users</h3>
            <p>{{$total_user}}</p>
        </div>
@php
use App\Models\Category;
$total_category = Category::count();
@endphp
        <div class="card">
            <h3><i class="fas fa-money-bill-wave"></i> Total Category</h3>
            <p>{{$total_category}}</p>
        </div>

    </div>

</div>

@endsection