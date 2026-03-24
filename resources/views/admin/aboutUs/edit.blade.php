@extends('admin.layout.app')

@section('content')

<div class="container py-4">

    <h2 class="mb-4">Edit About Us</h2>

 

    <form action="{{ route('post.update.about', $about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
       
           @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <!-- Title -->
        <div class="mb-3">
            <label>Title</label>
            <input type="text" 
                   name="title" 
                   class="form-control" 
                   value="{{ old('title', $about->title) }}">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" rows="5" class="form-control">{{ old('description', $about->description) }}</textarea>
        </div>

        <!-- Old Image -->
        @if($about->image)
            <div class="mb-3">
                <label>Current Image</label><br>
                <img src="{{ asset('storage/photos/'.$about->image) }}" width="120" class="rounded">
            </div>
        @endif

        <!-- New Image -->
        <div class="mb-3">
            <label>Change Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update About Us</button>

    </form>

</div>

@endsection