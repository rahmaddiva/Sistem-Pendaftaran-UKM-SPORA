<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AuthModel;
use App\Models\PendaftarModel;
use App\Models\DivisiModel;
use App\Models\ProdiModel;
use App\Models\TipeUserModel;
use App\Models\PendaftaranModel;
use CodeIgniter\Email\Email;
use Config\Services;
use CodeIgniter\Database\Exceptions\DatabaseException;


class AuthController extends BaseController
{
    //variabel-variabel ini hanya dapat diakses dari dalam kelas itu sendiri dan kelas turunannya//
    protected $userModel;
    protected $prodiModel;
    protected $divisiModel;
    protected $tipeUserModel;

    protected $pendaftaranModel;
    protected $email;
    protected $pendaftarModel;
    public function __construct()
    {
        $this->userModel = new AuthModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->prodiModel = new ProdiModel();
        $this->divisiModel = new DivisiModel();
        $this->email = Services::email();
        $this->tipeUserModel = new TipeUserModel();
        $this->pendaftaranModel = new PendaftaranModel();
    }


    public function proses_registrasi()
    {
        $validation = Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'nim' => 'required|is_unique[tb_pendaftar.nim]',
            'jenis_kelamin' => 'required',
            'semester' => 'required',
            'alasan' => 'required',
            'id_divisi' => 'required',
            'id_divisi2' => 'required',
            'id_prodi' => 'required',
            'username' => 'required|is_unique[tb_users.username]',
            'password' => 'required|min_length[6]',
            'email' => 'required|valid_email|is_unique[tb_users.email]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $userData = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getPost('email'),
            'activation_hash' => md5(rand() . time()),
            'is_active' => 0,
            'id_tipe_user' => 2
        ];

        // Insert user data and get the inserted ID
        $this->userModel->insert($userData);
        $userId = $this->userModel->getInsertID();

        // Prepare pendaftar data
        $pendaftarData = [
            'id_user' => $userId,
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'semester' => $this->request->getPost('semester'),
            'alasan' => $this->request->getPost('alasan'),
            'id_divisi' => $this->request->getPost('id_divisi'),
            'id_divisi2' => $this->request->getPost('id_divisi2'),
            'id_prodi' => $this->request->getPost('id_prodi'),
            'status' => 'Menunggu',
            'tgl_diterima' => null,
            'tgl_wawancara' => null
        ];

        // Insert pendaftar data
        $this->pendaftarModel->insert($pendaftarData);

        // Send activation email
        $this->_sendActivationEmail($this->request->getPost('email'), $userData['activation_hash']);

        return redirect()->to('/login')->with('success', 'Registrasi Berhasil! Silakan cek email Anda untuk verifikasi.');
    }

    private function _sendActivationEmail($email, $activationHash)
    {
        $this->email->setTo($email);
        $this->email->setSubject('Email Activation');
        $this->email->setFrom('simpenpora31@gmail.com', 'Sistem Informasi Pendaftaran Anggota SPORA');
        $message = "Klik tautan berikut untuk mengaktifkan akun Anda: " . base_url() . "/auth/activate/" . $activationHash;
        $this->email->setMessage($message);

        if (!$this->email->send()) {
            log_message('error', $this->email->printDebugger(['headers']));
        } else {
            return true;
        }
    }


    public function activate($hash)
    {
        $user = $this->userModel->where('activation_hash', $hash)->first();
        $activationHash = md5(rand() . time());

        if ($user) {
            $userData = [
                'is_active' => 1,
                'activation_hash' => $activationHash
            ];
            $this->userModel->update($user['id_user'], $userData);
            return redirect()->to('/auth/aktifasi_berhasil')->with('success', 'Akun Anda telah diaktifkan, silakan login.');
        } else {
            return redirect()->to('/auth/register')->with('error', 'Tautan aktivasi tidak valid atau telah kedaluwarsa.');
        }
    }
    public function login()
    {
        $data = [
            'title' => 'Form Login'
        ];

        return view('auth/login', $data);
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola User',
            'user' => $this->userModel->getUsers(),
            'divisi' => $this->divisiModel->findAll(),
            'tipe_user' => $this->tipeUserModel->findAll(),
        ];

        return view('auth/index', $data);
    }

    public function aktifasi_berhasil()
    {
        $data = [
            'title' => 'Aktifasi Akun Berhasil'
        ];

        return view('auth/activation_success', $data);
    }

    public function aktifasi_gagal()
    {
        $data = [
            'title' => 'Aktifasi Akun Gagal'
        ];

        return view('auth/activation_error', $data);
    }

    public function proses_user()
    {
        $id_user = $this->request->getPost('id_user');

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $nama = $this->request->getPost('nama');
        $id_tipe_user = $this->request->getPost('id_tipe_user');

        if ($id_user) {
            $data = [

                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'email' => $email,
                'is_active' => 1, // 'is_active' => '1
                'nama' => $nama,
                'id_tipe_user' => $id_tipe_user
            ];
            $this->userModel->update($id_user, $data);
            return redirect()->to('/kelola_user')->with('success', 'Data user berhasil diubah');
        } else {
            $data = [

                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'email' => $email,
                'is_active' => 1, // 'is_active' => '1
                'nama' => $nama,
                'id_tipe_user' => $id_tipe_user
            ];
            $this->userModel->insert($data);
            return redirect()->to('/kelola_user')->with('success', 'Data user berhasil ditambahkan');
        }
    }

    public function registrasi()
    {
        $pendaftaran = $this->pendaftaranModel->first(); // Ambil data pendaftaran pertama
        $currentDate = date('Y-m-d'); // Tanggal saat ini

        if ($pendaftaran) {
            $tglBuka = $pendaftaran['tgl_buka'];
            $tglTutup = $pendaftaran['tgl_tutup'];

            // Cek apakah tanggal saat ini berada dalam rentang tgl_buka dan tgl_tutup
            if ($currentDate >= $tglBuka && $currentDate <= $tglTutup) {
                $data = [
                    'title' => 'Form Registrasi Anggota',
                    'prodi' => $this->prodiModel->findAll(),
                    'divisi' => $this->divisiModel->findAll()
                ];

                return view('auth/registrasi', $data);
            } else {
                // Jika tanggal saat ini tidak berada dalam rentang, tampilkan pesan error
                return redirect()->to('/login')->with('error', 'Pendaftaran sudah ditutup.');
            }
        } else {
            // Jika data pendaftaran tidak ditemukan, tampilkan pesan error
            return redirect()->to('/login')->with('error', 'Data pendaftaran tidak ditemukan.');
        }
    }

    public function loginProses()
    {
        $request = Services::request();

        $username = $request->getPost('username');
        $password = $request->getPost('password');
        $recaptchaResponse = $request->getPost('g-recaptcha-response');

        if (empty($username) || empty($password) || empty($recaptchaResponse)) {
            return redirect()->to('/login')->with('error', 'Username, password, dan reCAPTCHA harus diisi.');
        }

        $secretKey = getenv('RECAPTCHA_SECRET_KEY');
        $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptchaResponse = file_get_contents($recaptchaUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
        $recaptchaData = json_decode($recaptchaResponse);

        if (!$recaptchaData->success) {
            return redirect()->to('/login')->with('error', 'reCAPTCHA tidak valid. Silakan coba lagi.');
        }

        $user = $this->userModel->where('username', $username)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                if ($user['is_active'] == 1) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'email' => $user['email'],
                        'nama' => $user['nama'],
                        'id_tipe_user' => $user['id_tipe_user'],
                    ];

                    session()->set($data);

                    // Cek tipe_user dan ambil status dari tb_pendaftar jika tipe_user 2
                    if ($user['id_tipe_user'] == 2) {
                        $this->pendaftarModel = new PendaftarModel();
                        $statusPendaftar = $this->pendaftarModel->where('id_user', $user['id_user'])->findAll();
                        session()->set('status_pendaftar', $statusPendaftar);
                    }

                    return redirect()->to('/dashboard');
                } else {
                    return redirect()->to('/login')->with('error', 'Akun Anda belum diaktifkan, silakan cek email Anda.');
                }
            } else {
                return redirect()->to('/login')->with('error', 'Password yang Anda masukkan salah.');
            }
        } else {
            return redirect()->to('/login')->with('error', 'Username tidak ditemukan.');
        }
    }

    public function update_user()
    {
        //   kondisi apabila password diisi atau tidak
        if ($this->request->getPost('password')) {
            $data = [

                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'email' => $this->request->getPost('email'),
                'is_active' => 1, // 'is_active' => '1
                'nama' => $this->request->getPost('nama'),
                'id_tipe_user' => $this->request->getPost('id_tipe_user')
            ];
        } else {
            $data = [

                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password_lama'), // 'password' => '
                'is_active' => 1, // 'is_active' => '1
                'nama' => $this->request->getPost('nama'),
                'id_tipe_user' => $this->request->getPost('id_tipe_user')
            ];
        }

        $this->userModel->update($this->request->getPost('id_user'), $data);
        return redirect()->to('/kelola_user')->with('success', 'Data user berhasil diubah');
    }

    public function hapus_user($id)
    {
        try {
            // Menghapus data berdasarkan id
            $this->userModel->delete($id);
        } catch (DatabaseException $databaseException) {
            session()->setFlashdata('pesan', 'Data User gagal dihapus karena data tersebut berelasi');
            session()->setFlashdata('toastr', 'error');
            return redirect()->to('/kelola_user');
        }

        return redirect()->to('/kelola_user')->with('success', 'Data user berhasil dihapus');


    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah logout');

    }
}
