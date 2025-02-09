<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $table = 'tb_pendaftar';
    protected $primaryKey = 'id_pendaftar';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['nama', 'id_user', 'nim', 'jenis_kelamin', 'semester', 'alasan', 'status', 'tgl_diterima', 'tgl_wawancara', 'id_divisi', 'id_divisi2', 'id_prodi', 'div_tolak', 'div_terima'];


    public function getPendaftarByUser($id_user)
    {
        return $this->select('tb_pendaftar.*, 
                          tb_prodi.nama_prodi, 
                          tb_divisi1.nama_divisi as nama_divisi1, 
                          tb_divisi2.nama_divisi as nama_divisi2,
                          diterima.nama_divisi as nama_divisi_terima,
                          ditolak.nama_divisi as nama_divisi_tolak')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi as tb_divisi1', 'tb_divisi1.id_divisi = tb_pendaftar.id_divisi')
            ->join('tb_divisi as tb_divisi2', 'tb_divisi2.id_divisi = tb_pendaftar.id_divisi2')
            ->join('tb_divisi as diterima', 'tb_pendaftar.div_terima = diterima.id_divisi', 'left')
            ->join('tb_divisi as ditolak', 'tb_pendaftar.div_tolak = ditolak.id_divisi', 'left')
            ->where('tb_pendaftar.id_user', $id_user)
            ->orderBy('tb_pendaftar.status', 'DESC')
            ->findAll();
    }


    public function getPendaftar()
    {
        return $this->select('tb_pendaftar.*, 
                          tb_prodi.nama_prodi, 
                          tb_divisi1.nama_divisi as nama_divisi1, 
                          tb_divisi2.nama_divisi as nama_divisi2,
                          diterima.nama_divisi as nama_divisi_terima,
                          ditolak.nama_divisi as nama_divisi_tolak')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi as tb_divisi1', 'tb_divisi1.id_divisi = tb_pendaftar.id_divisi')
            ->join('tb_divisi as tb_divisi2', 'tb_divisi2.id_divisi = tb_pendaftar.id_divisi2')
            ->join('tb_divisi as diterima', 'tb_pendaftar.div_terima = diterima.id_divisi', 'left')
            ->join('tb_divisi as ditolak', 'tb_pendaftar.div_tolak = ditolak.id_divisi', 'left')
            ->orderBy('tb_pendaftar.status', 'DESC')
            ->get()->getResultArray();
    }


    public function getPendaftarDiterima()
    {

        return $this->db->table('tb_pendaftar')
            ->select('tb_pendaftar.*, tb_prodi.nama_prodi, tb_divisi.nama_divisi')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi', 'tb_divisi.id_divisi = tb_pendaftar.id_divisi')

            ->where('tb_pendaftar.status', 'Diterima')
            // berdasarkan divisi yang login

            ->get()->getResultArray();
    }

    public function getPendaftarDitolak()
    {
        return $this->db->table('tb_pendaftar')
            ->select('tb_pendaftar.*, tb_prodi.nama_prodi, tb_divisi.nama_divisi')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi', 'tb_divisi.id_divisi = tb_pendaftar.id_divisi')

            ->where('tb_pendaftar.status', 'Ditolak')
            // berdasarkan divisi yang login

            ->get()->getResultArray();
    }

    public function getPendaftarbyId($id)
    {
        return $this->select('tb_pendaftar.*, 
                          tb_prodi.nama_prodi, 
                          tb_divisi1.nama_divisi as nama_divisi1, 
                          tb_divisi2.nama_divisi as nama_divisi2,
                          diterima.nama_divisi as nama_divisi_terima,
                          ditolak.nama_divisi as nama_divisi_tolak')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi as tb_divisi1', 'tb_divisi1.id_divisi = tb_pendaftar.id_divisi')
            ->join('tb_divisi as tb_divisi2', 'tb_divisi2.id_divisi = tb_pendaftar.id_divisi2')
            ->join('tb_divisi as diterima', 'tb_pendaftar.div_terima = diterima.id_divisi', 'left')
            ->join('tb_divisi as ditolak', 'tb_pendaftar.div_tolak = ditolak.id_divisi', 'left')
            ->where('tb_pendaftar.id_pendaftar', $id)
            ->get()->getRowArray();
    }

    public function jumlahPendaftar()
    {


        return $this->db->table('tb_pendaftar')
            ->select('tb_pendaftar.*, tb_prodi.nama_prodi, tb_divisi.nama_divisi')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi', 'tb_divisi.id_divisi = tb_pendaftar.id_divisi')
            // berdasarkan divisi yang login

            ->countAllResults();
    }

    public function getPendaftarVoli()
    {

        return $this->db->table('tb_pendaftar')
            ->select('tb_pendaftar.*, tb_prodi.nama_prodi, tb_divisi.nama_divisi')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi', 'tb_divisi.id_divisi = tb_pendaftar.id_divisi')
            ->where('tb_pendaftar.id_divisi', 8)
            // berdasarkan divisi yang login
            ->get()->getResultArray();
    }

    public function getPendaftarSepakBola()
    {

        return $this->db->table('tb_pendaftar')
            ->select('tb_pendaftar.*, tb_prodi.nama_prodi, tb_divisi.nama_divisi')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi', 'tb_divisi.id_divisi = tb_pendaftar.id_divisi')

            ->where('tb_pendaftar.id_divisi', 12)
            // berdasarkan divisi yang login
            ->get()->getResultArray();
    }

    public function getPendaftarFutsal()
    {
        return $this->db->table('tb_pendaftar')
            ->select('tb_pendaftar.*, tb_prodi.nama_prodi, tb_divisi.nama_divisi')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi', 'tb_divisi.id_divisi = tb_pendaftar.id_divisi')

            ->where('tb_pendaftar.id_divisi', 13)
            // berdasarkan divisi yang login
            ->get()->getResultArray();
    }

    public function getPendaftarEsport()
    {
        return $this->db->table('tb_pendaftar')
            ->select('tb_pendaftar.*, tb_prodi.nama_prodi, tb_divisi.nama_divisi')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi', 'tb_divisi.id_divisi = tb_pendaftar.id_divisi')

            ->where('tb_pendaftar.id_divisi', 13)
            // berdasarkan divisi yang login
            ->get()->getResultArray();
    }
    public function getPendaftarKempo()
    {
        return $this->db->table('tb_pendaftar')
            ->select('tb_pendaftar.*, tb_prodi.nama_prodi, tb_divisi.nama_divisi')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi', 'tb_divisi.id_divisi = tb_pendaftar.id_divisi')

            ->where('tb_pendaftar.id_divisi', 13)
            // berdasarkan divisi yang login
            ->get()->getResultArray();
    }
    public function getPendaftarBasket()
    {
        return $this->db->table('tb_pendaftar')
            ->select('tb_pendaftar.*, tb_prodi.nama_prodi, tb_divisi.nama_divisi')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi', 'tb_divisi.id_divisi = tb_pendaftar.id_divisi')

            ->where('tb_pendaftar.id_divisi', 13)
            // berdasarkan divisi yang login
            ->get()->getResultArray();
    }
    public function getPendaftarBadminton()
    {
        return $this->db->table('tb_pendaftar')
            ->select('tb_pendaftar.*, tb_prodi.nama_prodi, tb_divisi.nama_divisi')
            ->join('tb_prodi', 'tb_prodi.id_prodi = tb_pendaftar.id_prodi')
            ->join('tb_divisi', 'tb_divisi.id_divisi = tb_pendaftar.id_divisi')

            ->where('tb_pendaftar.id_divisi', 13)
            // berdasarkan divisi yang login
            ->get()->getResultArray();
    }

    public function countPendaftar()
    {
        return $this->db->table('tb_pendaftar')
            ->countAllResults();
    }

    public function countdivisi()
    {
        return $this->db->table('tb_pendaftar')
            ->countAllResults();
    }
    public function countPendaftarDiterima()
    {
        return $this->db->table('tb_pendaftar')
            ->where('status', 'Diterima')
            ->countAllResults();
    }

    public function countPendaftarDitolak()
    {
        return $this->db->table('tb_pendaftar')
            ->where('status', 'Ditolak')
            ->countAllResults();
    }

}
