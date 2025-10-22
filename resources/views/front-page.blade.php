{{--
  Template Name: Front Page (Homepage)

  DIVINE landing page for Alpacode Studio.
  ReadyMag-level stunning UI with Alpine.js interactivity.
--}}

@extends('layouts.app')

@section('content')
  {{-- DIVINE Hero - MASSIVE typography with morphing effects --}}
  @include('sections.hero-divine')

  {{-- DIVINE Value Props - 3D tilt cards with glassmorphism --}}
  @include('sections.value-props-divine')

  {{-- Features Grid - What We Do (keeping original for now) --}}
  @include('sections.features')

  {{-- Social Proof - Testimonials + Stats (keeping original for now) --}}
  @include('sections.social-proof')

  {{-- Pricing Preview - Package Cards (keeping original for now) --}}
  @include('sections.pricing-preview')

  {{-- Final CTA - Conversion Focused (keeping original for now) --}}
  @include('sections.final-cta')
@endsection
