<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ApplicationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        $app->group(['prefix' => '/application', 'namespace' => 'App\Http\Controllers'], function ($app) {
            // Matches The "/application" URL
            $app->get('/', ['as' => 'application.index', 'uses' => 'ApplicationController@index']);

            // Matches The "/application/create" URL
            $app->get('/create', ['as' => 'application.create', 'uses' => 'ApplicationController@create']);
            $app->post('/create', ['as' => 'application.make', 'uses' => 'ApplicationController@make']);

            // Matches The "/application/read" URL
            $app->get('/read/{id}', ['as' => 'application.read', 'uses' => 'ApplicationController@read']);

            // Matches The "/application/update" URL
            $app->get('/update/{id}', ['as' => 'application.update', 'uses' => 'ApplicationController@update']);
            $app->post('/update/{id}', ['as' => 'application.change', 'uses' => 'ApplicationController@change']);

            // Matches The "/application/delete" URL
            $app->get('/delete/{id}', ['as' => 'application.delete', 'uses' => 'ApplicationController@delete']);
            $app->post('/delete/{id}', ['as' => 'application.remove', 'uses' => 'ApplicationController@remove']);
        });
    }
}
