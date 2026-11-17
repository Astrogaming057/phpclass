<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $helpers = ['url'];

    public function index(): string
    {
        $data = array('index' => 'true');
        return view('admin_page', $data);
    }

    public function manage_marathon(): string
    {
        $data = array('marathon_page' => 'true');
        return view('marathon_page', $data);
    }
    public function add_marathon(): string
    {
        $data = array('add_page' => 'true');
        return view('add_page', $data);
    }
    public function manage_runners(): string
    {
        $data = array('runners_page' => 'true');
        return view('runners_page', $data);
    }
    public function registration_fourm(): string
    {
        $data = array('registration_page' => 'true');
        return view('registration_page', $data);
    }
}