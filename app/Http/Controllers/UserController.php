<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
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
}
