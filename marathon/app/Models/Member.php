<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    public function user_login($email, $password)
    {
        $db = db_connect();
        $sql = 'Select memberPassword, memberKey, roleID, memberID from memberLogin where memberEmail = ?';
        $query = $db->query($sql, [$email]);
        $row = $query->getFirstRow();

        if ($row != null) {
            echo $row->memberKey;
        } else {
            return false;
        }

        return true;
    }
}
