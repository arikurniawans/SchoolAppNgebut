<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasBerjalan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kelas';
    public $timestamps = true;

    protected $fillable = [
        'tahun_akademik',
        'semester',
        'kelas',
        'jurusan',
        'rombel',
        'walikelas',
    ];
}
