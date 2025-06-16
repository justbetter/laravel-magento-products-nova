<?php

namespace JustBetter\MagentoProductsNova;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Laravel\Nova\Nova;

class ServiceProvider extends BaseServiceProvider
{
    public function register(): void
    {
        $this
            ->registerConfig();
    }

    protected function registerConfig(): static
    {
        $this->mergeConfigFrom(__DIR__.'/../config/magento-products-nova.php', 'magento-products-nova');

        return $this;
    }

    public function boot(): void
    {
        $this->bootConfig()
            ->bootResources();
    }

    protected function bootConfig(): static
    {
        $this->publishes([
            __DIR__.'/../config/magento-products-nova.php' => config_path('magento-products-nova.php'),
        ], 'config');

        return $this;
    }

    protected function bootResources(): static
    {
        Nova::resources([
            config('magento-products-nova.resource'),
        ]);

        return $this;
    }
}
