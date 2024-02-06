<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        //tabel produk
        $this->forge->addField([
            'produkID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'NamaProduk' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'Harga' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'Stok' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('produkID', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        //
        $this->forge->dropTable('produk');
    }
}
