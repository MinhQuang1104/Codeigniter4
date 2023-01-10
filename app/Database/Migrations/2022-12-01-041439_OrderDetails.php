<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderDetails extends Migration {
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'product_id' => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'order_id'   => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'image'      => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'color'    => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE,
                'default'    => NULL
            ],
            'size'     => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE,
                'default'    => NULL
            ],
            'price'      => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => 0
            ],
            'quantity'   => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0
            ],
            'subtotal'   => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => 0
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'updated_at timestamp null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('order_details');
    }

    public function down()
    {
        $this->forge->dropTable('order_details');
    }
}
