<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketModel extends Model
{
    protected $table = "tb_paket";
    protected $primaryKey = "id_paket";
    protected $fillable  = ['id_paket', 'id_outlet', 'jenis_paket', 'nama_paket', 'harga_paket', 'status', 'created_by', 'updated_by'];
    
    public function TransaksiModel()
    {
        return $this->hasMany(TransaksiModel::class);
    }
}


