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

    public function get_race($id)
    {
        $db = db_connect();
        $sql = 'Select * from race where raceID = ?';
        $query = $db->query($sql, [$id]);
        return $query->getRowArray();
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

    public function update_race($id, $name, $date, $location, $description)
    {
        try {
            $db = db_connect();
            $sql = 'Update race set raceName = ?, raceDateTime = ?, raceLocation = ?, raceDescription = ? where raceID = ?';
            $db->query($sql, [$name, $date, $location, $description, $id]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function delete_race($id)
    {
        try {
            $db = db_connect();
            $sql = 'Delete from race where raceID = ?';
            $db->query($sql, [$id]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}