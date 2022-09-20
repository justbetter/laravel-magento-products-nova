<?php

namespace JustBetter\MagentoProductsNova\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use JustBetter\MagentoProducts\Commands\DiscoverMagentoProductsCommand;
use JustBetter\MagentoProducts\Jobs\CheckKnownProductsExistenceJob;
use JustBetter\MagentoProducts\Jobs\DiscoverMagentoProductsJob;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class DiscoverMagentoProducts extends Action
{
    use InteractsWithQueue;
    use Queueable;

    public $name = 'Discover Magento Products';
    public $standalone = true;

    public function handle(ActionFields $fields, Collection $models): array
    {
        DiscoverMagentoProductsJob::dispatch();

        return Action::message('Checking');
    }
}

