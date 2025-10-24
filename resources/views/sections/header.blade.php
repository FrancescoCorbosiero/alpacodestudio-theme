{{--
  Site Header - Modern Shoelace-based Navigation

  Features:
  - Responsive design with mobile drawer
  - Dynamic WordPress menu integration
  - Shoelace dropdown components for nested menus
  - Theme toggle with smooth transitions
  - Sticky header with backdrop blur
--}}

<header
  class="site-header"
  style="
    position: sticky;
    top: 0;
    z-index: var(--z-sticky, 1000);
    background: var(--sl-color-neutral-0);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-bottom: 1px solid var(--sl-color-neutral-200);
    box-shadow: var(--sl-shadow-small);
  "
>
  <div class="container">
    <div
      class="header__inner flex items-center justify-between gap-md"
      style="padding-block: var(--space-sm); min-height: 64px;"
    >
      {{-- Logo / Site Name --}}
      <div class="header__brand">
        <a
          href="{{ home_url('/') }}"
          class="header__logo heading-4"
          style="
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: var(--space-xs);
            font-weight: var(--sl-font-weight-bold);
            color: var(--sl-color-neutral-900);
            transition: opacity 0.2s ease;
          "
          onmouseover="this.style.opacity='0.7'"
          onmouseout="this.style.opacity='1'"
        >
          @if (has_custom_logo())
            {!! get_custom_logo() !!}
          @else
            <sl-icon name="code-slash" style="font-size: 1.5rem;"></sl-icon>
            <span>{{ $siteName }}</span>
          @endif
        </a>
      </div>

      {{-- Desktop Navigation with Shoelace Dropdowns --}}
      @if (has_nav_menu('primary_navigation'))
        <nav class="header__nav hidden md:flex items-center gap-sm" aria-label="{{ __('Primary Navigation', 'sage') }}">
          @php
            $menu_items = wp_get_nav_menu_items(get_nav_menu_locations()['primary_navigation']);
            $menu_tree = [];

            if ($menu_items) {
              // Build menu hierarchy
              foreach ($menu_items as $item) {
                if ($item->menu_item_parent == 0) {
                  $menu_tree[$item->ID] = [
                    'item' => $item,
                    'children' => []
                  ];
                }
              }

              foreach ($menu_items as $item) {
                if ($item->menu_item_parent != 0 && isset($menu_tree[$item->menu_item_parent])) {
                  $menu_tree[$item->menu_item_parent]['children'][] = $item;
                }
              }
            }
          @endphp

          @foreach ($menu_tree as $menu_item)
            @if (count($menu_item['children']) > 0)
              {{-- Dropdown for items with children --}}
              <sl-dropdown distance="8" hoist>
                <sl-button slot="trigger" variant="text" caret>
                  {{ $menu_item['item']->title }}
                </sl-button>
                <sl-menu>
                  @foreach ($menu_item['children'] as $child)
                    <sl-menu-item href="{{ $child->url }}">
                      @if ($child->description)
                        <sl-icon slot="prefix" name="{{ $child->description }}"></sl-icon>
                      @endif
                      {{ $child->title }}
                    </sl-menu-item>
                  @endforeach
                </sl-menu>
              </sl-dropdown>
            @else
              {{-- Simple link for items without children --}}
              <sl-button
                href="{{ $menu_item['item']->url }}"
                variant="text"
                @if (get_permalink() === $menu_item['item']->url)
                  style="--sl-color-primary-600: var(--sl-color-primary-700);"
                @endif
              >
                {{ $menu_item['item']->title }}
              </sl-button>
            @endif
          @endforeach
        </nav>
      @endif

      {{-- Header Actions --}}
      <div class="header__actions flex items-center gap-xs">
        {{-- Theme Toggle Button --}}
        <sl-tooltip content="{{ __('Toggle theme', 'sage') }}" placement="bottom">
          <sl-icon-button
            name="sun-fill"
            class="theme-toggle theme-toggle--light"
            label="{{ __('Toggle theme', 'sage') }}"
            style="font-size: 1.25rem;"
            data-theme-toggle
          ></sl-icon-button>
          <sl-icon-button
            name="moon-fill"
            class="theme-toggle theme-toggle--dark"
            label="{{ __('Toggle theme', 'sage') }}"
            style="font-size: 1.25rem; display: none;"
            data-theme-toggle
          ></sl-icon-button>
        </sl-tooltip>

        {{-- Mobile Menu Toggle --}}
        <sl-icon-button
          name="list"
          class="mobile-menu-toggle md:hidden"
          label="{{ __('Toggle menu', 'sage') }}"
          style="font-size: 1.5rem;"
          data-mobile-menu-toggle
        ></sl-icon-button>
      </div>
    </div>
  </div>
</header>

{{-- Mobile Navigation Drawer with Shoelace --}}
@if (has_nav_menu('primary_navigation'))
  <sl-drawer
    label="{{ __('Navigation', 'sage') }}"
    placement="end"
    class="mobile-menu-drawer"
    data-mobile-menu-drawer
    style="--size: 20rem;"
  >
    <nav class="mobile-menu__nav" aria-label="{{ __('Mobile Navigation', 'sage') }}">
      @php
        $mobile_menu_items = wp_get_nav_menu_items(get_nav_menu_locations()['primary_navigation']);
        $mobile_menu_tree = [];

        if ($mobile_menu_items) {
          // Build menu hierarchy for mobile
          foreach ($mobile_menu_items as $item) {
            if ($item->menu_item_parent == 0) {
              $mobile_menu_tree[$item->ID] = [
                'item' => $item,
                'children' => []
              ];
            }
          }

          foreach ($mobile_menu_items as $item) {
            if ($item->menu_item_parent != 0 && isset($mobile_menu_tree[$item->menu_item_parent])) {
              $mobile_menu_tree[$item->menu_item_parent]['children'][] = $item;
            }
          }
        }
      @endphp

      @if (count($mobile_menu_tree) > 0)
        <sl-tree style="--indent-size: var(--space-md); --indent-guide-width: 0;">
          @foreach ($mobile_menu_tree as $menu_item)
            @if (count($menu_item['children']) > 0)
              {{-- Tree item with children --}}
              <sl-tree-item>
                <sl-icon name="folder" slot="expand-icon"></sl-icon>
                <sl-icon name="folder-fill" slot="collapse-icon"></sl-icon>
                <a
                  href="{{ $menu_item['item']->url }}"
                  style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: var(--space-xs);"
                  onclick="this.closest('sl-drawer').hide()"
                >
                  {{ $menu_item['item']->title }}
                </a>

                @foreach ($menu_item['children'] as $child)
                  <sl-tree-item>
                    <a
                      href="{{ $child->url }}"
                      style="text-decoration: none; color: inherit; display: flex; align-items: center; gap: var(--space-xs);"
                      onclick="this.closest('sl-drawer').hide()"
                    >
                      @if ($child->description)
                        <sl-icon name="{{ $child->description }}" style="font-size: 1rem;"></sl-icon>
                      @endif
                      {{ $child->title }}
                    </a>
                  </sl-tree-item>
                @endforeach
              </sl-tree-item>
            @else
              {{-- Simple tree item without children --}}
              <sl-tree-item>
                <a
                  href="{{ $menu_item['item']->url }}"
                  style="text-decoration: none; color: inherit;"
                  onclick="this.closest('sl-drawer').hide()"
                >
                  {{ $menu_item['item']->title }}
                </a>
              </sl-tree-item>
            @endif
          @endforeach
        </sl-tree>
      @endif

      {{-- Mobile Theme Toggle --}}
      <div style="margin-top: var(--space-lg); padding-top: var(--space-lg); border-top: 1px solid var(--sl-color-neutral-200);">
        <sl-button
          variant="text"
          class="mobile-theme-toggle"
          style="width: 100%;"
          data-theme-toggle
        >
          <sl-icon name="sun-fill" slot="prefix" class="theme-toggle--light"></sl-icon>
          <sl-icon name="moon-fill" slot="prefix" class="theme-toggle--dark" style="display: none;"></sl-icon>
          {{ __('Toggle theme', 'sage') }}
        </sl-button>
      </div>
    </nav>
  </sl-drawer>
@endif

<style>
  /* Header enhancements */
  .site-header {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  /* Logo image styling */
  .header__logo img {
    max-height: 40px;
    width: auto;
    display: block;
  }

  /* Smooth theme toggle transitions */
  [data-theme="light"] .theme-toggle--light {
    display: inline-flex !important;
  }

  [data-theme="light"] .theme-toggle--dark {
    display: none !important;
  }

  [data-theme="dark"] .theme-toggle--light {
    display: none !important;
  }

  [data-theme="dark"] .theme-toggle--dark {
    display: inline-flex !important;
  }

  /* Mobile menu drawer customization */
  .mobile-menu-drawer::part(panel) {
    background: var(--sl-color-neutral-0);
  }

  .mobile-menu-drawer::part(header) {
    border-bottom: 1px solid var(--sl-color-neutral-200);
  }

  /* Active menu item styling */
  sl-menu-item[aria-current="page"],
  sl-tree-item[aria-current="page"] {
    font-weight: var(--sl-font-weight-semibold);
    color: var(--sl-color-primary-600);
  }

  /* Shoelace button customization for nav */
  .header__nav sl-button::part(base) {
    font-weight: var(--sl-font-weight-medium);
    transition: all 0.2s ease;
  }

  .header__nav sl-button::part(base):hover {
    color: var(--sl-color-primary-600);
  }

  /* Responsive container */
  @media (max-width: 768px) {
    .header__inner {
      padding-block: var(--space-xs) !important;
    }

    .header__logo {
      font-size: 1.25rem;
    }
  }

  /* Dark mode backdrop */
  [data-theme="dark"] .site-header {
    background: rgba(15, 23, 42, 0.8);
    border-bottom-color: var(--sl-color-neutral-700);
  }

  [data-theme="dark"] .header__logo {
    color: var(--sl-color-neutral-50);
  }
</style>

<script>
  // Mobile menu drawer toggle functionality
  document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.querySelector('[data-mobile-menu-toggle]');
    const drawer = document.querySelector('[data-mobile-menu-drawer]');

    if (toggleBtn && drawer) {
      toggleBtn.addEventListener('click', () => {
        drawer.show();
      });
    }
  });
</script>
