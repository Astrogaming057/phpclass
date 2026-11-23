<?php


namespace App\Models; 

use CodeIgniter\Model;

class Race extends Model
{
    protected $table = 'races';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'date', 'location', 'distance', 'description'];


    public function get_races()
    {
        $db = db_connect();
        $sql = 'Select * from race';
        $query = $db->query($sql);
        return $query->getResultArray();
    }
}