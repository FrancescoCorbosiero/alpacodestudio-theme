{{--
  Template Name: Component Demo
  Description: Demonstrates all new plug-and-play components
--}}

@extends('layouts.app')

@section('content')

{{-- ============================================
     DEMO 1: Basic Parallax Hero
     ============================================ --}}

<x-parallax-hero
  title="Welcome to Component Heaven"
  subtitle="Build stunning websites in minutes, not hours"
  background="https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1920&q=80"
  :buttons="[
    ['text' => 'Get Started', 'href' => '#demo', 'variant' => 'primary', 'size' => 'lg'],
    ['text' => 'View Docs', 'href' => '#docs', 'variant' => 'secondary', 'size' => 'lg']
  ]"
/>


{{-- ============================================
     DEMO 2: Parallax Hero with Eyebrow & Custom Settings
     ============================================ --}}

<x-parallax-hero
  eyebrow="New Release"
  title="Design Without Limits"
  subtitle="Experience the power of CSS4-first architecture with pre-built components"
  background="https://images.unsplash.com/photo-1557683316-973673baf926?w=1920&q=80"
  height="tall"
  alignment="left"
  parallaxSpeed="0.5"
  overlayOpacity="0.7"
  :buttons="[
    ['text' => 'Start Free Trial', 'href' => '#trial', 'variant' => 'primary'],
    ['text' => 'Watch Demo', 'href' => '#demo', 'variant' => 'ghost']
  ]"
/>


{{-- ============================================
     DEMO 3: Parallax Section with Single Background
     ============================================ --}}

<x-parallax-section
  background="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1920&q=80"
  speed="0.4"
  overlay="true"
  overlayOpacity="0.8"
>
  <div class="container section section--lg">
    <h2 class="display-2 text-center" data-animate style="color: var(--color-neutral-0);">
      Powerful Features
    </h2>
    <p class="text-center" data-animate style="color: var(--color-neutral-100); font-size: var(--font-size-xl); max-width: 45rem; margin-inline: auto;">
      Everything you need to build modern web experiences
    </p>

    <div class="grid grid--3 gap-lg" style="margin-block-start: var(--space-2xl);">
      <x-card>
        <x-slot:header>
          <h3>CSS4-First</h3>
        </x-slot:header>
        <p>Modern CSS features like OKLCH colors, container queries, and CSS layers.</p>
      </x-card>

      <x-card>
        <x-slot:header>
          <h3>GSAP Animations</h3>
        </x-slot:header>
        <p>Professional scroll-triggered animations with one-line utilities.</p>
      </x-card>

      <x-card>
        <x-slot:header>
          <h3>Responsive</h3>
        </x-slot:header>
        <p>Fluid typography and spacing using clamp() for seamless scaling.</p>
      </x-card>
    </div>
  </div>
</x-parallax-section>


{{-- ============================================
     DEMO 4: Multi-Layer Parallax Section
     ============================================ --}}

<x-parallax-section
  :layers="[
    [
      'speed' => 0.2,
      'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1920&q=80',
      'class' => 'parallax-back'
    ],
    [
      'speed' => 0.5,
      'content' => '<div style=\'position: absolute; inset: 0; background: linear-gradient(180deg, transparent, rgba(0,0,0,0.5));\'></div>'
    ],
    [
      'speed' => 0.8,
      'content' => '<div style=\'position: absolute; bottom: 0; left: 0; right: 0; height: 30%; background: linear-gradient(180deg, transparent, rgba(0,0,0,0.8));\'></div>'
    ]
  ]"
>
  <div class="container section section--lg" style="position: relative; z-index: 3;">
    <h2 class="display-2 text-center" data-animate style="color: var(--color-neutral-0);">
      Multi-Layer Depth
    </h2>
    <p class="text-center" data-animate style="color: var(--color-neutral-100); font-size: var(--font-size-xl); max-width: 45rem; margin-inline: auto;">
      Experience stunning parallax effects with multiple layers moving at different speeds
    </p>
  </div>
</x-parallax-section>


{{-- ============================================
     DEMO 5: Social Icons - All Variants
     ============================================ --}}

<section class="section section--lg" id="social-icons-demo" style="background: var(--color-surface-base);">
  <div class="container">
    <h2 class="display-2 text-center" data-animate>Social Icons Showcase</h2>

    {{-- Inline Default --}}
    <div style="margin-block: var(--space-2xl); text-align: center;">
      <h3 class="h4">Inline Default</h3>
      <x-social-icons
        :platforms="['github', 'twitter', 'linkedin', 'dribbble']"
        orientation="horizontal"
      />
    </div>

    {{-- Inline Filled --}}
    <div style="margin-block: var(--space-2xl); text-align: center;">
      <h3 class="h4">Inline Filled</h3>
      <x-social-icons
        variant="filled"
        :platforms="['github', 'twitter', 'linkedin', 'dribbble']"
        orientation="horizontal"
      />
    </div>

    {{-- Inline Outlined --}}
    <div style="margin-block: var(--space-2xl); text-align: center;">
      <h3 class="h4">Inline Outlined</h3>
      <x-social-icons
        variant="outlined"
        :platforms="['github', 'twitter', 'linkedin', 'dribbble']"
        orientation="horizontal"
      />
    </div>

    {{-- Inline Labeled --}}
    <div style="margin-block: var(--space-2xl); text-align: center;">
      <h3 class="h4">Inline Labeled</h3>
      <x-social-icons
        variant="labeled"
        :platforms="['github', 'twitter', 'linkedin']"
        orientation="horizontal"
      />
    </div>

    {{-- Size Variations --}}
    <div style="margin-block: var(--space-2xl); text-align: center;">
      <h3 class="h4">Size Variations</h3>
      <div style="display: flex; gap: var(--space-2xl); justify-content: center; align-items: center;">
        <div>
          <p style="margin-block-end: var(--space-sm);">Small</p>
          <x-social-icons
            size="sm"
            variant="filled"
            :platforms="['github', 'twitter', 'linkedin']"
            orientation="horizontal"
          />
        </div>
        <div>
          <p style="margin-block-end: var(--space-sm);">Base</p>
          <x-social-icons
            size="base"
            variant="filled"
            :platforms="['github', 'twitter', 'linkedin']"
            orientation="horizontal"
          />
        </div>
        <div>
          <p style="margin-block-end: var(--space-sm);">Large</p>
          <x-social-icons
            size="lg"
            variant="filled"
            :platforms="['github', 'twitter', 'linkedin']"
            orientation="horizontal"
          />
        </div>
      </div>
    </div>
  </div>
</section>


{{-- ============================================
     DEMO 6: Fixed Social Icons
     Uncomment to enable (will stay on screen)
     ============================================ --}}

{{--
<x-social-icons
  position="fixed-left"
  variant="filled"
  :platforms="['github', 'twitter', 'linkedin', 'dribbble']"
  animated="true"
/>
--}}

{{--
<x-social-icons
  position="fixed-bottom"
  variant="filled"
  :platforms="['github', 'twitter', 'linkedin', 'email']"
  orientation="horizontal"
/>
--}}


{{-- ============================================
     DEMO 7: GSAP Animation Showcase
     ============================================ --}}

<section class="section section--lg" style="background: var(--color-surface-raised);">
  <div class="container">
    <h2 class="display-2 text-center fade-demo">GSAP Animation Utilities</h2>

    {{-- Fade In --}}
    <div class="grid grid--3 gap-lg" style="margin-block-start: var(--space-2xl);">
      <div class="fade-in-demo" style="padding: var(--space-lg); background: var(--color-surface-base); border-radius: var(--radius-lg);">
        <h3>Fade In</h3>
        <p>Smooth fade in on scroll</p>
      </div>
      <div class="fade-in-demo" style="padding: var(--space-lg); background: var(--color-surface-base); border-radius: var(--radius-lg);">
        <h3>With Stagger</h3>
        <p>Animated in sequence</p>
      </div>
      <div class="fade-in-demo" style="padding: var(--space-lg); background: var(--color-surface-base); border-radius: var(--radius-lg);">
        <h3>Delay Effect</h3>
        <p>Staggered delay timing</p>
      </div>
    </div>

    {{-- Slide In --}}
    <div class="grid grid--2 gap-lg" style="margin-block-start: var(--space-2xl);">
      <div class="slide-left-demo" style="padding: var(--space-lg); background: var(--color-surface-base); border-radius: var(--radius-lg);">
        <h3>Slide from Left</h3>
        <p>Slides in from the left side</p>
      </div>
      <div class="slide-right-demo" style="padding: var(--space-lg); background: var(--color-surface-base); border-radius: var(--radius-lg);">
        <h3>Slide from Right</h3>
        <p>Slides in from the right side</p>
      </div>
    </div>

    {{-- Reveal Scale --}}
    <div class="grid grid--4 gap-md" style="margin-block-start: var(--space-2xl);">
      <div class="reveal-demo" style="padding: var(--space-md); background: var(--color-brand-primary); color: white; border-radius: var(--radius-md); text-align: center;">
        <h4>Scale</h4>
      </div>
      <div class="reveal-demo" style="padding: var(--space-md); background: var(--color-brand-secondary); color: white; border-radius: var(--radius-md); text-align: center;">
        <h4>Reveal</h4>
      </div>
      <div class="reveal-demo" style="padding: var(--space-md); background: var(--color-brand-accent); color: white; border-radius: var(--radius-md); text-align: center;">
        <h4>Effect</h4>
      </div>
      <div class="reveal-demo" style="padding: var(--space-md); background: var(--color-brand-primary); color: white; border-radius: var(--radius-md); text-align: center;">
        <h4>Demo</h4>
      </div>
    </div>
  </div>
</section>


{{-- ============================================
     DEMO 8: Complete Landing Page Example
     ============================================ --}}

<x-parallax-hero
  eyebrow="Get Started Today"
  title="Ready to Build Something Amazing?"
  subtitle="Join thousands of developers using our component framework"
  background="https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=1920&q=80"
  height="medium"
  :buttons="[
    ['text' => 'Start Free Trial', 'href' => '#', 'variant' => 'primary', 'size' => 'lg'],
    ['text' => 'Contact Sales', 'href' => '#', 'variant' => 'secondary', 'size' => 'lg']
  ]"
/>

@endsection

{{-- ============================================
     Initialize Custom GSAP Animations for Demo
     ============================================ --}}

@push('scripts')
<script type="module">
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initDemoAnimations)
} else {
  initDemoAnimations()
}

async function initDemoAnimations() {
  try {
    const { GSAPUtils } = await import('@scripts/libraries/utilities.js')

    // Demo animations
    if (document.querySelector('.fade-demo')) {
      GSAPUtils.fadeInOnScroll('.fade-demo', { y: 50, duration: 0.8 })
    }

    if (document.querySelector('.fade-in-demo')) {
      GSAPUtils.fadeInOnScroll('.fade-in-demo', { y: 50, duration: 0.8, stagger: 0.2 })
    }

    if (document.querySelector('.slide-left-demo')) {
      GSAPUtils.slideInOnScroll('.slide-left-demo', 'left', { duration: 1 })
    }

    if (document.querySelector('.slide-right-demo')) {
      GSAPUtils.slideInOnScroll('.slide-right-demo', 'right', { duration: 1 })
    }

    if (document.querySelector('.reveal-demo')) {
      GSAPUtils.revealOnScroll('.reveal-demo', { scale: 0.8, stagger: 0.1 })
    }
  } catch (error) {
    console.error('Error initializing demo animations:', error)
  }
}
</script>
@endpush
