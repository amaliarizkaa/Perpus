<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriArtController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KategoriBukuController;
use App\Http\Controllers\KaryaBukuController;
use App\Http\Controllers\KaryaTIController;
use App\Http\Controllers\KaryaTPController;
use App\Http\Controllers\KlippingController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfilController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Server Side Route
// Login Route
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

// Home Route
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth');

// Register Route
Route::get('/register-undo', [RegisterController::class, 'index'])->middleware('auth');
Route::post('/register-undo/store', [RegisterController::class, 'store']);

// Admin Route
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');
Route::get('/admin/delete/{id}', [AdminController::class, 'delete'])->middleware('auth');
Route::match(['get', 'post'], '/admin/edit/{id}', [AdminController::class, 'edit'])->middleware('auth');

// Artikel Route
Route::get('/berita', [BeritaController::class, 'index'])->name('berita')->middleware('auth')->middleware('auth');
Route::post('/berita/store', [BeritaController::class, 'store'])->name('store')->middleware('auth');
Route::put('/berita/edit/{id}', [BeritaController::class, 'edit'])->middleware('auth');
Route::get('/berita/delete/{id}', [BeritaController::class, 'delete'])->middleware('auth');



// Buku Route
Route::get('/buku', [BukuController::class, 'index'])->name('buku')->middleware('auth');
Route::post('/buku/store', [BukuController::class, 'store'])->name('store')->middleware('auth');
Route::put('/buku/edit/{id}', [BukuController::class, 'edit'])->middleware('auth');
Route::get('/buku/delete/{id}', [BukuController::class, 'delete'])->middleware('auth');


// Slide Banner Route
// Route::get('/admin/daftar-banner', [BannerController::class, 'index'])->name('index')->middleware('auth');
// Route::post('/admin/daftar-banner/store', [BannerController::class, 'store'])->name('store')->middleware('auth');
// Route::put('/admin/daftar-banner/edit/{id}', [BannerController::class, 'edit'])->middleware('auth');
// Route::get('/admin/daftar-banner/delete/{id}', [BannerController::class, 'delete'])->middleware('auth');

// Profil
Route::get('/admin/profil', [ProfilController::class, 'index'])->name('index')->middleware('auth');
Route::post('/admin/profil/store', [ProfilController::class, 'store'])->name('store')->middleware('auth');
Route::put('/admin/profil/edit/{id}', [ProfilController::class, 'edit'])->middleware('auth');
Route::get('/admin/profil/delete/{id}', [ProfilController::class, 'delete'])->middleware('auth');

// Client Site Route
// Portal Berita Route
// Route::group(['prefix' => '', 'middleware' => ['counter']], function () {
// });

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/berita/{slug}', [FrontendController::class, 'detail_berita'])->name('detail_berita');
Route::get('/kategori/{slug}', [FrontendController::class, 'berita_kategori'])->name('berita_kategori');

// Katalog Buku Route
Route::get('/katalog', [FrontendController::class, 'katalog'])->name('katalog');
Route::get('/katalog/search', [FrontendController::class, 'search_katalog'])->name('search_katalog');
Route::get('/katalog/{slug}', [FrontendController::class, 'detail_katalog'])->name('detail_katalog');
// Route::get('/katalog/search', [FrontendController::class, 'searchBook'])->name('searchBook');


//profil
Route::get('/profil', [FrontendController::class, 'profil'])->name('profil');
Route::get('/visimisi', [FrontendController::class, 'visimisi'])->name('visimisi');
Route::get('/prestasi', [FrontendController::class, 'prestasi'])->name('prestasi');
Route::get('/layanan', [FrontendController::class, 'layanan'])->name('layanan');
Route::get('/fasilitas', [FrontendController::class, 'fasilitas'])->name('fasilitas');
Route::get('/promosi', [FrontendController::class, 'promosi'])->name('promosi');
Route::get('/tatatertib', [FrontendController::class, 'tatatertib'])->name('tatatertib');
