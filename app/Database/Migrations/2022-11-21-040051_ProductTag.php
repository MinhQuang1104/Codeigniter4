<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductTag extends Migration {
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
            'tag_id'     => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'updated_at timestamp null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tag_id', 'tags', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('product_tag');
    }

    public function down()
    {
        $this->forge->dropTable('product_tag');
    }
}
