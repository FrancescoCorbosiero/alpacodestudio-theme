@props([
    'speed' => 0.5,
    'background' => null,
    'overlay' => false,
    'overlayOpacity' => '0.3',
    'trigger' => null, // Custom trigger selector
    'start' => 'top bottom',
    'end' => 'bottom top',
    'layers' => [], // Array of layer configs: [['speed' => 0.3, 'class' => 'layer-1'], ...]
])

@php
$classes = 'parallax-section';
$sectionId = 'parallax-section-' . uniqid();
$hasMultipleLayers = !empty($layers);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }} id="{{ $sectionId }}">
  @if($background && !$hasMultipleLayers)
    <div class="parallax-section__background" id="{{ $sectionId }}-bg">
      <img
        src="{{ $background }}"
        alt=""
        class="parallax-section__image"
        loading="lazy"
      >
      @if($overlay)
        <div
          class="parallax-section__overlay"
          style="opacity: {{ $overlayOpacity }};"
        ></div>
      @endif
    </div>
  @endif

  @if($hasMultipleLayers)
    <div class="parallax-section__layers">
      @foreach($layers as $index => $layer)
        <div
          class="parallax-section__layer {{ $layer['class'] ?? '' }}"
          id="{{ $sectionId }}-layer-{{ $index }}"
          data-speed="{{ $layer['speed'] ?? 0.5 }}"
        >
          @if(isset($layer['image']))
            <img
              src="{{ $layer['image'] }}"
              alt="{{ $layer['alt'] ?? '' }}"
              loading="lazy"
            >
          @endif
          @if(isset($layer['content']))
            {!! $layer['content'] !!}
          @endif
        </div>
      @endforeach
    </div>
  @endif

  <div class="parallax-section__content">
    {{ $slot }}
  </div>
</div>

@push('scripts')
<script type="module">
import { GSAPUtils } from '@scripts/libraries/utilities.js'

@if(!$hasMultipleLayers && $background)
// Single parallax background
GSAPUtils.parallax('#{{ $sectionId }}-bg', {{ $speed }})
@endif

@if($hasMultipleLayers)
// Multiple parallax layers
@foreach($layers as $index => $layer)
GSAPUtils.parallax('#{{ $sectionId }}-layer-{{ $index }}', {{ $layer['speed'] ?? 0.5 }})
@endforeach
@endif
</script>
@endpush
