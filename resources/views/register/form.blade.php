<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections - User Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register-form.css') }}">
</head>
<body>
    <div class="register-container">
        <h2>User Registration</h2>

        <!-- Session Success -->
        @if(session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Session Error -->
        @if(session('error'))
            <div class="message error">
                {{ session('error') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       
<form action="{{ route('post.register') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" >

    <input type="text" name="address" placeholder="Address" value="{{ old('address') }}" >

    <input type="tel" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}" >

    <!-- Image Upload -->
    <input type="file" name="image" accept="image/*" >

    <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" >

    <input type="password" name="password" placeholder="Password" >

    <input type="password" name="password_confirmation" placeholder="Confirm Password" >

    <!-- Role Selection -->
   <select name="role_id" required>
    <option value="">-- Select Role --</option>
    @foreach($roles as $role)
        <option value="{{ $role->id }}">{{ $role->name }}</option>
    @endforeach
</select>

    <button type="submit">Register</button>
</form>
        <div class="login-links">
            <p>Already have an account? <a href="{{ route('get.login.page') }}">Login</a></p>
        </div>
    </div>
</body>
</html>