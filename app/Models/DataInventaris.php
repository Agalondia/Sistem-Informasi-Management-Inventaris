<?php

namespace App\Models;

use App\Models\DataServiceBarang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataInventaris extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'id_inventaris',
        'nama_barang',
        'serial_number_barang',
        'tanggal_pembelian',
        'harga_barang',
        'nama_pengguna_barang'
    ];

    protected $casts = [
        'tanggal_pembelian' => 'date',
    ];

    public $timestamps = false;

    public function dataservicebarang()
    {
        return $this->hasMany(DataServiceBarang::class, 'id_inventaris');
    }
}
