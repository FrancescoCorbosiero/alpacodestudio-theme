{{-- Navigation Overlay Component --}}
<x-nav-overlay />

{{-- Portfolio Grid Layout --}}
<div class="portfolio-grid">

  {{-- Sidebar --}}
  <aside class="portfolio-sidebar" data-aos="fade-right">
    <a href="/" class="portfolio-sidebar__logo">Chris.</a>

    <p class="portfolio-sidebar__bio">
      OVER THE PAST DECADE I'VE WORKED WITH GLOBAL WEB TEMPLATE PROVIDERS, WEB AGENCIES AND ENTREPRENEURS.
      DESIGNED WORDPRESS AND E-COMMERCE TEMPLATES, CLIENT FACING WEB SITES, ADMIN INTERFACES, LOGO AND BRAND IDENTITY.
    </p>

    <div class="portfolio-sidebar__social">
      <a href="#" class="portfolio-sidebar__social-link" aria-label="Facebook">
        <i class="fab fa-facebook-f"></i> Facebook
      </a>
      <a href="#" class="portfolio-sidebar__social-link" aria-label="Twitter">
        <i class="fab fa-twitter"></i> Twitter
      </a>
      <a href="#" class="portfolio-sidebar__social-link" aria-label="Instagram">
        <i class="fab fa-instagram"></i> Instagram
      </a>
      <a href="#" class="portfolio-sidebar__social-link" aria-label="LinkedIn">
        <i class="fab fa-linkedin-in"></i> LinkedIn
      </a>
    </div>

    <div class="portfolio-sidebar__info">
      <p style="font-weight: 700; margin-bottom: 0.5rem;">UI/UX DESIGNER / ART DIRECTOR</p>
      <p>MYKOLAIV, UKRAINE</p>
    </div>
  </aside>

  {{-- Main Content Area --}}
  <div class="portfolio-main">

    {{-- Hero Content with Swiper Carousel --}}
    <div class="portfolio-content">

      {{-- Hero Swiper Carousel --}}
      <div class="hero-carousel" data-aos="fade-up">
        <div class="hero-swiper">
          <div class="swiper-wrapper">

            {{-- Slide 1 --}}
            <div class="swiper-slide">
              <div class="hero-slide">
                <span class="hero-slide__eyebrow">Digital Transformation - Made in Italy</span>
                <h1 class="hero-slide__title heading-1">IL WEB IN CONTINUO CAMBIAMENTO.</h1>
                <p class="hero-slide__description body-large">
                  Labore accusam in modo compungi, iacentem substantiales um se sed esse haec.
                </p>
                <a href="#contact" class="btn-primary" style="margin-top: var(--space-lg); display: inline-block;">Let's Talk</a>
              </div>
            </div>

            {{-- Slide 2 --}}
            <div class="swiper-slide">
              <div class="hero-slide">
                <span class="hero-slide__eyebrow">Web Designer / Developer</span>
                <h1 class="hero-slide__title heading-1">UX/UI OPTIMIZATION</h1>
                <p class="hero-slide__description body-large">
                  Creating beautiful, functional digital experiences that users love.
                </p>
                <a href="#portfolio" class="btn-primary" style="margin-top: var(--space-lg); display: inline-block;">View Work</a>
              </div>
            </div>

            {{-- Slide 3 --}}
            <div class="swiper-slide">
              <div class="hero-slide">
                <span class="hero-slide__eyebrow">Front-End Development</span>
                <h1 class="hero-slide__title heading-1">FULL STACK SOLUTIONS</h1>
                <p class="hero-slide__description body-large">
                  Modern, scalable applications built with cutting-edge technology.
                </p>
                <a href="#contact" class="btn-primary" style="margin-top: var(--space-lg); display: inline-block;">Get Started</a>
              </div>
            </div>

          </div>

          {{-- Navigation --}}
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

          {{-- Pagination --}}
          <div class="swiper-pagination"></div>
        </div>
      </div>

    </div>

    {{-- Skills Column (Desktop Only) --}}
    <aside class="portfolio-skills">
      <div class="skill-item" data-aos="fade-left" data-aos-delay="100">
        <span class="skill-item__number">01</span>
        <h3 class="skill-item__title">UI/UX Design</h3>
        <p class="skill-item__description">Creating intuitive and beautiful user experiences.</p>
      </div>

      <div class="skill-item" data-aos="fade-left" data-aos-delay="200">
        <span class="skill-item__number">02</span>
        <h3 class="skill-item__title">Development</h3>
        <p class="skill-item__description">Building modern, performant web applications.</p>
      </div>

      <div class="skill-item" data-aos="fade-left" data-aos-delay="300">
        <span class="skill-item__number">03</span>
        <h3 class="skill-item__title">Branding</h3>
        <p class="skill-item__description">Crafting memorable brand identities.</p>
      </div>

      <a href="#contact" class="btn-primary" style="margin-top: var(--space-xl); width: 100%; text-align: center;" data-aos="fade-left" data-aos-delay="400">
        HIRE ME
      </a>
    </aside>

  </div>
</div>

{{-- Initialize Hero Swiper --}}
@push('scripts')
<script>
// Wait for libraries to load, then initialize hero swiper
document.addEventListener('DOMContentLoaded', () => {
  // Small delay to ensure Swiper is fully loaded
  setTimeout(() => {
    if (typeof Swiper === 'undefined') {
      console.error('❌ Swiper not loaded');
      return;
    }

    try {
      const heroSwiper = new Swiper('.hero-swiper', {
        effect: 'fade',
        fadeEffect: {
          crossFade: true
        },
        speed: 1000,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        loop: false, // 3 slides - no loop needed
        navigation: {
          nextEl: '.hero-swiper .swiper-button-next',
          prevEl: '.hero-swiper .swiper-button-prev',
        },
        pagination: {
          el: '.hero-swiper .swiper-pagination',
          clickable: true,
        },
      });

      console.log('✅ Hero Swiper initialized');
    } catch (error) {
      console.error('❌ Hero Swiper initialization failed:', error);
    }
  }, 100);
});
</script>
@endpush

@push('styles')
<style>
.hero-carousel {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: center;
  z-index: 0; /* Ensure it doesn't overlay other columns */
}

.hero-swiper {
  width: 100%;
  max-width: 100%; /* Prevent overflow */
}

.hero-slide {
  padding: var(--space-lg) 0;
}

.hero-slide__eyebrow {
  display: block;
  font-size: var(--font-size-sm);
  color: var(--color-brand-primary);
  font-weight: var(--font-weight-semibold);
  text-transform: uppercase;
  letter-spacing: var(--letter-spacing-wide);
  margin-bottom: var(--space-md);
}

.hero-slide__title {
  margin-bottom: var(--space-md);
}

.hero-slide__description {
  color: var(--color-text-secondary);
  max-width: 600px;
}

/* Swiper Navigation Buttons - Clean & Modern with Icons */
.hero-swiper .swiper-button-prev,
.hero-swiper .swiper-button-next {
  width: 40px;
  height: 40px;
  background: rgba(255, 255, 255, 0.9);
  border-radius: 50%;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.hero-swiper .swiper-button-prev:hover,
.hero-swiper .swiper-button-next:hover {
  background: var(--color-brand-primary);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

/* Custom arrow icons using Unicode */
.hero-swiper .swiper-button-prev:after,
.hero-swiper .swiper-button-next:after {
  font-family: inherit;
  font-size: 18px;
  font-weight: bold;
  color: var(--color-brand-primary);
}

.hero-swiper .swiper-button-prev:after {
  content: '←';
}

.hero-swiper .swiper-button-next:after {
  content: '→';
}

.hero-swiper .swiper-button-prev:hover:after,
.hero-swiper .swiper-button-next:hover:after {
  color: white;
}

/* Position buttons inside the carousel */
.hero-swiper .swiper-button-prev {
  left: 10px;
}

.hero-swiper .swiper-button-next {
  right: 10px;
}

/* Pagination Dots */
.hero-swiper .swiper-pagination-bullet {
  background: var(--color-brand-primary);
  opacity: 0.3;
  width: 10px;
  height: 10px;
  transition: all 0.3s ease;
}

.hero-swiper .swiper-pagination-bullet-active {
  opacity: 1;
  width: 24px;
  border-radius: 5px;
}

/* Mobile - COMPLETELY REMOVE navigation buttons */
@media (max-width: 768px) {
  .hero-carousel {
    min-height: 50vh;
  }

  .hero-slide {
    padding: var(--space-md) 0;
  }

  .hero-swiper .swiper-button-prev,
  .hero-swiper .swiper-button-next {
    display: none !important;
    visibility: hidden;
    pointer-events: none;
  }
}

/* Desktop - Show buttons only on hover for cleaner look */
@media (min-width: 769px) {
  .hero-swiper .swiper-button-prev,
  .hero-swiper .swiper-button-next {
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .hero-swiper:hover .swiper-button-prev,
  .hero-swiper:hover .swiper-button-next {
    opacity: 1;
  }
}
</style>
@endpush
