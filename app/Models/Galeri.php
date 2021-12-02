<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'tbl_albums';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'title',
        'seotitle',
        'picture',
        'content',
        'active',
        'tanggal',
        'created_by',
        'updated_by',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

    public static $rules = [
        'title' => 'required|string',
        'seotitle' => 'required|string|unique:tbl_albums,seotitle',
        'content' => 'required|string',
    ];

    public function kategori() {
        return $this->belongsToMany(KategoriGaleri::class, 'kategori_of_album', 'album_id', 'kategori_id', 'id', 'id');
    }

}
