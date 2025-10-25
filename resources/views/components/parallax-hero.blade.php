@props([
    'eyebrow' => null,
    'title' => '',
    'subtitle' => '',
    'buttons' => [],
    'background' => null,
    'overlay' => true,
    'overlayOpacity' => '0.5',
    'parallaxSpeed' => 0.3,
    'height' => 'full', // full, tall, medium, compact
    'alignment' => 'center', // left, center, right
    'animateTitle' => true,
    'animateSubtitle' => true,
    'titleDelay' => 0.2,
    'subtitleDelay' => 0.4,
])

@php
$classes = 'parallax-hero';
$classes .= ' parallax-hero--' . $height;
$classes .= ' parallax-hero--align-' . $alignment;

// Generate unique ID for this instance
$heroId = 'parallax-hero-' . uniqid();
$bgId = $heroId . '-bg';
$titleId = $heroId . '-title';
$subtitleId = $heroId . '-subtitle';
$contentId = $heroId . '-content';
@endphp

<section {{ $attributes->merge(['class' => $classes]) }} id="{{ $heroId }}">
  @if($background)
    <div class="parallax-hero__background" id="{{ $bgId }}">
      <img
        src="{{ $background }}"
        alt=""
        class="parallax-hero__image"
        loading="eager"
      >
      @if($overlay)
        <div
          class="parallax-hero__overlay"
          style="opacity: {{ $overlayOpacity }};"
        ></div>
      @endif
    </div>
  @endif

  <div class="container">
    <div class="parallax-hero__content" id="{{ $contentId }}">
      @if($eyebrow)
        <p class="parallax-hero__eyebrow" data-animate>{{ $eyebrow }}</p>
      @endif

      <h1 class="parallax-hero__title" id="{{ $titleId }}">
        {{ $title }}
      </h1>

      @if($subtitle)
        <p class="parallax-hero__subtitle" id="{{ $subtitleId }}">
          {{ $subtitle }}
        </p>
      @endif

      @if(!empty($buttons))
        <div class="parallax-hero__cta" data-animate>
          @foreach($buttons as $button)
            <x-button
              :variant="$button['variant'] ?? 'primary'"
              :href="$button['href'] ?? '#'"
              :size="$button['size'] ?? 'lg'"
            >
              {{ $button['text'] }}
            </x-button>
          @endforeach
        </div>
      @endif

      {{ $slot }}
    </div>
  </div>
</section>

@push('scripts')
<script type="module">
import { GSAPUtils } from '@scripts/libraries/utilities.js'

// Parallax background
@if($background)
GSAPUtils.parallax('#{{ $bgId }}', {{ $parallaxSpeed }})
@endif

// Animate title
@if($animateTitle)
GSAPUtils.fadeInOnScroll('#{{ $titleId }}', {
  y: 100,
  opacity: 0,
  duration: 1.2,
  delay: {{ $titleDelay }}
})
@endif

// Animate subtitle
@if($animateSubtitle && $subtitle)
GSAPUtils.fadeInOnScroll('#{{ $subtitleId }}', {
  y: 50,
  opacity: 0,
  duration: 1,
  delay: {{ $subtitleDelay }}
})
@endif
</script>
@endpush
