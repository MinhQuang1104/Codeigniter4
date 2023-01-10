<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = TRUE;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = FALSE;
    protected $protectFields    = TRUE;
    protected $allowedFields    = [
        'name',
        'sku',
        'weight',
        'weight_type_id',
        'dimension',
        'description',
        'price',
        'old_price',
        'discount',
        'discount_type_id',
        'hot',
        'featured',
        'size_guide',
        'additional_info',
        'status',
        'category_id'
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

    public function getCategoryByProduct()
    {
        $this->select('products.*, categories.name as category_name');
        $this->join('categories', 'categories.id = products.category_id', 'inner');

        return $this->findAll();
    }

    public function getCategoryById($id)
    {
        $this->select('categories.*');
        $this->join('categories', 'categories.id = products.category_id', 'inner');
        $this->where('products.id', $id);

        return $this->findAll();
    }

    public function checkWishList($id)
    {
        $this->select('wish_list.*');
        $this->join('wish_list', 'wish_list.product_id = products.id', 'inner');
        $this->where('products.id', $id);

        return $this->findAll();
    }

    public function checkTag($id)
    {
        $this->select('product_tag.*');
        $this->join('product_tag', 'product_tag.product_id = products.id', 'inner');
        $this->where('products.id', $id);

        return $this->findAll();
    }

    public function checkTagById($id)
    {
        $this->select('tags.*');
        $this->join('product_tag', 'product_tag.product_id = products.id', 'inner');
        $this->join('tags', 'product_tag.tag_id = tags.id', 'inner');
        $this->where('products.id', $id);

        return $this->findAll();
    }

    public function generalInfo($id)
    {
        $this->select('general_info.*');
        $this->join('general_info', 'general_info.product_id = products.id', 'inner');
        $this->where('products.id', $id);

        return $this->findAll();
    }

    public function checkImage($id)
    {
        $this->select('images.*');
        $this->join('images', 'images.product_id = products.id', 'inner');
        $this->where('products.id', $id);

        return $this->findAll();
    }

    public function checkColor($id)
    {
        $this->distinct();
        $this->select('colors.*');
        $this->join('general_info', 'general_info.product_id = products.id', 'inner');
        $this->join('colors', 'general_info.color_id = colors.id', 'inner');
        $this->where('products.id', $id);

        return $this->findAll();
    }

    public function checkSize($id)
    {
        $this->distinct();
        $this->select('sizes.*');
        $this->join('general_info', 'general_info.product_id = products.id', 'inner');
        $this->join('sizes', 'sizes.id = general_info.size_id', 'inner');
        $this->where('products.id', $id);

        return $this->findAll();
    }

    public function testImageProduct()
    {
        $this->select('products.*, GROUP_CONCAT(images.image) AS image');
        $this->join('images', 'images.product_id = products.id', 'inner');
        $this->groupBy('products.id');

        return $this->findAll();
    }

    public function getImageProduct($id)
    {
        $this->select('products.*, GROUP_CONCAT(images.image) AS image');
        $this->join('images', 'images.product_id = products.id', 'inner');
        $this->where('product_id', $id);
        $this->groupBy('products.id');

        return $this->findAll();
    }

    public function getOptionProducts($id)
    {
        $this->select('general_info.id as option_id, GROUP_CONCAT("Color: ",colors.name, " | Size: ", sizes.name) AS option');
        $this->join('general_info', 'general_info.product_id = products.id', 'inner');
        $this->join('colors', 'colors.id = general_info.color_id', 'inner');
        $this->join('sizes', 'sizes.id = general_info.size_id', 'inner');
        $this->where('products.id', $id);
        $this->groupBy('general_info.id');

        return $this->findAll();
    }

    public function getOptionProductPrice($id)
    {
        $this->select('general_info.id as option_id, general_info.price');
        $this->join('general_info', 'general_info.product_id = products.id', 'inner');
        $this->join('colors', 'colors.id = general_info.color_id', 'inner');
        $this->join('sizes', 'sizes.id = general_info.size_id', 'inner');
        $this->where('general_info.id', $id);
        $this->groupBy('general_info.id');

        return $this->findAll();
    }
}
