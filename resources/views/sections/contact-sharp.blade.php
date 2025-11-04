{{-- Sharp Contact Form Section - Mobile First --}}
<section class="contact-section" id="contact-form">
  <div class="contact-section__container">

    <div class="contact-section__header">
      <h2 class="contact-section__title">Get In Touch</h2>
      <p class="contact-section__subtitle">Let's build something amazing together</p>
    </div>

    <form class="contact-form" x-data="sharpContactForm()" @submit.prevent="submitForm">

      <div class="form-row">
        <div class="form-group">
          <input
            type="text"
            id="name"
            name="name"
            class="form-input"
            placeholder="Your Name"
            x-model="formData.name"
            :class="{ 'error': errors.name }"
            required
          >
          <span class="form-error" x-show="errors.name" x-text="errors.name" x-transition></span>
        </div>

        <div class="form-group">
          <input
            type="email"
            id="email"
            name="email"
            class="form-input"
            placeholder="your@email.com"
            x-model="formData.email"
            :class="{ 'error': errors.email }"
            required
          >
          <span class="form-error" x-show="errors.email" x-text="errors.email" x-transition></span>
        </div>
      </div>

      <div class="form-group">
        <textarea
          id="message"
          name="message"
          class="form-textarea"
          placeholder="Tell me about your project..."
          rows="5"
          x-model="formData.message"
          :class="{ 'error': errors.message }"
          required
        ></textarea>
        <span class="form-error" x-show="errors.message" x-text="errors.message" x-transition></span>
      </div>

      <button
        type="submit"
        class="form-submit"
        :disabled="loading"
        :class="{ 'loading': loading }"
      >
        <span x-show="!loading">Send Message</span>
        <span x-show="loading">Sending...</span>
      </button>

      <div class="form-success" x-show="success" x-transition>
        ✓ Message sent successfully!
      </div>

    </form>

  </div>
</section>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('sharpContactForm', () => ({
    formData: {
      name: '',
      email: '',
      message: ''
    },
    errors: {},
    loading: false,
    success: false,

    async submitForm() {
      this.errors = {}
      this.success = false

      // Validate
      if (!this.formData.name.trim()) {
        this.errors.name = 'Name required'
      }
      if (!this.formData.email.trim() || !this.isValidEmail(this.formData.email)) {
        this.errors.email = 'Valid email required'
      }
      if (!this.formData.message.trim()) {
        this.errors.message = 'Message required'
      }

      if (Object.keys(this.errors).length > 0) {
        return
      }

      this.loading = true

      // Simulate send
      setTimeout(() => {
        this.loading = false
        this.success = true
        this.formData = { name: '', email: '', message: '' }

        setTimeout(() => {
          this.success = false
        }, 3000)
      }, 1000)
    },

    isValidEmail(email) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
    }
  }))
})
</script>
@endpush
