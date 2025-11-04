/**
 * GSAP Orbit System - A fucking masterpiece
 *
 * Features:
 * - Multiple orbit rings with independent rotations
 * - Smooth GSAP-powered animations
 * - Interactive hover effects with physics
 * - Dynamic particle system
 * - Connection lines on hover
 */

import gsap from 'gsap'

export function initGsapOrbit() {
  const orbitSystem = document.querySelector('.gsap-orbit-system')
  if (!orbitSystem) return

  const canvas = orbitSystem.querySelector('.orbit-canvas')
  const core = orbitSystem.querySelector('.orbit-core')
  const rings = orbitSystem.querySelectorAll('.orbit-ring')
  const allItems = orbitSystem.querySelectorAll('.orbit-item')
  const particleContainer = orbitSystem.querySelector('.orbit-particles')
  const svg = orbitSystem.querySelector('.orbit-connections')

  // ═══════════════════════════════════════════════════
  // CORE PULSE ANIMATION
  // ═══════════════════════════════════════════════════

  const corePulse = orbitSystem.querySelector('.core-pulse')

  gsap.to(corePulse, {
    scale: 1.5,
    opacity: 0,
    duration: 2,
    repeat: -1,
    ease: 'power1.out'
  })

  gsap.to(core, {
    rotationZ: 360,
    duration: 20,
    repeat: -1,
    ease: 'none'
  })

  // ═══════════════════════════════════════════════════
  // ORBIT RINGS ROTATION
  // ═══════════════════════════════════════════════════

  const ringConfigs = [
    { duration: 20, direction: 1 },   // Ring 1 - slow clockwise
    { duration: 30, direction: -1 },  // Ring 2 - slower counter-clockwise
    { duration: 40, direction: 1 }    // Ring 3 - slowest clockwise
  ]

  rings.forEach((ring, index) => {
    const config = ringConfigs[index]

    gsap.to(ring, {
      rotation: 360 * config.direction,
      duration: config.duration,
      repeat: -1,
      ease: 'none'
    })

    // Counter-rotate items so they stay upright
    const items = ring.querySelectorAll('.orbit-item')
    items.forEach(item => {
      gsap.to(item, {
        rotation: -360 * config.direction,
        duration: config.duration,
        repeat: -1,
        ease: 'none'
      })
    })
  })

  // ═══════════════════════════════════════════════════
  // ENTRANCE ANIMATION
  // ═══════════════════════════════════════════════════

  gsap.from(core, {
    scale: 0,
    opacity: 0,
    duration: 1,
    ease: 'back.out(1.7)'
  })

  rings.forEach((ring, index) => {
    const items = ring.querySelectorAll('.orbit-item')

    gsap.from(ring, {
      scale: 0,
      opacity: 0,
      duration: 1,
      delay: 0.2 + (index * 0.15),
      ease: 'back.out(1.7)'
    })

    items.forEach((item, itemIndex) => {
      gsap.from(item.querySelector('.item-content'), {
        scale: 0,
        opacity: 0,
        duration: 0.6,
        delay: 0.4 + (index * 0.15) + (itemIndex * 0.08),
        ease: 'back.out(2)'
      })
    })
  })

  // ═══════════════════════════════════════════════════
  // HOVER INTERACTIONS - ITEMS
  // ═══════════════════════════════════════════════════

  allItems.forEach(item => {
    const content = item.querySelector('.item-content')

    item.addEventListener('mouseenter', function() {
      // Scale up the item
      gsap.to(content, {
        scale: 1.3,
        duration: 0.4,
        ease: 'back.out(2)'
      })

      // Glow effect
      gsap.to(content, {
        boxShadow: '0 0 30px rgba(99, 102, 241, 0.8), 0 0 60px rgba(236, 72, 153, 0.4)',
        duration: 0.4
      })

      // Create ripple effect on nearby items
      allItems.forEach(otherItem => {
        if (otherItem !== item) {
          const distance = getDistance(item, otherItem)
          if (distance < 300) {
            const strength = 1 - (distance / 300)
            const otherContent = otherItem.querySelector('.item-content')

            gsap.to(otherContent, {
              scale: 1 + (strength * 0.15),
              duration: 0.3,
              ease: 'power2.out'
            })
          }
        }
      })

      // Draw connection line to core
      drawConnectionLine(item, core)
    })

    item.addEventListener('mouseleave', function() {
      // Reset scale
      gsap.to(content, {
        scale: 1,
        duration: 0.3,
        ease: 'power2.inOut'
      })

      // Reset glow
      gsap.to(content, {
        boxShadow: '0 0 15px rgba(99, 102, 241, 0.3)',
        duration: 0.3
      })

      // Reset all items
      allItems.forEach(otherItem => {
        const otherContent = otherItem.querySelector('.item-content')
        gsap.to(otherContent, {
          scale: 1,
          duration: 0.3
        })
      })

      // Remove connection line
      removeConnectionLines()
    })

    // Click animation
    item.addEventListener('click', function() {
      gsap.timeline()
        .to(content, {
          scale: 0.9,
          duration: 0.1,
          ease: 'power2.in'
        })
        .to(content, {
          scale: 1.3,
          duration: 0.4,
          ease: 'elastic.out(1, 0.5)'
        })

      // Create expanding ring effect
      createRingEffect(item)
    })
  })

  // ═══════════════════════════════════════════════════
  // CORE HOVER
  // ═══════════════════════════════════════════════════

  core.addEventListener('mouseenter', () => {
    gsap.to(core.querySelector('.core-inner'), {
      scale: 1.2,
      duration: 0.6,
      ease: 'elastic.out(1, 0.5)'
    })

    // Pulse all rings
    rings.forEach((ring, index) => {
      gsap.to(ring, {
        scale: 1.05,
        duration: 0.5,
        delay: index * 0.05,
        ease: 'power2.out'
      })
    })

    // Energize all items
    allItems.forEach((item, index) => {
      const content = item.querySelector('.item-content')
      gsap.to(content, {
        scale: 1.1,
        duration: 0.4,
        delay: index * 0.02,
        ease: 'back.out(2)'
      })
    })
  })

  core.addEventListener('mouseleave', () => {
    gsap.to(core.querySelector('.core-inner'), {
      scale: 1,
      duration: 0.4,
      ease: 'power2.out'
    })

    rings.forEach(ring => {
      gsap.to(ring, {
        scale: 1,
        duration: 0.4,
        ease: 'power2.out'
      })
    })

    allItems.forEach(item => {
      const content = item.querySelector('.item-content')
      gsap.to(content, {
        scale: 1,
        duration: 0.3
      })
    })
  })

  // ═══════════════════════════════════════════════════
  // CONNECTION LINES
  // ═══════════════════════════════════════════════════

  let activeLine = null

  function drawConnectionLine(fromItem, toElement) {
    if (!svg) return

    removeConnectionLines()

    const canvasRect = canvas.getBoundingClientRect()
    const fromRect = fromItem.getBoundingClientRect()
    const toRect = toElement.getBoundingClientRect()

    const x1 = (toRect.left + toRect.width / 2) - canvasRect.left
    const y1 = (toRect.top + toRect.height / 2) - canvasRect.top
    const x2 = (fromRect.left + fromRect.width / 2) - canvasRect.left
    const y2 = (fromRect.top + fromRect.height / 2) - canvasRect.top

    // Create curved path
    const controlX = (x1 + x2) / 2
    const controlY = (y1 + y2) / 2 - Math.abs(x2 - x1) * 0.15

    const path = document.createElementNS('http://www.w3.org/2000/svg', 'path')
    const pathD = `M ${x1} ${y1} Q ${controlX} ${controlY} ${x2} ${y2}`

    path.setAttribute('d', pathD)
    path.setAttribute('stroke', 'url(#lineGradient)')
    path.setAttribute('stroke-width', '2')
    path.setAttribute('fill', 'none')
    path.setAttribute('opacity', '0')
    path.setAttribute('class', 'connection-path')

    const length = path.getTotalLength()
    path.style.strokeDasharray = length
    path.style.strokeDashoffset = length

    svg.appendChild(path)
    activeLine = path

    // Animate the line
    gsap.to(path, {
      strokeDashoffset: 0,
      opacity: 1,
      duration: 0.6,
      ease: 'power2.out'
    })
  }

  function removeConnectionLines() {
    if (activeLine) {
      gsap.to(activeLine, {
        opacity: 0,
        duration: 0.3,
        onComplete: () => {
          if (activeLine && activeLine.parentNode) {
            activeLine.remove()
          }
          activeLine = null
        }
      })
    }
  }

  // ═══════════════════════════════════════════════════
  // PARTICLE SYSTEM
  // ═══════════════════════════════════════════════════

  function initParticles() {
    if (!particleContainer) return

    const particleCount = 30

    for (let i = 0; i < particleCount; i++) {
      const particle = document.createElement('div')
      particle.className = 'particle'

      const size = Math.random() * 4 + 2
      particle.style.width = `${size}px`
      particle.style.height = `${size}px`

      particleContainer.appendChild(particle)
      animateParticle(particle)
    }
  }

  function animateParticle(particle) {
    const startX = Math.random() * 100
    const startY = Math.random() * 100
    const endX = Math.random() * 100
    const endY = Math.random() * 100

    gsap.set(particle, {
      left: `${startX}%`,
      top: `${startY}%`,
      opacity: 0
    })

    gsap.timeline({ repeat: -1 })
      .to(particle, {
        left: `${endX}%`,
        top: `${endY}%`,
        opacity: 0.6,
        duration: Math.random() * 5 + 5,
        ease: 'none'
      })
      .to(particle, {
        opacity: 0,
        duration: 1
      }, '-=1')
      .call(() => animateParticle(particle))
  }

  // ═══════════════════════════════════════════════════
  // RING EFFECT (on click)
  // ═══════════════════════════════════════════════════

  function createRingEffect(item) {
    const ring = document.createElement('div')
    ring.className = 'click-ring'

    const rect = item.getBoundingClientRect()
    const canvasRect = canvas.getBoundingClientRect()

    ring.style.left = (rect.left + rect.width / 2 - canvasRect.left) + 'px'
    ring.style.top = (rect.top + rect.height / 2 - canvasRect.top) + 'px'

    canvas.appendChild(ring)

    gsap.to(ring, {
      scale: 3,
      opacity: 0,
      duration: 0.8,
      ease: 'power2.out',
      onComplete: () => ring.remove()
    })
  }

  // ═══════════════════════════════════════════════════
  // UTILITIES
  // ═══════════════════════════════════════════════════

  function getDistance(elem1, elem2) {
    const rect1 = elem1.getBoundingClientRect()
    const rect2 = elem2.getBoundingClientRect()

    const x1 = rect1.left + rect1.width / 2
    const y1 = rect1.top + rect1.height / 2
    const x2 = rect2.left + rect2.width / 2
    const y2 = rect2.top + rect2.height / 2

    return Math.hypot(x2 - x1, y2 - y1)
  }

  // Update SVG viewBox on resize
  function updateSVG() {
    if (!svg || !canvas) return
    const rect = canvas.getBoundingClientRect()
    svg.setAttribute('viewBox', `0 0 ${rect.width} ${rect.height}`)
    svg.setAttribute('width', rect.width)
    svg.setAttribute('height', rect.height)
  }

  updateSVG()
  window.addEventListener('resize', updateSVG)

  // ═══════════════════════════════════════════════════
  // INITIALIZE
  // ═══════════════════════════════════════════════════

  initParticles()

  console.log('🚀 GSAP Orbit System initialized - Fucking beautiful!')
}

// Auto-init
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initGsapOrbit)
} else {
  initGsapOrbit()
}
