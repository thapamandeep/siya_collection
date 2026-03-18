@extends('admin.layout.app')

@section('content')

<div class="content">

    <h1>Add New Category</h1>
    <p>Create a new category for your products</p>

    <div class="form-container">

        <form action="{{ route('post.category') }}" method="POST" enctype="multipart/form-data">
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
                    value="{{ old('name') }}"
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
                    Add Category
                </button>
            </div>

        </form>

    </div>

</div>

@endsection