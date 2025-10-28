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