<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PendaftarModel;
use App\Models\DivisiModel;

class PendaftarController extends BaseController
{
    protected $pendaftar;

    protected $divisi;

    public function __construct()
    {
        $this->pendaftar = new PendaftarModel();
        $this->divisi = new DivisiModel();
    }


    public function pendaftar_voli()
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
            'title' => 'Pendaftar Voli',
            'pendaftar_voli' => $this->pendaftar->getPendaftarVoli(),
        ];

        return view('pendaftar/pendaftar_voli', $data);
    }

    public function pendaftar_sepakbola()
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
            'title' => 'Pendaftar Sepak Bola',
            'pendaftar_sepakbola' => $this->pendaftar->getPendaftarSepakBola(),
        ];
        return view('pendaftar/pendaftar_sepakbola', $data);
    }

    public function pendaftar_futsal()
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
            'title' => 'Pendaftar Futsal',
            'pendaftar_futsal' => $this->pendaftar->getPendaftarFutsal(),
        ];
        return view('pendaftar/pendaftar_futsal', $data);
    }

    public function pendaftar_esport()
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
            'title' => 'Pendaftar Esport',
            'pendaftar_esport' => $this->pendaftar->getPendaftarEsport(),
        ];
        return view('pendaftar/pendaftar_esport', $data);
    }
    public function pendaftar_kempo()
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
            'title' => 'Pendaftar Kempo',
            'pendaftar_kempo' => $this->pendaftar->getPendaftarKempo(),
        ];
        return view('pendaftar/pendaftar_kempo', $data);
    }
    public function pendaftar_badminton()
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
            'title' => 'Pendaftar Badminton',
            'pendaftar_badminton' => $this->pendaftar->getPendaftarBadminton(),
        ];
        return view('pendaftar/pendaftar_badminton', $data);
    }
    public function pendaftar_basket()
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
            'title' => 'Pendaftar Basket',
            'pendaftar_basket' => $this->pendaftar->getPendaftarBasket(),
        ];
        return view('pendaftar/pendaftar_basket', $data);
    }


    public function pendaftar_masuk()
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
            'title' => 'Pendaftar Masuk',
            'pendaftar_masuk' => $this->pendaftar->getPendaftar(),
            'divisi' => $this->divisi->findAll(),

        ];
        return view('pendaftar/pendaftar_masuk', $data);
    }

    public function pendaftar_detail($id)
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
            'title' => 'Detail Pendaftar',
            'pendaftar' => $this->pendaftar->getPendaftarbyId($id)
        ];
        return view('pendaftar/pendaftar_detail', $data);

    }

    public function pendaftar_diterima()
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
            'title' => 'Pendaftar Diterima',
            'pendaftar_diterima' => $this->pendaftar->getPendaftarDiterima()
        ];
        return view('pendaftar/pendaftar_diterima', $data);
    }


    public function pendaftar_ditolak()
    {
        $session = session();
        // jika tidak ada session maka tidak boleh masuk ke halaman dashboard
        if (!$session->get('id_user')) {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Pendaftar Ditolak',
            'pendaftar_ditolak' => $this->pendaftar->getPendaftarDitolak()
        ];
        return view('pendaftar/pendaftar_ditolak', $data);
    }

    public function pendaftar_terima()
    {
        $id_pendaftar = $this->request->getPost('id_pendaftar');
        $id_divisi = $this->request->getPost('id_divisi');
        $data = [
            'id_pendaftar' => $id_pendaftar,
            'div_terima' => $id_divisi,
            'tgl_diterima' => date('Y-m-d'), // menambahkan tanggal diterima
            'status' => 'Diterima'
        ];
        $this->pendaftar->update($id_pendaftar, $data);
        session()->setFlashdata('pesan', 'Data berhasil Diterima');
        session()->setFlashdata('toastr', 'success');
        return redirect()->to('/pendaftar_masuk');
    }

    public function pendaftar_tolak()
    {

        $id_divisi = $this->request->getPost('id_divisi');
        $id_pendaftar = $this->request->getPost('id_pendaftar');
        $data = [
            'id_pendaftar' => $id_pendaftar,
            'status' => 'Ditolak',
            'div_tolak' => $id_divisi
        ];

        $this->pendaftar->update($id_pendaftar, $data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/pendaftar_masuk');
    }

}
