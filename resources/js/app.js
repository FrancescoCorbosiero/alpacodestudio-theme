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

// Make Alpine available globally
window.Alpine = Alpine

// Import static assets
import.meta.glob([
  '../images/**',
  '../fonts/**',
])

/**
 * Initialize theme on DOM ready
 */
document.addEventListener('DOMContentLoaded', () => {
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
