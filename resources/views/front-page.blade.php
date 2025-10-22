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

  {{-- DIVINE Features - Horizontal scroll with massive gradient cards --}}
  @include('sections.features-divine')

  {{-- DIVINE Social Proof - Auto-rotating 3D carousel --}}
  @include('sections.social-proof-divine')

  {{-- DIVINE Pricing - Interactive 3D cards with glassmorphism --}}
  @include('sections.pricing-divine')

  {{-- DIVINE Final CTA - Magnetic effects with particle animations --}}
  @include('sections.final-cta-divine')
@endsection
