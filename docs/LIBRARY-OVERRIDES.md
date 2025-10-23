# Understanding `_library-overrides.css`

## 🎯 Purpose

The `_library-overrides.css` file is the **bridge** between your design system and third-party libraries. It ensures all external libraries look and feel like they belong to your theme, not like generic components dropped into your site.

## 🤔 The Problem It Solves

### Without Overrides:
```
Your Theme:           PicoCSS:              Shoelace:            Result:
🎨 Orange primary    🔵 Blue primary       🟢 Green primary    🎪 Rainbow mess!
📏 16px spacing      📏 8px spacing        📏 12px spacing     📐 Inconsistent
🔤 Inter font        🔤 System font        🔤 Roboto font      🔠 Font chaos
```

### With Overrides:
```
Your Theme:           All Libraries:                            Result:
🎨 Orange primary    🎨 Orange primary (inherited)            ✨ Cohesive!
📏 16px spacing      📏 16px spacing (inherited)              📐 Harmonious
🔤 Inter font        🔤 Inter font (inherited)                🔠 Consistent
```

## 🧠 How It Works

### 1. Your Design Tokens (Source of Truth)

Located in `foundation/_tokens.css`:

```css
:root {
  /* Your brand */
  --color-brand-primary: oklch(65% 0.23 40);  /* Orange #F65100 */
  --space-md: clamp(1.5rem, 1.35rem + 0.75vw, 1.875rem);
  --font-family-base: 'Inter Variable', system-ui, sans-serif;
  --radius-md: 0.5rem;
  --duration-base: 250ms;
}
```

### 2. Library Overrides (The Bridge)

Located in `vendor/_library-overrides.css`:

```css
:root {
  /* PicoCSS uses YOUR tokens */
  --pico-primary: var(--color-brand-primary);     /* 🎨 Orange, not blue */
  --pico-spacing: var(--space-md);                /* 📏 Your spacing */
  --pico-font-family: var(--font-family-base);    /* 🔤 Inter font */
  --pico-border-radius: var(--radius-md);         /* ⭕ Your radius */
}

sl-button {
  /* Shoelace uses YOUR tokens */
  --sl-color-primary-600: var(--color-brand-primary);
  --sl-spacing-medium: var(--space-md);
  --sl-border-radius-medium: var(--radius-md);
}

.swiper {
  /* Swiper uses YOUR tokens */
  --swiper-theme-color: var(--color-brand-primary);
  --swiper-navigation-size: var(--space-lg);
}
```

## 📊 Visual Breakdown by Library

### PicoCSS Override Strategy

```css
/* ✅ OVERRIDE: Use your design tokens */
:root {
  --pico-font-family: var(--font-family-base);
  --pico-primary: var(--color-brand-primary);
  --pico-spacing: var(--space-md);
}

/* Result: PicoCSS buttons, forms, and tables
   automatically use your brand colors and spacing */
```

**What it affects:**
- All semantic HTML elements styled by Pico
- Buttons, forms, tables, typography
- Spacing between elements
- Border radius on inputs

### Shoelace Override Strategy

```css
/* ✅ TARGET: Specific web components */
sl-button,
sl-input,
sl-select {
  --sl-color-primary-600: var(--color-brand-primary);
  --sl-border-radius-medium: var(--radius-md);
  --sl-spacing-medium: var(--space-md);
}

/* Result: Every Shoelace component matches your theme */
```

**What it affects:**
- Primary color of all Shoelace components
- Border radius (small, medium, large)
- Internal spacing and padding
- Animation durations

### AOS Override Strategy

```css
/* ✅ ENHANCE: Add custom timing options */
[data-aos] {
  transition-duration: var(--duration-base) !important;
  transition-timing-function: var(--easing-out) !important;
}

/* Custom attributes you can now use: */
[data-aos][data-aos-duration="fast"] {
  transition-duration: var(--duration-fast) !important;
}
```

**What it affects:**
- Default animation duration
- Animation easing curves
- Custom timing presets (fast/slow)

### Swiper Override Strategy

```css
/* ✅ CUSTOMIZE: Both CSS variables and direct styles */
.swiper {
  --swiper-theme-color: var(--color-brand-primary);
  border-radius: var(--radius-lg);
}

.swiper-button-next,
.swiper-button-prev {
  color: var(--color-brand-primary);
  background: var(--color-surface-overlay);
  border-radius: var(--radius-full);
}
```

**What it affects:**
- Navigation button colors
- Pagination dot colors
- Button shapes and hover effects
- Container border radius

### PhotoSwipe Override Strategy

```css
/* ✅ INTEGRATE: Dark mode support */
.pswp {
  --pswp-bg: oklch(from var(--color-surface-base) l c h / 0.95);
  --pswp-icon-color: var(--color-text-primary);
}

[data-theme="dark"] .pswp {
  --pswp-bg: oklch(from var(--color-surface-base) l c h / 0.98);
}
```

**What it affects:**
- Lightbox background opacity
- Button and icon colors
- Counter styling
- Dark mode appearance

## 🎨 Real-World Example

Let's say you change your brand color:

```css
/* foundation/_tokens.css */
:root {
  /* Change from orange to purple */
  --color-brand-primary: oklch(60% 0.25 300); /* Purple! */
}
```

**Automatically updates:**
- ✅ All PicoCSS buttons → Purple
- ✅ All Shoelace components → Purple
- ✅ Swiper navigation → Purple
- ✅ PhotoSwipe buttons → Purple
- ✅ Your custom components → Purple

**No need to touch:**
- ❌ Library source files
- ❌ Shoelace configuration
- ❌ Swiper settings
- ❌ Individual component styles

## 🔧 How to Customize

### Example 1: Change Swiper Button Shape

```css
/* In _library-overrides.css */

/* Find the Swiper section */
.swiper-button-next,
.swiper-button-prev {
  /* Change from circle to square */
  border-radius: var(--radius-md);  /* was: var(--radius-full) */

  /* Make them bigger */
  width: calc(var(--space-xl) * 2);
  height: calc(var(--space-xl) * 2);
}
```

### Example 2: Add Custom AOS Timing

```css
/* In _library-overrides.css */

/* Add super slow animation option */
[data-aos][data-aos-duration="super-slow"] {
  transition-duration: 2000ms !important;
}

/* Then use in HTML: */
/* <div data-aos="fade-up" data-aos-duration="super-slow"> */
```

### Example 3: Override PhotoSwipe Background

```css
/* In _library-overrides.css */

.pswp {
  /* Make it more opaque */
  --pswp-bg: oklch(from var(--color-surface-base) l c h / 0.98);
}
```

## 📋 Complete Override Checklist

When you add a new library, add overrides for:

- [ ] **Colors** - Primary, secondary, surface colors
- [ ] **Spacing** - Padding, margins, gaps
- [ ] **Typography** - Font family, sizes, weights
- [ ] **Border Radius** - Match your design system
- [ ] **Transitions** - Duration and easing
- [ ] **Dark Mode** - `[data-theme="dark"]` selectors

## 🎯 Benefits

### 1. **Single Source of Truth**
Change `--color-brand-primary` once → Updates everywhere

### 2. **Consistency**
All libraries feel like they're part of the same family

### 3. **Maintainability**
Override CSS variables, not entire stylesheets

### 4. **Dark Mode**
One `[data-theme="dark"]` selector updates all libraries

### 5. **No Conflicts**
Libraries keep their functionality, just match your style

## 🚫 What NOT to Do

```css
/* ❌ BAD: Hardcoding values */
:root {
  --pico-primary: #F65100;        /* Wrong! Use tokens */
  --pico-spacing: 24px;           /* Wrong! Not responsive */
}

/* ✅ GOOD: Using design tokens */
:root {
  --pico-primary: var(--color-brand-primary);
  --pico-spacing: var(--space-md);
}
```

```css
/* ❌ BAD: Overriding too much */
sl-button {
  background: red !important;      /* Don't fight the library */
  padding: 50px !important;        /* Use their CSS variables instead */
}

/* ✅ GOOD: Work with the library */
sl-button {
  --sl-color-primary-600: var(--color-brand-primary);
  --sl-spacing-medium: var(--space-lg);
}
```

## 🔍 Debugging Tips

### Check if override is working:

```javascript
// In browser console
const root = document.documentElement;
const picoColor = getComputedStyle(root).getPropertyValue('--pico-primary');
console.log('PicoCSS primary:', picoColor);  // Should show your orange

const button = document.querySelector('sl-button');
const slColor = getComputedStyle(button).getPropertyValue('--sl-color-primary-600');
console.log('Shoelace primary:', slColor);   // Should match
```

### Check CSS cascade order:

```
1. foundation/_tokens.css       (Your design system)
2. vendor/_libraries.css        (Library imports)
3. vendor/_library-overrides.css  ← This needs to come AFTER
4. components/                  (Your components)
```

If overrides aren't working, check `app.css` import order!

## 📚 Further Reading

- [CSS Custom Properties (MDN)](https://developer.mozilla.org/en-US/docs/Web/CSS/Using_CSS_custom_properties)
- [PicoCSS Variables](https://picocss.com/docs/css-variables)
- [Shoelace Customizing](https://shoelace.style/getting-started/customizing)
- [Design Tokens](https://www.designtokens.org/)

## 🎓 Summary

**`_library-overrides.css` is your theme's style conductor:**

```
Your Design Tokens (foundation/_tokens.css)
            ↓
    _library-overrides.css  ← Maps your tokens to library variables
            ↓
    All Libraries Look Cohesive ✨
```

It ensures that no matter how many libraries you add, everything feels like it was designed as one cohesive system.
