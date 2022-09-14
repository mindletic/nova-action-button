<?php

namespace Pdmfc\NovaFields;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class ActionButtonFieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function (ServingNova $event) {
            $mixManifest = json_decode(file_get_contents(__DIR__ . '/../dist/mix-manifest.json'), true);
            $script = explode('=', $mixManifest['/js/field.js'])[1];
            $style = explode('=', $mixManifest['/css/field.css'])[1];

            Nova::script('nova-action-button-' . $script, __DIR__ . '/../dist/js/field.js');
            Nova::style('nova-action-button-' . $style, __DIR__ . '/../dist/css/field.css');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
