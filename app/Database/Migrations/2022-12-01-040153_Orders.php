<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orders extends Migration {
    public function up()
    {
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'customer_id'        => [
                'type'     => 'INT',
                'unsigned' => TRUE,
                'null'     => TRUE,
                'default'  => NULL
            ],
            'first_name'         => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'last_name'          => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'email'              => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
                'null'       => TRUE
            ],
            'phone_number'       => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
                'null'       => TRUE
            ],
            'subtotal'           => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => '0'
            ],
            'amount_off'         => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => '0'
            ],
            'total_price'        => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => '0'
            ],
            'transport_fee'      => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => '0'
            ],
            'shipping_method'    => [
                'type'    => 'BOOLEAN',
                'default' => '1',
                'comment' => '0: Local Pickup | 1:Flat rate'
            ],
            'shipping_firstname' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'shipping_lastname'  => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'shipping_company'    => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => TRUE
            ],
            'shipping_address'    => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'shipping_city'      => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'shipping_country'   => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'shipping_county'    => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'shipping_postcode'  => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'payment_method'     => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'payment_firstname'  => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'payment_lastname'   => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'payment_company'    => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => TRUE
            ],
            'payment_country'    => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'payment_address'    => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'payment_city'       => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'payment_county'     => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'payment_postcode'   => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => TRUE
            ],
            'payment_email'      => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
                'null'       => TRUE
            ],
            'payment_phone'      => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
                'null'       => TRUE
            ],
            'note'               => [
                'type' => 'LONGTEXT',
                'null' => TRUE
            ],
            'status'             => [
                'type'    => 'BOOLEAN',
                'null'    => TRUE,
                'default' => '1'
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'updated_at timestamp null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('customer_id', 'customers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
