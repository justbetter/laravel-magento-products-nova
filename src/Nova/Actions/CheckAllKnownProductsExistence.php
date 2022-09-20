<?php

namespace JustBetter\MagentoProductsNova\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use JustBetter\MagentoProducts\Jobs\CheckKnownProductsExistenceJob;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class CheckAllKnownProductsExistence extends Action
{
    use InteractsWithQueue;
    use Queueable;

    public $name = 'Check all known products for existence';
    public $standalone = true;

    public function handle(ActionFields $fields, Collection $models): array
    {
        CheckKnownProductsExistenceJob::dispatch();

        return Action::message('Checking');
    }
}

