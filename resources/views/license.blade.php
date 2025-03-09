@extends('layouts.app')
@section('title', 'License')
@section('content')
    <style>
        header { background-color: var(--darker); padding: 20px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); position: sticky; top: 0; z-index: 100; }
        .logo { font-size: 28px; font-weight: 700; color: var(--light); }
        .logo span { color: var(--primary); }
        .auth-buttons { display: flex; gap: 15px; }
        .container { max-width: 1200px; margin: 40px auto; padding: 0 20px; text-align: center; }
        h2 { font-size: 28px; font-weight: 700; margin-bottom: 25px; }
        p { font-size: 18px; opacity: 0.9; }
        footer { background-color: var(--darker); padding: 20px; text-align: center; box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.3); }
        marquee { margin-top: 15px; font-size: 16px; color: var(--success); }
    </style>
    <header>
        <a href="{{ route('landing') }}" class="logo">Fake <span>Casino</span></a>
        <div class="auth-buttons">
            @auth
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-outline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline">Log In</a>
            @endauth
        </div>
    </header>
    <div class="container">
        <h2>Our License</h2>
        <p>License details coming soon. (Placeholder for client edit)</p>
    </div>
    <footer>
        <a href="{{ route('license') }}">License</a>
        <marquee>Player1 won $500! | Player2 won $1,000! | Player3 won $750!</marquee>
    </footer>
@endsection