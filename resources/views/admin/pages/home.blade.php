@extends('admin.layout.app')
@section('content')

<div class="content">

    <h1>Welcome to Siya Collection</h1>
    <p>Your online fashion store dashboard</p>

    <div class="dashboard-cards">

        <div class="card">
            <h3><i class="fas fa-box"></i> Total Products</h3>
            <p>10</p>
        </div>

        <div class="card">
            <h3><i class="fas fa-shopping-cart"></i> Total Orders</h3>
            <p>2</p>
        </div>

        <div class="card">
            <h3><i class="fas fa-user"></i> Total Users</h3>
            <p>2</p>
        </div>

        <div class="card">
            <h3><i class="fas fa-money-bill-wave"></i> Total Revenue</h3>
            <p>Rs 2500</p>
        </div>

    </div>

</div>

@endsection