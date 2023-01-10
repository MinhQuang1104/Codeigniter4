<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class WeightTypes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'               => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name'     => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'unit'    => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'unit_price'    => [
                'type'       => 'FLOAT',
                'constraint' => '0,0',
                'default'    => 0
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'update_at timestamp null default CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('weight_types');
    }

    public function down()
    {
        $this->forge->dropTable('weight_types');
    }
}
