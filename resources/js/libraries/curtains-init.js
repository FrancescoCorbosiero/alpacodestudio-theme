/**
 * Curtains.js Initialization and Management
 *
 * This module handles the initialization and management of Curtains.js
 * WebGL effects throughout the theme.
 */

import { Curtains, Plane } from 'curtainsjs';
import { getEffectPreset } from './curtains-effects.js';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

/**
 * Global Curtains instance
 */
let curtainsInstance = null;
let activePlanes = [];

/**
 * Initialize Curtains.js
 * @param {string|HTMLElement} containerSelector - CSS selector or DOM element for the canvas container
 * @returns {Curtains} Curtains instance
 */
export function initCurtains(containerSelector = 'body') {
  // Prevent multiple initializations
  if (curtainsInstance) {
    console.log('⚠️ Curtains.js already initialized');
    return curtainsInstance;
  }

  try {
    // Get the container element
    const container = typeof containerSelector === 'string'
      ? document.querySelector(containerSelector)
      : containerSelector;

    if (!container) {
      console.error('❌ Container element not found:', containerSelector);
      return null;
    }

    curtainsInstance = new Curtains({
      container: container,
      pixelRatio: Math.min(1.5, window.devicePixelRatio), // Cap for performance
      watchScroll: true, // Enable scroll detection
      production: process.env.NODE_ENV === 'production',
      premultipliedAlpha: true,
      alpha: true,
      antialias: false, // Disable for performance
    });

    // Handle WebGL context loss
    curtainsInstance.onError(() => {
      console.error('❌ Curtains.js encountered an error');
      document.body.classList.add('no-curtains');
    }).onContextLost(() => {
      console.warn('⚠️ WebGL context lost');
    }).onContextRestored(() => {
      console.log('✅ WebGL context restored');
    });

    // Auto-initialize planes with data-curtains attribute
    autoInitializePlanes();

    console.log('✅ Curtains.js initialized successfully');
    return curtainsInstance;

  } catch (error) {
    console.error('❌ Failed to initialize Curtains.js:', error);
    document.body.classList.add('no-curtains');
    return null;
  }
}

/**
 * Create a new Plane with specified effect
 * @param {HTMLElement|string} element - DOM element or CSS selector
 * @param {string} effectType - Effect preset name
 * @param {object} customOptions - Custom plane options
 * @returns {Plane} Curtains Plane instance
 */
export function createPlane(element, effectType = 'displacement', customOptions = {}) {
  if (!curtainsInstance) {
    console.error('❌ Curtains.js not initialized. Call initCurtains() first.');
    return null;
  }

  const el = typeof element === 'string' ? document.querySelector(element) : element;

  if (!el) {
    console.warn('⚠️ Element not found for Curtains plane');
    return null;
  }

  // Get effect preset
  const effectPreset = getEffectPreset(effectType);

  // Default plane parameters
  const defaultParams = {
    vertexShader: effectPreset.vertexShader,
    fragmentShader: effectPreset.fragmentShader,
    widthSegments: 10,
    heightSegments: 10,
    uniforms: effectPreset.uniforms,
    ...customOptions
  };

  try {
    const plane = new Plane(curtainsInstance, el, defaultParams);

    // Store reference
    activePlanes.push({ plane, element: el, effect: effectType });

    // Setup plane with interactions
    setupPlaneInteractions(plane, effectType);

    return plane;

  } catch (error) {
    console.error('❌ Failed to create Curtains plane:', error);
    return null;
  }
}

/**
 * Auto-initialize all elements with data-curtains attribute
 */
function autoInitializePlanes() {
  const elements = document.querySelectorAll('[data-curtains]');

  elements.forEach(el => {
    const effectType = el.getAttribute('data-curtains') || 'displacement';
    const depth = parseFloat(el.getAttribute('data-depth')) || 1.0;

    createPlane(el, effectType, {
      uniforms: {
        ...getEffectPreset(effectType).uniforms,
        depth: { name: "uDepth", type: "1f", value: depth }
      }
    });
  });

  console.log(`✅ Auto-initialized ${elements.length} Curtains planes`);
}

/**
 * Setup interactions for a plane (mouse, scroll, etc.)
 * @param {Plane} plane - Curtains Plane instance
 * @param {string} effectType - Effect type
 */
function setupPlaneInteractions(plane, effectType) {
  let mouseStrength = 0;
  let time = 0;
  let mousePos = { x: 0.5, y: 0.5 };

  // Track mouse position relative to plane
  const updateMousePosition = (e) => {
    const rect = plane.htmlElement.getBoundingClientRect();
    const x = (e.clientX - rect.left) / rect.width;
    const y = 1 - (e.clientY - rect.top) / rect.height; // Invert Y for WebGL

    mousePos.x = Math.max(0, Math.min(1, x));
    mousePos.y = Math.max(0, Math.min(1, y));
  };

  // Mouse move tracking
  plane.htmlElement.addEventListener('mousemove', updateMousePosition);

  // Mouse enter - animate strength
  plane.htmlElement.addEventListener('mouseenter', () => {
    gsap.to({ value: mouseStrength }, {
      value: 1,
      duration: 0.6,
      ease: 'power2.out',
      onUpdate: function() {
        mouseStrength = this.targets()[0].value;
        if (plane.uniforms.mouseStrength) {
          plane.uniforms.mouseStrength.value = mouseStrength;
        }
        if (plane.uniforms.strength) {
          plane.uniforms.strength.value = mouseStrength;
        }
      }
    });
  });

  // Mouse leave - reset strength
  plane.htmlElement.addEventListener('mouseleave', () => {
    gsap.to({ value: mouseStrength }, {
      value: 0,
      duration: 0.8,
      ease: 'power2.out',
      onUpdate: function() {
        mouseStrength = this.targets()[0].value;
        if (plane.uniforms.mouseStrength) {
          plane.uniforms.mouseStrength.value = mouseStrength;
        }
        if (plane.uniforms.strength) {
          plane.uniforms.strength.value = mouseStrength;
        }
      }
    });
  });

  // Render loop for time-based effects
  plane.onRender(() => {
    time += 0.01;

    // Update mouse uniform
    if (plane.uniforms.mouse) {
      plane.uniforms.mouse.value = [mousePos.x, mousePos.y];
    }

    // Update time uniform
    if (plane.uniforms.time) {
      plane.uniforms.time.value = time;
    }

    // Update scroll effect based on plane position
    if (plane.uniforms.scrollEffect) {
      const planePosition = plane.relativeTranslation.y;
      plane.uniforms.scrollEffect.value = planePosition / 1000;
    }
  });

  // ScrollTrigger integration for scroll-based effects
  if (effectType === 'wave' || effectType === 'parallax') {
    ScrollTrigger.create({
      trigger: plane.htmlElement,
      start: 'top bottom',
      end: 'bottom top',
      scrub: true,
      onUpdate: (self) => {
        if (plane.uniforms.scrollEffect) {
          plane.uniforms.scrollEffect.value = self.progress;
        }
      }
    });
  }
}

/**
 * Get Curtains instance
 * @returns {Curtains} Curtains instance
 */
export function getCurtains() {
  return curtainsInstance;
}

/**
 * Get all active planes
 * @returns {Array} Array of active planes
 */
export function getActivePlanes() {
  return activePlanes;
}

/**
 * Remove a specific plane
 * @param {Plane} plane - Plane to remove
 */
export function removePlane(plane) {
  if (plane) {
    const index = activePlanes.findIndex(p => p.plane === plane);
    if (index > -1) {
      activePlanes.splice(index, 1);
    }
    plane.remove();
  }
}

/**
 * Remove all planes
 */
export function removeAllPlanes() {
  activePlanes.forEach(({ plane }) => {
    plane.remove();
  });
  activePlanes = [];
  console.log('✅ All Curtains planes removed');
}

/**
 * Dispose Curtains instance
 */
export function disposeCurtains() {
  if (curtainsInstance) {
    removeAllPlanes();
    curtainsInstance.dispose();
    curtainsInstance = null;
    console.log('✅ Curtains.js disposed');
  }
}

/**
 * Resize handler (call on window resize)
 */
export function resizeCurtains() {
  if (curtainsInstance) {
    curtainsInstance.resize();
  }
}

// Handle window resize
window.addEventListener('resize', () => {
  resizeCurtains();
});

// Cleanup on page unload
window.addEventListener('beforeunload', () => {
  disposeCurtains();
});
