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
        $raceDate = str_replace('T', ' ', $_POST['race_date']);
        $raceModel->add_race($_POST['race_name'], $raceDate, $_POST['race_location'], $_POST['race_description']);
        return view('add_page', $data);
    }

    public function edit_marathon(): string
    {
        $raceModel = new Race();
        $race = $raceModel->get_race($_GET['id']);
        if ($race == null) {
            $data['races'] = $raceModel->get_races();
            $data['marathon_page'] = 'true';
            return view('marathon_page', $data);
        }
        $data['race'] = $race;
        $data['marathon_page'] = 'true';
        return view('edit_page', $data);
    }

    public function update_race(): string
    {
        $raceModel = new Race();
        $raceDate = str_replace('T', ' ', $_POST['race_date']);
        $raceModel->update_race($_POST['race_id'], $_POST['race_name'], $raceDate, $_POST['race_location'], $_POST['race_description']);
        $data['race'] = $raceModel->get_race($_POST['race_id']);
        $data['marathon_page'] = 'true';
        return view('edit_page', $data);
    }

    public function delete_race(): string
    {
        $raceModel = new Race();
        $raceModel->delete_race($_GET['id']);
        $data['races'] = $raceModel->get_races();
        $data['marathon_page'] = 'true';
        return view('marathon_page', $data);
    }
}