{{-- Contact Modern Section - Split Viewport: Contact Form + FAQs --}}
<section class="contact-modern" id="contact">
  <div class="contact-modern__container">

    {{-- Contact Form Column --}}
    <div class="contact-modern__form-column" data-aos="fade-right">
      <div class="contact-form-wrapper">
        <span class="section-eyebrow">Get In Touch</span>
        <h2 class="section-title heading-2">Let's Work Together</h2>
        <p class="section-description body-large">
          Have a project in mind? Fill out the form and I'll get back to you within 24 hours.
        </p>

        <form class="contact-form" id="contactForm" x-data="contactForm()" @submit.prevent="submitForm">

          {{-- Name Field --}}
          <div class="form-group">
            <label for="contact-name" class="form-label">Your Name *</label>
            <input
              type="text"
              id="contact-name"
              name="name"
              class="form-input"
              x-model="formData.name"
              required
              placeholder="John Doe"
            >
            <span class="form-error" x-show="errors.name" x-text="errors.name"></span>
          </div>

          {{-- Email Field --}}
          <div class="form-group">
            <label for="contact-email" class="form-label">Email Address *</label>
            <input
              type="email"
              id="contact-email"
              name="email"
              class="form-input"
              x-model="formData.email"
              required
              placeholder="john@example.com"
            >
            <span class="form-error" x-show="errors.email" x-text="errors.email"></span>
          </div>

          {{-- Subject Field --}}
          <div class="form-group">
            <label for="contact-subject" class="form-label">Subject *</label>
            <input
              type="text"
              id="contact-subject"
              name="subject"
              class="form-input"
              x-model="formData.subject"
              required
              placeholder="Project Inquiry"
            >
            <span class="form-error" x-show="errors.subject" x-text="errors.subject"></span>
          </div>

          {{-- Message Field --}}
          <div class="form-group">
            <label for="contact-message" class="form-label">Message *</label>
            <textarea
              id="contact-message"
              name="message"
              class="form-textarea"
              x-model="formData.message"
              required
              rows="5"
              placeholder="Tell me about your project..."
            ></textarea>
            <span class="form-error" x-show="errors.message" x-text="errors.message"></span>
          </div>

          {{-- Submit Button --}}
          <button
            type="submit"
            class="btn-primary btn-full"
            :disabled="loading"
            x-text="loading ? 'Sending...' : 'Send Message'"
          >
            Send Message
          </button>

          {{-- Success Message --}}
          <div class="form-success" x-show="success" x-transition>
            <i class="fas fa-check-circle"></i>
            <span>Thank you! Your message has been sent successfully.</span>
          </div>

        </form>
      </div>
    </div>

    {{-- FAQs Column --}}
    <div class="contact-modern__faq-column" data-aos="fade-left">
      <div class="faq-wrapper">
        <span class="section-eyebrow">FAQs</span>
        <h2 class="section-title heading-2">Common Questions</h2>
        <p class="section-description body-large">
          Quick answers to questions you may have about working with me.
        </p>

        <div class="faq-list" x-data="{ activeIndex: 0 }">

          {{-- FAQ 1 --}}
          <div class="faq-item" :class="{ 'is-active': activeIndex === 0 }">
            <button
              class="faq-question"
              @click="activeIndex = activeIndex === 0 ? null : 0"
              :aria-expanded="activeIndex === 0"
            >
              <span>What services do you offer?</span>
              <i class="fas fa-chevron-down faq-icon"></i>
            </button>
            <div class="faq-answer" x-show="activeIndex === 0" x-collapse>
              <p>I specialize in UI/UX design, front-end development, and branding. From wireframes to fully functional websites, I handle the entire creative process to bring your vision to life.</p>
            </div>
          </div>

          {{-- FAQ 2 --}}
          <div class="faq-item" :class="{ 'is-active': activeIndex === 1 }">
            <button
              class="faq-question"
              @click="activeIndex = activeIndex === 1 ? null : 1"
              :aria-expanded="activeIndex === 1"
            >
              <span>How long does a typical project take?</span>
              <i class="fas fa-chevron-down faq-icon"></i>
            </button>
            <div class="faq-answer" x-show="activeIndex === 1" x-collapse>
              <p>Project timelines vary based on scope and complexity. A simple website might take 2-4 weeks, while complex web applications can take 2-3 months. I'll provide a detailed timeline during our initial consultation.</p>
            </div>
          </div>

          {{-- FAQ 3 --}}
          <div class="faq-item" :class="{ 'is-active': activeIndex === 2 }">
            <button
              class="faq-question"
              @click="activeIndex = activeIndex === 2 ? null : 2"
              :aria-expanded="activeIndex === 2"
            >
              <span>What is your pricing structure?</span>
              <i class="fas fa-chevron-down faq-icon"></i>
            </button>
            <div class="faq-answer" x-show="activeIndex === 2" x-collapse>
              <p>I offer both project-based pricing and hourly rates depending on your needs. After understanding your requirements, I'll provide a detailed quote with no hidden fees. Contact me for a free consultation.</p>
            </div>
          </div>

          {{-- FAQ 4 --}}
          <div class="faq-item" :class="{ 'is-active': activeIndex === 3 }">
            <button
              class="faq-question"
              @click="activeIndex = activeIndex === 3 ? null : 3"
              :aria-expanded="activeIndex === 3"
            >
              <span>Do you work with international clients?</span>
              <i class="fas fa-chevron-down faq-icon"></i>
            </button>
            <div class="faq-answer" x-show="activeIndex === 3" x-collapse>
              <p>Absolutely! I've worked with clients from all over the world. I'm comfortable working across different time zones and use modern collaboration tools to ensure smooth communication throughout the project.</p>
            </div>
          </div>

          {{-- FAQ 5 --}}
          <div class="faq-item" :class="{ 'is-active': activeIndex === 4 }">
            <button
              class="faq-question"
              @click="activeIndex = activeIndex === 4 ? null : 4"
              :aria-expanded="activeIndex === 4"
            >
              <span>What happens after the project is completed?</span>
              <i class="fas fa-chevron-down faq-icon"></i>
            </button>
            <div class="faq-answer" x-show="activeIndex === 4" x-collapse>
              <p>I provide ongoing support and maintenance packages to ensure your website stays up-to-date and secure. I'm also available for future updates, enhancements, or new features as your business grows.</p>
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
      subject: '',
      message: ''
    },
    errors: {},
    loading: false,
    success: false,

    async submitForm() {
      this.errors = {}
      this.success = false
      this.loading = true

      // Simple client-side validation
      if (!this.formData.name.trim()) {
        this.errors.name = 'Name is required'
      }
      if (!this.formData.email.trim() || !this.isValidEmail(this.formData.email)) {
        this.errors.email = 'Valid email is required'
      }
      if (!this.formData.subject.trim()) {
        this.errors.subject = 'Subject is required'
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

        // Reset form after 3 seconds
        setTimeout(() => {
          this.formData = { name: '', email: '', subject: '', message: '' }
          this.success = false
        }, 3000)

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
.contact-modern {
  min-height: 100vh;
  padding: var(--space-3xl) var(--space-lg);
  background: var(--color-surface-raised);
  display: flex;
  align-items: center;
}

.contact-modern__container {
  width: 100%;
  max-width: 1400px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr;
  gap: var(--space-3xl);
}

/* Mobile First - Stack columns */
.contact-modern__form-column,
.contact-modern__faq-column {
  padding: var(--space-xl);
}

.contact-form-wrapper,
.faq-wrapper {
  max-width: 600px;
}

/* Contact Form Styles */
.contact-form {
  margin-top: var(--space-xl);
}

.form-group {
  margin-bottom: var(--space-lg);
}

.form-label {
  display: block;
  font-size: var(--font-size-sm);
  font-weight: var(--font-weight-semibold);
  color: var(--color-text-primary);
  margin-bottom: var(--space-xs);
  text-transform: uppercase;
  letter-spacing: var(--letter-spacing-wide);
}

.form-input,
.form-textarea {
  width: 100%;
  padding: var(--space-md);
  font-size: var(--font-size-base);
  font-family: inherit;
  color: var(--color-text-primary);
  background: var(--color-surface-base);
  border: 2px solid transparent;
  border-radius: var(--border-radius-md);
  transition: all 0.3s ease;
}

.form-input:focus,
.form-textarea:focus {
  outline: none;
  border-color: var(--color-brand-primary);
  background: var(--color-surface-raised);
}

.form-textarea {
  resize: vertical;
  min-height: 120px;
}

.form-error {
  display: block;
  font-size: var(--font-size-sm);
  color: #ef4444;
  margin-top: var(--space-xs);
}

.btn-full {
  width: 100%;
  margin-top: var(--space-md);
}

.btn-primary:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

.form-success {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  padding: var(--space-md);
  margin-top: var(--space-lg);
  background: #10b981;
  color: white;
  border-radius: var(--border-radius-md);
  font-size: var(--font-size-sm);
  font-weight: var(--font-weight-semibold);
}

.form-success i {
  font-size: var(--font-size-lg);
}

/* FAQ Styles */
.faq-list {
  margin-top: var(--space-xl);
}

.faq-item {
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.faq-item:last-child {
  border-bottom: none;
}

.faq-question {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: var(--space-lg) 0;
  background: none;
  border: none;
  color: var(--color-text-primary);
  font-size: var(--font-size-base);
  font-weight: var(--font-weight-semibold);
  text-align: left;
  cursor: pointer;
  transition: color 0.3s ease;
}

.faq-question:hover {
  color: var(--color-brand-primary);
}

.faq-icon {
  font-size: var(--font-size-sm);
  color: var(--color-brand-primary);
  transition: transform 0.3s ease;
}

.faq-item.is-active .faq-icon {
  transform: rotate(180deg);
}

.faq-answer {
  overflow: hidden;
}

.faq-answer p {
  padding-bottom: var(--space-lg);
  color: var(--color-text-secondary);
  line-height: 1.7;
}

/* Tablet (768px+) - Side by side columns */
@media (min-width: 768px) {
  .contact-modern__container {
    grid-template-columns: 1fr 1fr;
  }

  .contact-modern__form-column {
    padding-right: var(--space-2xl);
    border-right: 1px solid rgba(255, 255, 255, 0.1);
  }

  .contact-modern__faq-column {
    padding-left: var(--space-2xl);
  }
}

/* Desktop (1024px+) - More padding */
@media (min-width: 1024px) {
  .contact-modern {
    padding: var(--space-4xl) var(--space-xl);
  }

  .contact-modern__form-column,
  .contact-modern__faq-column {
    padding: var(--space-2xl);
  }
}
</style>
@endpush
