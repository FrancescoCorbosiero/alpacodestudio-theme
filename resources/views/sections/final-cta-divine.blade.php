{{--
  DIVINE Final CTA Section

  Features:
  - Magnetic cursor following
  - Particle animation background
  - Glassmorphic design
  - Large compelling headline
  - Multiple CTA options
  - Trust indicators
--}}

<section
  class="final-cta-divine"
  aria-labelledby="final-cta-title"
  x-data="{
    particles: Array.from({ length: 30 }, (_, i) => ({
      id: i,
      x: Math.random() * 100,
      y: Math.random() * 100,
      size: Math.random() * 4 + 2,
      duration: Math.random() * 20 + 10,
      delay: Math.random() * 5
    }))
  }"
>
  {{-- Animated Background Particles --}}
  <div class="final-cta-divine__particles" aria-hidden="true">
    <template x-for="particle in particles" :key="particle.id">
      <div
        class="particle"
        :style="`
          left: ${particle.x}%;
          top: ${particle.y}%;
          width: ${particle.size}px;
          height: ${particle.size}px;
          animation-duration: ${particle.duration}s;
          animation-delay: ${particle.delay}s;
        `"
      ></div>
    </template>
  </div>

  {{-- Gradient Blob Background --}}
  <div class="final-cta-divine__blob final-cta-divine__blob--1" aria-hidden="true"></div>
  <div class="final-cta-divine__blob final-cta-divine__blob--2" aria-hidden="true"></div>
  <div class="final-cta-divine__blob final-cta-divine__blob--3" aria-hidden="true"></div>

  {{-- Main Container --}}
  <div class="final-cta-divine__container">
    {{-- Glassmorphic Card --}}
    <div
      class="final-cta-divine__card"
      x-data="{ ...tilt3D(5), ...revealOnScroll() }"
      x-show="visible"
      x-transition:enter="transition ease-out duration-1200"
      x-transition:enter-start="opacity-0 transform translate-y-20 scale-95"
      x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
      @mousemove="handleMove"
      @mouseleave="handleLeave"
      :style="style"
    >
      {{-- Glassmorphic Background --}}
      <div class="final-cta-divine__glass"></div>

      {{-- Content --}}
      <div class="final-cta-divine__content">
        {{-- Eyebrow --}}
        <span class="final-cta-divine__eyebrow">Pronto per Iniziare?</span>

        {{-- Main Headline --}}
        <h2 class="final-cta-divine__title hero-2" id="final-cta-title">
          Trasforma la tua <span class="text-gradient">visione digitale</span> in realtà
        </h2>

        {{-- Subheadline --}}
        <p class="final-cta-divine__subtitle">
          Unisciti a oltre 50 professionisti e piccole imprese che hanno scelto Alpacode Studio per il loro sito web.
        </p>

        {{-- CTA Buttons --}}
        <div class="final-cta-divine__actions">
          <a
            href="/contact"
            class="cta-button cta-button--primary"
            x-data="magneticButton(0.5)"
            @mousemove="handleMove"
            @mouseleave="handleLeave"
            :style="style"
          >
            <span>Richiedi Preventivo Gratuito</span>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M5 12h14m-7-7l7 7-7 7"/>
            </svg>
            <span class="cta-button__glow"></span>
          </a>

          <a
            href="/pricing"
            class="cta-button cta-button--ghost"
            x-data="magneticButton(0.4)"
            @mousemove="handleMove"
            @mouseleave="handleLeave"
            :style="style"
          >
            <span>Vedi i Pacchetti</span>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"/>
              <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/>
              <path d="M12 18V6"/>
            </svg>
          </a>
        </div>

        {{-- Trust Indicators --}}
        <div class="final-cta-divine__trust">
          <div class="trust-item">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="20 6 9 17 4 12"/>
            </svg>
            <span>Consegna in 7 giorni</span>
          </div>
          <div class="trust-item">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="20 6 9 17 4 12"/>
            </svg>
            <span>Garanzia 30 giorni</span>
          </div>
          <div class="trust-item">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="20 6 9 17 4 12"/>
            </svg>
            <span>Supporto incluso</span>
          </div>
        </div>

        {{-- Social Proof Mini Stats --}}
        <div class="final-cta-divine__stats">
          <div class="mini-stat" x-data="countUp(50, 2000)">
            <span class="mini-stat__number" x-text="display + '+'"></span>
            <span class="mini-stat__label">Clienti Felici</span>
          </div>
          <div class="mini-stat" x-data="countUp(95, 2000)">
            <span class="mini-stat__number" x-text="display + '%'"></span>
            <span class="mini-stat__label">Soddisfazione</span>
          </div>
          <div class="mini-stat" x-data="countUp(4, 1500)">
            <span class="mini-stat__number" x-text="display + '.9'"></span>
            <span class="mini-stat__label">Rating Medio</span>
          </div>
        </div>

        {{-- Contact Alternatives --}}
        <div class="final-cta-divine__contact">
          <p class="contact-text">Preferisci parlare direttamente?</p>
          <div class="contact-links">
            <a href="mailto:info@alpacodestudio.it" class="contact-link">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="2" y="4" width="20" height="16" rx="2"/>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
              </svg>
              info@alpacodestudio.it
            </a>
            <a href="https://wa.me/393281234567" class="contact-link" target="_blank" rel="noopener">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
              </svg>
              WhatsApp
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Decorative Elements --}}
  <div class="final-cta-divine__decoration" aria-hidden="true">
    <div class="decoration-circle decoration-circle--1"></div>
    <div class="decoration-circle decoration-circle--2"></div>
    <div class="decoration-circle decoration-circle--3"></div>
  </div>
</section>
