<?php

namespace App\Providers;

use App\Pharmacy;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $locations = Cache::remember('locations_for_map', 600, function () {
                return Pharmacy::select('lat', 'lng', 'title')
                    ->get()
                    ->map(function ($item) {
                        return [
                            'lat'   => (float) $item->lat,
                            'lng'   => (float) $item->lng,
                            'title' => (string) $item->title,
                        ];
                    })
                    ->values()
                    ->toArray();
            });

            $view->with('locations', $locations);
        });
    }
}
