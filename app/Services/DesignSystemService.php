<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

/**
 * Design System Service
 *
 * Manages design tokens, theme switching, and critical CSS generation
 * for the theme's design system.
 *
 * @package App\Services
 */
class DesignSystemService
{
    /**
     * Path to the tokens CSS file
     */
    protected string $tokensPath;

    /**
     * Path to the theme config file
     */
    protected string $configPath;

    /**
     * Cookie name for theme preference
     */
    protected string $themeCookieName = 'theme_preference';

    /**
     * Design tokens cache
     */
    protected ?array $tokensCache = null;

    /**
     * Create a new DesignSystemService instance
     */
    public function __construct()
    {
        $this->tokensPath = get_template_directory() . '/resources/css/_tokens.css';
        $this->configPath = get_template_directory() . '/config/design-tokens.php';
    }

    /**
     * Get all design tokens as an associative array
     *
     * Parses design tokens from _tokens.css file or config file.
     * Returns tokens organized by category (colors, spacing, typography, etc.)
     *
     * @return array Associative array of design tokens
     */
    public function getTokens(): array
    {
        // Return cached tokens if available
        if ($this->tokensCache !== null) {
            return $this->tokensCache;
        }

        $tokens = [];

        // Try loading from config file first
        if (File::exists($this->configPath)) {
            $tokens = require $this->configPath;
        }
        // Fall back to parsing CSS file
        elseif (File::exists($this->tokensPath)) {
            $tokens = $this->parseTokensFromCss($this->tokensPath);
        }
        // Use default tokens if no file exists
        else {
            $tokens = $this->getDefaultTokens();
        }

        // Cache the tokens
        $this->tokensCache = $tokens;

        return $tokens;
    }

    /**
     * Detect the current theme preference
     *
     * Checks cookie/localStorage preference and returns the active theme.
     * Falls back to 'auto' if no preference is set.
     *
     * @return string Theme preference: 'light', 'dark', or 'auto'
     */
    public function getCurrentTheme(): string
    {
        // Check cookie first
        if (isset($_COOKIE[$this->themeCookieName])) {
            $theme = sanitize_text_field($_COOKIE[$this->themeCookieName]);

            if (in_array($theme, ['light', 'dark', 'auto'], true)) {
                return $theme;
            }
        }

        // Default to auto mode (respects system preference)
        return 'auto';
    }

    /**
     * Extract critical above-the-fold CSS
     *
     * Returns minified CSS including tokens, reset, and layout styles
     * for inline injection in the document head. This improves initial
     * render performance by avoiding render-blocking CSS.
     *
     * @return string Minified critical CSS
     */
    public function getCriticalCss(): string
    {
        $criticalCss = [];

        // Add CSS custom properties from tokens
        $criticalCss[] = $this->generateTokensCss();

        // Add CSS reset (minimal)
        $criticalCss[] = $this->getCssReset();

        // Add critical layout styles
        $criticalCss[] = $this->getCriticalLayoutStyles();

        // Join and minify
        $css = implode("\n", $criticalCss);

        return $this->minifyCss($css);
    }

    /**
     * Generate theme-specific CSS custom properties
     *
     * Creates CSS with custom property overrides for the specified theme.
     * Handles light/dark mode token variations.
     *
     * @param string $theme Theme mode: 'light', 'dark', or 'auto'
     * @return string CSS string with theme-specific custom properties
     */
    public function generateThemeCss(string $theme): string
    {
        if (!in_array($theme, ['light', 'dark', 'auto'], true)) {
            $theme = 'auto';
        }

        $tokens = $this->getTokens();
        $css = [];

        // Generate light theme properties
        if ($theme === 'light' || $theme === 'auto') {
            $lightTokens = $tokens['light'] ?? $tokens['colors'] ?? [];
            $css[] = ':root, [data-theme="light"] {';
            $css[] = $this->generateCssProperties($lightTokens);
            $css[] = '}';
        }

        // Generate dark theme properties
        if ($theme === 'dark' || $theme === 'auto') {
            $darkTokens = $tokens['dark'] ?? [];

            if (!empty($darkTokens)) {
                if ($theme === 'auto') {
                    $css[] = '@media (prefers-color-scheme: dark) {';
                    $css[] = ':root {';
                    $css[] = $this->generateCssProperties($darkTokens);
                    $css[] = '}';
                    $css[] = '}';
                } else {
                    $css[] = '[data-theme="dark"] {';
                    $css[] = $this->generateCssProperties($darkTokens);
                    $css[] = '}';
                }
            }
        }

        return implode("\n", $css);
    }

    /**
     * Output inline style tag with critical tokens
     *
     * Outputs a <style> tag containing critical CSS for immediate
     * rendering. Should be called in the theme's <head> section.
     *
     * @return void
     */
    public function inlineTokens(): void
    {
        $criticalCss = $this->getCriticalCss();

        echo sprintf(
            '<style id="critical-css">%s</style>',
            $criticalCss
        );
    }

    /**
     * Parse design tokens from CSS file
     *
     * @param string $filePath Path to CSS file
     * @return array Parsed tokens
     */
    protected function parseTokensFromCss(string $filePath): array
    {
        $content = File::get($filePath);
        $tokens = [
            'colors' => [],
            'spacing' => [],
            'typography' => [],
            'light' => [],
            'dark' => [],
        ];

        // Parse CSS custom properties from :root
        preg_match_all('/:root\s*{([^}]+)}/', $content, $rootMatches);

        if (!empty($rootMatches[1])) {
            foreach ($rootMatches[1] as $block) {
                $tokens['light'] = array_merge(
                    $tokens['light'],
                    $this->parseCssProperties($block)
                );
            }
        }

        // Parse dark mode properties
        preg_match_all('/\[data-theme="dark"\]\s*{([^}]+)}|@media\s*\(prefers-color-scheme:\s*dark\)\s*{[^{]*:root\s*{([^}]+)}}/', $content, $darkMatches);

        if (!empty($darkMatches[1]) || !empty($darkMatches[2])) {
            $darkBlock = $darkMatches[1][0] ?? $darkMatches[2][0] ?? '';
            $tokens['dark'] = $this->parseCssProperties($darkBlock);
        }

        // Categorize tokens by prefix
        foreach ($tokens['light'] as $key => $value) {
            if (str_starts_with($key, '--color-')) {
                $tokens['colors'][$key] = $value;
            } elseif (str_starts_with($key, '--space-') || str_starts_with($key, '--gap-')) {
                $tokens['spacing'][$key] = $value;
            } elseif (str_starts_with($key, '--font-') || str_starts_with($key, '--text-')) {
                $tokens['typography'][$key] = $value;
            }
        }

        return $tokens;
    }

    /**
     * Parse CSS custom properties from a CSS block
     *
     * @param string $block CSS block content
     * @return array Associative array of property => value
     */
    protected function parseCssProperties(string $block): array
    {
        $properties = [];
        preg_match_all('/(--[a-zA-Z0-9-]+)\s*:\s*([^;]+);/', $block, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $properties[$match[1]] = trim($match[2]);
        }

        return $properties;
    }

    /**
     * Generate CSS properties from tokens array
     *
     * @param array $tokens Tokens array
     * @return string CSS properties string
     */
    protected function generateCssProperties(array $tokens): string
    {
        $properties = [];

        foreach ($tokens as $key => $value) {
            // Ensure key starts with --
            $property = str_starts_with($key, '--') ? $key : "--{$key}";
            $properties[] = "  {$property}: {$value};";
        }

        return implode("\n", $properties);
    }

    /**
     * Generate base tokens CSS
     *
     * @return string CSS string with base token definitions
     */
    protected function generateTokensCss(): string
    {
        $tokens = $this->getTokens();
        $css = [];

        // Base tokens
        if (!empty($tokens['light']) || !empty($tokens['colors'])) {
            $baseTokens = $tokens['light'] ?: $tokens['colors'];
            $css[] = ':root {';
            $css[] = $this->generateCssProperties($baseTokens);

            // Add spacing tokens
            if (!empty($tokens['spacing'])) {
                $css[] = $this->generateCssProperties($tokens['spacing']);
            }

            // Add typography tokens
            if (!empty($tokens['typography'])) {
                $css[] = $this->generateCssProperties($tokens['typography']);
            }

            $css[] = '}';
        }

        // Dark mode tokens
        if (!empty($tokens['dark'])) {
            $css[] = '@media (prefers-color-scheme: dark) {';
            $css[] = ':root {';
            $css[] = $this->generateCssProperties($tokens['dark']);
            $css[] = '}';
            $css[] = '}';

            $css[] = '[data-theme="dark"] {';
            $css[] = $this->generateCssProperties($tokens['dark']);
            $css[] = '}';
        }

        // Light mode override
        if (!empty($tokens['light'])) {
            $css[] = '[data-theme="light"] {';
            $css[] = $this->generateCssProperties($tokens['light']);
            $css[] = '}';
        }

        return implode("\n", $css);
    }

    /**
     * Get minimal CSS reset
     *
     * @return string CSS reset string
     */
    protected function getCssReset(): string
    {
        return <<<CSS
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
html{-webkit-text-size-adjust:100%;-moz-text-size-adjust:100%;text-size-adjust:100%;}
body{min-height:100vh;line-height:1.5;-webkit-font-smoothing:antialiased;}
CSS;
    }

    /**
     * Get critical layout styles
     *
     * @return string Critical layout CSS
     */
    protected function getCriticalLayoutStyles(): string
    {
        return <<<CSS
body{font-family:var(--font-sans,system-ui,sans-serif);color:var(--color-text,#000);background-color:var(--color-bg,#fff);}
.container{width:100%;max-width:var(--container-max-width,1280px);margin-inline:auto;padding-inline:var(--container-padding,1rem);}
CSS;
    }

    /**
     * Minify CSS string
     *
     * @param string $css CSS to minify
     * @return string Minified CSS
     */
    protected function minifyCss(string $css): string
    {
        // Remove comments
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);

        // Remove whitespace
        $css = preg_replace('/\s+/', ' ', $css);
        $css = preg_replace('/\s*{\s*/', '{', $css);
        $css = preg_replace('/\s*}\s*/', '}', $css);
        $css = preg_replace('/\s*:\s*/', ':', $css);
        $css = preg_replace('/\s*;\s*/', ';', $css);
        $css = preg_replace('/;}/', '}', $css);

        return trim($css);
    }

    /**
     * Get default design tokens
     *
     * @return array Default tokens
     */
    protected function getDefaultTokens(): array
    {
        return [
            'light' => [
                '--color-primary' => '#3b82f6',
                '--color-secondary' => '#8b5cf6',
                '--color-accent' => '#f59e0b',
                '--color-text' => '#1f2937',
                '--color-bg' => '#ffffff',
                '--color-surface' => '#f9fafb',
                '--color-border' => '#e5e7eb',
            ],
            'dark' => [
                '--color-primary' => '#60a5fa',
                '--color-secondary' => '#a78bfa',
                '--color-accent' => '#fbbf24',
                '--color-text' => '#f9fafb',
                '--color-bg' => '#111827',
                '--color-surface' => '#1f2937',
                '--color-border' => '#374151',
            ],
            'spacing' => [
                '--space-xs' => '0.25rem',
                '--space-sm' => '0.5rem',
                '--space-md' => '1rem',
                '--space-lg' => '1.5rem',
                '--space-xl' => '2rem',
                '--space-2xl' => '3rem',
            ],
            'typography' => [
                '--font-sans' => 'system-ui, -apple-system, sans-serif',
                '--font-serif' => 'Georgia, serif',
                '--font-mono' => 'monospace',
                '--text-xs' => '0.75rem',
                '--text-sm' => '0.875rem',
                '--text-base' => '1rem',
                '--text-lg' => '1.125rem',
                '--text-xl' => '1.25rem',
                '--text-2xl' => '1.5rem',
            ],
        ];
    }
}
