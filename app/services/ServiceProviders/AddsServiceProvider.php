<?php

/* *Created By Arun @ Itmarkerz (30/1/15) */

use Illuminate\Support\ServiceProvider;

class AddsServiceProvider extends ServiceProvider {

    public function register()
    {
       $this->app->bind('adds', function()
        {
            return new AddsService(new AddsProvider());
        });
    }

}