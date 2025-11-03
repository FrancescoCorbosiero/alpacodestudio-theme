# 🔧 Legacy Theme Integration Guide

## ✅ What's Been Set Up

Your Sage theme is now configured to use Bootstrap + jQuery stack instead of the modern Alpine.js + Custom CSS approach.

### 📦 Dependencies Added

All dependencies have been added to `package.json`:

- ✅ **Bootstrap 5.3.3** - CSS framework + components
- ✅ **jQuery 3.7.1** - DOM manipulation
- ✅ **jQuery Easing** - Smooth animations
- ✅ **Font Awesome 6.7.1** - Icon library
- ✅ **Jarallax 2.2.1** - Parallax scrolling
- ✅ **Chocolat 1.1.2** - Lightbox gallery
- ✅ **anime.js 3.2.2** - JavaScript animation library
- ✅ **AOS** - Animate on scroll
- ✅ **Swiper** - Modern carousel

### 📁 Files Created

1. **`resources/css/legacy.css`** - Imports all CSS libraries
2. **`resources/js/legacy.js`** - Imports all JS libraries & initializes them

### ⚙️ Configuration Updated

1. **`vite.config.js`** - Added legacy.css and legacy.js as build targets
2. **`app.blade.php`** - Switched to use legacy files instead of app.css/app.js

---

## 🚀 Installation Steps

### 1. Install Dependencies

```bash
npm install
```

This will install all the libraries listed above.

### 2. Copy Your Old Theme Files

Copy your old theme's CSS and JavaScript into the designated sections:

#### **CSS Files** → `resources/css/legacy.css`

```css
/* Open resources/css/legacy.css and add your CSS after this line: */

/* ============================================
   YOUR OLD THEME CSS GOES HERE
   ============================================ */

/* Paste your old theme's CSS here */
.your-custom-class {
  /* your styles */
}
```

#### **JavaScript Files** → `resources/js/legacy.js`

```javascript
// Open resources/js/legacy.js and add your JS after this line:

// ============================================
// YOUR OLD THEME CODE GOES HERE
// ============================================

// Paste your old theme's JavaScript here
$(document).ready(function() {
  // Your jQuery code
});
```

### 3. Build Assets

```bash
# Development mode (with hot reload)
npm run dev

# Production build
npm run build
```

---

## 📚 Using the Libraries

All libraries are globally available:

### jQuery

```javascript
$(document).ready(function() {
  $('#myElement').fadeIn();
});
```

### Bootstrap Components

```html
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Content goes here
      </div>
    </div>
  </div>
</div>
```

### Font Awesome Icons

```html
<i class="fas fa-user"></i>
<i class="fab fa-facebook"></i>
<i class="far fa-heart"></i>
```

### Jarallax Parallax

```html
<div class="jarallax" data-jarallax data-speed="0.2">
  <img class="jarallax-img" src="path/to/image.jpg" alt="">
  <div class="content">Your content</div>
</div>

<script>
jarallax(document.querySelectorAll('.jarallax'), {
  speed: 0.2
});
</script>
```

### Chocolat Lightbox

```html
<a class="chocolat-image" href="path/to/big-image.jpg">
  <img src="path/to/thumbnail.jpg" alt="">
</a>

<script>
Chocolat(document.querySelectorAll('.chocolat-image'))
</script>
```

### anime.js Animations

```javascript
anime({
  targets: '.my-element',
  translateX: 250,
  rotate: '1turn',
  backgroundColor: '#FFF',
  duration: 800
});
```

### Swiper Carousel

```html
<div class="swiper">
  <div class="swiper-wrapper">
    <div class="swiper-slide">Slide 1</div>
    <div class="swiper-slide">Slide 2</div>
    <div class="swiper-slide">Slide 3</div>
  </div>
  <div class="swiper-pagination"></div>
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>

<script>
new Swiper('.swiper', {
  modules: [Navigation, Pagination],
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
  },
});
</script>
```

### AOS (Animate On Scroll)

```html
<div data-aos="fade-up" data-aos-duration="800">
  This element will fade up on scroll
</div>
```

---

## 🔄 Switching Between Modern and Legacy

If you want to switch back to the modern stack:

**In `app.blade.php` (line 16-20):**

```blade
{{-- Use LEGACY (Bootstrap + jQuery) --}}
@vite(['resources/css/legacy.css', 'resources/js/legacy.js'])
{{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

{{-- Use MODERN (Alpine + Custom CSS) --}}
{{-- @vite(['resources/css/legacy.css', 'resources/js/legacy.js']) --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

---

## 📝 Example: Migrating Old Theme Code

Let's say your old theme has this structure:

```
old-theme/
├── css/
│   ├── bootstrap.min.css (DELETE - now via npm)
│   ├── font-awesome.css (DELETE - now via npm)
│   └── custom.css (KEEP - copy to legacy.css)
├── js/
│   ├── jquery.min.js (DELETE - now via npm)
│   ├── bootstrap.min.js (DELETE - now via npm)
│   └── main.js (KEEP - copy to legacy.js)
```

**Steps:**

1. ✅ Delete CDN/vendor files (Bootstrap, jQuery, etc.)
2. ✅ Copy `custom.css` content to `resources/css/legacy.css`
3. ✅ Copy `main.js` content to `resources/js/legacy.js`
4. ✅ Run `npm install && npm run build`

---

## 🐛 Troubleshooting

### jQuery is not defined

Make sure `legacy.js` is loaded before your custom scripts.

### Bootstrap components not working

Check that you're using `data-bs-*` attributes (Bootstrap 5 syntax), not `data-*` (Bootstrap 4).

### Icons not showing

Font Awesome is loaded. Use:
- `fas` for solid icons
- `far` for regular icons
- `fab` for brand icons

---

## ✅ Next Steps

1. Install dependencies: `npm install`
2. Copy your old theme's CSS to `resources/css/legacy.css`
3. Copy your old theme's JS to `resources/js/legacy.js`
4. Build: `npm run dev` or `npm run build`
5. Test your theme!

---

**Questions?** All libraries are properly configured and ready to use. Just paste your old code into the designated files!
