<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPenjualan extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'detailID' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'penjualanID' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'produkID' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'jumlahProduk' => [
                'type' => 'INT',
                'constraint'=> 11,
            ],
            'SubTotal' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
        $this->forge->addKey('detailID', true);
        $this->forge->createTable('detailpenjualan');
    }

    public function down()
    {
        //
        $this->forge->dropTable('detailpenjualan');

    }
}
