/**
 * Orbiting Hero - Advanced GSAP Animation System
 *
 * Creates an immersive 3D orbiting ecosystem with:
 * - Mouse parallax effects
 * - Scroll-triggered animations
 * - Dynamic connection lines
 * - Particle systems
 * - Interactive hover states
 */

import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger)

export function initOrbitingHero() {
  const section = document.querySelector('.orbiting-hero')
  if (!section) return

  const ecosystem = section.querySelector('.orbiting-hero__ecosystem')
  const core = section.querySelector('.ecosystem__core')
  const orbitItems = section.querySelectorAll('.orbit__item')
  const orbits = section.querySelectorAll('.ecosystem__orbit')
  const svg = section.querySelector('.ecosystem__connections')
  const title = section.querySelector('.orbiting-hero__title')
  const titleAccent = section.querySelector('.orbiting-hero__title-accent')
  const subtitle = section.querySelector('.orbiting-hero__subtitle')
  const actions = section.querySelector('.orbiting-hero__actions')

  // Check if user prefers reduced motion
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches

  if (prefersReducedMotion) {
    // Skip advanced animations for users who prefer reduced motion
    setupBasicInteractions()
    return
  }

  // ═══════════════════════════════════════════════════
  // ENTRANCE ANIMATIONS
  // ═══════════════════════════════════════════════════

  function initEntranceAnimations() {
    // Set initial states
    gsap.set([title, subtitle, actions, ecosystem], {
      opacity: 0,
      y: 50
    })

    gsap.set(core, {
      scale: 0,
      rotation: -180
    })

    gsap.set(orbits, {
      scale: 0,
      opacity: 0
    })

    gsap.set(orbitItems, {
      scale: 0,
      opacity: 0
    })

    // Create entrance timeline
    const tl = gsap.timeline({
      defaults: {
        ease: 'power3.out'
      }
    })

    // Animate text content
    tl.to(title, {
      opacity: 1,
      y: 0,
      duration: 1,
      ease: 'power4.out'
    })
    .to(titleAccent, {
      color: 'var(--color-brand-primary)',
      duration: 0.8,
      ease: 'power2.inOut'
    }, '-=0.5')
    .to(subtitle, {
      opacity: 1,
      y: 0,
      duration: 0.8
    }, '-=0.6')
    .to(actions, {
      opacity: 1,
      y: 0,
      duration: 0.8
    }, '-=0.4')

    // Animate ecosystem
    tl.to(ecosystem, {
      opacity: 1,
      y: 0,
      duration: 1
    }, '-=0.8')
    .to(core, {
      scale: 1,
      rotation: 0,
      duration: 1.2,
      ease: 'elastic.out(1, 0.6)'
    }, '-=0.8')

    // Animate orbits
    orbits.forEach((orbit, index) => {
      tl.to(orbit, {
        scale: 1,
        opacity: 1,
        duration: 0.8,
        ease: 'back.out(1.4)'
      }, `-=${0.6 - index * 0.1}`)
    })

    // Animate orbit items with stagger
    tl.to(orbitItems, {
      scale: 1,
      opacity: 1,
      duration: 0.6,
      stagger: {
        amount: 0.8,
        from: 'random',
        ease: 'power2.out'
      },
      ease: 'back.out(1.7)'
    }, '-=0.4')
  }

  // ═══════════════════════════════════════════════════
  // MOUSE PARALLAX EFFECT
  // ═══════════════════════════════════════════════════

  function initMouseParallax() {
    let mouseX = 0
    let mouseY = 0
    let currentX = 0
    let currentY = 0

    section.addEventListener('mousemove', (e) => {
      const rect = section.getBoundingClientRect()
      const centerX = rect.width / 2
      const centerY = rect.height / 2

      mouseX = (e.clientX - rect.left - centerX) / centerX
      mouseY = (e.clientY - rect.top - centerY) / centerY
    })

    // Smooth parallax animation loop
    function animate() {
      currentX += (mouseX - currentX) * 0.05
      currentY += (mouseY - currentY) * 0.05

      // Apply parallax to ecosystem (3D tilt)
      gsap.to(ecosystem, {
        rotationY: currentX * 15,
        rotationX: -currentY * 15,
        duration: 0.5,
        ease: 'power2.out'
      })

      // Apply parallax to orbits (layered depth)
      orbits.forEach((orbit, index) => {
        const depth = (index + 1) * 0.3
        gsap.to(orbit, {
          x: currentX * 20 * depth,
          y: currentY * 20 * depth,
          duration: 0.8,
          ease: 'power2.out'
        })
      })

      // Apply parallax to core (subtle movement)
      gsap.to(core, {
        x: currentX * 10,
        y: currentY * 10,
        duration: 1,
        ease: 'power2.out'
      })

      requestAnimationFrame(animate)
    }

    animate()
  }

  // ═══════════════════════════════════════════════════
  // SCROLL-TRIGGERED PARALLAX
  // ═══════════════════════════════════════════════════

  function initScrollParallax() {
    gsap.to(ecosystem, {
      y: 100,
      scale: 0.95,
      opacity: 0.8,
      scrollTrigger: {
        trigger: section,
        start: 'top top',
        end: 'bottom top',
        scrub: 1,
      }
    })

    // Parallax orbits at different speeds
    orbits.forEach((orbit, index) => {
      gsap.to(orbit, {
        y: (index + 1) * 50,
        rotation: (index % 2 === 0 ? 180 : -180),
        scrollTrigger: {
          trigger: section,
          start: 'top top',
          end: 'bottom top',
          scrub: 1.5,
        }
      })
    })
  }

  // ═══════════════════════════════════════════════════
  // DYNAMIC CONNECTION LINES
  // ═══════════════════════════════════════════════════

  function setupConnectionLines() {
    if (!svg) return

    orbitItems.forEach((item) => {
      let line = null
      let animationFrame = null

      item.addEventListener('mouseenter', function () {
        const rect = this.getBoundingClientRect()
        const containerRect = svg.getBoundingClientRect()
        const centerX = containerRect.width / 2
        const centerY = containerRect.height / 2
        const itemX = rect.left + rect.width / 2 - containerRect.left
        const itemY = rect.top + rect.height / 2 - containerRect.top

        // Create SVG path element
        line = document.createElementNS('http://www.w3.org/2000/svg', 'path')
        line.setAttribute('class', 'connection-line active')

        // Create a smooth bezier curve
        const controlX = (centerX + itemX) / 2
        const controlY = (centerY + itemY) / 2 - Math.abs(itemX - centerX) * 0.3

        const pathD = `M ${centerX} ${centerY} Q ${controlX} ${controlY} ${itemX} ${itemY}`
        line.setAttribute('d', pathD)

        svg.appendChild(line)

        // Animate line appearance
        const length = line.getTotalLength()
        gsap.set(line, {
          strokeDasharray: length,
          strokeDashoffset: length
        })

        gsap.to(line, {
          strokeDashoffset: 0,
          duration: 0.8,
          ease: 'power2.out'
        })

        // Pulse animation
        function pulse() {
          gsap.to(line, {
            opacity: 0.4,
            duration: 0.5,
            yoyo: true,
            repeat: 1,
            ease: 'sine.inOut'
          })
          animationFrame = setTimeout(pulse, 1000)
        }
        pulse()
      })

      item.addEventListener('mouseleave', function () {
        if (line) {
          clearTimeout(animationFrame)
          gsap.to(line, {
            opacity: 0,
            duration: 0.4,
            onComplete: () => {
              if (line && line.parentNode) {
                line.remove()
              }
            }
          })
        }
      })
    })
  }

  // ═══════════════════════════════════════════════════
  // ENHANCED HOVER INTERACTIONS
  // ═══════════════════════════════════════════════════

  function setupHoverInteractions() {
    // Core logo hover effect
    if (core) {
      core.addEventListener('mouseenter', () => {
        gsap.to(core, {
          scale: 1.15,
          rotation: 360,
          duration: 0.8,
          ease: 'back.out(1.4)'
        })

        // Pulse all orbits
        orbits.forEach((orbit, index) => {
          gsap.to(orbit, {
            scale: 1.05,
            duration: 0.6,
            delay: index * 0.05,
            ease: 'power2.out'
          })
        })
      })

      core.addEventListener('mouseleave', () => {
        gsap.to(core, {
          scale: 1,
          rotation: 0,
          duration: 0.6,
          ease: 'power2.inOut'
        })

        orbits.forEach((orbit) => {
          gsap.to(orbit, {
            scale: 1,
            duration: 0.4,
            ease: 'power2.out'
          })
        })
      })
    }

    // Orbit item hover effects
    orbitItems.forEach((item) => {
      const badge = item.querySelector('.orbit__badge')
      const icon = item.querySelector('.orbit__icon')

      item.addEventListener('mouseenter', function () {
        // Scale and lift badge
        gsap.to(badge, {
          scale: 1.15,
          z: 30,
          duration: 0.4,
          ease: 'back.out(1.7)'
        })

        // Rotate and glow icon
        gsap.to(icon, {
          rotation: 360,
          scale: 1.2,
          duration: 0.6,
          ease: 'power2.out'
        })

        // Ripple effect on nearby items
        orbitItems.forEach((otherItem) => {
          if (otherItem !== item) {
            const distance = Math.hypot(
              item.offsetLeft - otherItem.offsetLeft,
              item.offsetTop - otherItem.offsetTop
            )
            const strength = Math.max(0, 1 - distance / 300)

            gsap.to(otherItem, {
              scale: 1 + strength * 0.1,
              duration: 0.3,
              ease: 'power2.out'
            })
          }
        })
      })

      item.addEventListener('mouseleave', function () {
        gsap.to(badge, {
          scale: 1,
          z: 0,
          duration: 0.3,
          ease: 'power2.inOut'
        })

        gsap.to(icon, {
          rotation: 0,
          scale: 1,
          duration: 0.4,
          ease: 'power2.out'
        })

        // Reset ripple effect
        orbitItems.forEach((otherItem) => {
          if (otherItem !== item) {
            gsap.to(otherItem, {
              scale: 1,
              duration: 0.3,
              ease: 'power2.out'
            })
          }
        })
      })
    })
  }

  // ═══════════════════════════════════════════════════
  // PARTICLE SYSTEM
  // ═══════════════════════════════════════════════════

  function initParticleSystem() {
    // Create particle container
    let particleContainer = section.querySelector('.ecosystem__particles')
    if (!particleContainer) {
      particleContainer = document.createElement('div')
      particleContainer.className = 'ecosystem__particles'
      ecosystem.appendChild(particleContainer)
    }

    // Generate particles
    const particleCount = 15
    for (let i = 0; i < particleCount; i++) {
      const particle = document.createElement('div')
      particle.className = 'particle'

      // Random starting position
      const startX = Math.random() * 100
      const startY = Math.random() * 100

      gsap.set(particle, {
        left: `${startX}%`,
        top: `${startY}%`,
        scale: Math.random() * 0.5 + 0.5
      })

      particleContainer.appendChild(particle)

      // Animate particle
      gsap.to(particle, {
        y: -window.innerHeight,
        x: (Math.random() - 0.5) * 200,
        opacity: 0,
        duration: Math.random() * 4 + 6,
        delay: Math.random() * 3,
        repeat: -1,
        ease: 'none'
      })
    }
  }

  // ═══════════════════════════════════════════════════
  // BASIC INTERACTIONS (FALLBACK)
  // ═══════════════════════════════════════════════════

  function setupBasicInteractions() {
    orbitItems.forEach((item) => {
      // Make items keyboard accessible
      if (!item.hasAttribute('tabindex')) {
        item.setAttribute('tabindex', '0')
      }

      // Handle keyboard interaction
      item.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault()
          this.click()
        }
      })

      // Optional: Add click handling
      item.addEventListener('click', function () {
        const service = this.getAttribute('data-service')
        if (service) {
          console.log(`Service clicked: ${service}`)
          // Add custom click handling here
        }
      })
    })
  }

  // ═══════════════════════════════════════════════════
  // INITIALIZE ALL FEATURES
  // ═══════════════════════════════════════════════════

  initEntranceAnimations()
  initMouseParallax()
  initScrollParallax()
  setupConnectionLines()
  setupHoverInteractions()
  initParticleSystem()
  setupBasicInteractions()

  console.log('✨ Orbiting Hero initialized with advanced GSAP animations')
}

// Auto-initialize when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initOrbitingHero)
} else {
  initOrbitingHero()
}
