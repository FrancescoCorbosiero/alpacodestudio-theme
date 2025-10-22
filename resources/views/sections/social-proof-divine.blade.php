{{--
  DIVINE Social Proof Section

  Features:
  - Auto-rotating 3D testimonial carousel
  - Glassmorphic cards with depth
  - Star ratings with animated fills
  - Client logos with hover effects
  - Alpine.js powered auto-play
--}}

<section class="social-proof-divine" aria-labelledby="testimonials-title">
  {{-- Section Header --}}
  <div class="social-proof-divine__header">
    <span class="social-proof-divine__eyebrow">Recensioni</span>
    <h2 class="social-proof-divine__title hero-2" id="testimonials-title">
      Cosa Dicono <span class="text-gradient">I Nostri Clienti</span>
    </h2>
  </div>

  {{-- 3D Carousel Container --}}
  <div
    class="testimonial-carousel"
    x-data="{
      currentIndex: 0,
      isPlaying: true,
      interval: null,
      testimonials: [
        {
          name: 'Marco Rossi',
          role: 'CEO, Studio Legale Rossi',
          avatar: 'https://i.pravatar.cc/150?img=12',
          rating: 5,
          text: 'Finalmente un team che parla chiaro. Sito fatto in una settimana, prezzi onesti, zero stress. Consigliato!'
        },
        {
          name: 'Laura Bianchi',
          role: 'Fondatrice, Atelier Bianchi',
          avatar: 'https://i.pravatar.cc/150?img=45',
          rating: 5,
          text: 'Il mio sito è esattamente come lo volevo. Design elegante, veloce, e il supporto è sempre stato disponibile.'
        },
        {
          name: 'Giuseppe Verdi',
          role: 'Proprietario, Ristorante Da Giuseppe',
          avatar: 'https://i.pravatar.cc/150?img=33',
          rating: 5,
          text: 'Non capisco molto di tecnologia, ma loro mi hanno aiutato in ogni passo. Ora ho un sito professionale senza complicazioni.'
        },
        {
          name: 'Sofia Romano',
          role: 'Fotografa Freelance',
          avatar: 'https://i.pravatar.cc/150?img=27',
          rating: 5,
          text: 'Portfolio fantastico! Le mie foto sono valorizzate al massimo. Clienti sempre impressionati quando vedono il sito.'
        },
        {
          name: 'Andrea Conti',
          role: 'Personal Trainer',
          avatar: 'https://i.pravatar.cc/150?img=51',
          rating: 5,
          text: 'Sistema di prenotazioni integrato perfettamente. I miei clienti prenotano online senza problemi. Top!'
        }
      ],
      init() {
        this.startAutoplay()
      },
      startAutoplay() {
        if (this.interval) clearInterval(this.interval)
        this.interval = setInterval(() => {
          if (this.isPlaying) this.next()
        }, 5000)
      },
      next() {
        this.currentIndex = (this.currentIndex + 1) % this.testimonials.length
      },
      prev() {
        this.currentIndex = (this.currentIndex - 1 + this.testimonials.length) % this.testimonials.length
      },
      goTo(index) {
        this.currentIndex = index
      },
      getCardStyle(index) {
        const diff = index - this.currentIndex
        const total = this.testimonials.length

        // Normalize diff to -2, -1, 0, 1, 2
        let normalizedDiff = diff
        if (Math.abs(diff) > 2) {
          if (diff > 0) normalizedDiff = diff - total
          else normalizedDiff = diff + total
        }

        const isActive = normalizedDiff === 0
        const translateX = normalizedDiff * 110
        const translateZ = isActive ? 0 : -200
        const rotateY = normalizedDiff * 15
        const opacity = Math.abs(normalizedDiff) <= 1 ? 1 : 0
        const scale = isActive ? 1 : 0.8
        const zIndex = isActive ? 10 : 5 - Math.abs(normalizedDiff)

        return {
          transform: \`translate3d(\${translateX}%, 0, \${translateZ}px) rotateY(\${rotateY}deg) scale(\${scale})\`,
          opacity: opacity,
          zIndex: zIndex
        }
      }
    }"
    @mouseenter="isPlaying = false"
    @mouseleave="isPlaying = true"
  >
    <div class="testimonial-carousel__stage">
      {{-- Testimonial Cards --}}
      <template x-for="(testimonial, index) in testimonials" :key="index">
        <article
          class="testimonial-card-divine"
          :class="{ 'is-active': index === currentIndex }"
          :style="getCardStyle(index)"
        >
          {{-- Glassmorphic Background --}}
          <div class="testimonial-card-divine__glass"></div>

          {{-- Content --}}
          <div class="testimonial-card-divine__content">
            {{-- Stars --}}
            <div class="testimonial-card-divine__stars" role="img" :aria-label="`${testimonial.rating} stars`">
              <template x-for="star in 5">
                <svg
                  class="star"
                  :class="{ 'is-filled': star <= testimonial.rating }"
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                >
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
              </template>
            </div>

            {{-- Quote --}}
            <blockquote class="testimonial-card-divine__quote">
              <p x-text="testimonial.text"></p>
            </blockquote>

            {{-- Author --}}
            <div class="testimonial-card-divine__author">
              <div class="testimonial-card-divine__avatar-wrapper">
                <img
                  :src="testimonial.avatar"
                  :alt="testimonial.name"
                  class="testimonial-card-divine__avatar"
                  loading="lazy"
                  width="60"
                  height="60"
                />
                <div class="testimonial-card-divine__avatar-glow"></div>
              </div>
              <div class="testimonial-card-divine__author-info">
                <cite class="testimonial-card-divine__name" x-text="testimonial.name"></cite>
                <p class="testimonial-card-divine__role" x-text="testimonial.role"></p>
              </div>
            </div>
          </div>
        </article>
      </template>
    </div>

    {{-- Navigation --}}
    <div class="testimonial-carousel__nav">
      <button
        @click="prev"
        class="carousel-nav-btn carousel-nav-btn--prev"
        aria-label="Previous testimonial"
      >
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M15 18l-6-6 6-6"/>
        </svg>
      </button>

      <div class="carousel-dots">
        <template x-for="(testimonial, index) in testimonials" :key="index">
          <button
            @click="goTo(index)"
            class="carousel-dot"
            :class="{ 'is-active': index === currentIndex }"
            :aria-label="`Go to testimonial ${index + 1}`"
          ></button>
        </template>
      </div>

      <button
        @click="next"
        class="carousel-nav-btn carousel-nav-btn--next"
        aria-label="Next testimonial"
      >
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M9 18l6-6-6-6"/>
        </svg>
      </button>
    </div>
  </div>

  {{-- Client Logos Grid --}}
  <div class="client-logos">
    <p class="client-logos__title">Ci fidano anche:</p>
    <div
      class="client-logos__grid"
      x-data="stagger(100)"
      x-init="init()"
    >
      {{-- Placeholder logos - replace with real client logos --}}
      <div
        class="client-logo"
        x-data="revealOnScroll()"
        x-show="visible"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 transform scale-80"
        x-transition:enter-end="opacity-100 transform scale-100"
      >
        <svg viewBox="0 0 120 40" class="client-logo__svg">
          <text x="10" y="25" font-family="Arial, sans-serif" font-weight="bold" font-size="16" fill="currentColor">
            CLIENTE
          </text>
        </svg>
      </div>

      <div
        class="client-logo"
        x-data="revealOnScroll()"
        x-show="visible"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 transform scale-80"
        x-transition:enter-end="opacity-100 transform scale-100"
      >
        <svg viewBox="0 0 120 40" class="client-logo__svg">
          <text x="15" y="25" font-family="Arial, sans-serif" font-weight="bold" font-size="16" fill="currentColor">
            BRAND
          </text>
        </svg>
      </div>

      <div
        class="client-logo"
        x-data="revealOnScroll()"
        x-show="visible"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 transform scale-80"
        x-transition:enter-end="opacity-100 transform scale-100"
      >
        <svg viewBox="0 0 120 40" class="client-logo__svg">
          <text x="10" y="25" font-family="Arial, sans-serif" font-weight="bold" font-size="16" fill="currentColor">
            AZIENDA
          </text>
        </svg>
      </div>

      <div
        class="client-logo"
        x-data="revealOnScroll()"
        x-show="visible"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 transform scale-80"
        x-transition:enter-end="opacity-100 transform scale-100"
      >
        <svg viewBox="0 0 120 40" class="client-logo__svg">
          <text x="15" y="25" font-family="Arial, sans-serif" font-weight="bold" font-size="16" fill="currentColor">
            STUDIO
          </text>
        </svg>
      </div>

      <div
        class="client-logo"
        x-data="revealOnScroll()"
        x-show="visible"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 transform scale-80"
        x-transition:enter-end="opacity-100 transform scale-100"
      >
        <svg viewBox="0 0 120 40" class="client-logo__svg">
          <text x="20" y="25" font-family="Arial, sans-serif" font-weight="bold" font-size="16" fill="currentColor">
            SHOP
          </text>
        </svg>
      </div>

      <div
        class="client-logo"
        x-data="revealOnScroll()"
        x-show="visible"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 transform scale-80"
        x-transition:enter-end="opacity-100 transform scale-100"
      >
        <svg viewBox="0 0 120 40" class="client-logo__svg">
          <text x="10" y="25" font-family="Arial, sans-serif" font-weight="bold" font-size="16" fill="currentColor">
            PARTNER
          </text>
        </svg>
      </div>
    </div>
  </div>
</section>
