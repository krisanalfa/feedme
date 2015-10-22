<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $id = '';

    protected $data = [];

    protected $layout = 'layout';

    public function __construct()
    {
        $this->id = app('app.namespace');
    }

    public function index()
    {
        return $this->render('list', []);
    }

    public function create()
    {
    }

    public function make()
    {
        dd(__METHOD__);
    }

    public function read($id)
    {
        dd(__METHOD__, get_defined_vars());
    }

    public function update($id)
    {
        dd(__METHOD__, get_defined_vars());
    }

    public function change($id)
    {
        dd(__METHOD__, get_defined_vars());
    }

    public function delete($id)
    {
        dd(__METHOD__, get_defined_vars());
    }

    public function remove($id)
    {
        dd(__METHOD__, get_defined_vars());
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
