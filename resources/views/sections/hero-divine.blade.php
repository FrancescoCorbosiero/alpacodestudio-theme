{{--
  DIVINE Hero Section

  Features:
  - MASSIVE fluid typography (60px → 180px)
  - Split text character animation
  - Mouse-following gradient blob
  - Morphing background shapes
  - Parallax layers
  - Alpine.js powered interactivity
--}}

<section
  class="hero-divine"
  x-data="{
    mouseX: 0,
    mouseY: 0,
    init() {
      this.$el.addEventListener('mousemove', (e) => {
        const rect = this.$el.getBoundingClientRect()
        this.mouseX = ((e.clientX - rect.left) / rect.width) * 100
        this.mouseY = ((e.clientY - rect.top) / rect.height) * 100
      })
    }
  }"
  role="banner"
  aria-label="Hero section"
>
  {{-- Mouse-following gradient blob --}}
  <div
    class="hero-divine__blob"
    :style="`left: ${mouseX}%; top: ${mouseY}%`"
    aria-hidden="true"
  ></div>

  {{-- Morphing background shapes --}}
  <div class="hero-divine__shapes" aria-hidden="true">
    <div class="shape shape--1" x-data="parallax(0.3)" :style="style"></div>
    <div class="shape shape--2" x-data="parallax(0.5)" :style="style"></div>
    <div class="shape shape--3" x-data="parallax(0.7)" :style="style"></div>
  </div>

  {{-- Content --}}
  <div class="hero-divine__content">
    {{-- Eyebrow with fade-in --}}
    <p
      class="hero-divine__eyebrow"
      x-data="revealOnScroll()"
      x-show="visible"
      x-transition:enter="transition ease-out duration-700"
      x-transition:enter-start="opacity-0 transform translate-y-4"
      x-transition:enter-end="opacity-100 transform translate-y-0"
    >
      Web Development • 2025
    </p>

    {{-- MASSIVE headline with split text animation --}}
    <h1
      class="hero-divine__title hero-1 text-gradient"
      x-data="{
        init() {
          // Split text for character animation
          const text = this.$el.textContent
          this.$el.innerHTML = splitText(text)
        }
      }"
    >
      Il tuo talento merita un sito professionale
    </h1>

    {{-- Subheadline with stagger --}}
    <p
      class="hero-divine__subtitle hero-3"
      x-data="revealOnScroll()"
      x-show="visible"
      x-transition:enter="transition ease-out duration-1000 delay-500"
      x-transition:enter-start="opacity-0 transform translate-y-8"
      x-transition:enter-end="opacity-100 transform translate-y-0"
    >
      Creiamo siti web. <span class="text-gradient">Bene, semplice.</span>
    </p>

    {{-- CTA with magnetic effect --}}
    <div
      class="hero-divine__cta"
      x-data="revealOnScroll()"
      x-show="visible"
      x-transition:enter="transition ease-out duration-1000 delay-700"
      x-transition:enter-start="opacity-0 transform translate-y-8 scale-95"
      x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
    >
      <a
        href="/contact"
        class="button-divine button-divine--primary"
        x-data="magneticButton(0.4)"
        @mousemove="handleMove"
        @mouseleave="handleLeave"
        :style="style"
      >
        <span class="button-divine__text">Inizia Ora</span>
        <span class="button-divine__glow"></span>
      </a>

      <a
        href="/pricing"
        class="button-divine button-divine--ghost"
        x-data="magneticButton(0.3)"
        @mousemove="handleMove"
        @mouseleave="handleLeave"
        :style="style"
      >
        Vedi i Prezzi
      </a>
    </div>

    {{-- Trust indicators with count-up animation --}}
    <div
      class="hero-divine__stats"
      x-data="revealOnScroll()"
      x-show="visible"
      x-transition:enter="transition ease-out duration-1000 delay-1000"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
    >
      <div class="stat" x-data="countUp(50, 2000)">
        <span class="stat__number" x-text="display + '+'"></span>
        <span class="stat__label">Progetti</span>
      </div>
      <div class="stat" x-data="countUp(95, 2000)">
        <span class="stat__number" x-text="display + '%'"></span>
        <span class="stat__label">Soddisfazione</span>
      </div>
      <div class="stat">
        <span class="stat__number">&lt;1</span>
        <span class="stat__label">Settimana</span>
      </div>
    </div>
  </div>

  {{-- Scroll indicator with bounce --}}
  <div class="hero-divine__scroll" aria-hidden="true">
    <svg class="scroll-arrow" viewBox="0 0 24 24">
      <path d="M12 5v14m0 0l-7-7m7 7l7-7"/>
    </svg>
  </div>
</section>

<style>
/* This will be moved to _hero-divine.css */
</style>
