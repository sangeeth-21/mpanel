<style>
    .terms-layout {
        display: grid;
        grid-template-columns: 240px 1fr;
        gap: 48px;
        margin-top: 32px;
    }
    .terms-sidebar {
        position: sticky;
        top: 32px;
        align-self: start;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .terms-link {
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--text-secondary);
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 12px;
        transition: background-color 0.2s ease, color 0.2s ease;
    }
    .terms-link:hover {
        background-color: var(--bg-card-alt);
        color: var(--text-primary);
    }
    .terms-content {
        line-height: 1.8;
        font-size: 1rem;
        color: var(--text-secondary);
    }
    .terms-content h3 {
        font-size: 1.35rem;
        font-weight: 700;
        margin: 40px 0 16px 0;
        color: var(--text-primary);
        border-bottom: 1px solid var(--border-color);
        padding-bottom: 8px;
    }
    .terms-content h3:first-of-type {
        margin-top: 0;
    }
    .terms-content p {
        margin-bottom: 20px;
    }
    .terms-content ul {
        margin-bottom: 20px;
        padding-left: 20px;
    }
    .terms-content li {
        margin-bottom: 8px;
    }

    @media (max-width: 768px) {
        .terms-layout {
            grid-template-columns: 1fr;
            gap: 32px;
        }
        .terms-sidebar {
            display: none;
        }
    }
</style>

<div class="stiqr-content-card">
    <h1 class="content-title">Terms of Service</h1>
    <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 24px; font-family: var(--font-mono);">Last Updated: May 26, 2026</p>

    <div class="terms-layout">
        <!-- Sidebar Navigation -->
        <aside class="terms-sidebar">
            <a href="#acceptance" class="terms-link">1. Acceptance of Terms</a>
            <a href="#intellectual" class="terms-link">2. Intellectual Property</a>
            <a href="#purchase" class="terms-link">3. Purchase & Payments</a>
            <a href="#conduct" class="terms-link">4. Prohibited Conduct</a>
            <a href="#liability" class="terms-link">5. Limitation of Liability</a>
            <a href="#governing" class="terms-link">6. Governing Law</a>
        </aside>

        <!-- Terms Content -->
        <div class="terms-content">
            <h3 id="acceptance">1. Acceptance of Terms</h3>
            <p>Welcome to stiqr. By accessing, browsing, or placing an order on our website (stiqr.), you agree to be bound by these Terms of Service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws.</p>
            <p>If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this website are protected by applicable copyright and trademark law.</p>

            <h3 id="intellectual">2. Intellectual Property Rights</h3>
            <p>All custom storefront designs, graphic prints, photographic previews, text materials, code structures, and trademark assets shown on stiqr. are the exclusive intellectual property of stiqr. or our collaborating visual digital artists.</p>
            <p>You are granted a limited, personal, non-transferable license to access the website for ordering art prints. You may not:</p>
            <ul>
                <li>Reproduce, copy, print, or resell any digital preview illustrations.</li>
                <li>Use stiqr. artwork files for commercial purposes or public display.</li>
                <li>Attempt to decompile, reverse-engineer, or extract codebase frameworks from the site.</li>
            </ul>

            <h3 id="purchase">3. Purchase and Payments</h3>
            <p>By placing an order on stiqr., you represent that you are at least 18 years old or accessing the site with parental consent, and that all billing and shipping information provided is accurate and complete.</p>
            <p>All prices displayed are in USD and are subject to change. Payment must be cleared in full before custom pine framing and Giclée printing production begins. In the event of a payment dispute, stiqr. reserves the right to hold shipments or cancel user sessions.</p>

            <h3 id="conduct">4. Prohibited Conduct</h3>
            <p>You agree not to use the website or its security interface for any unlawful purpose. Prohibited activities include, but are not limited to, attempting to inject malicious scripts, brute-forcing accounts, initiating fraudulent chargebacks, or scraping database products.</p>

            <h3 id="liability">5. Limitation of Liability</h3>
            <p>In no event shall stiqr. or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on stiqr., even if stiqr. or a stiqr. authorized representative has been notified orally or in writing of the possibility of such damage.</p>

            <h3 id="governing">6. Governing Law</h3>
            <p>These terms and conditions are governed by and construed in accordance with the laws of the jurisdiction in which stiqr. operates, and you irrevocably submit to the exclusive jurisdiction of the courts in that State or Location.</p>
        </div>
    </div>
</div>
