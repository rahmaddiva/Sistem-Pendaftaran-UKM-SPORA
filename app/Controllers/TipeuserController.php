<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TipeuserModel;

class TipeuserController extends BaseController
{

    protected $tipeuser;

    public function __construct()
    {
        $this->tipeuser = new TipeuserModel();
    }

    public function index()
    {
        $session = session();
        // jika tidak ada session maka tidak boleh masuk ke halaman dashboard
        if (!$session->get('id_user')) {
            return redirect()->to('/');
        }
        // jika session dengan id_tipe_user 2 maka tidak boleh masuk dan diarahkan ke halaman dashboard
        if ($session->get('id_tipe_user') == 2) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'title' => 'Tipe User',
            'tipe_user' => $this->tipeuser->findAll()
        ];
        return view('tipeuser/index', $data);
    }

    public function proses_tipe_user()
    {
        $validateRules = \Config\Services::validation();
        // validasi input dari form tipe user
        $validateRules = [
            'nama_tipe_user' => 'required'
        ];
        $this->validate($validateRules, [
            'nama_tipe_user' => [
                'required' => 'Tipe User harus diisi'
            ]
        ]);

        // jika validasi gagal, kembali ke halaman form tipe user dengan membawa pesan error
        if (!$this->validate($validateRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // ambil data dari form input dengan name="nama_tipe_user"
        $nama_tipe_user = $this->request->getPost('nama_tipe_user');
        // simpan data ke database
        $this->tipeuser->save([
            'nama_tipe_user' => $nama_tipe_user
        ]);
        // kembali ke halaman form tipe user dengan membawa pesan sukses
        session()->setFlashdata('pesan', 'Data Tipe User berhasil ditambahkan');
        session()->setFlashdata('toastr', 'success');
        return redirect()->to('/kelola_tipe_user');
    }

    public function update_tipe_user()
    {
        $id_tipe_user = $this->request->getPost('id_tipe_user');
        $this->tipeuser->find($id_tipe_user);
        $this->tipeuser->update([
            'tipe_user' => $this->request->getPost('tipe_user')
        ], $id_tipe_user);
        session()->setFlashdata('pesan', 'Data Tipe User berhasil dirubah');
        session()->setFlashdata('toastr', 'success');
        return redirect()->to('/kelola_tipe_user');
    }

    public function delete_tipe_user($id)
    {
        $this->tipeuser->delete($id);
        session()->setFlashdata('pesan', 'Data Tipe User berhasil dihapus');
        session()->setFlashdata('toastr', 'success');
        return redirect()->to('/kelola_tipe_user');
    }
}
