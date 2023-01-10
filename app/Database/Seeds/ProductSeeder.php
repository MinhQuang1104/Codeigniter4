<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        if ($this->db->table('products')->countAll() == 0) {
            $this->db->table('products')->insert([
                'name'             => 'LOWA Men’s Renegade GTX Mid Hiking Boots Review',
                'sku'              => 'dh-123456',
                'weight'           => '1.5 kg',
                'dimension'        => '2 x 4 x 8 cm',
                'price'            => '1.699',
                'old_price'        => '1.999',
                'discount'         => '15',
                'discount_type_id' => '1',
                'hot'              => '1',
                'featured'         => '0',
                'size_guide'       => '<div class="row"><div class="col-md-4"><img src="https://portotheme.com/html/porto_ecommerce/assets/images/products/single/body-shape.png" alt="body shape" width="217" height="398"></div><div class="col-md-8"><table class="table table-size"><thead><tr><th>SIZE</th><th>CHEST (in.)</th><th>WAIST (in.)</th><th>HIPS (in.)</th></tr></thead><tbody><tr><td>XS</td><td>34-36</td><td>27-29</td><td>34.5-36.5</td></tr><tr><td>S</td><td>36-38</td><td>29-31</td><td>36.5-38.5</td></tr><tr><td>M</td><td>38-40</td><td>31-33</td><td>38.5-40.5</td></tr><tr><td>L</td><td>40-42</td><td>33-36</td><td>40.5-43.5</td></tr><tr><td>XL</td><td>42-45</td><td>36-40</td><td>43.5-47.5</td></tr><tr><td>XLL</td><td>45-48</td><td>40-44</td><td>47.5-51.5</td></tr></tbody></table></div></div>',
                'additional_info'  => '<table class="table table-striped mt-2" style="width: 1180px; margin-bottom: 5.9rem; background-color: rgb(255, 255, 255); margin-top: 2rem; color: rgb(123, 133, 138); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 14px;"><tbody><tr style="background-color: rgb(249, 249, 249);"><th style="text-align: inherit; padding: 1.1rem 1.2rem;">Weight</th><td style="padding: 1.1rem 1.2rem;">23 kg</td></tr><tr><th style="text-align: inherit; padding: 1.1rem 1.2rem;">Dimensions</th><td style="padding: 1.1rem 1.2rem;">12 × 24 × 35 cm</td></tr><tr style="background-color: rgb(249, 249, 249);"><th style="text-align: inherit; padding: 1.1rem 1.2rem;">Color</th><td style="padding: 1.1rem 1.2rem;">Black, Green, Indigo</td></tr><tr><th style="text-align: inherit; padding: 1.1rem 1.2rem;">Size</th><td style="padding: 1.1rem 1.2rem;">Large, Medium, Small</td></tr></tbody></table>',
                'category_id'      => '1'
            ]);
        }
    }
}
