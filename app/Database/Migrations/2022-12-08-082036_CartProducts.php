<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CartProducts extends Migration {
    public function up()
    {
        $this->forge->addField([
            'id'               => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'cart_id'          => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'product_id'       => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'product_image'    => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'product_name'     => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'product_color'    => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE,
                'default'    => NULL
            ],
            'product_size'     => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE,
                'default'    => NULL
            ],
            'product_price'    => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => 0
            ],
            'product_qty'      => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0
            ],
            'product_subtotal' => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => 0
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'update_at timestamp null default CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('cart_id', 'carts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('cart_products');
    }

    public function down()
    {
        $this->forge->dropTable('cart_products');
    }
}
