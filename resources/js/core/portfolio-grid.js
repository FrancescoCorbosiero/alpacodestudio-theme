/**
 * Portfolio Grid - Mobile Navigation Toggle
 * Toggles fullscreen nav overlay with cool circular reveal animation!
 */

export function initPortfolioGrid() {
  const toggle = document.getElementById('mobileNavToggle')
  const navOverlay = document.querySelector('.nav-overlay')

  if (!toggle) {
    return
  }

  function openNav() {
    document.body.classList.add('nav-active')
  }

  function closeNav() {
    document.body.classList.remove('nav-active')
  }

  function toggleNav() {
    if (document.body.classList.contains('nav-active')) {
      closeNav()
    } else {
      openNav()
    }
  }

  // Toggle button click
  toggle.addEventListener('click', toggleNav)

  // Close nav when clicking on a link
  if (navOverlay) {
    const navLinks = navOverlay.querySelectorAll('a')
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        closeNav()
      })
    })
  }

  // Close nav when pressing Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && document.body.classList.contains('nav-active')) {
      closeNav()
    }
  })

  // Close nav when resizing to desktop
  window.addEventListener('resize', () => {
    if (window.innerWidth > 768 && document.body.classList.contains('nav-active')) {
      closeNav()
    }
  })

  console.log('✅ Portfolio grid with nav overlay initialized')
}
