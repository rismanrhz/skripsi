<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restoran extends Model
{
    use HasFactory;
    protected $table = 'restaurant';
    protected $fillable = ['id_pengguna','nama', 'kecamatan', 'detail_alamat', 'jam', 'rating', 'google_maps_link', 'image'];
}
