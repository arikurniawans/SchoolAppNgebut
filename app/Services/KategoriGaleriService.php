<?php

namespace App\Services;

use App\Models\Galeri;
use App\Models\KategoriGaleri;
use App\Models\OPD;
use App\Models\Settings;
use App\Models\TandaTangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class KategoriGaleriService {
    public function update($id, $data)
    {
        $galeri = KategoriGaleri::find($id);

        if(isset($data['label']))
            $galeri->label = $data['label'];
        if(isset($data['active']))
            $galeri->active = $data['active'];

        $save = $galeri->save();
        if($save)
            return true;
        else
            return false;
    }

    public function create($data) {

        $insert = KategoriGaleri::create($data);
        return $insert;
    }

    public function delete($id) {
        $tanda = KategoriGaleri::find($id);
        $destroy = $tanda->delete();
        return $destroy;
    }

    public function deleteBulk($ids) {
        $destroy = KategoriGaleri::destroy($ids);
        return $destroy;
    }

    public function statusBulk($status, $ids) {
        if($status == 'aktif') {
            $status = '1';
        } else {
            $status = '0';
        }

        $update = KategoriGaleri::whereIn('id', $ids)->update([
            'active' => $status
        ]);

        return $update;
    }
}
