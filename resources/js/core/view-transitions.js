/**
 * View Transitions
 *
 * DISABLED by default due to conflicts with WordPress admin bar and content preservation issues.
 * Can be enabled for specific use cases, but requires careful implementation.
 *
 * Issues when enabled:
 * - Conflicts with WordPress admin bar
 * - Doesn't reinitialize WordPress scripts
 * - Doesn't reinitialize scroll animations
 * - Causes "ghost content" preservation between pages
 * - Aggressive speculation can cause UX issues
 */

/**
 * Initialize view transitions
 *
 * CURRENTLY DISABLED - uncomment to enable (not recommended in WordPress context)
 */
export function initViewTransitions() {
  // View Transitions disabled due to WordPress compatibility issues
  // See comments above for details

  console.info('View Transitions: Disabled for WordPress compatibility')

  // If you want to enable, uncomment below and test thoroughly:
  // return enableViewTransitions()
}

/**
 * Enable view transitions (use with caution)
 */
function enableViewTransitions() {
  // Check if View Transitions API is supported
  if (!document.startViewTransition) {
    console.info('View Transitions API not supported by browser')
    return
  }

  // Don't enable in WordPress admin
  if (document.body.classList.contains('wp-admin') ||
      document.body.classList.contains('wp-core-ui') ||
      document.querySelector('#wpadminbar')) {
    console.info('View Transitions: Disabled in WordPress admin')
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

  // Handle browser back/forward
  window.addEventListener('popstate', () => {
    navigateWithTransition(window.location.href, false)
  })

  console.info('View Transitions: Enabled')
}

/**
 * Check if navigation should be intercepted
 */
function shouldInterceptNavigation(link) {
  if (!link) return false
  if (link.target === '_blank') return false
  if (link.getAttribute('download')) return false
  if (link.href.startsWith('mailto:') || link.href.startsWith('tel:')) return false
  if (link.classList.contains('no-transition')) return false

  const url = new URL(link.href)
  const currentUrl = new URL(window.location.href)

  // Only intercept same-origin links
  if (url.origin !== currentUrl.origin) return false

  // Don't intercept hash links on same page
  if (url.pathname === currentUrl.pathname && url.hash) return false

  // Don't intercept WordPress admin links
  if (url.pathname.includes('/wp-admin/') || url.pathname.includes('/wp-login.php')) return false

  return true
}

/**
 * Navigate to URL with view transition
 */
async function navigateWithTransition(url, updateHistory = true) {
  try {
    // Show loading indicator (optional)
    document.documentElement.classList.add('is-navigating')

    // Fetch the new page
    const response = await fetch(url)

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`)
    }

    const html = await response.text()

    // Parse the HTML
    const parser = new DOMParser()
    const doc = parser.parseFromString(html, 'text/html')

    // Start view transition
    const transition = document.startViewTransition(() => {
      // Update the entire body content (more reliable than just main)
      const oldContent = document.querySelector('#app')
      const newContent = doc.querySelector('#app')

      if (oldContent && newContent) {
        oldContent.innerHTML = newContent.innerHTML
      } else {
        // Fallback: replace entire body
        document.body.innerHTML = doc.body.innerHTML
      }

      // Update the title
      document.title = doc.title

      // Update meta tags
      updateMetaTags(doc)

      // Update URL
      if (updateHistory) {
        history.pushState(null, '', url)
      }

      // Remove loading indicator
      document.documentElement.classList.remove('is-navigating')
    })

    await transition.finished

    // CRITICAL: Reinitialize WordPress and theme scripts
    reinitializeScripts()

    // Dispatch event for other scripts to listen to
    window.dispatchEvent(new CustomEvent('pagechange', { detail: { url } }))

    // Scroll to top (or preserve scroll position if needed)
    window.scrollTo(0, 0)

  } catch (error) {
    console.error('View transition failed:', error)

    // Remove loading indicator
    document.documentElement.classList.remove('is-navigating')

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

/**
 * Reinitialize scripts after content swap
 * CRITICAL for WordPress compatibility
 */
function reinitializeScripts() {
  // Reinitialize WordPress scripts
  if (window.wp && window.wp.domReady) {
    window.wp.domReady()
  }

  // Reinitialize scroll animations
  if (window.Alpine) {
    window.Alpine.destroyTree(document.body)
    window.Alpine.initTree(document.body)
  }

  // Reinitialize navigation
  const event = new Event('DOMContentLoaded', {
    bubbles: true,
    cancelable: true
  })
  document.dispatchEvent(event)
}

