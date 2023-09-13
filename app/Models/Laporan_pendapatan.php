<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan_pendapatan extends Model
{
    protected $table = 'laporan_penjualan';
    protected $primaryKey = 'id';
    protected $fillable = ['key', 'tujuan_penghasilan'];
}

