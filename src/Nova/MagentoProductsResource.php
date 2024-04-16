<?php

namespace JustBetter\MagentoProductsNova\Nova;

use Illuminate\Http\Request;
use JustBetter\MagentoProducts\Models\MagentoProduct;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;

class MagentoProductsResource extends Resource
{
    public static $model = MagentoProduct::class;

    public static $title = 'sku';

    public static $group = 'products';

    public static $search = [
        'sku'
    ];

    public static function label(): string
    {
        return 'Products';
    }

    public function fields(Request $request): array
    {
        return [
            Text::make(__('SKU'), 'sku')
                ->readonly()
                ->sortable(),

            Boolean::make(__('Exists in Magento'), 'exists_in_magento')
                ->sortable(),

            Text::make(__('Store'), 'store')
                ->readonly()
                ->sortable(),

            Code::make(__('Data'), 'data')
                ->json(),

            DateTime::make(__('Last checked'), 'last_checked')
                ->readonly()
                ->sortable(),

            DateTime::make(__('Created At'), 'created_at')
                ->readonly()
                ->sortable(),

            DateTime::make(__('Updated At'), 'updated_at')
                ->readonly()
                ->sortable(),
        ];
    }

    public function actions(Request $request): array
    {
        return [
            Actions\DiscoverMagentoProducts::make(),
            Actions\CheckKnownProductsExistence::make(),
            Actions\CheckAllKnownProductsExistence::make(),
        ];
    }

    public function filters(Request $request): array
    {
        return [
            Filters\StoreFilter::make(),
        ];
    }

    public static function authorizedToCreate(Request $request): bool
    {
        return false;
    }
}
