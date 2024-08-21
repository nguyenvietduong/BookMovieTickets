<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CountryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // // Fetch data from the API
        // $response = Http::get('https://restcountries.com/v3.1/all');
        // $countries = [];

        // if ($response->successful()) {
        //     $countries = $response->json();
        // }

        // // Share the data with all views
        // View::share('countries', $countries);
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}

