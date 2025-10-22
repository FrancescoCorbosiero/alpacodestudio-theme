/**
 * Scroll-Triggered Animations
 *
 * Handles IntersectionObserver-based animations for elements with:
 * - [data-animate]: Single element animation
 * - [data-animate-stagger]: Staggered children animation
 */

// Observer configuration
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px' // Trigger slightly before element is in view
}

// Create IntersectionObserver
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('animate-in')
      observer.unobserve(entry.target) // Unobserve after animation
    }
  })
}, observerOptions)

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
  // Observe all elements with data-animate
  const animatedElements = document.querySelectorAll('[data-animate]')
  animatedElements.forEach(el => observer.observe(el))

  // Observe elements with data-animate-stagger
  const staggeredContainers = document.querySelectorAll('[data-animate-stagger]')
  staggeredContainers.forEach(container => observer.observe(container))
})

/**
 * Export for use in other modules
 */
export { observer, observerOptions }
