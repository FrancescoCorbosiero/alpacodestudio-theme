/**
 * PhotoSwipe Gallery Initialization
 * Handles lightbox gallery for portfolio and other image galleries
 */

import PhotoSwipeLightbox from 'photoswipe/lightbox'
import PhotoSwipe from 'photoswipe'

/**
 * Initialize PhotoSwipe galleries
 * @param {string} gallerySelector - CSS selector for gallery container
 * @param {string} itemSelector - CSS selector for gallery items (default: 'a')
 */
export function initPhotoSwipeGallery(gallerySelector = '.portfolio-showcase__grid', itemSelector = 'a') {
  const galleryElement = document.querySelector(gallerySelector)

  if (!galleryElement) {
    console.log(`ℹ️ PhotoSwipe gallery "${gallerySelector}" not found on this page`)
    return null
  }

  const lightbox = new PhotoSwipeLightbox({
    gallery: gallerySelector,
    children: itemSelector,
    pswpModule: PhotoSwipe,
    bgOpacity: 0.9,
    padding: { top: 50, bottom: 50, left: 50, right: 50 },
    wheelToZoom: true,
    closeOnVerticalDrag: true,
    pinchToClose: true,
    showHideAnimationType: 'fade',

    // Responsive padding
    paddingFn: (viewportSize) => {
      return {
        top: Math.min(viewportSize.y * 0.1, 50),
        bottom: Math.min(viewportSize.y * 0.1, 50),
        left: Math.min(viewportSize.x * 0.1, 50),
        right: Math.min(viewportSize.x * 0.1, 50)
      }
    }
  })

  lightbox.init()
  console.log(`✅ PhotoSwipe gallery initialized: ${gallerySelector}`)

  return lightbox
}

/**
 * Initialize all PhotoSwipe galleries on the page
 */
export function initAllPhotoSwipeGalleries() {
  const galleries = []

  // Portfolio showcase gallery
  const portfolioGallery = initPhotoSwipeGallery('.portfolio-showcase__grid', 'a')
  if (portfolioGallery) {
    galleries.push(portfolioGallery)
  }

  // Add more gallery initializations here as needed
  // Example: const otherGallery = initPhotoSwipeGallery('.another-gallery', 'a')

  return galleries
}
