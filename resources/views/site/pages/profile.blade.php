@extends('site.layout.template')

@section('content')

<div class="profile-container">
    <div class="profile-card">

        <div class="profile-header">
            <h2>My Profile</h2>
            <p>Account Information</p>
        </div>

        <div class="profile-body">
            <div class="profile-row">
                <label>Name:</label>
                <span>{{ Auth::user()->name }}</span>
            </div>

            <div class="profile-row">
                <label>Email:</label>
                <span>{{ Auth::user()->email }}</span>
            </div>

            <div class="profile-row">
                <label>Phone:</label>
                <span>{{ Auth::user()->phone_number }}</span>
            </div>
        </div>

        <div class="profile-footer">
            <button class="edit-btn">Edit Profile</button>
        </div>

    </div>
</div>

@endsection