{{--
  DIVINE Pricing Section

  Features:
  - Interactive pricing toggle (monthly/yearly)
  - 3D flip cards on hover
  - Glassmorphic design
  - Animated feature lists
  - "Most Popular" badge with glow
  - Magnetic hover effects
--}}

<section class="pricing-divine" aria-labelledby="pricing-title">
  {{-- Section Header --}}
  <div class="pricing-divine__header">
    <span class="pricing-divine__eyebrow">Prezzi Chiari</span>
    <h2 class="pricing-divine__title hero-2" id="pricing-title">
      Scegli il <span class="text-gradient">Tuo Pacchetto</span>
    </h2>
    <p class="pricing-divine__subtitle">
      Prezzi fissi, niente sorprese. Paghi una volta, il sito è tuo per sempre.
    </p>
  </div>

  {{-- Pricing Toggle (Monthly/Yearly) - Optional Feature --}}
  <div
    class="pricing-toggle"
    x-data="{
      billingCycle: 'once',
      plans: [
        {
          name: 'Starter',
          description: 'Perfetto per iniziare',
          price: '899',
          originalPrice: null,
          features: [
            'Sito web professionale fino a 5 pagine',
            'Design responsivo (mobile + desktop)',
            'Ottimizzazione SEO base',
            'Form di contatto integrato',
            'Google Analytics incluso',
            'Consegna in 7 giorni',
            '1 mese supporto gratuito'
          ],
          cta: 'Inizia Ora',
          popular: false
        },
        {
          name: 'Business',
          description: 'La scelta più popolare',
          price: '1499',
          originalPrice: null,
          features: [
            'Tutto dal pacchetto Starter',
            'Fino a 10 pagine personalizzate',
            'Blog integrato con CMS',
            'Integrazione social media',
            'Newsletter / Email marketing setup',
            'Chat live (Tawk.to o simile)',
            'Ottimizzazione velocità avanzata',
            '3 mesi supporto gratuito'
          ],
          cta: 'Più Popolare',
          popular: true
        },
        {
          name: 'E-Commerce',
          description: 'Vendi online subito',
          price: '2499',
          originalPrice: null,
          features: [
            'Tutto dal pacchetto Business',
            'Shop online completo (WooCommerce)',
            'Fino a 50 prodotti caricati',
            'Gateway pagamento (Stripe/PayPal)',
            'Sistema gestione ordini',
            'Calcolo spedizioni automatico',
            'Email transazionali personalizzate',
            '6 mesi supporto gratuito'
          ],
          cta: 'Inizia a Vendere',
          popular: false
        }
      ]
    }"
  >
    {{-- Pricing Cards Grid --}}
    <div class="pricing-divine__grid">
      <template x-for="(plan, index) in plans" :key="index">
        <article
          class="pricing-card-divine"
          :class="{ 'is-popular': plan.popular }"
          x-data="{ ...tilt3D(8), ...revealOnScroll(), flipped: false }"
          x-show="visible"
          x-transition:enter="transition ease-out duration-1000"
          x-transition:enter-start="opacity-0 transform translate-y-20 scale-90"
          x-transition:enter-end="opacity-100 transform translate-y-0 scale-100"
          :style="`transition-delay: ${index * 150}ms;`"
          @mousemove="handleMove"
          @mouseleave="handleLeave"
        >
          {{-- Popular Badge --}}
          <div class="pricing-card-divine__badge" x-show="plan.popular">
            <span>Più Popolare</span>
            <div class="badge-glow"></div>
          </div>

          {{-- Glassmorphic Background --}}
          <div class="pricing-card-divine__glass"></div>

          {{-- Card Content --}}
          <div class="pricing-card-divine__content">
            {{-- Header --}}
            <div class="pricing-card-divine__header">
              <h3 class="pricing-card-divine__name" x-text="plan.name"></h3>
              <p class="pricing-card-divine__description" x-text="plan.description"></p>
            </div>

            {{-- Price --}}
            <div class="pricing-card-divine__price">
              <span class="currency">€</span>
              <span class="amount" x-text="plan.price"></span>
              <span class="period">Una tantum</span>
            </div>

            {{-- CTA Button --}}
            <a
              href="/contact"
              class="pricing-card-divine__cta"
              :class="{ 'is-primary': plan.popular }"
              x-data="magneticButton(0.3)"
              @mousemove.stop="handleMove"
              @mouseleave="handleLeave"
              :style="style"
            >
              <span x-text="plan.cta"></span>
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14m-7-7l7 7-7 7"/>
              </svg>
            </a>

            {{-- Features List --}}
            <ul class="pricing-card-divine__features">
              <template x-for="(feature, fIndex) in plan.features" :key="fIndex">
                <li class="feature-item" :style="`animation-delay: ${(index * 150) + (fIndex * 50)}ms`">
                  <svg class="feature-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <polyline points="20 6 9 17 4 12"/>
                  </svg>
                  <span x-text="feature"></span>
                </li>
              </template>
            </ul>
          </div>
        </article>
      </template>
    </div>

    {{-- Trust Note --}}
    <div class="pricing-divine__note">
      <p>
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
        </svg>
        <strong>Garanzia:</strong> Se non sei soddisfatto entro 30 giorni, ti rimborsiamo completamente. Nessuna domanda.
      </p>
    </div>
  </div>

  {{-- FAQ or Additional Info --}}
  <div class="pricing-divine__faq">
    <h3 class="pricing-divine__faq-title">Domande Frequenti</h3>
    <div
      class="faq-grid"
      x-data="stagger(100)"
      x-init="init()"
    >
      <div
        class="faq-item"
        x-data="revealOnScroll()"
        x-show="visible"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 transform translate-y-10"
        x-transition:enter-end="opacity-100 transform translate-y-0"
      >
        <h4 class="faq-question">Cosa include esattamente il prezzo?</h4>
        <p class="faq-answer">
          Il prezzo include progettazione, sviluppo, ottimizzazione SEO, setup hosting e dominio, e supporto post-lancio.
        </p>
      </div>

      <div
        class="faq-item"
        x-data="revealOnScroll()"
        x-show="visible"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 transform translate-y-10"
        x-transition:enter-end="opacity-100 transform translate-y-0"
      >
        <h4 class="faq-question">Ci sono costi nascosti?</h4>
        <p class="faq-answer">
          No. Il prezzo che vedi è tutto incluso. Gli unici costi aggiuntivi sono hosting (~€5/mese) e dominio (~€12/anno).
        </p>
      </div>

      <div
        class="faq-item"
        x-data="revealOnScroll()"
        x-show="visible"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 transform translate-y-10"
        x-transition:enter-end="opacity-100 transform translate-y-0"
      >
        <h4 class="faq-question">Posso aggiungere funzionalità extra?</h4>
        <p class="faq-answer">
          Assolutamente! Contattaci per un preventivo personalizzato. Siamo flessibili e ci adattiamo alle tue esigenze.
        </p>
      </div>

      <div
        class="faq-item"
        x-data="revealOnScroll()"
        x-show="visible"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 transform translate-y-10"
        x-transition:enter-end="opacity-100 transform translate-y-0"
      >
        <h4 class="faq-question">Quanto tempo ci vuole?</h4>
        <p class="faq-answer">
          Starter: 7 giorni. Business: 10-14 giorni. E-Commerce: 14-21 giorni. Dipende dalla complessità e dal tuo feedback.
        </p>
      </div>
    </div>
  </div>
</section>
