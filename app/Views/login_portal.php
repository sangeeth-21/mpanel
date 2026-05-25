<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finnger - Welcome Back</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Light Theme Variables */
            --left-bg: #ffffff;
            --right-bg: #f3f4f6;
            --text-primary: #111827;
            --text-secondary: #6b7280;
            --input-bg: #ffffff;
            --input-border: #d1d5db;
            --input-focus-border: #7c3aed;
            --accent-purple: #7c3aed;
            --button-bg: #7c3aed;
            --button-text: #ffffff;
            --checkbox-border: #d1d5db;
            --card-bg: rgba(255, 255, 255, 0.9);
            --card-border: rgba(0, 0, 0, 0.05);
            --console-bg: #0f172a;
            --console-text: #38bdf8;
            --shadow-btn: rgba(124, 58, 237, 0.3);
            --stat-card-bg: #f9fafb;
            --stat-card-border: #e5e7eb;
        }

        [data-theme="dark"] {
            /* Dark Theme Variables */
            --left-bg: #0b0f19;
            --right-bg: #030712;
            --text-primary: #f3f4f6;
            --text-secondary: #9ca3af;
            --input-bg: rgba(255, 255, 255, 0.02);
            --input-border: rgba(255, 255, 255, 0.1);
            --input-focus-border: #a78bfa;
            --accent-purple: #a78bfa;
            --button-bg: #7c3aed;
            --button-text: #ffffff;
            --checkbox-border: rgba(255, 255, 255, 0.2);
            --card-bg: rgba(15, 23, 42, 0.8);
            --card-border: rgba(255, 255, 255, 0.05);
            --console-bg: #020617;
            --console-text: #38bdf8;
            --shadow-btn: rgba(124, 58, 237, 0.4);
            --stat-card-bg: rgba(255, 255, 255, 0.02);
            --stat-card-border: rgba(255, 255, 255, 0.04);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--left-bg);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            transition: background-color 0.3s ease, color 0.3s ease;
            overflow: hidden;
        }

        /* Splash Screen */
        .splash-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: #02040a;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.6s cubic-bezier(0.77, 0, 0.175, 1), visibility 0.6s;
        }

        .splash-screen.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        .splash-content {
            text-align: center;
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .splash-logo {
            width: 80px;
            height: 80px;
            margin-bottom: 24px;
            animation: bounceIn 1s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .splash-loading-bar-bg {
            width: 100%;
            height: 4px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 12px;
        }

        .splash-loading-bar {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #7c3aed 0%, #a78bfa 100%);
            box-shadow: 0 0 8px #7c3aed;
            transition: width 0.1s linear;
        }

        .splash-status {
            font-size: 0.8rem;
            color: var(--text-secondary);
            font-family: 'JetBrains Mono', monospace;
            text-transform: uppercase;
        }

        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); opacity: 0.8; }
            70% { transform: scale(0.9); opacity: 0.9; }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Layout Container */
        .wrapper {
            display: flex;
            width: 100%;
            height: 100vh;
            position: relative;
        }

        /* Theme Switch Toggle Button */
        .theme-switch-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 24px;
            width: 100%;
        }

        .theme-switch-container {
            width: 56px;
            height: 30px;
            background-color: var(--input-bg);
            border: 1px solid var(--input-border);
            border-radius: 99px;
            position: relative;
            cursor: pointer;
            transition: background-color 0.4s cubic-bezier(0.4, 0, 0.2, 1), border-color 0.4s;
            display: flex;
            align-items: center;
        }

        .theme-switch-container:hover {
            border-color: var(--accent-purple);
            box-shadow: 0 0 10px rgba(124, 58, 237, 0.1);
        }

        .theme-switch-thumb {
            width: 22px;
            height: 22px;
            background-color: var(--text-primary);
            border-radius: 50%;
            position: absolute;
            top: 3px;
            left: 3px;
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1), background-color 0.4s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        [data-theme="dark"] .theme-switch-thumb {
            transform: translateX(26px) rotate(360deg);
        }

        .theme-switch-thumb svg {
            width: 13px;
            height: 13px;
            stroke: var(--left-bg);
            fill: none;
            position: absolute;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .theme-switch-thumb .sun-icon-thumb {
            opacity: 1;
            transform: scale(1);
        }

        .theme-switch-thumb .moon-icon-thumb {
            opacity: 0;
            transform: scale(0.5);
        }

        [data-theme="dark"] .theme-switch-thumb .sun-icon-thumb {
            opacity: 0;
            transform: scale(0.5);
        }

        [data-theme="dark"] .theme-switch-thumb .moon-icon-thumb {
            opacity: 1;
            transform: scale(1);
        }

        /* Left Side: Form Container */
        .panel-left {
            width: 50%;
            padding: 60px 80px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            background-color: var(--left-bg);
            transition: background-color 0.3s ease;
        }

        .logo-container {
            position: absolute;
            top: 48px;
            left: 80px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-box {
            width: 18px;
            height: 18px;
            background-color: #7c3aed;
            border-radius: 4px;
        }

        .logo-text {
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: -0.01em;
            color: var(--text-primary);
        }

        .form-content {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
        }

        .form-header h1 {
            font-size: 2.8rem;
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -0.03em;
            color: var(--text-primary);
            margin-bottom: 12px;
        }

        .form-header p {
            color: var(--text-secondary);
            font-size: 0.95rem;
            font-weight: 400;
            margin-bottom: 36px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-input {
            width: 100%;
            padding: 15px 20px;
            font-size: 0.95rem;
            font-family: inherit;
            border: 1px solid var(--input-border);
            border-radius: 12px;
            background-color: var(--input-bg);
            color: var(--text-primary);
            outline: none;
            transition: all 0.2s ease;
        }

        .form-input:focus {
            border-color: var(--input-focus-border);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.08);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.875rem;
            margin-bottom: 32px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: var(--text-secondary);
        }

        .remember-me input {
            display: none;
        }

        .checkbox-custom {
            width: 18px;
            height: 18px;
            border: 1.5px solid var(--checkbox-border);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .remember-me input:checked + .checkbox-custom {
            background-color: var(--accent-purple);
            border-color: var(--accent-purple);
        }

        .checkbox-custom::after {
            content: '';
            width: 4px;
            height: 8px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            display: none;
            margin-bottom: 2px;
        }

        .remember-me input:checked + .checkbox-custom::after {
            display: block;
        }

        .forgot-password {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .forgot-password:hover {
            color: var(--accent-purple);
        }

        .btn-submit {
            width: 100%;
            padding: 16px;
            background-color: var(--button-bg);
            color: var(--button-text);
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 15px var(--shadow-btn);
            margin-bottom: 32px;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            filter: brightness(1.08);
            box-shadow: 0 6px 20px var(--shadow-btn);
        }

        .btn-submit:active {
            transform: translateY(1px);
        }

        .footer-text {
            text-align: center;
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .footer-text a {
            color: var(--accent-purple);
            text-decoration: none;
            font-weight: 600;
            transition: opacity 0.2s ease;
        }

        .footer-text a:hover {
            opacity: 0.8;
        }

        /* Right Side: Graphic Illustration */
        .panel-right {
            width: 50%;
            height: 100%;
            padding: 24px;
            background-color: var(--right-bg);
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .illustration-card {
            width: 100%;
            height: 100%;
            border-radius: 28px;
            background: linear-gradient(135deg, #a78bfa 0%, #7c3aed 50%, #4c1d95 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }

        /* Animated Illustration Elements */
        .cloud-left, .cloud-right {
            position: absolute;
            fill: #ffffff;
            opacity: 0.95;
            pointer-events: none;
        }

        .cloud-left {
            top: 8%;
            left: 5%;
            width: 140px;
            animation: floatLeft 12s ease-in-out infinite alternate;
        }

        .cloud-right {
            bottom: 8%;
            right: 5%;
            width: 160px;
            animation: floatRight 15s ease-in-out infinite alternate;
        }

        /* Speech bubble with checkmark */
        .bubble-checkmark {
            position: absolute;
            top: 22%;
            left: 12%;
            width: 75px;
            height: 75px;
            background-color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            z-index: 10;
            animation: bounceFloat 3s ease-in-out infinite alternate;
        }

        .bubble-checkmark::after {
            content: '';
            position: absolute;
            bottom: -5px;
            right: 15px;
            width: 15px;
            height: 15px;
            background-color: #ffffff;
            transform: rotate(45deg);
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.02);
        }

        .bubble-checkmark svg {
            width: 32px;
            height: 32px;
            stroke: #a78bfa;
            stroke-width: 4;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        /* Padlock */
        .padlock-floating {
            position: absolute;
            top: 42%;
            right: 10%;
            width: 80px;
            animation: bounceFloat 3.5s ease-in-out infinite alternate-reverse;
            z-index: 10;
            filter: drop-shadow(0 15px 25px rgba(0,0,0,0.15));
        }

        /* Floating Smartphone */
        .phone-floating {
            position: absolute;
            width: 175px;
            height: 350px;
            transform: rotate(-8deg);
            z-index: 4;
            animation: phoneFloat 5s ease-in-out infinite alternate;
        }

        .phone-body {
            width: 100%;
            height: 100%;
            background-color: #111827;
            border: 6px solid #1f2937;
            border-radius: 36px;
            position: relative;
            padding: 12px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            overflow: hidden;
        }

        /* Phone Screen Interface */
        .phone-screen {
            width: 100%;
            height: 100%;
            background: linear-gradient(180deg, #9d4edd 0%, #5a189a 100%);
            border-radius: 28px;
            position: relative;
            padding: 15px 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .phone-status-bar {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 6px;
        }

        .phone-notch {
            width: 8px;
            height: 8px;
            background-color: #000000;
            border-radius: 50%;
        }

        .phone-menu-lines {
            width: 14px;
            height: 8px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .phone-menu-lines div {
            height: 2px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 1px;
        }

        .phone-scanner-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }

        /* Glowing fingerprint icon */
        .fingerprint-icon {
            width: 70px;
            height: 70px;
            stroke: #ffffff;
            stroke-width: 2;
            fill: none;
            stroke-linecap: round;
            animation: scannerGlow 2s infinite alternate;
        }

        .fingerprint-bracket {
            position: absolute;
            width: 90px;
            height: 90px;
            border: 2px solid transparent;
            border-radius: 20px;
        }

        .fingerprint-bracket-tl { top: -10px; left: -10px; border-top-color: rgba(255,255,255,0.7); border-left-color: rgba(255,255,255,0.7); }
        .fingerprint-bracket-tr { top: -10px; right: -10px; border-top-color: rgba(255,255,255,0.7); border-right-color: rgba(255,255,255,0.7); }
        .fingerprint-bracket-bl { bottom: -10px; left: -10px; border-bottom-color: rgba(255,255,255,0.7); border-left-color: rgba(255,255,255,0.7); }
        .fingerprint-bracket-br { bottom: -10px; right: -10px; border-bottom-color: rgba(255,255,255,0.7); border-right-color: rgba(255,255,255,0.7); }

        .phone-progress-bar {
            width: 80%;
            height: 5px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 24px;
        }

        .phone-progress-fill {
            height: 100%;
            width: 65%;
            background-color: #38bdf8;
            box-shadow: 0 0 10px #38bdf8;
            animation: fillProgress 3s infinite ease-in-out;
        }

        .phone-instructions {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.65rem;
            text-align: center;
            line-height: 1.3;
            margin-bottom: 12px;
        }

        /* Character Illustration */
        .character-container {
            position: absolute;
            bottom: 18%;
            left: 28%;
            width: 220px;
            height: 280px;
            z-index: 8;
            pointer-events: none;
            animation: characterFloat 5s ease-in-out infinite alternate;
        }

        .character-svg {
            width: 100%;
            height: 100%;
            filter: drop-shadow(0 15px 30px rgba(0, 0, 0, 0.25));
        }

        /* Dashboard Portal Styles (when logged in) */
        .dashboard-container {
            max-width: 480px;
            width: 100%;
            margin: 0 auto;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background-color: var(--stat-card-bg);
            border: 1px solid var(--stat-card-border);
            border-radius: 12px;
            padding: 16px;
            transition: all 0.3s ease;
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
        }

        .stat-val {
            font-size: 1.25rem;
            font-weight: 800;
            color: var(--text-primary);
            font-family: 'JetBrains Mono', monospace;
        }

        .console-panel {
            background-color: var(--console-bg);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 18px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            line-height: 1.5;
            color: var(--console-text);
            height: 150px;
            overflow-y: auto;
            margin-bottom: 24px;
        }

        .console-line {
            margin-bottom: 4px;
        }

        .console-prompt::before {
            content: 'finnger@cpanel:~$ ';
            color: var(--accent-purple);
        }

        /* Keyframes Animations */
        @keyframes floatLeft {
            0% { transform: translateX(-10px) translateY(0); }
            100% { transform: translateX(15px) translateY(-5px); }
        }

        @keyframes floatRight {
            0% { transform: translateX(10px) translateY(0); }
            100% { transform: translateX(-15px) translateY(5px); }
        }

        @keyframes bounceFloat {
            0% { transform: translateY(0); }
            100% { transform: translateY(-12px); }
        }

        @keyframes phoneFloat {
            0% { transform: rotate(-8deg) translateY(0); }
            100% { transform: rotate(-8deg) translateY(-14px); }
        }

        @keyframes characterFloat {
            0% { transform: translateY(2px) translateX(0); }
            100% { transform: translateY(-12px) translateX(4px); }
        }

        @keyframes scannerGlow {
            0% { filter: drop-shadow(0 0 2px rgba(255,255,255,0.4)); opacity: 0.8; }
            100% { filter: drop-shadow(0 0 12px rgba(255,255,255,0.9)); opacity: 1; }
        }

        @keyframes fillProgress {
            0% { width: 10%; }
            50% { width: 90%; }
            100% { width: 10%; }
        }

        /* Mobile Responsive Viewport */
        @media (max-width: 960px) {
            body {
                overflow-y: auto;
            }
            .wrapper {
                flex-direction: column;
                height: auto;
            }
            .panel-left {
                width: 100%;
                min-height: 100vh;
                padding: 100px 32px 60px;
            }
            .logo-container {
                left: 32px;
            }
            .panel-right {
                width: 100%;
                height: 480px;
                padding: 16px;
            }
        }
    </style>
</head>
<body>

    <!-- Premium Finnger Splash Screen -->
    <div class="splash-screen" id="splashScreen">
        <div class="splash-content">
            <svg class="splash-logo" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="24" height="24" rx="6" fill="#7c3aed"/>
                <path d="M12 7V17M7 12H17" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <div class="splash-title">Finnger Security</div>
            <div class="splash-loading-bar-bg">
                <div class="splash-loading-bar" id="splashBar"></div>
            </div>
            <div class="splash-status" id="splashStatus">Initializing Secure Vault...</div>
        </div>
    </div>



    <div class="wrapper">
        <!-- Left Side: Forms / Dashboard Console -->
        <div class="panel-left">
            <div class="logo-container">
                <div class="logo-box"></div>
                <div class="logo-text">Finnger</div>
            </div>

            <?php if (!$is_logged_in): ?>
                <div class="form-content">
                    <div class="theme-switch-wrapper">
                        <div class="theme-switch-container" id="themeToggle" aria-label="Toggle Theme">
                            <div class="theme-switch-thumb">
                                <svg class="sun-icon-thumb" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                                <svg class="moon-icon-thumb" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="form-header">
                        <h1>Holla,<br>Welcome Back</h1>
                        <p>Hey, welcome back to your special place</p>
                    </div>

                    <?php if ($error): ?>
                        <div class="alert-error"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>

                    <form method="POST" action="<?= site_url('/') ?>">
                        <div class="form-group">
                            <input class="form-input" type="text" id="username" name="username" placeholder="stanley@gmail.com" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <input class="form-input" type="password" id="password" name="password" placeholder="••••••••••••" required>
                        </div>

                        <div class="form-options">
                            <label class="remember-me">
                                <input type="checkbox" name="remember" id="remember" checked>
                                <span class="checkbox-custom"></span>
                                Remember me
                            </label>
                            <a href="#" class="forgot-password">Forgot Password?</a>
                        </div>

                        <button class="btn-submit" type="submit">Sign In</button>
                    </form>

                    <div class="footer-text">
                        Don't have an account? <a href="#">Sign Up</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="dashboard-container">
                    <div class="theme-switch-wrapper" style="margin-bottom: 16px;">
                        <div class="theme-switch-container" id="themeToggle" aria-label="Toggle Theme">
                            <div class="theme-switch-thumb">
                                <svg class="sun-icon-thumb" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                                <svg class="moon-icon-thumb" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-header">
                        <div>
                            <h1 class="header-title" style="font-size: 2rem; font-weight: 800;">Portal Active</h1>
                            <p class="header-subtitle" style="margin-bottom: 0;">Connected to Finnger Core cPanel</p>
                        </div>
                        <div style="text-align: right;">
                            <div class="user-badge">
                                <span class="user-status-dot"></span>
                                <?= htmlspecialchars($user) ?>
                            </div>
                            <a href="<?= site_url('/?action=logout') ?>" class="btn-logout" style="margin-top: 4px; display: inline-block;">Disconnect</a>
                        </div>
                    </div>

                    <div class="stat-grid">
                        <div class="stat-card">
                            <div class="stat-label">Security Shield</div>
                            <div class="stat-val" style="color: var(--accent-purple);">ACTIVE</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Auth Checks</div>
                            <div class="stat-val">100% Ok</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Node Ping</div>
                            <div class="stat-val" id="ping-val">14 ms</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-label">Server Memory</div>
                            <div class="stat-val">288MB / 2GB</div>
                        </div>
                    </div>

                    <div class="console-panel">
                        <div class="console-line console-prompt">security --verify-fingerprint</div>
                        <div class="console-line" style="color: var(--accent-purple);">Analyzing bio-matrix patterns... Validated.</div>
                        <div class="console-line console-prompt">host --push-status</div>
                        <div class="console-line" style="color: var(--console-text);">System loaded cleanly. Light/Dark mode toggles initialized.</div>
                        <div class="console-line console-prompt"><span style="animation: bounceIn 1s infinite;">_</span></div>
                    </div>

                    <a href="https://github.com/sangeeth-21/mpanel" target="_blank" class="btn-submit" style="text-decoration: none; text-align: center; display: block;">GitHub Actions Dashboard</a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Right Side: Graphic Illustration (matches image) -->
        <div class="panel-right">
            <div class="illustration-card">
                <!-- Floating Clouds -->
                <svg class="cloud-left" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 10 30 A 15 15 0 0 1 40 30 A 20 20 0 0 1 80 30 A 10 10 0 0 1 90 30 L 90 40 L 10 40 Z" />
                </svg>
                <svg class="cloud-right" viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M 10 30 A 15 15 0 0 1 40 30 A 20 20 0 0 1 80 30 A 10 10 0 0 1 90 30 L 90 40 L 10 40 Z" />
                </svg>

                <!-- Speech Bubble Checkmark -->
                <div class="bubble-checkmark">
                    <svg viewBox="0 0 24 24">
                        <path d="M20 6L9 17L4 12" />
                    </svg>
                </div>

                <!-- Floating Lock -->
                <div class="padlock-floating">
                    <svg viewBox="0 0 80 100" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                        <rect x="5" y="35" width="70" height="60" rx="16" fill="#ffffff" />
                        <path d="M 20,35 L 20,25 A 20,20 0 0,1 60,25 L 60,35" fill="none" stroke="#ffffff" stroke-width="8" stroke-linecap="round" />
                        <circle cx="40" cy="60" r="6" fill="#7c3aed" />
                        <path d="M 40,66 L 40,78" stroke="#7c3aed" stroke-width="4" stroke-linecap="round" />
                    </svg>
                </div>

                <!-- Floating Phone -->
                <div class="phone-floating">
                    <div class="phone-body">
                        <div class="phone-screen">
                            <div class="phone-status-bar">
                                <div class="phone-notch"></div>
                                <div class="phone-menu-lines">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            
                            <div class="phone-scanner-box">
                                <div style="position: relative;">
                                    <div class="fingerprint-bracket fingerprint-bracket-tl"></div>
                                    <div class="fingerprint-bracket fingerprint-bracket-tr"></div>
                                    <div class="fingerprint-bracket fingerprint-bracket-bl"></div>
                                    <div class="fingerprint-bracket fingerprint-bracket-br"></div>
                                    
                                    <!-- Fingerprint SVG icon -->
                                    <svg class="fingerprint-icon" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M12 11c.73 0 1.39.29 1.88.77M12 8c1.65 0 3 1.35 3 3v2M12 5c3.31 0 6 2.69 6 6v3M6 11c0-3.31 2.69-6 6-6M9.17 19.17a6.002 6.002 0 0 1-1.17-3.17v-1M15.83 19.17c.74-1.11 1.17-2.44 1.17-3.87v-1M12 14c.55 0 1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1v2c0 .55.45 1 1 1z" />
                                    </svg>
                                </div>

                                <div class="phone-progress-bar">
                                    <div class="phone-progress-fill"></div>
                                </div>
                            </div>

                            <div class="phone-instructions">
                                Please tap your finger<br>to your phone
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Float character interacting with phone -->
                <div class="character-container">
                    <svg class="character-svg" viewBox="0 0 240 320" xmlns="http://www.w3.org/2000/svg">
                        <!-- Head -->
                        <circle cx="120" cy="50" r="14" fill="#ffdbac" />
                        <!-- Hair -->
                        <path d="M 104,48 C 104,36 122,34 134,44 C 136,46 134,54 130,54 C 122,54 122,58 116,56 C 110,54 104,54 104,48 Z" fill="#2d3748" />
                        <!-- Neck -->
                        <rect x="117" y="60" width="6" height="8" fill="#ffdbac" />
                        <!-- Torso (Yellow jacket) -->
                        <path d="M 85,80 C 105,72 135,72 155,80 L 155,160 C 135,165 105,165 85,160 Z" fill="#fbbf24" />
                        <!-- Jacket collar -->
                        <path d="M 105,75 L 120,95 L 135,75 Z" fill="#d97706" />
                        
                        <!-- Messenger bag strap & bag -->
                        <path d="M 85,80 L 140,165" stroke="#1f2937" stroke-width="6" fill="none" stroke-linecap="round" />
                        <rect x="65" y="140" width="30" height="40" rx="8" fill="#1f2937" transform="rotate(-15, 80, 160)" />

                        <!-- Right arm touching the screen -->
                        <!-- Shoulder -> elbow -> hand extending to the right -->
                        <path d="M 148,85 L 205,115" stroke="#fbbf24" stroke-width="12" fill="none" stroke-linecap="round" />
                        <circle cx="210" cy="118" r="6" fill="#ffdbac" />
                        <path d="M 210,118 L 218,114" stroke="#ffdbac" stroke-width="3" fill="none" stroke-linecap="round" /> <!-- finger extending -->

                        <!-- Left arm down -->
                        <path d="M 92,85 L 80,135" stroke="#fbbf24" stroke-width="12" fill="none" stroke-linecap="round" />
                        <circle cx="78" cy="138" r="6" fill="#ffdbac" />

                        <!-- Legs (white pants) -->
                        <path d="M 92,162 L 102,260" stroke="#f9fafb" stroke-width="16" fill="none" stroke-linecap="round" />
                        <path d="M 144,162 L 175,255" stroke="#f9fafb" stroke-width="16" fill="none" stroke-linecap="round" />

                        <!-- Left Shoe -->
                        <path d="M 94,260 C 94,260 84,272 90,278 L 112,274 Z" fill="#1e1b4b" stroke="#312e81" stroke-width="2" />
                        <!-- Right Shoe -->
                        <path d="M 175,255 C 175,255 180,270 190,274 L 204,262 Z" fill="#1e1b4b" stroke="#312e81" stroke-width="2" />
                    </svg>
                </div>

            </div>
        </div>
    </div>

    <!-- Script for Dark/Light Mode and Loader Simulation -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Theme toggle script
            const themeToggleBtn = document.getElementById('themeToggle');
            const htmlElement = document.documentElement;

            // Check localstorage or default to light
            const savedTheme = localStorage.getItem('theme') || 'light';
            htmlElement.setAttribute('data-theme', savedTheme);

            themeToggleBtn.addEventListener('click', () => {
                const currentTheme = htmlElement.getAttribute('data-theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                htmlElement.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
            });

            // Splash Loader Script
            const splashScreen = document.getElementById('splashScreen');
            const splashBar = document.getElementById('splashBar');
            const splashStatus = document.getElementById('splashStatus');
            
            const statuses = [
                { limit: 20, text: 'Resolving SSL Credentials...' },
                { limit: 50, text: 'Synchronizing Finnger bio-auth...' },
                { limit: 80, text: 'Rendering visual canvas...' },
                { limit: 100, text: 'Secured Connection Established.' }
            ];

            let progress = 0;
            const interval = setInterval(() => {
                progress += Math.floor(Math.random() * 12) + 5;
                if (progress > 100) progress = 100;
                
                splashBar.style.width = `${progress}%`;
                
                const currentStatus = statuses.find(s => progress <= s.limit);
                if (currentStatus) {
                    splashStatus.textContent = currentStatus.text;
                }

                if (progress >= 100) {
                    clearInterval(interval);
                    setTimeout(() => {
                        splashScreen.classList.add('hidden');
                    }, 400);
                }
            }, 60);

            // Dashboard stats fluctuation
            const pingValEl = document.getElementById('ping-val');
            if (pingValEl) {
                setInterval(() => {
                    const targetPing = Math.floor(10 + Math.random() * 6);
                    pingValEl.textContent = `${targetPing} ms`;
                }, 2000);
            }
        });
    </script>
</body>
</html>
