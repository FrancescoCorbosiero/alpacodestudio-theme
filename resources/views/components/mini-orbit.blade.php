{{-- Mini Orbit Component - Scaled down version of orbiting-hero --}}
@props(['items' => []])

<div class="mini-orbit">
  <div class="mini-orbit__wrapper">

    {{-- Use the same structure as orbiting-hero, just scaled down --}}
    <div class="orbiting-hero__container">

      {{-- Center Core --}}
      <div class="orbit-system__core">
        <div class="orbit-core__logo">
          <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Core" class="orbit-core__image">
          <div class="orbit-core__glow" aria-hidden="true"></div>
        </div>
      </div>

      {{-- Single Orbit Ring --}}
      <div class="orbit-system__ring orbit-ring--1" data-orbit="1">
        @foreach($items as $index => $item)
          <article class="orbit-ring__item" data-angle="{{ ($index * (360 / count($items))) }}" data-service="{{ $item['service'] ?? 'service-' . $index }}">
            <div class="orbit-item__badge">
              @if(isset($item['icon']))
                <i class="{{ $item['icon'] }} orbit-item__icon"></i>
              @endif
              <span class="orbit-item__label">{{ $item['label'] ?? 'Item ' . ($index + 1) }}</span>
            </div>
          </article>
        @endforeach
      </div>

      {{-- Connections SVG --}}
      <svg class="orbit-system__connections" aria-hidden="true" preserveAspectRatio="xMidYMid meet">
        <defs>
          <linearGradient id="miniOrbitLineGradient" x1="0%" y1="0%" x2="100%" y2="0%">
            <stop offset="0%" style="stop-color:rgba(255,255,255,0.1);stop-opacity:0" />
            <stop offset="50%" style="stop-color:rgba(255,255,255,0.2);stop-opacity:1" />
            <stop offset="100%" style="stop-color:rgba(255,255,255,0.1);stop-opacity:0" />
          </linearGradient>
        </defs>
      </svg>

    </div>

  </div>
</div>
