<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    protected $produk;
    public function __construct()
    {
        $this->produk = new ProdukModel();
    }
    public function index()
    {
        return view('produk/index');
    }
    public function getAllProduk()
    {
        $model = new ProdukModel();
        $data['products'] = $model->findAll();
        return json_encode($data);
    }

    public function getById()
    {
        $idproduk=$this->request->getVar('idproduk');
        $model = new ProdukModel();
        $data = $model->find($idproduk);
        return json_encode($data);
    }
    public function addProduk()
    {
        $model = new ProdukModel();
        $data = [
            'NamaProduk' => $this->request->getPost('NamaProduk'),
            'Harga' => $this->request->getPost('Harga'),
            'Stok' => $this->request->getPost('Stok')
        ];
        $model->insert($data);
        return json_encode(['status' => 'success', 'message' => 'Berhasil Menambahkan Produk.']);
    }
    public function updateProduk()
    {
        $model = new ProdukModel();
        $data = [
            'NamaProduk' => $this->request->getPost('NamaProduk'),
            'Harga' => $this->request->getPost('Harga'),
            'Stok' => $this->request->getPost('Stok')
        ];
        $model->update($this->request->getPost('produkID'), $data);
        return json_encode(['status' => 'success', 'message' => 'Berhasil Edit Produk.']);
    }
    public function hapusProduk()
    {
        $model = new ProdukModel();
        $model->delete($this->request->getVar('produkID'));
        return json_encode(['status' => 'success', 'message' => 'Berhasil Menghapus Produk.']);
    }
}