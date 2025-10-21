<?php

namespace App\ViewComposers;

use Roots\Acorn\View\Composer;
use App\Services\DesignSystemService;
use App\Services\SeoService;
use App\Services\I18nService;

/**
 * Global View Composer
 *
 * Binds data to all Blade views
 */
class GlobalComposer extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ['*'];

    /**
     * Design System Service
     *
     * @var DesignSystemService
     */
    protected DesignSystemService $designSystem;

    /**
     * SEO Service
     *
     * @var SeoService
     */
    protected SeoService $seo;

    /**
     * I18n Service
     *
     * @var I18nService
     */
    protected I18nService $i18n;

    /**
     * Constructor
     *
     * @param DesignSystemService $designSystem
     * @param SeoService $seo
     * @param I18nService $i18n
     */
    public function __construct(
        DesignSystemService $designSystem,
        SeoService $seo,
        I18nService $i18n
    ) {
        $this->designSystem = $designSystem;
        $this->seo = $seo;
        $this->i18n = $i18n;
    }

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with(): array
    {
        return [
            'siteName' => get_bloginfo('name'),
            'siteDescription' => get_bloginfo('description'),
            'currentUrl' => home_url(add_query_arg(null, null)),
            'locale' => $this->i18n->getLocale(),
            'isRtl' => $this->i18n->isRtl(),
            'theme' => $this->designSystem->getThemeAttribute(),
            'metaTags' => $this->seo->getMetaTags(),
            'schemaMarkup' => $this->seo->getSchemaMarkup(),
        ];
    }
}
