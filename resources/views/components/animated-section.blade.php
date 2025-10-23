@props([
  'animation' => 'fade-up',
  'delay' => 0,
  'duration' => 600,
  'easing' => 'ease-out-cubic',
  'once' => true,
])

<section
  {{ $attributes->merge(['class' => 'animated-section']) }}
  data-aos="{{ $animation }}"
  data-aos-delay="{{ $delay }}"
  data-aos-duration="{{ $duration }}"
  data-aos-easing="{{ $easing }}"
  @if($once)
  data-aos-once="true"
  @endif
>
  {{ $slot }}
</section>
