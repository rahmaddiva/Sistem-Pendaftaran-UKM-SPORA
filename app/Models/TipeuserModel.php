<?php

namespace App\Models;

use CodeIgniter\Model;

class TipeuserModel extends Model
{
    protected $table = 'tb_tipe_user';
    protected $primaryKey = 'id_tipe_user';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['nama_tipe_user'];

}
