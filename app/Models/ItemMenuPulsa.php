<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMenuPulsa extends Model
{
    use HasFactory;
    
    protected $table = 'item_pulsa';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'jumlah',
        'noKTPAdmin',
    ];

    public $timestamps = false;
}
