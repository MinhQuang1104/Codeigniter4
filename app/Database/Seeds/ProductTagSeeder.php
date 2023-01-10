<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductTagSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('product_tag')->countAll() == 0) {
            $this->db->table('product_tag')->insert([
                'product_id' => '1',
                'tag_id' => '1'
            ]);
            $this->db->table('product_tag')->insert([
                'product_id' => '1',
                'tag_id' => '3'
            ]);
        }
    }
}
