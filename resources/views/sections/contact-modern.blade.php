{{-- Premium Contact Section with FAQs --}}
<section class="contact-premium" id="contact">
  <div class="contact-premium__container">

    {{-- Section Header --}}
    <div class="contact-premium__header">
      <span class="contact-premium__eyebrow">Get In Touch</span>
      <h2 class="contact-premium__title">Let's Create Something Extraordinary</h2>
      <p class="contact-premium__description">
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
