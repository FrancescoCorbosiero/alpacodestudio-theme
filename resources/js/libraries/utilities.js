/**
 * High-Level Utility Functions
 * Built on top of libraries for common use cases
 */

import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

/**
 * Fade In on Scroll (GSAP-based)
 * @param {string} selector - Elements to animate
 * @param {object} options - Custom options
 */
export function fadeInOnScroll(selector, options = {}) {
  const defaults = {
    y: 50,
    opacity: 0,
    duration: 0.8,
    stagger: 0.2,
  }

  const settings = { ...defaults, ...options }

  gsap.from(selector, {
    scrollTrigger: {
      trigger: selector,
      start: 'top 80%',
      toggleActions: 'play none none none',
    },
    ...settings
  })
}

/**
 * Parallax Effect (GSAP-based)
 * @param {string} selector - Element to parallax
 * @param {number} speed - Parallax speed (0.5 = half speed)
 */
export function parallax(selector, speed = 0.5) {
  gsap.to(selector, {
    yPercent: 100 * speed,
    ease: 'none',
    scrollTrigger: {
      trigger: selector,
      start: 'top bottom',
      end: 'bottom top',
      scrub: true,
    }
  })
}

/**
 * Stagger Animation on Scroll
 * @param {string} selector - Parent container
 * @param {string} childSelector - Children to animate
 */
export function staggerOnScroll(selector, childSelector = '.item') {
  const elements = document.querySelectorAll(`${selector} ${childSelector}`)

  gsap.from(elements, {
    scrollTrigger: {
      trigger: selector,
      start: 'top 75%',
    },
    y: 50,
    opacity: 0,
    stagger: 0.1,
    duration: 0.6,
    ease: 'power2.out'
  })
}

/**
 * Pin Element While Scrolling
 * @param {string} selector - Element to pin
 * @param {string} endTrigger - When to unpin
 */
export function pinOnScroll(selector, endTrigger = '+=500') {
  ScrollTrigger.create({
    trigger: selector,
    start: 'top top',
    end: endTrigger,
    pin: true,
    pinSpacing: false,
  })
}

/**
 * Create Timeline Animation
 * Convenience wrapper for GSAP timelines
 */
export function createTimeline(options = {}) {
  return gsap.timeline({
    scrollTrigger: {
      trigger: options.trigger,
      start: options.start || 'top 80%',
      toggleActions: 'play none none none',
      ...options.scrollTrigger
    },
    ...options
  })
}

/**
 * Animate Counter (Number Count-Up)
 * @param {string} selector - Element containing number
 * @param {number} endValue - Target number
 * @param {number} duration - Animation duration
 */
export function animateCounter(selector, endValue, duration = 2) {
  const element = document.querySelector(selector)
  if (!element) return

  gsap.to(element, {
    textContent: endValue,
    duration: duration,
    snap: { textContent: 1 },
    scrollTrigger: {
      trigger: element,
      start: 'top 80%',
      toggleActions: 'play none none none',
    }
  })
}

/**
 * Reveal Animation (from hidden state)
 * @param {string} selector - Elements to reveal
 * @param {object} options - Animation options
 */
export function revealOnScroll(selector, options = {}) {
  const defaults = {
    opacity: 0,
    scale: 0.8,
    duration: 0.8,
    stagger: 0.1,
  }

  const settings = { ...defaults, ...options }

  gsap.from(selector, {
    scrollTrigger: {
      trigger: selector,
      start: 'top 85%',
      toggleActions: 'play none none none',
    },
    ...settings
  })
}

/**
 * Slide In Animation
 * @param {string} selector - Elements to slide in
 * @param {string} direction - 'left', 'right', 'up', 'down'
 * @param {object} options - Additional options
 */
export function slideInOnScroll(selector, direction = 'left', options = {}) {
  const directionMap = {
    left: { x: -100 },
    right: { x: 100 },
    up: { y: -100 },
    down: { y: 100 }
  }

  const defaults = {
    ...directionMap[direction],
    opacity: 0,
    duration: 0.8,
    stagger: 0.1,
  }

  const settings = { ...defaults, ...options }

  gsap.from(selector, {
    scrollTrigger: {
      trigger: selector,
      start: 'top 80%',
      toggleActions: 'play none none none',
    },
    ...settings
  })
}

/**
 * Rotate On Scroll
 * @param {string} selector - Element to rotate
 * @param {number} degrees - Rotation amount in degrees
 */
export function rotateOnScroll(selector, degrees = 360) {
  gsap.to(selector, {
    rotation: degrees,
    scrollTrigger: {
      trigger: selector,
      start: 'top bottom',
      end: 'bottom top',
      scrub: 1,
    }
  })
}

/**
 * Scale On Scroll
 * @param {string} selector - Element to scale
 * @param {number} scale - Scale amount (1.5 = 150%)
 */
export function scaleOnScroll(selector, scale = 1.2) {
  gsap.to(selector, {
    scale: scale,
    scrollTrigger: {
      trigger: selector,
      start: 'top bottom',
      end: 'bottom top',
      scrub: 1,
    }
  })
}

// Export all utilities as a named object
export const GSAPUtils = {
  fadeInOnScroll,
  parallax,
  staggerOnScroll,
  pinOnScroll,
  createTimeline,
  animateCounter,
  revealOnScroll,
  slideInOnScroll,
  rotateOnScroll,
  scaleOnScroll
}
