<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingJadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas',
        'mapel',
        'guru_mapel',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];
}
