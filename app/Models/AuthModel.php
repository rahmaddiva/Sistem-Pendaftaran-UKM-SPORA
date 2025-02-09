<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'tb_users';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $protectFields = true;
    protected $allowedFields = ['username', 'password', 'email', 'nama', 'activation_hash', 'is_active', 'id_tipe_user', 'created_at', 'updated_at', 'deleted_at'];

    // Dates

    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    public function getUsers()
    {
        return $this->db->table('tb_users')
            ->select('tb_users.*,  tb_tipe_user.nama_tipe_user')

            ->join('tb_tipe_user', 'tb_tipe_user.id_tipe_user = tb_users.id_tipe_user')
            ->get()->getResultArray();
    }

}
