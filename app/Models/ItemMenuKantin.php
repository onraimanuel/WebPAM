<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMenuKantin extends Model
{
    use HasFactory;

    protected $table = 'item_menu_kantin';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'noKTPAdmin',
    ];

    public $timestamps = false;
}
