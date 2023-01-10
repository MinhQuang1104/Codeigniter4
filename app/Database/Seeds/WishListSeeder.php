<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WishListSeeder extends Seeder
{
    public function run()
    {
        if($this->db->table('wish_list')->countAll() == 0)
        {
            $this->db->table('wish_list')->insert([
                'product_id' => '1',
                'status' => 'In stock'
            ]);
        }
    }
}
