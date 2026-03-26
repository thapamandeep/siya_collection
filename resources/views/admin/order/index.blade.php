@extends('admin.layout.app')

@section('content')

<div class="content">

<h1>Orders</h1>
<p>Order List</p>

@if(session('success'))
<div class="success-message">
    {{ session('success') }}
</div>
@endif

<div class="table-container">

<table class="category-table">

<thead>
<tr>
<th>ID</th>
<th>Image</th>
<th>User Name</th>
<th>Title</th>
<th>Size</th>
<th>Color</th>
<th>Quantity</th>
<th>Cost</th>
<th>Category</th>
<th>Status</th>
<th>Created At</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@foreach($orders as $order)

<tr>
<td>{{ $loop->iteration }}</td>

<td>
    @if(optional($order->product)->image)
        <img src="{{ asset('storage/album/'.$order->product->image) }}" class="cat-img">
    @else
        <img src="https://via.placeholder.com/60">
    @endif
</td>

<td>{{ optional($order->user)->name ?? 'N/A' }}</td>

<td>{{ optional($order->product)->name ?? 'Deleted Product' }}</td>

<td>{{$order->size->name}}</td>
<td>{{$order->color->name}}</td>

<td>{{ $order->quantity }}</td>

<td>
    {{ optional($order->product)->cost 
        ? $order->product->cost * $order->quantity 
        : 'N/A' }}
</td>

<td>{{ optional($order->product)->category_id ?? 'N/A' }}</td>

<td>
    <span class="status {{ $order->status }}">
        {{ ucfirst($order->status) }}
    </span>
</td>

<td>
    {{ optional($order->product)->created_at 
        ? $order->product->created_at->format('d M Y') 
        : 'N/A' }}
</td>

<td class="action-buttons">
   <a href="{{route('order.processing.user',$order->id)}}"><button class="btn-processing">Processing</button></a> 
  <a href="{{route('order.shipping.user',$order->id)}}">  <button class="btn-shipping">Shipping</button></a>
   <a href="{{route('order.delivered.user',$order->id)}}"><button class="btn-delivered">Delivered</button></a> 
</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

@endsection