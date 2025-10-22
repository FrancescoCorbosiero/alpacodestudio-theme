{{--
  DIVINE Features Section

  Features:
  - Horizontal scroll on desktop (mouse wheel hijack)
  - Massive cards with gradient backgrounds
  - Parallax images/visuals
  - Auto-scroll navigation
  - Alpine.js powered smooth scrolling
--}}

<section
  class="features-divine"
  x-data="{
    currentIndex: 0,
    scrolling: false,
    features: [
      {
        title: 'Siti Web',
        subtitle: 'Professionali',
        description: 'Portfolio personali, landing page, siti vetrina. Design moderno, navigazione intuitiva, ottimizzati per tutti i dispositivi.',
        gradient: 'from-blue-500 to-purple-600',
        number: '01'
      },
      {
        title: 'Strumenti',
        subtitle: 'per Creator',
        description: 'Link in bio personalizzati, media kit digitali, dashboard analytics, portfolio che si aggiornano automaticamente.',
        gradient: 'from-purple-500 to-pink-600',
        number: '02'
      },
      {
        title: 'Soluzioni',
        subtitle: 'per Business',
        description: 'Prenotazioni online, e-commerce semplici, sistemi di gestione clienti, automazioni che fanno risparmiare tempo.',
        gradient: 'from-pink-500 to-red-600',
        number: '03'
      }
    ],
    scrollToFeature(index) {
      if (this.scrolling) return
      this.scrolling = true
      this.currentIndex = index

      const container = this.$refs.container
      const card = container.children[index]
      card.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' })

      setTimeout(() => { this.scrolling = false }, 800)
    },
    init() {
      // Horizontal scroll with mouse wheel
      const container = this.$refs.container
      container.addEventListener('wheel', (e) => {
        if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
          e.preventDefault()
          container.scrollLeft += e.deltaY
        }
      }, { passive: false })
    }
  }"
  aria-labelledby="features-divine-title"
>
  {{-- Section Header --}}
  <div class="features-divine__header">
    <p class="features-divine__eyebrow">I Nostri Servizi</p>
    <h2
      class="features-divine__title display-2"
      id="features-divine-title"
      x-data="{
        init() {
          const text = this.$el.textContent
          this.$el.innerHTML = splitText(text)
        }
      }"
    >
      Cosa Facciamo
    </h2>
  </div>

  {{-- Horizontal Scroll Container --}}
  <div class="features-divine__scroll-container" x-ref="container">
    <template x-for="(feature, index) in features" :key="index">
      <article
        class="feature-card-divine"
        :class="{ 'is-active': currentIndex === index }"
        @click="scrollToFeature(index)"
        x-data="tilt3D(8)"
        @mousemove="handleMove"
        @mouseleave="handleLeave"
        :style="style"
      >
        {{-- Background gradient --}}
        <div
          class="feature-card-divine__bg"
          :class="`bg-gradient-to-br ${feature.gradient}`"
        ></div>

        {{-- Number --}}
        <div class="feature-card-divine__number" x-text="feature.number"></div>

        {{-- Content --}}
        <div class="feature-card-divine__content">
          <h3 class="feature-card-divine__title">
            <span x-text="feature.title"></span>
            <span class="feature-card-divine__subtitle" x-text="feature.subtitle"></span>
          </h3>
          <p class="feature-card-divine__description" x-text="feature.description"></p>
          <a href="#" class="feature-card-divine__link">
            Scopri di più
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M5 12h14m0 0l-7-7m7 7l-7 7"/>
            </svg>
          </a>
        </div>

        {{-- Decorative elements --}}
        <div class="feature-card-divine__glow"></div>
      </article>
    </template>
  </div>

  {{-- Navigation dots --}}
  <div class="features-divine__nav">
    <template x-for="(feature, index) in features" :key="index">
      <button
        @click="scrollToFeature(index)"
        class="features-divine__dot"
        :class="{ 'is-active': currentIndex === index }"
        :aria-label="`View ${feature.title}`"
      ></button>
    </template>
  </div>

  {{-- Scroll hint --}}
  <div class="features-divine__hint" x-show="currentIndex === 0">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <path d="M5 12h14m0 0l-7-7m7 7l-7 7"/>
    </svg>
    <span>Scorri per esplorare</span>
  </div>
</section>
