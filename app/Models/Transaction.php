<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'produk_id', 'nama_pembeli', 'alamat', 'telpon', 'tanda_pengenal', 'tanggal_transaksi', 'total_transaksi', 'total_harga'
    ];

    public function produk()
    {
        return $this->belongsTo(Product::class);
    }
}
