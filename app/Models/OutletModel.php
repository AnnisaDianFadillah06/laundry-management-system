<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutletModel extends Model
{
    protected $table = "tb_outlet";
    protected $primaryKey = "id_outlet";
    protected $fillable  = ['id_outlet', 'nama_outlet', 'alamat_outlet', 'tlp_outlet', 'status', 'created_by', 'updated_by'];

    public function TransaksiModel()
    {
        return $this->hasMany(TransaksiModel::class);
    }
}
