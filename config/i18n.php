<?php

/**
 * Internationalization Configuration
 */

return [
    /**
     * Default locale
     */
    'default_locale' => 'en_US',

    /**
     * Available locales for the theme
     */
    'available_locales' => [
        'en_US' => 'English (US)',
        'it_IT' => 'Italiano',
    ],

    /**
     * Fallback locale
     */
    'fallback_locale' => 'en_US',

    /**
     * Auto-detect user locale from browser
     */
    'auto_detect' => true,

    /**
     * Right-to-left (RTL) locales
     */
    'rtl_locales' => [
        'ar',    // Arabic
        'he_IL', // Hebrew
        'fa_IR', // Persian
        'ur',    // Urdu
    ],

    /**
     * Text domain for translations
     */
    'text_domain' => 'sage',
];
