<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;
    protected $table = 'riwayat';
    protected $fillable = ['id_pengguna','id_menu', 'budget', 'kecamatan'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }

    // Relasi dengan model Restaurant
    public function restaurant()
    {
        return $this->belongsTo(Restoran::class, 'id_restaurant');
    }
}
