<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $helpers = ['url'];

    public function index(): string
    {
        return view('admin_page');
    }
}
