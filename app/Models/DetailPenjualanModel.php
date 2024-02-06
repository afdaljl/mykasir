<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPenjualanModel extends Model
{
    protected $table            = 'detailpenjualan';
    protected $primaryKey       = 'detailID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = true;
    protected $allowedFields    = ['detailID','penjualanID','produkID','jumlahProduk','SubTotal'];
}