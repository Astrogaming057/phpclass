<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $helpers = ['url'];

    public function index(): string
    {
        return view('admin_page');
    }

    public function manage_marathon(): string
    {
        return view('marathon_page');
    }
    public function add_marathon(): string
    {
        return view('add_page');
    }
    public function manage_runners(): string
    {
        return view('runners_page');
    }
    public function registration_fourm(): string
    {
        return view('registration_page');
    }
}