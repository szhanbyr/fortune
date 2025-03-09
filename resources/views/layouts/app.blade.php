<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'FortuneCoin')</title>
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Font Awesome for icons (assuming you're using it) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        <style>
        :root {
            --primary: #3F8CFF;
            --primary-dark: #2D6BCA;
            --secondary: #6C3CE9;
            --accent: #FFB300;
            --dark: #0E1525;
            --darker: #121A2D;
            --success: #4CAF50;
            --danger: #FF5252;
            --light: #FFFFFF;
        }
        body { 
            background-color: #0E1525; 
            color: #fff; 
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }
        header { 
            background-color: rgba(14, 21, 37, 0.95); 
            padding: 15px 30px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); 
            position: sticky; 
            top: 0; 
            z-index: 100; 
            backdrop-filter: blur(10px);
        }
        .logo { 
            font-size: 24px; 
            font-weight: 700; 
            color: var(--light);
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 30px;
            margin-right: 10px;
        }
        .logo span { 
            color: var(--primary); 
        }
        .nav-menu {
            display: flex;
            gap: 25px;
        }
        .nav-menu a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            font-size: 15px;
        }
        .nav-menu a:hover {
            color: var(--primary);
        }
        .nav-menu a.active {
            color: var(--primary);
        }
        .user-controls {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-balance {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 30px;
            padding: 6px 15px;
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 14px;
        }
        .user-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }
        .deposit-btn {
            background-color: #25C26E;
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 8px 20px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }
        .deposit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 194, 110, 0.3);
        }
        .sidebar {
            background-color: #121A2D;
            width: 180px;
            height: calc(100vh - 65px);
            position: fixed;
            top: 65px;
            left: 0;
            padding: 20px 0;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
            z-index: 99;
        }
        .menu-category {
            padding: 0 20px;
            margin-bottom: 15px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 600;
        }
        .menu-item {
            padding: 10px 20px;
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            transition: all 0.2s ease;
            text-decoration: none;
            font-size: 14px;
        }
        .menu-item:hover, .menu-item.active {
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--primary);
        }
        .menu-item i {
            margin-right: 12px;
            width: 18px;
            text-align: center;
            font-size: 16px;
        }
        .main-content {
            margin-left: 180px;
            padding: 25px;
        }
        .welcome-banner {
            background: linear-gradient(135deg, #3F8CFF, #6C3CE9);
            border-radius: 12px;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }
        .welcome-banner::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 40%;
            height: 100%;
            background-image: url('/images/players.png');
            background-size: cover;
            background-position: center;
        }
        .welcome-content h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 700;
        }
        .welcome-content p {
            font-size: 16px;
            margin-bottom: 20px;
            opacity: 0.9;
        }
        .bonus-wheel-section {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(14, 21, 37, 0.95);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .wheel-container {
            position: relative;
            width: 350px;
            height: 350px;
            margin-bottom: 25px;
        }
        .wheel {
            width: 100%;
            height: 100%;
            transition: transform 4s cubic-bezier(0.17, 0.67, 0.12, 0.99);
        }
        .wheel img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
        }
        .wheel-pointer {
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 40px;
            background-color: var(--accent);
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
            z-index: 2;
        }
        .spin-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 16px 32px;
            background-color: var(--accent);
            color: var(--dark);
            font-weight: 700;
            font-size: 18px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .spin-btn:hover {
            transform: translate(-50%, -50%) scale(1.05);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.4);
        }
        .spin-btn:disabled {
            background-color: rgba(255, 179, 0, 0.5);
            cursor: not-allowed;
        }
        .bonus-message {
            font-size: 24px;
            font-weight: 700;
            margin-top: 20px;
            text-align: center;
        }
        .bonus-wheel-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 25px;
            color: var(--light);
            text-align: center;
        }
        .promo-tag {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: var(--accent);
            color: var(--dark);
            padding: 5px 10px;
            border-radius: 6px;
            font-weight: 700;
            font-size: 14px;
        }
        .game-categories {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            overflow-x: auto;
            padding-bottom: 10px;
        }
        .game-category {
            padding: 8px 20px;
            background-color: rgba(255, 255, 255, 0.08);
            border-radius: 30px;
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.2s ease;
        }
        .game-category.active {
            background-color: var(--primary);
            color: #fff;
        }
        .games-section {
            margin-bottom: 40px;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .section-title {
            font-size: 20px;
            font-weight: 700;
        }
        .view-all {
            color: var(--primary);
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
        }
        .game-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 15px;
        }
        .game-card {
            background-color: #121A2D;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .game-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .game-thumb {
            width: 100%;
            height: 140px;
            background-color: #2A3447;
            position: relative;
        }
        .game-info {
            padding: 12px;
        }
        .game-title {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .game-provider {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
        }
        .hot-tag {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--danger);
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }
        .recent-wins {
            background-color: #121A2D;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 30px;
        }
        .wins-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        .wins-table th {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.6);
            font-weight: 500;
        }
        .wins-table td {
            padding: 12px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .wins-table tr:last-child td {
            border-bottom: none;
        }
        .win-amount {
            font-weight: 600;
        }
        .win-positive {
            color: var(--success);
        }
        .win-negative {
            color: var(--danger);
        }
        .online-count {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.6);
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .online-count i {
            color: var(--success);
            margin-right: 5px;
        }
        .bonus-counter {
            background-color: var(--accent);
            color: var(--dark);
            padding: 2px 5px;
            border-radius: 50%;
            font-size: 12px;
            font-weight: 700;
            margin-left: 10px;
            width: 18px;
            height: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
            }
            .menu-item span {
                display: none;
            }
            .menu-item i {
                margin-right: 0;
                font-size: 20px;
            }
            .main-content {
                margin-left: 70px;
            }
            .wheel-container {
                width: 300px;
                height: 300px;
            }
        }
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            .game-grid {
                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            }
            .wheel-container {
                width: 250px;
                height: 250px;
            }
            .welcome-banner::after {
                display: none;
            }
        }
    </style>
    </style>
</head>
<body>
    <!-- Navbar -->
    <header>
        <a href="{{ route('landing') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo"> Fortune<span>Coin</span>
        </a>
        <div class="nav-menu">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Home</a>
            <a href="">Games</a>
            <a href="">Slots</a>
            <a href="">Bonuses</a>
            <a href="">VIP Club</a>
        </div>
        <div class="user-controls">
            <div class="user-balance">
                <div class="user-avatar">{{ substr(auth()->user()->name ?? 'G', 0, 1) }}</div>
                <span id="balance-display">${{ number_format(auth()->user()->balance ?? 0, 2) }}</span>
            </div>
            <a href="{{ route('deposit') }}" class="deposit-btn">DEPOSIT</a>
        </div>
    </header>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="menu-category">Menu</div>
        <a href="{{ route('dashboard') }}" class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i><span>Home</span>
        </a>
        <a href="" class="menu-item"><i class="fas fa-gamepad"></i><span>Games</span></a>
        <a href="" class="menu-item"><i class="fas fa-dice"></i><span>Slots</span></a>
        <div class="menu-category">Account</div>
        <a href="" class="menu-item"><i class="fas fa-user"></i><span>Profile</span></a>
        <a href="" class="menu-item"><i class="fas fa-crown"></i><span>VIP Club</span></a>
        <a href="{{ route('deposit') }}" class="menu-item"><i class="fas fa-credit-card"></i><span>Deposit</span></a>
        <a href="{{ route('withdraw') }}" class="menu-item"><i class="fas fa-money-bill-wave"></i><span>Withdraw</span></a>
        <div class="menu-category">Info</div>
        <a href="" class="menu-item"><i class="fas fa-info-circle"></i><span>About us</span></a>
        <a href="" class="menu-item"><i class="fas fa-gift"></i><span>Promotions</span></a>
        <a href="{{ route('license') }}" class="menu-item"><i class="fas fa-certificate"></i><span>License</span></a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script>
        // Add any global JavaScript here if needed
    </script>
</body>
</html>