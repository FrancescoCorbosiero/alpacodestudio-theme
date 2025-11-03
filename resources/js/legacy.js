/**
 * Modern Refactored Theme - Vanilla JS + Modern Libraries
 * No jQuery, No Bootstrap JS
 */

// Import AOS (Animate On Scroll)
import AOS from 'aos'
window.AOS = AOS

// Import Swiper
import Swiper from 'swiper'
import { Navigation, Pagination, Autoplay, EffectFade, Thumbs } from 'swiper/modules'
window.Swiper = Swiper

// Import PhotoSwipe for lightbox
import PhotoSwipeLightbox from 'photoswipe/lightbox'
import PhotoSwipe from 'photoswipe'
window.PhotoSwipeLightbox = PhotoSwipeLightbox
window.PhotoSwipe = PhotoSwipe

/**
 * Modern Theme Functions - Vanilla JavaScript
 * No jQuery dependencies
 */

// Initialize Swiper Sliders
function initSliders() {
  // Navigation swiper for banner
  const navSwiper = new Swiper(".swiper.banner-nav-slider", {
    slidesPerView: "auto",
    spaceBetween: 10,
  });

  // Main banner swiper
  const bannerSwiper = new Swiper(".swiper.banner-slider", {
    modules: [Autoplay, Thumbs],
    slidesPerView: 1,
    speed: 900,
    autoplay: {
      delay: 4000,
    },
    thumbs: {
      swiper: navSwiper,
    },
  });

  // Background image swiper
  const imageSlider = new Swiper(".swiper.image-slider", {
    slidesPerView: 1,
    speed: 900,
  });

  // Sync background image with banner
  bannerSwiper.on('slideChange', function() {
    imageSlider.slideTo(bannerSwiper.activeIndex);
  });

  // Portfolio Slider
  const portfolioSwiper = new Swiper(".portfolio-Swiper", {
    modules: [Pagination],
    slidesPerView: 4,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      300: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 30,
      },
    },
  });

  console.log('✅ Swiper sliders initialized');
}

// Animate Text Effects (Vanilla JS replacement for jQuery version)
function initTextFx() {
  const txtFxElements = document.querySelectorAll('.txt-fx');

  txtFxElements.forEach(function(element) {
    let newHTML = '';
    let count = 0;
    const delay = 300;
    const stagger = 10;
    const words = element.textContent.split(/\s/);
    const arrWords = [];

    words.forEach(function(word) {
      let wordHTML = '<span class="word">';

      for (let i = 0; i < word.length; i++) {
        const char = word[i];
        const transitionDelay = delay + (stagger * count);
        wordHTML += `<span class='letter' style='transition-delay:${transitionDelay}ms;'>${char}</span>`;
        count++;
      }
      wordHTML += '</span>';

      arrWords.push(wordHTML);
      count++;
    });

    element.innerHTML = arrWords.join(`<span class='letter' style='transition-delay:${delay}ms;'>&nbsp;</span>`);
  });

  console.log('✅ Text effects initialized');
}

// Portfolio Filter (Vanilla JS replacement for Isotope)
function initPortfolioFilter() {
  const grids = document.querySelectorAll('.grid');

  grids.forEach(function(grid) {
    const buttonGroup = grid.parentElement.querySelector('.button-group');
    if (!buttonGroup) return;

    const filterButtons = buttonGroup.querySelectorAll('a');
    const portfolioItems = grid.querySelectorAll('.portfolio-item');

    // Filter function
    function filterItems(filterValue) {
      portfolioItems.forEach(function(item) {
        if (filterValue === '*' || item.classList.contains(filterValue.replace('.', ''))) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
    }

    // Get initial filter
    const checkedButton = buttonGroup.querySelector('.is-checked');
    if (checkedButton) {
      const initialFilter = checkedButton.getAttribute('data-filter');
      filterItems(initialFilter);
    }

    // Add click handlers
    filterButtons.forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault();

        // Remove is-checked from all buttons
        filterButtons.forEach(btn => btn.classList.remove('is-checked'));

        // Add is-checked to clicked button
        this.classList.add('is-checked');

        // Filter items
        const filterValue = this.getAttribute('data-filter');
        filterItems(filterValue);
      });
    });
  });

  console.log('✅ Portfolio filter initialized');
}

// Initialize PhotoSwipe Lightbox (replacement for Chocolat)
function initLightbox() {
  const lightbox = new PhotoSwipeLightbox({
    gallery: '.portfolio-content',
    children: '.image-link',
    pswpModule: () => PhotoSwipe,
    padding: { top: 20, bottom: 20, left: 20, right: 20 },
    bgOpacity: 0.9,
  });

  lightbox.init();

  console.log('✅ PhotoSwipe lightbox initialized');
}

// Toggle mobile menu (Vanilla JS replacement for jQuery)
function initMobileMenu() {
  const menuBtn = document.querySelector('.menu-btn');
  const menuToggle = document.querySelector('#menu-toggle');

  if (menuBtn) {
    menuBtn.addEventListener('click', function(e) {
      document.body.classList.toggle('nav-active');
    });
  }

  if (menuToggle) {
    menuToggle.addEventListener('change', function() {
      if (this.checked) {
        document.body.classList.add('nav-active');
      } else {
        document.body.classList.remove('nav-active');
      }
    });
  }

  console.log('✅ Mobile menu initialized');
}

// Initialize everything on DOM ready
document.addEventListener('DOMContentLoaded', function() {
  console.log('🚀 Modern theme initializing...');

  // Initialize sliders
  initSliders();

  // Initialize text effects
  initTextFx();

  // Initialize lightbox
  initLightbox();

  // Initialize portfolio filter
  initPortfolioFilter();

  // Initialize mobile menu
  initMobileMenu();

  // Initialize AOS
  AOS.init({
    duration: 1200,
    // once: true,
  });

  console.log('✅ Modern theme fully initialized');
});

// Page load event
window.addEventListener('load', function() {
  document.body.classList.add('loaded');

  // Re-initialize portfolio filter after images load
  initPortfolioFilter();

  console.log('✅ Page fully loaded');
});