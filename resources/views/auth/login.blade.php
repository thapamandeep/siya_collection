<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    
</head>
<body>
    <div class="login-container">
        <h2>Collections Login</h2>

        <!-- Display errors -->
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('post.login')}}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" autofocus>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>
        </form>

        <div class="login-links">
            <p><a href="#">Forgot Password?</a></p>
            <p>Don't have an account? <a href="#">Register</a></p>
        </div>
    </div>
</body>
</html>