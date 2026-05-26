<style>
    .about-hero {
        text-align: center;
        padding: 40px 0 60px 0;
        max-width: 800px;
        margin: 0 auto;
    }
    .about-subtitle {
        font-size: 1.4rem;
        color: var(--text-secondary);
        font-weight: 500;
        margin-top: 12px;
        line-height: 1.5;
    }
    .gradient-text {
        background: linear-gradient(135deg, var(--text-primary) 30%, var(--accent-blue) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .about-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
        margin: 48px 0;
    }
    .about-card {
        background-color: var(--bg-card-alt);
        border: 1.5px solid var(--border-color);
        border-radius: 24px;
        padding: 32px;
        transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        cursor: default;
    }
    .about-card:hover {
        transform: translateY(-6px);
        border-color: var(--text-primary);
        box-shadow: var(--shadow-md);
    }
    .about-card-icon {
        font-size: 2.2rem;
        margin-bottom: 20px;
        display: inline-block;
    }
    .about-card-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 12px;
        color: var(--text-primary);
    }
    .about-card-desc {
        font-size: 0.95rem;
        line-height: 1.6;
        color: var(--text-secondary);
    }
    .stats-section {
        background-color: var(--bg-primary);
        border-radius: 24px;
        padding: 40px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        gap: 32px;
        margin-top: 56px;
        transition: background-color var(--transition-speed) ease;
    }
    .stat-item {
        text-align: center;
    }
    .stat-val {
        font-size: 3rem;
        font-weight: 800;
        color: var(--text-primary);
        margin-bottom: 6px;
        font-family: var(--font-mono);
    }
    .stat-lbl {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-muted);
        font-weight: 700;
    }

    @media (max-width: 768px) {
        .about-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .stats-section {
            flex-direction: column;
            gap: 24px;
        }
        .about-hero {
            padding: 20px 0 40px 0;
        }
        .about-subtitle {
            font-size: 1.15rem;
        }
    }
</style>

<div class="stiqr-content-card">
    <div class="about-hero">
        <h1 class="content-title"><span class="gradient-text">Art Curated for Modern Spaces</span></h1>
        <p class="about-subtitle">stiqr. is a boutique storefront bringing museum-grade, high-end framed wall posters and canvas prints to design-conscious homes and workspaces.</p>
    </div>

    <div class="content-body">
        <h2>Our Philosophy</h2>
        <p>We believe that your walls are a reflection of your state of mind. Standard wall poster catalogs are filled with mass-produced, repetitive designs of low-grade paper quality. stiqr. was born out of a desire to change that. We source work from digital creators globally, formatting each print into fine-art archives and framing them locally using top-tier materials.</p>
        <p>Whether you want to inject the vibrant futuristic neon hues of Cyberpunk, the structured logic of Bauhaus geometry, or the calming strokes of botanical line art into your space, we have carefully designed and tailored pieces that harmonize with any interior setting.</p>

        <div class="about-grid">
            <!-- Pillar 1 -->
            <div class="about-card">
                <span class="about-card-icon">💎</span>
                <h3 class="about-card-title">Museum-Grade Materials</h3>
                <p class="about-card-desc">Every poster is printed using Giclée archival inks on heavy 250gsm matte paper. Frames are built with premium pinewood and shatterproof acrylic protection.</p>
            </div>

            <!-- Pillar 2 -->
            <div class="about-card">
                <span class="about-card-icon">🎨</span>
                <h3 class="about-card-title">Exclusive Curation</h3>
                <p class="about-card-desc">We reject massive generic libraries. We curate only a hand-selected collection of highly limited releases, ensuring your spaces look genuinely unique.</p>
            </div>

            <!-- Pillar 3 -->
            <div class="about-card">
                <span class="about-card-icon">🌿</span>
                <h3 class="about-card-title">Eco-Conscious Craft</h3>
                <p class="about-card-desc">Our woods are sustainably sourced from FSC-certified forests, and we package every single shipment in 100% plastic-free, recyclable cardboard tubes.</p>
            </div>
        </div>

        <h2>Curating Since 2024</h2>
        <p>What started as a side project between three design students has now evolved into a global community of interior design enthusiasts. We are dedicated to continuous exploration, finding new digital creators, and crafting products that last for generations.</p>

        <div class="stats-section">
            <div class="stat-item">
                <div class="stat-val">5M+</div>
                <div class="stat-lbl">Prints Sold</div>
            </div>
            <div class="stat-item">
                <div class="stat-val">120+</div>
                <div class="stat-lbl">Curators & Artists</div>
            </div>
            <div class="stat-item">
                <div class="stat-val">4.9★</div>
                <div class="stat-lbl">Average Rating</div>
            </div>
        </div>
    </div>
</div>
