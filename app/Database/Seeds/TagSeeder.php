<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('tags')->countAll() == 0) {
            $this->db->table('tags')->insert([
                'name' => 'Clothes'
            ]);
            $this->db->table('tags')->insert([
                'name' => 'Sweater'
            ]);
            $this->db->table('tags')->insert([
                'name' => 'Footwear'
            ]);
        }
    }
}
