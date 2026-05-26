<?php helper('url'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'stiqr. - Premium Framed Art & Wall Posters') ?></title>
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
            --accent-blue: #2563eb; /* Royal blue for highlighted actions */
            --accent-red: #ef4444; /* Heart icon red */
            
            --shadow-sm: 0 2px 8px rgba(15, 23, 42, 0.04);
            --shadow-md: 0 10px 20px rgba(15, 23, 42, 0.05);
            --shadow-lg: 0 20px 40px rgba(15, 23, 42, 0.08);
            
            --transition-speed: 0.4s;
            --font-outfit: 'Outfit', sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
        }

        body.dark-mode {
            /* Dark Theme Variables - Deep Pitch Black */
            --bg-primary: #000000;
            --bg-body: #09090b;
            --bg-card: #18181b;
            --bg-card-alt: #27272a;
            --text-primary: #f4f4f5;
            --text-secondary: #d4d4d8;
            --text-muted: #71717a;
            --border-color: #27272a;
            
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.5);
            --shadow-md: 0 10px 20px rgba(0, 0, 0, 0.6);
            --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.8);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-outfit);
            background-color: var(--bg-primary); /* Use primary color directly on body */
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
            overflow-x: hidden;
        }

        /* stiqr Container Layout - Fully Fills Page */
        .stiqr-container {
            width: 100%;
            min-height: 100vh;
            background-color: var(--bg-primary);
            padding: 32px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: background-color var(--transition-speed) ease;
        }

        /* Header Section */
        .stiqr-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .stiqr-logo {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 800;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
            color: var(--text-primary);
            text-decoration: none;
        }

        .stiqr-logo-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: var(--text-primary);
            color: var(--bg-card);
            border-radius: 10px;
            font-weight: 900;
            font-size: 1.3rem;
            transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
        }

        /* Search Trigger button in Header */
        .stiqr-search-wrapper {
            display: flex;
            align-items: center;
            background-color: var(--bg-card);
            border-radius: 30px;
            padding: 8px 8px 8px 18px;
            width: 100%;
            max-width: 440px;
            box-shadow: var(--shadow-sm);
            cursor: pointer;
            border: 1px solid transparent;
            transition: background-color var(--transition-speed) ease, border-color 0.2s ease;
        }

        .stiqr-search-wrapper:hover {
            border-color: var(--text-muted);
        }

        .stiqr-search-placeholder-text {
            flex: 1;
            font-size: 0.95rem;
            color: var(--text-muted);
            font-weight: 500;
            user-select: none;
        }

        .stiqr-search-btn {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #000;
            color: #fff;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s ease;
        }

        body.dark-mode .stiqr-search-btn {
            background-color: #fff;
            color: #000;
        }

        /* Header Actions */
        .stiqr-header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .action-circle-btn {
            width: 46px;
            height: 46px;
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

        /* User Auth Pill and Dropdown Container */
        .profile-dropdown-wrapper {
            position: relative;
            z-index: 100;
        }

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
            user-select: none;
            transition: transform 0.2s ease, background-color var(--transition-speed) ease;
        }

        .user-auth-pill:hover {
            transform: translateY(-2px);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Profile Dropdown Menu Styling */
        .profile-dropdown-menu {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 12px 8px;
            width: 200px;
            box-shadow: var(--shadow-lg);
            display: none;
            opacity: 0;
            transform: translateY(8px);
            transition: opacity 0.3s ease, transform 0.3s ease;
            z-index: 999;
        }

        .profile-dropdown-menu.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .profile-dropdown-menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 12px;
            color: var(--text-primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .profile-dropdown-menu a:hover {
            background-color: var(--bg-body);
        }

        .profile-dropdown-menu .dropdown-divider {
            height: 1px;
            background-color: var(--border-color);
            margin: 8px 0;
        }

        .profile-dropdown-menu a.logout-link {
            color: var(--accent-red);
        }

        /* Content Pages Styling */
        .stiqr-content-card {
            background-color: var(--bg-card);
            border-radius: 32px;
            padding: 48px;
            box-shadow: var(--shadow-md);
            flex: 1;
            transition: background-color var(--transition-speed) ease;
        }

        .content-title {
            font-size: 2.8rem;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 24px;
            color: var(--text-primary);
        }

        .content-body {
            font-size: 1.05rem;
            line-height: 1.7;
            color: var(--text-secondary);
        }

        .content-body h2 {
            font-size: 1.6rem;
            font-weight: 700;
            margin: 32px 0 12px 0;
            color: var(--text-primary);
        }

        .content-body p {
            margin-bottom: 16px;
        }

        /* Form Controls for pages like support */
        .content-form-group {
            margin-bottom: 20px;
            max-width: 500px;
        }

        .content-form-label {
            display: block;
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .content-form-input {
            width: 100%;
            padding: 14px 18px;
            border-radius: 14px;
            border: 1.5px solid var(--border-color);
            background-color: var(--bg-card-alt);
            color: var(--text-primary);
            font-family: var(--font-outfit);
            outline: none;
            font-size: 0.95rem;
            transition: border-color 0.2s ease;
        }

        .content-form-input:focus {
            border-color: var(--text-primary);
        }

        /* Careers styles */
        .job-listing-card {
            border: 1.5px solid var(--border-color);
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            transition: transform 0.2s ease;
        }

        .job-listing-card:hover {
            transform: translateY(-2px);
            border-color: var(--text-primary);
        }

        /* Footer Styling */
        .stiqr-footer {
            margin-top: 48px;
            padding: 32px 0 0 0;
            border-top: 1px solid var(--border-color);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 24px;
            font-size: 0.9rem;
            color: var(--text-secondary);
            transition: border-color var(--transition-speed) ease;
        }

        .stiqr-footer-col {
            flex: 1;
            min-width: 200px;
        }

        .stiqr-footer-title {
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 16px;
            font-size: 1.05rem;
        }

        .stiqr-footer-links {
            list-style: none;
        }

        .stiqr-footer-links li {
            margin-bottom: 8px;
        }

        .stiqr-footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .stiqr-footer-links a:hover {
            color: var(--text-primary);
        }

        .newsletter-form {
            display: flex;
            gap: 8px;
            margin-top: 12px;
        }

        .newsletter-input {
            padding: 8px 12px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background-color: var(--bg-card);
            color: var(--text-primary);
            font-family: var(--font-outfit);
            outline: none;
            flex: 1;
        }

        .newsletter-btn {
            background-color: var(--text-primary);
            color: var(--bg-card);
            border: none;
            padding: 8px 16px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s ease;
        }

        .newsletter-btn:hover {
            opacity: 0.9;
        }

        .footer-bottom {
            width: 100%;
            text-align: center;
            padding-top: 24px;
            margin-top: 24px;
            border-top: 1px dashed var(--border-color);
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        /* Sticky bottom nav bar for mobile view */
        .mobile-bottom-nav {
            position: fixed;
            bottom: 16px;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 32px);
            max-width: 480px;
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(226, 232, 240, 0.8);
            border-radius: 26px;
            padding: 8px 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            display: none;
            justify-content: space-between;
            align-items: center;
            z-index: 999;
            transition: background-color var(--transition-speed) ease, border-color var(--transition-speed) ease;
        }

        body.dark-mode .mobile-bottom-nav {
            background-color: rgba(24, 24, 27, 0.85);
            border-color: rgba(39, 39, 42, 0.8);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .mobile-nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 0.75rem;
            font-weight: 700;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 16px;
            transition: color 0.2s ease, background-color 0.2s ease;
        }

        .mobile-nav-item:hover {
            color: var(--text-primary);
            background-color: var(--bg-primary);
        }

        .mobile-nav-icon {
            margin-bottom: 3px;
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
            padding: 40px;
            width: 100%;
            max-width: 440px;
            position: relative;
            transform: scale(0.92);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), background-color var(--transition-speed) ease;
            box-shadow: var(--shadow-lg);
            z-index: 10001;
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

        .auth-form-group {
            margin-bottom: 20px;
        }

        .auth-form-input {
            width: 100%;
            padding: 14px 18px;
            border-radius: 14px;
            border: 1.5px solid var(--border-color);
            background-color: var(--bg-card-alt);
            color: var(--text-primary);
            font-family: var(--font-outfit);
            font-weight: 500;
            outline: none;
            font-size: 0.95rem;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.02);
            transition: border-color 0.2s ease, background-color var(--transition-speed) ease, box-shadow 0.2s ease;
        }

        .auth-form-input:focus {
            border-color: var(--text-primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
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

        .generic-info-modal-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 28px;
            padding: 36px;
            width: 100%;
            max-width: 500px;
            position: relative;
            transform: scale(0.92);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            box-shadow: var(--shadow-lg);
        }

        /* Search Popup Overlay */
        .search-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.4);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
            z-index: 10000;
        }

        .search-overlay.open {
            opacity: 1;
            pointer-events: auto;
        }

        .search-overlay-card {
            width: 90%;
            max-width: 600px;
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 36px;
            box-shadow: var(--shadow-lg);
            text-align: center;
            transform: scale(0.95);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .search-overlay.open .search-overlay-card {
            transform: scale(1);
        }

        .search-overlay-input-wrapper {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        .search-overlay-input {
            flex: 1;
            padding: 14px 20px;
            border-radius: 14px;
            border: 1px solid var(--border-color);
            background-color: var(--bg-card-alt);
            color: var(--text-primary);
            font-family: var(--font-outfit);
            font-size: 1rem;
            outline: none;
        }

        .search-overlay-input:focus {
            border-color: var(--text-primary);
        }

        /* Interactive Product Details Popup Modal */
        .product-modal-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 28px;
            padding: 40px;
            width: 90%;
            max-width: 800px;
            position: relative;
            transform: scale(0.92);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1), background-color var(--transition-speed) ease;
            box-shadow: var(--shadow-lg);
            z-index: 10001;
        }

        .auth-modal-overlay.open .product-modal-card {
            transform: scale(1);
        }

        .product-modal-content {
            display: flex;
            gap: 36px;
            align-items: center;
        }

        .product-modal-left {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--bg-card-alt);
            border-radius: 20px;
            padding: 24px;
            border: 1px solid var(--border-color);
        }

        .product-modal-left img {
            max-width: 100%;
            max-height: 380px;
            object-fit: contain;
            border-radius: 12px;
            filter: drop-shadow(0 12px 24px rgba(0,0,0,0.15));
        }

        .product-modal-right {
            flex: 1.2;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 380px;
        }

        .size-btn {
            padding: 10px 16px;
            border-radius: 12px;
            border: 1.5px solid var(--border-color);
            background-color: var(--bg-card-alt);
            color: var(--text-primary);
            font-family: var(--font-outfit);
            font-weight: 600;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.2s ease;
        }

        .size-btn.active, .size-btn:hover {
            border-color: var(--text-primary);
            background-color: var(--text-primary);
            color: var(--bg-card);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 0;
            }
            .stiqr-container {
                padding: 20px 20px 80px 20px;
            }
            .stiqr-header {
                margin-bottom: 24px;
                padding-bottom: 12px;
                border-bottom: 1px solid var(--border-color);
            }
            .stiqr-search-wrapper, .stiqr-header-actions .action-circle-btn, .stiqr-header-actions .favorite {
                display: none;
            }
            .mobile-bottom-nav {
                display: flex;
            }
            .stiqr-content-card {
                padding: 32px 20px;
            }
            .content-title {
                font-size: 2.2rem;
            }
            .stiqr-footer-col {
                flex: 1 1 100%;
            }
            .auth-modal-card {
                width: calc(100% - 32px);
                padding: 28px 24px;
                margin: 16px;
            }
            .product-modal-card {
                width: calc(100% - 32px);
                padding: 24px;
                max-height: 90vh;
                overflow-y: auto;
                margin: 16px;
            }
            .product-modal-content {
                flex-direction: column;
                gap: 20px;
            }
            .product-modal-left {
                padding: 16px;
            }
            .product-modal-left img {
                max-height: 220px;
            }
            .product-modal-right {
                min-height: auto;
                gap: 16px;
            }
        }
    </style>
</head>
<body class="<?= $is_logged_in ? 'authenticated' : '' ?>">

    <div class="stiqr-container">
        <!-- Header -->
        <header class="stiqr-header">
            <a href="<?= site_url('/') ?>" class="stiqr-logo">
                <span class="stiqr-logo-icon">s</span>
                stiqr.
            </a>

            <!-- Search wrapper -> triggers popup modal -->
            <div class="stiqr-search-wrapper" onclick="openSearchOverlay()">
                <span class="stiqr-search-placeholder-text">Search wall posters...</span>
                <button class="stiqr-search-btn">
                    <svg viewBox="0 0 24 24" width="14" height="14" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </div>

            <!-- Action controls -->
            <div class="stiqr-header-actions">
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

                <!-- Profile Badge / Dropdown Menu -->
                <div class="profile-dropdown-wrapper">
                    <?php if ($is_logged_in): ?>
                        <div class="user-auth-pill" id="profileBadgePill" title="Active Session: <?= htmlspecialchars($user) ?>">
                            <img class="user-avatar" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&q=80&w=100" alt="Avatar">
                            <span>Ryman Alex</span>
                        </div>
                        <div class="profile-dropdown-menu" id="profileDropdown">
                            <a onclick="openInfoModal('orders')">📦 My Orders</a>
                            <a onclick="openInfoModal('settings')">⚙️ Settings</a>
                            <a href="<?= site_url('about') ?>">ℹ️ About stiqr.</a>
                            <a href="<?= site_url('support') ?>">💬 Help & Support</a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= site_url('/?action=logout') ?>" class="logout-link">🚪 Sign Out</a>
                        </div>
                    <?php else: ?>
                        <div class="user-auth-pill" onclick="openAuthModal('login')">
                            <img class="user-avatar" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&q=80&w=100" alt="Avatar">
                            <span>Sign In</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </header>
