<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="auth-container">

    <!-- LEFT SIDE -->
    <div class="auth-left">
        <h1>Siya Collection</h1>
        <p>Create a new password for your account securely.</p>
    </div>

    <!-- RIGHT SIDE -->
    <div class="auth-right">
        <div class="form-box">

            <h2>Reset Password</h2>

            {{-- Success Message --}}
            @if(session('status'))
                <div class="alert success">
                    {{ session('status') }}
                </div>
            @endif

          

            <form method="post" action="{{route('post.new.password')}}">
                @csrf

                <!-- OTP Field -->
                <input type="text" name="otp" placeholder="Enter OTP" >

                <!-- Email -->
                <input type="email" name="email" placeholder="Email Address" value="{{ old('email', $email ?? '') }}" >

                <!-- New Password -->
                <input type="password" name="new_password" placeholder="New Password" >

                <!-- Confirm Password -->
                <input type="password" name="confirm_password" placeholder="Confirm Password" >

                <button type="submit">Reset Password</button>
            </form>

            <div class="login-link">
                <p>Back to 
                    <a href="{{ route('get.login.page') }}">Login</a>
                </p>
            </div>

        </div>
    </div>

</div>

</body>
</html>