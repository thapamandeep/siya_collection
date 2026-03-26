@extends('admin.layout.app')

@section('content')

<div class="content">

    <h1>Add New Product</h1>
    <p>Create a new product for your store</p>

  

    <div class="form-container">

        <form action="{{route('post.update.product',$product->id)}}" method="POST" enctype="multipart/form-data">
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
                    value="{{ old('name',$product->name) }}" 
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

            <div class="size-selector">

    @foreach($sizes as $size)
        <div class="size-row">
            <label>{{ $size->name }}</label>

            <input 
                type="number" 
                name="sizes[{{ $size->id }}]" 
                placeholder="Qty"
                min="0"
                style="width:80px; margin-left:5px;"
            >
        </div>@extends('admin.layout.app')

@section('content')

<div class="content">

    <h1>Edit Product</h1>
    <p>Update your product details</p>

    <div class="form-container">

        <form action="{{ route('post.update.product', $product->id) }}" method="POST" enctype="multipart/form-data">
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
                    value="{{ old('name', $product->name) }}" 
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

                @if($product->image)
                    <div style="margin-top:8px;">
                        <img src="{{ asset('storage/album/'.$product->image) }}" alt="Current Image" style="width:100px; border-radius:6px;">
                    </div>
                @endif
            </div>

            <!-- Size + Color + Quantity -->
            <div class="size-color-selector">
                @foreach($sizes as $size)
                    <h4>{{ $size->name }}</h4>
                    @foreach($colors as $color)
                        <div class="size-color-row" style="margin-bottom:8px;">
                            <label>{{ $color->name }}</label>
                            <input 
                                type="number" 
                                name="stock[{{ $size->id }}][{{ $color->id }}]" 
                                placeholder="Qty"
                                min="0"
                                value=""
                                style="width:80px; margin-left:5px;"
                            >
                        </div>
                    @endforeach
                @endforeach
            </div><br>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea 
                    id="description" 
                    name="description" 
                    placeholder="Enter product description"
                    rows="4"
                >{{ old('description', $product->description) }}</textarea>
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
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Total Quantity -->
            <div class="form-group">
                <label for="quantity">Total Quantity</label>
                <input 
                    type="number" 
                    id="quantity" 
                    name="quantity" 
                    value="{{ old('quantity', $product->quantity) }}" 
                    placeholder="Enter total quantity"
                    min="1"
                >
                @error('quantity')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Cost per Unit -->
            <div class="form-group">
                <label for="cost">Cost per Unit (Rs)</label>
                <input 
                    type="number" 
                    id="cost" 
                    name="cost" 
                    value="{{ old('cost', $product->cost) }}" 
                    placeholder="Enter cost per unit"
                    min="0"
                    step="0.01"
                >
                @error('cost')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn-submit">Update Product</button>
            </div>

        </form>

    </div>

</div>

@endsection
    @endforeach

</div><br>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea 
                    id="description" 
                    name="description" 
                    placeholder="Enter product description"
                    rows="4"
                >{{ old('description',$product->description) }}</textarea>
                @error('description')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Category Select -->
            <div class="form-group">
                <label for="category_id">Choose Category</label>
                <select name="category_id" id="category_id" value="{{old('category',$product->category_id)}}">
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id',$product->category_id) == $category->id ? 'selected' : '' }}>
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
                    value="{{ old('quantity',$product->quantity) }}" 
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
                    value="{{ old('cost',$product->cost) }}" 
                    placeholder="Enter cost per unit"
                    min="0"
                    step="0.01"
                >
                @error('cost')
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