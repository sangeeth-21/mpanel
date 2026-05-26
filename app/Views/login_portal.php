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
            transition: all 0.2s ease;
        }

        .footer-text a:hover {
            opacity: 0.9;
            text-shadow: 0 0 8px rgba(124, 58, 237, 0.4);
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

        #confirmPasswordGroup {
            max-height: 0;
            opacity: 0;
            margin-bottom: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s, margin-bottom 0.4s;
        }

        .signup-active #confirmPasswordGroup {
            max-height: 70px;
            opacity: 1;
            margin-bottom: 20px;
        }

        #formOptions {
            max-height: 50px;
            opacity: 1;
            overflow: hidden;
            transition: max-height 0.4s, opacity 0.4s, margin-bottom 0.4s;
        }

        .signup-active #formOptions {
            max-height: 0;
            opacity: 0;
            margin-bottom: 0;
            pointer-events: none;
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

        /* ---------------------------------------------------- */
        /* Financial Dashboard Redesign Styles                  */
        /* ---------------------------------------------------- */
        :root {
            --dash-bg: #f3f4f6;
            --dash-card-bg: #ffffff;
            --dash-card-shadow: rgba(0, 0, 0, 0.03);
            --dash-card-border: rgba(0, 0, 0, 0.05);
            --accent-terracotta: #2563eb; /* Royal blue for light mode */
            --accent-blue: #38bdf8;
            --text-dark: #111827;
            --text-gray: #6b7280;
        }

        [data-theme="dark"] {
            --dash-bg: #030712;
            --dash-card-bg: #0b0f19;
            --dash-card-shadow: rgba(0, 0, 0, 0.3);
            --dash-card-border: rgba(255, 255, 255, 0.05);
            --accent-terracotta: #3b82f6; /* Electric blue for dark mode */
            --accent-blue: #38bdf8;
            --text-dark: #f3f4f6;
            --text-gray: #9ca3af;
        }

        /* Modern Verification Modals */
        .auth-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(2, 4, 10, 0.6);
            backdrop-filter: blur(8px);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .auth-modal-overlay.open {
            opacity: 1;
            visibility: visible;
        }

        .auth-modal-card {
            background-color: var(--left-bg);
            border: 1px solid var(--input-border);
            border-radius: 24px;
            padding: 32px;
            max-width: 440px;
            width: 90%;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            transform: scale(0.9);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            text-align: center;
        }

        .auth-modal-overlay.open .auth-modal-card {
            transform: scale(1);
        }

        .auth-modal-title {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 8px;
            letter-spacing: -0.02em;
        }

        .auth-modal-desc {
            font-size: 0.9rem;
            color: var(--text-secondary);
            margin-bottom: 24px;
            line-height: 1.4;
        }

        .otp-inputs-row {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            margin-bottom: 24px;
        }

        .otp-input-field, .otp-reset-field {
            width: 48px;
            height: 52px;
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            border: 1px solid var(--input-border);
            background-color: var(--input-bg);
            color: var(--text-primary);
            border-radius: 12px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .otp-input-field:focus, .otp-reset-field:focus {
            border-color: var(--accent-terracotta);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .auth-modal-error {
            color: #ef4444;
            font-size: 0.85rem;
            margin-bottom: 16px;
            text-align: center;
            display: none;
        }

        .auth-modal-footer {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin-top: 16px;
        }

        .auth-modal-footer a {
            color: var(--accent-terracotta);
            text-decoration: none;
            font-weight: 600;
        }

        .auth-modal-footer a:hover {
            opacity: 0.9;
        }

        .btn-submit.loading {
            pointer-events: none;
            opacity: 0.7;
        }
        .btn-submit.loading::after {
            content: "";
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid white;
            border-top-color: transparent;
            border-radius: 50%;
            animation: dbSpinnerRotate 0.6s linear infinite;
            margin-left: 8px;
            vertical-align: middle;
        }
        @keyframes dbSpinnerRotate {
            to { transform: rotate(360deg); }
        }

        body.dashboard-scroll {
            overflow-y: auto !important;
            background-color: var(--dash-bg);
        }

        .dashboard-layout {
            height: auto !important;
            min-height: 100vh;
            background-color: var(--dash-bg);
        }

        .dashboard-layout .panel-left {
            width: 100% !important;
            min-height: 100vh;
            padding: 40px 40px 40px 100px !important;
            background-color: var(--dash-bg) !important;
            justify-content: flex-start !important;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .dashboard-layout .panel-right {
            display: none !important;
        }

        /* Sidebar Floating Pill Navigation */
        .db-sidebar {
            position: fixed;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 60px;
            background-color: var(--dash-card-bg);
            border: 1px solid var(--dash-card-border);
            border-radius: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 24px 0;
            gap: 28px;
            box-shadow: 0 10px 30px var(--dash-card-shadow);
            z-index: 100;
            transition: all 0.3s ease;
        }

        .db-sidebar-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-gray);
            background: transparent;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .db-sidebar-btn:hover {
            background-color: rgba(37, 99, 235, 0.1);
            color: var(--accent-terracotta);
        }

        .db-sidebar-btn.active {
            background-color: var(--accent-terracotta);
            color: #ffffff !important;
        }

        .db-sidebar-divider {
            width: 30px;
            height: 1px;
            background-color: var(--dash-card-border);
        }

        /* Header Section */
        .db-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            flex-wrap: wrap;
            gap: 16px;
            width: 100%;
        }

        .db-header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .db-menu-toggle {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 1px solid var(--dash-card-border);
            background: var(--dash-card-bg);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 4px;
            cursor: pointer;
            box-shadow: 0 2px 6px var(--dash-card-shadow);
        }

        .db-menu-toggle span {
            width: 18px;
            height: 2px;
            background-color: var(--text-dark);
            border-radius: 1px;
            transition: 0.2s;
        }

        .db-menu-toggle span:nth-child(2) {
            width: 12px;
            align-self: flex-start;
            margin-left: 12px;
        }

        .db-logo-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .db-logo-icon {
            width: 44px;
            height: 44px;
            background-color: #000000;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.1rem;
        }

        [data-theme="dark"] .db-logo-icon {
            background-color: #ffffff;
            color: #000000;
        }

        .db-logo-title h2 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.1;
        }

        .db-logo-title span {
            font-size: 0.8rem;
            color: var(--text-gray);
            font-weight: 400;
        }

        .db-header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .db-add-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 1px solid var(--dash-card-border);
            background: var(--dash-card-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text-dark);
            box-shadow: 0 2px 6px var(--dash-card-shadow);
            transition: all 0.2s;
        }

        .db-add-btn:hover {
            transform: scale(1.05);
            background-color: rgba(0, 0, 0, 0.02);
        }

        .db-profile-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--dash-card-bg);
            border: 1px solid var(--dash-card-border);
            padding: 4px 16px 4px 4px;
            border-radius: 30px;
            box-shadow: 0 2px 6px var(--dash-card-shadow);
        }

        .db-profile-img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--accent-terracotta);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            overflow: hidden;
        }
        
        .db-profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .db-profile-info {
            display: flex;
            flex-direction: column;
        }

        .db-profile-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-dark);
            line-height: 1.2;
        }

        .db-profile-role {
            font-size: 0.7rem;
            color: var(--text-gray);
        }

        .db-search-wrapper {
            position: relative;
            max-width: 240px;
            width: 100%;
        }

        .db-search-input {
            width: 100%;
            padding: 12px 16px 12px 40px;
            font-size: 0.85rem;
            border-radius: 30px;
            border: 1px solid var(--dash-card-border);
            background-color: var(--dash-card-bg);
            color: var(--text-dark);
            outline: none;
            font-family: inherit;
            box-shadow: 0 2px 6px var(--dash-card-shadow);
            transition: all 0.2s;
        }

        .db-search-input:focus {
            border-color: var(--accent-terracotta);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .db-search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
            pointer-events: none;
        }

        /* Subheader Panel */
        .db-subheader {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 20px;
            margin-bottom: 28px;
            align-items: center;
            width: 100%;
        }

        .db-sub-date-card {
            background: var(--dash-card-bg);
            border: 1px solid var(--dash-card-border);
            border-radius: 40px;
            padding: 8px 20px 8px 10px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 4px 15px var(--dash-card-shadow);
        }

        .db-date-circle {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 1px solid var(--dash-card-border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text-dark);
            background-color: var(--dash-bg);
        }

        .db-date-text {
            display: flex;
            flex-direction: column;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-dark);
            padding-right: 16px;
            border-right: 1px solid var(--dash-card-border);
        }

        .db-date-text span {
            font-weight: 400;
            color: var(--text-gray);
            font-size: 0.75rem;
        }

        .db-tasks-btn {
            background-color: var(--accent-terracotta);
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }

        .db-tasks-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3);
            filter: brightness(1.08);
        }

        .db-cal-icon-wrapper {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid var(--dash-card-border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            cursor: pointer;
            background-color: var(--dash-bg);
        }

        .db-cal-dot {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 6px;
            height: 6px;
            background-color: var(--accent-terracotta);
            border-radius: 50%;
        }

        .db-sub-help-card {
            background: var(--dash-card-bg);
            border: 1px solid var(--dash-card-border);
            border-radius: 40px;
            padding: 8px 12px 8px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 15px var(--dash-card-shadow);
        }

        .db-help-text {
            font-size: 1.35rem;
            font-weight: 600;
            color: var(--text-dark);
            letter-spacing: -0.03em;
        }

        .db-help-text span {
            color: var(--text-gray);
            font-weight: 400;
        }

        .db-mic-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: var(--dash-bg);
            border: 1px solid var(--dash-card-border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text-dark);
            transition: all 0.2s;
        }

        .db-mic-btn:hover {
            transform: scale(1.05);
            background-color: rgba(0, 0, 0, 0.04);
        }

        /* Dashboard Grid Layout */
        .db-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            width: 100%;
            margin-bottom: 40px;
        }

        /* Generic Card Styling */
        .db-card {
            background-color: var(--dash-card-bg);
            border: 1px solid var(--dash-card-border);
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 8px 24px var(--dash-card-shadow);
            transition: transform 0.3s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.3s ease;
            position: relative;
        }

        .db-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px var(--dash-card-shadow);
        }

        /* VISA Card Widget */
        .db-visa-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 290px;
        }

        .db-visa-link {
            font-size: 0.75rem;
            color: var(--text-gray);
            margin-top: 16px;
        }

        .db-visa-number {
            font-size: 1.45rem;
            font-weight: 700;
            color: var(--text-dark);
            letter-spacing: 0.05em;
            margin-bottom: 20px;
            font-family: 'JetBrains Mono', monospace;
        }

        .db-visa-actions {
            display: flex;
            gap: 12px;
            margin-bottom: 20px;
        }

        .db-visa-btn {
            flex: 1;
            padding: 12px;
            border-radius: 16px;
            font-size: 0.85rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-align: center;
            transition: all 0.2s;
        }

        .db-visa-btn.black {
            background-color: var(--text-primary);
            color: var(--left-bg);
        }
        
        .db-visa-btn.black:hover {
            opacity: 0.9;
        }

        .db-visa-btn.light {
            background-color: var(--dash-bg);
            color: var(--text-dark);
            border: 1px solid var(--dash-card-border);
        }

        .db-visa-btn.light:hover {
            background-color: rgba(0, 0, 0, 0.04);
        }

        .db-visa-footer {
            border-top: 1px solid var(--dash-card-border);
            padding-top: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .db-fee-label {
            font-size: 0.75rem;
            color: var(--text-gray);
        }

        .db-fee-val {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .db-edit-limit-btn {
            font-size: 0.75rem;
            color: var(--accent-terracotta);
            font-weight: 600;
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 4px;
            transition: opacity 0.2s;
        }

        .db-edit-limit-btn:hover {
            opacity: 0.8;
        }

        /* Income & Paid Card */
        .db-income-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 290px;
        }

        .db-income-section {
            display: flex;
            flex-direction: column;
        }

        .db-income-section:first-child {
            padding-bottom: 16px;
            border-bottom: 1px solid var(--dash-card-border);
        }

        .db-income-section:last-child {
            padding-top: 16px;
        }

        .db-income-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .db-income-label {
            font-size: 0.8rem;
            color: var(--text-gray);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .db-income-icon-indicator {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background-color: rgba(56, 189, 248, 0.1);
            color: var(--accent-blue);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .db-income-icon-indicator.orange {
            background-color: rgba(37, 99, 235, 0.1);
            color: var(--accent-terracotta);
        }

        .db-income-val {
            font-size: 1.45rem;
            font-weight: 700;
            color: var(--text-dark);
            font-family: 'JetBrains Mono', monospace;
        }

        .db-chart-link-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            color: var(--accent-terracotta);
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            margin-top: 8px;
            transition: opacity 0.2s;
        }

        .db-chart-link-btn:hover {
            opacity: 0.8;
        }

        /* Combined Cell Column Stack */
        .db-cell-stack {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* System Lock Widget with Blue Glowing Scan animation */
        .db-system-lock-card {
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            cursor: pointer;
            min-height: 135px;
            background-color: var(--dash-card-bg);
        }

        .db-lock-status-txt {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-top: 8px;
        }

        .db-lock-scanner-box {
            position: relative;
            width: 52px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .db-lock-fingerprint-svg {
            width: 32px;
            height: 32px;
            stroke: #38bdf8;
            stroke-width: 2.2;
            fill: none;
            stroke-linecap: round;
            animation: dbFingerprintScan 2s infinite alternate ease-in-out;
        }

        .db-lock-bracket {
            position: absolute;
            width: 48px;
            height: 48px;
            border: 1.5px solid transparent;
            border-radius: 10px;
        }

        .db-lock-bracket-tl { top: 0; left: 0; border-top-color: rgba(56, 189, 248, 0.7); border-left-color: rgba(56, 189, 248, 0.7); }
        .db-lock-bracket-tr { top: 0; right: 0; border-top-color: rgba(56, 189, 248, 0.7); border-right-color: rgba(56, 189, 248, 0.7); }
        .db-lock-bracket-bl { bottom: 0; left: 0; border-bottom-color: rgba(56, 189, 248, 0.7); border-left-color: rgba(56, 189, 248, 0.7); }
        .db-lock-bracket-br { bottom: 0; right: 0; border-bottom-color: rgba(56, 189, 248, 0.7); border-right-color: rgba(56, 189, 248, 0.7); }

        @keyframes dbFingerprintScan {
            0% {
                filter: drop-shadow(0 0 1px rgba(56, 189, 248, 0.5));
                opacity: 0.8;
                transform: scale(0.95);
            }
            100% {
                filter: drop-shadow(0 0 10px rgba(56, 189, 248, 1));
                opacity: 1;
                transform: scale(1.05);
            }
        }

        /* Circular Growth Widget */
        .db-growth-card {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 135px;
        }

        .db-growth-info {
            display: flex;
            flex-direction: column;
        }

        .db-growth-val {
            font-size: 1.45rem;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.2;
        }

        .db-growth-label {
            font-size: 0.75rem;
            color: var(--text-gray);
        }

        .db-growth-radial {
            position: relative;
            width: 60px;
            height: 60px;
        }

        .db-radial-svg {
            transform: rotate(-90deg);
            width: 100%;
            height: 100%;
        }

        .db-radial-bg {
            fill: none;
            stroke: var(--dash-bg);
            stroke-width: 5;
        }

        .db-radial-fill {
            fill: none;
            stroke: var(--accent-terracotta);
            stroke-width: 5;
            stroke-linecap: round;
            stroke-dasharray: 100;
            stroke-dashoffset: 64; /* 36% fill */
            animation: fillRadial 1.5s ease-out forwards;
        }

        @keyframes fillRadial {
            to { stroke-dashoffset: 64; }
        }

        /* Days Tracker Widget */
        .db-days-card {
            padding: 20px;
            min-height: 155px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .db-days-title {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            color: var(--text-gray);
            margin-bottom: 4px;
        }

        .db-days-val {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .db-days-sub {
            font-size: 0.7rem;
            color: var(--text-gray);
            margin-bottom: 8px;
        }

        .db-days-matrix {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 4px;
            width: 100%;
        }

        .db-matrix-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: var(--dash-bg);
        }

        .db-matrix-dot.active {
            background-color: var(--accent-terracotta);
        }

        /* Sparkline Widget */
        .db-sparkline-card {
            padding: 20px;
            min-height: 115px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .db-sparkline-info {
            display: flex;
            flex-direction: column;
        }

        .db-sparkline-tags {
            display: flex;
            gap: 8px;
            margin-top: 4px;
        }

        .db-spark-tag {
            font-size: 0.65rem;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 600;
            background-color: var(--dash-bg);
            color: var(--text-gray);
        }

        .db-spark-tag.active {
            background-color: rgba(37, 99, 235, 0.1);
            color: var(--accent-terracotta);
        }

        .db-spark-chart {
            width: 70px;
            height: 40px;
        }

        /* Annual Profits concentric circle widget */
        .db-profits-card {
            min-height: 380px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .db-profits-chart-box {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 220px;
            margin-top: 12px;
        }

        .db-profits-radial-svg {
            transform: rotate(-90deg);
            width: 190px;
            height: 190px;
        }

        .db-profits-ring {
            fill: none;
            stroke-linecap: round;
            stroke-width: 12;
            transition: stroke-dashoffset 1s ease-out;
        }

        .db-profits-ring-bg {
            stroke: var(--dash-bg);
        }

        /* Red/salmon gradient layers for circles */
        .db-profits-ring-1 { stroke: #1e3a8a; }
        .db-profits-ring-2 { stroke: #2563eb; }
        .db-profits-ring-3 { stroke: #3b82f6; }
        .db-profits-ring-4 { stroke: #60a5fa; }

        .db-profits-label-overlay {
            position: absolute;
            background-color: var(--dash-card-bg);
            border: 1px solid var(--dash-card-border);
            padding: 4px 8px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-dark);
            box-shadow: 0 2px 8px var(--dash-card-shadow);
        }

        /* Activity Manager (spans 2 columns) */
        .db-activity-card {
            grid-column: span 2;
            min-height: 380px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .db-activity-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--dash-card-border);
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 16px;
        }

        .db-activity-header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .db-activity-header-left h3 {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .db-activity-search {
            position: relative;
        }

        .db-activity-search-input {
            padding: 6px 12px 6px 30px;
            font-size: 0.75rem;
            border-radius: 12px;
            border: 1px solid var(--dash-card-border);
            background-color: var(--dash-bg);
            color: var(--text-dark);
            outline: none;
            width: 140px;
        }

        .db-activity-search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
            font-size: 0.65rem;
        }

        .db-activity-filters {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .db-filter-tag {
            font-size: 0.75rem;
            font-weight: 600;
            background-color: var(--dash-bg);
            color: var(--text-dark);
            padding: 4px 10px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 6px;
            border: 1px solid var(--dash-card-border);
            cursor: pointer;
        }

        .db-filter-tag-close {
            opacity: 0.5;
            font-weight: 400;
        }

        .db-activity-actions-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .db-act-icon-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-gray);
            border: 1px solid var(--dash-card-border);
            background: transparent;
            cursor: pointer;
        }

        .db-act-icon-btn:hover {
            background-color: var(--dash-bg);
            color: var(--text-dark);
        }

        .db-activity-grid-body {
            display: grid;
            grid-template-columns: 1fr 1.1fr 1.3fr;
            gap: 20px;
            height: 100%;
        }

        .db-act-sub-card {
            background-color: var(--dash-bg);
            border-radius: 20px;
            padding: 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 210px;
            border: 1px solid var(--dash-card-border);
        }

        .db-act-sub-card.white-bg {
            background-color: var(--dash-card-bg);
        }

        .db-act-daily-val {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .db-act-daily-val span {
            font-size: 0.75rem;
            color: var(--text-gray);
            font-weight: 400;
        }

        .db-act-bar-chart {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            height: 90px;
            padding-top: 10px;
            gap: 4px;
        }

        .db-act-bar {
            width: 6px;
            background-color: var(--accent-terracotta);
            opacity: 0.25;
            border-radius: 3px;
        }

        .db-act-bar.active {
            opacity: 1;
            box-shadow: 0 -2px 6px rgba(37, 99, 235, 0.3);
        }

        .db-act-matrix-dots {
            display: flex;
            justify-content: center;
            gap: 4px;
            margin-top: 8px;
        }

        .db-act-dot-nav {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background-color: var(--text-gray);
            opacity: 0.4;
        }

        .db-act-dot-nav.active {
            width: 14px;
            border-radius: 4px;
            background-color: var(--accent-terracotta);
            opacity: 1;
        }

        /* Business Plans Stack */
        .db-plans-title-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .db-plans-heading {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .db-plans-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .db-plan-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: var(--dash-bg);
            padding: 8px 12px;
            border-radius: 14px;
            border: 1px solid var(--dash-card-border);
        }

        .db-plan-left-grp {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .db-plan-icon-circ {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 0.75rem;
        }

        .db-plan-icon-circ.terracotta { background-color: var(--accent-terracotta); }
        .db-plan-icon-circ.blue { background-color: var(--accent-blue); }
        .db-plan-icon-circ.purple { background-color: #818cf8; }

        .db-plan-name-label {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .db-plan-arrow-sel {
            color: var(--text-gray);
            cursor: pointer;
        }

        /* Wallet Verification Card */
        .db-wallet-verify-card {
            border: 1.5px dashed rgba(37, 99, 235, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            padding: 16px;
            border-radius: 20px;
            min-height: 210px;
        }

        .db-wallet-sun-icon {
            width: 36px;
            height: 36px;
            color: var(--accent-terracotta);
            animation: dbSpinSun 10s infinite linear;
        }

        @keyframes dbSpinSun {
            100% { transform: rotate(360deg); }
        }

        .db-wallet-title-txt {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-dark);
        }

        .db-wallet-subtitle-txt {
            font-size: 0.7rem;
            color: var(--text-gray);
            line-height: 1.3;
            margin: 6px 0;
        }

        .db-wallet-enable-btn {
            width: 100%;
            background-color: var(--accent-terracotta);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.15);
        }

        .db-wallet-enable-btn:hover {
            box-shadow: 0 6px 14px rgba(37, 99, 235, 0.25);
            filter: brightness(1.08);
        }

        /* Stocks & Ratings Grid (stacked) */
        .db-stocks-val-card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 175px;
        }

        .db-stocks-val-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .db-stocks-val-price {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--text-dark);
            font-family: 'JetBrains Mono', monospace;
        }

        .db-stocks-val-change {
            font-size: 0.75rem;
            font-weight: 600;
            color: #10b981;
            background-color: rgba(16, 185, 129, 0.1);
            padding: 2px 8px;
            border-radius: 8px;
        }

        .db-stocks-line-svg {
            width: 100%;
            height: 60px;
            margin-top: 10px;
        }

        .db-rating-smileys-card {
            min-height: 175px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .db-rating-close-x {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid var(--dash-card-border);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.65rem;
            color: var(--text-gray);
            background-color: var(--dash-bg);
            transition: all 0.2s;
        }

        .db-rating-close-x:hover {
            color: var(--text-dark);
            background-color: rgba(0, 0, 0, 0.05);
        }

        .db-rating-lbl {
            font-size: 0.75rem;
            color: var(--text-gray);
        }

        .db-rating-question {
            font-size: 0.95rem;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.3;
        }

        .db-rating-emojis-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 4px;
        }

        .db-rating-emoji-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 1px solid var(--dash-card-border);
            background-color: var(--dash-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .db-rating-emoji-btn:hover {
            background-color: var(--accent-terracotta);
            border-color: var(--accent-terracotta);
            transform: scale(1.1);
        }
        
        .db-rating-emoji-btn:hover svg {
            stroke: #ffffff;
        }

        .db-rating-emoji-btn svg {
            width: 16px;
            height: 16px;
            stroke: var(--text-dark);
            stroke-width: 2;
            fill: none;
        }

        /* Floating pill responsive adjustment */
        @media (max-width: 1200px) {
            .db-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .db-activity-card {
                grid-column: span 2;
            }
        }

        @media (max-width: 960px) {
            .dashboard-layout .panel-left {
                padding: 100px 24px 40px 24px !important;
            }
            .db-sidebar {
                position: fixed;
                bottom: 16px;
                left: 50%;
                top: auto;
                transform: translateX(-50%);
                width: 90%;
                height: 56px;
                flex-direction: row;
                justify-content: space-around;
                padding: 0 20px;
                border-radius: 28px;
            }
            .db-sidebar-divider {
                width: 1px;
                height: 24px;
            }
            .db-subheader {
                grid-template-columns: 1fr;
            }
            .db-grid {
                grid-template-columns: 1fr;
            }
            .db-activity-card {
                grid-column: span 1;
            }
            .db-activity-grid-body {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="<?= $is_logged_in ? 'dashboard-scroll' : '' ?>">

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



    <div class="wrapper <?= $is_logged_in ? 'dashboard-layout' : '' ?>">
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
                        <h1 id="formTitle">Holla,<br>Welcome Back</h1>
                        <p id="formSub">Hey, welcome back to your special place</p>
                    </div>

                    <?php if ($error): ?>
                        <div class="alert-error" id="errorAlert"><?= htmlspecialchars($error) ?></div>
                    <?php endif; ?>
                    <div class="alert-error" id="clientErrorAlert" style="display: none;"></div>

                    <form method="POST" action="<?= site_url('/') ?>" id="authForm">
                        <input type="hidden" name="action" id="formAction" value="login">
                        
                        <div class="form-group">
                            <input class="form-input" type="email" id="email" name="email" placeholder="stanley@gmail.com" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <input class="form-input" type="password" id="password" name="password" placeholder="••••••••••••" required>
                        </div>

                        <div class="form-group" id="confirmPasswordGroup">
                            <input class="form-input" type="password" id="confirm_password" name="confirm_password" placeholder="confirm password">
                        </div>

                        <div class="form-options" id="formOptions">
                            <label class="remember-me">
                                <input type="checkbox" name="remember" id="remember" checked>
                                <span class="checkbox-custom"></span>
                                Remember me
                            </label>
                            <a href="#" class="forgot-password">Forgot Password?</a>
                        </div>

                        <button class="btn-submit" type="submit" id="btnSubmit">Sign In</button>
                    </form>

                    <div class="footer-text" id="formFooter">
                        Don't have an account? <a href="#" id="toggleAuthMode">Sign Up</a>
                    </div>
                </div>
            <?php else: ?>
                <!-- Sidebar Floating Pill -->
                <div class="db-sidebar">
                    <!-- Profile Icon at top of Sidebar -->
                    <div class="db-profile-img" style="width: 40px; height: 40px; margin-bottom: 12px; cursor: pointer; box-shadow: 0 2px 6px var(--dash-card-shadow);" onclick="alert('Dwayne Tatum\nCEO Assistant')">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Avatar" onerror="this.style.display='none';">
                        DT
                    </div>
                    <div class="db-sidebar-divider" style="margin-bottom: 12px; width: 24px;"></div>

                    <button class="db-sidebar-btn active" title="Financial Dashboard">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="9"></rect>
                            <rect x="14" y="3" width="7" height="5"></rect>
                            <rect x="14" y="12" width="7" height="9"></rect>
                            <rect x="3" y="16" width="7" height="5"></rect>
                        </svg>
                    </button>
                    <button class="db-sidebar-btn" title="Accounts" onclick="alert('Accounts panel opened.')">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="2" y1="10" x2="22" y2="10"></line>
                        </svg>
                    </button>
                    <button class="db-sidebar-btn" title="Statistics" onclick="alert('Detailed analytics view loading...')">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="14"></line>
                        </svg>
                    </button>
                    <div class="db-sidebar-divider" style="width: 24px;"></div>
                    <button class="db-sidebar-btn" title="System Settings" onclick="alert('Configuration manager loaded.')">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                        </svg>
                    </button>
                    
                    <!-- Theme Toggle Button inside Sidebar -->
                    <button class="db-sidebar-btn theme-switch-container" title="Toggle Theme" style="margin-top: auto; margin-bottom: 8px;">
                        <svg class="sun-icon-thumb" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                        <svg class="moon-icon-thumb" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                    </button>

                    <!-- Logout Button -->
                    <a href="<?= site_url('/?action=logout') ?>" class="db-sidebar-btn" title="Sign Out" style="color: var(--accent-terracotta);">
                        <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                    </a>
                </div>

                <!-- Subheader -->
                <div class="db-subheader">
                    <div class="db-sub-date-card">
                        <div class="db-date-circle">19</div>
                        <div class="db-date-text">
                            Tue, December
                            <span>Active Portal: <?= htmlspecialchars($user) ?></span>
                        </div>
                        <button class="db-tasks-btn" onclick="alert('No tasks pending for today!')">
                            Show my Tasks
                            <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                        
                        <!-- Relocated Search Bar inside Subheader -->
                        <div class="db-search-wrapper" style="margin-left: 12px; max-width: 200px;">
                            <svg class="db-search-icon" viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" style="left: 12px;">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                            <input type="text" class="db-search-input" placeholder="Search..." style="padding: 10px 12px 10px 34px; font-size: 0.8rem; box-shadow: none; border-radius: 20px;">
                        </div>

                        <div class="db-cal-icon-wrapper" onclick="alert('Calendar schedule syncing...')" style="margin-left: 8px;">
                            <span class="db-cal-dot"></span>
                            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="db-sub-help-card">
                        <div class="db-help-text">
                            Hey, Need help? 👋 <span>| Just ask me anything!</span>
                        </div>
                        <div class="db-mic-btn" onclick="alert('Voice command interface listening...')">
                            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"></path>
                                <path d="M19 10v2a7 7 0 0 1-14 0v-2"></path>
                                <line x1="12" y1="19" x2="12" y2="23"></line>
                                <line x1="8" y1="23" x2="16" y2="23"></line>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Grid -->
                <div class="db-grid">
                    
                    <!-- VISA Card -->
                    <div class="db-card db-visa-card">
                        <div class="db-card-header">
                            <span class="db-card-title">VISA</span>
                            <select class="db-dropdown-select">
                                <option>Direct Debits</option>
                                <option>Credit Line</option>
                            </select>
                        </div>
                        <div>
                            <div class="db-visa-link">Linked to main account</div>
                            <div class="db-visa-number">**** 2719</div>
                            <div class="db-visa-actions">
                                <button class="db-visa-btn black" onclick="alert('No pending deposit requests.')">Receive</button>
                                <button class="db-visa-btn light" onclick="alert('No card recipients defined.')">Send</button>
                            </div>
                        </div>
                        <div class="db-visa-footer">
                            <div>
                                <div class="db-fee-label">Monthly regular fee</div>
                                <div class="db-fee-val">$ 25.00</div>
                            </div>
                            <button class="db-edit-limit-btn" onclick="alert('Card security filters loaded.')">
                                <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 1 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                                Edit limit
                            </button>
                        </div>
                    </div>
                    
                    <!-- Income & Paid -->
                    <div class="db-card db-income-card">
                        <div class="db-income-section">
                            <div class="db-income-header">
                                <span class="db-income-label">
                                    <span class="db-income-icon-indicator">
                                        <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="12" y1="19" x2="12" y2="5"></line>
                                            <polyline points="5 12 12 5 19 12"></polyline>
                                        </svg>
                                    </span>
                                    Total income
                                </span>
                                <select class="db-dropdown-select">
                                    <option>Weekly</option>
                                    <option>Monthly</option>
                                </select>
                            </div>
                            <div class="db-income-val">$ 23,194.80</div>
                        </div>
                        
                        <div class="db-income-section">
                            <div class="db-income-header">
                                <span class="db-income-label">
                                    <span class="db-income-icon-indicator orange">
                                        <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <polyline points="19 12 12 19 5 12"></polyline>
                                        </svg>
                                    </span>
                                    Total paid
                                </span>
                                <select class="db-dropdown-select">
                                    <option>Weekly</option>
                                    <option>Monthly</option>
                                </select>
                            </div>
                            <div class="db-income-val">$ 8,145.20</div>
                        </div>
                        
                        <a href="#" class="db-chart-link-btn" onclick="alert('Comprehensive analysis charts loading...'); return false;">
                            <svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3v18h18"></path>
                                <polyline points="18.7 8 12 14.7 8.8 11.5 3 17.3"></polyline>
                            </svg>
                            View on chart mode
                        </a>
                    </div>
                    
                    <!-- System Lock & Growth Rate Stack -->
                    <div class="db-cell-stack">
                        
                        <!-- System Lock widget with glowing fingerprint scan animation -->
                        <div class="db-card db-system-lock-card" id="sysLockWidget">
                            <div class="db-lock-scanner-box">
                                <div class="db-lock-bracket db-lock-bracket-tl"></div>
                                <div class="db-lock-bracket db-lock-bracket-tr"></div>
                                <div class="db-lock-bracket db-lock-bracket-bl"></div>
                                <div class="db-lock-bracket db-lock-bracket-br"></div>
                                
                                <svg class="db-lock-fingerprint-svg" viewBox="0 0 24 24">
                                    <path d="M12 11c.73 0 1.39.29 1.88.77M12 8c1.65 0 3 1.35 3 3v2M12 5c3.31 0 6 2.69 6 6v3M6 11c0-3.31 2.69-6 6-6M9.17 19.17a6.002 6.002 0 0 1-1.17-3.17v-1M15.83 19.17c.74-1.11 1.17-2.44 1.17-3.87v-1M12 14c.55 0 1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1v2c0 .55.45 1 1 1z" />
                                </svg>
                            </div>
                            <span class="db-lock-status-txt" id="sysLockTxt">System Lock: ACTIVE</span>
                        </div>
                        
                        <!-- Growth Circular Rate Widget -->
                        <div class="db-card db-growth-card">
                            <div class="db-growth-info">
                                <span class="db-growth-val">36%</span>
                                <span class="db-growth-label">Growth rate</span>
                            </div>
                            <div class="db-growth-radial">
                                <svg class="db-radial-svg" viewBox="0 0 36 36">
                                    <circle class="db-radial-bg" cx="18" cy="18" r="15.915"></circle>
                                    <circle class="db-radial-fill" cx="18" cy="18" r="15.915"></circle>
                                </svg>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Days Tracker & Sparkline Stack -->
                    <div class="db-cell-stack">
                        
                        <!-- Days Tracker dot matrix widget -->
                        <div class="db-card db-days-card">
                            <div>
                                <div class="db-days-title">
                                    <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                    Time Remaining
                                </div>
                                <div class="db-days-val">13 Days</div>
                                <div class="db-days-sub">109 hours, 23 minutes</div>
                            </div>
                            <div class="db-days-matrix">
                                <!-- Grid Dot Matrix -->
                                <?php for($i=1; $i<=24; $i++): ?>
                                    <div class="db-matrix-dot <?= $i <= 10 ? 'active' : '' ?>"></div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        
                        <!-- Sparkline widget -->
                        <div class="db-card db-sparkline-card">
                            <div class="db-sparkline-info">
                                <div class="db-sparkline-tags">
                                    <span class="db-spark-tag active">2023</span>
                                    <span class="db-spark-tag">2022</span>
                                </div>
                                <div class="db-fee-label" style="margin-top: 8px;">Overall Performance</div>
                                <div class="db-fee-val" style="font-size: 1.1rem;">+24.8%</div>
                            </div>
                            
                            <!-- Simple Sparkline SVG line -->
                            <svg class="db-spark-chart" viewBox="0 0 70 40">
                                <path d="M 0 35 Q 15 15 30 25 T 60 10 L 70 5" fill="none" stroke="var(--accent-terracotta)" stroke-width="2.5" stroke-linecap="round"></path>
                                <circle cx="70" cy="5" r="3.5" fill="var(--accent-terracotta)"></circle>
                            </svg>
                        </div>
                        
                    </div>
                    
                    <!-- Annual Profits Concentric circles widget -->
                    <div class="db-card db-profits-card">
                        <div class="db-card-header" style="margin-bottom: 0;">
                            <span class="db-card-title" style="font-size: 0.9rem;">Annual profits</span>
                            <select class="db-dropdown-select">
                                <option>2023</option>
                                <option>2022</option>
                            </select>
                        </div>
                        
                        <div class="db-profits-chart-box">
                            <svg class="db-profits-radial-svg" viewBox="0 0 200 200">
                                <!-- Ring 1: outer ($14K) -->
                                <circle class="db-profits-ring db-profits-ring-bg" cx="100" cy="100" r="80"></circle>
                                <circle class="db-profits-ring db-profits-ring-1" cx="100" cy="100" r="80" stroke-dasharray="502" stroke-dashoffset="150"></circle>
                                
                                <!-- Ring 2: ($9.3K) -->
                                <circle class="db-profits-ring db-profits-ring-bg" cx="100" cy="100" r="60"></circle>
                                <circle class="db-profits-ring db-profits-ring-2" cx="100" cy="100" r="60" stroke-dasharray="376" stroke-dashoffset="120"></circle>
                                
                                <!-- Ring 3: ($6.8K) -->
                                <circle class="db-profits-ring db-profits-ring-bg" cx="100" cy="100" r="40"></circle>
                                <circle class="db-profits-ring db-profits-ring-3" cx="100" cy="100" r="40" stroke-dasharray="251" stroke-dashoffset="90"></circle>
                                
                                <!-- Ring 4: inner ($4K) -->
                                <circle class="db-profits-ring db-profits-ring-bg" cx="100" cy="100" r="20"></circle>
                                <circle class="db-profits-ring db-profits-ring-4" cx="100" cy="100" r="20" stroke-dasharray="125" stroke-dashoffset="50"></circle>
                            </svg>
                            
                            <!-- Overlaid text circles labels -->
                            <div class="db-profits-label-overlay" style="top: 15px; right: 35px;">$14K</div>
                            <div class="db-profits-label-overlay" style="top: 45px; right: 50px;">$9.3K</div>
                            <div class="db-profits-label-overlay" style="top: 72px; right: 62px;">$6.8K</div>
                            <div class="db-profits-label-overlay" style="top: 96px; right: 75px;">$4K</div>
                        </div>
                    </div>
                    
                    <!-- Activity Manager widget (spans 2 columns) -->
                    <div class="db-card db-activity-card">
                        <div class="db-activity-header">
                            <div class="db-activity-header-left">
                                <h3>Activity manager</h3>
                                <div class="db-activity-search">
                                    <svg class="db-activity-search-icon" viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                    <input type="text" class="db-activity-search-input" placeholder="Search in activities ...">
                                </div>
                            </div>
                            
                            <div class="db-activity-filters">
                                <select class="db-dropdown-select" style="padding: 4px 10px; border-radius: 12px;">
                                    <option>Team</option>
                                    <option>Individual</option>
                                </select>
                                <div class="db-filter-tag" onclick="this.style.display='none'">
                                    Insights <span class="db-filter-tag-close">×</span>
                                </div>
                                <div class="db-filter-tag" onclick="this.style.display='none'">
                                    Today <span class="db-filter-tag-close">×</span>
                                </div>
                                
                                <div class="db-activity-actions-right">
                                    <button class="db-act-icon-btn">⋮</button>
                                    <button class="db-act-icon-btn" onclick="alert('Full screen analytics view toggled.')">
                                        <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"></path>
                                        </svg>
                                    </button>
                                    <button class="db-filter-tag" style="background-color: var(--dash-card-bg);" onclick="alert('Filter drawer opened.')">
                                        <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                        </svg>
                                        Filters
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="db-activity-grid-body">
                            <!-- Subsection 1: Daily Bar chart -->
                            <div class="db-act-sub-card">
                                <div class="db-act-daily-val">$ 43.20 <span>USD</span></div>
                                <div class="db-act-bar-chart">
                                    <!-- Dynamic heights mimicking screenshot barcodes -->
                                    <div class="db-act-bar" style="height: 40%;"></div>
                                    <div class="db-act-bar" style="height: 65%;"></div>
                                    <div class="db-act-bar" style="height: 35%;"></div>
                                    <div class="db-act-bar" style="height: 80%;"></div>
                                    <div class="db-act-bar active" style="height: 95%;"></div>
                                    <div class="db-act-bar" style="height: 50%;"></div>
                                    <div class="db-act-bar" style="height: 25%;"></div>
                                    <div class="db-act-bar" style="height: 70%;"></div>
                                </div>
                                <div class="db-act-matrix-dots">
                                    <span class="db-act-dot-nav"></span>
                                    <span class="db-act-dot-nav"></span>
                                    <span class="db-act-dot-nav active"></span>
                                    <span class="db-act-dot-nav"></span>
                                </div>
                            </div>
                            
                            <!-- Subsection 2: Business Plans Dropdowns -->
                            <div class="db-act-sub-card white-bg">
                                <div class="db-plans-title-row">
                                    <span class="db-plans-heading">Business plans</span>
                                    <span style="font-size: 1rem; color: var(--text-gray); cursor:pointer;">⋮</span>
                                </div>
                                <div class="db-plans-list">
                                    <div class="db-plan-row" onclick="alert('Displaying Loan applications...')">
                                        <div class="db-plan-left-grp">
                                            <div class="db-plan-icon-circ terracotta">🏦</div>
                                            <span class="db-plan-name-label">Bank loans</span>
                                        </div>
                                        <span class="db-plan-arrow-sel">▼</span>
                                    </div>
                                    <div class="db-plan-row" onclick="alert('Loading Accounting Ledgers...')">
                                        <div class="db-plan-left-grp">
                                            <div class="db-plan-icon-circ blue">📊</div>
                                            <span class="db-plan-name-label">Accounting</span>
                                        </div>
                                        <span class="db-plan-arrow-sel"></span>
                                    </div>
                                    <div class="db-plan-row" onclick="alert('Loading HR Directory...')">
                                        <div class="db-plan-left-grp">
                                            <div class="db-plan-icon-circ purple">👥</div>
                                            <span class="db-plan-name-label">HR management</span>
                                        </div>
                                        <span class="db-plan-arrow-sel"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Subsection 3: Wallet Verification alert -->
                            <div class="db-act-sub-card">
                                <div class="db-wallet-verify-card">
                                    <svg class="db-wallet-sun-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"></path>
                                    </svg>
                                    <div>
                                        <div class="db-wallet-title-txt">Wallet Verification</div>
                                        <div class="db-wallet-subtitle-txt">Enable 2-step verification to secure your wallet.</div>
                                    </div>
                                    <button class="db-wallet-enable-btn" onclick="alert('Verification flow initiated.')">Enable</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Stocks pricing & Rating card stack -->
                    <div class="db-cell-stack">
                        
                        <!-- Main Stocks Widget -->
                        <div class="db-card db-stocks-card">
                            <div class="db-stocks-val-header">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <span class="db-income-icon-indicator" style="background-color: var(--dash-bg); color: var(--text-dark);">
                                        📈
                                    </span>
                                    <span class="db-plans-heading">Main Stocks</span>
                                </div>
                                <span class="db-stocks-val-change">+ 9.3%</span>
                            </div>
                            
                            <div style="margin-top: 10px;">
                                <span class="db-fee-label">Extended & Limited</span>
                                <div class="db-stocks-val-price">$ 16,073.49</div>
                            </div>
                            
                            <!-- Beautiful curved stocks sparkline line chart -->
                            <svg class="db-stocks-line-svg" viewBox="0 0 200 60">
                                <path d="M 0 50 Q 30 20 60 45 T 120 15 T 180 35 L 200 20" fill="none" stroke="var(--accent-terracotta)" stroke-width="3" stroke-linecap="round"></path>
                                <circle cx="200" cy="20" r="4.5" fill="var(--accent-terracotta)"></circle>
                            </svg>
                        </div>
                        
                        <!-- Review Rating Widget -->
                        <div class="db-card db-rating-smileys-card" id="ratingWidget">
                            <button class="db-rating-close-x" onclick="document.getElementById('ratingWidget').style.display='none';">×</button>
                            <div>
                                <div class="db-rating-lbl">Review rating</div>
                                <div class="db-rating-question">How is your business management going?</div>
                            </div>
                            
                            <div class="db-rating-emojis-row">
                                <button class="db-rating-emoji-btn" onclick="alert('Thank you for rating!')" title="Awful">
                                    <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8zm-3-9.5a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5zm6 0a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5zm-6 4a3 3 0 0 1 6 0" stroke-linecap="round"/></svg>
                                </button>
                                <button class="db-rating-emoji-btn" onclick="alert('Thank you for rating!')" title="Bad">
                                    <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8zm-3-9.5a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5zm6 0a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5zm-5 4h4" stroke-linecap="round"/></svg>
                                </button>
                                <button class="db-rating-emoji-btn" onclick="alert('Thank you for rating!')" title="Neutral">
                                    <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8zm-3-9.5a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5zm6 0a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5z" stroke-linecap="round"/></svg>
                                </button>
                                <button class="db-rating-emoji-btn" onclick="alert('Thank you for rating!')" title="Good">
                                    <svg viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8zm-3-9.5a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5zm6 0a1.5 1.5 0 1 1 1.5-1.5 1.5 1.5 0 0 1-1.5 1.5zm-6 3a3 3 0 0 0 6 0" stroke-linecap="round"/></svg>
                                </button>
                            </div>
                        </div>
                        
                    </div>
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
            const themeToggleBtns = document.querySelectorAll('.theme-switch-container');
            const htmlElement = document.documentElement;

            // Check localstorage or default to light
            const savedTheme = localStorage.getItem('theme') || 'light';
            htmlElement.setAttribute('data-theme', savedTheme);

            themeToggleBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const currentTheme = htmlElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                    htmlElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                });
            });

            // Auth mode toggle script (Login <-> Signup)
            const toggleAuthModeBtn = document.getElementById('toggleAuthMode');
            const panelLeft = document.querySelector('.panel-left');
            const formTitle = document.getElementById('formTitle');
            const formSub = document.getElementById('formSub');
            const formAction = document.getElementById('formAction');
            const btnSubmit = document.getElementById('btnSubmit');
            const formFooter = document.getElementById('formFooter');
            const confirmPassword = document.getElementById('confirm_password');
            const clientErrorAlert = document.getElementById('clientErrorAlert');
            const errorAlert = document.getElementById('errorAlert');

            if (toggleAuthModeBtn) {
                toggleAuthModeBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (clientErrorAlert) clientErrorAlert.style.display = 'none';
                    if (errorAlert) errorAlert.style.display = 'none';
                    
                    const isLoginMode = formAction.value === 'login';
                    if (isLoginMode) {
                        // Switch to Signup
                        panelLeft.classList.add('signup-active');
                        formTitle.innerHTML = 'Holla,<br>Create Account';
                        formSub.textContent = 'Hey, sign up to create your special place';
                        formAction.value = 'signup';
                        btnSubmit.textContent = 'Sign Up';
                        formFooter.innerHTML = 'Already have an account? <a href="#" id="toggleAuthMode">Sign In</a>';
                        confirmPassword.setAttribute('required', 'required');
                    } else {
                        // Switch to Login
                        panelLeft.classList.remove('signup-active');
                        formTitle.innerHTML = 'Holla,<br>Welcome Back';
                        formSub.textContent = 'Hey, welcome back to your special place';
                        formAction.value = 'login';
                        btnSubmit.textContent = 'Sign In';
                        formFooter.innerHTML = 'Don\'t have an account? <a href="#" id="toggleAuthMode">Sign Up</a>';
                        confirmPassword.removeAttribute('required');
                    }
                    // Re-register listener on dynamically recreated link
                    setTimeout(bindToggleListener, 50);
                });
            }

            function bindToggleListener() {
                const newToggleBtn = document.getElementById('toggleAuthMode');
                if (newToggleBtn && newToggleBtn !== toggleAuthModeBtn) {
                    newToggleBtn.replaceWith(newToggleBtn.cloneNode(true));
                    document.getElementById('toggleAuthMode').addEventListener('click', (e) => {
                        e.preventDefault();
                        toggleAuthModeBtn.click();
                    });
                }
            }

            // Client-side password verification
            const authForm = document.getElementById('authForm');
            if (authForm) {
                authForm.addEventListener('submit', (e) => {
                    if (clientErrorAlert) clientErrorAlert.style.display = 'none';

                    if (formAction.value === 'signup') {
                        const pass = document.getElementById('password').value;
                        const confirmPass = confirmPassword.value;
                        if (pass !== confirmPass) {
                            e.preventDefault();
                            if (clientErrorAlert) {
                                clientErrorAlert.textContent = 'Passwords do not match.';
                                clientErrorAlert.style.display = 'block';
                            }
                        }
                    }
                });
            }

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

            // System Lock widget toggle behavior
            const sysLockWidget = document.getElementById('sysLockWidget');
            const sysLockTxt = document.getElementById('sysLockTxt');
            if (sysLockWidget && sysLockTxt) {
                sysLockWidget.addEventListener('click', () => {
                    const isActive = sysLockTxt.textContent.includes('ACTIVE');
                    if (isActive) {
                        sysLockTxt.textContent = 'System Lock: SECURED';
                        sysLockWidget.style.borderColor = '#10b981';
                        const scanner = sysLockWidget.querySelector('.db-lock-fingerprint-svg');
                        if (scanner) scanner.style.stroke = '#10b981';
                    } else {
                        sysLockTxt.textContent = 'System Lock: ACTIVE';
                        sysLockWidget.style.borderColor = '';
                        const scanner = sysLockWidget.querySelector('.db-lock-fingerprint-svg');
                        if (scanner) scanner.style.stroke = '';
                    }
                });
            }
        });
    </script>

    <!-- Signup OTP Verification Modal -->
    <div class="auth-modal-overlay" id="signupOtpModal">
        <div class="auth-modal-card">
            <h2 class="auth-modal-title">Verify Email Address</h2>
            <p class="auth-modal-desc">We've sent a 6-digit OTP code to your email. Please enter it below to verify your account.</p>
            
            <form id="signupOtpForm">
                <div class="otp-inputs-row">
                    <input type="text" class="otp-input-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                    <input type="text" class="otp-input-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                    <input type="text" class="otp-input-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                    <input type="text" class="otp-input-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                    <input type="text" class="otp-input-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                    <input type="text" class="otp-input-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                </div>
                <div class="auth-modal-error" id="signupOtpError"></div>
                <button class="btn-submit" type="submit" id="signupOtpSubmit" style="width: 100%;">Verify & Register</button>
            </form>
            <div class="auth-modal-footer">
                Did not get the code? <a href="#" id="resendSignupOtpBtn">Resend Code</a> or <a href="#" onclick="closeModal('signupOtpModal'); return false;">Cancel</a>
            </div>
        </div>
    </div>

    <!-- Forgot Password Email Request Modal -->
    <div class="auth-modal-overlay" id="forgotRequestModal">
        <div class="auth-modal-card">
            <h2 class="auth-modal-title">Forgot Password</h2>
            <p class="auth-modal-desc">Enter your email address and we'll send you a 6-digit OTP code to reset your password.</p>
            
            <form id="forgotRequestForm">
                <div class="form-group" style="margin-bottom: 20px;">
                    <input class="form-input" type="email" id="forgotEmail" placeholder="stanley@gmail.com" required autocomplete="off">
                </div>
                <div class="auth-modal-error" id="forgotRequestError"></div>
                <button class="btn-submit" type="submit" id="forgotRequestSubmit" style="width: 100%;">Send Reset Code</button>
            </form>
            <div class="auth-modal-footer">
                Remember your password? <a href="#" onclick="closeModal('forgotRequestModal'); return false;">Sign In</a>
            </div>
        </div>
    </div>

    <!-- Forgot Password Reset OTP Modal -->
    <div class="auth-modal-overlay" id="forgotVerifyModal">
        <div class="auth-modal-card">
            <h2 class="auth-modal-title">Reset Password</h2>
            <p class="auth-modal-desc">Please enter the 6-digit verification code sent to your email along with your new password.</p>
            
            <form id="forgotVerifyForm">
                <div class="otp-inputs-row" style="margin-bottom: 20px;">
                    <input type="text" class="otp-reset-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                    <input type="text" class="otp-reset-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                    <input type="text" class="otp-reset-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                    <input type="text" class="otp-reset-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                    <input type="text" class="otp-reset-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                    <input type="text" class="otp-reset-field" maxlength="1" required pattern="[0-9]" autocomplete="off">
                </div>
                <div class="form-group" style="margin-bottom: 16px;">
                    <input class="form-input" type="password" id="forgotNewPassword" placeholder="New Password (min 6 characters)" required>
                </div>
                <div class="form-group" style="margin-bottom: 24px;">
                    <input class="form-input" type="password" id="forgotConfirmPassword" placeholder="Confirm New Password" required>
                </div>
                <div class="auth-modal-error" id="forgotVerifyError"></div>
                <button class="btn-submit" type="submit" id="forgotVerifySubmit" style="width: 100%;">Update Password</button>
            </form>
            <div class="auth-modal-footer">
                Did not get the code? <a href="#" id="resendForgotOtpBtn">Resend Code</a> or <a href="#" onclick="closeModal('forgotVerifyModal'); return false;">Cancel</a>
            </div>
        </div>
    </div>

    <!-- Advanced Auth AJAX Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Theme toggle script
            const themeToggleBtns = document.querySelectorAll('.theme-switch-container');
            const htmlElement = document.documentElement;

            const savedTheme = localStorage.getItem('theme') || 'light';
            htmlElement.setAttribute('data-theme', savedTheme);

            themeToggleBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const currentTheme = htmlElement.getAttribute('data-theme');
                    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
                    htmlElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                    
                    // Sync moon/sun display inside sidebar toggle
                    syncSidebarThemeIcons(newTheme);
                });
            });

            function syncSidebarThemeIcons(theme) {
                const sidebarToggle = document.querySelector('.db-sidebar .theme-switch-container');
                if (sidebarToggle) {
                    const sun = sidebarToggle.querySelector('.sun-icon-thumb');
                    const moon = sidebarToggle.querySelector('.moon-icon-thumb');
                    if (theme === 'dark') {
                        if (sun) sun.style.display = 'none';
                        if (moon) moon.style.display = 'block';
                    } else {
                        if (sun) sun.style.display = 'block';
                        if (moon) moon.style.display = 'none';
                    }
                }
            }
            syncSidebarThemeIcons(savedTheme);

            // Auth mode toggle script (Login <-> Signup)
            const toggleAuthModeBtn = document.getElementById('toggleAuthMode');
            const panelLeft = document.querySelector('.panel-left');
            const formTitle = document.getElementById('formTitle');
            const formSub = document.getElementById('formSub');
            const formAction = document.getElementById('formAction');
            const btnSubmit = document.getElementById('btnSubmit');
            const formFooter = document.getElementById('formFooter');
            const confirmPassword = document.getElementById('confirm_password');
            const clientErrorAlert = document.getElementById('clientErrorAlert');
            const errorAlert = document.getElementById('errorAlert');

            if (toggleAuthModeBtn) {
                toggleAuthModeBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (clientErrorAlert) clientErrorAlert.style.display = 'none';
                    if (errorAlert) errorAlert.style.display = 'none';
                    
                    const isLoginMode = formAction.value === 'login';
                    if (isLoginMode) {
                        panelLeft.classList.add('signup-active');
                        formTitle.innerHTML = 'Holla,<br>Create Account';
                        formSub.textContent = 'Hey, sign up to create your special place';
                        formAction.value = 'signup';
                        btnSubmit.textContent = 'Sign Up';
                        formFooter.innerHTML = 'Already have an account? <a href="#" id="toggleAuthMode">Sign In</a>';
                        confirmPassword.setAttribute('required', 'required');
                    } else {
                        panelLeft.classList.remove('signup-active');
                        formTitle.innerHTML = 'Holla,<br>Welcome Back';
                        formSub.textContent = 'Hey, welcome back to your special place';
                        formAction.value = 'login';
                        btnSubmit.textContent = 'Sign In';
                        formFooter.innerHTML = 'Don\'t have an account? <a href="#" id="toggleAuthMode">Sign Up</a>';
                        confirmPassword.removeAttribute('required');
                    }
                    setTimeout(bindToggleListener, 50);
                });
            }

            function bindToggleListener() {
                const newToggleBtn = document.getElementById('toggleAuthMode');
                if (newToggleBtn && newToggleBtn !== toggleAuthModeBtn) {
                    newToggleBtn.replaceWith(newToggleBtn.cloneNode(true));
                    document.getElementById('toggleAuthMode').addEventListener('click', (e) => {
                        e.preventDefault();
                        toggleAuthModeBtn.click();
                    });
                }
            }

            // AJAX Form Submission Handler (Login and Sign Up Request)
            const authForm = document.getElementById('authForm');
            if (authForm) {
                authForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    if (clientErrorAlert) clientErrorAlert.style.display = 'none';
                    if (errorAlert) errorAlert.style.display = 'none';

                    const action = formAction.value;
                    const emailVal = document.getElementById('email').value;
                    const passwordVal = document.getElementById('password').value;

                    if (action === 'signup') {
                        const confirmPassVal = confirmPassword.value;
                        if (passwordVal !== confirmPassVal) {
                            if (clientErrorAlert) {
                                clientErrorAlert.textContent = 'Passwords do not match.';
                                clientErrorAlert.style.display = 'block';
                            }
                            return;
                        }
                    }

                    // Show loader spinner on button
                    btnSubmit.classList.add('loading');
                    const originalBtnText = btnSubmit.textContent;
                    btnSubmit.textContent = action === 'login' ? 'Signing In...' : 'Sending Code...';

                    const formData = new FormData();
                    formData.append('email', emailVal);
                    formData.append('password', passwordVal);
                    formData.append('action', action === 'login' ? 'login' : 'signup_request');

                    fetch('<?= site_url('/') ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        btnSubmit.classList.remove('loading');
                        btnSubmit.textContent = originalBtnText;

                        if (data.status === 'success') {
                            if (action === 'login') {
                                // Redirect to dashboard
                                window.location.href = data.redirect;
                            } else {
                                // SignUp request succeeded, open verification modal
                                openModal('signupOtpModal');
                            }
                        } else {
                            if (clientErrorAlert) {
                                clientErrorAlert.textContent = data.message;
                                clientErrorAlert.style.display = 'block';
                            }
                        }
                    })
                    .catch(err => {
                        btnSubmit.classList.remove('loading');
                        btnSubmit.textContent = originalBtnText;
                        if (clientErrorAlert) {
                            clientErrorAlert.textContent = 'A connection error occurred. Please try again.';
                            clientErrorAlert.style.display = 'block';
                        }
                    });
                });
            }

            // Signup OTP inputs automatic tab progression
            const otpInputs = document.querySelectorAll('.otp-input-field');
            otpInputs.forEach((input, index) => {
                input.addEventListener('input', (e) => {
                    if (e.target.value.length === 1 && index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                });
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && e.target.value.length === 0 && index > 0) {
                        otpInputs[index - 1].focus();
                    }
                });
            });

            // Signup OTP Verification submission
            const signupOtpForm = document.getElementById('signupOtpForm');
            if (signupOtpForm) {
                signupOtpForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const otpError = document.getElementById('signupOtpError');
                    if (otpError) otpError.style.display = 'none';

                    // Compile 6 digit code
                    let code = '';
                    otpInputs.forEach(input => code += input.value);

                    const signupOtpSubmit = document.getElementById('signupOtpSubmit');
                    signupOtpSubmit.classList.add('loading');

                    const formData = new FormData();
                    formData.append('action', 'signup_verify');
                    formData.append('otp', code);

                    fetch('<?= site_url('/') ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        signupOtpSubmit.classList.remove('loading');
                        if (data.status === 'success') {
                            window.location.href = data.redirect;
                        } else {
                            if (otpError) {
                                otpError.textContent = data.message;
                                otpError.style.display = 'block';
                            }
                        }
                    })
                    .catch(err => {
                        signupOtpSubmit.classList.remove('loading');
                        if (otpError) {
                            otpError.textContent = 'Connection error. Please try again.';
                            otpError.style.display = 'block';
                        }
                    });
                });
            }

            // Forgot Password Link Click
            const forgotLink = document.querySelector('.forgot-password');
            if (forgotLink) {
                forgotLink.addEventListener('click', (e) => {
                    e.preventDefault();
                    openModal('forgotRequestModal');
                });
            }

            // Forgot Password OTP request submission
            const forgotRequestForm = document.getElementById('forgotRequestForm');
            if (forgotRequestForm) {
                forgotRequestForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const forgotError = document.getElementById('forgotRequestError');
                    if (forgotError) forgotError.style.display = 'none';

                    const forgotEmailVal = document.getElementById('forgotEmail').value;
                    const forgotRequestSubmit = document.getElementById('forgotRequestSubmit');
                    
                    forgotRequestSubmit.classList.add('loading');

                    const formData = new FormData();
                    formData.append('action', 'forgot_request');
                    formData.append('email', forgotEmailVal);

                    fetch('<?= site_url('/') ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        forgotRequestSubmit.classList.remove('loading');
                        if (data.status === 'success') {
                            closeModal('forgotRequestModal');
                            openModal('forgotVerifyModal');
                        } else {
                            if (forgotError) {
                                forgotError.textContent = data.message;
                                forgotError.style.display = 'block';
                            }
                        }
                    })
                    .catch(err => {
                        forgotRequestSubmit.classList.remove('loading');
                        if (forgotError) {
                            forgotError.textContent = 'Connection error. Please try again.';
                            forgotError.style.display = 'block';
                        }
                    });
                });
            }

            // Forgot Password reset OTP inputs automatic tab progression
            const otpResetInputs = document.querySelectorAll('.otp-reset-field');
            otpResetInputs.forEach((input, index) => {
                input.addEventListener('input', (e) => {
                    if (e.target.value.length === 1 && index < otpResetInputs.length - 1) {
                        otpResetInputs[index + 1].focus();
                    }
                });
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && e.target.value.length === 0 && index > 0) {
                        otpResetInputs[index - 1].focus();
                    }
                });
            });

            // Forgot Password verification & Password update submission
            const forgotVerifyForm = document.getElementById('forgotVerifyForm');
            if (forgotVerifyForm) {
                forgotVerifyForm.addEventListener('submit', (e) => {
                    e.preventDefault();
                    const resetError = document.getElementById('forgotVerifyError');
                    if (resetError) resetError.style.display = 'none';

                    // Compile code
                    let code = '';
                    otpResetInputs.forEach(input => code += input.value);

                    const newPass = document.getElementById('forgotNewPassword').value;
                    const confirmPass = document.getElementById('forgotConfirmPassword').value;

                    if (newPass !== confirmPass) {
                        if (resetError) {
                            resetError.textContent = 'Passwords do not match.';
                            resetError.style.display = 'block';
                        }
                        return;
                    }

                    const forgotVerifySubmit = document.getElementById('forgotVerifySubmit');
                    forgotVerifySubmit.classList.add('loading');

                    const formData = new FormData();
                    formData.append('action', 'forgot_verify');
                    formData.append('otp', code);
                    formData.append('new_password', newPass);

                    fetch('<?= site_url('/') ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        forgotVerifySubmit.classList.remove('loading');
                        if (data.status === 'success') {
                            alert(data.message);
                            closeModal('forgotVerifyModal');
                        } else {
                            if (resetError) {
                                resetError.textContent = data.message;
                                resetError.style.display = 'block';
                            }
                        }
                    })
                    .catch(err => {
                        forgotVerifySubmit.classList.remove('loading');
                        if (resetError) {
                            resetError.textContent = 'Connection error. Please try again.';
                            resetError.style.display = 'block';
                        }
                    });
                });
            }

            // Resend Signup OTP click
            const resendSignupOtpBtn = document.getElementById('resendSignupOtpBtn');
            if (resendSignupOtpBtn) {
                resendSignupOtpBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const otpError = document.getElementById('signupOtpError');
                    if (otpError) otpError.style.display = 'none';

                    const emailVal = document.getElementById('email').value;
                    const passwordVal = document.getElementById('password').value;

                    const formData = new FormData();
                    formData.append('email', emailVal);
                    formData.append('password', passwordVal);
                    formData.append('action', 'signup_request');

                    fetch('<?= site_url('/') ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message);
                    })
                    .catch(err => {
                        alert('Failed to resend verification code. Connection error.');
                    });
                });
            }

            // Resend Forgot Password OTP click
            const resendForgotOtpBtn = document.getElementById('resendForgotOtpBtn');
            if (resendForgotOtpBtn) {
                resendForgotOtpBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const resetError = document.getElementById('forgotVerifyError');
                    if (resetError) resetError.style.display = 'none';

                    const forgotEmailVal = document.getElementById('forgotEmail').value;

                    const formData = new FormData();
                    formData.append('email', forgotEmailVal);
                    formData.append('action', 'forgot_request');

                    fetch('<?= site_url('/') ?>', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message);
                    })
                    .catch(err => {
                        alert('Failed to resend reset code. Connection error.');
                    });
                });
            }

            // Modal utility open/close functions
            window.openModal = function(modalId) {
                const overlay = document.getElementById(modalId);
                if (overlay) {
                    overlay.classList.add('open');
                    const firstInput = overlay.querySelector('input');
                    if (firstInput) {
                        setTimeout(() => firstInput.focus(), 150);
                    }
                }
            }

            window.closeModal = function(modalId) {
                const overlay = document.getElementById(modalId);
                if (overlay) {
                    overlay.classList.remove('open');
                    const inputs = overlay.querySelectorAll('input');
                    inputs.forEach(input => input.value = '');
                    const errorDiv = overlay.querySelector('.auth-modal-error');
                    if (errorDiv) errorDiv.style.display = 'none';
                }
            }

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

            // System Lock widget toggle behavior
            const sysLockWidget = document.getElementById('sysLockWidget');
            const sysLockTxt = document.getElementById('sysLockTxt');
            if (sysLockWidget && sysLockTxt) {
                sysLockWidget.addEventListener('click', () => {
                    const isActive = sysLockTxt.textContent.includes('ACTIVE');
                    if (isActive) {
                        sysLockTxt.textContent = 'System Lock: SECURED';
                        sysLockWidget.style.borderColor = '#10b981';
                        const scanner = sysLockWidget.querySelector('.db-lock-fingerprint-svg');
                        if (scanner) scanner.style.stroke = '#10b981';
                    } else {
                        sysLockTxt.textContent = 'System Lock: ACTIVE';
                        sysLockWidget.style.borderColor = '';
                        const scanner = sysLockWidget.querySelector('.db-lock-fingerprint-svg');
                        if (scanner) scanner.style.stroke = '';
                    }
                });
            }
        });
    </script>
</body>
</html>
