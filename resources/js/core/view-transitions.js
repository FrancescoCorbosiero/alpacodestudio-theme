/**
 * View Transitions
 * SPA-like navigation using the View Transitions API
 */

/**
 * Initialize view transitions
 */
export function initViewTransitions() {
  // Check if View Transitions API is supported
  if (!document.startViewTransition) {
    return
  }

  // Intercept navigation clicks
  document.addEventListener('click', (e) => {
    const link = e.target.closest('a')

    if (shouldInterceptNavigation(link)) {
      e.preventDefault()
      navigateWithTransition(link.href)
    }
  })
}

/**
 * Check if navigation should be intercepted
 */
function shouldInterceptNavigation(link) {
  if (!link) return false
  if (link.target === '_blank') return false
  if (link.getAttribute('download')) return false
  if (link.href.startsWith('mailto:') || link.href.startsWith('tel:')) return false

  const url = new URL(link.href)
  const currentUrl = new URL(window.location.href)

  // Only intercept same-origin links
  if (url.origin !== currentUrl.origin) return false

  // Don't intercept hash links
  if (url.pathname === currentUrl.pathname && url.hash) return false

  return true
}

/**
 * Navigate to URL with view transition
 */
async function navigateWithTransition(url) {
  try {
    // Fetch the new page
    const response = await fetch(url)
    const html = await response.text()

    // Parse the HTML
    const parser = new DOMParser()
    const doc = parser.parseFromString(html, 'text/html')

    // Start view transition
    const transition = document.startViewTransition(() => {
      // Update the content
      const main = document.querySelector('main')
      const newMain = doc.querySelector('main')

      if (main && newMain) {
        main.innerHTML = newMain.innerHTML
      }

      // Update the title
      document.title = doc.title

      // Update meta tags
      updateMetaTags(doc)

      // Update URL
      history.pushState(null, '', url)
    })

    await transition.finished

    // Reinitialize any scripts that need to run on new content
    window.dispatchEvent(new CustomEvent('pagechange'))

  } catch (error) {
    // Fallback to normal navigation on error
    window.location.href = url
  }
}

/**
 * Update meta tags from new document
 */
function updateMetaTags(doc) {
  // Update description
  const description = doc.querySelector('meta[name="description"]')
  const currentDescription = document.querySelector('meta[name="description"]')

  if (description && currentDescription) {
    currentDescription.setAttribute('content', description.getAttribute('content'))
  }

  // Update OG tags
  const ogTags = doc.querySelectorAll('meta[property^="og:"]')
  ogTags.forEach(tag => {
    const property = tag.getAttribute('property')
    const current = document.querySelector(`meta[property="${property}"]`)

    if (current) {
      current.setAttribute('content', tag.getAttribute('content'))
    }
  })
}
