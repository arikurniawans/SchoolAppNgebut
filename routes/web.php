<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//SHORTCUT UNTUK MEMBUAT STORAGE LINK PADA SHARED HOSTING
/*Route::get('sysmlink', function(){
    $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/sourceCode/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder, $linkFolder);
    return 'success';
});*/

Route::get('/', [HomeController::class, 'beranda']);
Route::get('/dashboard',[HomeController::class, 'dashboard']);
Route::get('/offline', [HomeController::class, 'offline']);

/**
 * INFO: Ini pakai route grouping agar tidak susah buat satu satu routenya
 * untuk dokumentasi library nya bisa dilihat pada url: https://github.com/lesichkovm/laravel-advanced-route
 */
\AdvancedRoute::controllers([
    // 'setting' => SettingsController::class,
    'profile' => ProfileController::class,
    'users' => UserController::class,
    'datasekolah' => DatasekolahController::class,
    'dataguru' => DataguruController::class,
    'datastaff' => DatastaffController::class,
    'datasiswa' => DatasiswaController::class,
    'datafitur' => DatafiturController::class,
    'datamatapelajaran' => DatamatapelajaranController::class,
    'dataruangkelas' => DataruangkelasController::class,
    'datajurusan' => DatajurusanController::class,
    'datahakakses' => DatahakaksesController::class,
    'datatahunakademik' => DatatahunakademikController::class,
    'datarole' => DataroleController::class,
    'role' => DataroleController::class,
    'datakelompokkelas' => DatakelompokkelasController::class,
    'datakelasberjalan' => DatakelasberjalanController::class,
    'datasettingjadwal' => DatasettingjadwalController::class,
    'datainputnilai' => DatainputnilaiController::class,
    'datauangsekolah' => DatauangsekolahController::class,
    'datasettingpembayaran' => DatasettingbayarController::class,
    'datapembayaranspp' => DatapembayaransppController::class,

    //INFO: CONTOH INTERFACE MULAI DARI LIST DATA SAMPAI DENGAN TAMBAH
    'example' => ExampleController::class
]);

Route::post('/galeri/kategori/bulk-delete', [GaleriController::class, 'bulkDeleteCategori']);
Route::post('/galeri/kategori/bulk-status', [GaleriController::class, 'bulkStatusCategori']);
Route::get('/galeri/kategori/create', [GaleriController::class, 'createCategori']);
Route::post('/galeri/kategori', [GaleriController::class, 'insertCategori']);
Route::put('/galeri/kategori/{id}', [GaleriController::class, 'putCategori']);
Route::get('/galeri/kategori/edit/{id}', [GaleriController::class, 'editCategori']);
Route::delete('/galeri/kategori/{id}', [GaleriController::class, 'deleteCategori']);


// Route Kelas Berjalan
Route::post('/datakelasberjalan/store', [DatakelasberjalanController::class, 'store']);
Route::post('/datakelasberjalan/update', [DatakelasberjalanController::class, 'update']);
Route::get('/datakelasberjalan/index', [DatakelasberjalanController::class, 'getIndex']);
Route::get('/datakelasberjalan/edit/{id}', [DatakelasberjalanController::class, 'getEdit']);
Route::get('/datakelasberjalan/hapus/{id}', [DatakelasberjalanController::class, 'destroy']);

// Route Setting Jadwal
Route::post('/datasettingjadwal/store', [DatasettingjadwalController::class, 'store']);
Route::get('/datasettingjadwal/edit/{id}', [DatasettingjadwalController::class, 'getEdit']);
Route::get('/datasettingjadwal/index', [DatasettingjadwalController::class, 'getIndex']);
Route::post('/datasettingjadwal/update', [DatasettingjadwalController::class, 'update']);
Route::get('/datasettingjadwal/hapus/{id}', [DatasettingjadwalController::class, 'destroy']);

// Route Setting Tahun Ajaran/Akademik
Route::post('/datatahunakademik/store', [DatatahunakademikController::class, 'store']);
Route::post('/datatahunakademik/update', [DatatahunakademikController::class, 'update']);
Route::get('/datatahunakademik/index', [DatatahunakademikController::class, 'getIndex']);
Route::get('/datatahunakademik/edit/{id}', [DatatahunakademikController::class, 'getEdit']);
Route::get('/datatahunakademik/hapus/{id}', [DatatahunakademikController::class, 'destroy']);

// Route Kelompok Kelas
Route::post('/datakelompokkelas/store', [DatakelompokkelasController::class, 'store']);
Route::post('/datakelompokkelas/update', [DatakelompokkelasController::class, 'update']);
Route::get('/datakelompokkelas/index', [DatakelompokkelasController::class, 'getIndex']);
Route::get('/datakelompokkelas/edit/{id}', [DatakelompokkelasController::class, 'getEdit']);
Route::get('/datakelompokkelas/hapus/{id}', [DatakelompokkelasController::class, 'destroy']);

// Route Manajemen Hak Akses
Route::post('/datahakakses/store', [DatahakaksesController::class, 'store']);
Route::post('/datahakakses/update', [DatahakaksesController::class, 'update']);
Route::get('/datahakakses/index', [DatahakaksesController::class, 'getIndex']);
Route::get('/datahakakses/edit/{id}', [DatahakaksesController::class, 'getEdit']);
Route::get('/datahakakses/hapus/{id}', [DatahakaksesController::class, 'destroy']);

// Route Manajemen Fitur
Route::post('/datafitur/store', [DatafiturController::class, 'store']);
Route::post('/datafitur/update', [DatafiturController::class, 'update']);
Route::get('/datafitur/index', [DatafiturController::class, 'getIndex']);
Route::get('/datafitur/edit/{id}', [DatafiturController::class, 'getEdit']);
Route::get('/datafitur/hapus/{id}', [DatafiturController::class, 'destroy']);

// Route Komponen Biaya Sekolah
Route::post('/datauangsekolah/store', [DatauangsekolahController::class, 'store']);
Route::get('/datauangsekolah/index', [DatauangsekolahController::class, 'getIndex']);
Route::post('/datauangsekolah/update', [DatauangsekolahController::class, 'update']);
Route::get('/datauangsekolah/hapus/{id}', [DatauangsekolahController::class, 'destroy']);

// Route Setting Pembayaran
Route::post('/datasettingpembayaran/store', [DatasettingbayarController::class, 'store']);
Route::get('/datasettingpembayaran/index', [DatasettingbayarController::class, 'getIndex']);
Route::get('/datasettingpembayaran/create/{id}', [DatasettingbayarController::class, 'getCreate']);
Route::get('/datasettingpembayaran/lihat/{id}', [DatasettingbayarController::class, 'getShow']);

Route::get('/datapembayaranspp/create/{id}', [DatapembayaransppController::class, 'getCreate']);
Route::get('/datapembayaranspp/index', [DatapembayaransppController::class, 'getIndex']);
Route::get('/datapembayaranspp/create/{id}', [DatapembayaransppController::class, 'getCreate']);
Route::post('/datapembayaranspp/cari', [DatapembayaransppController::class, 'cariKomponen']);
Route::post('/datapembayaranspp/store', [DatapembayaransppController::class, 'store']);
Route::get('/datapembayaranspp/show/{id}', [DatapembayaransppController::class, 'getShow']);
Route::post('/datapembayaranspp/simpanvalidasi', [DatapembayaransppController::class, 'simpanValidasi']);

// Route master data sekolah
Route::post('/datasekolah/wilayah', [DatasekolahController::class, 'cariWilayah']);
Route::post('/datasekolah/store', [DatasekolahController::class, 'store']);
Route::get('/datasekolah/index', [DatasekolahController::class, 'getIndex']);
Route::get('/datasekolah/edit/{id}', [DatasekolahController::class, 'getEdit']);
Route::post('/datasekolah/update', [DatasekolahController::class, 'update']);
Route::get('/datasekolah/hapus/{id}', [DatasekolahController::class, 'destroy']);
Route::get('/datasekolah/show/{id}', [DatasekolahController::class, 'getShow']);

// Route Data Jurusan
Route::post('/datajurusan/store', [DatajurusanController::class, 'store']);
Route::post('/datajurusan/update', [DatajurusanController::class, 'update']);
Route::get('/datajurusan/index', [DatajurusanController::class, 'getIndex']);
Route::get('/datajurusan/hapus/{id}', [DatajurusanController::class, 'destroy']);

// Route data ruang kelas
Route::post('/dataruangkelas/store', [DataruangkelasController::class, 'store']);
Route::get('/dataruangkelas/index', [DataruangkelasController::class, 'getIndex']);
Route::post('/dataruangkelas/update', [DataruangkelasController::class, 'update']);
Route::get('/dataruangkelas/edit/{id}', [DataruangkelasController::class, 'getEdit']);
Route::get('/dataruangkelas/hapus/{id}', [DataruangkelasController::class, 'destroy']);

// Route data mata pelajaran
Route::post('/datamatapelajaran/store', [DatamatapelajaranController::class, 'store']);
Route::get('/datamatapelajaran/index', [DatamatapelajaranController::class, 'getIndex']);
Route::get('/datamatapelajaran/edit/{id}', [DatamatapelajaranController::class, 'getEdit']);
Route::post('/datamatapelajaran/update', [DatamatapelajaranController::class, 'update']);
Route::get('/datamatapelajaran/hapus/{id}', [DatamatapelajaranController::class, 'destroy']);

// Route Manajemen Role
Route::post('/datarole/store', [DataroleController::class, 'store']);
Route::post('/datarole/update', [DataroleController::class, 'update']);
Route::get('/datarole/index', [DataroleController::class, 'getIndex']);
Route::get('/datarole/edit/{id}', [DataroleController::class, 'getEdit']);
Route::get('/datarole/show/{id}', [DataroleController::class, 'getShow']);
Route::get('/datarole/hapus/{id}', [DataroleController::class, 'destroy']);

Route::post('/datasiswa/store', [DatasiswaController::class, 'store']);
Route::post('/datasiswa/update', [DatasiswaController::class, 'update']);
Route::get('/datasiswa/index', [DatasiswaController::class, 'getIndex']);
Route::get('/datasiswa/edit/{id}', [DatasiswaController::class, 'getEdit']);
Route::get('/datasiswa/show/{id}', [DatasiswaController::class, 'getShow']);
Route::get('/datasiswa/hapus/{id}', [DatasiswaController::class, 'destroy']);

Route::post('/dataguru/store', [DataguruController::class, 'store']);
Route::post('/dataguru/update', [DataguruController::class, 'update']);
Route::get('/dataguru/index', [DataguruController::class, 'getIndex']);
Route::get('/dataguru/edit/{id}', [DataguruController::class, 'getEdit']);
Route::get('/dataguru/showkeluarga/{id}', [DataguruController::class, 'getKeluarga']);
/**
 * INFO: parameter pertama itu url routenya, sementara yang di dalam array adalah Controller yang
 * berada di folder App\Http\Controllers lalu diikuti dengan nama fungsi yang akan dipanggil.
 */
require __DIR__ . '/auth.php';
