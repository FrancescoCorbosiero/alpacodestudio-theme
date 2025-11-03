{{--
  Nav Overlay Component
  Fullscreen navigation with circular reveal animation

  Usage:
  <x-nav-overlay :links="[
    ['url' => '/', 'text' => 'Home', 'active' => true],
    ['url' => '#about', 'text' => 'About'],
  ]" />
--}}

@props(['links' => []])

{{-- Mobile Navigation Toggle (Hamburger) --}}
<button class="mobile-nav-toggle" id="mobileNavToggle" aria-label="Toggle navigation">
  <span class="mobile-nav-toggle__line"></span>
  <span class="mobile-nav-toggle__line"></span>
  <span class="mobile-nav-toggle__line"></span>
</button>

{{-- Fullscreen Nav Overlay with Circular Reveal Animation --}}
<div class="nav nav-overlay">
  <div class="nav__content">
    <ul class="nav__list">
      @forelse($links as $link)
        <li class="nav__list-item {{ $link['active'] ?? false ? 'active-nav' : '' }}">
          <a href="{{ $link['url'] ?? '#' }}">{{ $link['text'] ?? '' }}</a>
        </li>
      @empty
        <li class="nav__list-item active-nav"><a href="/">Home</a></li>
        <li class="nav__list-item"><a href="#about">About</a></li>
        <li class="nav__list-item"><a href="#portfolio">Portfolio</a></li>
        <li class="nav__list-item"><a href="#contact">Contact</a></li>
      @endforelse
    </ul>
  </div>
</div>
