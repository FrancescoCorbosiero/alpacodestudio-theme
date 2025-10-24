{{--
  Site Footer - Rich Shoelace-based Footer

  Features:
  - Four-column responsive layout
  - Shoelace cards and badges
  - Dynamic social links with icons
  - Newsletter subscription with Shoelace form components
  - Accordion for mobile optimization
  - Smooth animations and transitions
--}}

<footer class="site-footer" role="contentinfo">
  {{-- Footer Main Content --}}
  <div class="footer__main" style="background: var(--sl-color-neutral-50); padding-block: var(--space-2xl); border-top: 1px solid var(--sl-color-neutral-200);">
    <div class="container">
      <div class="footer__grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: var(--space-2xl);">

        {{-- Column 1: Brand & Newsletter --}}
        <div class="footer__col footer__col--brand">
          <div class="footer__brand">
            <a href="{{ home_url('/') }}" style="text-decoration: none; color: inherit;">
              <h3 class="footer__brand-name" style="font-size: var(--sl-font-size-x-large); font-weight: var(--sl-font-weight-bold); margin-bottom: var(--space-xs); display: flex; align-items: center; gap: var(--space-xs);">
                <sl-icon name="code-slash" style="font-size: 1.75rem; color: var(--sl-color-primary-600);"></sl-icon>
                <span>Alpacode Studio</span>
              </h3>
            </a>
            <p class="footer__tagline" style="color: var(--sl-color-neutral-600); margin-bottom: var(--space-lg); line-height: 1.6;">
              Facciamo siti web. Bene, semplice.
            </p>
          </div>

          {{-- Newsletter Subscription --}}
          <sl-card class="footer__newsletter" style="--padding: var(--space-md);">
            <div slot="header" style="display: flex; align-items: center; gap: var(--space-xs);">
              <sl-icon name="envelope-fill" style="color: var(--sl-color-primary-600);"></sl-icon>
              <strong>Newsletter</strong>
              <sl-badge variant="primary" pill>Nuovo</sl-badge>
            </div>

            <p style="font-size: var(--sl-font-size-small); color: var(--sl-color-neutral-600); margin-bottom: var(--space-md);">
              Ricevi aggiornamenti, consigli e offerte esclusive.
            </p>

            <form class="footer__newsletter-form" onsubmit="event.preventDefault(); handleNewsletterSubmit(this);">
              <sl-input
                type="email"
                name="email"
                placeholder="tua@email.com"
                required
                style="margin-bottom: var(--space-sm);"
              >
                <sl-icon name="envelope" slot="prefix"></sl-icon>
              </sl-input>
              <sl-button type="submit" variant="primary" style="width: 100%;">
                <sl-icon slot="prefix" name="send-fill"></sl-icon>
                Iscriviti
              </sl-button>
            </form>
          </sl-card>

          {{-- Social Media Links --}}
          <div class="footer__social" style="margin-top: var(--space-lg);">
            <p style="font-size: var(--sl-font-size-small); font-weight: var(--sl-font-weight-semibold); margin-bottom: var(--space-sm); color: var(--sl-color-neutral-700);">
              Seguici
            </p>
            <div style="display: flex; gap: var(--space-xs);">
              <sl-tooltip content="GitHub">
                <sl-icon-button
                  href="https://github.com/alpacodestudio"
                  target="_blank"
                  rel="noopener noreferrer"
                  name="github"
                  label="GitHub"
                  style="font-size: 1.25rem;"
                ></sl-icon-button>
              </sl-tooltip>

              <sl-tooltip content="Twitter/X">
                <sl-icon-button
                  href="https://twitter.com/alpacodestudio"
                  target="_blank"
                  rel="noopener noreferrer"
                  name="twitter-x"
                  label="Twitter/X"
                  style="font-size: 1.25rem;"
                ></sl-icon-button>
              </sl-tooltip>

              <sl-tooltip content="LinkedIn">
                <sl-icon-button
                  href="https://linkedin.com/company/alpacodestudio"
                  target="_blank"
                  rel="noopener noreferrer"
                  name="linkedin"
                  label="LinkedIn"
                  style="font-size: 1.25rem;"
                ></sl-icon-button>
              </sl-tooltip>

              <sl-tooltip content="Instagram">
                <sl-icon-button
                  href="https://instagram.com/alpacodestudio"
                  target="_blank"
                  rel="noopener noreferrer"
                  name="instagram"
                  label="Instagram"
                  style="font-size: 1.25rem;"
                ></sl-icon-button>
              </sl-tooltip>
            </div>
          </div>
        </div>

        {{-- Column 2: Servizi --}}
        <div class="footer__col footer__col--services">
          <h4 class="footer__col-title" style="font-size: var(--sl-font-size-large); font-weight: var(--sl-font-weight-semibold); margin-bottom: var(--space-md); color: var(--sl-color-neutral-900);">
            <sl-icon name="briefcase-fill" style="color: var(--sl-color-primary-600); margin-right: var(--space-2xs);"></sl-icon>
            Servizi
          </h4>
          <sl-menu style="background: transparent;">
            <sl-menu-item href="#siti-web">
              <sl-icon slot="prefix" name="globe"></sl-icon>
              Siti Web Professionali
            </sl-menu-item>
            <sl-menu-item href="#strumenti-creator">
              <sl-icon slot="prefix" name="tools"></sl-icon>
              Strumenti per Creator
            </sl-menu-item>
            <sl-menu-item href="#soluzioni-business">
              <sl-icon slot="prefix" name="building"></sl-icon>
              Soluzioni per Attività
            </sl-menu-item>
            <sl-menu-item href="#consulenza">
              <sl-icon slot="prefix" name="chat-dots"></sl-icon>
              Consulenza Personalizzata
            </sl-menu-item>
            <sl-menu-item href="#maintenance">
              <sl-icon slot="prefix" name="gear-fill"></sl-icon>
              Manutenzione & Support
            </sl-menu-item>
          </sl-menu>
        </div>

        {{-- Column 3: Risorse --}}
        <div class="footer__col footer__col--resources">
          <h4 class="footer__col-title" style="font-size: var(--sl-font-size-large); font-weight: var(--sl-font-weight-semibold); margin-bottom: var(--space-md); color: var(--sl-color-neutral-900);">
            <sl-icon name="book-fill" style="color: var(--sl-color-primary-600); margin-right: var(--space-2xs);"></sl-icon>
            Risorse
          </h4>
          <sl-menu style="background: transparent;">
            <sl-menu-item href="/portfolio">
              <sl-icon slot="prefix" name="images"></sl-icon>
              Portfolio
            </sl-menu-item>
            <sl-menu-item href="/blog">
              <sl-icon slot="prefix" name="journal-text"></sl-icon>
              Blog
              <sl-badge slot="suffix" variant="success" pill>Aggiornato</sl-badge>
            </sl-menu-item>
            <sl-menu-item href="/faq">
              <sl-icon slot="prefix" name="question-circle"></sl-icon>
              Domande Frequenti
            </sl-menu-item>
            <sl-menu-item href="/pricing">
              <sl-icon slot="prefix" name="currency-euro"></sl-icon>
              Guida ai Prezzi
            </sl-menu-item>
            <sl-menu-item href="/case-studies">
              <sl-icon slot="prefix" name="file-earmark-text"></sl-icon>
              Case Studies
            </sl-menu-item>
          </sl-menu>
        </div>

        {{-- Column 4: Contatti --}}
        <div class="footer__col footer__col--contact">
          <h4 class="footer__col-title" style="font-size: var(--sl-font-size-large); font-weight: var(--sl-font-weight-semibold); margin-bottom: var(--space-md); color: var(--sl-color-neutral-900);">
            <sl-icon name="telephone-fill" style="color: var(--sl-color-primary-600); margin-right: var(--space-2xs);"></sl-icon>
            Contatti
          </h4>

          <sl-card style="--padding: var(--space-md);">
            <div class="footer__contact-info">
              <div style="margin-bottom: var(--space-md);">
                <sl-icon name="envelope-fill" style="color: var(--sl-color-primary-600); margin-right: var(--space-xs);"></sl-icon>
                <strong style="font-size: var(--sl-font-size-small);">Email</strong>
                <div style="margin-left: var(--space-lg); margin-top: var(--space-2xs);">
                  <sl-copy-button value="hello@alpacode.studio"></sl-copy-button>
                  <a href="mailto:hello@alpacode.studio" style="color: var(--sl-color-primary-600); text-decoration: none; font-size: var(--sl-font-size-small);">
                    hello@alpacode.studio
                  </a>
                </div>
              </div>

              <div style="margin-bottom: var(--space-md);">
                <sl-icon name="geo-alt-fill" style="color: var(--sl-color-primary-600); margin-right: var(--space-xs);"></sl-icon>
                <strong style="font-size: var(--sl-font-size-small);">Sede</strong>
                <div style="margin-left: var(--space-lg); margin-top: var(--space-2xs); font-size: var(--sl-font-size-small); color: var(--sl-color-neutral-600);">
                  Monza Brianza, Italia
                </div>
              </div>

              <sl-divider style="margin-block: var(--space-md);"></sl-divider>

              <sl-button href="/contact" variant="primary" outline style="width: 100%;">
                <sl-icon slot="prefix" name="send-fill"></sl-icon>
                Invia un Messaggio
                <sl-icon slot="suffix" name="arrow-right"></sl-icon>
              </sl-button>
            </div>
          </sl-card>

          {{-- Quick Stats --}}
          <div class="footer__stats" style="margin-top: var(--space-md); display: grid; grid-template-columns: repeat(2, 1fr); gap: var(--space-xs);">
            <sl-badge variant="primary" pill style="padding: var(--space-xs); justify-content: center;">
              <sl-icon name="trophy-fill"></sl-icon> 50+ Progetti
            </sl-badge>
            <sl-badge variant="success" pill style="padding: var(--space-xs); justify-content: center;">
              <sl-icon name="heart-fill"></sl-icon> 100% Soddisfazione
            </sl-badge>
          </div>
        </div>

      </div>
    </div>
  </div>

  {{-- Mobile Accordion Version (shown on small screens) --}}
  <div class="footer__mobile-accordion container" style="display: none; padding-block: var(--space-lg);">
    <sl-details summary="Servizi" style="margin-bottom: var(--space-sm);">
      <sl-menu style="background: transparent; padding-top: var(--space-xs);">
        <sl-menu-item href="#siti-web">Siti Web Professionali</sl-menu-item>
        <sl-menu-item href="#strumenti-creator">Strumenti per Creator</sl-menu-item>
        <sl-menu-item href="#soluzioni-business">Soluzioni per Attività</sl-menu-item>
        <sl-menu-item href="#consulenza">Consulenza Personalizzata</sl-menu-item>
      </sl-menu>
    </sl-details>

    <sl-details summary="Risorse" style="margin-bottom: var(--space-sm);">
      <sl-menu style="background: transparent; padding-top: var(--space-xs);">
        <sl-menu-item href="/portfolio">Portfolio</sl-menu-item>
        <sl-menu-item href="/blog">Blog</sl-menu-item>
        <sl-menu-item href="/faq">Domande Frequenti</sl-menu-item>
        <sl-menu-item href="/pricing">Guida ai Prezzi</sl-menu-item>
      </sl-menu>
    </sl-details>

    <sl-details summary="Contatti" style="margin-bottom: var(--space-sm);">
      <div style="padding-top: var(--space-xs);">
        <p style="margin-bottom: var(--space-xs);"><strong>Email:</strong> <a href="mailto:hello@alpacode.studio">hello@alpacode.studio</a></p>
        <p><strong>Sede:</strong> Monza Brianza, Italia</p>
        <sl-button href="/contact" variant="primary" outline size="small" style="margin-top: var(--space-sm);">
          Invia un Messaggio
        </sl-button>
      </div>
    </sl-details>
  </div>

  {{-- Footer Bottom Bar --}}
  <div class="footer__bottom" style="background: var(--sl-color-neutral-100); padding-block: var(--space-md); border-top: 1px solid var(--sl-color-neutral-300);">
    <div class="container">
      <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: var(--space-md);">

        {{-- Copyright --}}
        <div class="footer__copyright" style="display: flex; align-items: center; gap: var(--space-xs); font-size: var(--sl-font-size-small); color: var(--sl-color-neutral-600);">
          <sl-icon name="c-circle"></sl-icon>
          <span>{{ date('Y') }} Alpacode Studio. Tutti i diritti riservati.</span>
        </div>

        {{-- Legal Links --}}
        <nav class="footer__legal" aria-label="Legal navigation" style="display: flex; gap: var(--space-md); font-size: var(--sl-font-size-small);">
          <a href="/privacy" style="color: var(--sl-color-neutral-600); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--sl-color-primary-600)'" onmouseout="this.style.color='var(--sl-color-neutral-600)'">
            <sl-icon name="shield-lock" style="margin-right: var(--space-2xs);"></sl-icon>
            Privacy
          </a>
          <a href="/terms" style="color: var(--sl-color-neutral-600); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--sl-color-primary-600)'" onmouseout="this.style.color='var(--sl-color-neutral-600)'">
            <sl-icon name="file-text" style="margin-right: var(--space-2xs);"></sl-icon>
            Termini
          </a>
          <a href="/cookies" style="color: var(--sl-color-neutral-600); text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='var(--sl-color-primary-600)'" onmouseout="this.style.color='var(--sl-color-neutral-600)'">
            <sl-icon name="cookie" style="margin-right: var(--space-2xs);"></sl-icon>
            Cookie
          </a>
        </nav>

        {{-- Built with badge --}}
        <div style="display: flex; gap: var(--space-xs); align-items: center;">
          <sl-badge variant="neutral" pill>
            <sl-icon name="lightning-charge-fill"></sl-icon>
            Fatto con Shoelace
          </sl-badge>
          <sl-badge variant="neutral" pill>
            <sl-icon name="wordpress"></sl-icon>
            WordPress
          </sl-badge>
        </div>
      </div>
    </div>
  </div>
</footer>

<style>
  /* Dark mode styles */
  [data-theme="dark"] .footer__main {
    background: var(--sl-color-neutral-900) !important;
    border-top-color: var(--sl-color-neutral-800) !important;
  }

  [data-theme="dark"] .footer__bottom {
    background: var(--sl-color-neutral-950) !important;
    border-top-color: var(--sl-color-neutral-800) !important;
  }

  [data-theme="dark"] .footer__brand-name,
  [data-theme="dark"] .footer__col-title {
    color: var(--sl-color-neutral-100) !important;
  }

  [data-theme="dark"] .footer__tagline {
    color: var(--sl-color-neutral-400) !important;
  }

  /* Footer menu items hover effects */
  .footer__col sl-menu-item::part(base):hover {
    background: var(--sl-color-primary-50);
    color: var(--sl-color-primary-700);
  }

  [data-theme="dark"] .footer__col sl-menu-item::part(base):hover {
    background: var(--sl-color-primary-950);
    color: var(--sl-color-primary-300);
  }

  /* Newsletter card styling */
  .footer__newsletter::part(base) {
    border: 1px solid var(--sl-color-primary-200);
    background: linear-gradient(135deg, var(--sl-color-primary-50) 0%, var(--sl-color-neutral-0) 100%);
  }

  [data-theme="dark"] .footer__newsletter::part(base) {
    border-color: var(--sl-color-primary-900);
    background: linear-gradient(135deg, var(--sl-color-primary-950) 0%, var(--sl-color-neutral-900) 100%);
  }

  /* Contact card styling */
  .footer__col--contact sl-card::part(base) {
    border: 1px solid var(--sl-color-neutral-200);
  }

  [data-theme="dark"] .footer__col--contact sl-card::part(base) {
    border-color: var(--sl-color-neutral-800);
    background: var(--sl-color-neutral-800);
  }

  /* Responsive layout */
  @media (max-width: 768px) {
    .footer__grid {
      grid-template-columns: 1fr !important;
      gap: var(--space-lg) !important;
    }

    .footer__main {
      display: none;
    }

    .footer__mobile-accordion {
      display: block !important;
    }

    .footer__bottom > div {
      flex-direction: column;
      text-align: center;
    }
  }

  @media (min-width: 769px) {
    .footer__mobile-accordion {
      display: none !important;
    }
  }

  /* Animation on scroll */
  .footer__col {
    animation: fadeInUp 0.6s ease-out backwards;
  }

  .footer__col:nth-child(1) { animation-delay: 0.1s; }
  .footer__col:nth-child(2) { animation-delay: 0.2s; }
  .footer__col:nth-child(3) { animation-delay: 0.3s; }
  .footer__col:nth-child(4) { animation-delay: 0.4s; }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Copy button inline styling */
  .footer__contact-info sl-copy-button {
    display: inline-block;
    margin-right: var(--space-2xs);
  }
</style>

<script>
  // Newsletter form submission handler
  function handleNewsletterSubmit(form) {
    const email = form.querySelector('input[type="email"]').value;
    const button = form.querySelector('sl-button');

    // Show loading state
    button.loading = true;

    // Simulate API call (replace with actual implementation)
    setTimeout(() => {
      button.loading = false;

      // Show success alert
      const alert = Object.assign(document.createElement('sl-alert'), {
        variant: 'success',
        closable: true,
        duration: 3000,
        innerHTML: `
          <sl-icon name="check-circle-fill" slot="icon"></sl-icon>
          <strong>Iscrizione completata!</strong><br>
          Grazie per esserti iscritto alla nostra newsletter.
        `
      });

      document.body.append(alert);
      alert.toast();

      // Reset form
      form.reset();
    }, 1500);
  }

  // Add smooth scroll to anchor links in footer
  document.querySelectorAll('.footer__col sl-menu-item[href^="#"]').forEach(item => {
    item.addEventListener('click', (e) => {
      const href = item.getAttribute('href');
      if (href.startsWith('#')) {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }
    });
  });
</script>
