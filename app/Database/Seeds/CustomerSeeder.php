<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('customers')->countAll() == 0) {
            $this->db->table('customers')->insert([
                'firstname' => 'Quang',
                'lastname'  => 'Nguyễn',
                'email'     => 'client@gmail.com',
                'password'  => password_hash('123456', PASSWORD_DEFAULT)
            ]);
        }
    }
}
