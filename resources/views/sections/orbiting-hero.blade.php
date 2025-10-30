{{-- Orbiting Hero - Orbit-Focused Design --}}
<section id="about" class="orbiting-hero" aria-label="Chi Siamo">
  <div class="wrapper">
    {{-- Centered Orbiting System - The Star of the Show --}}
    <div class="orbiting-hero__container">

      {{-- Center Core (Big and Prominent) --}}
      <div class="orbit-system__core">
        <div class="orbit-core__logo">
          <img src="{{ Vite::asset('resources/images/logo.png') }}"
               alt="Alpacode Studio"
               class="orbit-core__image">
          <div class="orbit-core__glow" aria-hidden="true"></div>
        </div>
      </div>

      {{-- Orbit Ring 1 (Inner) --}}
      <div class="orbit-system__ring orbit-ring--1" data-orbit="1">
        <div class="orbit-ring__item" data-angle="0" data-service="web-design">
          <div class="orbit-item__badge">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
            </svg>
            <span class="orbit-item__label">Web Design</span>
          </div>
          <div class="orbit-item__tooltip">Design moderno e responsive</div>
        </div>
        <div class="orbit-ring__item" data-angle="90" data-service="development">
          <div class="orbit-item__badge">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <path d="M16 18l6-6-6-6M8 6l-6 6 6 6"/>
            </svg>
            <span class="orbit-item__label">Sviluppo</span>
          </div>
          <div class="orbit-item__tooltip">Codice pulito e performante</div>
        </div>
        <div class="orbit-ring__item" data-angle="180" data-service="seo">
          <div class="orbit-item__badge">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
            </svg>
            <span class="orbit-item__label">SEO</span>
          </div>
          <div class="orbit-item__tooltip">Prima pagina su Google</div>
        </div>
        <div class="orbit-ring__item" data-angle="270" data-service="performance">
          <div class="orbit-item__badge">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
            </svg>
            <span class="orbit-item__label">Performance</span>
          </div>
          <div class="orbit-item__tooltip">Siti velocissimi</div>
        </div>
      </div>

      {{-- Orbit Ring 2 (Middle) --}}
      <div class="orbit-system__ring orbit-ring--2" data-orbit="2">
        <div class="orbit-ring__item" data-angle="45" data-service="ecommerce">
          <div class="orbit-item__badge orbit-item__badge--secondary">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/>
            </svg>
            <span class="orbit-item__label">E-commerce</span>
          </div>
          <div class="orbit-item__tooltip">Vendi online facilmente</div>
        </div>
        <div class="orbit-ring__item" data-angle="135" data-service="booking">
          <div class="orbit-item__badge orbit-item__badge--secondary">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
            </svg>
            <span class="orbit-item__label">Booking</span>
          </div>
          <div class="orbit-item__tooltip">Prenotazioni automatiche</div>
        </div>
        <div class="orbit-ring__item" data-angle="225" data-service="portfolio">
          <div class="orbit-item__badge orbit-item__badge--secondary">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/>
            </svg>
            <span class="orbit-item__label">Portfolio</span>
          </div>
          <div class="orbit-item__tooltip">Mostra i tuoi lavori</div>
        </div>
        <div class="orbit-ring__item" data-angle="315" data-service="blog">
          <div class="orbit-item__badge orbit-item__badge--secondary">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><path d="M14 2v6h6M16 13H8M16 17H8M10 9H8"/>
            </svg>
            <span class="orbit-item__label">Blog</span>
          </div>
          <div class="orbit-item__tooltip">Condividi contenuti</div>
        </div>
      </div>

      {{-- Orbit Ring 3 (Outer) --}}
      <div class="orbit-system__ring orbit-ring--3" data-orbit="3">
        <div class="orbit-ring__item" data-angle="0" data-service="support">
          <div class="orbit-item__badge orbit-item__badge--tertiary">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <path d="M3 11h3a2 2 0 012 2v3a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a9 9 0 0118 0v5a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3"/>
            </svg>
            <span class="orbit-item__label">Supporto</span>
          </div>
          <div class="orbit-item__tooltip">Sempre al tuo fianco</div>
        </div>
        <div class="orbit-ring__item" data-angle="90" data-service="hosting">
          <div class="orbit-item__badge orbit-item__badge--tertiary">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <path d="M18 10h-1.26A8 8 0 109 20h9a5 5 0 000-10z"/>
            </svg>
            <span class="orbit-item__label">Hosting</span>
          </div>
          <div class="orbit-item__tooltip">Veloce e sicuro</div>
        </div>
        <div class="orbit-ring__item" data-angle="180" data-service="analytics">
          <div class="orbit-item__badge orbit-item__badge--tertiary">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/>
            </svg>
            <span class="orbit-item__label">Analytics</span>
          </div>
          <div class="orbit-item__tooltip">Monitora i risultati</div>
        </div>
        <div class="orbit-ring__item" data-angle="270" data-service="security">
          <div class="orbit-item__badge orbit-item__badge--tertiary">
            <svg class="orbit-item__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
              <path d="M12 2L3 7v6c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V7l-9-5z"/>
            </svg>
            <span class="orbit-item__label">Security</span>
          </div>
          <div class="orbit-item__tooltip">Protezione completa</div>
        </div>
      </div>

      {{-- Connection Lines SVG Canvas --}}
      <svg class="orbit-system__connections" aria-hidden="true" preserveAspectRatio="xMidYMid meet">
        <defs>
          <linearGradient id="orbitLineGradient" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" stop-color="var(--color-brand-primary)" stop-opacity="0">
              <animate attributeName="stop-opacity" values="0;0.6;0" dur="2s" repeatCount="indefinite" />
            </stop>
            <stop offset="50%" stop-color="var(--color-brand-primary)" stop-opacity="0.8" />
            <stop offset="100%" stop-color="var(--color-brand-secondary)" stop-opacity="0">
              <animate attributeName="stop-opacity" values="0;0.4;0" dur="2s" repeatCount="indefinite" />
            </stop>
          </linearGradient>
          <filter id="orbitGlow" x="-50%" y="-50%" width="200%" height="200%">
            <feGaussianBlur in="SourceGraphic" stdDeviation="4" result="blur" />
            <feComposite in="SourceGraphic" in2="blur" operator="over" />
          </filter>
        </defs>
      </svg>

      {{-- Particle effects --}}
      <div class="orbit-system__particles" aria-hidden="true"></div>

    </div>
  </div>
</section>

{{--
  Orbit-Focused Hero Section
  ──────────────────────────
  Features:
  - Centered orbital system as the main attraction
  - Big prominent core with epic animations
  - 3 orbital rings with fully visible badges (icons + labels)
  - 12 services distributed evenly across rings
  - Dynamic connection lines and particle effects
  - Clean, simplified design focused on the orbit visualization
  - Fully responsive and accessible

  Styles: /resources/css/sections/_orbiting-hero.css
  JavaScript: /resources/js/sections/orbiting-hero.js
--}}
