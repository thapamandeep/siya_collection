<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" href="{{ asset('css/register-form.css') }}">
</head>
<body>

<div class="auth-container">

    <!-- LEFT SIDE -->
    <div class="auth-left">
        <h1>Siya Collection</h1>
        <p>Discover the latest fashion and styles with Siya Collection.</p>
    </div>

    <!-- RIGHT SIDE -->
    <div class="auth-right">

        <div class="form-box">
            <h2>Create Account</h2>

            @if(session('success'))
    <div class="alert success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert error">
        {{ session('error') }}
    </div>
@endif

            <form action="{{ route('post.register') }}" method="POST">
                @csrf

                <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}">
                <input type="text" name="address" placeholder="Address" value="{{ old('address') }}">
                <input type="tel" name="phone_number" placeholder="Phone Number" value="{{ old('phone_number') }}">
                <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="password_confirmation" placeholder="Confirm Password">

                <select name="role_id" required>
                    <option value="">-- Select Role --</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>

                <button type="submit">Register</button>
            </form>

            <div class="login-link">
                <p>Already have an account?</p>
                <a href="{{ route('get.login.page') }}">Login</a>
            </div>

        </div>

    </div>

</div>

</body>
</html>