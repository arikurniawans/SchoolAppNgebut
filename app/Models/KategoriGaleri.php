<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriGaleri extends Model
{
    use HasFactory;

    protected $table = 'tbl_kategori_albums';
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $fillable = [
        'label',
        'active',
    ];

    public static $rules = [
        'label' => 'required|string',
    ];

    public function galeri() {
        return $this->belongsToMany(Galeri::class, 'kategori_of_album', 'kategori_id', 'album_id', 'id', 'id');
    }
    public function scopeActive($query)
    {
        return $query->where('active', '1');
    }

}
