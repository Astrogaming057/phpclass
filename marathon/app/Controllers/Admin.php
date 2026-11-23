<?php

namespace App\Controllers;

use App\Models\Race;

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
        $raceModel = new Race();
        $races = $raceModel->get_races();
        $data['races'] = $races;
        $data['marathon_page'] = 'true';
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



    public function add_race(): string
    {
        $data = array('add_page' => 'true');
        $raceModel = new Race();
        $raceModel->add_race($_POST['race_name'], $_POST['race_date'], $_POST['race_location'], $_POST['race_description']);
        return view('add_page', $data);
    }
}