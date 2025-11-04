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
      <p>Test</p>
    </div>

    {{-- Skills Column (Desktop Only) --}}
    <!--
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
    </aside> -->

  </div>
</div>

{{-- Initialize Hero Swiper --}}
@push('scripts')

@endpush

@push('styles')

@endpush
