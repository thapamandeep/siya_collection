<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="auth-container">

    <!-- LEFT SIDE -->
    <div class="auth-left">
        <h1>Siya Collection</h1>
        <p>Manage your account and access your dashboard securely.</p>
    </div>

    <!-- RIGHT SIDE -->
    <div class="auth-right">
        <div class="form-box">

            <h2>Login</h2>

   
         

            <!-- Success (optional) -->
            @if(session('success'))
                <div class="alert success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('post.login') }}" method="POST">
                @csrf

                <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" autofocus>
                <input type="password" name="password" placeholder="Password" >

                <button type="submit">Login</button>
            </form>

            <div class="forgot-link">
    <a href="{{ route('get.forgot.password') }}">Forgot Password?</a>
</div>


            <div class="login-link">
                <p>Don't have an account? 
                    <a href="{{ route('get.register') }}">Register</a>
                </p>
            </div>

        </div>
    </div>

</div>

</body>
</html>