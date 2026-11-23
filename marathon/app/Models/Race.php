<?php


namespace App\Models; 

use CodeIgniter\Model;

class Race extends Model
{


    public function get_races()
    {
        $db = db_connect();
        $sql = 'Select * from race';
        $query = $db->query($sql);
        return $query->getResultArray();
    }

    public function add_race($name, $date, $location, $description)
    {
        try {
            $db = db_connect();
            $sql = 'Insert into race (raceName, raceDateTime, raceLocation, raceDescription) values (?, ?, ?, ?)';
            $query = $db->query($sql, [$name, $date, $location, $description]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}