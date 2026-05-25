<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mpanel Aero - Control Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #030611;
            --card-bg: rgba(6, 10, 26, 0.65);
            --card-border: rgba(0, 240, 255, 0.1);
            --text-primary: #f3f4f6;
            --text-secondary: #9ca3af;
            --accent-hud: #00f0ff;
            --accent-alert: #ff0055;
            --accent-green: #00ff88;
            --glow-hud: rgba(0, 240, 255, 0.3);
            --glow-green: rgba(0, 255, 136, 0.3);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            overflow: hidden;
            position: relative;
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
            transition: opacity 0.8s cubic-bezier(0.77, 0, 0.175, 1), visibility 0.8s;
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

        .radar-container {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 30px;
            border: 2px solid rgba(0, 240, 255, 0.2);
            border-radius: 50%;
        }

        .radar-container::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            border: 1px solid rgba(0, 240, 255, 0.1);
            border-radius: 50%;
            margin: 20px;
        }

        .radar-sweep {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: conic-gradient(from 0deg, rgba(0, 240, 255, 0.15) 0deg, transparent 90deg, transparent 360deg);
            border-radius: 50%;
            animation: radarScan 2s linear infinite;
            transform-origin: center;
        }

        .radar-blip {
            position: absolute;
            top: 40px;
            left: 80px;
            width: 6px;
            height: 6px;
            background-color: var(--accent-hud);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--accent-hud);
            animation: blipPulse 2s infinite;
        }

        .splash-title {
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--text-primary);
            text-shadow: 0 0 10px var(--glow-hud);
            margin-bottom: 24px;
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
            background: linear-gradient(90deg, var(--accent-hud) 0%, #7000ff 100%);
            box-shadow: 0 0 8px var(--accent-hud);
            transition: width 0.1s linear;
        }

        .splash-status {
            font-size: 0.8rem;
            color: var(--text-secondary);
            font-family: 'JetBrains Mono', monospace;
            text-transform: uppercase;
        }

        @keyframes radarScan {
            to { transform: rotate(360deg); }
        }

        @keyframes blipPulse {
            0%, 100% { opacity: 0.2; }
            45% { opacity: 1; }
            80% { opacity: 0.2; }
        }

        /* Responsive Layout */
        .wrapper {
            display: flex;
            width: 100%;
            height: 100vh;
            position: relative;
            z-index: 2;
        }

        /* Left Side Panel: Forms / Content */
        .panel-left {
            width: 40%;
            min-width: 420px;
            background: rgba(3, 5, 14, 0.9);
            backdrop-filter: blur(25px);
            border-right: 1px solid rgba(0, 240, 255, 0.08);
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 10;
            box-shadow: 20px 0 80px rgba(0, 0, 0, 0.6);
        }

        /* Right Side Panel: Aero / Flight HUD Animation */
        .panel-right {
            flex-grow: 1;
            background: radial-gradient(circle at center, #070f2b 0%, #02040a 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Sky / Stars / Clouds */
        .sky-stars {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: 
                radial-gradient(1px 1px at 45px 80px, #fff, transparent),
                radial-gradient(1.5px 1.5px at 180px 220px, rgba(0, 240, 255, 0.8), transparent),
                radial-gradient(1px 1px at 350px 140px, #fff, transparent),
                radial-gradient(2px 2px at 580px 410px, rgba(255, 255, 255, 0.6), transparent),
                radial-gradient(1px 1px at 800px 180px, #fff, transparent),
                radial-gradient(1.5px 1.5px at 950px 380px, #fff, transparent);
            background-size: 1000px 1000px;
            opacity: 0.4;
        }

        .cloud {
            position: absolute;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 0%, rgba(255, 255, 255, 0.0) 100%);
            border-radius: 100px;
            filter: blur(10px);
            pointer-events: none;
        }

        .cloud-1 { top: 15%; width: 250px; height: 40px; animation: cloudDrift 20s linear infinite; }
        .cloud-2 { top: 45%; width: 400px; height: 60px; animation: cloudDrift 14s linear infinite; animation-delay: -5s; }
        .cloud-3 { top: 75%; width: 300px; height: 50px; animation: cloudDrift 28s linear infinite; animation-delay: -10s; }

        @keyframes cloudDrift {
            0% { transform: translateX(100vw); }
            100% { transform: translateX(-450px); }
        }

        /* Flight HUD Grid & Indicators */
        .hud-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 5;
            pointer-events: none;
            color: var(--accent-hud);
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            text-shadow: 0 0 5px var(--glow-hud);
        }

        .hud-crosshair {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 140px;
            height: 140px;
            border: 1px solid rgba(0, 240, 255, 0.2);
            border-radius: 50%;
        }

        .hud-crosshair::before {
            content: '';
            position: absolute;
            top: 50%; left: -10px; width: 20px; height: 1px;
            background-color: var(--accent-hud);
        }

        .hud-crosshair::after {
            content: '';
            position: absolute;
            top: 50%; right: -10px; width: 20px; height: 1px;
            background-color: var(--accent-hud);
        }

        .hud-center-dot {
            position: absolute;
            top: 50%; left: 50%;
            width: 4px; height: 4px;
            background-color: var(--accent-hud);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 8px var(--accent-hud);
        }

        /* Pitch Ladder */
        .hud-pitch-ladder {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200px;
            transform: translate(-50%, -50%);
            display: flex;
            flex-direction: column;
            gap: 40px;
            align-items: center;
            opacity: 0.35;
            animation: pitchOscillate 6s ease-in-out infinite alternate;
        }

        .pitch-line {
            width: 120px;
            height: 1px;
            background-color: var(--accent-hud);
            position: relative;
        }

        .pitch-line::before, .pitch-line::after {
            content: '10';
            position: absolute;
            top: -6px;
        }
        .pitch-line::before { left: -25px; }
        .pitch-line::after { right: -25px; }

        .pitch-line.down {
            background-image: linear-gradient(90deg, var(--accent-hud) 60%, transparent 60%);
            background-size: 10px 1px;
        }

        .pitch-line.down::before, .pitch-line.down::after {
            content: '-10';
        }

        @keyframes pitchOscillate {
            0% { transform: translate(-50%, -45%) rotate(-1deg); }
            100% { transform: translate(-50%, -55%) rotate(1deg); }
        }

        /* HUD Tapes (Altitude & Airspeed) */
        .hud-tape {
            position: absolute;
            top: 25%;
            height: 50%;
            width: 60px;
            border-top: 1px solid rgba(0, 240, 255, 0.2);
            border-bottom: 1px solid rgba(0, 240, 255, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px 5px;
            background: rgba(3, 6, 17, 0.2);
            backdrop-filter: blur(2px);
        }

        .hud-tape-left {
            left: 10%;
            border-right: 1px solid rgba(0, 240, 255, 0.2);
        }

        .hud-tape-right {
            right: 10%;
            border-left: 1px solid rgba(0, 240, 255, 0.2);
            text-align: right;
        }

        /* Heading tape at top */
        .hud-heading-tape {
            position: absolute;
            top: 8%;
            left: 30%;
            width: 40%;
            height: 30px;
            border-bottom: 1px solid rgba(0, 240, 255, 0.2);
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            padding-bottom: 5px;
        }

        .heading-tick {
            width: 1px;
            height: 6px;
            background-color: rgba(0, 240, 255, 0.4);
        }
        .heading-tick.major {
            height: 12px;
            background-color: var(--accent-hud);
            position: relative;
        }
        .heading-tick.major::before {
            content: attr(data-heading);
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.65rem;
        }

        /* Flight Data Blocks */
        .hud-data-block {
            position: absolute;
            bottom: 6%;
            font-size: 0.7rem;
            display: flex;
            gap: 30px;
        }
        .hud-data-block-left { left: 10%; }
        .hud-data-block-right { right: 10%; }

        /* Animated Flying Plane */
        .airplane-container {
            position: absolute;
            z-index: 10;
            width: 280px;
            height: 110px;
            transform: translate(0, 0);
            animation: airplaneFloat 4s ease-in-out infinite alternate;
        }

        .airplane-svg {
            width: 100%;
            height: 100%;
            filter: drop-shadow(0 0 10px rgba(0, 240, 255, 0.25));
        }

        /* Flash Nav Lights */
        .nav-light {
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .nav-light-red {
            left: 30px;
            top: 25px;
            background-color: var(--accent-alert);
            box-shadow: 0 0 12px var(--accent-alert);
            animation: beaconFlash 1.2s steps(1) infinite;
        }

        .nav-light-green {
            right: 58px;
            top: 51px;
            background-color: var(--accent-green);
            box-shadow: 0 0 12px var(--accent-green);
            animation: greenNavFlash 1.5s steps(1) infinite;
        }

        .nav-light-strobe {
            left: 9px;
            top: 36px;
            background-color: #fff;
            box-shadow: 0 0 15px #fff;
            animation: strobeFlash 0.8s doubleFlash infinite;
        }

        @keyframes beaconFlash {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }

        @keyframes greenNavFlash {
            0%, 100% { opacity: 0.1; }
            40% { opacity: 1; }
        }

        @keyframes strobeFlash {
            0%, 70%, 100% { opacity: 0; }
            75%, 85% { opacity: 1; }
            80% { opacity: 0; }
        }

        @keyframes airplaneFloat {
            0% {
                transform: translate(-10px, -8px) rotate(-1deg);
            }
            100% {
                transform: translate(15px, 8px) rotate(1.5deg);
            }
        }

        /* Brand & Forms */
        .brand-logo {
            font-size: 1.65rem;
            font-weight: 800;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            background: linear-gradient(135deg, var(--accent-hud) 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-shadow: 0 0 20px rgba(0, 240, 255, 0.15);
        }

        .brand-logo-icon {
            width: 20px;
            height: 20px;
            fill: var(--accent-hud);
            filter: drop-shadow(0 0 8px var(--glow-hud));
        }

        .header-title {
            font-size: 2.1rem;
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 10px;
            letter-spacing: -0.02em;
        }

        .header-subtitle {
            color: var(--text-secondary);
            font-weight: 300;
            font-size: 0.95rem;
            margin-bottom: 36px;
            line-height: 1.5;
        }

        .form-group {
            position: relative;
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--accent-hud);
            margin-bottom: 8px;
            text-shadow: 0 0 3px rgba(0, 240, 255, 0.2);
        }

        .form-input {
            width: 100%;
            background: rgba(0, 240, 255, 0.02);
            border: 1px solid rgba(0, 240, 255, 0.12);
            border-radius: 10px;
            padding: 14px 18px;
            color: white;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent-hud);
            background: rgba(0, 240, 255, 0.05);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.2);
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(90deg, #00c6ff 0%, #0072ff 100%);
            color: white;
            border: none;
            padding: 16px;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 114, 255, 0.3);
            margin-top: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 26px rgba(0, 114, 255, 0.45);
            filter: brightness(1.15);
        }

        .btn-submit:active {
            transform: translateY(1px);
        }

        .alert-error {
            background: rgba(255, 0, 85, 0.08);
            border: 1px solid rgba(255, 0, 85, 0.25);
            color: #ff5588;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 0.88rem;
            margin-bottom: 24px;
            line-height: 1.4;
        }

        /* Mock Dashboard Styles */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .user-badge {
            background: rgba(0, 240, 255, 0.05);
            border: 1px solid rgba(0, 240, 255, 0.15);
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--accent-hud);
        }

        .user-status-dot {
            width: 6px;
            height: 6px;
            background-color: var(--accent-green);
            border-radius: 50%;
            box-shadow: 0 0 8px var(--accent-green);
        }

        .btn-logout {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .btn-logout:hover {
            color: var(--accent-alert);
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.04);
            border-radius: 10px;
            padding: 16px;
        }

        .stat-label {
            font-size: 0.72rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 6px;
        }

        .stat-val {
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--text-primary);
            font-family: 'JetBrains Mono', monospace;
        }

        .console-panel {
            background: #020308;
            border: 1px solid rgba(0, 240, 255, 0.08);
            border-radius: 10px;
            padding: 18px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            line-height: 1.5;
            color: var(--accent-hud);
            height: 155px;
            overflow-y: auto;
            margin-bottom: 24px;
        }

        .console-line {
            margin-bottom: 4px;
        }

        .console-prompt::before {
            content: 'aero@cpanel:~$ ';
            color: #8b5cf6;
        }

        /* Mobile Styles */
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
                min-width: 0;
                padding: 40px 24px;
                border-right: none;
                border-bottom: 1px solid rgba(0, 240, 255, 0.08);
            }
            .panel-right {
                height: 380px;
                flex-grow: 0;
                width: 100%;
            }
            .hud-tape {
                display: none;
            }
        }
    </style>
</head>
<body>

    <!-- Premium Flight Loader Splash Screen -->
    <div class="splash-screen" id="splashScreen">
        <div class="splash-content">
            <div class="radar-container">
                <div class="radar-sweep"></div>
                <div class="radar-blip"></div>
            </div>
            <div class="splash-title">AeroPortal Link</div>
            <div class="splash-loading-bar-bg">
                <div class="splash-loading-bar" id="splashBar"></div>
            </div>
            <div class="splash-status" id="splashStatus">Handshaking secure node...</div>
        </div>
    </div>

    <div class="wrapper">
        <!-- Left Side: Forms / Dashboard Console -->
        <div class="panel-left">
            <div class="brand-logo">
                <!-- Airplane logo icon -->
                <svg class="brand-logo-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 16v-2l-8-5V3.5c0-.83-.67-1.5-1.5-1.5S10 2.67 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L14 19v-5.5l7 2.5z"/>
                </svg>
                mpanel Aero
            </div>

            <?php if (!$is_logged_in): ?>
                <h1 class="header-title">Airspace Login</h1>
                <p class="header-subtitle">Secure aviation dashboard node for your CodeIgniter 4 cPanel hosting.</p>

                <?php if ($error): ?>
                    <div class="alert-error"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form method="POST" action="<?= site_url('/') ?>">
                    <div class="form-group">
                        <label class="form-label" for="username">Pilot Sign-in</label>
                        <input class="form-input" type="text" id="username" name="username" placeholder="admin" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Access Code</label>
                        <input class="form-input" type="password" id="password" name="password" placeholder="••••••••••••" required>
                    </div>

                    <button class="btn-submit" type="submit">Establish Connection</button>
                </form>
            <?php else: ?>
                <div class="dashboard-header">
                    <div>
                        <h1 class="header-title">Aero Flight Desk</h1>
                        <p class="header-subtitle" style="margin-bottom: 0;">Connected to MilesWeb Airspace</p>
                    </div>
                    <div style="text-align: right;">
                        <div class="user-badge">
                            <span class="user-status-dot"></span>
                            <?= htmlspecialchars($user) ?>
                        </div>
                        <a href="<?= site_url('/?action=logout') ?>" class="btn-logout">Disconnect</a>
                    </div>
                </div>

                <div class="stat-grid">
                    <div class="stat-card">
                        <div class="stat-label">Altitude (Uplink)</div>
                        <div class="stat-val" id="alt-val">35,012 ft</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Airspeed (Bandwidth)</div>
                        <div class="stat-val" id="speed-val">452 kts</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Server Ping</div>
                        <div class="stat-val" id="ping-val">12 ms</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Memory Usage</div>
                        <div class="stat-val">342MB / 2GB</div>
                    </div>
                </div>

                <div class="console-panel">
                    <div class="console-line console-prompt">ci4 --status</div>
                    <div class="console-line" style="color: #6b7280;">CodeIgniter version: 4.7.3 - Status: Operational.</div>
                    <div class="console-line console-prompt">flight-uplink --secure-push</div>
                    <div class="console-line" style="color: var(--accent-green);">Aero deployment uploaded cleanly. Session Active.</div>
                    <div class="console-line console-prompt"><span style="animation: beaconFlash 1s infinite;">_</span></div>
                </div>

                <a href="https://github.com/sangeeth-21/mpanel" target="_blank" class="btn-submit" style="text-decoration: none; text-align: center; display: block;">GitHub Actions Dashboard</a>
            <?php endif; ?>
        </div>

        <!-- Right Side: Aero / Flight HUD Animation -->
        <div class="panel-right">
            <!-- Parallax Cosmic Background -->
            <div class="sky-stars"></div>
            
            <!-- Parallax Scrolling Clouds -->
            <div class="cloud cloud-1"></div>
            <div class="cloud cloud-2"></div>
            <div class="cloud cloud-3"></div>

            <!-- Dynamic Jet Fighter SVG -->
            <div class="airplane-container">
                <div class="nav-light nav-light-red"></div>
                <div class="nav-light nav-light-green"></div>
                <div class="nav-light nav-light-strobe"></div>
                
                <svg class="airplane-svg" viewBox="0 0 600 240" xmlns="http://www.w3.org/2000/svg">
                    <!-- Engine exhaust flame glow -->
                    <ellipse cx="64" cy="116" rx="20" ry="8" fill="#ff7700" filter="blur(4px)">
                        <animate attributeName="rx" values="15;28;15" dur="0.15s" repeatCount="indefinite"/>
                    </ellipse>
                    <ellipse cx="64" cy="116" rx="10" ry="4" fill="#ffea00" filter="blur(1px)">
                        <animate attributeName="rx" values="8;16;8" dur="0.1s" repeatCount="indefinite"/>
                    </ellipse>

                    <!-- Sleek Side-profile Jet Outline -->
                    <!-- Fuselage and wings -->
                    <path d="M 500,115 
                             C 420,95 380,95 320,95
                             C 240,95 180,90 120,110
                             L 65,110
                             L 65,122
                             L 120,122
                             C 180,142 240,137 320,137
                             C 380,137 420,137 500,117
                             Z" fill="#0b132b" stroke="var(--accent-hud)" stroke-width="2.5" />
                             
                    <!-- Cockpit canopy -->
                    <path d="M 400,95 C 410,80 435,80 460,95 Z" fill="rgba(0, 240, 255, 0.3)" stroke="var(--accent-hud)" stroke-width="2" />
                    
                    <!-- Vertical Tail Fin -->
                    <path d="M 120,95 L 75,35 L 98,35 L 140,95 Z" fill="#0b132b" stroke="var(--accent-hud)" stroke-width="2" />
                    
                    <!-- Wing sweep line details -->
                    <path d="M 280,116 L 160,175 L 180,175 L 310,116 Z" fill="#0b132b" stroke="var(--accent-hud)" stroke-width="2" />
                    <!-- Wing tip green nav light holder -->
                    <circle cx="160" cy="175" r="3" fill="var(--accent-hud)" />
                    
                    <!-- Nosecone details -->
                    <path d="M 500,115 L 530,116 L 500,117 Z" fill="var(--accent-hud)" />
                </svg>
            </div>

            <!-- HUD Flight Metrics Overlay -->
            <div class="hud-overlay">
                <!-- Crosshair -->
                <div class="hud-crosshair"></div>
                <div class="hud-center-dot"></div>

                <!-- Pitch Ladder -->
                <div class="hud-pitch-ladder">
                    <div class="pitch-line"></div>
                    <div class="pitch-line down"></div>
                </div>

                <!-- Left tape: SPEED (KTS) -->
                <div class="hud-tape hud-tape-left">
                    <div>470</div>
                    <div>460</div>
                    <div style="color: #fff; font-weight: bold; background: rgba(0, 240, 255, 0.2); padding: 2px 4px; border-radius: 3px; border: 1px solid var(--accent-hud);">
                        <span id="hud-spd-val">452</span> <span style="font-size: 0.55rem;">KTS</span>
                    </div>
                    <div>440</div>
                    <div>430</div>
                </div>

                <!-- Right tape: ALTITUDE (FT) -->
                <div class="hud-tape hud-tape-right">
                    <div>35200</div>
                    <div>35100</div>
                    <div style="color: #fff; font-weight: bold; background: rgba(0, 240, 255, 0.2); padding: 2px 4px; border-radius: 3px; border: 1px solid var(--accent-hud);">
                        <span id="hud-alt-val">35012</span> <span style="font-size: 0.55rem;">FT</span>
                    </div>
                    <div>34900</div>
                    <div>34800</div>
                </div>

                <!-- Top tape: Heading -->
                <div class="hud-heading-tape">
                    <div class="heading-tick"><span style="position: absolute; top: -15px; left: -10px;">260</span></div>
                    <div class="heading-tick"></div>
                    <div class="heading-tick major" data-heading="W"></div>
                    <div class="heading-tick"></div>
                    <div class="heading-tick"><span style="position: absolute; top: -15px; left: -10px;">280</span></div>
                    <div class="heading-tick"></div>
                    <div class="heading-tick major" data-heading="290"></div>
                    <div class="heading-tick"></div>
                    <div class="heading-tick"><span style="position: absolute; top: -15px; left: -10px;">300</span></div>
                </div>

                <!-- Bottom Data Block Left -->
                <div class="hud-data-block hud-data-block-left">
                    <div>GS: 492 KTS</div>
                    <div>TAS: 485 KTS</div>
                    <div>TRK: 284°</div>
                </div>

                <!-- Bottom Data Block Right -->
                <div class="hud-data-block hud-data-block-right">
                    <div>VS: 0 FPM</div>
                    <div>OAT: -48°C</div>
                    <div>QNH: 1013 HPA</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script to simulate Splash Loader & Dynamic Altimeter/Speedometer -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Splash Loader Script
            const splashScreen = document.getElementById('splashScreen');
            const splashBar = document.getElementById('splashBar');
            const splashStatus = document.getElementById('splashStatus');
            
            const statuses = [
                { limit: 20, text: 'Handshaking secure airspace node...' },
                { limit: 45, text: 'Resolving flight HUD parameters...' },
                { limit: 75, text: 'Decrypting cPanel database connection...' },
                { limit: 95, text: 'Authorizing telemetry coordinates...' },
                { limit: 100, text: 'Ready.' }
            ];

            let progress = 0;
            const interval = setInterval(() => {
                progress += Math.floor(Math.random() * 8) + 4;
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
                    }, 500);
                }
            }, 80);

            // Flight telemetry stats updates
            const altValEl = document.getElementById('alt-val');
            const speedValEl = document.getElementById('speed-val');
            const pingValEl = document.getElementById('ping-val');
            
            const hudAltEl = document.getElementById('hud-alt-val');
            const hudSpdEl = document.getElementById('hud-spd-val');

            setInterval(() => {
                // Fluctuating altitude (around 35000 ft)
                const targetAlt = Math.floor(35000 + Math.random() * 40 - 20);
                if (altValEl) altValEl.textContent = `${targetAlt.toLocaleString()} ft`;
                if (hudAltEl) hudAltEl.textContent = targetAlt;

                // Fluctuating speed (around 450 kts)
                const targetSpd = Math.floor(450 + Math.random() * 8 - 4);
                if (speedValEl) speedValEl.textContent = `${targetSpd} kts`;
                if (hudSpdEl) hudSpdEl.textContent = targetSpd;

                // Ping fluctuator
                const targetPing = Math.floor(10 + Math.random() * 5);
                if (pingValEl) pingValEl.textContent = `${targetPing} ms`;
            }, 1500);
        });
    </script>
</body>
</html>
