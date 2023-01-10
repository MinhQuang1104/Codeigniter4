<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SizeSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('sizes')->countAll() == 0) {
            $this->db->table('sizes')->insert([
                'size' => 'S',
                'name' => 'Small'
            ]);
            $this->db->table('sizes')->insert([
                'size' => 'M',
                'name' => 'Medium'
            ]);
            $this->db->table('sizes')->insert([
                'size' => 'L',
                'name' => 'Large'
            ]);
            $this->db->table('sizes')->insert([
                'size' => 'XL',
                'name' => 'Xtra-Large'
            ]);
        }
    }
}
