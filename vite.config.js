import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin'
import autoprefixer from 'autoprefixer'
import cssnano from 'cssnano'
import postcssPresetEnv from 'postcss-preset-env'

export default defineConfig(({ mode }) => ({
  base: '/app/themes/sage/public/build/',

  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/css/editor.css',
        'resources/js/editor.js',
      ],
      refresh: true,
    }),

    wordpressPlugin(),

    // Generate the theme.json file in the public/build/assets directory
    // Tailwind features disabled for CSS4-first architecture
    wordpressThemeJson({
      disableTailwindColors: true,
      disableTailwindFonts: true,
      disableTailwindFontSizes: true,
    }),
  ],

  // PostCSS configuration for CSS4 features
  css: {
    postcss: {
      plugins: [
        autoprefixer(),
        postcssPresetEnv({
          stage: 2,
        }),
        ...(mode === 'production' ? [cssnano()] : []),
      ],
    },
    devSourcemap: true,
  },

  // Code splitting configuration
  build: {
    cssCodeSplit: true,
    sourcemap: mode === 'development',
    rollupOptions: {
      output: {
        manualChunks: {
          // Vendor chunk for third-party dependencies
          vendor: ['alpinejs'],
          // Core chunk for theme functionality
          core: [
            '/resources/js/theme-switcher.js',
            '/resources/js/navigation.js',
          ],
        },
      },
    },
  },

  resolve: {
    alias: {
      '@scripts': '/resources/js',
      '@styles': '/resources/css',
      '@fonts': '/resources/fonts',
      '@images': '/resources/images',
    },
  },
}))
