<?php

namespace App\Providers;

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
        $app = $this->app;

        $app->configure('http');

        $exploded = explode('/', $app->request->path(), 2);
        $path = reset($exploded);

        if ($configuration = config($baseIndex = 'http.routes.'.$path)) {
            // I support this mechanical
            // [
            //     'namespace'  => 'Foo\Bar\Baz',
            //     'controller' => 'QuxController',
            // ]
            $namespace = config($baseIndex.'.namespace', 'App\Http\Controllers');
            $controller = config($baseIndex.'.controller', $configuration);

            // Registerring
            $app->group(['prefix' => '/'.$path, 'namespace' => $namespace], function () use ($app, $controller, $path) {
                $app->get('/', ['as' => $path.'.index', 'uses' => $controller.'@index']);

                $app->get('/create', ['as' => $path.'.create', 'uses' => $controller.'@create']);
                $app->post('/create', ['as' => $path.'.make', 'uses' => $controller.'@make']);

                $app->get('/{id}', ['as' => $path.'.read', 'uses' => $controller.'@read']);

                $app->get('/{id}/update/', ['as' => $path.'.update', 'uses' => $controller.'@update']);
                $app->post('/{id}/update/', ['as' => $path.'.change', 'uses' => $controller.'@change']);

                $app->get('/{id}/delete/', ['as' => $path.'.delete', 'uses' => $controller.'@delete']);
                $app->post('/{id}/delete/', ['as' => $path.'.remove', 'uses' => $controller.'@remove']);
            });
        }
    }
}
