<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration
{
    public function up()
    {
        //tabel pelanggan
        $this->forge->addField([
            'pelangganID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'NamaPelanggan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'Alamat' => [
                'type' => 'TEXT',
            ],
            'NomorTelepon' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
        ]);
        $this->forge->addKey('pelangganID', true);
        $this->forge->createTable('pelanggan');
    }

    public function down()
    {
        //
        $this->forge->dropTable('pelanggan');

    }
}
