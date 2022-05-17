<?php

namespace App\Models;

use App\Models\DataInventaris;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataServiceBarang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected $fillable = [
        'id_inventaris',
        'serial_number_barang',
        'keterangan_service',
        'harga_service',
        'tgl_service'
    ];

    protected $casts = [
        'tgl_service' => 'date',
    ];

    public $timestamps = false;

    public function datainventaris()
    {
        return $this->belongsTo(DataInventaris::class);
    }
}
