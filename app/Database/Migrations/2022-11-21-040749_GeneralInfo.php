<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GeneralInfo extends Migration {
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
            'color_id'   => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'size_id'    => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'quantity'   => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0
            ],
            'price'      => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => 0
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'updated_at timestamp null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('color_id', 'colors', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('size_id', 'sizes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('general_info');
    }

    public function down()
    {
        $this->forge->dropTable('general_info');
    }
}
