<?php

namespace JustBetter\MagentoProductsNova\Nova\Filters;

use Illuminate\Database\Eloquent\Builder;
use JustBetter\MagentoProducts\Models\MagentoProduct;
use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class StoreFilter extends Filter
{
    public function apply(NovaRequest $request, $query, $value): Builder
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
