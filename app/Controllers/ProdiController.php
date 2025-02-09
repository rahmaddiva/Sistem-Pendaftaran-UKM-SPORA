<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ProdiModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class ProdiController extends BaseController
{

    protected $prodiModel;

    public function __construct()
    {
        $this->prodiModel = new ProdiModel();
    }

    public function index()
    {
        $session = session();
        // jika tidak ada session maka tidak boleh masuk ke halaman dashboard
        if (!$session->get('id_user')) {
            return redirect()->to('/')->with('errors', ['Silahkan login terlebih dahulu']);
        }
        // jika session dengan id_tipe_user 2 maka tidak boleh masuk dan diarahkan ke halaman dashboard
        if ($session->get('id_tipe_user') == 2) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'title' => 'Kelola Prodi',
            'prodi' => $this->prodiModel->findAll()
        ];
        return view('prodi/index', $data);
    }

    public function proses_prodi()
    {
        $validateRules = \Config\Services::validation();
        // validasi nilai inputan pada form tambah prodi
        $validateRules = [
            'nama_prodi' => 'required',
        ];
        $this->validate($validateRules, [
            'nama_prodi' => [
                'required' => 'Nama Prodi harus diisi'
            ]
        ]);
        // jika inputan tidak sesuai dengan rules yang telah di set
        if (!$this->validate($validateRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // jika inputan sesuai dengan rules yang telah di set
        $data = [
            'nama_prodi' => $this->request->getPost('nama_prodi')
        ];
        $this->prodiModel->insert($data);
        session()->setFlashdata('pesan', 'Data Prodi berhasil ditambahkan');
        session()->setFlashdata('toastr', 'success');
        return redirect()->to('/kelola_prodi');
    }

    public function update_prodi()
    {
        $id = $this->request->getPost('id_prodi');
        $data = [
            'nama_prodi' => $this->request->getPost('nama_prodi')
        ];
        $this->prodiModel->update($id, $data);
        session()->setFlashdata('pesan', 'Data Prodi berhasil diubah');
        session()->setFlashdata('toastr', 'success');
        return redirect()->to('/kelola_prodi');
    }

    public function hapus_prodi($id)
    {

        try {
            // Menghapus data berdasarkan id
            $this->prodiModel->delete($id);
        } catch (DatabaseException $databaseException) {
            session()->setFlashdata('pesan', 'Data Prodi gagal dihapus karena data tersebut berelasi');
            session()->setFlashdata('toastr', 'error');
            return redirect()->to('/kelola_prodi');
        }


        session()->setFlashdata('pesan', 'Data Prodi berhasil dihapus');
        session()->setFlashdata('toastr', 'success');
        return redirect()->to('/kelola_prodi');
    }
}
