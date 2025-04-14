<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $table = "tb_transaksi";
    protected $primaryKey = "id_transaksi";
    protected $fillable  = ['id_transaksi', 'id_outlet','id_paket','tarif', 'kode_invoice', 'id_member', 'tgl_pesan', 'batas_waktu', 'tgl_bayar', 'status', 'tarif', 'berat', 'total', 'dibayar', 'id_user', 'created_by', 'updated_by'];
    
    public function PaketModel()
    {
        return $this->belongsTo(PaketModel::class, 'id_paket');
    }
    public function OutletModel()
    {
        return $this->belongsTo(OutletModel::class, 'id_outlet');
    }
    public function PelangganModel()
    {
        return $this->belongsTo(PelangganModel::class, 'id_member');
    }
}
