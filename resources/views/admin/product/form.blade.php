@extends('admin.layout.app')

@section('content')

<div class="content">

    <h1>Add New Product</h1>
    <p>Create a new product for your store</p>

    @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif

    <div class="form-container">

        <form action="{{route('post.product')}}" method="POST" enctype="multipart/form-data">
            @csrf

              @if(session('success'))
    <div class="success-message">
        {{ session('success') }}
    </div>
    @endif

            <!-- Product Name -->
            <div class="form-group">
                <label for="name">Product Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}" 
                    placeholder="Enter product name"
                >
                @error('name')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Product Image -->
            <div class="form-group">
                <label for="image">Product Image</label>
                <input 
                    type="file" 
                    id="image" 
                    name="image"
                    accept="image/*"
                >
                @error('image')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea 
                    id="description" 
                    name="description" 
                    placeholder="Enter product description"
                    rows="4"
                >{{ old('description') }}</textarea>
                @error('description')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Category Select -->
            <div class="form-group">
                <label for="category_id">Choose Category</label>
                <select name="category_id" id="category_id">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Quantity -->
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input 
                    type="number" 
                    id="quantity" 
                    name="quantity" 
                    value="{{ old('quantity') }}" 
                    placeholder="Enter quantity"
                    min="1"
                >
                @error('quantity')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Cost -->
            <div class="form-group">
                <label for="cost">Cost per Unit (Rs)</label>
                <input 
                    type="number" 
                    id="cost" 
                    name="cost" 
                    value="{{ old('cost') }}" 
                    placeholder="Enter cost per unit"
                    min="0"
                    step="0.01"
                >
                @error('cost')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Total Cost -->
            <div class="form-group">
                <label for="total_cost">Total Cost (Rs)</label>
                <input 
                    type="number" 
                    id="total_cost" 
                    name="total_cost" 
                    value="{{ old('total_cost') }}" 
                    placeholder="Enter total cost"
                    min="0"
                    step="0.01"
                >
                @error('total_cost')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn-submit">Add Product</button>
            </div>

        </form>

    </div>

</div>

@endsection