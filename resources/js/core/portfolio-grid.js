/**
 * Portfolio Grid - Mobile Navigation Toggle
 */

export function initPortfolioGrid() {
  const toggle = document.getElementById('mobileNavToggle')
  const sidebar = document.getElementById('portfolioSidebar')
  const overlay = document.getElementById('sidebarOverlay')

  if (!toggle || !sidebar || !overlay) {
    return
  }

  function openSidebar() {
    sidebar.classList.add('active')
    overlay.classList.add('active')
    toggle.classList.add('active')
    document.body.style.overflow = 'hidden'
  }

  function closeSidebar() {
    sidebar.classList.remove('active')
    overlay.classList.remove('active')
    toggle.classList.remove('active')
    document.body.style.overflow = ''
  }

  // Toggle button click
  toggle.addEventListener('click', () => {
    if (sidebar.classList.contains('active')) {
      closeSidebar()
    } else {
      openSidebar()
    }
  })

  // Overlay click to close
  overlay.addEventListener('click', closeSidebar)

  // Close sidebar on link click (mobile)
  const sidebarLinks = sidebar.querySelectorAll('a')
  sidebarLinks.forEach(link => {
    link.addEventListener('click', () => {
      if (window.innerWidth <= 768) {
        closeSidebar()
      }
    })
  })

  // Close sidebar when resizing to desktop
  window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
      closeSidebar()
    }
  })

  console.log('✅ Portfolio grid initialized')
}
