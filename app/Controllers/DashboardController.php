<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PendaftarModel;
use App\Models\DivisiModel;
use App\Models\PendaftaranModel;

class DashboardController extends BaseController
{

    protected $modelPendaftar;

    protected $modelDivisi;

    protected $modelPendaftaran;

    public function __construct()
    {
        $this->modelPendaftar = new PendaftarModel();
        $this->modelDivisi = new DivisiModel();
        $this->modelPendaftaran = new PendaftaranModel();
    }
    public function index()
    {

        $userId = session()->get('id_user');
        $session = session();
        // jika tidak ada session maka tidak boleh masuk ke halaman dashboard
        if (!$session->get('id_user')) {
            return redirect()->to('/')->with('error', 'Silahkan login terlebih dahulu');
        }

        $data = [
            'title' => 'Dashboard',
            'countPendaftar' => $this->modelPendaftar->countPendaftar(),
            'countPendaftarDiterima' => $this->modelPendaftar->countPendaftarDiterima(),
            'countPendaftarDitolak' => $this->modelPendaftar->countPendaftarDitolak(),
            'countdivisi' => $this->modelDivisi->countAll(),
            'pendaftaran' => $this->modelPendaftaran->first(),
            'pendaftar_masuk' => $this->modelPendaftar->getPendaftarByUser($userId)
        ];

        return view('dashboard/index', $data);

    }
}
