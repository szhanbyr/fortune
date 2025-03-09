@extends('layouts.app')
@section('title', 'Withdraw')
@section('content')
    <style>
        header { background-color: var(--darker); padding: 20px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); position: sticky; top: 0; z-index: 100; }
        .logo { font-size: 28px; font-weight: 700; color: var(--light); }
        .logo span { color: var(--primary); }
        .auth-buttons { display: flex; gap: 15px; }
        .container { max-width: 480px; margin: 40px auto; padding: 0 20px; }
        h2 { font-size: 28px; font-weight: 700; margin-bottom: 25px; text-align: center; }
        form { background-color: var(--darker); border-radius: 12px; padding: 30px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 500; color: rgba(255, 255, 255, 0.9); }
        input { width: 100%; padding: 12px 16px; background-color: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 8px; color: var(--light); font-size: 16px; outline: none; transition: all 0.3s ease; }
        input:focus { border-color: var(--primary); background-color: rgba(255, 255, 255, 0.1); }
        .payment-methods { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; margin-bottom: 20px; }
        .payment-method { background-color: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.2); border-radius: 8px; padding: 15px; text-align: center; cursor: pointer; transition: all 0.3s ease; }
        .payment-method.active { background-color: rgba(30, 136, 229, 0.1); border-color: var(--primary); }
        .payment-method i { font-size: 24px; margin-bottom: 8px; }
        .form-footer { text-align: center; }
        .form-footer .btn { width: 100%; padding: 14px; font-size: 16px; }
        .success-message { background-color: rgba(67, 160, 71, 0.1); border-left: 4px solid var(--success); padding: 15px; margin-bottom: 20px; border-radius: 8px; font-size: 16px; }
        .error-message { background-color: rgba(216, 27, 96, 0.1); border-left: 4px solid var(--danger); padding: 15px; margin-bottom: 20px; border-radius: 8px; font-size: 14px; }
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
        <h2>Withdraw Funds</h2>
        @if (session('message'))
            <div class="success-message">{{ session('message') }}</div>
        @endif
        @if (session('error'))
            <div class="error-message">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('withdraw.post') }}">
            @csrf
            <div class="form-group">
                <label>Select Method</label>
                <div class="payment-methods">
                    <div class="payment-method active" data-method="crypto">
                        <i class="fab fa-bitcoin"></i>
                        <p>Crypto</p>
                    </div>
                    <div class="payment-method" data-method="bank">
                        <i class="fas fa-university"></i>
                        <p>Bank</p>
                    </div>
                </div>
                <input type="hidden" name="method" id="method" value="crypto">
            </div>
            <div class="form-group">
                <label for="address">Withdrawal Address</label>
                <input type="text" id="address" name="address" required placeholder="Enter wallet or bank details">
            </div>
            <div class="form-group">
                <label for="amount">Amount ($)</label>
                <input type="number" id="amount" name="amount" min="1" step="0.01" required placeholder="Enter amount">
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Withdraw</button>
            </div>
        </form>
    </div>
    <script>
        document.querySelectorAll('.payment-method').forEach(method => {
            method.addEventListener('click', () => {
                document.querySelectorAll('.payment-method').forEach(m => m.classList.remove('active'));
                method.classList.add('active');
                document.getElementById('method').value = method.dataset.method;
            });
        });
    </script>
@endsection