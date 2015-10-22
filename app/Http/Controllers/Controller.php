<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $id = '';

    protected $data = [];

    public function __construct()
    {
        $class = get_class($this);
        $exploded = explode('\\', $class);
        $baseClass = end($exploded);

        $explodedBaseClass = explode('_', snake_case($baseClass));
        $this->id = reset($explodedBaseClass);
    }

    protected function getProperView($view)
    {
        return (view()->exists($customView = $this->id.'.'.$view)) ? $customView : $view;
    }

    protected function render($view, array $data = [])
    {
        return view($this->getProperView($view), $this->data + $data);
    }
}
