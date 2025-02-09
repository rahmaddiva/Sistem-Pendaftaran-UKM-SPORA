<?php

namespace App\Models;

use CodeIgniter\Model;

class DivisiModel extends Model
{
    protected $table = 'tb_divisi';
    protected $primaryKey = 'id_divisi';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['nama_divisi', 'deskripsi', 'foto'];

}
