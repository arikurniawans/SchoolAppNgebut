<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingAkademik extends Model
{
    use HasFactory;
    protected $primaryKey = 'idsettingtahun';
    public $timestamps = true;

    protected $fillable = [
        'tahunakademik',
        'semester',
        'statusta',
        'reg_date'
    ];
}
