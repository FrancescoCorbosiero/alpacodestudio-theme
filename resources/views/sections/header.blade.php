<header class="site-header sticky" style="position: sticky; top: 0; z-index: var(--z-sticky); background: var(--color-surface-base); border-bottom: 1px solid var(--color-neutral-200);">
  <div class="container">
    <div class="header__inner flex items-center justify-between" style="padding-block: var(--space-md);">
      {{-- Logo / Site Name --}}
      <a href="{{ home_url('/') }}" class="header__logo heading-4" style="text-decoration: none;">
        @if (has_custom_logo())
          {!! get_custom_logo() !!}
        @else
          {{ $siteName }}
        @endif
      </a>

      {{-- Primary Navigation --}}
      @if (has_nav_menu('primary_navigation'))
        <nav class="header__nav hidden md:block" aria-label="{{ __('Primary Navigation', 'sage') }}">
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'flex gap-lg items-center',
            'container' => false,
            'fallback_cb' => false,
          ]) !!}
        </nav>
      @endif

      {{-- Header Actions --}}
      <div class="header__actions flex items-center gap-md">
        {{-- Theme Toggle Button --}}
        <button
          class="theme-toggle button button--ghost"
          aria-label="{{ __('Toggle theme', 'sage') }}"
          data-theme-toggle
        >
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="theme-toggle__icon theme-toggle__icon--light">
            <path d="M10 3V1M10 19V17M17 10H19M1 10H3M15.657 4.343L17.071 2.929M2.929 17.071L4.343 15.657M15.657 15.657L17.071 17.071M2.929 2.929L4.343 4.343" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            <circle cx="10" cy="10" r="4" stroke="currentColor" stroke-width="2"/>
          </svg>
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" class="theme-toggle__icon theme-toggle__icon--dark" style="display: none;">
            <path d="M17 10.5C17 14.0899 14.0899 17 10.5 17C6.91015 17 4 14.0899 4 10.5C4 6.91015 6.91015 4 10.5 4C10.7761 4 11.0472 4.01786 11.3125 4.05208C10.2119 5.07434 9.5 6.50889 9.5 8.10714C9.5 10.8949 11.7051 13.1 14.4929 13.1C16.0911 13.1 17.5257 12.3881 18.5479 11.2875C18.5821 11.5528 18.6 11.8239 18.6 12.1C18.6 15.8033 15.6033 18.8 11.9 18.8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </button>

        {{-- Mobile Menu Toggle --}}
        <button
          class="mobile-menu-toggle button button--ghost md:hidden"
          aria-label="{{ __('Toggle menu', 'sage') }}"
          aria-expanded="false"
          data-mobile-menu-toggle
        >
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M3 12H21M3 6H21M3 18H21" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </button>
      </div>
    </div>

    {{-- Mobile Navigation --}}
    @if (has_nav_menu('primary_navigation'))
      <nav
        class="mobile-menu md:hidden"
        aria-label="{{ __('Mobile Navigation', 'sage') }}"
        data-mobile-menu
        style="display: none; padding-block-end: var(--space-md);"
      >
        {!! wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_class' => 'stack-sm',
          'container' => false,
          'fallback_cb' => false,
        ]) !!}
      </nav>
    @endif
  </div>
</header>
