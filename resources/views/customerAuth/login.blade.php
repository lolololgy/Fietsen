<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hoofdpagina.css') }}">
    <title>Login</title>
    <style>
        /* Styling the form container */
        .login-form {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            padding: 30px;
            background-color: #f4f4f9;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .login-form .form-group {
            margin-bottom: 15px;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            margin: 10px 0;
        }

        .input-field:focus {
            border-color: #66afe9;
            outline: none;
        }

        /* Styling the submit button */
        .submit-btn {
            width: 100%;
            padding: 14px;
            font-size: 1.1em;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        /* Styling the register link */
        .register-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            text-decoration: none;
            font-size: 1.1em;
            color: #007bff;
        }

        .register-link:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
{{--<header class="header">--}}
{{--    <div class="container">--}}
{{--        <div class="logo"><a href="{{route('home')}}"><img src="assets/icons/bike.png" alt="logo"></a></div>--}}
{{--        <nav class="nav">--}}
{{--            <a href="{{route('webshop')}}" class="nav-btn shop-link"><span>Webshop</span></a>--}}
{{--            <a href="#" class="nav-btn">Reviews</a>--}}
{{--            <a href="#" class="nav-btn">Contact</a>--}}
{{--        </nav>--}}
{{--        <div class="user-actions">--}}
{{--            <a href="{{{route('login')}}}" class="login-btn">Inloggen</a>--}}
{{--            <a href="{{route('register')}}" class="registreer-btn">Registreren</a>--}}
{{--            <a href="{{route('winkelmand')}}" class="cart-btn"><img src="assets/icons/shopping-bag.png" alt="shopping cart"></a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}



<form method="POST" action="{{ route('login') }}" class="login-form">
    @csrf
    <div class="form-group">
        <input type="email" name="email" placeholder="Email" class="input-field" required><br>
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Password" class="input-field" required><br>
    </div>
    <button type="submit" class="submit-btn">Login</button>
    <br>
    <a href="{{ route('register') }}" class="register-link">Don't have an account? Register here</a>
    <a href="{{ route('home') }}" class="register-link">Go home</a>
</form>
</body>
</html>
