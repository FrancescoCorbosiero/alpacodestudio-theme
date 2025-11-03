{{-- Mobile Navigation Toggle (Hamburger) --}}
<button class="mobile-nav-toggle" id="mobileNavToggle" aria-label="Toggle navigation">
  <span class="mobile-nav-toggle__line"></span>
  <span class="mobile-nav-toggle__line"></span>
  <span class="mobile-nav-toggle__line"></span>
</button>

{{-- Fullscreen Nav Overlay with Cool Animation! --}}
<div class="nav nav-overlay">
  <div class="nav__content">
    <ul class="nav__list">
      <li class="nav__list-item active-nav"><a href="/">Home</a></li>
      <li class="nav__list-item"><a href="#about">About</a></li>
      <li class="nav__list-item"><a href="#portfolio">Portfolio</a></li>
      <li class="nav__list-item"><a href="#contact">Contact</a></li>
    </ul>
  </div>
</div>

{{-- Modern Portfolio Grid Layout --}}
<div class="portfolio-grid">

  {{-- Sidebar --}}
  <aside class="portfolio-sidebar" id="portfolioSidebar" data-aos="fade-right">
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

    {{-- Content Column --}}
    <div class="portfolio-content">

      {{-- Hero Section --}}
      <section class="hero-section" data-aos="fade-up">
        <span class="text-caption" style="color: var(--color-brand-primary);">Digital Transformation - Made in Italy</span>
        <h1 class="heading-1" style="margin-top: var(--space-md);">IL WEB IN CONTINUO CAMBIAMENTO.</h1>
        <p class="body-large" style="margin-top: var(--space-md); color: var(--color-text-secondary);">
          Labore accusam in modo compungi, iacentem substantiales um se sed esse haec.
        </p>
        <a href="#contact" class="btn-primary" style="margin-top: var(--space-lg); display: inline-block;">Let's Talk</a>
      </section>

      {{-- About Section --}}
      <section class="about-section" style="margin-top: var(--space-3xl);" data-aos="fade-up" data-aos-delay="200">
        <span class="text-caption">BIODATA</span>
        <h2 class="heading-2" style="margin-top: var(--space-md);">Education</h2>

        <div class="timeline-item" style="margin-top: var(--space-lg); padding: var(--space-md); border-left: 2px solid var(--color-brand-primary);">
          <span class="text-caption">1998 - 2004</span>
          <h3 class="heading-5" style="margin-top: var(--space-xs);">Bachelors in Engineering in Information Technology</h3>
          <p class="body-normal" style="margin-top: var(--space-xs); color: var(--color-text-secondary);">Harvard School of Science and management</p>
        </div>

        <div class="timeline-item" style="margin-top: var(--space-md); padding: var(--space-md); border-left: 2px solid var(--color-brand-primary);">
          <span class="text-caption">2004 - 2006</span>
          <h3 class="heading-5" style="margin-top: var(--space-xs);">Masters in Data Analysis</h3>
          <p class="body-normal" style="margin-top: var(--space-xs); color: var(--color-text-secondary);">Harvard School of Science and management</p>
        </div>
      </section>

      {{-- Experience Section --}}
      <section class="experience-section" style="margin-top: var(--space-3xl);" data-aos="fade-up" data-aos-delay="300">
        <h2 class="heading-2">Experiences</h2>

        <div class="timeline-item" style="margin-top: var(--space-lg); padding: var(--space-md); border-left: 2px solid var(--color-brand-primary);">
          <span class="text-caption">2007 - 2012</span>
          <h3 class="heading-5" style="margin-top: var(--space-xs);">Creative Agency Inc.: Design head</h3>
          <p class="body-normal" style="margin-top: var(--space-xs); color: var(--color-text-secondary);">iacentem substantiales um se sed esse haec Possit facis qui a a a patriam.</p>
        </div>

        <div class="timeline-item" style="margin-top: var(--space-md); padding: var(--space-md); border-left: 2px solid var(--color-brand-primary);">
          <span class="text-caption">2013 - present</span>
          <h3 class="heading-5" style="margin-top: var(--space-xs);">Studio Alpha.: Project Manager</h3>
          <p class="body-normal" style="margin-top: var(--space-xs); color: var(--color-text-secondary);">iacentem substantiales um se sed esse haec Possit facis qui a a a patriam.</p>
        </div>
      </section>

      {{-- Portfolio Section --}}
      <section class="portfolio-section" style="margin-top: var(--space-3xl);" data-aos="fade-up" data-aos-delay="400">
        <span class="text-caption">some of my recent works</span>
        <h2 class="heading-2" style="margin-top: var(--space-md);">Portfolio</h2>

        <div class="portfolio-grid-items" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: var(--space-lg); margin-top: var(--space-lg);">
          <div class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
            <div class="portfolio-item__image" style="aspect-ratio: 4/3; background: var(--color-neutral-200); border-radius: var(--radius-md);"></div>
            <h4 class="heading-6" style="margin-top: var(--space-sm);">Project Title 1</h4>
            <span class="text-caption">Web Design</span>
          </div>

          <div class="portfolio-item" data-aos="fade-up" data-aos-delay="200">
            <div class="portfolio-item__image" style="aspect-ratio: 4/3; background: var(--color-neutral-200); border-radius: var(--radius-md);"></div>
            <h4 class="heading-6" style="margin-top: var(--space-sm);">Project Title 2</h4>
            <span class="text-caption">Branding</span>
          </div>

          <div class="portfolio-item" data-aos="fade-up" data-aos-delay="300">
            <div class="portfolio-item__image" style="aspect-ratio: 4/3; background: var(--color-neutral-200); border-radius: var(--radius-md);"></div>
            <h4 class="heading-6" style="margin-top: var(--space-sm);">Project Title 3</h4>
            <span class="text-caption">UI/UX</span>
          </div>
        </div>
      </section>

      {{-- Contact Section --}}
      <section class="contact-section" style="margin-top: var(--space-3xl); margin-bottom: var(--space-3xl);" data-aos="fade-up" data-aos-delay="500">
        <span class="text-caption">Personal Info</span>
        <h2 class="heading-2" style="margin-top: var(--space-md);">Contact Me</h2>
        <p class="body-large" style="margin-top: var(--space-md); color: var(--color-text-secondary);">
          Labore accusam in modo compungi, iacentem substantiales um se sed esse haec.
        </p>
        <a href="mailto:hello@yourwebsite.com" class="btn-primary" style="margin-top: var(--space-lg); display: inline-block;">Get in Touch</a>
      </section>

    </div>

    {{-- Skills Column (Desktop Only) --}}
    <aside class="portfolio-skills">
      <div class="skill-item" data-aos="fade-left" data-aos-delay="100">
        <span class="skill-item__number">01</span>
        <h3 class="skill-item__title">UI/UX Design</h3>
        <p class="skill-item__description">At in proin consequat ut cursus venenatis sapien.</p>
      </div>

      <div class="skill-item" data-aos="fade-left" data-aos-delay="200">
        <span class="skill-item__number">02</span>
        <h3 class="skill-item__title">Illustration</h3>
        <p class="skill-item__description">At in proin consequat ut cursus venenatis sapien.</p>
      </div>

      <div class="skill-item" data-aos="fade-left" data-aos-delay="300">
        <span class="skill-item__number">03</span>
        <h3 class="skill-item__title">Graphic Design</h3>
        <p class="skill-item__description">At in proin consequat ut cursus venenatis sapien.</p>
      </div>

      <a href="#portfolio" class="btn-primary" style="margin-top: var(--space-xl); width: 100%; text-align: center;" data-aos="fade-left" data-aos-delay="400">
        HIRE ME
      </a>
    </aside>

  </div>
</div>
