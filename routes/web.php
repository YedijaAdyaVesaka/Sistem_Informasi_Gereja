<?php

use App\Http\Controllers\JemaatController;
use App\Models\Jemaat;
use Illuminate\Support\Facades\Auth;
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

/*Tampilan Awal buka PHP Artisan Serve*/
Route::get('/', function () {
    return redirect()->route("login");
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/master', function () {
	return view('layouts/master');
})->name('master');

// Route Jemaat
Route::get('/jemaat', [App\Http\Controllers\JemaatController::class, 'index'])->name('jemaat');
Route::get('/jemaat-entry', function () {
	return view('jemaat/jemaat-entry');
})->name('jemaat-entry');
Route::POST('/jemaat-store', [App\Http\Controllers\JemaatController::class, 'store'])->name('jemaat.store');
Route::GET('/jemaat-edit/{id}', [App\Http\Controllers\JemaatController::class, 'edit'])->name('jemaat.edit');
Route::POST('/jemaat-update', [App\Http\Controllers\JemaatController::class, 'update'])->name('jemaat.update');
Route::GET('/jemaat-destroy/{id}', [App\Http\Controllers\JemaatController::class, 'destroy'])->name('jemaat.destroy');
Route::get('/jemaat-pdf', [App\Http\Controllers\JemaatController::class, 'exportpdf']);


// Route Pendeta
Route::get('/pendeta', [App\Http\Controllers\PendetaController::class, 'index'])->name('pendeta');
Route::get('/pendeta-entry', function () {
	return view('pendeta/pendeta-entry');
})->name('pendeta-entry');
Route::POST('/pendeta-store', [App\Http\Controllers\PendetaController::class, 'store'])->name('pendeta.store');
Route::GET('/pendeta-edit/{id}', [App\Http\Controllers\PendetaController::class, 'edit'])->name('pendeta.edit');
Route::POST('/pendeta-update', [App\Http\Controllers\PendetaController::class, 'update'])->name('pendeta.update');
Route::GET('/pendeta-destroy/{id}', [App\Http\Controllers\PendetaController::class, 'destroy'])->name('pendeta.destroy');
Route::get('/pendeta-pdf', [App\Http\Controllers\PendetaController::class, 'exportpdf']);

//Route Majelis
Route::get('/majelis', [App\Http\Controllers\MajelisController::class, 'index'])->name('majelis');
Route::get('/majelis-entry', function () {
	return view('majelis/majelis-entry');
})->name('majelis-entry');
Route::POST('/majelis-store', [App\Http\Controllers\MajelisController::class, 'store'])->name('majelis.store');
Route::GET('/majelis-edit/{id}', [App\Http\Controllers\MajelisController::class, 'edit'])->name('majelis.edit');
Route::POST('/majelis-update', [App\Http\Controllers\MajelisController::class, 'update'])->name('majelis.update');
Route::GET('/majelis-destroy/{id}', [App\Http\Controllers\MajelisController::class, 'destroy'])->name('majelis.destroy');
Route::get('/majelis-pdf', [App\Http\Controllers\MajelisController::class, 'exportpdf']);

//Route Pelayan
Route::get('/pelayan', [App\Http\Controllers\PelayanController::class, 'index'])->name('pelayan');
Route::get('/pelayan-entry', [App\Http\Controllers\PelayanController::class, 'show'])->name('pelayan.show');
Route::POST('/pelayan-store', [App\Http\Controllers\PelayanController::class, 'store'])->name('pelayan.store');
Route::get('/pelayan-edit/{id}', [App\Http\Controllers\PelayanController::class, 'edit'])->name('pelayan.edit');
Route::POST('/pelayan-update', [App\Http\Controllers\PelayanController::class, 'update'])->name('pelayan.update');
Route::GET('/pelayan-destroy/{id}', [App\Http\Controllers\PelayanController::class, 'destroy'])->name('pelayan.destroy');
Route::get('/pelayan-pdf', [App\Http\Controllers\PelayanController::class, 'exportpdf']);

//Route Pernikahan
Route::get('/pernikahan', [App\Http\Controllers\PernikahanController::class, 'index'])->name('pernikahan');
Route::get('/pernikahan-entry', [App\Http\Controllers\PernikahanController::class, 'show'])->name('pernikahan.show');
Route::POST('/pernikahan-store', [App\Http\Controllers\PernikahanController::class, 'store'])->name('pernikahan.store');
Route::get('/pernikahan-edit/{id}', [App\Http\Controllers\PernikahanController::class, 'edit'])->name('pernikahan.edit');
Route::POST('/pernikahan-update', [App\Http\Controllers\PernikahanController::class, 'update'])->name('pernikahan.update');
Route::GET('/pernikahan-destroy/{id}', [App\Http\Controllers\PernikahanController::class, 'destroy'])->name('pernikahan.destroy');
Route::get('/pernikahan-pdf', [App\Http\Controllers\PernikahanController::class, 'exportpdf']);
// Route::get('/pernikahan-entry', function () {
// 	return view('pernikahan/pernikahan-entry');
// })->name('pernikahan-entry');

//Route Baptis
Route::get('/baptis', [App\Http\Controllers\BaptisController::class, 'index'])->name('baptis');
Route::get('/baptis-entry', [App\Http\Controllers\BaptisController::class, 'show'])->name('baptis.show');
Route::POST('/baptis-store', [App\Http\Controllers\BaptisController::class, 'store'])->name('baptis.store');
Route::get('/baptis-edit/{id}', [App\Http\Controllers\BaptisController::class, 'edit'])->name('baptis.edit');
Route::POST('/baptis-update', [App\Http\Controllers\BaptisController::class, 'update'])->name('baptis.update');
Route::GET('/baptis-destroy/{id}', [App\Http\Controllers\BaptisController::class, 'destroy'])->name('baptis.destroy');
Route::get('/baptis-pdf', [App\Http\Controllers\BaptisController::class, 'exportpdf']);



//Route Renungan
Route::get('/renungan', [App\Http\Controllers\RenunganController::class, 'index'])->name('renungan');
Route::get('/renungan-entry', [App\Http\Controllers\RenunganController::class, 'show'])->name('renungan.show');
Route::POST('/renungan-store', [App\Http\Controllers\RenunganController::class, 'store'])->name('renungan.store');
Route::get('/renungan-edit/{id}', [App\Http\Controllers\RenunganController::class, 'edit'])->name('renungan.edit');
Route::POST('/renungan-update', [App\Http\Controllers\RenunganController::class, 'update'])->name('renungan.update');
Route::GET('/renungan-destroy/{id}', [App\Http\Controllers\RenunganController::class, 'destroy'])->name('renungan.destroy');
Route::get('/renungan-pdf', [App\Http\Controllers\RenunganController::class, 'exportpdf']);

//Route Jadwal Ibadah
Route::get('/jadwal', [App\Http\Controllers\JadwalController::class, 'index'])->name('jadwal');
Route::get('/jadwal-entry', [App\Http\Controllers\JadwalController::class, 'show'])->name('jadwal.show');
Route::get('/jadwal-edit/{id}', [App\Http\Controllers\JadwalController::class, 'edit'])->name('jadwal.edit');
Route::POST('/jadwal-update', [App\Http\Controllers\JadwalController::class, 'update'])->name('jadwal.update');
Route::POST('/jadwal-store', [App\Http\Controllers\JadwalController::class, 'store'])->name('jadwal.store');
Route::GET('/jadwal-destroy/{id}', [App\Http\Controllers\JadwalController::class, 'destroy'])->name('jadwal.destroy');
Route::get('/jadwal-pdf', [App\Http\Controllers\JadwalController::class, 'exportpdf']);


//Route Kebaktian
Route::get('/kebaktian', [App\Http\Controllers\KebaktianController::class, 'index'])->name('kebaktian');
Route::get('/kebaktian-entry', [App\Http\Controllers\KebaktianController::class, 'show'])->name('kebaktian.show');
Route::get('/kebaktian-edit/{id}', [App\Http\Controllers\KebaktianController::class, 'edit'])->name('kebaktian.edit');
Route::POST('/kebaktian-update', [App\Http\Controllers\KebaktianController::class, 'update'])->name('kebaktian.update');
Route::POST('/kebaktian-store', [App\Http\Controllers\KebaktianController::class, 'store'])->name('kebaktian.store');
Route::GET('/kebaktian-destroy/{id}', [App\Http\Controllers\KebaktianController::class, 'destroy'])->name('kebaktian.destroy');
Route::get('/kebaktian-pdf', [App\Http\Controllers\KebaktianController::class, 'exportpdf']);
