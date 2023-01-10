<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('images')->countAll() == 0) {
            $this->db->table('images')->insert([
                'image' => 'uploads/products/prod-1.jpg',
                'product_id' => '1'
            ]);
            $this->db->table('images')->insert([
                'image' => 'uploads/products/prod-2.jpg',
                'product_id' => '1'
            ]);
            $this->db->table('images')->insert([
                'image' => 'uploads/products/prod-3.jpg',
                'product_id' => '1'
            ]);
            $this->db->table('images')->insert([
                'image' => 'uploads/products/prod-4.jpg',
                'product_id' => '1'
            ]);
            $this->db->table('images')->insert([
                'image' => 'uploads/products/prod-5.jpg',
                'product_id' => '1'
            ]);
        }
    }
}
