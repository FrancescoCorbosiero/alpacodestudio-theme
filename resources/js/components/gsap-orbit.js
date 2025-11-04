/**
 * Simple Orbit System - Minimal JS, no GSAP bullshit
 */

export function initGsapOrbit() {
  const orbitItems = document.querySelectorAll('.orbit-item')
  const coreElement = document.querySelector('.core-inner')

  if (!orbitItems.length || !coreElement) return

  // Orbit item interactions
  orbitItems.forEach(item => {
    item.addEventListener('click', function() {
      // Create ripple effect
      const ripple = document.createElement('div')
      ripple.style.cssText = `
        position: absolute;
        inset: 0;
        border-radius: 50px;
        background: rgba(229, 157, 2, 0.3);
        animation: ping 0.6s cubic-bezier(0, 0, 0.2, 1);
        pointer-events: none;
      `
      this.querySelector('.item-content').appendChild(ripple)
      setTimeout(() => ripple.remove(), 600)
    })

    item.addEventListener('mouseenter', function() {
      this.style.zIndex = '100'
    })

    item.addEventListener('mouseleave', function() {
      this.style.zIndex = ''
    })
  })

  // Core interactions
  coreElement.addEventListener('click', function() {
    // Highlight all orbit items
    orbitItems.forEach(item => {
      const content = item.querySelector('.item-content')
      content.style.transform = 'scale(1.2)'
      content.style.borderColor = '#e59d02'

      setTimeout(() => {
        content.style.transform = ''
        content.style.borderColor = ''
      }, 400)
    })

    // Core pulse effect
    this.style.transform = 'scale(1.2)'
    setTimeout(() => {
      this.style.transform = ''
    }, 200)
  })

  // Performance optimization - pause animations when not visible
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      const orbits = document.querySelectorAll('.orbit')
      if (entry.isIntersecting) {
        orbits.forEach(orbit => orbit.style.animationPlayState = 'running')
      } else {
        orbits.forEach(orbit => orbit.style.animationPlayState = 'paused')
      }
    })
  })

  const container = document.querySelector('.gsap-orbit-system, .orbit').parentElement
  if (container) {
    observer.observe(container)
  }

  console.log('✨ Simple Orbit System initialized')
}

// Auto-init
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initGsapOrbit)
} else {
  initGsapOrbit()
}
