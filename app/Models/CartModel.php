<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'carts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = TRUE;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = FALSE;
    protected $protectFields    = TRUE;
    protected $allowedFields    = [
        'api_id',
        'customer_id',
        'session_id',
        'coupon_price',
        'subtotal',
        'shipping_price',
        'country',
        'city',
        'county',
        'zip',
        'total'
    ];

    // Dates
    protected $useTimestamps = FALSE;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = FALSE;
    protected $cleanValidationRules = TRUE;

    // Callbacks
    protected $allowCallbacks = TRUE;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function shippingPrice()
    {
        $this->select('weight_types.*, products.weight');
        $this->join('cart_products', 'carts.id = cart_products.cart_id', 'inner');
        $this->join('products', 'cart_products.product_id = products.id', 'inner');
        $this->join('weight_types', 'products.weight_type_id = weight_types.id', 'inner');
        $this->orderBy('weight_types.unit');

        return $this->findAll();
    }
}
