/**
 * Curtains.js Text Demo Section
 *
 * Initializes the WebGL text rendering demo with scroll effects
 */

import { Curtains, Plane, ShaderPass } from 'curtainsjs';
import { TextTexture } from '../libraries/text-texture.js';
import { textVertexShader, textFragmentShader, scrollTextFragmentShader } from '../libraries/curtains-effects.js';

let curtainsInstance = null;
let isInitialized = false;

/**
 * Check if container has valid dimensions
 */
function hasValidDimensions(element) {
  const rect = element.getBoundingClientRect();
  return rect.width > 0 && rect.height > 0;
}

/**
 * Initialize Curtains.js Text Demo
 */
function initCurtainsTextDemo() {
  // Prevent multiple initializations
  if (isInitialized) {
    return;
  }

  const section = document.querySelector('.curtains-text-demo');
  const canvasContainer = document.getElementById('curtains-text-canvas');

  // Exit if elements don't exist
  if (!section || !canvasContainer) {
    return;
  }

  // Check if container has valid dimensions
  if (!hasValidDimensions(canvasContainer)) {
    console.warn('⚠️ Canvas container has zero dimensions, cannot initialize');
    document.body.classList.add('no-curtains');
    return;
  }

  console.log('🎨 Initializing Curtains.js text demo...');
  isInitialized = true;

  // Create Curtains instance
  curtainsInstance = new Curtains({
    container: canvasContainer,
    pixelRatio: Math.min(1.5, window.devicePixelRatio),
    watchScroll: true,
    alpha: true,
    premultipliedAlpha: true,
  });

  // Track scroll values
  const scroll = {
    value: 0,
    lastValue: 0,
    effect: 0,
    delta: 0,
  };

  // Handle errors
  curtainsInstance.onError(() => {
    console.error('❌ Curtains.js text demo error - falling back to regular text');
    document.body.classList.add('no-curtains');
    isInitialized = false;
  });

  // On successful initialization
  curtainsInstance.onSuccess(() => {
    // Define fonts to load
    const fonts = [
      'normal 900 1em "Archivo Black", sans-serif',
      'normal 400 1em "Merriweather Sans", sans-serif',
    ];

    // Load fonts
    Promise.all(fonts.map(font => document.fonts.load(font)))
      .then(() => {
        // Create scroll effect shader pass
        const scrollPass = new ShaderPass(curtainsInstance, {
          fragmentShader: scrollTextFragmentShader,
          depth: false,
          uniforms: {
            scrollEffect: {
              name: "uScrollEffect",
              type: "1f",
              value: 0,
            },
            scrollStrength: {
              name: "uScrollStrength",
              type: "1f",
              value: 2.5,
            },
          }
        });

        // Update scroll effect on each frame
        scrollPass.onRender(() => {
          scroll.lastValue = scroll.value;
          scroll.value = curtainsInstance.getScrollValues().y;

          // Clamp delta for smooth effect
          scroll.delta = Math.max(-30, Math.min(30, scroll.lastValue - scroll.value));

          // Lerp for smooth transitions
          scroll.effect = curtainsInstance.lerp(scroll.effect, scroll.delta, 0.05);

          // Update uniform
          scrollPass.uniforms.scrollEffect.value = scroll.effect;
        });

        // Create text planes for all .text-plane elements
        const textElements = document.querySelectorAll('.curtains-text-demo .text-plane');

        if (textElements.length === 0) {
          console.warn('⚠️ No .text-plane elements found');
          return;
        }

        console.log(`📝 Found ${textElements.length} text elements to render`);

        textElements.forEach((textElement, index) => {
          console.log(`Creating plane ${index + 1} for:`, textElement.textContent.substring(0, 50) + '...');

          // Create plane for this text element
          const textPlane = new Plane(curtainsInstance, textElement, {
            vertexShader: textVertexShader,
            fragmentShader: textFragmentShader,
          });

          console.log(`Plane ${index + 1} created:`, textPlane);

          // Create text texture
          const textTexture = new TextTexture({
            plane: textPlane,
            textElement: textElement,
            sampler: "uTexture",
            resolution: 1.5,
            skipFontLoading: true, // Already loaded fonts
          });

          console.log(`TextTexture ${index + 1} created:`, textTexture);

          // Log plane rendering
          textPlane.onRender(() => {
            if (index === 0) { // Only log first plane to avoid spam
              console.log('Plane rendering, texture:', textPlane.textures);
            }
          });
        });

        // Mark as ready
        document.body.classList.add('curtains-ready');
        console.log('✅ Curtains.js text demo initialized successfully');
        console.log('Canvas element:', curtainsInstance.canvas);
        console.log('All planes:', curtainsInstance.planes);
      })
      .catch(error => {
        console.error('❌ Failed to load fonts:', error);
        document.body.classList.add('no-curtains');
      });
  });

  // Cleanup on page unload
  const cleanup = () => {
    if (curtainsInstance) {
      curtainsInstance.dispose();
      curtainsInstance = null;
      isInitialized = false;
      console.log('🧹 Curtains.js text demo cleaned up');
    }
  };

  window.addEventListener('beforeunload', cleanup);

  // Return cleanup function for manual disposal
  return cleanup;
}

/**
 * Setup IntersectionObserver to initialize when section is visible
 */
function setupObserver() {
  const section = document.querySelector('.curtains-text-demo');

  if (!section) {
    return;
  }

  // Skip initialization on small screens or reduced motion
  const isMobile = window.matchMedia('(max-width: 640px)').matches;
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (isMobile || prefersReducedMotion) {
    console.log('📱 Skipping Curtains.js init (mobile or reduced motion)');
    document.body.classList.add('no-curtains');
    return;
  }

  // Use IntersectionObserver to detect when section enters viewport
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && !isInitialized) {
        console.log('📍 Curtains demo section is visible, initializing...');

        // Give it a moment for layout to settle
        setTimeout(() => {
          initCurtainsTextDemo();
        }, 300);

        // Unobserve after initialization attempt
        observer.unobserve(section);
      }
    });
  }, {
    threshold: 0.1, // Trigger when 10% visible
    rootMargin: '100px' // Start loading a bit before it's visible
  });

  observer.observe(section);
}

// Wait for page to be fully loaded (after loader disappears)
if (document.readyState === 'complete') {
  // Page already loaded
  setupObserver();
} else {
  // Wait for load event
  window.addEventListener('load', () => {
    // Extra delay to ensure page loader has finished
    setTimeout(setupObserver, 500);
  }, { once: true });
}
