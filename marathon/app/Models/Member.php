<?php

namespace App\Models;

use CodeIgniter\Model;

class Member extends Model
{
    public function user_login($email, $passwd)
    {
        $db = db_connect();
        $sql = 'Select memberPassword, memberKey, roleID, memberID from memberLogin where memberEmail = ?';
        $query = $db->query($sql, [$email]);
        $row = $query->getFirstRow();

        if ($row != null) {
            $DBPass = $row->memberPassword;
            $MemberKey = $row->memberKey;
            $passwd = md5($passwd . $MemberKey);

            if ($passwd == $DBPass && (int) $row->roleID === 4) {
                return true;
            }

            return false;
        }

        return false;
    }

    public function create_member($username, $password, $email, $roleID = 4)
    {
        $memberKey = sprintf(
            '%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(16384, 20479),
            mt_rand(32768, 49151),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535)
        );
        $memberKey = md5($memberKey);
        $hashedPassword = md5($password . $memberKey);

        $db = db_connect();

        try {
            $db->query(
                'INSERT INTO memberLogin (memberEmail, memberName, memberPassword, roleID, memberKey) VALUES (?, ?, ?, ?, ?)',
                [$email, $username, $hashedPassword, $roleID, $memberKey]
            );

            return true;
        } catch (\Throwable $e) {
            if (str_contains($e->getMessage(), 'Duplicate')) {
                return 'Email already exists!';
            }

            return $e->getMessage();
        }
    }
}
