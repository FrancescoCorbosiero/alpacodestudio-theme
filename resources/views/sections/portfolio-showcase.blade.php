{{-- Premium Portfolio Showcase Section --}}
<section class="portfolio-showcase" id="portfolio">
  <div class="portfolio-showcase__container">

    {{-- Section Header --}}
    <div class="portfolio-showcase__header">
      <span class="section-eyebrow">Selected Work</span>
      <h2 class="section-title">Projects That Define Excellence</h2>
      <p class="section-description">
        Crafting digital experiences that merge innovation with timeless design principles. Each project represents a unique journey from concept to completion.
      </p>
    </div>

    {{-- Featured Project (Large) --}}
    <article class="portfolio-featured">
      <a href="https://picsum.photos/1920/1080?random=1"
         data-pswp-width="1920"
         data-pswp-height="1080"
         class="portfolio-featured__link">
        <div class="portfolio-featured__image-wrapper">
          <img src="https://picsum.photos/1200/600?random=1"
               alt="Featured: Next-Gen E-commerce Platform"
               class="portfolio-featured__image"
               loading="lazy">
          <div class="portfolio-featured__gradient"></div>
          <div class="portfolio-featured__content">
            <span class="portfolio-featured__label">Featured Project</span>
            <h3 class="portfolio-featured__title">Next-Gen E-commerce Platform</h3>
            <p class="portfolio-featured__description">A seamless shopping experience powered by modern web technologies, delivering 40% faster load times and increased conversions.</p>
            <div class="portfolio-featured__meta">
              <span class="portfolio-featured__category">Web Development</span>
              <span class="portfolio-featured__year">2024</span>
            </div>
            <div class="portfolio-featured__cta">
              <span>View Case Study</span>
              <i class="fas fa-arrow-right"></i>
            </div>
          </div>
        </div>
      </a>
    </article>

    {{-- Regular Projects Grid --}}
    <div class="portfolio-grid">

      {{-- Project 1 --}}
      <article class="portfolio-card">
        <a href="https://picsum.photos/1200/900?random=2"
           data-pswp-width="1200"
           data-pswp-height="900"
           class="portfolio-card__link">
          <div class="portfolio-card__media">
            <img src="https://picsum.photos/800/600?random=2"
                 alt="Brand Identity System"
                 class="portfolio-card__image"
                 loading="lazy">
            <div class="portfolio-card__gradient"></div>
            <div class="portfolio-card__overlay">
              <i class="fas fa-plus"></i>
            </div>
          </div>
          <div class="portfolio-card__info">
            <div class="portfolio-card__header">
              <h3 class="portfolio-card__title">Brand Identity System</h3>
              <span class="portfolio-card__icon"><i class="fas fa-arrow-up-right"></i></span>
            </div>
            <p class="portfolio-card__category">Branding & Design</p>
            <p class="portfolio-card__excerpt">Complete visual identity for a global tech startup, from logo to brand guidelines.</p>
          </div>
        </a>
      </article>

      {{-- Project 2 --}}
      <article class="portfolio-card">
        <a href="https://picsum.photos/1200/900?random=3"
           data-pswp-width="1200"
           data-pswp-height="900"
           class="portfolio-card__link">
          <div class="portfolio-card__media">
            <img src="https://picsum.photos/800/600?random=3"
                 alt="SaaS Dashboard Redesign"
                 class="portfolio-card__image"
                 loading="lazy">
            <div class="portfolio-card__gradient"></div>
            <div class="portfolio-card__overlay">
              <i class="fas fa-plus"></i>
            </div>
          </div>
          <div class="portfolio-card__info">
            <div class="portfolio-card__header">
              <h3 class="portfolio-card__title">SaaS Dashboard Redesign</h3>
              <span class="portfolio-card__icon"><i class="fas fa-arrow-up-right"></i></span>
            </div>
            <p class="portfolio-card__category">UI/UX Design</p>
            <p class="portfolio-card__excerpt">Transforming complex data into intuitive visualizations for better decision-making.</p>
          </div>
        </a>
      </article>

      {{-- Project 3 --}}
      <article class="portfolio-card">
        <a href="https://picsum.photos/1200/900?random=4"
           data-pswp-width="1200"
           data-pswp-height="900"
           class="portfolio-card__link">
          <div class="portfolio-card__media">
            <img src="https://picsum.photos/800/600?random=4"
                 alt="Mobile Banking App"
                 class="portfolio-card__image"
                 loading="lazy">
            <div class="portfolio-card__gradient"></div>
            <div class="portfolio-card__overlay">
              <i class="fas fa-plus"></i>
            </div>
          </div>
          <div class="portfolio-card__info">
            <div class="portfolio-card__header">
              <h3 class="portfolio-card__title">Mobile Banking App</h3>
              <span class="portfolio-card__icon"><i class="fas fa-arrow-up-right"></i></span>
            </div>
            <p class="portfolio-card__category">Mobile Development</p>
            <p class="portfolio-card__excerpt">Secure, fast, and user-friendly banking at your fingertips with biometric authentication.</p>
          </div>
        </a>
      </article>

      {{-- Project 4 --}}
      <article class="portfolio-card">
        <a href="https://picsum.photos/1200/900?random=5"
           data-pswp-width="1200"
           data-pswp-height="900"
           class="portfolio-card__link">
          <div class="portfolio-card__media">
            <img src="https://picsum.photos/800/600?random=5"
                 alt="Creative Agency Website"
                 class="portfolio-card__image"
                 loading="lazy">
            <div class="portfolio-card__gradient"></div>
            <div class="portfolio-card__overlay">
              <i class="fas fa-plus"></i>
            </div>
          </div>
          <div class="portfolio-card__info">
            <div class="portfolio-card__header">
              <h3 class="portfolio-card__title">Creative Agency Website</h3>
              <span class="portfolio-card__icon"><i class="fas fa-arrow-up-right"></i></span>
            </div>
            <p class="portfolio-card__category">Web Design</p>
            <p class="portfolio-card__excerpt">Award-winning portfolio site with immersive animations and storytelling.</p>
          </div>
        </a>
      </article>

    </div>

  </div>
</section>

@push('styles')
<style>
/* ===================================
   PREMIUM PORTFOLIO SHOWCASE
   =================================== */

.portfolio-showcase {
  position: relative;
  min-height: 100vh;
  padding: clamp(80px, 12vw, 160px) 0;
  background: var(--color-surface-base);
  overflow: hidden;
}

.portfolio-showcase::before {
  content: '';
  position: absolute;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  width: 100%;
  max-width: 1400px;
  height: 1px;
  background: linear-gradient(90deg,
    transparent 0%,
    var(--color-brand-primary) 50%,
    transparent 100%);
  opacity: 0.3;
}

.portfolio-showcase__container {
  width: 100%;
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 clamp(20px, 5vw, 80px);
}

/* Section Header */
.portfolio-showcase__header {
  text-align: center;
  margin-bottom: clamp(60px, 8vw, 100px);
  max-width: 800px;
  margin-left: auto;
  margin-right: auto;
}

.section-eyebrow {
  display: inline-block;
  font-size: clamp(11px, 1.2vw, 13px);
  color: var(--color-brand-primary);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 3px;
  margin-bottom: 20px;
  padding: 8px 20px;
  border: 1px solid var(--color-brand-primary);
  border-radius: 30px;
  background: rgba(255, 255, 255, 0.03);
}

.section-title {
  font-size: clamp(32px, 5vw, 56px);
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 24px;
  color: var(--color-text-primary);
  letter-spacing: -0.02em;
}

.section-description {
  font-size: clamp(16px, 1.8vw, 20px);
  line-height: 1.7;
  color: var(--color-text-secondary);
  max-width: 700px;
  margin: 0 auto;
}

/* ===================================
   FEATURED PROJECT (LARGE HERO)
   =================================== */

.portfolio-featured {
  margin-bottom: clamp(60px, 8vw, 100px);
  border-radius: clamp(16px, 2vw, 24px);
  overflow: hidden;
  background: var(--color-surface-raised);
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
  transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1),
              box-shadow 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.portfolio-featured:hover {
  transform: translateY(-8px);
  box-shadow: 0 30px 80px rgba(0, 0, 0, 0.4);
}

.portfolio-featured__link {
  display: block;
  text-decoration: none;
  color: inherit;
}

.portfolio-featured__image-wrapper {
  position: relative;
  aspect-ratio: 16 / 9;
  overflow: hidden;
  background: var(--color-surface-sunken);
}

.portfolio-featured__image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}

.portfolio-featured:hover .portfolio-featured__image {
  transform: scale(1.05);
}

.portfolio-featured__gradient {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to top,
    rgba(0, 0, 0, 0.9) 0%,
    rgba(0, 0, 0, 0.5) 40%,
    transparent 100%
  );
  z-index: 1;
}

.portfolio-featured__content {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: clamp(30px, 5vw, 60px);
  z-index: 2;
}

.portfolio-featured__label {
  display: inline-block;
  font-size: 11px;
  color: var(--color-brand-primary);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  margin-bottom: 16px;
  padding: 6px 16px;
  border: 1px solid var(--color-brand-primary);
  border-radius: 20px;
  background: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(10px);
}

.portfolio-featured__title {
  font-size: clamp(24px, 4vw, 48px);
  font-weight: 700;
  line-height: 1.2;
  color: white;
  margin-bottom: 16px;
  letter-spacing: -0.02em;
}

.portfolio-featured__description {
  font-size: clamp(14px, 1.6vw, 18px);
  line-height: 1.6;
  color: rgba(255, 255, 255, 0.85);
  margin-bottom: 24px;
  max-width: 700px;
}

.portfolio-featured__meta {
  display: flex;
  gap: 24px;
  margin-bottom: 20px;
  font-size: 14px;
  color: rgba(255, 255, 255, 0.7);
}

.portfolio-featured__category,
.portfolio-featured__year {
  position: relative;
  font-weight: 500;
  letter-spacing: 0.5px;
}

.portfolio-featured__category::after {
  content: '•';
  position: absolute;
  right: -16px;
  color: var(--color-brand-primary);
}

.portfolio-featured__cta {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  font-size: 15px;
  font-weight: 600;
  color: white;
  transition: gap 0.3s ease;
}

.portfolio-featured:hover .portfolio-featured__cta {
  gap: 16px;
}

.portfolio-featured__cta i {
  color: var(--color-brand-primary);
  transition: transform 0.3s ease;
}

.portfolio-featured:hover .portfolio-featured__cta i {
  transform: translateX(4px);
}

/* ===================================
   REGULAR PORTFOLIO GRID
   =================================== */

.portfolio-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: clamp(30px, 4vw, 40px);
}

.portfolio-card {
  position: relative;
  border-radius: clamp(12px, 1.5vw, 20px);
  overflow: hidden;
  background: var(--color-surface-raised);
  transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1),
              box-shadow 0.5s cubic-bezier(0.16, 1, 0.3, 1);
}

.portfolio-card:hover {
  transform: translateY(-12px);
  box-shadow: 0 24px 60px rgba(0, 0, 0, 0.25);
}

.portfolio-card__link {
  display: block;
  text-decoration: none;
  color: inherit;
}

.portfolio-card__media {
  position: relative;
  aspect-ratio: 4 / 3;
  overflow: hidden;
  background: var(--color-surface-sunken);
}

.portfolio-card__image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
}

.portfolio-card:hover .portfolio-card__image {
  transform: scale(1.08);
}

.portfolio-card__gradient {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to top,
    rgba(0, 0, 0, 0.6) 0%,
    transparent 60%
  );
  opacity: 0;
  transition: opacity 0.4s ease;
}

.portfolio-card:hover .portfolio-card__gradient {
  opacity: 1;
}

.portfolio-card__overlay {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0);
  width: 60px;
  height: 60px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.95);
  border-radius: 50%;
  transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
  z-index: 2;
}

.portfolio-card:hover .portfolio-card__overlay {
  transform: translate(-50%, -50%) scale(1);
}

.portfolio-card__overlay i {
  font-size: 20px;
  color: var(--color-surface-base);
}

.portfolio-card__info {
  padding: clamp(24px, 3vw, 32px);
}

.portfolio-card__header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 16px;
  margin-bottom: 12px;
}

.portfolio-card__title {
  font-size: clamp(18px, 2vw, 22px);
  font-weight: 700;
  line-height: 1.3;
  color: var(--color-text-primary);
  letter-spacing: -0.01em;
}

.portfolio-card__icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  flex-shrink: 0;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.05);
  color: var(--color-brand-primary);
  font-size: 14px;
  transition: all 0.3s ease;
}

.portfolio-card:hover .portfolio-card__icon {
  background: var(--color-brand-primary);
  color: white;
  transform: rotate(45deg);
}

.portfolio-card__category {
  font-size: 13px;
  color: var(--color-brand-primary);
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  margin-bottom: 12px;
}

.portfolio-card__excerpt {
  font-size: 15px;
  line-height: 1.6;
  color: var(--color-text-secondary);
}

/* ===================================
   RESPONSIVE DESIGN
   =================================== */

/* Tablet */
@media (min-width: 768px) {
  .portfolio-grid {
    grid-template-columns: repeat(2, 1fr);
  }

  .portfolio-featured__image-wrapper {
    aspect-ratio: 21 / 9;
  }
}

/* Desktop */
@media (min-width: 1024px) {
  .portfolio-grid {
    gap: 40px;
  }
}

/* Large Desktop */
@media (min-width: 1280px) {
  .portfolio-featured__content {
    max-width: 60%;
  }
}

/* Mobile Optimizations */
@media (max-width: 767px) {
  .portfolio-featured__description {
    display: none;
  }

  .portfolio-card__excerpt {
    display: none;
  }
}
</style>
@endpush
