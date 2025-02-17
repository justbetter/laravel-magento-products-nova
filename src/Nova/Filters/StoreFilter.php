<?php

namespace JustBetter\MagentoProductsNova\Nova\Filters;

use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Builder;
use JustBetter\MagentoProducts\Models\MagentoProduct;
use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class StoreFilter extends Filter
{
    public function apply(NovaRequest $request, EloquentBuilder $query, mixed $value): Builder|EloquentBuilder
    {
        return $query->where('store', '=', $value);
    }

    public function options(NovaRequest $request): array
    {
        return MagentoProduct::query()
            ->select(['store'])
            ->distinct()
            ->get()
            ->pluck('store', 'store')
            ->toArray();
    }
}
