<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration {
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'firstname'     => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'lastname'      => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'email'         => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
                'unique'     => TRUE
            ],
            'email_verified_at timestamp null',
            'password'      => [
                'type'       => 'VARCHAR',
                'constraint' => '60'
            ],
            'profile_image' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'       => TRUE
            ],
            'address'       => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
                'null'       => TRUE
            ],
            'phone_number'  => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
                'null'       => TRUE
            ],
            'created_at timestamp null default CURRENT_TIMESTAMP',
            'updated_at timestamp null default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
