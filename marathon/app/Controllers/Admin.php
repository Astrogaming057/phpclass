<?php

namespace App\Controllers;

use App\Models\Race;

class Admin extends BaseController
{
    protected $helpers = ['url'];

    private function requireLogin(): void
    {
        $session = session();
        $UID     = $session->get('UID');
        $roleID  = $session->get('roleID');

        if (! $UID || (int) $roleID !== 4) {
            header('Location: ' . base_url() . '#login');
            exit;
        }
    }

    public function index(): string
    {
        $this->requireLogin();
        $data = array('index' => 'true');
        return view('admin_page', $data);
    }

    public function manage_marathon(): string
    {
        $this->requireLogin();
        $raceModel = new Race();
        $races = $raceModel->get_races();
        $data['races'] = $races;
        $data['marathon_page'] = 'true';
        return view('marathon_page', $data);
    }
    public function add_marathon(): string
    {
        $this->requireLogin();
        $data = array('add_page' => 'true');
        return view('add_page', $data);
    }
    public function manage_runners(): string
    {
        $this->requireLogin();
        $data = array('runners_page' => 'true');
        return view('runners_page', $data);
    }
    public function registration_fourm(): string
    {
        $this->requireLogin();
        $data = array('registration_page' => 'true');
        return view('registration_page', $data);
    }



    public function add_race()
    {
        $this->requireLogin();
        $raceModel = new Race();
        $raceDate = str_replace('T', ' ', $_POST['race_date']);
        $raceModel->add_race($_POST['race_name'], $raceDate, $_POST['race_location'], $_POST['race_description']);
        return redirect()->to(base_url('marathon'));
    }

    public function edit_marathon(): string
    {
        $this->requireLogin();
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

    public function update_race()
    {
        $this->requireLogin();
        $raceModel = new Race();
        $raceDate = str_replace('T', ' ', $_POST['race_date']);
        $raceModel->update_race($_POST['race_id'], $_POST['race_name'], $raceDate, $_POST['race_location'], $_POST['race_description']);
        return redirect()->to(base_url('marathon'));
    }

    public function delete_race(): string
    {
        $this->requireLogin();
        $raceModel = new Race();
        $raceModel->delete_race($_GET['id']);
        $data['races'] = $raceModel->get_races();
        $data['marathon_page'] = 'true';
        return view('marathon_page', $data);
    }
}