<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateProduct extends Migration {
    public function up()
    {
        $this->forge->addColumn('products', [
            'weight_type_id' => [
                'type'     => 'INT',
                'unsigned' => TRUE,
                'default'  => NULL,
                'after'    => 'weight'
            ]
        ]);

        $this->forge->addColumn('products', [
            'CONSTRAINT products_weight_type_id_foreign FOREIGN KEY(weight_type_id) REFERENCES weight_types(id)'
        ]);

//        $this->forge->add_field('CONSTRAINT products_weight_type_id_foreign FOREIGN KEY(weight_type_id) REFERENCES weight_types(id)');

    }

    public function down()
    {
        $this->forge->dropForeignKey('products', 'products_weight_type_id_foreign');
        $this->forge->dropColumn('products', 'weight_type_id');
    }
}
