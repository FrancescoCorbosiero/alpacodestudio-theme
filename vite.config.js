import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin'

export default defineConfig({
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

    // Generate theme.json with Tailwind support
    wordpressThemeJson(),
  ],

  build: {
    manifest: true,
    outDir: 'public/build',
    rollupOptions: {
      output: {
        manualChunks: {
          // Split vendor code
          'vendor': ['alpinejs'],
          // Split core functionality
          'core': [
            '/resources/js/core/theme-switcher.js',
            '/resources/js/core/navigation.js',
          ],
        },
      },
    },
    cssCodeSplit: true,
    minify: 'esbuild',
    target: 'es2020',
  },

  css: {
    devSourcemap: true,
  },

  resolve: {
    alias: {
      '@scripts': '/resources/js',
      '@styles': '/resources/css',
      '@fonts': '/resources/fonts',
      '@images': '/resources/images',
    },
  },

  server: {
    host: '0.0.0.0',
    port: 5173,
    strictPort: true,
    hmr: {
      host: 'localhost',
    },
  },
})
