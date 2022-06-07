<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiMenuKantin extends Model
{
    use HasFactory;

    protected $table = 'transaksi_menu_kantin';

    protected $fillable = [
        'id',
        'noKTP_customer',
        'id_menu_kantin',
        'jumlah',
        'tanggal',
    ];

    public $timestamps = false;
}
