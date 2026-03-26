@extends('admin.layout.app')

@section('content')

<div class="content">

    <h1>Add New Color</h1>
    <p>Create a new color for your store</p>

    <div class="form-container">

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.color.store') }}" method="POST">
            @csrf

            <!-- Color Name -->
            <div class="form-group">
                <label for="name">Color Name</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name') }}" 
                    placeholder="Enter color name"
                >
                @error('name')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" class="btn-submit">Add Color</button>
            </div>

        </form>

    </div>

</div>

@endsection