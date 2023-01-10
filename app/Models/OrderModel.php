<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = TRUE;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = FALSE;
    protected $protectFields    = TRUE;
    protected $allowedFields    = [
        'customer_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'subtotal',
        'amount_off',
        'total_price',
        'transport_fee',
        'shipping_method',
        'shipping_firstname',
        'shipping_lastname',
        'shipping_company',
        'shipping_address',
        'shipping_city',
        'shipping_country',
        'shipping_county',
        'shipping_postcode',
        'payment_method',
        'payment_firstname',
        'payment_lastname',
        'payment_company',
        'payment_country',
        'payment_address',
        'payment_city',
        'payment_county',
        'payment_postcode',
        'payment_email',
        'payment_phone',
        'note',
        'status'
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
}
