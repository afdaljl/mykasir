<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DetailPenjualanModel;

class DetailPenjualan extends BaseController
{
    protected $detailpenjualan;
    public function __construct()
    {
        $this->produk = new DetailPenjualanModel();
    }

    public function index()
    {
        return view('detailpenjualan/index');
    }
}
