/**
 * Orbiting Hero - Refactored from Scratch
 *
 * Handles:
 * - Positioning orbit items in circular paths
 * - Smooth hover interactions
 * - Dynamic connection lines
 * - Particle system
 * - Accessibility support
 */

export function initOrbitingHero() {
  const section = document.querySelector('.orbiting-hero')
  if (!section) return

  const orbitContainer = section.querySelector('.orbiting-hero__orbit-container')
  const core = section.querySelector('.orbit-core__logo')
  const rings = section.querySelectorAll('.orbit-system__ring')
  const svg = section.querySelector('.orbit-system__connections')
  const particleContainer = section.querySelector('.orbit-system__particles')

  // Check if user prefers reduced motion
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches

  if (prefersReducedMotion) {
    // Skip advanced animations for accessibility
    setupBasicInteractions()
    return
  }

  // ═══════════════════════════════════════════════════
  // POSITION ORBIT ITEMS
  // ═══════════════════════════════════════════════════

  /**
   * Position items in circular path based on data-angle attribute
   * Since we're showing only the top half, items are positioned
   * on the full circle but the container cuts off the bottom
   */
  function positionOrbitItems() {
    rings.forEach((ring) => {
      const items = ring.querySelectorAll('.orbit-ring__item')
      const radius = ring.offsetWidth / 2

      items.forEach((item) => {
        const angle = parseInt(item.getAttribute('data-angle') || 0)

        // Convert angle to radians (0° is top, clockwise)
        // Subtract 90 to start from top instead of right
        const radian = ((angle - 90) * Math.PI) / 180

        // Calculate position
        const x = radius + radius * Math.cos(radian)
        const y = radius + radius * Math.sin(radian)

        // Position item at calculated coordinates
        item.style.left = `${x}px`
        item.style.top = `${y}px`
        item.style.transform = 'translate(-50%, -50%)'
      })
    })
  }

  // Initial positioning
  positionOrbitItems()

  // Reposition on window resize (debounced)
  let resizeTimeout
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout)
    resizeTimeout = setTimeout(positionOrbitItems, 150)
  })

  // ═══════════════════════════════════════════════════
  // CONNECTION LINES (Draw lines from core to items on hover)
  // ═══════════════════════════════════════════════════

  function setupConnectionLines() {
    if (!svg) return

    const allItems = section.querySelectorAll('.orbit-ring__item')

    allItems.forEach((item) => {
      let line = null

      item.addEventListener('mouseenter', function() {
        // Get positions
        const containerRect = orbitContainer.getBoundingClientRect()
        const itemRect = this.getBoundingClientRect()
        const coreRect = core.getBoundingClientRect()

        // Calculate center positions relative to container
        const centerX = (coreRect.left + coreRect.width / 2) - containerRect.left
        const centerY = (coreRect.top + coreRect.height / 2) - containerRect.top
        const itemX = (itemRect.left + itemRect.width / 2) - containerRect.left
        const itemY = (itemRect.top + itemRect.height / 2) - containerRect.top

        // Create SVG path
        line = document.createElementNS('http://www.w3.org/2000/svg', 'path')
        line.setAttribute('class', 'connection-line')

        // Create smooth bezier curve
        const controlX = (centerX + itemX) / 2
        const controlY = (centerY + itemY) / 2 - Math.abs(itemX - centerX) * 0.2

        const pathD = `M ${centerX} ${centerY} Q ${controlX} ${controlY} ${itemX} ${itemY}`
        line.setAttribute('d', pathD)

        svg.appendChild(line)

        // Trigger animation
        requestAnimationFrame(() => {
          line.classList.add('active')
        })
      })

      item.addEventListener('mouseleave', function() {
        if (line && line.parentNode) {
          line.classList.remove('active')
          setTimeout(() => {
            if (line && line.parentNode) {
              line.remove()
            }
          }, 500)
        }
      })
    })
  }

  // ═══════════════════════════════════════════════════
  // CORE HOVER EFFECT
  // ═══════════════════════════════════════════════════

  function setupCoreHover() {
    if (!core) return

    core.addEventListener('mouseenter', () => {
      // Pulse effect on all rings
      rings.forEach((ring, index) => {
        setTimeout(() => {
          ring.style.transition = 'transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)'
          ring.style.transform = 'translate(-50%, 50%) scale(1.03)'
        }, index * 50)
      })
    })

    core.addEventListener('mouseleave', () => {
      rings.forEach((ring) => {
        ring.style.transform = 'translate(-50%, 50%) scale(1)'
      })
    })
  }

  // ═══════════════════════════════════════════════════
  // PARTICLE SYSTEM
  // ═══════════════════════════════════════════════════

  function initParticles() {
    if (!particleContainer) return

    const particleCount = 12

    for (let i = 0; i < particleCount; i++) {
      const particle = document.createElement('div')
      particle.className = 'particle'

      // Random starting position
      const startX = Math.random() * 100
      const startY = Math.random() * 100

      particle.style.left = `${startX}%`
      particle.style.top = `${startY}%`

      // Random animation delay and duration
      const delay = Math.random() * 5
      const duration = 8 + Math.random() * 4

      particle.style.animationDelay = `${delay}s`
      particle.style.animationDuration = `${duration}s`

      particleContainer.appendChild(particle)
    }
  }

  // ═══════════════════════════════════════════════════
  // ENHANCED HOVER INTERACTIONS
  // ═══════════════════════════════════════════════════

  function setupHoverInteractions() {
    const allItems = section.querySelectorAll('.orbit-ring__item')

    allItems.forEach((item) => {
      item.addEventListener('mouseenter', function() {
        // Scale up the badge
        const badge = this.querySelector('.orbit-item__badge')
        if (badge) {
          badge.style.transform = 'scale(1.12)'
        }

        // Slight ripple effect on nearby items
        allItems.forEach((otherItem) => {
          if (otherItem !== item) {
            const thisRect = item.getBoundingClientRect()
            const otherRect = otherItem.getBoundingClientRect()

            const distance = Math.hypot(
              thisRect.left - otherRect.left,
              thisRect.top - otherRect.top
            )

            // If items are close, create a subtle ripple
            if (distance < 300) {
              const strength = Math.max(0, 1 - distance / 300)
              const otherBadge = otherItem.querySelector('.orbit-item__badge')
              if (otherBadge) {
                otherBadge.style.transition = 'transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1)'
                otherBadge.style.transform = `scale(${1 + strength * 0.08})`
              }
            }
          }
        })
      })

      item.addEventListener('mouseleave', function() {
        // Reset all badges
        allItems.forEach((anyItem) => {
          const badge = anyItem.querySelector('.orbit-item__badge')
          if (badge) {
            badge.style.transform = ''
          }
        })
      })

      // Click handling (optional - can be extended)
      item.addEventListener('click', function() {
        const service = this.getAttribute('data-service')
        console.log(`🎯 Service clicked: ${service}`)
        // Add your custom click handling here
      })
    })
  }

  // ═══════════════════════════════════════════════════
  // BASIC INTERACTIONS (Fallback for reduced motion)
  // ═══════════════════════════════════════════════════

  function setupBasicInteractions() {
    const allItems = section.querySelectorAll('.orbit-ring__item')

    allItems.forEach((item) => {
      // Make items keyboard accessible
      if (!item.hasAttribute('tabindex')) {
        item.setAttribute('tabindex', '0')
      }

      // Handle keyboard interaction
      item.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault()
          this.click()
        }
      })

      // Click handling
      item.addEventListener('click', function() {
        const service = this.getAttribute('data-service')
        const label = this.querySelector('.orbit-item__label')?.textContent
        console.log(`🎯 Service: ${service} - ${label}`)
      })
    })

    // Make core keyboard accessible
    if (core) {
      if (!core.hasAttribute('tabindex')) {
        core.setAttribute('tabindex', '0')
      }

      core.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault()
          console.log('🎯 Core logo clicked')
        }
      })
    }
  }

  // ═══════════════════════════════════════════════════
  // SVG VIEWBOX SETUP
  // ═══════════════════════════════════════════════════

  function setupSVG() {
    if (!svg || !orbitContainer) return

    const width = orbitContainer.offsetWidth
    const height = orbitContainer.offsetHeight

    svg.setAttribute('viewBox', `0 0 ${width} ${height}`)
    svg.setAttribute('width', width)
    svg.setAttribute('height', height)
  }

  // Initial SVG setup
  setupSVG()

  // Update SVG on resize
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout)
    resizeTimeout = setTimeout(setupSVG, 150)
  })

  // ═══════════════════════════════════════════════════
  // INITIALIZE ALL FEATURES
  // ═══════════════════════════════════════════════════

  setupConnectionLines()
  setupCoreHover()
  setupHoverInteractions()
  initParticles()
  setupBasicInteractions()

  console.log('✨ Orbiting Hero initialized (refactored version)')
}

// Auto-initialize when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initOrbitingHero)
} else {
  initOrbitingHero()
}
