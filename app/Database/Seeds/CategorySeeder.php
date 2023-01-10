<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('categories')->countAll() == 0) {
            $this->db->table('categories')->insert([
                'name'      => 'Head phone',
                'quantity'  => '20'
            ]);

            $this->db->table('categories')->insert([
                'name'      => 'Watch',
                'quantity'  => '20'
            ]);
        }
    }
}
