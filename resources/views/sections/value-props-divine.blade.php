{{--
  DIVINE Value Propositions

  Features:
  - 3D tilt effect on mouse move
  - Glassmorphism cards
  - Animated icons
  - Count-up numbers
  - Parallax hover effects
--}}

<section class="value-props-divine" aria-labelledby="value-props-title">
  {{-- Section Header --}}
  <div class="value-props-divine__header">
    <h2
      class="value-props-divine__title hero-2"
      id="value-props-title"
      x-data="{
        init() {
          const text = this.$el.textContent
          this.$el.innerHTML = splitText(text)
        }
      }"
    >
      Perché Alpacode
    </h2>
    <p class="value-props-divine__subtitle display-3 text-outline" x-data="parallax(0.2)" :style="style">
      Studio
    </p>
  </div>

  {{-- Value Props Grid --}}
  <div
    class="value-props-divine__grid"
    x-data="stagger(150)"
    x-init="init()"
  >
    {{-- Card 1: Prezzi Onesti --}}
    <article
      class="value-card-divine"
      x-data="{ ...tilt3D(15), ...revealOnScroll() }"
      x-show="visible"
      x-transition:enter="transition ease-out duration-1000"
      x-transition:enter-start="opacity-0 transform translate-y-20 scale-90"
      x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
      @mousemove="handleMove"
      @mouseleave="handleLeave"
      :style="style"
    >
      <div class="value-card-divine__glow"></div>

      <div class="value-card-divine__icon" aria-hidden="true">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <circle cx="12" cy="12" r="10"/>
          <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"/>
          <path d="M12 18V6"/>
        </svg>
      </div>

      <h3 class="value-card-divine__title">Prezzi Onesti</h3>
      <p class="value-card-divine__description">
        Sai quanto spendi prima di iniziare. Niente sorprese, niente costi nascosti.
      </p>

      <div class="value-card-divine__number" x-data="countUp(100, 2000)">
        <span x-text="display + '%'"></span>
        <span class="value-card-divine__label">Trasparenza</span>
      </div>
    </article>

    {{-- Card 2: Team Giovane --}}
    <article
      class="value-card-divine"
      x-data="{ ...tilt3D(15), ...revealOnScroll() }"
      x-show="visible"
      x-transition:enter="transition ease-out duration-1000"
      x-transition:enter-start="opacity-0 transform translate-y-20 scale-90"
      x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
      @mousemove="handleMove"
      @mouseleave="handleLeave"
      :style="style"
    >
      <div class="value-card-divine__glow"></div>

      <div class="value-card-divine__icon" aria-hidden="true">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <path d="M12 2v20"/>
          <path d="m15 5-3-3-3 3"/>
          <path d="m2 15 3 3 3-3"/>
          <path d="M2 12h20"/>
          <path d="m22 9-3 3 3 3"/>
        </svg>
      </div>

      <h3 class="value-card-divine__title">Team Giovane</h3>
      <p class="value-card-divine__description">
        Capiamo le esigenze digitali di oggi. Cresciuti nel digitale, esperienza vera.
      </p>

      <div class="value-card-divine__number" x-data="countUp(10, 2000)">
        <span x-text="display + '+'"></span>
        <span class="value-card-divine__label">Anni Esperienza</span>
      </div>
    </article>

    {{-- Card 3: Niente Vincoli --}}
    <article
      class="value-card-divine"
      x-data="{ ...tilt3D(15), ...revealOnScroll() }"
      x-show="visible"
      x-transition:enter="transition ease-out duration-1000"
      x-transition:enter-start="opacity-0 transform translate-y-20 scale-90"
      x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
      @mousemove="handleMove"
      @mouseleave="handleLeave"
      :style="style"
    >
      <div class="value-card-divine__glow"></div>

      <div class="value-card-divine__icon" aria-hidden="true">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
          <path d="M7 11V7a5 5 0 0 1 9.9-1"/>
        </svg>
      </div>

      <h3 class="value-card-divine__title">Niente Vincoli</h3>
      <p class="value-card-divine__description">
        Il sito è tuo, punto. Gestiscilo come vuoi, quando vuoi.
      </p>

      <div class="value-card-divine__number">
        <span>∞</span>
        <span class="value-card-divine__label">Libertà</span>
      </div>
    </article>

    {{-- Card 4: Supporto Reale --}}
    <article
      class="value-card-divine"
      x-data="{ ...tilt3D(15), ...revealOnScroll() }"
      x-show="visible"
      x-transition:enter="transition ease-out duration-1000"
      x-transition:enter-start="opacity-0 transform translate-y-20 scale-90"
      x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
      @mousemove="handleMove"
      @mouseleave="handleLeave"
      :style="style"
    >
      <div class="value-card-divine__glow"></div>

      <div class="value-card-divine__icon" aria-hidden="true">
        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
        </svg>
      </div>

      <h3 class="value-card-divine__title">Supporto Reale</h3>
      <p class="value-card-divine__description">
        Rispondiamo davvero alle tue domande. Non ti lasciamo solo dopo la consegna.
      </p>

      <div class="value-card-divine__number" x-data="countUp(24, 2000)">
        <span x-text="'<' + display"></span>
        <span class="value-card-divine__label">Ore Risposta</span>
      </div>
    </article>
  </div>
</section>
