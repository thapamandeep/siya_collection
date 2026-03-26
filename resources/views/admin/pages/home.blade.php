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

   @php
use App\Models\Size;
$sizes = Size::with('products')->get();
@endphp

<table class="admin-table">
    <thead>
        <tr>
            <th>Size ID</th>
            <th>Size Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sizes as $size)
            @foreach($size->products as $product)
                <tr>
                    <td>{{ $size->id }}</td>
                    <td>{{ $size->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
      
</div>
</div>


@endsection