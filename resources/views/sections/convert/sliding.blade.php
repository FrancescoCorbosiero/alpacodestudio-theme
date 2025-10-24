{{-- Unified Sliding Text Component --}}
@props([
    'direction' => 'ltr', // 'ltr' or 'rtl'
    'words' => [],
    'separator' => '✦',
    'outline' => true,
    'speed' => 30,
    'className' => '',
])

@php
    // Default words if none provided
    if (empty($words)) {
        $words = $direction === 'ltr' 
            ? ['INNOVAZIONE', 'CREATIVITÀ', 'ECCELLENZA', 'PASSIONE', 'RISULTATI']
            : ['WEB DESIGN', 'BRANDING', 'E-COMMERCE', 'SEO', 'MARKETING'];
    }
    
    // Set separator based on direction or use provided
    if ($separator === '✦' && $direction === 'rtl') {
        $separator = '●';
    }
    
    // Generate unique ID for animation
    $animationId = 'slide-' . uniqid();
@endphp

<div class="sliding-track {{ $className }}" data-direction="{{ $direction }}">
    <div class="sliding-content {{ $direction === 'rtl' ? 'reverse' : '' }}" style="animation-duration: {{ $speed }}s;">
        @foreach($words as $word)
            <span class="sliding-text {{ $outline ? 'outline' : '' }}">{{ $word }}</span>
            <span class="sliding-separator">{{ $separator }}</span>
        @endforeach
    </div>
    <div class="sliding-content {{ $direction === 'rtl' ? 'reverse' : '' }}" aria-hidden="true" style="animation-duration: {{ $speed }}s;">
        @foreach($words as $word)
            <span class="sliding-text {{ $outline ? 'outline' : '' }}">{{ $word }}</span>
            <span class="sliding-separator">{{ $separator }}</span>
        @endforeach
    </div>
</div>

{{-- Usage Examples: --}}
{{-- 
    Basic LTR:
    <x-sliding-text />
    
    Basic RTL with outline:
    <x-sliding-text direction="rtl" :outline="true" />
    
    Custom words and speed:
    <x-sliding-text 
        :words="['DESIGN', 'CODE', 'LAUNCH']" 
        separator="⚡"
        :speed="20"
    />
    
    With custom class:
    <x-sliding-text 
        className="my-custom-slider"
        direction="rtl"
    />
--}}

<style>
/* Base Variables */
:root {
    --slider-accent: #F65100;
    --slider-accent-light: #F65100;
    --slider-padding-y: 12px;
    --slider-margin-y: 20px;
}

/* Sliding Track Container */
.sliding-track {
    position: relative;
    width: 97vw;
    left: 50%;
    transform: translateX(-50%);
    overflow: hidden;
    padding: var(--slider-padding-y) 0;
    margin: var(--slider-margin-y) 0;
    white-space: nowrap;
    mask-image: linear-gradient(90deg, transparent, black 10%, black 90%, transparent);
    -webkit-mask-image: linear-gradient(90deg, transparent, black 10%, black 90%, transparent);
}

/* Content Container */
.sliding-content {
    display: inline-flex;
    align-items: center;
    gap: 40px;
    padding-right: 40px;
    animation: slide linear infinite;
}

.sliding-content.reverse {
    animation: slideReverse linear infinite;
}

/* Animations */
@keyframes slide {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

@keyframes slideReverse {
    0% { transform: translateX(-50%); }
    100% { transform: translateX(0); }
}

/* Text Styles */
.sliding-text {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 900;
    letter-spacing: -0.02em;
    background: linear-gradient(135deg, var(--slider-accent), var(--slider-accent-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-transform: uppercase;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
}

/* Outline Variant */
.sliding-text.outline {
    -webkit-text-fill-color: transparent;
    -webkit-text-stroke: 2px var(--slider-accent);
    text-stroke: 2px var(--slider-accent);
    background: none;
}

/* Separator */
.sliding-separator {
    color: var(--slider-accent);
    font-size: 1.5rem;
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { 
        opacity: 0.5; 
        transform: scale(1); 
    }
    50% { 
        opacity: 1; 
        transform: scale(1.2); 
    }
}

/* Responsive */
@media (max-width: 768px) {
    :root {
        --slider-padding-y: 8px;
        --slider-margin-y: 15px;
    }
    
    .sliding-text {
        font-size: 1.5rem;
    }
    
    .sliding-separator {
        font-size: 1rem;
    }
    
    .sliding-content {
        gap: 25px;
        padding-right: 25px;
    }
}

/* Accessibility */
@media (prefers-reduced-motion: reduce) {
    .sliding-content,
    .sliding-content.reverse {
        animation: none;
    }
    
    .sliding-separator {
        animation: none;
    }
}

/* Custom Classes Support */
.sliding-track.compact {
    --slider-padding-y: 8px;
    --slider-margin-y: 10px;
}

.sliding-track.large {
    --slider-padding-y: 20px;
    --slider-margin-y: 30px;
}

.sliding-track.no-mask {
    mask-image: none;
    -webkit-mask-image: none;
}
</style>
