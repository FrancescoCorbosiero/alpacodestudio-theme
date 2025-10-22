/**
 * Alpacode Studio Theme - Main JavaScript
 */

// Import Alpine.js
import Alpine from 'alpinejs'

// Import core modules
import { initThemeSwitcher } from './core/theme-switcher'
import { initNavigation } from './core/navigation'
import { initViewTransitions } from './core/view-transitions'
import { initPerformance } from './core/performance'
import { initAccessibility } from './core/accessibility'
import './core/animations' // Scroll-triggered animations

// Make Alpine available globally
window.Alpine = Alpine

// Import static assets
import.meta.glob([
  '../images/**',
  '../fonts/**',
])

/**
 * Check if we're in WordPress admin
 */
function isWordPressAdmin() {
  return document.body.classList.contains('wp-admin') ||
         document.body.classList.contains('wp-core-ui')
}

/**
 * Initialize theme on DOM ready
 */
document.addEventListener('DOMContentLoaded', () => {
  // Don't initialize frontend features in WordPress admin
  if (isWordPressAdmin()) {
    // Only start Alpine.js for admin
    Alpine.start()
    return
  }

  try {
    // Initialize theme switcher
    initThemeSwitcher()
  } catch (error) {
    console.error('Failed to initialize theme switcher:', error)
  }

  try {
    // Initialize navigation
    initNavigation()
  } catch (error) {
    console.error('Failed to initialize navigation:', error)
  }

  try {
    // Initialize view transitions (if supported)
    initViewTransitions()
  } catch (error) {
    console.error('Failed to initialize view transitions:', error)
  }

  try {
    // Initialize performance monitoring
    initPerformance()
  } catch (error) {
    console.error('Failed to initialize performance monitoring:', error)
  }

  try {
    // Initialize accessibility features
    initAccessibility()
  } catch (error) {
    console.error('Failed to initialize accessibility features:', error)
  }

  // Start Alpine.js
  Alpine.start()
})
