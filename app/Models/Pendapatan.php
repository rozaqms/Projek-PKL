<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    protected $table = 'pendapatan';
    protected $primaryKey = 'id';
    protected $fillable = ['name','category', 'total_price', 'total_quantity'];
    
}