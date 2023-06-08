<?php

use App\Http\Controllers\DaftarSeminarController;
use App\Http\Controllers\DaftarSidangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\UserController;
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

Route::get('/', fn () => redirect()->route('login'));

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profil');
    Route::post('/updateprofile', [UserController::class, 'updateProfile'])->name('update.profil');
    Route::get('/password', [UserController::class, 'password'])->name('user.password');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update.password');
    Route::get('/dashboard', [DashboardController::class, 'indexSidang'])->name('dashboard.sidang');
});

Route::group(['prefix' => '/datamaster', 'middleware' => 'ceklevel:1'], function () {

    Route::get('/dashboard', [DashboardController::class, 'indexData'])->name('dashboard.datamaster');
    // CRUD mahasiswa
    Route::get('/mahasiswa/index', [UserController::class, 'indexMahasiswa'])->name('mahasiswa.index');
    Route::get('/mahasiswa/data', [UserController::class, 'dataMahasiswa'])->name('mahasiswa.data');
    Route::post('/mahasiswa/store', [UserController::class, 'storeMahasiswa'])->name('mahasiswa.store');
    Route::get('/mahasiswa/show/{id}', [UserController::class, 'showMahasiswa'])->name('mahasiswa.show');
    Route::get('/mahasiswa/edit/{id}', [UserController::class, 'editMahasiswa'])->name('mahasiswa.edit');
    Route::post('/mahasiswa/update/{id}', [UserController::class, 'updateMahasiswa'])->name('mahasiswa.update');
    Route::post('/mahasiswa/delete/{id}', [UserController::class, 'deleteMahasiswa'])->name('mahasiswa.destroy');
    Route::post('/mahasiswa/delete_selected', [UserController::class, 'deleteSelectedMahasiswa'])->name('mahasiswa.delete-selected');
    Route::get('/mahasiswa/page/import', [UserController::class, 'importPageMhs'])->name('mahasiswa.import-page');
    Route::post('/mahasiswa/import', [UserController::class, 'importMhs'])->name('mahasiswa.import');
    // CRUD admin
    Route::get('/admin/index', [UserController::class, 'indexAdmin'])->name('admin.index');
    Route::get('/admin/data', [UserController::class, 'dataAdmin'])->name('admin.data');
    Route::post('/admin/store', [UserController::class, 'storeAdmin'])->name('admin.store');
    Route::get('/admin/show/{id}', [UserController::class, 'showAdmin'])->name('admin.show');
    Route::get('/admin/edit/{id}', [UserController::class, 'editAdmin'])->name('admin.edit');
    Route::post('/admin/update/{id}', [UserController::class, 'updateAdmin'])->name('admin.update');
    Route::post('/admin/delete/{id}', [UserController::class, 'deleteAdmin'])->name('admin.destroy');
    Route::post('/admin/delete/selected', [UserController::class, 'deleteSelectedAdmin'])->name('admin.delete-selected');
    // CRUD dosen
    Route::get('/dosen/index', [UserController::class, 'indexDosen'])->name('dosen.index');
    Route::get('/dosen/data', [UserController::class, 'dataDosen'])->name('dosen.data');
    Route::post('/dosen/store', [UserController::class, 'storeDosen'])->name('dosen.store');
    Route::get('/dosen/show/{id}', [UserController::class, 'showDosen'])->name('dosen.show');
    Route::get('/dosen/edit/{id}', [UserController::class, 'editDosen'])->name('dosen.edit');
    Route::post('/dosen/update/{id}', [UserController::class, 'updateDosen'])->name('dosen.update');
    Route::get('/dosen/delete/{id}', [UserController::class, 'deleteDosen'])->name('dosen.destroy');
    Route::post('/dosen/delete/selected', [UserController::class, 'deleteSelectedDosen'])->name('dosen.delete-selected');
    Route::get('/dosen/page/import', [UserController::class, 'importPageDosen'])->name('dosen.import-page');
    Route::post('/dosen/import', [UserController::class, 'importDosen'])->name('dosen.import');
    // CRUD SEMESTER
    Route::get('/semester/index', [SemesterController::class, 'index'])->name('semester.index');
    Route::get('/semester/data', [SemesterController::class, 'data'])->name('semester.data');
    Route::post('/semester/store', [SemesterController::class, 'store'])->name('semester.store');
    Route::get('/semester/edit/{id}', [SemesterController::class, 'edit'])->name('semester.edit');
    Route::post('/semester/update/{id}', [SemesterController::class, 'update'])->name('semester.update');
    Route::post('/semester/{id}/delete', [SemesterController::class, 'delete'])->name('semester.destroy');
    // CRUD tahun ajaran
    Route::get('/tahunajaran/index', [TahunAjaranController::class, 'index'])->name('tahunajaran.index');
    Route::get('/tahunajaran/data', [TahunAjaranController::class, 'data'])->name('tahunajaran.data');
    Route::post('/tahunajaran/store', [TahunAjaranController::class, 'store'])->name('tahunajaran.store');
    Route::get('/tahunajaran/edit/{id}', [TahunAjaranController::class, 'edit'])->name('tahunajaran.edit');
    Route::post('/tahunajaran/update/{id}', [TahunAjaranController::class, 'update'])->name('tahunajaran.update');
    Route::get('/tahunajaran/delete/{id}', [TahunAjaranController::class, 'delete'])->name('tahunajaran.destroy');
});

Route::group(['prefix' => '/dokumentasi_sidang', 'middleware' => 'ceklevel:3'], function () {
    Route::get('seminar/ti', [DaftarSeminarController::class, 'indexTi'])->name('seminar_ti.index');
    Route::get('daftar/seminar/ti', [DaftarSeminarController::class, 'daftarTi'])->name('seminar_ti.daftar');
    Route::post('store/seminar/ti', [DaftarSeminarController::class, 'storeTi'])->name('seminar_ti.store');
    Route::post('show/seminar/ti', [DaftarSeminarController::class, 'showTi'])->name('seminar_ti.show');
    Route::get('seminar/tmb', [DaftarSeminarController::class, 'indexTmb'])->name('seminar_tmb.index');
    Route::get('seminar/pwk', [DaftarSeminarController::class, 'indexPwk'])->name('seminar_pwk.index');
    Route::get('sidang/ti', [DaftarSidangController::class, 'indexTi'])->name('sidang_ti.index');
    Route::get('sidang/tmb', [DaftarSidangController::class, 'indexTmb'])->name('sidang_tmb.index');
    Route::get('sidang/pwk', [DaftarSidangController::class, 'indexPwk'])->name('sidang_pwk.index');
});





// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
