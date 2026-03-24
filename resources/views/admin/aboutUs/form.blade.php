@extends('admin.layout.app')

@section('content')

<div class="container py-4">

    <h2 class="mb-4">Add About Us</h2>

 

    <form action="{{route('post.about.us')}}" method="POST" enctype="multipart/form-data">
        @csrf

           @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

        <!-- Title -->
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" rows="5" class="form-control" placeholder="Write about your company..."></textarea>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save About Us</button>

    </form>

</div>

@endsection