<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('DiscountTypeSeeder');
        $this->call('CategorySeeder');
        $this->call('ProductSeeder');
        $this->call('WishListSeeder');
        $this->call('ImageSeeder');
        $this->call('TagSeeder');
        $this->call('ProductTagSeeder');
        $this->call('ColorSeeder');
        $this->call('SizeSeeder');
        $this->call('GeneralInfoSeeder');
        $this->call('CustomerSeeder');
        $this->call('DiscountTypeCouponSeeder');
    }
}
