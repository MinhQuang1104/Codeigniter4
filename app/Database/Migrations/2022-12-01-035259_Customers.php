<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customers extends Migration {
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'first_name'    => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'last_name'     => [
                'type'       => 'VARCHAR',
                'constraint' => '50'
            ],
            'email'         => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
                'null'       => TRUE
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
        $this->forge->createTable('customers');
    }

    public function down()
    {
        $this->forge->dropTable('customers');
    }
}
