<?php

namespace App\Providers;

use App\Models\RespondenSKDModel;
use Carbon\Carbon;
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
        $responden_data = RespondenSKDModel::select('id', 'data_request_time')->get()->groupBy(function ($responden_data) {
            return Carbon::parse($responden_data->data_request_time)->format('D-M-Y');
        });
        $responden_affiliation = RespondenSKDModel::select('id', 'affiliation')->get()->groupBy(function ($responden_affiliation) {
            return $responden_affiliation->affiliation;
        });
        $affiliations = [];
        $affiliation_count = [];
        $months = [];
        $responden_count = [];
        foreach ($responden_data as $data => $values) {
            $months[] = $data;
            $responden_count[] = count($values);
        }
        foreach ($responden_affiliation as $data => $values) {
            $affiliations[] = $data;
            $affiliation_count[] = count($values);
        }
        View::share('affiliations', $affiliations);
        View::share('num_affiliation', $affiliation_count);
        View::share('months', $months);
        View::share('num_responden', $responden_count);
    }
}
