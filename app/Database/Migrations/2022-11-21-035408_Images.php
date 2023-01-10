<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Images extends Migration {
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'image'      => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'product_id' => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'updated_at timestamp null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('images');
    }

    public function down()
    {
        $this->forge->dropTable('images');
    }
}
