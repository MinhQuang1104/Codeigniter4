<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Coupons extends Migration {
    public function up()
    {
        $this->forge->addField([
            'id'                      => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name'                    => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'code'                    => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'amount_off'              => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => 0
            ],
            'discount_type_coupon_id' => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'total'                   => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => 0
            ],
            'number_of_discount'      => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0
            ],
            'start_date'              => [
                'type' => 'DATETIME',
            ],
            'end_date'                => [
                'type' => 'DATETIME',
            ],
            'status'                  => [
                'type'    => 'BOOLEAN',
                'null'    => TRUE,
                'default' => '1',
                'comment' => '0: Disabled | 1: Enabled'
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'update_at timestamp null default CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('discount_type_coupon_id', 'discount_type_coupons', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('coupons');
    }

    public function down()
    {
        $this->forge->dropTable('coupons');
    }
}
