<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DivisiModel;
use App\Models\PendaftaranModel;

class BerandaController extends BaseController
{
    protected $divisiModel;

    protected $pendaftaranModel;
    public function __construct()
    {
        $this->divisiModel = new DivisiModel();
        $this->pendaftaranModel = new PendaftaranModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'divisi' => $this->divisiModel->findAll(),
            'pendaftaran' => $this->pendaftaranModel->findAll()
        ];

        return view('users/beranda/index', $data);
    }
}
