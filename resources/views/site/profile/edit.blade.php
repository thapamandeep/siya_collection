@extends('site.layout.template')

@section('content')

<div class="about-container">

    <div class="about-wrapper">

        <div class="profile-header">
            <span onclick="history.back()" class="close-btn">&times;</span>
            <h2>Edit Profile</h2>
        </div>

        <div class="profile-body">

            <form action="#" method="POST">
                @csrf
              

                <!-- Name -->
                <div class="profile-row">
                    <label>Name:</label>
                    <input type="text" name="name" 
                        value="{{ old('name', auth()->user()->name) }}" 
                        class="form-control">
                </div>

                <!-- Email -->
                <div class="profile-row">
                    <label>Email:</label>
                    <input type="email" name="email" 
                        value="{{ old('email', auth()->user()->email) }}" 
                        class="form-control">
                </div>

                <!-- Phone -->
                <div class="profile-row">
                    <label>Phone:</label>
                    <input type="text" name="phone_number" 
                        value="{{ old('phone_number', auth()->user()->phone_number) }}" 
                        class="form-control">
                </div>

                <!-- Address -->
                <div class="profile-row">
                    <label>Address:</label>
                    <input type="text" name="address" 
                        value="{{ old('address', auth()->user()->address) }}" 
                        class="form-control">
                </div>

                <!-- Submit -->
                <div class="profile-footer">
                    <button type="submit" class="save-btn">Update Profile</button>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection