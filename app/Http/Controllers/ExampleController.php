<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    //

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Fungsi ini akan mengembalikan view/halaman yang ada pada folder resources\views\{namaFile}.blade.php
     * Kenapa menggunakan function getIndex? Silahkan baca dokumentasi LaravelAdvanced
     */
    public function getIndex() {
        /**
         * Untuk passing data lebih mudah, kita bungkus semua variable yang akan dipassing
         * ke dalam array, yang saat ini kita gunakan.
         *
         * Oh iya array element title dan breadcrumb ini suatu keharusan pada halaman dashboard
         */
        $data = [
            'title' => 'Contoh Example',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            // Key sebagai variable name di view nanti, sementara value nya akan sebagai data yang ditampilkan
            'testVariable' => 'Example'
        ];
        /**
         * Nah ini return views yang sudah dijelaskan pada komen diatas disertai dengan data yang akan kita passing ke view
         */
        return view('example.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * Fungsi ini akan mengembalikan view/halaman yang ada pada folder resources\views\{namaFile}.blade.php
     * ketika menggunakan nama function getCreate maka hasil url nya adalah http://link.com/example/create
     */
    public function getCreate() {
        /**
         * Untuk passing data lebih mudah, kita bungkus semua variable yang akan dipassing
         * ke dalam array, yang saat ini kita gunakan.
         *
         * Oh iya array element title dan breadcrumb ini suatu keharusan pada halaman dashboard
         */
        $data = [
            'title' => 'Tambah Example',
            'breadcrumb' => [
                ['url' => '/' , 'name' => 'Home'],
                ['url' => '/interface' , 'name' => 'Interface'],
                ['url' => '/master' , 'name' => 'List Data'],
            ],
            // Key sebagai variable name di view nanti, sementara value nya akan sebagai data yang ditampilkan
            'testVariable' => 'Example'
        ];
        /**
         * Nah ini return views yang sudah dijelaskan pada komen diatas disertai dengan data yang akan kita passing ke view
         */
        return view('example.create', $data);
    }
}
