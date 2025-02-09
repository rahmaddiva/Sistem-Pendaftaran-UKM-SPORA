<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PendaftaranModel;

class PendaftaranController extends BaseController
{

    protected $modelPendaftaran;

    public function __construct()
    {
        $this->modelPendaftaran = new PendaftaranModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pendaftaran',
            'pendaftaran' => $this->modelPendaftaran->findAll()
        ];

        return view('pendaftaran/index', $data);
    }

    public function pendaftaran_update()
    {
        $id_pendaftaran = $this->request->getPost('id_pendaftaran');
        $data = [
            'tgl_buka' => $this->request->getPost('tgl_buka'),
            'tgl_tutup' => $this->request->getPost('tgl_tutup'),
            'tgl_wawancara' => $this->request->getPost('tgl_wawancara'),
        ];

        // Cek apakah ada file yang diupload
        $fotoStruktur = $this->request->getFile('foto_struktur');
        if ($fotoStruktur && $fotoStruktur->isValid() && !$fotoStruktur->hasMoved()) {
            // Generate nama file baru untuk menghindari nama file yang sama
            $newName = $fotoStruktur->getRandomName();
            // Pindahkan file ke direktori yang diinginkan
            $fotoStruktur->move(FCPATH . 'foto_divisi', $newName);
            // Tambahkan nama file ke data yang akan diupdate
            $data['foto_struktur'] = $newName;
        }

        $this->modelPendaftaran->update($id_pendaftaran, $data);
        return redirect()->to('/kelola_pendaftaran')->with('success', 'Data berhasil diubah');
    }

}
