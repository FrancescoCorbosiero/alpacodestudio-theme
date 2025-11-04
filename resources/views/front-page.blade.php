{{--
  Template Name: Front Page (Homepage)

  Modern portfolio grid layout with:
  - Clean CSS Grid layout
  - Responsive sidebar navigation
  - AOS scroll animations
  - Native CSS design system
--}}

@extends('layouts.app')

@section('content')
  {{-- Hero Section with Grid Layout --}}
  @include('sections.home-modern')

  {{-- Portfolio Showcase Section --}}
  @include('sections.portfolio-showcase')

  {{-- Contact Section with FAQs --}}
  @include('sections.contact-modern')
@endsection
