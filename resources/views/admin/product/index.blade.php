@extends('admin.layout.app')

@section('content')

<div class="content">

    <h1>Products</h1>
    <p>Manage your products</p>

    @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-container">

        <table class="product-table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>

                    <td>
                        <img src="{{ asset('storage/album/'.$product->image) }}" class="prod-img">
                    </td>

                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>Nrs{{ $product->cost }}</td>
                    <td>{{ $product->quantity }}</td>

                    <td class="actions">
                        <a href="{{ route('get.edit.product', $product->id) }}" class="edit-btn">Edit</a>
                        <a href="{{ route('get.delete.product', $product->id) }}" class="delete-btn">Delete</a>

                       
                           
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>

@endsection