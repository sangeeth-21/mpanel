<style>
    .support-container {
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 48px;
        margin-top: 32px;
    }
    .faq-section {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    .faq-item {
        border: 1.5px solid var(--border-color);
        border-radius: 20px;
        background-color: var(--bg-card-alt);
        overflow: hidden;
        transition: border-color 0.2s ease;
    }
    .faq-item:hover {
        border-color: var(--text-primary);
    }
    .faq-question {
        padding: 20px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 700;
        font-size: 1.05rem;
        cursor: pointer;
        user-select: none;
        color: var(--text-primary);
    }
    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s cubic-bezier(0, 1, 0, 1), padding 0.3s ease;
        font-size: 0.95rem;
        line-height: 1.6;
        color: var(--text-secondary);
        padding: 0 24px;
        border-top: 1px solid transparent;
    }
    .faq-item.active .faq-answer {
        max-height: 500px;
        padding: 20px 24px;
        border-top-color: var(--border-color);
        transition: max-height 0.3s ease-in-out, padding 0.3s ease;
    }
    .faq-icon {
        font-size: 1.2rem;
        transition: transform 0.2s ease;
        color: var(--text-muted);
    }
    .faq-item.active .faq-icon {
        transform: rotate(45deg);
    }
    .support-form-card {
        background-color: var(--bg-card-alt);
        border: 1.5px solid var(--border-color);
        border-radius: 24px;
        padding: 36px;
        align-self: start;
    }
    .support-form-title {
        font-size: 1.4rem;
        font-weight: 800;
        margin-bottom: 8px;
        color: var(--text-primary);
    }
    .support-form-subtitle {
        font-size: 0.9rem;
        color: var(--text-secondary);
        margin-bottom: 24px;
        line-height: 1.4;
    }
    .form-alert {
        padding: 12px 16px;
        border-radius: 12px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 20px;
        display: none;
    }
    .form-alert.error {
        background-color: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.15);
    }
    .form-alert.success {
        background-color: rgba(16, 185, 129, 0.1);
        color: #10b981;
        border: 1px solid rgba(16, 185, 129, 0.15);
    }

    @media (max-width: 1024px) {
        .support-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }
    }
</style>

<div class="stiqr-content-card">
    <h1 class="content-title">Help & Support</h1>
    <p style="color: var(--text-secondary); max-width: 600px; margin-bottom: 32px;">Need help with an order, interested in a custom framing size, or have questions about our prints? Browse our FAQs or send us an inquiry directly below.</p>

    <div class="support-container">
        <!-- FAQ Accordion -->
        <div class="faq-section">
            <h2 style="font-size: 1.6rem; font-weight: 800; margin-bottom: 12px; color: var(--text-primary);">Frequently Asked Questions</h2>
            
            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>What is the standard shipping turnaround time?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    Every stiqr. framed poster is custom-built and framed to order. Production takes 2–4 business days. Standard shipping within the country takes 3–5 business days, while international shipping can range from 7–14 business days depending on location.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>What framing materials do you use?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    We construct frames using sustainable FSC-certified solid pinewood, finished with high-durability matte coatings. For protection, we employ museum-grade 1.5mm shatterproof clear acrylic, which is lighter and safer than glass while offering identical optical clarity.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Can I return my order if I change my mind?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    Because all prints are made and framed individually to your specification, we cannot accept general returns for remorse. However, if your art print or frame arrives damaged, we offer an immediate, free replacement or full refund. Just contact us within 7 days of delivery.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question" onclick="toggleFaq(this)">
                    <span>Do you offer custom dimensions or framing?</span>
                    <span class="faq-icon">+</span>
                </div>
                <div class="faq-answer">
                    Yes! We can accommodate custom canvas crops, specific frame dimensions, and premium floating mounts for commercial projects or unique home sizing. Please send us a message through the contact form with your sizing specifications.
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="support-form-card">
            <h3 class="support-form-title">Send a Message</h3>
            <p class="support-form-subtitle">Fill in details and our curators will get back to you within 24 hours.</p>

            <div class="form-alert error" id="supportErrorAlert"></div>
            <div class="form-alert success" id="supportSuccessAlert"></div>

            <form id="supportForm" onsubmit="submitSupportForm(event)">
                <div class="content-form-group">
                    <label class="content-form-label" for="supportName">Full Name</label>
                    <input type="text" id="supportName" name="name" class="content-form-input" placeholder="Your name" required>
                </div>
                <div class="content-form-group">
                    <label class="content-form-label" for="supportEmail">Email Address</label>
                    <input type="email" id="supportEmail" name="email" class="content-form-input" placeholder="Your email" required>
                </div>
                <div class="content-form-group">
                    <label class="content-form-label" for="supportTopic">Topic</label>
                    <select id="supportTopic" name="topic" class="content-form-input" style="appearance: none; background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2224%22 height=%2224%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22currentColor%22 stroke-width=%222%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22><polyline points=%226 9 12 15 18 9%22></polyline></svg>'); background-repeat: no-repeat; background-position: right 18px center; background-size: 16px;">
                        <option value="Order Status">Order Status & Tracking</option>
                        <option value="Damaged Item">Damaged / Defective Product</option>
                        <option value="Custom Framing">Custom Sizing Request</option>
                        <option value="Artist Collaboration">Artist Collaboration</option>
                        <option value="General Question">General Inquiry</option>
                    </select>
                </div>
                <div class="content-form-group" style="max-width: 100%;">
                    <label class="content-form-label" for="supportMessage">Message Detail</label>
                    <textarea id="supportMessage" name="message" class="content-form-input" rows="5" placeholder="How can we help you?" style="resize: vertical; min-height: 120px;" required></textarea>
                </div>
                <button type="submit" class="auth-submit-btn" id="supportSubmitBtn" style="margin-top: 12px;">Submit Inquiry</button>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleFaq(el) {
        const item = el.parentElement;
        const isActive = item.classList.contains('active');
        
        // Close all first
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
        
        // Open target if it wasn't open
        if (!isActive) {
            item.classList.add('active');
        }
    }

    function submitSupportForm(e) {
        e.preventDefault();
        
        const errAlert = document.getElementById('supportErrorAlert');
        const successAlert = document.getElementById('supportSuccessAlert');
        const submitBtn = document.getElementById('supportSubmitBtn');
        
        errAlert.style.display = 'none';
        successAlert.style.display = 'none';
        
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
        
        const formData = new FormData(document.getElementById('supportForm'));
        
        fetch('<?= site_url('support') ?>', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.json())
        .then(data => {
            submitBtn.classList.remove('loading');
            submitBtn.disabled = false;
            
            if (data.status === 'success') {
                successAlert.textContent = data.message;
                successAlert.style.display = 'block';
                document.getElementById('supportForm').reset();
            } else {
                errAlert.textContent = data.message;
                errAlert.style.display = 'block';
            }
        })
        .catch(() => {
            submitBtn.classList.remove('loading');
            submitBtn.disabled = false;
            errAlert.textContent = 'Connection error. Please try again.';
            errAlert.style.display = 'block';
        });
    }
</script>
