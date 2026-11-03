<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
{
    return view('homepage');
}
    public function home($data): string
    {
      echo "Hello, world -> ". $data;
      exit;
    }
}
