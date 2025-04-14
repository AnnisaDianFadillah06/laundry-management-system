<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelangganModel extends Model
{
    protected $table = "tb_member";
    protected $primaryKey = "id_member";
    protected $fillable  = ['id_member', 'nama_member', 'alamat_member', 'jenis_kelamin', 'tlp_member', 'created_by', 'updated_by'];

    public function TransaksiModel()
    {
        return $this->hasMany(TransaksiModel::class);
    }
}
