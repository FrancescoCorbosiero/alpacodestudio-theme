<footer class="site-footer" style="background: var(--color-surface-raised); border-top: 1px solid var(--color-neutral-200); padding-block: var(--space-3xl) var(--space-lg);">
  <div class="container">
    {{-- Footer Main --}}
    <div class="footer__main grid grid--3 gap-xl" style="margin-block-end: var(--space-2xl);">
      {{-- About Column --}}
      <div class="footer__col footer__col--about">
        <div class="heading-5" style="margin-block-end: var(--space-md);">
          {{ $siteName }}
        </div>
        <p class="body-small" style="margin-block-end: var(--space-md);">
          {{ $siteDescription }}
        </p>

        {{-- Social Links (if needed) --}}
        <div class="flex gap-sm">
          {{-- Add social media links here --}}
        </div>
      </div>

      {{-- Links Column --}}
      <div class="footer__col footer__col--links">
        <h3 class="heading-6" style="margin-block-end: var(--space-md);">
          {{ __('Quick Links', 'sage') }}
        </h3>
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'stack-sm',
            'container' => false,
            'fallback_cb' => false,
          ]) !!}
        @endif
      </div>

      {{-- Contact Column --}}
      <div class="footer__col footer__col--contact">
        <h3 class="heading-6" style="margin-block-end: var(--space-md);">
          {{ __('Contact', 'sage') }}
        </h3>
        <address class="body-small stack-xs" style="font-style: normal;">
          {{-- Add contact information here --}}
          <p>{{ __('Email:', 'sage') }} <a href="mailto:info@alpacode.studio">info@alpacode.studio</a></p>
        </address>
      </div>
    </div>

    {{-- Footer Bottom --}}
    <div class="footer__bottom flex items-center justify-between flex-wrap gap-md" style="padding-block-start: var(--space-lg); border-top: 1px solid var(--color-neutral-200);">
      <p class="footer__copyright body-small text-secondary">
        &copy; {{ date('Y') }} {{ $siteName }}. {{ __('All rights reserved.', 'sage') }}
      </p>

      <nav class="footer__legal" aria-label="{{ __('Legal Navigation', 'sage') }}">
        <ul class="flex gap-md body-small">
          <li><a href="{{ home_url('/privacy-policy') }}">{{ __('Privacy Policy', 'sage') }}</a></li>
          <li><a href="{{ home_url('/terms-of-service') }}">{{ __('Terms of Service', 'sage') }}</a></li>
        </ul>
      </nav>
    </div>
  </div>
</footer>
