<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mpanel - Control Center</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #05050a;
            --card-bg: rgba(10, 10, 18, 0.6);
            --card-border: rgba(255, 255, 255, 0.05);
            --text-primary: #f3f4f6;
            --text-secondary: #9ca3af;
            --accent-pink: #ff007f;
            --accent-cyan: #00f0ff;
            --accent-purple: #8b5cf6;
            --glow-pink: rgba(255, 0, 127, 0.35);
            --glow-cyan: rgba(0, 240, 255, 0.35);
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
            width: 45%;
            min-width: 420px;
            background: rgba(5, 5, 10, 0.85);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 10;
            box-shadow: 20px 0 80px rgba(0, 0, 0, 0.7);
        }

        /* Right Side Panel: Synthwave Animation */
        .panel-right {
            flex-grow: 1;
            background: #030307;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Synthwave Animation Elements */
        .synth-sky {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 55%;
            background: linear-gradient(to bottom, #11001c 0%, #030008 100%);
            overflow: hidden;
        }

        /* Stars */
        .stars {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(1px 1px at 25px 35px, #fff, transparent),
                radial-gradient(1.5px 1.5px at 150px 75px, #fff, transparent),
                radial-gradient(1px 1px at 300px 120px, rgba(255,255,255,0.7), transparent),
                radial-gradient(2px 2px at 450px 210px, #fff, transparent),
                radial-gradient(1px 1px at 700px 80px, #fff, transparent),
                radial-gradient(1.5px 1.5px at 900px 320px, rgba(255,255,255,0.8), transparent);
            background-size: 1000px 600px;
            opacity: 0.5;
        }

        /* Synthwave Sun */
        .neon-sun {
            position: absolute;
            bottom: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: linear-gradient(to bottom, #ff007f 0%, #ff7b00 100%);
            box-shadow: 0 0 60px rgba(255, 0, 127, 0.4);
            overflow: hidden;
        }

        .neon-sun::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, 
                transparent 0%, 
                transparent 50%, 
                #030008 50%, 
                #030008 53%, 
                transparent 53%,
                transparent 62%,
                #030008 62%,
                #030008 66%,
                transparent 66%,
                transparent 74%,
                #030008 74%,
                #030008 79%,
                transparent 79%,
                transparent 86%,
                #030008 86%,
                #030008 92%,
                transparent 92%,
                transparent 97%,
                #030008 97%,
                #030008 100%
            );
        }

        /* Mountains Grid outline */
        .mountains {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 140px;
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            opacity: 0.15;
        }

        .mountain {
            border-left: 150px solid transparent;
            border-right: 150px solid transparent;
            border-bottom: 120px solid var(--accent-pink);
            position: relative;
        }

        .mountain-overlay {
            position: absolute;
            bottom: -120px;
            left: -148px;
            border-left: 148px solid transparent;
            border-right: 148px solid transparent;
            border-bottom: 118px solid #030307;
        }

        /* Grid Road */
        .synth-grid {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 45%;
            background-color: #030008;
            perspective: 200px;
            overflow: hidden;
            border-top: 2px solid var(--accent-pink);
            box-shadow: 0 -4px 20px var(--glow-pink);
        }

        .grid-lines {
            position: absolute;
            top: 0;
            left: -50%;
            width: 200%;
            height: 200%;
            background-image: 
                linear-gradient(rgba(255, 0, 127, 0.15) 2px, transparent 2px),
                linear-gradient(90deg, rgba(255, 0, 127, 0.15) 2px, transparent 2px);
            background-size: 80px 80px;
            transform: rotateX(75deg);
            transform-origin: top center;
            animation: roadMove 2s linear infinite;
        }

        @keyframes roadMove {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 0 80px;
            }
        }

        /* Speed lines overlay */
        .speed-lines {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .speed-line {
            position: absolute;
            background: linear-gradient(90deg, transparent, rgba(0, 240, 255, 0.4), transparent);
            height: 1px;
            width: 150px;
            animation: speedLineRun 1.5s infinite linear;
        }

        .sl-1 { top: 75%; left: -20%; animation-delay: 0s; }
        .sl-2 { top: 82%; left: -20%; animation-delay: 0.5s; }
        .sl-3 { top: 90%; left: -20%; animation-delay: 1s; }

        @keyframes speedLineRun {
            0% { left: -20%; opacity: 0; transform: scaleX(0.5); }
            50% { opacity: 1; transform: scaleX(1); }
            100% { left: 120%; opacity: 0; transform: scaleX(0.5); }
        }

        /* The Car Container */
        .car-container {
            position: absolute;
            bottom: 12%;
            left: 50%;
            transform: translateX(-50%);
            width: 320px;
            height: 120px;
            z-index: 10;
            animation: carVibrate 0.15s infinite alternate, carBouncing 3s infinite ease-in-out;
        }

        /* CSS Rendered Cyberpunk Car */
        .car-body {
            position: relative;
            width: 100%;
            height: 100%;
        }

        /* The glowing retro sports car vector */
        .car-chassis {
            fill: #0c0d14;
            stroke: var(--accent-cyan);
            stroke-width: 2.5;
            filter: drop-shadow(0 0 8px var(--glow-cyan));
        }

        .car-neon-trim {
            fill: none;
            stroke: var(--accent-pink);
            stroke-width: 2;
            filter: drop-shadow(0 0 6px var(--glow-pink));
        }

        .car-wheel {
            transform-origin: center;
            animation: wheelRotate 0.6s linear infinite;
        }

        .car-exhaust-flame {
            position: absolute;
            left: -15px;
            bottom: 22px;
            width: 25px;
            height: 10px;
            background: radial-gradient(ellipse at right, #ff007f, #ff7b00, transparent);
            border-radius: 50%;
            filter: blur(1px) drop-shadow(0 0 10px var(--accent-pink));
            animation: exhaustFlicker 0.1s infinite alternate;
        }

        .car-headlight-beam {
            position: absolute;
            right: -100px;
            bottom: 10px;
            width: 120px;
            height: 40px;
            background: rgb(0,240,255);
            background: linear-gradient(90deg, rgba(0,240,255,0.4) 0%, rgba(0,240,255,0) 100%);
            clip-path: polygon(0 40%, 100% 0, 100% 100%, 0 60%);
            pointer-events: none;
        }

        @keyframes wheelRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(-360deg); }
        }

        @keyframes carVibrate {
            0% { transform: translate(-50%, 0px); }
            100% { transform: translate(-50%, 1px); }
        }

        @keyframes carBouncing {
            0%, 100% { bottom: 12%; }
            50% { bottom: 13.5%; }
        }

        @keyframes exhaustFlicker {
            0% { transform: scaleX(0.8) scaleY(0.9); opacity: 0.7; }
            100% { transform: scaleX(1.3) scaleY(1.1); opacity: 1; }
        }

        /* Forms UI & Dashboard Styling */
        .brand-logo {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            background: linear-gradient(135deg, var(--accent-cyan) 0%, var(--accent-pink) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-logo::before {
            content: '';
            width: 14px;
            height: 14px;
            background-color: var(--accent-cyan);
            border-radius: 4px;
            box-shadow: 0 0 10px var(--glow-cyan);
        }

        .header-title {
            font-size: 2.25rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 8px;
        }

        .header-subtitle {
            color: var(--text-secondary);
            font-weight: 300;
            font-size: 0.95rem;
            margin-bottom: 36px;
        }

        .form-group {
            position: relative;
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 14px 18px;
            color: white;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent-cyan);
            background: rgba(0, 240, 255, 0.02);
            box-shadow: 0 0 15px rgba(0, 240, 255, 0.15);
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(95deg, var(--accent-cyan) 0%, var(--accent-purple) 100%);
            color: #05050a;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 240, 255, 0.25);
            margin-top: 12px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 30px rgba(0, 240, 255, 0.4);
            filter: brightness(1.1);
        }

        .btn-submit:active {
            transform: translateY(1px);
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 0.9rem;
            margin-bottom: 24px;
        }

        /* Mock Dashboard Styles */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .user-badge {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .user-status-dot {
            width: 6px;
            height: 6px;
            background-color: var(--accent-cyan);
            border-radius: 50%;
            box-shadow: 0 0 8px var(--accent-cyan);
        }

        .btn-logout {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .btn-logout:hover {
            color: var(--accent-pink);
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
            border-radius: 12px;
            padding: 16px;
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
            background: #020205;
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 18px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            line-height: 1.5;
            color: var(--accent-cyan);
            height: 150px;
            overflow-y: auto;
            margin-bottom: 24px;
        }

        .console-line {
            margin-bottom: 4px;
        }

        .console-prompt::before {
            content: '$ ';
            color: var(--accent-pink);
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
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            }
            .panel-right {
                height: 380px;
                flex-grow: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Left Side: Forms / Dashboard Console -->
        <div class="panel-left">
            <div class="brand-logo">mpanel v2.0</div>

            <?php if (!$is_logged_in): ?>
                <h1 class="header-title">Control Center</h1>
                <p class="header-subtitle">Secure access portal to your CodeIgniter 4 cPanel hosting system.</p>

                <?php if ($error): ?>
                    <div class="alert-error"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form method="POST" action="<?= site_url('/') ?>">
                    <div class="form-group">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-input" type="text" id="username" name="username" placeholder="admin" required autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-input" type="password" id="password" name="password" placeholder="••••••••••••" required>
                    </div>

                    <button class="btn-submit" type="submit">Initialize Access</button>
                </form>
            <?php else: ?>
                <div class="dashboard-header">
                    <div>
                        <h1 class="header-title">cPanel Portal</h1>
                        <p class="header-subtitle" style="margin-bottom: 0;">Connected to CodeIgniter 4 + MilesWeb</p>
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
                        <div class="stat-label">System Load</div>
                        <div class="stat-val" id="cpu-load">12.4%</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Memory Usage</div>
                        <div class="stat-val">342MB / 2GB</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Active Domains</div>
                        <div class="stat-val">1 / Unlimited</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Bandwidth Used</div>
                        <div class="stat-val">2.81 GB</div>
                    </div>
                </div>

                <div class="console-panel">
                    <div class="console-line console-prompt">ssh admin@milesweb-portal</div>
                    <div class="console-line" style="color: #6b7280;">Connecting to host... Authentication verified.</div>
                    <div class="console-line console-prompt">rsync -avz --delete ./ public_html/</div>
                    <div class="console-line" style="color: var(--accent-pink);">deployment success: CodeIgniter 4 app running.</div>
                    <div class="console-line console-prompt"><span style="animation: pulseDot 1s infinite;">_</span></div>
                </div>

                <a href="https://github.com/sangeeth-21/mpanel" target="_blank" class="btn-submit" style="text-decoration: none; text-align: center; display: block;">GitHub Actions Dashboard</a>
            <?php endif; ?>
        </div>

        <!-- Right Side: Cyberpunk Animated Road/Car -->
        <div class="panel-right">
            <!-- Sky and Sun -->
            <div class="synth-sky">
                <div class="stars"></div>
                <div class="neon-sun"></div>
                <div class="mountains">
                    <div class="mountain"><div class="mountain-overlay"></div></div>
                    <div class="mountain" style="border-bottom-width: 90px; border-left-width: 120px; border-right-width: 120px;"><div class="mountain-overlay" style="border-bottom-width: 88px; border-left-width: 118px; border-right-width: 118px; bottom: -90px; left: -118px;"></div></div>
                    <div class="mountain"><div class="mountain-overlay"></div></div>
                </div>
            </div>

            <!-- Perspective Grid Road -->
            <div class="synth-grid">
                <div class="grid-lines"></div>
                <div class="speed-lines">
                    <div class="speed-line sl-1"></div>
                    <div class="speed-line sl-2"></div>
                    <div class="speed-line sl-3"></div>
                </div>
            </div>

            <!-- Dynamic SVG animated Car -->
            <div class="car-container">
                <div class="car-exhaust-flame"></div>
                <div class="car-headlight-beam"></div>
                
                <!-- Detailed Cyberpunk Car Body SVG -->
                <svg viewBox="0 0 320 120" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <!-- Headlight bulb glow -->
                    <circle cx="282" cy="74" r="5" fill="#00f0ff" opacity="0.8" filter="blur(2px)"/>
                    
                    <!-- Car chassis outline -->
                    <path d="M 30,75 
                             L 35,68 
                             L 65,65 
                             L 100,32 
                             L 190,32 
                             L 220,58 
                             L 275,68 
                             L 285,74
                             L 282,88 
                             L 260,90 
                             L 245,90 
                             A 24,24 0 0,0 205,90
                             L 115,90 
                             A 24,24 0 0,0 75,90
                             L 40,90 
                             Z" class="car-chassis" />
                    
                    <!-- Spoiler / Wing -->
                    <path d="M 28,73 L 15,55 L 42,55 L 40,64 Z" fill="#07080c" stroke="#ff007f" stroke-width="2" filter="drop-shadow(0 0 4px var(--glow-pink))" />
                    
                    <!-- Cabin Window Grid -->
                    <path d="M 105,37 L 180,37 L 205,58 L 105,58 Z" fill="rgba(0, 240, 255, 0.15)" stroke="#00f0ff" stroke-width="1.5" />
                    
                    <!-- Inner Cabin Division -->
                    <line x1="145" y1="37" x2="145" y2="58" stroke="#00f0ff" stroke-width="1.5" />

                    <!-- Side Panel Neon Stripe -->
                    <path d="M 50,73 L 260,73" class="car-neon-trim" />
                    <path d="M 100,80 L 195,80" class="car-neon-trim" />

                    <!-- Rear Light neon bar -->
                    <path d="M 28,68 L 32,84" stroke="#ff007f" stroke-width="4" stroke-linecap="round" filter="drop-shadow(0 0 6px var(--glow-pink))" />

                    <!-- Front Wheel -->
                    <g transform="translate(225, 90)">
                        <circle cx="0" cy="0" r="21" fill="#08080c" stroke="#ff007f" stroke-width="2" filter="drop-shadow(0 0 5px var(--glow-pink))" />
                        <g class="car-wheel">
                            <!-- Wheel spokes -->
                            <circle cx="0" cy="0" r="16" fill="none" stroke="#00f0ff" stroke-width="2.5" stroke-dasharray="8,6" />
                            <line x1="-16" y1="0" x2="16" y2="0" stroke="#00f0ff" stroke-width="2" />
                            <line x1="0" y1="-16" x2="0" y2="16" stroke="#00f0ff" stroke-width="2" />
                            <!-- Wheel center -->
                            <circle cx="0" cy="0" r="5" fill="#ff007f" />
                        </g>
                    </g>

                    <!-- Back Wheel -->
                    <g transform="translate(95, 90)">
                        <circle cx="0" cy="0" r="21" fill="#08080c" stroke="#ff007f" stroke-width="2" filter="drop-shadow(0 0 5px var(--glow-pink))" />
                        <g class="car-wheel">
                            <!-- Wheel spokes -->
                            <circle cx="0" cy="0" r="16" fill="none" stroke="#00f0ff" stroke-width="2.5" stroke-dasharray="8,6" />
                            <line x1="-16" y1="0" x2="16" y2="0" stroke="#00f0ff" stroke-width="2" />
                            <line x1="0" y1="-16" x2="0" y2="16" stroke="#00f0ff" stroke-width="2" />
                            <!-- Wheel center -->
                            <circle cx="0" cy="0" r="5" fill="#ff007f" />
                        </g>
                    </g>
                </svg>
            </div>
        </div>
    </div>

    <!-- Script to simulate dynamic system load stats -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cpuVal = document.getElementById('cpu-load');
            if (cpuVal) {
                setInterval(() => {
                    const randomVal = (Math.random() * 8 + 8).toFixed(1);
                    cpuVal.textContent = `${randomVal}%`;
                }, 3000);
            }
        });
    </script>
</body>
</html>
