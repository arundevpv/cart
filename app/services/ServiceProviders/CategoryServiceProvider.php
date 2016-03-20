<?php

/*  * Created By Arun @ Itmarkerz (6/2/15)  */

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider {

    public function register()
    {
       $this->app->bind('category', function()
        {
            return new CategoryService(new CategoryProvider());
        });
    }

}