{{-- Premium Contact Section with FAQs --}}
<section class="contact-premium" id="contact">
  <div class="contact-premium__container">

    {{-- Section Header --}}
    <div class="contact-premium__header">
      <span class="section-eyebrow">Get In Touch</span>
      <h2 class="section-title">Let's Create Something Extraordinary</h2>
      <p class="section-description">
        Whether you have a project in mind or just want to chat about possibilities, I'm here to help bring your vision to life.
      </p>
    </div>

    {{-- Split Layout: Form + FAQs --}}
    <div class="contact-premium__split">

      {{-- CONTACT FORM COLUMN --}}
      <div class="contact-premium__form-section">
        <form class="premium-form" id="contactForm" x-data="contactForm()" @submit.prevent="submitForm">

          {{-- Name Field --}}
          <div class="form-field">
            <label for="contact-name" class="form-label">
              Full Name <span class="required">*</span>
            </label>
            <input
              type="text"
              id="contact-name"
              name="name"
              class="form-control"
              x-model="formData.name"
              required
              placeholder="John Doe"
              :class="{ 'has-error': errors.name }"
            >
            <span class="form-error" x-show="errors.name" x-text="errors.name" x-transition></span>
          </div>

          {{-- Email Field --}}
          <div class="form-field">
            <label for="contact-email" class="form-label">
              Email Address <span class="required">*</span>
            </label>
            <input
              type="email"
              id="contact-email"
              name="email"
              class="form-control"
              x-model="formData.email"
              required
              placeholder="john@company.com"
              :class="{ 'has-error': errors.email }"
            >
            <span class="form-error" x-show="errors.email" x-text="errors.email" x-transition></span>
          </div>

          {{-- Budget Range --}}
          <div class="form-field">
            <label for="contact-budget" class="form-label">
              Project Budget
            </label>
            <select
              id="contact-budget"
              name="budget"
              class="form-control"
              x-model="formData.budget"
            >
              <option value="">Select your budget range</option>
              <option value="5k-10k">$5,000 - $10,000</option>
              <option value="10k-25k">$10,000 - $25,000</option>
              <option value="25k-50k">$25,000 - $50,000</option>
              <option value="50k+">$50,000+</option>
            </select>
          </div>

          {{-- Message Field --}}
          <div class="form-field">
            <label for="contact-message" class="form-label">
              Project Details <span class="required">*</span>
            </label>
            <textarea
              id="contact-message"
              name="message"
              class="form-control form-textarea"
              x-model="formData.message"
              required
              rows="6"
              placeholder="Tell me about your project, goals, and timeline..."
              :class="{ 'has-error': errors.message }"
            ></textarea>
            <span class="form-error" x-show="errors.message" x-text="errors.message" x-transition></span>
          </div>

          {{-- Submit Button --}}
          <button
            type="submit"
            class="btn-premium"
            :disabled="loading"
            :class="{ 'is-loading': loading }"
          >
            <span x-show="!loading">Send Message</span>
            <span x-show="loading">
              <i class="fas fa-spinner fa-spin"></i> Sending...
            </span>
          </button>

          {{-- Success Message --}}
          <div class="form-success-message" x-show="success" x-transition>
            <div class="success-icon">
              <i class="fas fa-check-circle"></i>
            </div>
            <div class="success-content">
              <h4>Message Sent Successfully!</h4>
              <p>Thank you for reaching out. I'll get back to you within 24 hours.</p>
            </div>
          </div>

        </form>
      </div>

      {{-- FAQs COLUMN --}}
      <div class="contact-premium__faq-section">
        <div class="faq-header">
          <h3 class="faq-title">Frequently Asked Questions</h3>
          <p class="faq-subtitle">Quick answers to help you get started</p>
        </div>

        <div class="faq-accordion" x-data="{ activeIndex: 0 }">

          {{-- FAQ 1 --}}
          <div class="faq-item" :class="{ 'is-open': activeIndex === 0 }">
            <button
              class="faq-trigger"
              @click="activeIndex = activeIndex === 0 ? null : 0"
              :aria-expanded="activeIndex === 0"
            >
              <span class="faq-number">01</span>
              <span class="faq-question">What services do you offer?</span>
              <span class="faq-toggle">
                <i class="fas fa-plus"></i>
              </span>
            </button>
            <div class="faq-content" x-show="activeIndex === 0" x-collapse>
              <p>I specialize in end-to-end digital product development, including UI/UX design, front-end development, branding, and web applications. From initial concept to final deployment, I handle every aspect of bringing your digital vision to life.</p>
            </div>
          </div>

          {{-- FAQ 2 --}}
          <div class="faq-item" :class="{ 'is-open': activeIndex === 1 }">
            <button
              class="faq-trigger"
              @click="activeIndex = activeIndex === 1 ? null : 1"
              :aria-expanded="activeIndex === 1"
            >
              <span class="faq-number">02</span>
              <span class="faq-question">What's your typical project timeline?</span>
              <span class="faq-toggle">
                <i class="fas fa-plus"></i>
              </span>
            </button>
            <div class="faq-content" x-show="activeIndex === 1" x-collapse>
              <p>Project timelines vary based on scope and complexity. A simple website typically takes 3-4 weeks, while comprehensive web applications can range from 2-4 months. During our initial consultation, I'll provide a detailed timeline tailored to your specific needs.</p>
            </div>
          </div>

          {{-- FAQ 3 --}}
          <div class="faq-item" :class="{ 'is-open': activeIndex === 2 }">
            <button
              class="faq-trigger"
              @click="activeIndex = activeIndex === 2 ? null : 2"
              :aria-expanded="activeIndex === 2"
            >
              <span class="faq-number">03</span>
              <span class="faq-question">How do you price your projects?</span>
              <span class="faq-toggle">
                <i class="fas fa-plus"></i>
              </span>
            </button>
            <div class="faq-content" x-show="activeIndex === 2" x-collapse>
              <p>I offer transparent, value-based pricing tailored to each project's unique requirements. After understanding your goals and scope, I provide a detailed proposal with clear deliverables and milestones. Investment typically starts at $5,000 for smaller projects.</p>
            </div>
          </div>

          {{-- FAQ 4 --}}
          <div class="faq-item" :class="{ 'is-open': activeIndex === 3 }">
            <button
              class="faq-trigger"
              @click="activeIndex = activeIndex === 3 ? null : 3"
              :aria-expanded="activeIndex === 3"
            >
              <span class="faq-number">04</span>
              <span class="faq-question">Do you work with international clients?</span>
              <span class="faq-toggle">
                <i class="fas fa-plus"></i>
              </span>
            </button>
            <div class="faq-content" x-show="activeIndex === 3" x-collapse>
              <p>Absolutely! I've successfully collaborated with clients across multiple continents and time zones. Using modern communication tools and agile methodologies, I ensure seamless collaboration regardless of your location.</p>
            </div>
          </div>

          {{-- FAQ 5 --}}
          <div class="faq-item" :class="{ 'is-open': activeIndex === 4 }">
            <button
              class="faq-trigger"
              @click="activeIndex = activeIndex === 4 ? null : 4"
              :aria-expanded="activeIndex === 4"
            >
              <span class="faq-number">05</span>
              <span class="faq-question">What happens after project completion?</span>
              <span class="faq-toggle">
                <i class="fas fa-plus"></i>
              </span>
            </button>
            <div class="faq-content" x-show="activeIndex === 4" x-collapse>
              <p>I provide comprehensive documentation and training, plus optional ongoing support and maintenance packages. Whether you need occasional updates or continuous optimization, I'm committed to your long-term success.</p>
            </div>
          </div>

        </div>

        {{-- Contact Info --}}
        <div class="contact-info-card">
          <div class="contact-info-item">
            <i class="fas fa-envelope"></i>
            <div>
              <span class="contact-info-label">Email</span>
              <a href="mailto:hello@example.com" class="contact-info-value">hello@example.com</a>
            </div>
          </div>
          <div class="contact-info-item">
            <i class="fas fa-clock"></i>
            <div>
              <span class="contact-info-label">Response Time</span>
              <span class="contact-info-value">Within 24 hours</span>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</section>

{{-- Contact Form Alpine.js Component --}}
@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('contactForm', () => ({
    formData: {
      name: '',
      email: '',
      budget: '',
      message: ''
    },
    errors: {},
    loading: false,
    success: false,

    async submitForm() {
      this.errors = {}
      this.success = false
      this.loading = true

      // Client-side validation
      if (!this.formData.name.trim()) {
        this.errors.name = 'Name is required'
      }
      if (!this.formData.email.trim() || !this.isValidEmail(this.formData.email)) {
        this.errors.email = 'Valid email is required'
      }
      if (!this.formData.message.trim()) {
        this.errors.message = 'Message is required'
      }

      if (Object.keys(this.errors).length > 0) {
        this.loading = false
        return
      }

      // Simulate form submission (replace with actual AJAX call)
      setTimeout(() => {
        this.loading = false
        this.success = true

        // Reset form after 5 seconds
        setTimeout(() => {
          this.formData = { name: '', email: '', budget: '', message: '' }
          this.success = false
        }, 5000)

        console.log('✅ Form submitted:', this.formData)
      }, 1500)
    },

    isValidEmail(email) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    }
  }))
})
</script>
@endpush

@push('styles')
<style>
/* ===================================
   PREMIUM CONTACT SECTION
   =================================== */

.contact-premium {
  position: relative;
  min-height: 100vh;
  padding: clamp(80px, 12vw, 160px) 0;
  background: linear-gradient(
    135deg,
    var(--color-surface-base) 0%,
    var(--color-surface-raised) 100%
  );
  overflow: hidden;
}

.contact-premium::before {
  content: '';
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 100%;
  max-width: 1400px;
  height: 1px;
  background: linear-gradient(90deg,
    transparent 0%,
    var(--color-brand-primary) 50%,
    transparent 100%);
  opacity: 0.3;
}

.contact-premium__container {
  width: 100%;
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 clamp(20px, 5vw, 80px);
}

/* Section Header */
.contact-premium__header {
  text-align: center;
  margin-bottom: clamp(60px, 8vw, 100px);
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}

/* Split Layout */
.contact-premium__split {
  display: grid;
  grid-template-columns: 1fr;
  gap: clamp(40px, 6vw, 80px);
  align-items: start;
}

/* ===================================
   PREMIUM FORM STYLES
   =================================== */

.contact-premium__form-section {
  background: var(--color-surface-raised);
  border-radius: clamp(16px, 2vw, 24px);
  padding: clamp(32px, 5vw, 60px);
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.05);
}

.premium-form {
  width: 100%;
}

.form-field {
  margin-bottom: clamp(24px, 3vw, 32px);
}

.form-label {
  display: block;
  font-size: 14px;
  font-weight: 600;
  color: var(--color-text-primary);
  margin-bottom: 12px;
  letter-spacing: 0.3px;
}

.required {
  color: var(--color-brand-primary);
  margin-left: 2px;
}

.form-control {
  width: 100%;
  padding: 16px 20px;
  font-size: 15px;
  font-family: inherit;
  color: var(--color-text-primary);
  background: var(--color-surface-base);
  border: 2px solid transparent;
  border-radius: 12px;
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  outline: none;
}

.form-control:focus {
  border-color: var(--color-brand-primary);
  background: var(--color-surface-raised);
  box-shadow: 0 0 0 4px rgba(var(--color-brand-primary-rgb, 59, 130, 246), 0.1);
}

.form-control:hover:not(:focus) {
  border-color: rgba(255, 255, 255, 0.1);
}

.form-control.has-error {
  border-color: #ef4444;
}

.form-textarea {
  resize: vertical;
  min-height: 140px;
  line-height: 1.6;
}

.form-error {
  display: block;
  font-size: 13px;
  color: #ef4444;
  margin-top: 8px;
  font-weight: 500;
}

.btn-premium {
  width: 100%;
  padding: 18px 32px;
  font-size: 16px;
  font-weight: 600;
  color: white;
  background: linear-gradient(135deg, var(--color-brand-primary) 0%, #2563eb 100%);
  border: none;
  border-radius: 12px;
  cursor: pointer;
  transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
  letter-spacing: 0.5px;
}

.btn-premium:hover:not(:disabled) {
  transform: translateY(-2px);
  box-shadow: 0 12px 30px rgba(59, 130, 246, 0.4);
}

.btn-premium:active:not(:disabled) {
  transform: translateY(0);
}

.btn-premium:disabled {
  opacity: 0.7;
  cursor: not-allowed;
}

.btn-premium.is-loading {
  pointer-events: none;
}

.form-success-message {
  margin-top: 32px;
  padding: 24px;
  background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.05) 100%);
  border-radius: 12px;
  border: 1px solid rgba(16, 185, 129, 0.3);
  display: flex;
  gap: 16px;
  align-items: start;
}

.success-icon {
  flex-shrink: 0;
  width: 48px;
  height: 48px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(16, 185, 129, 0.2);
  border-radius: 50%;
}

.success-icon i {
  font-size: 24px;
  color: #10b981;
}

.success-content h4 {
  font-size: 16px;
  font-weight: 700;
  color: #10b981;
  margin-bottom: 4px;
}

.success-content p {
  font-size: 14px;
  color: var(--color-text-secondary);
  line-height: 1.5;
}

/* ===================================
   PREMIUM FAQ STYLES
   =================================== */

.contact-premium__faq-section {
  position: sticky;
  top: 100px;
}

.faq-header {
  margin-bottom: clamp(32px, 4vw, 48px);
}

.faq-title {
  font-size: clamp(24px, 3vw, 32px);
  font-weight: 700;
  line-height: 1.3;
  color: var(--color-text-primary);
  margin-bottom: 12px;
  letter-spacing: -0.01em;
}

.faq-subtitle {
  font-size: 16px;
  color: var(--color-text-secondary);
  line-height: 1.6;
}

.faq-accordion {
  border-radius: clamp(12px, 1.5vw, 16px);
  overflow: hidden;
  background: var(--color-surface-raised);
  border: 1px solid rgba(255, 255, 255, 0.05);
}

.faq-item {
  border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  transition: background 0.3s ease;
}

.faq-item:last-child {
  border-bottom: none;
}

.faq-item.is-open {
  background: rgba(255, 255, 255, 0.02);
}

.faq-trigger {
  width: 100%;
  display: flex;
  align-items: center;
  gap: 16px;
  padding: clamp(20px, 3vw, 28px);
  background: none;
  border: none;
  text-align: left;
  cursor: pointer;
  color: inherit;
  font-family: inherit;
  transition: padding 0.3s ease;
}

.faq-trigger:hover {
  background: rgba(255, 255, 255, 0.02);
}

.faq-number {
  flex-shrink: 0;
  font-size: 14px;
  font-weight: 700;
  color: var(--color-brand-primary);
  opacity: 0.6;
}

.faq-question {
  flex: 1;
  font-size: clamp(15px, 1.6vw, 17px);
  font-weight: 600;
  color: var(--color-text-primary);
  line-height: 1.4;
}

.faq-toggle {
  flex-shrink: 0;
  width: 32px;
  height: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 50%;
  transition: all 0.3s ease;
}

.faq-toggle i {
  font-size: 14px;
  color: var(--color-brand-primary);
  transition: transform 0.3s ease;
}

.faq-item.is-open .faq-toggle {
  background: var(--color-brand-primary);
}

.faq-item.is-open .faq-toggle i {
  color: white;
  transform: rotate(45deg);
}

.faq-content {
  padding: 0 clamp(20px, 3vw, 28px) clamp(20px, 3vw, 28px);
  padding-left: calc(clamp(20px, 3vw, 28px) + 30px); /* Align with question */
}

.faq-content p {
  font-size: 15px;
  line-height: 1.7;
  color: var(--color-text-secondary);
  margin: 0;
}

/* Contact Info Card */
.contact-info-card {
  margin-top: clamp(32px, 4vw, 48px);
  padding: clamp(24px, 3vw, 32px);
  background: var(--color-surface-raised);
  border-radius: clamp(12px, 1.5vw, 16px);
  border: 1px solid rgba(255, 255, 255, 0.05);
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.contact-info-item {
  display: flex;
  gap: 16px;
  align-items: start;
}

.contact-info-item i {
  flex-shrink: 0;
  width: 40px;
  height: 40px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.05);
  border-radius: 50%;
  color: var(--color-brand-primary);
  font-size: 16px;
}

.contact-info-label {
  display: block;
  font-size: 13px;
  font-weight: 600;
  color: var(--color-text-secondary);
  margin-bottom: 4px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.contact-info-value {
  display: block;
  font-size: 16px;
  font-weight: 600;
  color: var(--color-text-primary);
  text-decoration: none;
  transition: color 0.2s ease;
}

a.contact-info-value:hover {
  color: var(--color-brand-primary);
}

/* ===================================
   RESPONSIVE DESIGN
   =================================== */

/* Tablet and Desktop */
@media (min-width: 1024px) {
  .contact-premium__split {
    grid-template-columns: 1.2fr 1fr;
  }
}

/* Mobile Optimizations */
@media (max-width: 1023px) {
  .contact-premium__faq-section {
    position: static;
  }
}
</style>
@endpush
