<style>
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
        cursor: pointer;
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
        cursor: pointer;
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
        cursor: pointer;
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
        cursor: pointer;
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

    @media (max-width: 1024px) {
        .stiqr-grid {
            grid-template-columns: 1fr;
        }
        .right-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
        }
    }

    @media (max-width: 768px) {
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
        .floating-headphones {
            width: 220px;
            height: 270px;
        }
        .hero-orbit-guide {
            width: 290px;
            height: 290px;
        }
    }

    #heroPrice, #heroMrp, #heroDiscount {
        transition: opacity 0.3s ease;
    }
</style>

<!-- Grid Dashboard -->
<main class="stiqr-grid">
    
    <!-- Left Side Area -->
    <div class="left-column">
        
        <!-- Hero card showcase (autoscroll sliders) -->
        <section class="hero-card" onclick="openProductModal('hero')">
            <div class="hero-details">
                <span class="hero-tag" id="heroTag">Art is Eternal</span>

                <h1 class="hero-title" id="heroTitle">
                    Inspiring Canvas<br>Artistry.
                </h1>

                <div class="hero-price-tag" style="margin: 16px 0; display: flex; align-items: baseline; gap: 12px;">
                    <span id="heroPrice" style="font-size: 2.2rem; font-weight: 800; color: var(--accent-blue); font-family: var(--font-mono);">₹45.00</span>
                    <span id="heroMrp" style="font-size: 1.25rem; text-decoration: line-through; color: var(--text-muted); font-family: var(--font-mono); font-weight: 500;">₹75.00</span>
                    <span id="heroDiscount" class="hero-tag" style="background-color: rgba(37, 99, 235, 0.08); color: var(--accent-blue); font-size: 0.8rem; padding: 4px 8px; font-weight: 700; border: none;">40% OFF</span>
                </div>

                <div class="hero-guide-row" id="heroGuide">
                    <span class="guide-num" id="heroNum">01</span>
                    <span class="guide-line"></span>
                    <div class="guide-desc" id="heroDesc">
                        <strong>Curated Prints</strong>
                        Transforming your dream spaces with high-end premium wallposters and curated art prints.
                    </div>
                </div>

                <button class="hero-cta-btn" onclick="event.stopPropagation(); openProductModal('hero')">
                    View Poster Details
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
            <div class="hero-showcase" onclick="event.stopPropagation(); openProductModal('hero')">
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
                <div class="slider-controls" onclick="event.stopPropagation(); manualCycleSlider()">
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
            <div class="nitec-card" onclick="openProductModal('cyberpunk')">
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
            <div class="nitec-card" onclick="openProductModal('bauhaus')">
                <div class="release-card-bg-wrap" style="background-image: url('<?= base_url('assets/poster_bauhaus.png') ?>');" onerror="this.style.backgroundImage='url(<?= base_url('public/assets/poster_bauhaus.png') ?>)'"></div>
                <div class="release-details">
                    <span class="hero-tag" style="padding: 4px 10px; font-size: 0.75rem; background-color: rgba(239, 68, 68, 0.1); color: var(--accent-red); border: 1px solid rgba(239, 68, 68, 0.15);">❤️ Popular</span>
                    <div>
                        <h3 class="card-title" style="font-size: 1.05rem; text-shadow: 0 2px 4px rgba(255,255,255,0.8);">Vintage Bauhaus</h3>
                        <div style="display: flex; gap: 6px; align-items: baseline; margin-top: 4px; text-shadow: 0 2px 4px rgba(255,255,255,0.8);">
                            <span style="font-size: 1rem; font-weight: 800; color: var(--accent-blue); font-family: var(--font-mono);">₹48.50</span>
                            <span style="font-size: 0.75rem; text-decoration: line-through; color: var(--text-muted); font-family: var(--font-mono); font-weight: 500;">₹80.00</span>
                        </div>
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
        
        <!-- Product Card 1: Cyberpunk -->
        <div class="product-showcase-card" onclick="openProductModal('cyberpunk')">
            <div class="product-card-img-wrap">
                <img class="product-card-img" src="<?= base_url('assets/poster_cyberpunk.png') ?>" onerror="this.onerror=null; this.src='<?= base_url('public/assets/poster_cyberpunk.png') ?>';" alt="Cyberpunk Poster">
            </div>
            <div class="card-header-row" style="margin-top: 12px; margin-bottom: 0;">
                <div>
                    <h3 class="card-title">Vibrant Neon<br>Cyberpunk</h3>
                    <div style="display: flex; gap: 8px; align-items: baseline; margin-top: 6px;">
                        <span style="font-size: 1.15rem; font-weight: 800; color: var(--accent-blue); font-family: var(--font-mono);">₹52.00</span>
                        <span style="font-size: 0.85rem; text-decoration: line-through; color: var(--text-muted); font-family: var(--font-mono);">₹85.00</span>
                    </div>
                </div>
                <button class="small-arrow-btn">
                    <svg viewBox="0 0 24 24" width="12" height="12" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="7" y1="17" x2="17" y2="7"></line>
                        <polyline points="7 7 17 7 17 17"></polyline>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Product Card 2: Minimalist Line -->
        <div class="product-showcase-card" onclick="openProductModal('line_art')">
            <div class="product-card-img-wrap">
                <img class="product-card-img" src="<?= base_url('assets/poster_line_art.png') ?>" onerror="this.onerror=null; this.src='<?= base_url('public/assets/poster_line_art.png') ?>';" alt="Botanical Line Poster">
            </div>
            <div class="card-header-row" style="margin-top: 12px; margin-bottom: 0;">
                <div>
                    <h3 class="card-title" style="font-size: 1.05rem;">Minimalist Line<br>Botanical Art<br><span style="font-size: 0.75rem; color: var(--text-muted); font-weight: 500;">Beige series print</span></h3>
                    <div style="display: flex; gap: 8px; align-items: baseline; margin-top: 6px;">
                        <span style="font-size: 1.15rem; font-weight: 800; color: var(--accent-blue); font-family: var(--font-mono);">₹39.00</span>
                        <span style="font-size: 0.85rem; text-decoration: line-through; color: var(--text-muted); font-family: var(--font-mono);">₹65.00</span>
                    </div>
                </div>
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Autoscrolling Hero Product Slider
        const slides = [
            {
                key: 'hero',
                num: '01',
                tag: 'Art is Eternal',
                title: 'Inspiring Canvas<br>Artistry.',
                desc: 'Transforming your dream spaces with high-end premium wallposters and curated art prints.',
                image: '<?= base_url("assets/poster_hero.png") ?>',
                imageFallback: '<?= base_url("public/assets/poster_hero.png") ?>',
                price: '₹45.00',
                mrp: '₹75.00',
                discount: '40% OFF'
            },
            {
                key: 'cyberpunk',
                num: '02',
                tag: 'Vibrant & Bold',
                title: 'Retro Neon<br>Cyberpunk.',
                desc: 'Dive into high-contrast futuristic urban streets with our glowing cyberpunk framed series.',
                image: '<?= base_url("assets/poster_cyberpunk.png") ?>',
                imageFallback: '<?= base_url("public/assets/poster_cyberpunk.png") ?>',
                price: '₹52.00',
                mrp: '₹85.00',
                discount: '38% OFF'
            },
            {
                key: 'bauhaus',
                num: '03',
                tag: 'Classic Bauhaus',
                title: 'Geometric Form<br>& Color.',
                desc: 'Experience primary colors and typographic balance with classic Weimar Bauhaus museum prints.',
                image: '<?= base_url("assets/poster_bauhaus.png") ?>',
                imageFallback: '<?= base_url("public/assets/poster_bauhaus.png") ?>',
                price: '₹48.50',
                mrp: '₹80.00',
                discount: '39% OFF'
            }
        ];

        let currentSlideIndex = 0;
        let slideInterval = setInterval(cycleSlider, 5000); // Autoplay every 5s

        const heroTag = document.getElementById('heroTag');
        const heroTitle = document.getElementById('heroTitle');
        const heroNum = document.getElementById('heroNum');
        const heroDesc = document.getElementById('heroDesc');
        const heroImage = document.getElementById('heroImage');
        const heroCard = document.querySelector('.hero-card');

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
            document.getElementById('heroPrice').style.opacity = '0';
            document.getElementById('heroMrp').style.opacity = '0';
            document.getElementById('heroDiscount').style.opacity = '0';
            
            setTimeout(() => {
                // Update content
                heroTag.textContent = active.tag;
                heroTitle.innerHTML = active.title;
                heroNum.textContent = active.num;
                heroDesc.innerHTML = `<strong>Curated Prints</strong>${active.desc}`;
                document.getElementById('heroPrice').textContent = active.price;
                document.getElementById('heroMrp').textContent = active.mrp;
                document.getElementById('heroDiscount').textContent = active.discount;
                
                // Reset errors and change image src
                heroImage.onerror = function() {
                    this.onerror = null;
                    this.src = active.imageFallback;
                };
                heroImage.src = active.image;
                
                // Update main hero card click mapping key
                heroCard.setAttribute('onclick', `openProductModal('${active.key}')`);
                
                // Fade in text elements
                heroTag.style.opacity = '1';
                heroTitle.style.opacity = '1';
                heroDesc.style.opacity = '1';
                heroImage.style.opacity = '1';
                document.getElementById('heroPrice').style.opacity = '1';
                document.getElementById('heroMrp').style.opacity = '1';
                document.getElementById('heroDiscount').style.opacity = '1';
            }, 300);
        }
    });
</script>
