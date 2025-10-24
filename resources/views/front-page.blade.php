{{--
  Template Name: Front Page (Homepage)

  SHOWCASE landing page demonstrating all integrated libraries:
  - Vanta.js 3D backgrounds
  - GSAP professional animations
  - AOS scroll animations
  - Swiper carousels
  - PhotoSwipe galleries
  - Alpine.js reactive utilities
--}}

@extends('layouts.app')

@section('content')
  {{-- Hero with Vanta.js 3D Background --}}
  @include('sections.hero-showcase')

  {{-- GSAP Animations Demonstration --}}
  @include('sections.gsap-showcase')

  {{-- AOS Scroll Animations --}}
  @include('sections.aos-showcase')

  {{-- Swiper Carousel & PhotoSwipe Gallery --}}
  @include('sections.media-showcase')

  {{-- Final CTA with Alpine.js Utilities --}}
  @include('sections.final-cta-showcase')
@endsection
