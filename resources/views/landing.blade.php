<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to FortuneCoin</title>
    <style>
        :root {
            --dark: #1a1a2e; /* Dark background */
            --light: #ffffff; /* White text */
            --primary: #00b4d8; /* Bright cyan-blue for CTAs */
            --secondary: #7209b7; /* Purple for gradients */
            --primary-dark: #16213e; /* Darker shade for gradients */
            --accent: #f72585; /* Pink for highlights */
            --success: #90e0ef; /* Light cyan for success messages */
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: var(--dark);
            color: var(--light);
            line-height: 1.6;
        }

        header {
            background-color: var(--dark);
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--light);
        }

        .logo span {
            color: var(--primary);
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
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            text-align: center;
        }

        .hero {
            background: linear-gradient(135deg, var(--secondary), var(--primary-dark) 70%);
            border-radius: 12px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .hero h1 {
            font-size: 36px;
            margin-bottom: 20px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .hero .btn {
            margin: 0 10px;
        }

        .stats {
            display: flex;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.05);
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 40px;
            text-align: center;
        }

        .stat {
            flex: 1;
            padding: 10px;
        }

        .stat h3 {
            font-size: 24px;
            font-weight: 700;
        }

        .stat p {
            font-size: 14px;
            opacity: 0.7;
        }

        .game-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            gap: 20px;
        }

        .game-card {
            background: var(--dark);
            border-radius: 12px;
            padding: 20px;
            width: 48%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .game-card:hover {
            transform: translateY(-5px);
        }

        .game-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .game-card h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: var(--primary);
        }

        .game-card p {
            font-size: 14px;
            opacity: 0.8;
        }

        .game-links {
            margin-top: 20px;
        }

        .about {
            background: linear-gradient(135deg, var(--primary-dark), var(--dark) 70%);
            border-radius: 12px;
            padding: 40px;
            margin-bottom: 40px;
            text-align: center;
        }

        .about h2 {
            font-size: 28px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .about p {
            font-size: 16px;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .about-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            text-align: center;
        }

        .about-item {
            padding: 15px;
        }

        .about-item img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .about-item p {
            font-size: 14px;
            opacity: 0.8;
        }

        .faq {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 40px;
            margin-bottom: 40px;
        }

        .faq h2 {
            font-size: 28px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .faq-item {
            text-align: left;
            margin-bottom: 15px;
        }

        .faq-item h3 {
            font-size: 16px;
            color: var(--accent);
            margin-bottom: 5px;
        }

        .faq-item p {
            font-size: 14px;
            opacity: 0.8;
        }

        .vip {
            background: linear-gradient(135deg, var(--primary), var(--secondary) 70%);
            border-radius: 12px;
            padding: 40px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .vip h2 {
            font-size: 28px;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .vip p {
            font-size: 16px;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .vip img {
            position: absolute;
            top: 50%;
            right: -50px;
            transform: translateY(-50%);
            width: 300px;
            opacity: 0.7;
        }

        .winners-ticker {
            background-color: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 800px;
            overflow: hidden;
            position: relative;
        }

        .winners-ticker::before {
            content: "Recent Wins";
            display: block;
            font-size: 16px;
            font-weight: 600;
            color: var(--accent);
            margin-bottom: 10px;
        }

        .ticker {
            display: flex;
            animation: scroll 20s linear infinite;
        }

        .ticker span {
            display: inline-block;
            padding: 0 20px;
            font-size: 16px;
            color: var(--success);
            white-space: nowrap;
        }

        @keyframes scroll {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        footer {
            background-color: var(--dark);
            padding: 40px 20px;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-links {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-links h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .footer-links a {
            display: block;
            color: var(--light);
            text-decoration: none;
            margin-bottom: 5px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .footer-links a:hover {
            opacity: 1;
        }

        .footer-payment {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .footer-payment img {
            width: 30px;
            height: 20px;
        }

        @media (max-width: 768px) {
            .stats { flex-direction: column; gap: 20px; }
            .game-section { flex-direction: column; }
            .game-card { width: 100%; }
            .about-grid { grid-template-columns: 1fr; }
            .vip img { display: none; }
            .footer-links { flex-direction: column; text-align: center; }
        }
    </style>
</head>
<body>
    <header>
        <a href="#" class="logo">Fortune<span>Coin</span></a>
        <div class="auth-buttons">
        <a href="{{ route('login') }}" class="btn btn-outline">Log In</a>
        <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
        </div>
    </header>
    <div class="container">
        <div class="hero">
            <h1>Welcome to FortuneCoin</h1>
            <p>Register now and get free rewards from us and our partners!</p>
            <a href="#" class="btn btn-primary">Take Your Free Reward</a>
            <a href="#" class="btn btn-outline">Register</a>
        </div>
        <div class="stats">
            <div class="stat">
                <h3>5,495</h3>
                <p>Total Players Online</p>
            </div>
            <div class="stat">
                <h3>51M+</h3>
                <p>Total Registered Players</p>
            </div>
            <div class="stat">
                <h3>$24B+</h3>
                <p>Total Paid Players</p>
            </div>
        </div>
        <div class="game-section">
            <div class="game-card">
                <img src="https://via.placeholder.com/200x150" alt="Original Games">
                <h4>Original Games</h4>
                <p>Explore our unique gaming experiences and enjoy thrilling online entertainment right your way.</p>
                <div class="game-links">
                    <a href="#" class="btn btn-primary">Go to Games</a>
                </div>
            </div>
            <div class="game-card">
                <img src="https://via.placeholder.com/200x150" alt="Licensed Slots">
                <h4>Licensed Slots</h4>
                <p>Enjoy original, licensed games for an exciting experience and a chance to win amazing jackpots!</p>
                <div class="game-links">
                    <a href="#" class="btn btn-primary">Go to Slots</a>
                </div>
            </div>
        </div>
        <div class="about">
            <h2>Decentralized Crypto Gaming Platform #1</h2>
            <p>FortuneCoin has been a leader in the online gaming platform industry since its foundation in 2017. Our platform constantly stands out for offering a huge number of original games and a diverse, exciting, and most importantly, safe and completely transparent gaming experience for players around the world.</p>
            <div class="about-grid">
                <div class="about-item">
                    <img src="https://via.placeholder.com/50x50" alt="Crypto Casino">
                    <p>Best Online Crypto Casino</p>
                </div>
                <div class="about-item">
                    <img src="https://via.placeholder.com/50x50" alt="Licenses">
                    <p>All Licenses to Be Operated</p>
                </div>
                <div class="about-item">
                    <img src="https://via.placeholder.com/50x50" alt="Payouts">
                    <p>Instant Payouts</p>
                </div>
                <div class="about-item">
                    <img src="https://via.placeholder.com/50x50" alt="Support">
                    <p>24-Hour Support</p>
                </div>
            </div>
        </div>
        <div class="faq">
            <h2>F.A.Q.</h2>
            <div class="faq-item">
                <h3>What is FortuneCoin?</h3>
                <p>Your support team will be happy to help you solve any questions and provide you with the solution.</p>
            </div>
            <div class="faq-item">
                <h3>Is betting on FortuneCoin safe?</h3>
                <p>Your support team will be happy to help you solve any questions and provide you with the solution.</p>
            </div>
            <div class="faq-item">
                <h3>What does it mean FortuneCoin is a decentralized gaming platform?</h3>
                <p>Your support team will be happy to help you solve any questions and provide you with the solution.</p>
            </div>
            <div class="faq-item">
                <h3>How do I get a welcome bonus?</h3>
                <p>Your support team will be happy to help you solve any questions and provide you with the solution.</p>
            </div>
            <div class="faq-item">
                <h3>How do I sign up for a FortuneCoin account?</h3>
                <p>Your support team will be happy to help you solve any questions and provide you with the solution.</p>
            </div>
            <div class="faq-item">
                <h3>How do I contact customer service?</h3>
                <p>Your support team will be happy to help you solve any questions and provide you with the solution.</p>
            </div>
        </div>
        <div class="vip">
            <h2>Unlock Exclusive VIP Rewards at FortuneCoin!</h2>
            <p>Join the VIP club, receive increased rewards, as well as the opportunity to participate in exclusive contests every month.</p>
            <a href="#" class="btn btn-primary">Register</a>
            <img src="https://via.placeholder.com/300x200" alt="VIP Car">
        </div>
        <div class="winners-ticker">
            <div class="ticker">
                <span>Player1 won $500!</span>
                <span>Player2 won $1,000!</span>
                <span>Player3 won $750!</span>
                <span>Player4 won $200!</span>
                <span>Player5 won $1,500!</span>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-links">
            <div>
                <h4>Main</h4>
                <a href="#">Games</a>
                <a href="#">Slots</a>
                <a href="#">Promotions</a>
                <a href="#">VIP Club</a>
            </div>
            <div>
                <h4>About Us</h4>
                <a href="#">Sponsorships</a>
                <a href="#">Feedback about us</a>
                <a href="#">Live Support</a>
            </div>
            <div>
                <h4>Info</h4>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Licenses & Security</a>
                <a href="#">AML Policy</a>
            </div>
            <div>
                <h4>Profile</h4>
                <a href="#">Deposit</a>
                <a href="#">Withdraw</a>
                <a href="#">Bonuses</a>
                <a href="#">Settings</a>
            </div>
        </div>
        <div class="footer-payment">
            <img src="https://via.placeholder.com/30x20" alt="Bitcoin">
            <img src="https://via.placeholder.com/30x20" alt="Ethereum">
            <img src="https://via.placeholder.com/30x20" alt="Tether">
            <img src="https://via.placeholder.com/30x20" alt="Ripple">
        </div>
        <p>© 2025 FortuneCoin. All Rights Reserved.</p>
        <p>Support: support@fortune-coin.com | Partners: partners@fortune-coin.com | Press: press@fortune-coin.com</p>
    </footer>
</body>
</html>