/**
 * Legacy Theme Integration - Bootstrap + jQuery Stack
 * This file loads all legacy dependencies for your migrated theme
 */

// Import jQuery and make it globally available
import $ from 'jquery'
window.jQuery = $
window.$ = $

// Import jQuery Easing
import 'jquery.easing'

// Import Bootstrap JS (includes Popper.js)
import * as bootstrap from 'bootstrap'
window.bootstrap = bootstrap

// Import Jarallax for parallax effects
import { jarallax } from 'jarallax'
window.jarallax = jarallax

// Import Chocolat lightbox
import Chocolat from 'chocolat'
window.Chocolat = Chocolat

// Import anime.js for animations
import anime from 'animejs'
window.anime = anime

// Import AOS (Animate On Scroll)
import AOS from 'aos'
window.AOS = AOS

// Import Swiper
import Swiper from 'swiper'
import { Navigation, Pagination, Autoplay, EffectFade } from 'swiper/modules'
window.Swiper = Swiper

/**
 * Initialize libraries on DOM ready
 */
$(document).ready(function() {
  console.log('🔧 Legacy theme libraries loaded')
  console.log('✅ jQuery version:', $.fn.jquery)
  console.log('✅ Bootstrap version:', bootstrap.VERSION || '5.3+')

  // Initialize AOS
  AOS.init({
    duration: 800,
    easing: 'ease-in-out',
    once: true,
    offset: 100
  })

  // Initialize all tooltips
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  // Initialize all popovers
  const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  })

  console.log('✅ Legacy theme initialized')
})

/**
 * Place your old theme's JavaScript code below this line
 * You can paste your existing JS files' content here
 */

// ============================================
// YOUR OLD THEME CODE GOES HERE
// ============================================
