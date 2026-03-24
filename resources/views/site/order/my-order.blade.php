@extends('site.layout.template')

@section('content')

<div class="orders-wrapper">

    <div class="orders-card">

        <h2>My Orders</h2>

        @if($orders->count() > 0)

        <table class="orders-table">

            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $order->product->name ?? 'N/A' }}</td>

                    <td>
                        <img src="{{ asset('storage/album/'.$order->product->image) }}" alt="product">
                    </td>

                    <td>{{ $order->quantity }}</td>

                    @php
                    
                    if(Auth::check())

                    $total_cost = $order->quantity * $order->product->cost;

                    else

                    $total_cost = 0;
                    
                    @endphp

                    <td>Rs. {{ $total_cost }}</td>

                    <td>
                        @if($order->status == 'pending')
                            <span class="status pending">Pending</span>

                        @elseif($order->status == 'completed')
                            <span class="status completed">Completed</span>

                        @else
                            <span class="status other">{{ $order->status }}</span>
                        @endif
                    </td>

                    <td>{{ $order->created_at->format('d M Y') }}</td>

                    
                    @if(Auth::check())
                     <td> 
                        @if($order->status == 'delivered')
                <a href="{{route('get.product.review',$order->product->id)}}">  <button>Review</button></a>

                   @else
                        <Button>Remove</Button>
                        
                   @endif
                    </td>
                   @endif

                </tr>
                @endforeach
            </tbody>

        </table>

        @else
            <div class="no-orders">No Orders Found 😢</div>
        @endif

    </div>

</div>

@endsection