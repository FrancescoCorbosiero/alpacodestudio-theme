{{-- Portfolio Showcase Section with PhotoSwipe Gallery --}}
<section class="portfolio-showcase" id="portfolio">
  <div class="portfolio-showcase__container">

    {{-- Section Header --}}
    <div class="portfolio-showcase__header" data-aos="fade-up">
      <span class="section-eyebrow">Recent Work</span>
      <h2 class="section-title heading-2">Featured Projects</h2>
      <p class="section-description body-large">
        A selection of my best work across web design, development, and branding.
      </p>
    </div>

    {{-- Portfolio Grid --}}
    <div class="portfolio-showcase__grid">

      {{-- Project 1 --}}
      <article class="portfolio-item" data-aos="fade-up" data-aos-delay="100">
        <a href="https://picsum.photos/1200/800?random=1"
           data-pswp-width="1200"
           data-pswp-height="800"
           target="_blank"
           class="portfolio-item__link">
          <div class="portfolio-item__image-wrapper">
            <img src="https://picsum.photos/600/400?random=1"
                 alt="E-commerce Platform"
                 class="portfolio-item__image"
                 loading="lazy">
            <div class="portfolio-item__overlay">
              <i class="fas fa-search-plus"></i>
            </div>
          </div>
          <div class="portfolio-item__content">
            <h3 class="portfolio-item__title">E-commerce Platform</h3>
            <p class="portfolio-item__category">Web Development</p>
          </div>
        </a>
      </article>

      {{-- Project 2 --}}
      <article class="portfolio-item" data-aos="fade-up" data-aos-delay="200">
        <a href="https://picsum.photos/1200/800?random=2"
           data-pswp-width="1200"
           data-pswp-height="800"
           target="_blank"
           class="portfolio-item__link">
          <div class="portfolio-item__image-wrapper">
            <img src="https://picsum.photos/600/400?random=2"
                 alt="Brand Identity Design"
                 class="portfolio-item__image"
                 loading="lazy">
            <div class="portfolio-item__overlay">
              <i class="fas fa-search-plus"></i>
            </div>
          </div>
          <div class="portfolio-item__content">
            <h3 class="portfolio-item__title">Brand Identity Design</h3>
            <p class="portfolio-item__category">Branding</p>
          </div>
        </a>
      </article>

      {{-- Project 3 --}}
      <article class="portfolio-item" data-aos="fade-up" data-aos-delay="300">
        <a href="https://picsum.photos/1200/800?random=3"
           data-pswp-width="1200"
           data-pswp-height="800"
           target="_blank"
           class="portfolio-item__link">
          <div class="portfolio-item__image-wrapper">
            <img src="https://picsum.photos/600/400?random=3"
                 alt="Mobile App Interface"
                 class="portfolio-item__image"
                 loading="lazy">
            <div class="portfolio-item__overlay">
              <i class="fas fa-search-plus"></i>
            </div>
          </div>
          <div class="portfolio-item__content">
            <h3 class="portfolio-item__title">Mobile App Interface</h3>
            <p class="portfolio-item__category">UI/UX Design</p>
          </div>
        </a>
      </article>

      {{-- Project 4 --}}
      <article class="portfolio-item" data-aos="fade-up" data-aos-delay="400">
        <a href="https://picsum.photos/1200/800?random=4"
           data-pswp-width="1200"
           data-pswp-height="800"
           target="_blank"
           class="portfolio-item__link">
          <div class="portfolio-item__image-wrapper">
            <img src="https://picsum.photos/600/400?random=4"
                 alt="Corporate Website"
                 class="portfolio-item__image"
                 loading="lazy">
            <div class="portfolio-item__overlay">
              <i class="fas fa-search-plus"></i>
            </div>
          </div>
          <div class="portfolio-item__content">
            <h3 class="portfolio-item__title">Corporate Website</h3>
            <p class="portfolio-item__category">Web Design</p>
          </div>
        </a>
      </article>

      {{-- Project 5 --}}
      <article class="portfolio-item" data-aos="fade-up" data-aos-delay="500">
        <a href="https://picsum.photos/1200/800?random=5"
           data-pswp-width="1200"
           data-pswp-height="800"
           target="_blank"
           class="portfolio-item__link">
          <div class="portfolio-item__image-wrapper">
            <img src="https://picsum.photos/600/400?random=5"
                 alt="Dashboard Design"
                 class="portfolio-item__image"
                 loading="lazy">
            <div class="portfolio-item__overlay">
              <i class="fas fa-search-plus"></i>
            </div>
          </div>
          <div class="portfolio-item__content">
            <h3 class="portfolio-item__title">Dashboard Design</h3>
            <p class="portfolio-item__category">UI/UX Design</p>
          </div>
        </a>
      </article>

      {{-- Project 6 --}}
      <article class="portfolio-item" data-aos="fade-up" data-aos-delay="600">
        <a href="https://picsum.photos/1200/800?random=6"
           data-pswp-width="1200"
           data-pswp-height="800"
           target="_blank"
           class="portfolio-item__link">
          <div class="portfolio-item__image-wrapper">
            <img src="https://picsum.photos/600/400?random=6"
                 alt="Marketing Campaign"
                 class="portfolio-item__image"
                 loading="lazy">
            <div class="portfolio-item__overlay">
              <i class="fas fa-search-plus"></i>
            </div>
          </div>
          <div class="portfolio-item__content">
            <h3 class="portfolio-item__title">Marketing Campaign</h3>
            <p class="portfolio-item__category">Branding</p>
          </div>
        </a>
      </article>

    </div>

  </div>
</section>

@push('styles')
<style>
.portfolio-showcase {
  min-height: 100vh;
  padding: var(--space-3xl) var(--space-lg);
  background: var(--color-surface-base);
  display: flex;
  align-items: center;
}

.portfolio-showcase__container {
  width: 100%;
  max-width: 1400px;
  margin: 0 auto;
}

.portfolio-showcase__header {
  text-align: center;
  margin-bottom: var(--space-3xl);
  max-width: 700px;
  margin-left: auto;
  margin-right: auto;
}

.section-eyebrow {
  display: block;
  font-size: var(--font-size-sm);
  color: var(--color-brand-primary);
  font-weight: var(--font-weight-semibold);
  text-transform: uppercase;
  letter-spacing: var(--letter-spacing-wide);
  margin-bottom: var(--space-md);
}

.section-title {
  margin-bottom: var(--space-md);
}

.section-description {
  color: var(--color-text-secondary);
}

/* Mobile First - Single column grid */
.portfolio-showcase__grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: var(--space-lg);
}

.portfolio-item {
  position: relative;
  border-radius: var(--border-radius-lg);
  overflow: hidden;
  background: var(--color-surface-raised);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.portfolio-item:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
}

.portfolio-item__link {
  display: block;
  text-decoration: none;
  color: inherit;
}

.portfolio-item__image-wrapper {
  position: relative;
  overflow: hidden;
  aspect-ratio: 3 / 2;
  background: var(--color-surface-sunken);
}

.portfolio-item__image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.portfolio-item:hover .portfolio-item__image {
  transform: scale(1.05);
}

.portfolio-item__overlay {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.7);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.portfolio-item:hover .portfolio-item__overlay {
  opacity: 1;
}

.portfolio-item__overlay i {
  font-size: 2rem;
  color: white;
}

.portfolio-item__content {
  padding: var(--space-lg);
}

.portfolio-item__title {
  font-size: var(--font-size-lg);
  font-weight: var(--font-weight-bold);
  margin-bottom: var(--space-xs);
  color: var(--color-text-primary);
}

.portfolio-item__category {
  font-size: var(--font-size-sm);
  color: var(--color-brand-primary);
  text-transform: uppercase;
  letter-spacing: var(--letter-spacing-wide);
  font-weight: var(--font-weight-semibold);
}

/* Tablet (600px+) - Two columns */
@media (min-width: 600px) {
  .portfolio-showcase__grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

/* Desktop (1024px+) - Three columns */
@media (min-width: 1024px) {
  .portfolio-showcase__grid {
    grid-template-columns: repeat(3, 1fr);
    gap: var(--space-xl);
  }

  .portfolio-showcase {
    padding: var(--space-4xl) var(--space-xl);
  }
}
</style>
@endpush
