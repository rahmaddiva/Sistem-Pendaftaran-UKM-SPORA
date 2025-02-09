<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table = 'tb_pendaftaran';
    protected $primaryKey = 'id_pendaftaran';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['tgl_buka', 'tgl_tutup', 'tgl_wawancara', 'foto_struktur'];


    
}
