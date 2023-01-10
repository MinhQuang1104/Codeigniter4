<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sizes extends Migration {
    public function up()
    {
        $this->forge->addField([
            'id'   => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'size' => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'updated_at timestamp null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('sizes');
    }

    public function down()
    {
        $this->forge->dropTable('sizes');
    }
}
