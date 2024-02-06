<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PelangganModel;

class Pelanggan extends BaseController
{
    protected $pelanggan;
    public function __construct()
    {
        $this->pelanggan = new PelangganModel;
    }
    public function index()
    {
        return view('pelanggan/index');
    }
    public function getAllPelanggan()
    {
        $model = new PelangganModel();
        $data['pelanggan'] = $model->findAll();
        return json_encode($data);
    }
    public function getById()
    {
        $pelangganID=$this->request->getVar('idpelanggan');
        $model = new PelangganModel();
        $data = $model->find($pelangganID);
        return json_encode($data);
    }
    public function addPelanggan()
    {
        $model = new PelangganModel();
        $data = [
            'NamaPelanggan' => $this->request->getPost('NamaPelanggan'),
            'Alamat' => $this->request->getPost('Alamat'),
            'NomorTelepon' => $this->request->getPost('NomorTelepon')
        ];
        $model->insert($data);
        return json_encode(['status' => 'success', 'message' => 'Berhasil Menambahkan Pelanggan.']);
    }
    public function updatePelanggan()
    {
        $model = new PelangganModel();
        $data = [
            'NamaPelanggan' => $this->request->getPost('NamaPelanggan'),
            'Alamat' => $this->request->getPost('Alamat'),
            'NomorTelepon' => $this->request->getPost('NomorTelepon')
        ];
        $model->update($this->request->getPost('pelangganID'), $data);
        return json_encode(['status' => 'success', 'message' => 'Berhasil Edit Produk.']);
    }
    public function hapusPelanggan()
    {
        $model = new PelangganModel();
        $model->delete($this->request->getVar('pelangganID'));
        return json_encode(['status' => 'success', 'message' => 'Berhasil Menghapus Produk.']);
    }
}