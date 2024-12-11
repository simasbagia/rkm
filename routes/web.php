<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginAdminController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

//Guest
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/informasi/{id}/{judul}', [App\Http\Controllers\HomeController::class, 'informasi'])->name('informasi');
// Route::get('/jurusan/{id}/{judul}', [App\Http\Controllers\HomeController::class, 'jurusan'])->name('jurusan');
Route::get('/link/{id}', [App\Http\Controllers\HomeController::class, 'link'])->name('link');

//User
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [App\Http\Controllers\UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/formulir-pdf', [App\Http\Controllers\UserDashboardController::class, 'formulirPDF'])->name('formulir-pdf');

    Route::get('/cetak-formulir', function () {
        return view('front.cetak-formulir');
    })->name('cetak-formulir');

    Route::get('/profil', function () {
        return view('front.profil');
    })->name('profil');

    Route::get('/pendaftaran', function () {
        return view('front.pendaftaran');
    })->name('pendaftaran');
});


//Auth Admin   
// Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/login', [LoginAdminController::class, 'login'])->name('admin.login.attemp');
// Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

//Admin
Route::group(['middleware' => 'auth', 'prefix' => '/admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/profil', function () {
        return view('admin.profil');
    })->name('profil');

    Route::get('/setting', function () {
        return view('admin.setting');
    })->name('setting');

    Route::get('/unit', function () {
        return view('admin.unit');
    })->name('unit');

 //   Route::get('/jurusan', function () {
   //     return view('admin.jurusan');
    // })->name('jurusan');

    Route::get('/periode', function () {
        return view('admin.periode');
    })->name('periode');

    Route::get('/jenjang', function () {
        return view('admin.jenjang');
    })->name('jenjang');

    Route::get('/kelas', function () {
        return view('admin.kelas');
    })->name('kelas');

    Route::get('/siswa', function () {
        return view('admin.siswa');
    })->name('siswa');
    
    Route::get('/warga', function () {
        return view('admin.warga');
    })->name('warga');

    Route::get('/pokmas', function () {
        return view('admin.pokmas');
    })->name('pokmas');

    Route::get('/monitoring', function () {
        return view('admin.monitoring');
    })->name('monitoring');

    Route::get('/informasi', function () {
        return view('admin.informasi');
    })->name('informasi');

    Route::get('/slide', function () {
        return view('admin.slide');
    })->name('slide');

    Route::get('/widget', function () {
        return view('admin.widget');
    })->name('widget');
    Route::get('/akun', function () {
        return view('admin.akun');
    })->name('akun');
    Route::get('/pendamping', function () {
        return view('admin.pendamping');
    })->name('pendamping');

    Route::get('/pendaftar', function () {
        return view('admin.pendaftar');
    })->name('pendaftar');
});
