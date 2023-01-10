<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products extends Migration {
    public function up()
    {
        $this->forge->addField([
            'id'               => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name'             => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'sku'              => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'weight'           => [
                'type'       => 'FLOAT',
                'constraint' => '0,0'
            ],
            'dimension'        => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'description'      => [
                'type' => 'LONGTEXT',
                'null' => TRUE
            ],
            'price'            => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => 0
            ],
            'old_price'        => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'null'       => TRUE,
                'default'    => 0
            ],
            'discount'         => [
                'type' => 'INT',
                'null' => TRUE,
            ],
            'discount_type_id' => [
                'type'     => 'INT',
                'unsigned' => TRUE,
                'null'     => TRUE,
            ],
            'hot'              => [
                'type'    => 'BOOLEAN',
                'null'    => TRUE,
                'default' => 0,
                'comment' => '1: True | 0: False'
            ],
            'featured'         => [
                'type'    => 'BOOLEAN',
                'null'    => TRUE,
                'default' => 0,
                'comment' => '1: True | 0: False'
            ],
            'size_guide'       => [
                'type' => 'LONGTEXT',
                'null' => TRUE
            ],
            'additional_info'  => [
                'type' => 'LONGTEXT',
                'null' => TRUE
            ],
            'status'           => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'category_id'      => [
                'type'     => 'INT',
                'unsigned' => TRUE,
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'updated_at timestamp null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
            'deleted_at timestamp null default CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('discount_type_id', 'discount_types', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
