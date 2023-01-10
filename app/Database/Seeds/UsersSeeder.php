<?php

namespace App\Database\Seeds;

use App\Database\Migrations\Users;
use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        if($this->db->table('users')->countAll() == 0)
        {
            $this->db->table('users')->insert([
                'firstname' => 'Quang',
                'lastname'  => 'Nguyễn Minh',
                'email'     => 'admin@gmail.com',
                'password'  => password_hash('password', PASSWORD_DEFAULT)
            ]);
        }
    }
}
