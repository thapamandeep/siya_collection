@extends('admin.layout.app')

@section('content')

<div class="content">

    <h1>Update Category</h1>
    <p>Update a category for your products</p>

    <div class="form-container">

        <form action="{{route('post.update.category',$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
                @endif

            <!-- Category Name -->
            <div class="form-group">
                <label for="name">Category Name</label>

                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name',$category->name) }}"
                    placeholder="Enter category name"
                    
                >

                @error('name')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Category Image -->
            <div class="form-group">
                <label for="image">Category Image</label>

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

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn-submit">
                    Update Category
                </button>
            </div>

        </form>

    </div>

</div>

@endsection