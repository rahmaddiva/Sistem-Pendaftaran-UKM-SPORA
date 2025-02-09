<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\DivisiModel;

class DivisiController extends BaseController
{

    protected $divisiModel;

    public function __construct()
    {
        $this->divisiModel = new DivisiModel();

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
            'title' => 'Kelola Divisi',
            'divisi' => $this->divisiModel->findAll()
        ];
        return view('divisi/index', $data);
    }

    public function proses_divisi()
    {
        $validateRules = \Config\Services::validation();
        // validasi nilai inputan pada form tambah divisi
        $validateRules = [
            'nama_divisi' => 'required',
            'deskripsi' => 'required',
            'foto' => 'uploaded[foto]|max_size[foto,3020]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ];
        $this->validate($validateRules, [
            'nama_divisi' => [
                'required' => 'Nama Divisi harus diisi'
            ],
            'deskripsi' => [
                'required' => 'Deskripsi harus diisi'
            ],
            'foto' => [
                'uploaded' => 'Pilih gambar terlebih dahulu',
                'max_size' => 'Ukuran gambar terlalu besar',
                'is_image' => 'File yang dipilih bukan gambar',
                'mime_in' => 'File yang dipilih bukan gambar'
            ]
        ]);

        // jika validasi gagal, kembali ke halaman form tambah divisi dengan membawa pesan error
        if (!$this->validate($validateRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // jika pengguna mengupload foto divisi yang valid
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            // simpan nama file foto ke dalam array data
            $namaFoto = $foto->getRandomName();
            // pindahkan file foto ke direktori yang diinginkan
            $foto->move(FCPATH . 'foto_divisi', $namaFoto);
        } else {
            $namaFoto = 'assets/dist/img/photo4.jpg'; // gunakan foto default jika foto tidak valid
        }

        // simpan data divisi ke dalam array data

        $data = [
            'nama_divisi' => $this->request->getPost('nama_divisi'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $namaFoto
        ];
        $this->divisiModel->insert($data);
        session()->setFlashdata('pesan', 'Data Divisi berhasil ditambahkan');
        session()->setFlashdata('toastr', 'success');
        return redirect()->to('/kelola_divisi');
    }

    public function update_divisi()
    {
        $id_divisi = $this->request->getPost('id_divisi');
        $validateRules = \Config\Services::validation();
        // validasi nilai inputan pada form tambah divisi
        $validateRules = [
            'nama_divisi' => 'required',
            'deskripsi' => 'required',
            'foto' => 'uploaded[foto]|max_size[foto,3020]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ];
        $this->validate($validateRules, [
            'nama_divisi' => [
                'required' => 'Nama Divisi harus diisi'
            ],
            'deskripsi' => [
                'required' => 'Deskripsi harus diisi'
            ],
            'foto' => [
                'uploaded' => 'Pilih gambar terlebih dahulu',
                'max_size' => 'Ukuran gambar terlalu besar',
                'is_image' => 'File yang dipilih bukan gambar',
                'mime_in' => 'File yang dipilih bukan gambar'
            ]
        ]);

        if (!$this->validate($validateRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $nama_divisi = $this->request->getPost('nama_divisi');
        $deskripsi = $this->request->getPost('deskripsi');
        $foto = $this->request->getFile('foto');
        $currentFoto = $this->divisiModel->find($id_divisi)['foto'];

        $data = [
            'nama_divisi' => $nama_divisi,
            'deskripsi' => $deskripsi,
        ];

        // memastikan file foto valid dan telah diunggah
        if ($foto->isValid() && !$foto->hasMoved()) {
            // simpan nama file foto ke dalam array data
            $namaFoto = $foto->getRandomName();
            // pindahkan file foto ke direktori yang diinginkan
            $foto->move(FCPATH . 'foto_divisi', $namaFoto);
            // hapus foto lama jika bukan default_divisi.jpg
            if ($currentFoto != 'default_divisi.jpg') {
                unlink(FCPATH . 'foto_divisi/' . $currentFoto);
            }
            $data['foto'] = $namaFoto; // gunakan foto baru jika valid
        } else {
            $data['foto'] = $currentFoto;  // gunakan foto lama jika foto baru tidak valid
        }
        $this->divisiModel->update($id_divisi, $data);
        session()->setFlashdata('pesan', 'Data Divisi berhasil diubah');
        session()->setFlashdata('toastr', 'success');
        return redirect()->to('/kelola_divisi');
    }

    public function hapus_divisi($id)
    {
        $divisi = $this->divisiModel->find($id);
        if ($divisi['foto'] != 'default_divisi.jpg') {
            unlink(FCPATH . 'foto_divisi/' . $divisi['foto']);
        }
        $this->divisiModel->delete($id);
        session()->setFlashdata('pesan', 'Data Divisi berhasil dihapus');
        session()->setFlashdata('toastr', 'success');
        return redirect()->to('/kelola_divisi');

    }
}
