<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ColorSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('colors')->countAll() == 0) {
            $this->db->table('colors')->insert([
                'name' => 'Red',
                'color' => '#FF0000'
            ]);
            $this->db->table('colors')->insert([
                'name' => 'Green',
                'color' => '#00FF00'
            ]);
            $this->db->table('colors')->insert([
                'name' => 'Blue',
                'color' => '#0000FF'
            ]);
        }
    }
}
