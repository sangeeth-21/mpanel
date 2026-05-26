<style>
    .careers-intro {
        margin-bottom: 40px;
    }
    .benefits-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        margin: 32px 0 56px 0;
    }
    .benefit-card {
        background-color: var(--bg-card-alt);
        border: 1px solid var(--border-color);
        border-radius: 20px;
        padding: 24px;
        transition: transform 0.2s ease;
    }
    .benefit-card:hover {
        transform: translateY(-4px);
    }
    .benefit-icon {
        font-size: 1.8rem;
        margin-bottom: 12px;
        display: inline-block;
    }
    .benefit-title {
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 8px;
        color: var(--text-primary);
    }
    .benefit-desc {
        font-size: 0.9rem;
        color: var(--text-secondary);
        line-height: 1.5;
    }
    .jobs-section {
        margin-top: 40px;
    }
    .job-badge-row {
        display: flex;
        gap: 8px;
        margin-top: 8px;
    }
    .job-badge {
        font-size: 0.75rem;
        padding: 4px 10px;
        border-radius: 12px;
        background-color: var(--bg-body);
        color: var(--text-secondary);
        font-weight: 600;
    }
    .job-badge.salary {
        background-color: rgba(37, 99, 235, 0.08);
        color: var(--accent-blue);
    }
    .apply-form-overlay {
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
        z-index: 99999;
    }
    .apply-form-overlay.open {
        opacity: 1;
        pointer-events: auto;
    }
    .apply-form-card {
        background-color: var(--bg-card);
        border: 1px solid var(--border-color);
        border-radius: 28px;
        padding: 40px;
        width: 100%;
        max-width: 500px;
        position: relative;
        transform: scale(0.92);
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: var(--shadow-lg);
    }
    .apply-form-overlay.open .apply-form-card {
        transform: scale(1);
    }

    @media (max-width: 768px) {
        .benefits-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }
    }
</style>

<div class="stiqr-content-card">
    <div class="careers-intro">
        <h1 class="content-title">Careers at stiqr.</h1>
        <p style="color: var(--text-secondary); max-width: 600px; font-size: 1.1rem; line-height: 1.6;">We are building the future of physical and digital aesthetics. If you are passionate about design, development, curation, and building high-fidelity products, join our fully remote team.</p>
    </div>

    <div class="content-body">
        <h2>Why Join Us?</h2>
        <div class="benefits-grid">
            <div class="benefit-card">
                <span class="benefit-icon">🌎</span>
                <h4 class="benefit-title">Work from Anywhere</h4>
                <p class="benefit-desc">We are a 100% remote-first company. We believe in high autonomy and asynchronous work systems.</p>
            </div>
            <div class="benefit-card">
                <span class="benefit-icon">🖼️</span>
                <h4 class="benefit-title">Annual Art Budget</h4>
                <p class="benefit-desc">Receive a $1,200 annual credit to fill your workspace and home walls with stiqr. framed prints.</p>
            </div>
            <div class="benefit-card">
                <span class="benefit-icon">📈</span>
                <h4 class="benefit-title">Professional Growth</h4>
                <p class="benefit-desc">We pay for books, online courses, and design conferences to keep you ahead of your craft.</p>
            </div>
        </div>

        <div class="jobs-section">
            <h2>Current Open Positions</h2>
            <p style="color: var(--text-secondary); margin-bottom: 24px;">Select a position below to view details and apply.</p>

            <!-- Position 1 -->
            <div class="job-listing-card">
                <div>
                    <h3 class="card-title" style="font-size: 1.25rem;">Senior Frontend Engineer (Creative)</h3>
                    <div class="job-badge-row">
                        <span class="job-badge">Remote</span>
                        <span class="job-badge">Full-time</span>
                        <span class="job-badge salary">$110k – $140k</span>
                    </div>
                </div>
                <button class="hero-cta-btn" onclick="openApplyModal('Senior Frontend Engineer')">Apply Now</button>
            </div>

            <!-- Position 2 -->
            <div class="job-listing-card">
                <div>
                    <h3 class="card-title" style="font-size: 1.25rem;">Lead Art Curator & Artist Relations</h3>
                    <div class="job-badge-row">
                        <span class="job-badge">Remote / Europe</span>
                        <span class="job-badge">Full-time</span>
                        <span class="job-badge salary">$80k – $105k</span>
                    </div>
                </div>
                <button class="hero-cta-btn" onclick="openApplyModal('Lead Art Curator')">Apply Now</button>
            </div>

            <!-- Position 3 -->
            <div class="job-listing-card">
                <div>
                    <h3 class="card-title" style="font-size: 1.25rem;">Visual & Brand Designer</h3>
                    <div class="job-badge-row">
                        <span class="job-badge">Remote</span>
                        <span class="job-badge">Contract</span>
                        <span class="job-badge salary">$90k – $115k equivalent</span>
                    </div>
                </div>
                <button class="hero-cta-btn" onclick="openApplyModal('Visual & Brand Designer')">Apply Now</button>
            </div>
        </div>
    </div>
</div>

<!-- Apply Form Overlay Modal -->
<div class="apply-form-overlay" id="applyModal">
    <div class="apply-form-card">
        <button class="auth-modal-close" onclick="closeApplyModal()">&times;</button>
        <div class="auth-modal-header" style="text-align: left; margin-bottom: 24px;">
            <h2 class="auth-modal-title" style="font-size: 1.5rem;" id="applyJobTitle">Apply for Position</h2>
            <p class="auth-modal-sub">Submit your details and a link to your portfolio/resume.</p>
        </div>

        <form onsubmit="submitApplyForm(event)">
            <div class="auth-form-group">
                <input type="text" id="applyName" class="auth-form-input" placeholder="Full Name" required>
            </div>
            <div class="auth-form-group">
                <input type="email" id="applyEmail" class="auth-form-input" placeholder="Email Address" required>
            </div>
            <div class="auth-form-group">
                <input type="url" id="applyPortfolio" class="auth-form-input" placeholder="Portfolio or LinkedIn Link" required>
            </div>
            <div class="auth-form-group">
                <textarea id="applyNote" class="auth-form-input" rows="4" placeholder="Brief note about why you're a great fit..." style="font-family: var(--font-outfit); resize: vertical; min-height: 80px;"></textarea>
            </div>
            <button type="submit" class="auth-submit-btn" id="applySubmitBtn">Submit Application</button>
        </form>
    </div>
</div>

<script>
    const applyModal = document.getElementById('applyModal');
    const applyJobTitle = document.getElementById('applyJobTitle');

    function openApplyModal(jobName) {
        applyJobTitle.textContent = 'Apply: ' + jobName;
        applyModal.classList.add('open');
    }

    function closeApplyModal() {
        applyModal.classList.remove('open');
    }

    function submitApplyForm(e) {
        e.preventDefault();
        const submitBtn = document.getElementById('applySubmitBtn');
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;

        setTimeout(() => {
            submitBtn.classList.remove('loading');
            submitBtn.disabled = false;
            alert('Application submitted successfully! Our talent team will review your portfolio and reach out.');
            closeApplyModal();
            document.getElementById('applyName').value = '';
            document.getElementById('applyEmail').value = '';
            document.getElementById('applyPortfolio').value = '';
            document.getElementById('applyNote').value = '';
        }, 1500);
    }
</script>
