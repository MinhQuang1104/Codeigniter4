<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderCoupons extends Migration {
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'order_id'  => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'coupon_id' => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'code'      => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'quantity'  => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => 0
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'update_at timestamp null default CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('coupon_id', 'coupons', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('order_coupons');
    }

    public function down()
    {
        $this->forge->dropTable('order_coupons');
    }
}
