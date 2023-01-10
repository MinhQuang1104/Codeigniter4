<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'customers';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = TRUE;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = FALSE;
    protected $protectFields    = TRUE;
    protected $allowedFields    = [
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'password',
        'profile_image',
        'address',
        'phone_number'
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
