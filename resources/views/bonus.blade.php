@extends('layouts.app')
@section('title', 'Bonus')
@section('content')
    <style>
        header { background-color: var(--darker); padding: 20px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); position: sticky; top: 0; z-index: 100; }
        .logo { font-size: 28px; font-weight: 700; color: var(--light); }
        .logo span { color: var(--primary); }
        .auth-buttons { display: flex; gap: 15px; }
        .container { max-width: 600px; margin: 40px auto; padding: 0 20px; text-align: center; }
        h2 { font-size: 28px; font-weight: 700; margin-bottom: 25px; }
        .wheel-container { position: relative; width: 300px; height: 300px; margin: 0 auto 30px; }
        .wheel { width: 100%; height: 100%; background-color: var(--darker); border-radius: 50%; transition: transform 4s ease-out; }
        .spin-btn { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 14px 28px; background-color: var(--accent); color: var(--dark); font-weight: 600; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); transition: all 0.3s ease; }
        .spin-btn:hover { transform: translate(-50%, -50%) scale(1.05); box-shadow: 0 6px 16px rgba(0, 0, 0, 0.4); }
        .spin-btn:disabled { background-color: rgba(255, 179, 0, 0.5); cursor: not-allowed; }
        .bonus-message { background-color: rgba(67, 160, 71, 0.1); border-left: 4px solid var(--success); padding: 15px; margin-bottom: 20px; border-radius: 8px; font-size: 16px; }
        form { display: inline-block; }
    </style>
    <header>
        <a href="{{ route('landing') }}" class="logo">Fake <span>Casino</span></a>
        <div class="auth-buttons">
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-outline">Logout</button>
            </form>
        </div>
    </header>
    <div class="container">
        <h2>Claim Your Welcome Bonus</h2>
        @if (session('bonus_message'))
            <div class="bonus-message">{{ session('bonus_message') }}</div>
        @endif
        <div class="wheel-container">
            <div class="wheel" id="wheel"></div>
            <form method="POST" action="{{ route('bonus.spin') }}">
                @csrf
                <button type="submit" class="spin-btn" id="spin-btn">Spin</button>
            </form>
        </div>
        <p>Spin the wheel to win up to $1,000!</p>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const spinBtn = document.getElementById('spin-btn');
            const wheel = document.getElementById('wheel');
            let isSpinning = false;

            spinBtn.addEventListener('click', (e) => {
                if (isSpinning) e.preventDefault();
                isSpinning = true;
                spinBtn.disabled = true;
                wheel.style.transform = `rotate(${360 * 5 + Math.random() * 360}deg)`;
                setTimeout(() => {
                    isSpinning = false;
                }, 4000);
            });
        });
    </script>
@endsection