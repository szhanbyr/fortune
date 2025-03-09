@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
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


    <div class="main-content">
        <div class="welcome-banner">
            <div class="welcome-content">
                <h1>HELLO, GREAT TO SEE YOU BACK!</h1>
                <p>Enjoy the ultimate gaming experience.</p>
                <a href="{{ route('deposit') }}" class="deposit-btn">DEPOSIT NOW</a>
            </div>
            <div class="promo-tag">VIP Club</div>
        </div>

        <div class="online-count">
            <i class="fas fa-circle"></i> 5,454 players online
        </div>

        <div class="games-section">
            <div class="game-categories">
                <div class="game-category active">All</div>
                <div class="game-category">Original</div>
                <div class="game-category">Slots</div>
                <div class="game-category">Table</div>
                <div class="game-category">Crash</div>
                <div class="game-category">Dice</div>
                <div class="game-category">Mines</div>
                <div class="game-category">Plinko</div>
            </div>

            <div class="section-header">
                <h2 class="section-title">Top Rated Games</h2>
                <a href="" class="view-all">View all</a>
            </div>
            <div class="game-grid">
                <div class="game-card">
                    <div class="game-thumb" style="background-image: url('{{ asset('images/games/chicken.png') }}'); background-size: cover;"></div>
                    <div class="game-info">
                        <div class="game-title">Chicken Cross</div>
                        <div class="game-provider">Original</div>
                    </div>
                </div>
                <div class="game-card">
                    <div class="game-thumb" style="background-image: url('{{ asset('images/games/dice.png') }}'); background-size: cover;"></div>
                    <div class="game-info">
                        <div class="game-title">Dice</div>
                        <div class="game-provider">Original</div>
                    </div>
                </div>
                <div class="game-card">
                    <div class="game-thumb" style="background-image: url('{{ asset('images/games/plinko.png') }}'); background-size: cover;"></div>
                    <div class="game-info">
                        <div class="game-title">Plinko 1000</div>
                        <div class="game-provider">Original</div>
                        <span class="hot-tag">HOT</span>
                    </div>
                </div>
                <div class="game-card">
                    <div class="game-thumb" style="background-image: url('{{ asset('images/games/avia.png') }}'); background-size: cover;"></div>
                    <div class="game-info">
                        <div class="game-title">Avia Masters</div>
                        <div class="game-provider">Original</div>
                    </div>
                </div>
                <div class="game-card">
                    <div class="game-thumb" style="background-image: url('{{ asset('images/games/mines.png') }}'); background-size: cover;"></div>
                    <div class="game-info">
                        <div class="game-title">Mines</div>
                        <div class="game-provider">Original</div>
                    </div>
                </div>
                <div class="game-card">
                    <div class="game-thumb" style="background-image: url('{{ asset('images/games/santa.png') }}'); background-size: cover;"></div>
                    <div class="game-info">
                        <div class="game-title">Gates of Olympus</div>
                        <div class="game-provider">Pragmatic</div>
                        <span class="hot-tag">HOT</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="recent-wins">
            <div class="section-header">
                <h2 class="section-title">Recent Big Wins</h2>
            </div>
            <table class="wins-table">
                <thead>
                    <tr>
                        <th>Player</th>
                        <th>Game</th>
                        <th>Bet</th>
                        <th>Winning</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>w..k...</td>
                        <td>Candyflip</td>
                        <td>$75.00</td>
                        <td class="win-amount win-positive">$483.75</td>
                    </tr>
                    <tr>
                        <td>d...n...</td>
                        <td>Crash</td>
                        <td>$500.00</td>
                        <td class="win-amount win-negative">$0.00</td>
                    </tr>
                    <tr>
                        <td>s...e...</td>
                        <td>Plinko</td>
                        <td>$500.00</td>
                        <td class="win-amount win-negative">$0.00</td>
                    </tr>
                    <tr>
                        <td>w...r...</td>
                        <td>Plinko</td>
                        <td>$500.00</td>
                        <td class="win-amount win-negative">$0.00</td>
                    </tr>
                    <tr>
                        <td>c...t...</td>
                        <td>Mines</td>
                        <td>$500.00</td>
                        <td class="win-amount win-positive">$846.87</td>
                    </tr>
                    <tr>
                        <td>b...k...</td>
                        <td>Mines</td>
                        <td>$250.00</td>
                        <td class="win-amount win-negative">$0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @if (auth()->user()->just_registered && !auth()->user()->bonus_spun)
    <div class="bonus-wheel-section" id="bonus-wheel-section">
        <div class="bonus-wheel-title">Welcome Bonus</div>
        <div class="wheel-container">
            <div class="wheel-pointer"></div>
            <div class="wheel" id="wheel">
                <img src="{{ asset('images/spin-wheel.png') }}" alt="Spin Wheel">
            </div>
            <button class="spin-btn" id="spin-btn">SPIN NOW</button>
        </div>
        <div class="bonus-message" id="bonus-message">Spin the wheel to claim your $50 bonus!</div>
    </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const spinBtn = document.getElementById('spin-btn');
            const wheel = document.getElementById('wheel');
            const bonusSection = document.getElementById('bonus-wheel-section');
            const bonusMessage = document.getElementById('bonus-message');
            const balanceDisplay = document.getElementById('balance-display');
            
            if (spinBtn && wheel) {
                let isSpinning = false;
                
                spinBtn.addEventListener('click', (e) => {
                    if (isSpinning) return;
                    
                    isSpinning = true;
                    spinBtn.disabled = true;
                    
                    // Random rotation between 5-8 full spins + random angle
                    const spins = 5 + Math.floor(Math.random() * 3);
                    const extraAngle = Math.floor(Math.random() * 360);
                    const totalRotation = spins * 360 + extraAngle;
                    
                    wheel.style.transform = `rotate(${totalRotation}deg)`;
                    
                    // After animation completes
                    setTimeout(() => {
                        isSpinning = false;
                        bonusMessage.textContent = 'Congratulations! You won $50 bonus!';
                        
                        // Update balance via AJAX
                        fetch('{{ route("dashboard.spin") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                // Update the balance display
                                if (balanceDisplay) {
                                    balanceDisplay.textContent = '$' + data.new_balance.toFixed(2);
                                }
                                
                                // Hide wheel section after 3 seconds and never show again
                                setTimeout(() => {
                                    if (bonusSection) {
                                        bonusSection.style.display = 'none';
                                    }
                                }, 3000);
                            }
                        });
                    }, 4000);
                });
            }
            
            // Game category selection
            const categories = document.querySelectorAll('.game-category');
            categories.forEach(category => {
                category.addEventListener('click', () => {
                    categories.forEach(c => c.classList.remove('active'));
                    category.classList.add('active');
                });
            });
        });
    </script>
@endsection