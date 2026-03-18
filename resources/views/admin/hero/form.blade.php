@extends('admin.layout.app')
@section('content')

<form action="{{route('post.heroes')}}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
    @csrf

    <!-- Success Message -->
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<!-- Error Message -->
@if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

    <!-- Title -->
    <div class="mb-4">
        <label class="block font-semibold mb-1">Title</label>
        <input type="text" name="title" class="w-full border rounded px-3 py-2" placeholder="Enter title" >
    </div>

    <!-- Message -->
    <div class="mb-4">
        <label class="block font-semibold mb-1">Message</label>
        <textarea name="message" class="w-full border rounded px-3 py-2" rows="3" placeholder="Enter message" ></textarea>
    </div>

    <!-- Discount -->
    <div class="mb-4">
        <label class="block font-semibold mb-1">Discount</label>
        <input type="text" name="discount" class="w-full border rounded px-3 py-2" placeholder="e.g. 10% or Rs 100">
    </div>

    <!-- Image -->
    <div class="mb-4">
        <label class="block font-semibold mb-1">Image</label>
        <input type="file" name="image" class="w-full border rounded px-3 py-2" >
    </div>

    <!-- Submit -->
    <div>
        <button type="submit" class="bg-black text-white px-6 py-2 rounded hover:bg-gray-800">
            Save Hero
        </button>
    </div>

</form>

@endsection