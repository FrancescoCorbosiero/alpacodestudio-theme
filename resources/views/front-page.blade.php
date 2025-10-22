{{--
  Template Name: Front Page (Homepage)

  The main landing page for Alpacode Studio.
  Showcases all premium sections in a cohesive layout.
--}}

@extends('layouts.app')

@section('content')
  {{-- Hero Section - Stunning First Impression --}}
  @include('sections.hero')

  {{-- Value Proposition - Why Choose Alpacode --}}
  @include('sections.value-proposition')

  {{-- Features Grid - What We Do --}}
  @include('sections.features')

  {{-- Social Proof - Testimonials + Stats --}}
  @include('sections.social-proof')

  {{-- Pricing Preview - Package Cards --}}
  @include('sections.pricing-preview')

  {{-- Final CTA - Conversion Focused --}}
  @include('sections.final-cta')
@endsection
