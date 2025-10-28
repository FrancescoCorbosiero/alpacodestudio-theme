# Curtains.js Examples & Usage Guide

Complete guide for using Curtains.js WebGL effects in your WordPress theme.

## Table of Contents
- [Quick Start](#quick-start)
- [Available Effects](#available-effects)
- [Alpine.js Components](#alpinejs-components)
- [Manual Usage](#manual-usage)
- [Custom Shaders](#custom-shaders)

---

## Quick Start

### 1. Auto-Initialization with Data Attributes

The easiest way to add WebGL effects to any image:

```html
<!-- Displacement Effect (default) -->
<div data-curtains="displacement">
  <img src="your-image.jpg" alt="Image">
</div>

<!-- RGB Split Effect -->
<div data-curtains="rgbSplit">
  <img src="your-image.jpg" alt="Image">
</div>

<!-- Wave Effect -->
<div data-curtains="wave">
  <img src="your-image.jpg" alt="Image">
</div>

<!-- Parallax Effect with custom depth -->
<div data-curtains="parallax" data-depth="2.0">
  <img src="your-image.jpg" alt="Image">
</div>
```

---

## Available Effects

### 1. **Displacement Effect** (default)
Ripple/distortion effect on hover
```html
<div data-curtains="displacement">
  <img src="image.jpg" alt="Demo">
</div>
```

### 2. **RGB Split Effect**
Chromatic aberration (red/green/blue channel split)
```html
<div data-curtains="rgbSplit">
  <img src="image.jpg" alt="Demo">
</div>
```

### 3. **Wave Effect**
Scroll-based wave distortion
```html
<div data-curtains="wave">
  <img src="image.jpg" alt="Demo">
</div>
```

### 4. **Parallax Effect**
Multi-layer parallax with mouse tracking
```html
<div data-curtains="parallax" data-depth="1.5">
  <img src="image.jpg" alt="Demo">
</div>
```

### 5. **Zoom Blur Effect**
Radial blur on hover
```html
<div data-curtains="zoomBlur">
  <img src="image.jpg" alt="Demo">
</div>
```

### 6. **Gradient Overlay Effect**
Animated gradient overlay
```html
<div data-curtains="gradientOverlay">
  <img src="image.jpg" alt="Demo">
</div>
```

---

## Alpine.js Components

For more control, use Alpine.js components:

### Single Plane Controller

```html
<div x-data="curtainsPlane('displacement')">
  <img src="image.jpg" alt="Image">
  <p x-show="isHovered">Hovering!</p>
</div>
```

**Available properties:**
- `plane` - The Curtains plane instance
- `effect` - Current effect type
- `isHovered` - Boolean hover state

### Gallery Controller

```html
<div x-data="curtainsGallery('rgbSplit')">
  <div data-gallery-item>
    <img src="image-1.jpg" alt="Image 1">
  </div>
  <div data-gallery-item>
    <img src="image-2.jpg" alt="Image 2">
  </div>
  <div data-gallery-item>
    <img src="image-3.jpg" alt="Image 3">
  </div>

  <p x-show="activeIndex !== null">
    Active: <span x-text="activeIndex"></span>
  </p>
</div>
```

**Available properties:**
- `planes` - Array of all plane instances
- `effect` - Effect type for all planes
- `activeIndex` - Currently hovered gallery item index

### Hero Controller

```html
<div x-data="curtainsHero()" class="curtains-hero">
  <div class="curtains-hero__background">
    <img src="hero-bg.jpg" alt="Hero Background">
  </div>
  <div class="curtains-hero__content">
    <h1>Welcome</h1>
    <p>Scroll progress: <span x-text="scrollProgress.toFixed(0)"></span>%</p>
  </div>
</div>
```

**Available properties:**
- `plane` - The hero plane instance
- `effect` - Effect type (default: 'parallax')
- `scrollProgress` - Scroll position percentage

---

## Manual Usage (JavaScript)

### Initialize Curtains Manually

```javascript
import { createPlane } from '@scripts/libraries/curtains-init.js';

// Create a plane with displacement effect
const plane = createPlane('#my-image', 'displacement');

// Create a plane with custom options
const customPlane = createPlane('#custom-image', 'parallax', {
  uniforms: {
    depth: { name: "uDepth", type: "1f", value: 3.0 }
  }
});
```

### Access Curtains Instance

```javascript
import { getCurtains } from '@scripts/libraries/curtains-init.js';

const curtains = getCurtains();
console.log(curtains); // Curtains instance
```

### Remove Planes

```javascript
import { removePlane, removeAllPlanes } from '@scripts/libraries/curtains-init.js';

// Remove specific plane
removePlane(plane);

// Remove all planes
removeAllPlanes();
```

---

## Custom Shaders

### Create Custom Effect

```javascript
import { createPlane } from '@scripts/libraries/curtains-init.js';

const customPlane = createPlane('#image', 'displacement', {
  uniforms: {
    time: { name: "uTime", type: "1f", value: 0 },
    mouse: { name: "uMouse", type: "2f", value: [0.5, 0.5] },
    customValue: { name: "uCustomValue", type: "1f", value: 1.0 }
  }
});

// Update custom uniform on render
customPlane.onRender(() => {
  customPlane.uniforms.customValue.value = Math.sin(Date.now() * 0.001);
});
```

---

## Complete Examples

### Example 1: Simple Image with Displacement

```html
<div class="curtains-plane" data-curtains="displacement">
  <img src="<?php echo get_template_directory_uri(); ?>/resources/images/demo.jpg"
       alt="Demo Image">
</div>
```

### Example 2: Gallery with RGB Split

```html
<div class="curtains-gallery" x-data="curtainsGallery('rgbSplit')">
  <?php foreach($images as $image): ?>
    <div class="curtains-gallery__item" data-gallery-item>
      <img src="<?php echo $image['url']; ?>"
           alt="<?php echo $image['alt']; ?>">
      <div class="curtains-gallery__overlay">
        <h3 class="curtains-gallery__title">
          <?php echo $image['title']; ?>
        </h3>
      </div>
    </div>
  <?php endforeach; ?>
</div>
```

### Example 3: Full-Screen Hero

```html
<section class="curtains-hero" x-data="curtainsHero()">
  <div class="curtains-hero__background" data-curtains="parallax" data-depth="2.5">
    <img src="<?php echo get_template_directory_uri(); ?>/resources/images/hero.jpg"
         alt="Hero Background">
  </div>

  <div class="curtains-hero__content">
    <h1 class="hero__title">Amazing WebGL Effects</h1>
    <p class="hero__subtitle">Powered by Curtains.js</p>
    <button class="btn btn--primary">Get Started</button>
  </div>
</section>
```

### Example 4: Multiple Planes with Different Effects

```html
<div class="curtains-planes">
  <div class="curtains-planes__wrapper">
    <div class="curtains-planes__item" data-curtains="displacement">
      <img src="image-1.jpg" alt="Displacement">
    </div>
    <div class="curtains-planes__item" data-curtains="rgbSplit">
      <img src="image-2.jpg" alt="RGB Split">
    </div>
    <div class="curtains-planes__item" data-curtains="wave">
      <img src="image-3.jpg" alt="Wave">
    </div>
    <div class="curtains-planes__item" data-curtains="parallax">
      <img src="image-4.jpg" alt="Parallax">
    </div>
  </div>
</div>
```

---

## Performance Tips

1. **Limit the number of planes** - Each plane uses GPU resources
2. **Use appropriate image sizes** - Large images can impact performance
3. **Disable on mobile if needed** - Add `@media (max-width: 768px)` checks
4. **Respect reduced motion** - Effects are automatically disabled for users with `prefers-reduced-motion`

### Conditional Initialization

```javascript
// Only initialize on desktop
if (window.innerWidth > 1024) {
  createPlane('#desktop-only-image', 'displacement');
}
```

---

## Browser Support

Curtains.js requires WebGL support:
- ✅ Chrome/Edge 56+
- ✅ Firefox 51+
- ✅ Safari 11+
- ✅ iOS Safari 11+

Fallback: If WebGL is not available, the `.no-curtains` class is added to the body, and regular images are displayed.

---

## Debugging

### Check if Curtains is initialized

```javascript
if (window.Curtains) {
  console.log('Curtains.js is ready!');
}
```

### View active planes

```javascript
import { getActivePlanes } from '@scripts/libraries/curtains-init.js';

const planes = getActivePlanes();
console.log('Active planes:', planes);
```

---

## CSS Classes Reference

- `.curtains-plane` - Basic plane container
- `.curtains-gallery` - Gallery grid layout
- `.curtains-gallery__item` - Individual gallery item
- `.curtains-hero` - Full-screen hero section
- `.curtains-parallax` - Parallax section
- `.no-curtains` - Applied when WebGL is unavailable

---

## Need Help?

- Check the browser console for errors
- Ensure images are loaded before creating planes
- Verify WebGL is supported: `chrome://gpu` (Chrome) or `about:support` (Firefox)

---

Happy coding with Curtains.js! 🎨✨
