/**
 * Initialize All Third-Party Libraries
 * Centralized configuration for consistency
 */

import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import AOS from 'aos'
import Swiper from 'swiper'
import { Navigation, Pagination, EffectFade, Autoplay } from 'swiper/modules'
import PhotoSwipeLightbox from 'photoswipe/lightbox'
import VANTA from 'vanta/dist/vanta.waves.min'
import * as THREE from 'three'
import { setBasePath } from '@shoelace-style/shoelace/dist/utilities/base-path.js'

/**
 * Initialize GSAP with ScrollTrigger
 */
export function initGSAP() {
  gsap.registerPlugin(ScrollTrigger)

  // Global GSAP defaults
  gsap.defaults({
    ease: 'power2.out',
    duration: 0.6
  })

  console.log('✅ GSAP initialized with ScrollTrigger')
}

/**
 * Initialize AOS (Animate On Scroll)
 */
export function initAOS() {
  AOS.init({
    duration: 600,
    easing: 'ease-out-cubic',
    once: true,
    offset: 100,
    disable: 'mobile' // Optional: disable on mobile for performance
  })

  console.log('✅ AOS initialized')
}

/**
 * Initialize Swiper Sliders
 * Returns initialized Swiper instances
 */
export function initSwipers() {
  const swipers = []

  // Find all swiper containers
  document.querySelectorAll('.swiper').forEach(el => {
    const swiper = new Swiper(el, {
      modules: [Navigation, Pagination, EffectFade, Autoplay],
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      // Responsive breakpoints
      breakpoints: {
        640: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      }
    })

    swipers.push(swiper)
  })

  console.log(`✅ Swiper initialized (${swipers.length} instances)`)
  return swipers
}

/**
 * Initialize PhotoSwipe Lightbox
 */
export function initPhotoSwipe() {
  const lightbox = new PhotoSwipeLightbox({
    gallery: '.gallery',
    children: 'a',
    pswpModule: () => import('photoswipe'),
    // Custom options
    padding: { top: 20, bottom: 20, left: 20, right: 20 },
    bgOpacity: 0.9,
  })

  lightbox.init()

  console.log('✅ PhotoSwipe initialized')
  return lightbox
}

/**
 * Initialize Vanta.js Background
 * @param {string} selector - CSS selector for target element
 */
export function initVanta(selector = '#vanta-bg') {
  const el = document.querySelector(selector)

  if (!el) {
    console.warn(`⚠️ Vanta target not found: ${selector}`)
    return null
  }

  const vantaEffect = VANTA.WAVES({
    el: el,
    THREE: THREE,
    mouseControls: true,
    touchControls: true,
    gyroControls: false,
    minHeight: 200.00,
    minWidth: 200.00,
    scale: 1.00,
    scaleMobile: 1.00,
    color: 0x1a365d, // Match your theme colors
    shininess: 30.00,
    waveHeight: 15.00,
    waveSpeed: 0.50,
    zoom: 0.75
  })

  console.log('✅ Vanta.js initialized')
  return vantaEffect
}

/**
 * Initialize Shoelace
 */
export function initShoelace() {
  // Set base path for Shoelace assets
  setBasePath('/app/themes/sage/node_modules/@shoelace-style/shoelace/dist')

  console.log('✅ Shoelace initialized')
}

/**
 * Initialize all libraries
 * Call this from app.js
 */
export function initAllLibraries() {
  // Core animation libraries
  initGSAP()
  initAOS()

  // UI component libraries
  initShoelace()
  initSwipers()
  initPhotoSwipe()

  // Background effects (optional - init only where needed)
  // initVanta('#hero-background')

  console.log('🎉 All libraries initialized successfully')
}
