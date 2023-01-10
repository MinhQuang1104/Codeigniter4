<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cart extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'api_id'            => [
                'type'    => 'BOOLEAN',
                'null'    => TRUE,
                'default' => 0,
                'comment' => '1: Admin | 0: Client'
            ],
            'customer_id'    => [
                'type'     => 'INT',
                'unsigned' => TRUE,
                'null'     => TRUE,
                'default'  => NULL
            ],
            'session_id'     => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => TRUE,
                'default'    => NULL
            ],
            'coupon_price'   => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'null'       => TRUE,
                'default'    => 0
            ],
            'subtotal'       => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'null'       => TRUE,
                'default'    => 0
            ],
            'shipping_price' => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'null'       => TRUE,
                'default'    => 0
            ],
            'country'        => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => TRUE,
                'default'    => NULL
            ],
            'city'           => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => TRUE,
                'default'    => NULL
            ],
            'county'         => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => TRUE,
                'default'    => NULL
            ],
            'zip'            => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => TRUE,
                'default'    => NULL
            ],
            'total'          => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'null'       => TRUE,
                'default'    => 0
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'update_at timestamp null default CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('customer_id', 'customers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('carts');
    }

    public function down()
    {
        $this->forge->dropTable('carts');
    }
}
