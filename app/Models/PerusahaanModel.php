<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerusahaanModel extends Model
{
    use HasFactory;
    protected $table = 'perusahaan';
    // protected $primaryKey = $id;
    // protected $ketTipe = int;
    
    protected $fillable = [
        'nama',
        'website',
        'email',
        'alamat'
    ];
}
