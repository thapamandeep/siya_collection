<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="auth-container">

    <!-- LEFT SIDE -->
    <div class="auth-left">
        <h1>Siya Collection</h1>
        <p>Reset your password securely and regain access to your account.</p>
    </div>

    <!-- RIGHT SIDE -->
    <div class="auth-right">
        <div class="form-box">

            <h2>Forgot Password</h2>

            <p style="font-size:13px; text-align:center; margin-bottom:10px; color:#555;">
                Enter your email to receive otp
            </p>

            {{-- Success Message --}}
            @if(session('status'))
                <div class="alert success">
                    {{ session('status') }}
                </div>
            @endif

           

            <form action="{{route('post.otp.password')}}" method="POST">
                @csrf

                <input type="email" name="email" placeholder="Email Address" required>

                <button type="submit">Send Reset Link</button>
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