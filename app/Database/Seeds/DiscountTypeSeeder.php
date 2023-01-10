<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiscountTypeSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('discount_types')->countAll() == 0) {
            $this->db->table('discount_types')->insert([
                'type_name' => '%'
            ]);
        }
    }
}
