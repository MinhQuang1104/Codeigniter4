<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GeneralInfoSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('general_info')->countAll() == 0) {
            $this->db->table('general_info')->insert([
                'product_id' => '1',
                'color_id' => '1',
                'size_id' => '3',
                'quantity' => '10',
                'price' => '1.799'
            ]);
            $this->db->table('general_info')->insert([
                'product_id' => '1',
                'color_id' => '2',
                'size_id' => '1',
                'quantity' => '7',
                'price' => '1.899'
            ]);
            $this->db->table('general_info')->insert([
                'product_id' => '1',
                'color_id' => '3',
                'size_id' => '2',
                'quantity' => '5',
                'price' => '1.999'
            ]);
        }
    }
}
