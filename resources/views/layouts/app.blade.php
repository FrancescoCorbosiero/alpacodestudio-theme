<!doctype html>
<html @php(language_attributes()) data-theme="{{ $theme }}" @if($isRtl) dir="rtl" @endif>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- SEO Meta Tags --}}
    {!! $metaTags !!}

    {{-- Schema.org Markup --}}
    {!! $schemaMarkup !!}

    {{-- Preconnect for Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Font stylesheet with display=swap --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Roboto:wght@400;700;900&family=Six+Caps&display=swap" rel="stylesheet">

    @php(do_action('get_header'))
    @php(wp_head())

    {{-- Legacy Theme Assets (Bootstrap + jQuery) --}}
    @vite(['resources/css/legacy.css', 'resources/js/legacy.js'])

    {{-- Modern Theme Assets (Alpine + Custom CSS) - DISABLED for legacy theme --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    {{-- Component Styles Stack --}}
    @stack('styles')
  </head>

  <body @php(body_class())>
    @php(wp_body_open())

    {{-- Page Loader --}}
    {{-- @include('components.loader') --}}

    <div id="app">
      {{-- Skip to content link for accessibility --}}
      <a class="skip-link sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content', 'sage') }}
      </a>

      <main id="main" class="main" role="main">
        @yield('content')
      </main>

      @hasSection('sidebar')
        <aside class="sidebar" role="complementary">
          @yield('sidebar')
        </aside>
      @endif

    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())

    {{-- Component Scripts Stack --}}
    @stack('scripts')
  </body>
</html>
