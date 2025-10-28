/**
 * Curtains.js Text Demo Section
 *
 * Initializes the WebGL text rendering demo with scroll effects
 */

import { Curtains, Plane, ShaderPass } from 'curtainsjs';
import { TextTexture } from '../libraries/text-texture.js';
import { textVertexShader, textFragmentShader, scrollTextFragmentShader } from '../libraries/curtains-effects.js';

/**
 * Initialize Curtains.js Text Demo
 */
export function initCurtainsTextDemo() {
  const canvasContainer = document.getElementById('curtains-text-canvas');

  // Exit if container doesn't exist
  if (!canvasContainer) {
    return;
  }

  console.log('🎨 Initializing Curtains.js text demo...');

  // Create Curtains instance
  const curtains = new Curtains({
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
  curtains.onError(() => {
    console.error('❌ Curtains.js text demo error - falling back to regular text');
    document.body.classList.add('no-curtains');
  });

  // On successful initialization
  curtains.onSuccess(() => {
    // Define fonts to load
    const fonts = [
      'normal 900 1em "Archivo Black", sans-serif',
      'normal 400 1em "Merriweather Sans", sans-serif',
    ];

    // Load fonts
    Promise.all(fonts.map(font => document.fonts.load(font)))
      .then(() => {
        // Create scroll effect shader pass
        const scrollPass = new ShaderPass(curtains, {
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
          scroll.value = curtains.getScrollValues().y;

          // Clamp delta for smooth effect
          scroll.delta = Math.max(-30, Math.min(30, scroll.lastValue - scroll.value));

          // Lerp for smooth transitions
          scroll.effect = curtains.lerp(scroll.effect, scroll.delta, 0.05);

          // Update uniform
          scrollPass.uniforms.scrollEffect.value = scroll.effect;
        });

        // Create text planes for all .text-plane elements
        const textElements = document.querySelectorAll('.text-plane');

        if (textElements.length === 0) {
          console.warn('⚠️ No .text-plane elements found');
          return;
        }

        textElements.forEach(textElement => {
          // Create plane for this text element
          const textPlane = new Plane(curtains, textElement, {
            vertexShader: textVertexShader,
            fragmentShader: textFragmentShader,
          });

          // Create text texture
          new TextTexture({
            plane: textPlane,
            textElement: textElement,
            sampler: "uTexture",
            resolution: 1.5,
            skipFontLoading: true, // Already loaded fonts
          });
        });

        // Mark as ready
        document.body.classList.add('curtains-ready');
        console.log('✅ Curtains.js text demo initialized successfully');
      })
      .catch(error => {
        console.error('❌ Failed to load fonts:', error);
        document.body.classList.add('no-curtains');
      });
  });

  // Cleanup on page unload
  const cleanup = () => {
    if (curtains) {
      curtains.dispose();
      console.log('🧹 Curtains.js text demo cleaned up');
    }
  };

  window.addEventListener('beforeunload', cleanup);

  // Return cleanup function for manual disposal
  return cleanup;
}

// Auto-initialize when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initCurtainsTextDemo);
} else {
  // DOM already loaded
  initCurtainsTextDemo();
}
