@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <style>
        :root {
            --dark: #1a1a2e; /* Dark background */
            --light: #ffffff; /* White text */
            --primary: #00b4d8; /* Bright cyan-blue for CTAs */
            --secondary: #7209b7; /* Purple for gradients */
            --primary-dark: #16213e; /* Darker shade for gradients */
            --accent: #f72585; /* Pink for highlights */
            --success: #90e0ef; /* Light cyan for success messages */
            --darker: #0f172a; /* Even darker shade for form background */
            --danger: #d81b60; /* For error messages */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--dark), var(--primary-dark) 70%);
            color: var(--light);
            line-height: 1.6;
        }

        header {
            background-color: var(--dark);
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--light);
            text-decoration: none;
        }

        .logo span {
            color: var(--primary);
        }

        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-links a {
            color: var(--light);
            text-decoration: none;
            font-size: 16px;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .nav-links a:hover {
            opacity: 1;
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary);
            color: var(--dark);
            border: none;
        }

        .btn-primary:hover {
            background-color: #0098b8; /* Slightly darker cyan */
        }

        .btn-outline {
            border: 2px solid var(--primary);
            color: var(--primary);
            background-color: transparent;
        }

        .btn-outline:hover {
            background-color: rgba(0, 180, 216, 0.2);
        }

        .container {
            max-width: 480px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
            text-transform: uppercase;
        }

        form {
            background-color: var(--darker);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
            text-align: left;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            color: var(--light);
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: var(--primary);
            background-color: rgba(255, 255, 255, 0.1);
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-group input[type="checkbox"] {
            margin-right: 10px;
        }

        .checkbox-group label {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        .form-footer {
            text-align: center;
        }

        .form-footer .btn {
            width: 100%;
            padding: 14px;
            font-size: 16px;
        }

        .form-link {
            text-align: center;
            margin-top: 20px;
        }

        .form-link a {
            color: var(--primary);
            text-decoration: none;
            font-size: 14px;
        }

        .form-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            background-color: rgba(216, 27, 96, 0.1);
            border-left: 4px solid var(--danger);
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
        }
    </style>
    <header>
        <a href="{{ route('landing') }}" class="logo">Fortune<span>Coin</span></a>
        <div class="nav-links">
            <a href="#">Take your free reward</a>
            <a href="#">About us</a>
            <a href="#">F.A.Q.</a>
            <a href="#">Bonuses</a>
            <div class="auth-buttons">
                @auth
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-outline">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline">Log in</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endauth
            </div>
        </div>
    </header>
    <div class="container">
        <h2>Log in</h2>
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>
            <div class="form-link">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </form>
    </div>
@endsection