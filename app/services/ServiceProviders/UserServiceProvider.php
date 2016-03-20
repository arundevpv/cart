<?php
/*
	*Created By Arun @ Itmarkerz (30/1/15)
*/
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

    public function register()
    {
       $this->app->bind('user', function()
        {
            return new UserService(new UsersProvider());
        });
    }

}