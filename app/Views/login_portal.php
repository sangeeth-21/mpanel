<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nitec. - Premium Sound Showcase</title>
    <!-- Google Fonts: Outfit for sleek modern UI, JetBrains Mono for codes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            /* Light Theme Variables */
            --bg-primary: #e2e8f0;
            --bg-body: #eaedea;
            --bg-card: #ffffff;
            --bg-card-alt: #f8fafc;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-muted: #94a3b8;
            --border-color: #cbd5e1;
            
            --accent-green: #d9f99d; /* Lime green button */
            --accent-green-hover: #bef264;
            --accent-blue: #2563eb; /* Royal blue for headphones */
            --accent-red: #ef4444; /* Heart icon red */
            
            --shadow-sm: 0 2px 8px rgba(15, 23, 42, 0.04);
            --shadow-md: 0 10px 20px rgba(15, 23, 42, 0.05);
            --shadow-lg: 0 20px 40px rgba(15, 23, 42, 0.08);
            
            --transition-speed: 0.4s;
            --font-outfit: 'Outfit', sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
        }

        body.dark-mode {
            /* Dark Theme Variables */
            --bg-primary: #0b0f19;
            --bg-body: #111827;
            --bg-card: #1f2937;
            --bg-card-alt: #374151;
            --text-primary: #f9fafb;
            --text-secondary: #d1d5db;
            --text-muted: #6b7280;
            --border-color: #374151;
            
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.2);
            --shadow-md: 0 10px 20px rgba(0, 0, 0, 0.25);
            --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.35);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-outfit);
            background-color: var(--bg-body);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
            overflow-x: hidden;
        }

        /* Nitec Container Layout */
        .nitec-container {
            width: 100%;
            max-width: 1280px;
            background-color: var(--bg-primary);
            border-radius: 32px;
            padding: 32px;
            box-shadow: var(--shadow-lg);
            transition: background-color var(--transition-speed) ease;
        }

        /* Header Section */
        .nitec-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .nitec-logo {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 800;
            font-size: 1.6rem;
            letter-spacing: -0.5px;
            color: var(--text-primary);
        }

        .nitec-logo-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background-color: var(--text-primary);
            color: var(--bg-card);
            border-radius: 8px;
            font-weight: 900;
            font-size: 1.2rem;
            transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
        }

        /* Search Bar */
        .nitec-search-wrapper {
            display: flex;
            align-items: center;
            background-color: var(--bg-card);
            border-radius: 30px;
            padding: 4px 4px 4px 16px;
            width: 100%;
            max-width: 380px;
            box-shadow: var(--shadow-sm);
            transition: background-color var(--transition-speed) ease;
        }

        .nitec-search-input {
            flex: 1;
            border: none;
            background: transparent;
            outline: none;
            font-family: var(--font-outfit);
            font-size: 0.95rem;
            color: var(--text-primary);
            font-weight: 500;
        }

        .nitec-search-input::placeholder {
            color: var(--text-muted);
        }

        .nitec-search-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #000;
            color: #fff;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s ease;
        }

        .nitec-search-btn:hover {
            transform: scale(1.05);
        }

        /* Header Actions */
        .nitec-header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .action-circle-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: var(--bg-card);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-primary);
            box-shadow: var(--shadow-sm);
            transition: transform 0.2s ease, background-color var(--transition-speed) ease, color var(--transition-speed) ease;
        }

        .action-circle-btn:hover {
            transform: translateY(-2px);
        }

        .action-circle-btn.dark-bg {
            background-color: #0f172a;
            color: #ffffff;
        }

        body.dark-mode .action-circle-btn.dark-bg {
            background-color: #f9fafb;
            color: #0f172a;
        }

        .action-circle-btn.favorite svg {
            fill: var(--accent-red);
            stroke: var(--accent-red);
        }

        /* User Auth Pill */
        .user-auth-pill {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: var(--bg-card);
            border-radius: 30px;
            padding: 4px 6px 4px 16px;
            box-shadow: var(--shadow-sm);
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: transform 0.2s ease, background-color var(--transition-speed) ease;
        }

        .user-auth-pill:hover {
            transform: translateY(-2px);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-logout-btn {
            background: transparent;
            border: none;
            color: var(--accent-red);
            font-weight: 700;
            font-size: 0.8rem;
            margin-left: 8px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: opacity 0.2s ease;
        }

        .user-logout-btn:hover {
            opacity: 0.8;
        }

        /* Main Dashboard Grid */
        .nitec-grid {
            display: grid;
            grid-template-columns: 3.2fr 1.2fr;
            gap: 24px;
        }

        /* Left Side Columns & Cards */
        .left-column {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* Hero Card */
        .hero-card {
            background-color: var(--bg-card);
            border-radius: 28px;
            padding: 48px;
            display: flex;
            position: relative;
            min-height: 480px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: background-color var(--transition-speed) ease;
        }

        .hero-details {
            flex: 1.2;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            z-index: 2;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background-color: var(--bg-body);
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--text-secondary);
            width: fit-content;
            transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
        }

        .hero-title {
            font-size: 3.4rem;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -1.5px;
            margin: 20px 0;
            color: var(--text-primary);
        }

        /* Sound indicator guide */
        .hero-guide-row {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
        }

        .guide-num {
            font-size: 2.2rem;
            font-weight: 300;
            color: transparent;
            -webkit-text-stroke: 1px var(--text-secondary);
        }

        .guide-line {
            flex: 0.4;
            height: 1px;
            border-bottom: 1px dashed var(--text-muted);
            position: relative;
        }

        .guide-line::after {
            content: '→';
            position: absolute;
            right: -6px;
            top: -9px;
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .guide-desc {
            flex: 1.5;
            font-size: 0.85rem;
            color: var(--text-secondary);
            line-height: 1.4;
        }

        .guide-desc strong {
            display: block;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 2px;
        }

        /* Hero Button */
        .hero-cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background-color: var(--accent-green);
            color: #0f172a;
            border: none;
            padding: 10px 10px 10px 24px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            width: fit-content;
            transition: background-color 0.2s ease, transform 0.2s ease;
            box-shadow: 0 4px 12px rgba(190, 242, 100, 0.2);
        }

        .hero-cta-btn:hover {
            background-color: var(--accent-green-hover);
            transform: translateY(-2px);
        }

        .cta-arrow-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #0f172a;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        .hero-cta-btn:hover .cta-arrow-circle {
            transform: rotate(45deg);
        }

        .hero-socials {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 32px;
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 600;
        }

        .social-circle-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--bg-body);
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.2s ease, background-color var(--transition-speed) ease, color var(--transition-speed) ease;
        }

        .social-circle-icon:hover {
            transform: translateY(-2px);
            background-color: var(--text-primary);
            color: var(--bg-card);
        }

        /* Floating Headphone Showcase */
        .hero-showcase {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        @keyframes float-animation {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-16px) rotate(1.5deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        .floating-headphones {
            width: 310px;
            height: 310px;
            object-fit: contain;
            animation: float-animation 6s ease-in-out infinite;
            filter: drop-shadow(0 20px 30px rgba(37, 99, 235, 0.18));
            z-index: 2;
        }

        /* Graphic Circles / Guides surrounding Headphone */
        .hero-orbit-guide {
            position: absolute;
            width: 340px;
            height: 340px;
            border: 1px dashed var(--text-muted);
            border-radius: 50%;
            opacity: 0.25;
            pointer-events: none;
            z-index: 1;
        }

        .orbit-dot {
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: var(--text-secondary);
        }

        .orbit-dot.dot-1 { top: 15%; left: 15%; background-color: var(--accent-blue); width: 10px; height: 10px; }
        .orbit-dot.dot-2 { bottom: 20%; right: 10%; background-color: var(--text-muted); }
        .orbit-dot.dot-3 { top: 50%; right: 5%; background-color: var(--text-primary); }

        .slider-controls {
            position: absolute;
            bottom: 24px;
            right: 24px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow-sm);
            z-index: 2;
            transition: transform 0.2s ease;
        }

        .slider-controls:hover {
            transform: scale(1.08);
        }

        /* Left Column Bottom Row Cards */
        .left-bottom-row {
            display: grid;
            grid-template-columns: 1.1fr 1fr 1.3fr;
            gap: 24px;
        }

        .nitec-card {
            background-color: var(--bg-card);
            border-radius: 24px;
            padding: 24px;
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s ease, background-color var(--transition-speed) ease;
        }

        .nitec-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-md);
        }

        .card-header-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .card-title {
            font-size: 1.15rem;
            font-weight: 700;
            line-height: 1.2;
            color: var(--text-primary);
        }

        .card-subtitle {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Card 1: More Products Thumbnails */
        .more-products-thumbnails {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .product-thumbnail {
            width: 100%;
            height: 52px;
            border-radius: 12px;
            object-fit: cover;
            background-color: var(--bg-body);
            transition: transform 0.2s ease;
        }

        .product-thumbnail:hover {
            transform: scale(1.08);
        }

        /* Card 2: Downloads & Review Metrics */
        .downloads-circle-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }

        .avatar-overlap-group {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .overlap-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid var(--bg-card);
            margin-left: -8px;
            object-fit: cover;
        }

        .overlap-avatar:first-child {
            margin-left: 0;
        }

        .download-pill-metric {
            background-color: var(--accent-blue);
            color: #ffffff;
            font-weight: 800;
            font-size: 1.25rem;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            box-shadow: 0 8px 16px rgba(37, 99, 235, 0.2);
            margin-bottom: 12px;
        }

        .download-pill-metric span {
            font-size: 0.65rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            opacity: 0.9;
        }

        .rating-stars-badge {
            display: flex;
            align-items: center;
            gap: 4px;
            background-color: var(--bg-body);
            padding: 4px 10px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.8rem;
            color: var(--text-secondary);
            transition: background-color var(--transition-speed) ease;
        }

        .rating-stars-badge svg {
            fill: #f59e0b;
            stroke: #f59e0b;
        }

        /* Card 3: Listening Release card */
        .release-card-bg-wrap {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 140px;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0.85;
            transition: transform 0.3s ease;
        }

        .nitec-card:hover .release-card-bg-wrap {
            transform: scale(1.05);
        }

        .release-details {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            max-width: 130px;
        }

        .small-arrow-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--bg-card);
            color: var(--text-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-sm);
            cursor: pointer;
            border: none;
            transition: transform 0.2s ease;
        }

        .small-arrow-btn:hover {
            transform: scale(1.1);
        }

        /* Right Side Column Cards */
        .right-column {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* Popular Colors Card */
        .colors-card {
            background-color: var(--bg-card);
            border-radius: 24px;
            padding: 24px;
            box-shadow: var(--shadow-sm);
            transition: background-color var(--transition-speed) ease;
        }

        .colors-title {
            font-size: 0.95rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-muted);
            margin-bottom: 16px;
        }

        .colors-dot-row {
            display: flex;
            gap: 12px;
        }

        .color-dot-btn {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 2px solid transparent;
            cursor: pointer;
            transition: transform 0.2s ease, border-color 0.2s ease;
            position: relative;
        }

        .color-dot-btn::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            right: 2px;
            bottom: 2px;
            border-radius: 50%;
            background-color: inherit;
        }

        .color-dot-btn.active {
            border-color: var(--text-primary);
            transform: scale(1.1);
        }

        /* Vertical Product Card Showcase */
        .product-showcase-card {
            background-color: var(--bg-card);
            border-radius: 24px;
            padding: 24px;
            box-shadow: var(--shadow-sm);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s ease, background-color var(--transition-speed) ease;
        }

        .product-showcase-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-md);
        }

        .product-card-img-wrap {
            width: 100%;
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 12px 0;
        }

        .product-card-img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .product-showcase-card:hover .product-card-img {
            transform: scale(1.05);
        }

        /* Asynchronous Pop-up Authentication Modal style */
        .auth-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 9999;
        }

        .auth-modal-overlay.open {
            opacity: 1;
            pointer-events: auto;
        }

        .auth-modal-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 28px;
            padding: 36px;
            width: 100%;
            max-width: 440px;
            position: relative;
            transform: scale(0.92);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), background-color var(--transition-speed) ease;
            box-shadow: var(--shadow-lg);
        }

        .auth-modal-overlay.open .auth-modal-card {
            transform: scale(1);
        }

        .auth-modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--bg-body);
            border: none;
            color: var(--text-primary);
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s ease, background-color var(--transition-speed) ease;
        }

        .auth-modal-close:hover {
            transform: rotate(90deg);
        }

        .auth-screen {
            display: none;
        }

        .auth-screen.active {
            display: block;
            animation: modal-fade 0.3s ease;
        }

        @keyframes modal-fade {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .auth-modal-header {
            margin-bottom: 24px;
        }

        .auth-modal-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text-primary);
            letter-spacing: -0.5px;
        }

        .auth-modal-sub {
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-top: 6px;
            font-weight: 500;
        }

        .auth-form-group {
            margin-bottom: 16px;
        }

        .auth-form-input {
            width: 100%;
            padding: 14px 18px;
            border-radius: 14px;
            border: 1px solid var(--border-color);
            background-color: var(--bg-card-alt);
            color: var(--text-primary);
            font-family: var(--font-outfit);
            font-weight: 500;
            outline: none;
            font-size: 0.95rem;
            transition: border-color 0.2s ease, background-color var(--transition-speed) ease;
        }

        .auth-form-input:focus {
            border-color: var(--text-primary);
        }

        .auth-modal-footer {
            margin-top: 24px;
            font-size: 0.85rem;
            color: var(--text-secondary);
            text-align: center;
            font-weight: 500;
        }

        .auth-link {
            color: var(--accent-blue);
            text-decoration: none;
            font-weight: 700;
            cursor: pointer;
        }

        .auth-link:hover {
            text-decoration: underline;
        }

        .auth-submit-btn {
            width: 100%;
            padding: 14px;
            border-radius: 14px;
            background-color: var(--text-primary);
            color: var(--bg-card);
            border: none;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: opacity 0.2s ease, background-color var(--transition-speed) ease, color var(--transition-speed) ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .auth-submit-btn:hover {
            opacity: 0.9;
        }

        .auth-submit-btn.loading {
            pointer-events: none;
            opacity: 0.8;
        }

        .auth-submit-btn.loading::after {
            content: "";
            width: 16px;
            height: 16px;
            border: 2px solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            animation: spin 0.75s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* OTP Input Verification Grid */
        .otp-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 8px;
            margin: 20px 0;
        }

        .otp-box {
            width: 100%;
            height: 52px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            background-color: var(--bg-card-alt);
            color: var(--text-primary);
            font-family: var(--font-mono);
            font-size: 1.4rem;
            font-weight: 700;
            text-align: center;
            outline: none;
            transition: border-color 0.2s ease;
        }

        .otp-box:focus {
            border-color: var(--text-primary);
        }

        /* Error/Success Alert Boxes */
        .auth-alert {
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 16px;
            display: none;
        }

        .auth-alert.error {
            background-color: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .auth-alert.success {
            background-color: rgba(16, 185, 129, 0.1);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .nitec-grid {
                grid-template-columns: 1fr;
            }
            .right-column {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 24px;
            }
            .colors-card {
                grid-column: span 2;
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 12px;
            }
            .nitec-container {
                padding: 20px;
                border-radius: 24px;
            }
            .hero-card {
                flex-direction: column;
                padding: 32px;
                min-height: auto;
                gap: 32px;
            }
            .hero-title {
                font-size: 2.5rem;
            }
            .left-bottom-row {
                grid-template-columns: 1fr;
            }
            .right-column {
                grid-template-columns: 1fr;
            }
            .colors-card {
                grid-column: span 1;
            }
            .floating-headphones {
                width: 240px;
                height: 240px;
            }
            .hero-orbit-guide {
                width: 260px;
                height: 260px;
            }
        }
    </style>
</head>
<body class="<?= $is_logged_in ? 'authenticated' : '' ?>">

    <div class="nitec-container">
        <!-- Header -->
        <header class="nitec-header">
            <div class="nitec-logo">
                <span class="nitec-logo-icon">n</span>
                nitec.
            </div>

            <!-- Search wrapper -->
            <div class="nitec-search-wrapper" onclick="handleRestrictedAction(event)">
                <input type="text" class="nitec-search-input" placeholder="Search products..." disabled>
                <button class="nitec-search-btn">
                    <svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </div>

            <!-- Action controls -->
            <div class="nitec-header-actions">
                <!-- Theme Toggle Button -->
                <button class="action-circle-btn" id="themeToggleBtn" title="Toggle Dark/Light Mode">
                    <svg class="sun-icon" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                    <svg class="moon-icon" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </button>

                <!-- Shopping Bag -->
                <button class="action-circle-btn dark-bg" onclick="handleRestrictedAction(event)" title="Shopping Bag">
                    <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                </button>

                <!-- Favorite Heart -->
                <button class="action-circle-btn favorite" onclick="handleRestrictedAction(event)" title="Favorites">
                    <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </button>

                <!-- Profile Badge / Auth State -->
                <?php if ($is_logged_in): ?>
                    <div class="user-auth-pill" title="Active Session: <?= htmlspecialchars($user) ?>">
                        <img class="user-avatar" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=100" alt="Avatar">
                        <span>Ryman Alex</span>
                        <button class="user-logout-btn" onclick="window.location.href='<?= site_url('/?action=logout') ?>'">Logout</button>
                    </div>
                <?php else: ?>
                    <div class="user-auth-pill" onclick="openAuthModal('login')">
                        <img class="user-avatar" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&q=80&w=100" alt="Avatar">
                        <span>Sign In</span>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <!-- Grid Dashboard -->
        <main class="nitec-grid">
            
            <!-- Left Side Area -->
            <div class="left-column">
                
                <!-- Hero card showcase -->
                <section class="hero-card">
                    <div class="hero-details">
                        <span class="hero-tag">
                            <!-- Small custom keyboard grid icon -->
                            <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" style="opacity: 0.7;">
                                <circle cx="4" cy="4" r="2"></circle><circle cx="12" cy="4" r="2"></circle><circle cx="20" cy="4" r="2"></circle>
                                <circle cx="4" cy="12" r="2"></circle><circle cx="12" cy="12" r="2"></circle><circle cx="20" cy="12" r="2"></circle>
                                <circle cx="4" cy="20" r="2"></circle><circle cx="12" cy="20" r="2"></circle><circle cx="20" cy="20" r="2"></circle>
                            </svg>
                            Music is Classic
                        </span>

                        <h1 class="hero-title">
                            Sequoia Inspiring<br>Musico.
                        </h1>

                        <div class="hero-guide-row">
                            <span class="guide-num">01</span>
                            <span class="guide-line"></span>
                            <div class="guide-desc">
                                <strong>Clear Sounds</strong>
                                Making your dream music come true stay with Sequoios Sounds!
                            </div>
                        </div>

                        <button class="hero-cta-btn" onclick="handleRestrictedAction(event)">
                            View All Products
                            <span class="cta-arrow-circle">
                                <svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="7" y1="17" x2="17" y2="7"></line>
                                    <polyline points="7 7 17 7 17 17"></polyline>
                                </svg>
                            </span>
                        </button>

                        <div class="hero-socials">
                            Follow us on:
                            <span class="social-circle-icon">𝕏</span>
                            <span class="social-circle-icon">🎵</span>
                            <span class="social-circle-icon">📸</span>
                            <span class="social-circle-icon">in</span>
                        </div>
                    </div>

                    <!-- Floating Royal Blue Headphone image -->
                    <div class="hero-showcase">
                        <div class="hero-orbit-guide"></div>
                        <div class="orbit-dot dot-1"></div>
                        <div class="orbit-dot dot-2"></div>
                        <div class="orbit-dot dot-3"></div>
                        <img class="floating-headphones" src="assets/blue_headphones.png" alt="Royal Blue Headphones">
                        
                        <!-- Mini slider navigation badge -->
                        <div class="slider-controls" onclick="alert('Cycling products catalog...')">
                            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="16 18 22 12 16 6"></polyline>
                                <polyline points="8 18 2 12 8 6"></polyline>
                            </svg>
                        </div>
                    </div>
                </section>

                <!-- Left Bottom Cards Row -->
                <div class="left-bottom-row">
                    <!-- Card 1: More Products -->
                    <div class="nitec-card" onclick="handleRestrictedAction(event)">
                        <div class="card-header-row">
                            <div>
                                <h3 class="card-title">More Products</h3>
                                <span class="card-subtitle">460 plus items.</span>
                            </div>
                            <span style="color: var(--accent-red); font-size: 1.1rem;">❤️</span>
                        </div>
                        <div class="more-products-thumbnails">
                            <img class="product-thumbnail" src="assets/black_neon_cube.png" alt="Cube">
                            <img class="product-thumbnail" src="assets/new_gen_xbud.png" alt="Buds">
                            <img class="product-thumbnail" src="assets/vr_headset.png" alt="Visor">
                        </div>
                    </div>

                    <!-- Card 2: Downloads metric -->
                    <div class="nitec-card" onclick="handleRestrictedAction(event)">
                        <div class="downloads-circle-container">
                            <div class="avatar-overlap-group">
                                <img class="overlap-avatar" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&q=80&w=60" alt="Reviewer">
                                <img class="overlap-avatar" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&q=80&w=60" alt="Reviewer">
                                <img class="overlap-avatar" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=60" alt="Reviewer">
                            </div>
                            <div class="download-pill-metric">
                                5m+
                                <span>Downloads</span>
                            </div>
                            <div class="rating-stars-badge">
                                <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                                4.6 reviews
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Release announcement banner -->
                    <div class="nitec-card" onclick="handleRestrictedAction(event)">
                        <div class="release-card-bg-wrap" style="background-image: url('assets/vr_headset.png');"></div>
                        <div class="release-details">
                            <span class="hero-tag" style="padding: 4px 10px; font-size: 0.75rem; background-color: rgba(239, 68, 68, 0.1); color: var(--accent-red); border: 1px solid rgba(239, 68, 68, 0.15);">❤️ Popular</span>
                            <div>
                                <h3 class="card-title" style="font-size: 1.05rem;">Listening Has Been Released</h3>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 8px;">
                                <div class="rating-stars-badge">
                                    <svg viewBox="0 0 24 24" width="11" height="11" stroke="currentColor" stroke-width="2" fill="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    4.7
                                </div>
                                <button class="small-arrow-btn">
                                    <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="7" y1="17" x2="17" y2="7"></line>
                                        <polyline points="7 7 17 7 17 17"></polyline>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Side Area -->
            <div class="right-column">
                
                <!-- Popular Colors -->
                <div class="colors-card">
                    <h3 class="colors-title">Popular Colors</h3>
                    <div class="colors-dot-row">
                        <button class="color-dot-btn active" style="background-color: #3b82f6;" onclick="selectColor(this)"></button>
                        <button class="color-dot-btn" style="background-color: #f97316;" onclick="selectColor(this)"></button>
                        <button class="color-dot-btn" style="background-color: #10b981;" onclick="selectColor(this)"></button>
                        <button class="color-dot-btn" style="background-color: #ef4444;" onclick="selectColor(this)"></button>
                        <button class="color-dot-btn" style="background-color: #06b6d4;" onclick="selectColor(this)"></button>
                    </div>
                </div>

                <!-- Product Card 1: Buds -->
                <div class="product-showcase-card" onclick="handleRestrictedAction(event)">
                    <div class="card-header-row" style="margin-bottom: 0;">
                        <h3 class="card-title">New Gen<br>X-Bud</h3>
                        <button class="small-arrow-btn">
                            <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </button>
                    </div>
                    <div class="product-card-img-wrap">
                        <img class="product-card-img" src="assets/new_gen_xbud.png" alt="X-Bud">
                    </div>
                </div>

                <!-- Product Card 2: VR headset -->
                <div class="product-showcase-card" onclick="handleRestrictedAction(event)">
                    <div class="product-card-img-wrap" style="order: 2;">
                        <img class="product-card-img" src="assets/vr_headset.png" alt="VR Headset">
                    </div>
                    <div class="card-header-row" style="margin-bottom: 0; order: 1; justify-content: space-between;">
                        <h3 class="card-title" style="font-size: 1.05rem;">Light Grey Surface<br>Headphone<br><span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 500;">Boosted with bass</span></h3>
                        <button class="small-arrow-btn" style="align-self: flex-start;">
                            <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>

        </main>
    </div>

    <!-- Asynchronous Popup Authentication Modal overlay -->
    <div class="auth-modal-overlay" id="authModal">
        <div class="auth-modal-card">
            <!-- Close Modal -->
            <button class="auth-modal-close" onclick="closeAuthModal()">&times;</button>
            
            <!-- Alert message block -->
            <div class="auth-alert error" id="authErrorAlert"></div>
            <div class="auth-alert success" id="authSuccessAlert"></div>

            <!-- Screen 1: Login Form -->
            <div class="auth-screen" id="screenLogin">
                <div class="auth-modal-header">
                    <h2 class="auth-modal-title">Sign In</h2>
                    <p class="auth-modal-sub">Welcome back! Please enter your credentials.</p>
                </div>
                <form id="loginForm" method="POST" onsubmit="submitAuthForm(event, 'login')">
                    <div class="auth-form-group">
                        <input type="email" id="loginEmail" class="auth-form-input" placeholder="Email Address" required>
                    </div>
                    <div class="auth-form-group">
                        <input type="password" id="loginPassword" class="auth-form-input" placeholder="Password" required>
                    </div>
                    <button type="submit" class="auth-submit-btn" id="loginSubmitBtn">Sign In</button>
                </form>
                <div class="auth-modal-footer">
                    <a class="auth-link" onclick="switchAuthScreen('forgot')">Forgot password?</a>
                    <br><br>
                    Don't have an account? <a class="auth-link" onclick="switchAuthScreen('signup')">Create one</a>
                </div>
            </div>

            <!-- Screen 2: Sign Up Form -->
            <div class="auth-screen" id="screenSignup">
                <div class="auth-modal-header">
                    <h2 class="auth-modal-title">Create Account</h2>
                    <p class="auth-modal-sub">Sign up for exclusive access to premium sounds.</p>
                </div>
                <form id="signupForm" method="POST" onsubmit="submitAuthForm(event, 'signup_request')">
                    <div class="auth-form-group">
                        <input type="email" id="signupEmail" class="auth-form-input" placeholder="Email Address" required>
                    </div>
                    <div class="auth-form-group">
                        <input type="password" id="signupPassword" class="auth-form-input" placeholder="Create Password (min 6 chars)" required>
                    </div>
                    <div class="auth-form-group">
                        <input type="password" id="signupConfirmPassword" class="auth-form-input" placeholder="Confirm Password" required>
                    </div>
                    <button type="submit" class="auth-submit-btn" id="signupSubmitBtn">Send Verification Code</button>
                </form>
                <div class="auth-modal-footer">
                    Already have an account? <a class="auth-link" onclick="switchAuthScreen('login')">Sign In</a>
                </div>
            </div>

            <!-- Screen 3: SignUp OTP Verification Form -->
            <div class="auth-screen" id="screenSignupVerify">
                <div class="auth-modal-header">
                    <h2 class="auth-modal-title">Verify Email</h2>
                    <p class="auth-modal-sub">We've sent a 6-digit verification code to your email.</p>
                </div>
                <form id="signupVerifyForm" method="POST" onsubmit="submitAuthForm(event, 'signup_verify')">
                    <div class="otp-grid">
                        <input type="text" maxlength="1" class="otp-box signup-otp-input" required>
                        <input type="text" maxlength="1" class="otp-box signup-otp-input" required>
                        <input type="text" maxlength="1" class="otp-box signup-otp-input" required>
                        <input type="text" maxlength="1" class="otp-box signup-otp-input" required>
                        <input type="text" maxlength="1" class="otp-box signup-otp-input" required>
                        <input type="text" maxlength="1" class="otp-box signup-otp-input" required>
                    </div>
                    <button type="submit" class="auth-submit-btn" id="signupVerifySubmitBtn">Verify Code & Log In</button>
                </form>
                <div class="auth-modal-footer">
                    Didn't receive code? <a class="auth-link" id="resendSignupOtpLink">Resend Code</a>
                </div>
            </div>

            <!-- Screen 4: Forgot Password Request Form -->
            <div class="auth-screen" id="screenForgot">
                <div class="auth-modal-header">
                    <h2 class="auth-modal-title">Forgot Password</h2>
                    <p class="auth-modal-sub">Enter your email and we'll send you a password reset code.</p>
                </div>
                <form id="forgotForm" method="POST" onsubmit="submitAuthForm(event, 'forgot_request')">
                    <div class="auth-form-group">
                        <input type="email" id="forgotEmail" class="auth-form-input" placeholder="Email Address" required>
                    </div>
                    <button type="submit" class="auth-submit-btn" id="forgotSubmitBtn">Send Reset Code</button>
                </form>
                <div class="auth-modal-footer">
                    <a class="auth-link" onclick="switchAuthScreen('login')">Back to Sign In</a>
                </div>
            </div>

            <!-- Screen 5: Forgot Password OTP Verify & Reset Form -->
            <div class="auth-screen" id="screenForgotVerify">
                <div class="auth-modal-header">
                    <h2 class="auth-modal-title">Reset Password</h2>
                    <p class="auth-modal-sub">Enter the code sent to your email and your new password.</p>
                </div>
                <form id="forgotVerifyForm" method="POST" onsubmit="submitAuthForm(event, 'forgot_verify')">
                    <div class="otp-grid">
                        <input type="text" maxlength="1" class="otp-box forgot-otp-input" required>
                        <input type="text" maxlength="1" class="otp-box forgot-otp-input" required>
                        <input type="text" maxlength="1" class="otp-box forgot-otp-input" required>
                        <input type="text" maxlength="1" class="otp-box forgot-otp-input" required>
                        <input type="text" maxlength="1" class="otp-box forgot-otp-input" required>
                        <input type="text" maxlength="1" class="otp-box forgot-otp-input" required>
                    </div>
                    <div class="auth-form-group">
                        <input type="password" id="forgotNewPassword" class="auth-form-input" placeholder="Enter New Password (min 6 chars)" required>
                    </div>
                    <button type="submit" class="auth-submit-btn" id="forgotVerifySubmitBtn">Update Password</button>
                </form>
                <div class="auth-modal-footer">
                    Didn't receive code? <a class="auth-link" id="resendForgotOtpLink">Resend Code</a>
                </div>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const isUserLoggedIn = <?= $is_logged_in ? 'true' : 'false' ?>;
            
            // 1. Dark/Light Theme Switching with retention
            const themeToggleBtn = document.getElementById('themeToggleBtn');
            const sunIcon = themeToggleBtn.querySelector('.sun-icon');
            const moonIcon = themeToggleBtn.querySelector('.moon-icon');

            // Apply saved theme or default to light
            const savedTheme = localStorage.getItem('nitec-theme') || 'light';
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
                sunIcon.style.display = 'block';
                moonIcon.style.display = 'none';
            }

            themeToggleBtn.addEventListener('click', () => {
                const isDarkMode = document.body.classList.toggle('dark-mode');
                if (isDarkMode) {
                    localStorage.setItem('nitec-theme', 'dark');
                    sunIcon.style.display = 'block';
                    moonIcon.style.display = 'none';
                } else {
                    localStorage.setItem('nitec-theme', 'light');
                    sunIcon.style.display = 'none';
                    moonIcon.style.display = 'block';
                }
            });

            // 2. Color dots selection visual
            window.selectColor = function(btn) {
                const dots = document.querySelectorAll('.color-dot-btn');
                dots.forEach(dot => dot.classList.remove('active'));
                btn.classList.add('active');
            }

            // 3. Popup Authentication Modals Triggering
            const authModal = document.getElementById('authModal');
            
            window.openAuthModal = function(screenName = 'login') {
                clearAlerts();
                authModal.classList.add('open');
                switchAuthScreen(screenName);
            }

            window.closeAuthModal = function() {
                authModal.classList.remove('open');
            }

            window.switchAuthScreen = function(screenName) {
                clearAlerts();
                const screens = document.querySelectorAll('.auth-screen');
                screens.forEach(screen => screen.classList.remove('active'));
                
                const targetScreen = document.getElementById('screen' + screenName.charAt(0).toUpperCase() + screenName.slice(1));
                if (targetScreen) {
                    targetScreen.classList.add('active');
                    const firstInput = targetScreen.querySelector('input');
                    if (firstInput) {
                        setTimeout(() => firstInput.focus(), 150);
                    }
                }
            }

            // Restrict access & trigger login popup if user is logged out
            window.handleRestrictedAction = function(e) {
                if (!isUserLoggedIn) {
                    e.preventDefault();
                    e.stopPropagation();
                    openAuthModal('login');
                }
            }

            function clearAlerts() {
                const errAlert = document.getElementById('authErrorAlert');
                const successAlert = document.getElementById('authSuccessAlert');
                errAlert.style.display = 'none';
                errAlert.innerHTML = '';
                successAlert.style.display = 'none';
                successAlert.innerHTML = '';
            }

            function showAlert(type, message, debugLog = '') {
                const alertEl = document.getElementById(type === 'error' ? 'authErrorAlert' : 'authSuccessAlert');
                if (alertEl) {
                    let textContent = message;
                    if (debugLog) {
                        textContent += `<br><small style="font-family: monospace; font-size: 11px; display: block; margin-top: 6px; max-height: 120px; overflow-y: auto; text-align: left; background: rgba(0,0,0,0.06); padding: 6px; border-radius: 4px;">${escapeHTML(debugLog)}</small>`;
                    }
                    alertEl.innerHTML = textContent;
                    alertEl.style.display = 'block';
                }
            }

            function escapeHTML(str) {
                return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;");
            }

            // 4. Auto-tabbing progression for OTP inputs
            function setupOtpTabbing(inputClassName) {
                const otpInputs = document.querySelectorAll('.' + inputClassName);
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
            }
            setupOtpTabbing('signup-otp-input');
            setupOtpTabbing('forgot-otp-input');

            // 5. Asynchronous authentication request handlers
            window.submitAuthForm = function(e, actionType) {
                e.preventDefault();
                clearAlerts();

                const formData = new FormData();
                let submitBtn = null;

                if (actionType === 'login') {
                    submitBtn = document.getElementById('loginSubmitBtn');
                    formData.append('action', 'login');
                    formData.append('email', document.getElementById('loginEmail').value);
                    formData.append('password', document.getElementById('loginPassword').value);
                } 
                else if (actionType === 'signup_request') {
                    submitBtn = document.getElementById('signupSubmitBtn');
                    const email = document.getElementById('signupEmail').value;
                    const pass = document.getElementById('signupPassword').value;
                    const confirmPass = document.getElementById('signupConfirmPassword').value;

                    if (pass !== confirmPass) {
                        showAlert('error', 'Passwords do not match.');
                        return;
                    }
                    if (pass.length < 6) {
                        showAlert('error', 'Password must be at least 6 characters long.');
                        return;
                    }

                    formData.append('action', 'signup_request');
                    formData.append('email', email);
                    formData.append('password', pass);
                } 
                else if (actionType === 'signup_verify') {
                    submitBtn = document.getElementById('signupVerifySubmitBtn');
                    let otpCode = "";
                    document.querySelectorAll('.signup-otp-input').forEach(box => otpCode += box.value);
                    
                    if (otpCode.length < 6) {
                        showAlert('error', 'Please enter the complete 6-digit code.');
                        return;
                    }

                    formData.append('action', 'signup_verify');
                    formData.append('otp', otpCode);
                } 
                else if (actionType === 'forgot_request') {
                    submitBtn = document.getElementById('forgotSubmitBtn');
                    formData.append('action', 'forgot_request');
                    formData.append('email', document.getElementById('forgotEmail').value);
                } 
                else if (actionType === 'forgot_verify') {
                    submitBtn = document.getElementById('forgotVerifySubmitBtn');
                    let otpCode = "";
                    document.querySelectorAll('.forgot-otp-input').forEach(box => otpCode += box.value);
                    const newPassword = document.getElementById('forgotNewPassword').value;

                    if (otpCode.length < 6) {
                        showAlert('error', 'Please enter the complete 6-digit code.');
                        return;
                    }
                    if (newPassword.length < 6) {
                        showAlert('error', 'New password must be at least 6 characters.');
                        return;
                    }

                    formData.append('action', 'forgot_verify');
                    formData.append('otp', otpCode);
                    formData.append('new_password', newPassword);
                }

                if (submitBtn) {
                    submitBtn.classList.add('loading');
                }

                fetch('<?= site_url('/') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (submitBtn) submitBtn.classList.remove('loading');
                    
                    if (data.status === 'success') {
                        if (actionType === 'login' || actionType === 'signup_verify') {
                            showAlert('success', data.message);
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        } 
                        else if (actionType === 'signup_request') {
                            switchAuthScreen('signupVerify');
                            showAlert('success', data.message);
                        } 
                        else if (actionType === 'forgot_request') {
                            switchAuthScreen('forgotVerify');
                            showAlert('success', data.message);
                        } 
                        else if (actionType === 'forgot_verify') {
                            showAlert('success', data.message);
                            setTimeout(() => {
                                switchAuthScreen('login');
                            }, 1500);
                        }
                    } else {
                        showAlert('error', data.message, data.debug || '');
                    }
                })
                .catch(err => {
                    if (submitBtn) submitBtn.classList.remove('loading');
                    showAlert('error', 'Connection error. Please try again.');
                });
            }

            // Resend Signup OTP
            document.getElementById('resendSignupOtpLink').addEventListener('click', (e) => {
                e.preventDefault();
                clearAlerts();
                const email = document.getElementById('signupEmail').value;
                const pass = document.getElementById('signupPassword').value;

                const formData = new FormData();
                formData.append('action', 'signup_request');
                formData.append('email', email);
                formData.append('password', pass);

                fetch('<?= site_url('/') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        showAlert('success', 'Verification code resent to your email.');
                    } else {
                        showAlert('error', data.message, data.debug || '');
                    }
                })
                .catch(() => showAlert('error', 'Failed to resend code. Connection error.'));
            });

            // Resend Forgot Password OTP
            document.getElementById('resendForgotOtpLink').addEventListener('click', (e) => {
                e.preventDefault();
                clearAlerts();
                const email = document.getElementById('forgotEmail').value;

                const formData = new FormData();
                formData.append('action', 'forgot_request');
                formData.append('email', email);

                fetch('<?= site_url('/') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        showAlert('success', 'Reset code resent to your email.');
                    } else {
                        showAlert('error', data.message, data.debug || '');
                    }
                })
                .catch(() => showAlert('error', 'Failed to resend code. Connection error.'));
            });
        });
    </script>
</body>
</html>
