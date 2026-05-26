<?php helper('url'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stiqr. - Premium Framed Art & Wall Posters</title>
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

        /* Main Dashboard Grid */
        .stiqr-grid {
            display: grid;
            grid-template-columns: 3.2fr 1.2fr;
            gap: 28px;
            flex: 1;
        }

        /* Left Side Columns & Cards */
        .left-column {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 28px;
        }

        /* Hero Card */
        .hero-card {
            background-color: var(--bg-card);
            border-radius: 32px;
            padding: 48px;
            display: flex;
            position: relative;
            flex: 1;
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
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -1.5px;
            margin: 20px 0;
            color: var(--text-primary);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        /* Art guide row */
        .hero-guide-row {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
            transition: opacity 0.3s ease;
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

        /* Floating Framed Poster Showcase */
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
            width: 280px;
            height: 340px;
            object-fit: contain;
            animation: float-animation 6s ease-in-out infinite;
            filter: drop-shadow(0 20px 40px rgba(15, 23, 42, 0.15));
            border-radius: 12px;
            z-index: 2;
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        /* Graphic Circles / Guides surrounding Framed Poster */
        .hero-orbit-guide {
            position: absolute;
            width: 380px;
            height: 380px;
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
            gap: 28px;
        }

        .nitec-card {
            background-color: var(--bg-card);
            border-radius: 28px;
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
            height: 58px;
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

        /* Card 3: Release announcement banner */
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
            justify-content: space-between;
            gap: 28px;
        }

        /* Popular Colors Card */
        .colors-card {
            background-color: var(--bg-card);
            border-radius: 28px;
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
            border-radius: 28px;
            padding: 24px;
            box-shadow: var(--shadow-sm);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            flex: 1;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s ease, background-color var(--transition-speed) ease;
        }

        .product-showcase-card:hover {
            transform: translateY(-6px);
            box-shadow: var(--shadow-md);
        }

        .product-card-img-wrap {
            width: 100%;
            height: 160px;
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
            box-shadow: 0 4px 12px rgba(0,0,0,0.06);
            transition: transform 0.3s ease;
        }

        .product-showcase-card:hover .product-card-img {
            transform: scale(1.05);
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
            background-color: rgba(31, 41, 55, 0.85);
            border-color: rgba(55, 65, 81, 0.8);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
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

        /* Full page Profile section templates / layouts (Popup modal) */
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

        /* Responsive Design */
        @media (max-width: 1024px) {
            .stiqr-grid {
                grid-template-columns: 1fr;
            }
            .right-column {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 28px;
            }
            .colors-card {
                grid-column: span 2;
            }
        }

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
            .hero-card {
                flex-direction: column;
                padding: 32px;
                min-height: auto;
                gap: 32px;
            }
            .hero-title {
                font-size: 2.6rem;
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
                width: 220px;
                height: 270px;
            }
            .hero-orbit-guide {
                width: 290px;
                height: 290px;
            }
            .stiqr-footer-col {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body class="<?= $is_logged_in ? 'authenticated' : '' ?>">

    <div class="stiqr-container">
        <!-- Header -->
        <header class="stiqr-header">
            <div class="stiqr-logo" onclick="window.location.reload()" style="cursor: pointer;">
                <span class="stiqr-logo-icon">s</span>
                stiqr.
            </div>

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
                            <a onclick="openInfoModal('about')">ℹ️ About stiqr.</a>
                            <a onclick="openInfoModal('support')">💬 Help & Support</a>
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

        <!-- Grid Dashboard -->
        <main class="stiqr-grid">
            
            <!-- Left Side Area -->
            <div class="left-column">
                
                <!-- Hero card showcase (autoscroll sliders) -->
                <section class="hero-card">
                    <div class="hero-details">
                        <span class="hero-tag" id="heroTag">Art is Eternal</span>

                        <h1 class="hero-title" id="heroTitle">
                            Inspiring Canvas<br>Artistry.
                        </h1>

                        <div class="hero-guide-row" id="heroGuide">
                            <span class="guide-num" id="heroNum">01</span>
                            <span class="guide-line"></span>
                            <div class="guide-desc" id="heroDesc">
                                <strong>Curated Prints</strong>
                                Transforming your dream spaces with high-end premium wallposters and curated art prints.
                            </div>
                        </div>

                        <button class="hero-cta-btn" onclick="handleRestrictedAction(event)">
                            View All Posters
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

                    <!-- Floating Framed Poster image with absolute onerror fallback -->
                    <div class="hero-showcase">
                        <div class="hero-orbit-guide"></div>
                        <div class="orbit-dot dot-1"></div>
                        <div class="orbit-dot dot-2"></div>
                        <div class="orbit-dot dot-3"></div>
                        <img class="floating-headphones" 
                             id="heroImage"
                             src="<?= base_url('assets/poster_hero.png') ?>" 
                             onerror="this.onerror=null; this.src='<?= base_url('public/assets/poster_hero.png') ?>';" 
                             alt="Premium Framed Wall Poster">
                        
                        <!-- Manual slide trigger control -->
                        <div class="slider-controls" onclick="manualCycleSlider()">
                            <svg viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="12 19 5 12 12 5"></polyline>
                                <polyline points="19 19 12 12 19 5"></polyline>
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
                            <img class="product-thumbnail" src="<?= base_url('assets/poster_cyberpunk.png') ?>" onerror="this.onerror=null; this.src='<?= base_url('public/assets/poster_cyberpunk.png') ?>';" alt="Poster">
                            <img class="product-thumbnail" src="<?= base_url('assets/poster_bauhaus.png') ?>" onerror="this.onerror=null; this.src='<?= base_url('public/assets/poster_bauhaus.png') ?>';" alt="Poster">
                            <img class="product-thumbnail" src="<?= base_url('assets/poster_line_art.png') ?>" onerror="this.onerror=null; this.src='<?= base_url('public/assets/poster_line_art.png') ?>';" alt="Poster">
                        </div>
                    </div>

                    <!-- Card 2: Prints Sold metric -->
                    <div class="nitec-card" onclick="handleRestrictedAction(event)">
                        <div class="downloads-circle-container">
                            <div class="avatar-overlap-group">
                                <img class="overlap-avatar" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&q=80&w=60" alt="Reviewer">
                                <img class="overlap-avatar" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&q=80&w=60" alt="Reviewer">
                                <img class="overlap-avatar" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=60" alt="Reviewer">
                            </div>
                            <div class="download-pill-metric">
                                5m+
                                <span style="font-size: 0.58rem;">Prints Sold</span>
                            </div>
                            <div class="rating-stars-badge">
                                <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="2" fill="none">
                                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                </svg>
                                4.8 reviews
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Release announcement banner -->
                    <div class="nitec-card" onclick="handleRestrictedAction(event)">
                        <div class="release-card-bg-wrap" style="background-image: url('<?= base_url('assets/poster_bauhaus.png') ?>');" onerror="this.style.backgroundImage='url(<?= base_url('public/assets/poster_bauhaus.png') ?>)'"></div>
                        <div class="release-details">
                            <span class="hero-tag" style="padding: 4px 10px; font-size: 0.75rem; background-color: rgba(239, 68, 68, 0.1); color: var(--accent-red); border: 1px solid rgba(239, 68, 68, 0.15);">❤️ Popular</span>
                            <div>
                                <h3 class="card-title" style="font-size: 1.05rem; text-shadow: 0 2px 4px rgba(255,255,255,0.8);">Vintage Bauhaus Released</h3>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 8px;">
                                <div class="rating-stars-badge">
                                    <svg viewBox="0 0 24 24" width="11" height="11" stroke="currentColor" stroke-width="2" fill="none"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    4.9
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
                    <h3 class="colors-title">Popular Frame Colors</h3>
                    <div class="colors-dot-row">
                        <button class="color-dot-btn active" style="background-color: #1e293b;" onclick="selectColor(this)"></button>
                        <button class="color-dot-btn" style="background-color: #b45309;" onclick="selectColor(this)"></button>
                        <button class="color-dot-btn" style="background-color: #15803d;" onclick="selectColor(this)"></button>
                        <button class="color-dot-btn" style="background-color: #b91c1c;" onclick="selectColor(this)"></button>
                        <button class="color-dot-btn" style="background-color: #f59e0b;" onclick="selectColor(this)"></button>
                    </div>
                </div>

                <!-- Product Card 1: Cyberpunk -->
                <div class="product-showcase-card" onclick="handleRestrictedAction(event)">
                    <div class="card-header-row" style="margin-bottom: 0;">
                        <h3 class="card-title">Vibrant Neon<br>Cyberpunk</h3>
                        <button class="small-arrow-btn">
                            <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="7" y1="17" x2="17" y2="7"></line>
                                <polyline points="7 7 17 7 17 17"></polyline>
                            </svg>
                        </button>
                    </div>
                    <div class="product-card-img-wrap">
                        <img class="product-card-img" src="<?= base_url('assets/poster_cyberpunk.png') ?>" onerror="this.onerror=null; this.src='<?= base_url('public/assets/poster_cyberpunk.png') ?>';" alt="Cyberpunk Poster">
                    </div>
                </div>

                <!-- Product Card 2: Minimalist Line -->
                <div class="product-showcase-card" onclick="handleRestrictedAction(event)">
                    <div class="product-card-img-wrap" style="order: 2;">
                        <img class="product-card-img" src="<?= base_url('assets/poster_line_art.png') ?>" onerror="this.onerror=null; this.src='<?= base_url('public/assets/poster_line_art.png') ?>';" alt="Botanical Line Poster">
                    </div>
                    <div class="card-header-row" style="margin-bottom: 0; order: 1; justify-content: space-between;">
                        <h3 class="card-title" style="font-size: 1.05rem;">Minimalist Line<br>Botanical Art<br><span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 500;">Beige series print</span></h3>
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

        <!-- Footer -->
        <footer class="stiqr-footer">
            <div class="stiqr-footer-col">
                <div class="stiqr-logo" style="margin-bottom: 12px;">
                    <span class="stiqr-logo-icon" style="width: 28px; height: 28px; font-size: 1rem; border-radius: 8px;">s</span>
                    stiqr.
                </div>
                <p style="font-size: 0.85rem; max-width: 240px; line-height: 1.5;">Curating premium quality wall posters and framed arts for aesthetic spaces.</p>
            </div>
            
            <div class="stiqr-footer-col">
                <h4 class="stiqr-footer-title">Products</h4>
                <ul class="stiqr-footer-links">
                    <li><a onclick="handleRestrictedAction(event)">Abstract Posters</a></li>
                    <li><a onclick="handleRestrictedAction(event)">Cyberpunk Prints</a></li>
                    <li><a onclick="handleRestrictedAction(event)">Minimalist Art</a></li>
                    <li><a onclick="handleRestrictedAction(event)">Vintage Bauhaus</a></li>
                </ul>
            </div>

            <div class="stiqr-footer-col">
                <h4 class="stiqr-footer-title">Company</h4>
                <ul class="stiqr-footer-links">
                    <li><a onclick="openInfoModal('about')">About Us</a></li>
                    <li><a onclick="openInfoModal('support')">Help & Support</a></li>
                    <li><a onclick="handleRestrictedAction(event)">Careers</a></li>
                    <li><a onclick="handleRestrictedAction(event)">Terms of Service</a></li>
                </ul>
            </div>

            <div class="stiqr-footer-col" style="min-width: 260px;">
                <h4 class="stiqr-footer-title">Newsletter</h4>
                <p style="font-size: 0.85rem; line-height: 1.4; margin-bottom: 10px;">Subscribe to get notified about new art arrivals and discounts.</p>
                <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Subscribed successfully!'); this.reset();">
                    <input type="email" class="newsletter-input" placeholder="Your email address" required>
                    <button type="submit" class="newsletter-btn">Join</button>
                </form>
            </div>

            <div class="footer-bottom">
                &copy; 2026 stiqr. All rights reserved. Curated with passion for beautiful walls.
            </div>
        </footer>
    </div>

    <!-- Mobile view sticky bottom navigation bar -->
    <nav class="mobile-bottom-nav">
        <a onclick="window.location.reload()" class="mobile-nav-item">
            <!-- Home Icon -->
            <svg class="mobile-nav-icon" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
            </svg>
            <span>Home</span>
        </a>
        <a onclick="openSearchOverlay()" class="mobile-nav-item">
            <!-- Search Icon -->
            <svg class="mobile-nav-icon" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <span>Search</span>
        </a>
        <a onclick="handleRestrictedAction(event)" class="mobile-nav-item">
            <!-- Cart Icon -->
            <svg class="mobile-nav-icon" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            <span>Cart</span>
        </a>
        <a onclick="handleMobileProfileClick(event)" class="mobile-nav-item">
            <!-- Profile Icon -->
            <svg class="mobile-nav-icon" viewBox="0 0 24 24" width="18" height="18" stroke="currentColor" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <span>Profile</span>
        </a>
    </nav>

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
                    <p class="auth-modal-sub">Welcome back to stiqr. Please enter your credentials.</p>
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
                    <p class="auth-modal-sub">Sign up for exclusive access to premium wall posters.</p>
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

    <!-- Full-screen Search Overlay popup modal -->
    <div class="search-overlay" id="searchOverlay">
        <div class="search-overlay-card">
            <div class="auth-modal-header" style="text-align: left; position: relative;">
                <h2 class="auth-modal-title" style="font-size: 1.6rem;">Search stiqr. Catalog</h2>
                <p class="auth-modal-sub">Discover high-end framed art & wall poster prints.</p>
                <button class="auth-modal-close" style="top: -6px; right: -6px;" onclick="closeSearchOverlay()">&times;</button>
            </div>
            <div class="search-overlay-input-wrapper">
                <input type="text" class="search-overlay-input" id="searchOverlayInput" placeholder="Type name, color, style or genre...">
                <button class="auth-submit-btn" style="width: auto; padding: 14px 28px;" onclick="performSearchOverlayQuery()">Search</button>
            </div>
            <div style="margin-top: 24px; text-align: left; font-size: 0.85rem; color: var(--text-muted);">
                <strong>Popular searches:</strong> Cyberpunk Neon, Classic Bauhaus, Botanical Beige, Minimalism, Pastel Geometric
            </div>
        </div>
    </div>

    <!-- Generic Info Modal (Orders, Settings, About, Support) -->
    <div class="auth-modal-overlay" id="infoModalOverlay">
        <div class="generic-info-modal-card">
            <button class="auth-modal-close" onclick="closeInfoModal()">&times;</button>
            <div id="infoModalContent">
                <!-- Dynamically populated by JS -->
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
            const savedTheme = localStorage.getItem('stiqr-theme') || 'light';
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
                sunIcon.style.display = 'block';
                moonIcon.style.display = 'none';
            }

            themeToggleBtn.addEventListener('click', () => {
                const isDarkMode = document.body.classList.toggle('dark-mode');
                if (isDarkMode) {
                    localStorage.setItem('stiqr-theme', 'dark');
                    sunIcon.style.display = 'block';
                    moonIcon.style.display = 'none';
                } else {
                    localStorage.setItem('stiqr-theme', 'light');
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

            // 4. Search Overlay popup triggers
            const searchOverlay = document.getElementById('searchOverlay');
            const searchOverlayInput = document.getElementById('searchOverlayInput');

            window.openSearchOverlay = function() {
                searchOverlay.classList.add('open');
                setTimeout(() => {
                    searchOverlayInput.focus();
                }, 150);
            }

            window.closeSearchOverlay = function() {
                searchOverlay.classList.remove('open');
                searchOverlayInput.value = '';
            }

            window.performSearchOverlayQuery = function() {
                const query = searchOverlayInput.value.trim();
                if (query) {
                    alert(`Searching catalog for: "${query}"...`);
                    closeSearchOverlay();
                } else {
                    searchOverlayInput.focus();
                }
            }

            // Support enter key on search input
            searchOverlayInput.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    performSearchOverlayQuery();
                }
            });

            // 5. Autoscrolling Hero Product Slider
            const slides = [
                {
                    num: '01',
                    tag: 'Art is Eternal',
                    title: 'Inspiring Canvas<br>Artistry.',
                    desc: 'Transforming your dream spaces with high-end premium wallposters and curated art prints.',
                    image: '<?= base_url("assets/poster_hero.png") ?>',
                    imageFallback: '<?= base_url("public/assets/poster_hero.png") ?>'
                },
                {
                    num: '02',
                    tag: 'Vibrant & Bold',
                    title: 'Retro Neon<br>Cyberpunk.',
                    desc: 'Dive into high-contrast futuristic urban streets with our glowing cyberpunk framed series.',
                    image: '<?= base_url("assets/poster_cyberpunk.png") ?>',
                    imageFallback: '<?= base_url("public/assets/poster_cyberpunk.png") ?>'
                },
                {
                    num: '03',
                    tag: 'Classic Bauhaus',
                    title: 'Geometric Form<br>& Color.',
                    desc: 'Experience primary colors and typographic balance with classic Weimar Bauhaus museum prints.',
                    image: '<?= base_url("assets/poster_bauhaus.png") ?>',
                    imageFallback: '<?= base_url("public/assets/poster_bauhaus.png") ?>'
                }
            ];

            let currentSlideIndex = 0;
            let slideInterval = setInterval(cycleSlider, 5000); // Autoplay every 5s

            const heroTag = document.getElementById('heroTag');
            const heroTitle = document.getElementById('heroTitle');
            const heroNum = document.getElementById('heroNum');
            const heroDesc = document.getElementById('heroDesc');
            const heroImage = document.getElementById('heroImage');

            function cycleSlider() {
                currentSlideIndex = (currentSlideIndex + 1) % slides.length;
                updateSliderView();
            }

            window.manualCycleSlider = function() {
                clearInterval(slideInterval);
                cycleSlider();
                slideInterval = setInterval(cycleSlider, 5000); // Reset timer
            }

            function updateSliderView() {
                const active = slides[currentSlideIndex];
                
                // Fade out text elements
                heroTag.style.opacity = '0';
                heroTitle.style.opacity = '0';
                heroDesc.style.opacity = '0';
                heroImage.style.opacity = '0';
                
                setTimeout(() => {
                    // Update content
                    heroTag.textContent = active.tag;
                    heroTitle.innerHTML = active.title;
                    heroNum.textContent = active.num;
                    heroDesc.innerHTML = `<strong>Curated Prints</strong>${active.desc}`;
                    
                    // Reset errors and change image src
                    heroImage.onerror = function() {
                        this.onerror = null;
                        this.src = active.imageFallback;
                    };
                    heroImage.src = active.image;
                    
                    // Fade in text elements
                    heroTag.style.opacity = '1';
                    heroTitle.style.opacity = '1';
                    heroDesc.style.opacity = '1';
                    heroImage.style.opacity = '1';
                }, 300);
            }

            // 6. User Profile Dropdown toggles
            const profileBadgePill = document.getElementById('profileBadgePill');
            const profileDropdown = document.getElementById('profileDropdown');

            if (profileBadgePill && profileDropdown) {
                profileBadgePill.addEventListener('click', (e) => {
                    e.stopPropagation();
                    profileDropdown.classList.toggle('show');
                });
                
                // Hide dropdown when clicking elsewhere
                document.addEventListener('click', () => {
                    profileDropdown.classList.remove('show');
                });
            }

            // 7. Generic info popup models (Orders, Settings, About, Support)
            const infoModalOverlay = document.getElementById('infoModalOverlay');
            const infoModalContent = document.getElementById('infoModalContent');

            window.openInfoModal = function(section) {
                let html = '';
                if (section === 'orders') {
                    html = `
                        <h2 class="auth-modal-title" style="margin-bottom: 20px;">📦 My Orders</h2>
                        <div style="max-height: 300px; overflow-y: auto; text-align: left; font-size: 0.95rem; line-height: 1.6;">
                            <div style="padding: 12px; border: 1px solid var(--border-color); border-radius: 12px; margin-bottom: 12px;">
                                <div style="display:flex; justify-content:space-between; font-weight:700;">
                                    <span>Order #STQ-88321</span>
                                    <span style="color:#10b981;">Delivered</span>
                                </div>
                                <div style="color:var(--text-muted); font-size:0.8rem; margin: 4px 0;">Date: 2026-05-20 | Total: $48.50</div>
                                <p style="font-weight: 500;">- 1x Vintage Bauhaus Geometric (Framed Black)</p>
                            </div>
                            <div style="padding: 12px; border: 1px solid var(--border-color); border-radius: 12px; margin-bottom: 12px; opacity:0.85;">
                                <div style="display:flex; justify-content:space-between; font-weight:700;">
                                    <span>Order #STQ-88204</span>
                                    <span style="color:var(--text-muted);">Cancelled</span>
                                </div>
                                <div style="color:var(--text-muted); font-size:0.8rem; margin: 4px 0;">Date: 2026-05-12 | Total: $125.00</div>
                                <p style="font-weight: 500;">- 2x Vibrant Neon Cyberpunk Series</p>
                            </div>
                        </div>
                    `;
                } 
                else if (section === 'settings') {
                    html = `
                        <h2 class="auth-modal-title" style="margin-bottom: 20px;">⚙️ Account Settings</h2>
                        <div style="text-align: left; font-size: 0.95rem;">
                            <div class="auth-form-group">
                                <label style="font-weight:700; font-size:0.8rem; color:var(--text-muted); text-transform:uppercase;">Notification Preferences</label>
                                <div style="display:flex; gap: 8px; align-items:center; margin-top:8px;">
                                    <input type="checkbox" id="sett_notif" checked style="width:16px; height:16px;">
                                    <label for="sett_notif">Email me about new poster collections</label>
                                </div>
                            </div>
                            <div class="auth-form-group" style="margin-top:16px;">
                                <label style="font-weight:700; font-size:0.8rem; color:var(--text-muted); text-transform:uppercase;">Account Actions</label>
                                <button class="auth-submit-btn" style="margin-top:8px; background-color: var(--accent-red); color: white;" onclick="alert('Session cleanup activated. Password reset request sent.')">Reset Passcode</button>
                            </div>
                        </div>
                    `;
                } 
                else if (section === 'about') {
                    html = `
                        <h2 class="auth-modal-title" style="margin-bottom: 16px;">ℹ️ About stiqr.</h2>
                        <div style="text-align: left; font-size: 0.95rem; line-height: 1.6;">
                            <p style="margin-bottom:12px;">stiqr. is a boutique framed poster e-commerce platform curated for modern art collectors and aesthetic spacing design enthusiasts.</p>
                            <p style="margin-bottom:12px;">All poster prints are rendered on heavyweight museum-grade matte canvas and hand-framed by local master craftsmen.</p>
                            <div style="background-color: var(--bg-card-alt); padding: 12px; border-radius:12px; font-size:0.8rem; color:var(--text-muted);">
                                Version 2.4.0 (Electric Poster Release)<br>
                                Powered by CodeIgniter 4 secure framework.
                            </div>
                        </div>
                    `;
                } 
                else if (section === 'support') {
                    html = `
                        <h2 class="auth-modal-title" style="margin-bottom: 16px;">💬 Customer Support</h2>
                        <div style="text-align: left; font-size: 0.95rem; line-height: 1.5;">
                            <p style="margin-bottom:16px;">Have issues with email verification, shipping, or refunds? Our support desk is open 24/7.</p>
                            <div class="auth-form-group">
                                <textarea class="auth-form-input" placeholder="Type your message to support..." style="height:100px; resize:none;"></textarea>
                            </div>
                            <button class="auth-submit-btn" onclick="alert('Support ticket submitted! We will email you back within 12 hours.'); closeInfoModal();">Send Message</button>
                        </div>
                    `;
                }

                infoModalContent.innerHTML = html;
                infoModalOverlay.classList.add('open');
            }

            window.closeInfoModal = function() {
                infoModalOverlay.classList.remove('open');
                infoModalContent.innerHTML = '';
            }

            // Mobile profile click handles
            window.handleMobileProfileClick = function(e) {
                if (!isUserLoggedIn) {
                    openAuthModal('login');
                } else {
                    openInfoModal('orders');
                }
            }

            // Restrict access & trigger login popup if user is logged out
            window.handleRestrictedAction = function(e) {
                if (!isUserLoggedIn) {
                    e.preventDefault();
                    e.stopPropagation();
                    openAuthModal('login');
                } else {
                    alert('Items added to cart!');
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

            // 8. Auto-tabbing progression for OTP inputs
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

            // 9. Asynchronous authentication request handlers
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
