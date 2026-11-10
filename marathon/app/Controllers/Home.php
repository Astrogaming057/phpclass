<?php

namespace App\Controllers;

use App\Models\Member;

class Home extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function index(): string
    {
        return view('homepage');
    }

    public function home($data): string
    {
        echo 'Hello, world -> ' . $data;
        exit;
    }

    public function login(): string
    {
        $rules = [
            'username' => 'required|valid_email',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            $data = ['load_error' => 'true'];
            helper('form');
            return view('homepage', $data);
        }

        // Hit the DB
        $Member = new Member();
        if ($Member->user_login($this->request->getPost('username'), $this->request->getPost('password'))) {
            // Pass
            echo 'Pass';
            exit;
        }

        // Fail
        $data = [
            'load_error'    => 'true',
            'error_message' => 'Invalid username or Password',
        ];
        helper('form');
        return view('homepage', $data);
    }

    public function create(): string
    {
        echo 'Login';
        exit;
    }
}
