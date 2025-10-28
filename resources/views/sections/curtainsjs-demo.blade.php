{{--
  Curtains.js Text Demo Section

  Demonstrates WebGL text rendering with scroll effects using Curtains.js.
  Features dynamic text-to-texture rendering with scroll-based distortion.
--}}

@push('styles')
{{-- Load Google Fonts for the demo --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Merriweather+Sans:wght@300;400;700&display=swap" rel="stylesheet">
@endpush

<section class="curtains-text-demo" role="region" aria-label="WebGL Text Demo">
  {{-- WebGL Canvas Container --}}
  <div id="curtains-text-canvas" class="curtains-text-demo__canvas"></div>

  {{-- Text Content --}}
  <div class="curtains-text-demo__content">
    {{-- Main Heading --}}
    <h1 class="curtains-text-demo__title">
      <span class="text-plane">Alpacode Studio</span>
    </h1>

    {{-- Subtitle --}}
    <h2 class="curtains-text-demo__subtitle">
      <span class="text-plane">
        Rendering text<br />
        to WebGL
      </span>
    </h2>

    {{-- Process Explanation --}}
    <div class="curtains-text-demo__block">
      <p>
        <span class="text-plane">
          This is an example of how we can render whole blocks of text to WebGL thanks to Curtains.js and the TextTexture class.
        </span>
      </p>
      <p>
        <span class="text-plane">
          A WebGL plane is created for all elements that have a "text-plane" class and their text contents are drawn inside a 2D canvas, which is then used as a WebGL texture.
        </span>
      </p>
    </div>

    {{-- Scroll Effect --}}
    <div class="curtains-text-demo__block curtains-text-demo__block--center">
      <p>
        <span class="text-plane">
          We're using an additional shader pass to add a cool effect on scroll that makes you feel like the content is actually dragged.
        </span>
      </p>
      <p>
        <span class="text-plane">
          Try to scroll down to see what happens!
        </span>
      </p>
    </div>

    {{-- Additional Content --}}
    <div class="curtains-text-demo__block curtains-text-demo__block--right">
      <p>
        <span class="text-plane">
          This technique opens up amazing possibilities for creative web experiences. You can apply any WebGL effect to text while maintaining full accessibility.
        </span>
      </p>
      <p>
        <span class="text-plane">
          The text remains in the DOM for screen readers and SEO, while the visual rendering happens in WebGL for stunning effects.
        </span>
      </p>
    </div>
  </div>
</section>

@push('scripts')
<script type="module">
import { Curtains, Plane, ShaderPass } from 'curtainsjs';
import { TextTexture } from '/resources/js/libraries/text-texture.js';
import { textVertexShader, textFragmentShader, scrollTextFragmentShader } from '/resources/js/libraries/curtains-effects.js';

/**
 * Initialize Curtains.js Text Demo
 */
document.addEventListener('DOMContentLoaded', () => {
  const canvasContainer = document.getElementById('curtains-text-canvas');

  if (!canvasContainer) {
    console.warn('Curtains text canvas not found');
    return;
  }

  // Create Curtains instance
  const curtains = new Curtains({
    container: canvasContainer,
    pixelRatio: Math.min(1.5, window.devicePixelRatio),
    watchScroll: true,
    alpha: true,
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
    console.error('Curtains.js error - falling back to regular text');
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
        console.log('✅ Curtains.js text demo initialized');
      })
      .catch(error => {
        console.error('Failed to load fonts:', error);
        document.body.classList.add('no-curtains');
      });
  });

  // Cleanup on page unload
  window.addEventListener('beforeunload', () => {
    if (curtains) {
      curtains.dispose();
    }
  });
});
</script>
@endpush