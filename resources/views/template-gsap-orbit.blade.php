{{--
  Template Name: GSAP Orbit Demo
  Description: Demonstrates the GSAP Orbit System component
--}}

@extends('layouts.app')

@section('content')
  {{-- Full-page GSAP Orbit System --}}
  <x-gsap-orbit />

  {{-- Optional: Info overlay --}}
  <div style="position: fixed; top: 20px; left: 20px; z-index: 1000; background: rgba(15, 23, 42, 0.9); backdrop-filter: blur(10px); padding: 20px; border-radius: 12px; border: 1px solid rgba(99, 102, 241, 0.3); max-width: 300px;">
    <h3 style="margin: 0 0 12px; font-size: 18px; color: #fff; font-weight: 600;">GSAP Orbit System</h3>
    <ul style="margin: 0; padding-left: 20px; color: rgba(255, 255, 255, 0.8); font-size: 14px; line-height: 1.8;">
      <li>Hover over items to see connections</li>
      <li>Hover over the core to energize the system</li>
      <li>Click items to see ripple effects</li>
      <li>Watch the particles float around</li>
      <li>3 independent orbit rings</li>
      <li>Smooth GSAP animations</li>
    </ul>
  </div>
@endsection
