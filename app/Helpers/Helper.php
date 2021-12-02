<?php

use App\Models\Logs;
use App\Models\Settings;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;


function format_angka_indo($angka)
{
    $rupiah = number_format($angka, 0, ',', '.');
    return $rupiah;
}

if (!function_exists('setImage')) {
    function setImage($file, $dir)
    {
        $file_name = round(microtime(true) * 1000) . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $file_name);
        return $file_name;
    }
}

if (!function_exists('angkaTitikTiga')) {
    function angkaTitikTiga($var)
    {
        return number_format($var, 0, ',', '.');
    }
}

if (!function_exists('arrBulan')) {
    function arrBulan()
    {
        return array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    }
}


if (!function_exists('saveLogs')) {
    function saveLogs($description, $type)
    {
        $dataLog = [
            'id_user' => Auth::user()->id,
            'log_description' => Auth::user()->username . ' ' . $description,
            'log_type' => $type,
        ];
        Logs::create($dataLog);
    }
}

if(!function_exists('detectDelimiter')) {
    function detectDelimiter($csvFile)
    {
        $delimiters = [";" => 0, "," => 0, "\t" => 0, "|" => 0];

        $handle = fopen($csvFile, "r");
        $firstLine = fgets($handle);
        fclose($handle);
        foreach ($delimiters as $delimiter => &$count) {
            $count = count(str_getcsv($firstLine, $delimiter));
        }

        return array_search(max($delimiters), $delimiters);
    }

}


if(!function_exists('deleteFile')) {
    function deleteFile($path, $namaFile)
    {
        if (file_exists($path . '/' . $namaFile) && $namaFile) :
            unlink($path . '/' . $namaFile);
        endif;
    }
}

if(!function_exists('destroyFunction')) {
    function destroyFunction($id, $model, $nameFile, $field, $fitur, $path, $paththumb)
    {
        $idDecode = Hashids::decode($id);
        $dataMaster = $model::find($idDecode)[0];
        if ($dataMaster) :
            if ($nameFile != ''):
                if ($path != '') :
                    deleteFile($path, $dataMaster[$nameFile]);
                endif;
                if ($paththumb != '') :
                    deleteFile($paththumb, $dataMaster[$nameFile]);
                endif;
            endif;
            saveLogs('menghapus data ' . $dataMaster[$field] . ' pada fitur ' . $fitur);
            $delete = $model::destroy($idDecode);
            if ($delete) :
                return true;
            else :
                return false;
            endif;
        else :
            return false;
        endif;
    }
}

// $this->activeFunction($id, BadanUsaha::class, $mode, $teks, 'badan_nama', 'badan_active', 'badan_updated_by', 'badan usaha');

if(!function_exists('uploadImage')) {
    function uploadImage($image, $path, $paththumb)
    {
        $nameFile = round(microtime(true) * 1000) . '.' . $image->getClientOriginalExtension();
        //thumbnail
        if ($paththumb != ''):
            $img = Image::make($image->path());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($paththumb . '/' . $nameFile);
        endif;
        $image->move($path . '/', $nameFile);
        return $nameFile;
    }
}

if(!function_exists('uploadFile')) {
    function uploadFile($file, $path)
    {
        $nameFile = round(microtime(true) * 1000) . '.' . $file->getClientOriginalExtension();
        $file->move($path . '/', $nameFile);
        return $nameFile;
    }
}
