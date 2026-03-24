@extends('site.layout.template')

@section('content')

<div class="profile-container">

    <div class="profile-card">

        <!-- HEADER -->
        <div class="profile-header">
            <h2>My Profile</h2>
            <p>Manage your account details</p>
        </div>

        <!-- PROFILE IMAGE -->
       
        <!-- BODY -->
        <div class="profile-body">

            <div class="profile-row">
                <label>Name</label>
                <span>{{ auth()->user()->name }}</span>
            </div>

            <div class="profile-row">
                <label>Email</label>
                <span>{{ auth()->user()->email }}</span>
            </div>

            <div class="profile-row">
                <label>Phone</label>
                <span>{{ auth()->user()->phone ?? 'N/A' }}</span>
            </div>

            <div class="profile-row">
                <label>Address</label>
                <span>{{ auth()->user()->address ?? 'N/A' }}</span>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="profile-footer">
            <a href="#" class="edit-btn">Edit Profile</a>
        </div>

    </div>

</div>

@endsection