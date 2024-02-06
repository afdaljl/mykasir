<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penjualan extends Migration
{
    public function up()
    {
        //tabelpenjualan
        $this->forge->addField([
            'penjualanID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'TanggalPenjualan' => [
                'type' => 'DATE',
            ],
            'TotalHarga' => [
                'type' => 'DECIMAL',
                'constraint'=> '10,2',
            ],
            'PelangganID' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
        ]);
        $this->forge->addKey('penjualanID', true);
        $this->forge->createTable('penjualan');
    }

    public function down()
    {
        //
        $this->forge->dropTable('penjualan');
    }
}
