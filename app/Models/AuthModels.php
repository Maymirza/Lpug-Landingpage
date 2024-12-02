<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;
use DateTime;

class AuthModels extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'npm', 'email', 'password', 'role_id', 'is_active', 'image', 'phone', 'majors', 'status'];

    public function getuser($npm = false)
    {
        if ($npm == false) {
            return  $this->where('role_id >', 1)->findall();
        } else {
            return $this->where(['npm' => $npm])->first();
        }
    }

    public function token($user_token)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user_token');
        $builder->insert($user_token);
    }
    public function userget($email = false)
    {
        if ($email == false) {
            return  $this->where('role_id >', 1)->findall();
        } else {
            return $this->where(['email' => $email])->first();
        }
    }
    public function user_token($token)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user_token');
        $builder->where('token', $token);
        return $builder->get()->getRowArray();
    }
    public function active($email)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('is_active', 1);
        $builder->where('email', $email);
        $builder->update();
    }
    public function deletetoken($token)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user_token');
        $builder->where('token', $token);
        $builder->delete();
    }
    public function deleteuser($email)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('email', $email);
        $builder->delete();
    }
    public function usr($email)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->where('email', $email);
        $builder->where('is_active', 1);
        return $builder->get()->getRowArray();
    }
    public function resetpswd($email, $password)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->set('password', $password);
        $builder->where('email', $email);
        $builder->update();
    }
    public function information()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('user');
        $builder->update();
    }
    public function getinfo()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('information');
        return $builder->get()->getResultArray();
    }
}
