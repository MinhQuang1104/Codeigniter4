<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiscountTypeCouponSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('discount_type_coupons')->countAll() == 0) {
            $this->db->table('discount_type_coupons')->insert([
                'type_name' => 'Percentage'
            ]);
            $this->db->table('discount_type_coupons')->insert([
                'type_name' => 'Fixed Amount'
            ]);
        }
    }
}
