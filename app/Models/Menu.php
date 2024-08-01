<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'makanan';
    protected $fillable = ['id_resto','nama_menu', 'kategori_menu', 'harga', 'image'];
}
