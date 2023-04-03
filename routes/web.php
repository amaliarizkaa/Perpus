<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
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
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('auth');
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
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel')->middleware('auth')->middleware('auth');
Route::post('/artikel/store', [ArtikelController::class, 'store'])->name('store')->middleware('auth');
Route::put('/artikel/edit/{id}', [ArtikelController::class, 'edit'])->middleware('auth');
Route::get('/artikel/delete/{id}', [ArtikelController::class, 'delete'])->middleware('auth');

// Artikel Kategori Route
Route::get('/kategoriart', [KategoriArtController::class, 'index'])->name('index')->middleware('auth');
Route::post('/kategoriart/store', [KategoriArtController::class, 'store'])->name('store')->middleware('auth');
// Route::match(['get', 'post'], '/kategoriart/edit/{id}', [KategoriArtController::class, 'edit']);
Route::put('/kategoriart/edit/{id}', [KategoriArtController::class, 'edit'])->middleware('auth');
Route::get('/kategoriart/delete/{id}', [KategoriArtController::class, 'delete'])->middleware('auth');

// Buku Route
Route::get('/buku', [BukuController::class, 'index'])->name('buku')->middleware('auth');
Route::post('/buku/store', [BukuController::class, 'store'])->name('store')->middleware('auth');
Route::put('/buku/edit/{id}', [BukuController::class, 'edit'])->middleware('auth');
Route::get('/buku/delete/{id}', [BukuController::class, 'delete'])->middleware('auth');

// Kategori Buku Route
Route::get('/buku/kategoribuk', [KategoriBukuController::class, 'index'])->name('index')->middleware('auth');
Route::post('/buku/kategoribuk/store', [KategoriBukuController::class, 'store'])->name('store')->middleware('auth');
Route::put('/buku/kategoribuk/edit/{id}', [KategoriBukuController::class, 'edit'])->middleware('auth');
Route::get('/buku/kategoribuk/delete/{id}', [KategoriBukuController::class, 'delete'])->middleware('auth');

// Genre Buku Route
Route::get('/buku/genre', [GenreController::class, 'index'])->name('index')->middleware('auth');
Route::post('/buku/genre/store', [GenreController::class, 'store'])->name('store')->middleware('auth');
Route::put('/buku/genre/edit/{id}', [GenreController::class, 'edit'])->middleware('auth');
Route::get('/buku/genre/delete/{id}', [GenreController::class, 'delete'])->middleware('auth');

// Slide Banner Route
// Route::get('/admin/daftar-banner', [BannerController::class, 'index'])->name('index')->middleware('auth');
// Route::post('/admin/daftar-banner/store', [BannerController::class, 'store'])->name('store')->middleware('auth');
// Route::put('/admin/daftar-banner/edit/{id}', [BannerController::class, 'edit'])->middleware('auth');
// Route::get('/admin/daftar-banner/delete/{id}', [BannerController::class, 'delete'])->middleware('auth');

// Karya Buku Route
Route::get('/admin/karya-buku', [KaryaBukuController::class, 'index'])->name('index')->middleware('auth');
Route::post('/admin/karya-buku/store', [KaryaBukuController::class, 'store'])->name('store')->middleware('auth');
Route::put('/admin/karya-buku/edit/{id}', [KaryaBukuController::class, 'edit'])->middleware('auth');
Route::get('/admin/karya-buku/delete/{id}', [KaryaBukuController::class, 'delete'])->middleware('auth');

// Karya Ilmiah Route
Route::get('/admin/karya-ilmiah', [KaryaTIController::class, 'index'])->name('index')->middleware('auth');
Route::post('/admin/karya-ilmiah/store', [KaryaTIController::class, 'store'])->name('store')->middleware('auth');
Route::put('/admin/karya-ilmiah/edit/{id}', [KaryaTIController::class, 'edit'])->middleware('auth');
Route::get('/admin/karya-ilmiah/delete/{id}', [KaryaTIController::class, 'delete'])->middleware('auth');

// Karya Terpublikasi
Route::get('/admin/karya-publikasi', [KaryaTPController::class, 'index'])->name('index')->middleware('auth');
Route::post('/admin/karya-publikasi/store', [KaryaTPController::class, 'store'])->name('store')->middleware('auth');
Route::put('/admin/karya-publikasi/edit/{id}', [KaryaTPController::class, 'edit'])->middleware('auth');
Route::get('/admin/karya-publikasi/delete/{id}', [KaryaTPController::class, 'delete'])->middleware('auth');

// Klipping
Route::get('/admin/klipping', [KlippingController::class, 'index'])->name('index')->middleware('auth');
Route::post('/admin/klipping/store', [KlippingController::class, 'store'])->name('store')->middleware('auth');
Route::put('/admin/klipping/edit/{id}', [KlippingController::class, 'edit'])->middleware('auth');
Route::get('/admin/klipping/delete/{id}', [KlippingController::class, 'delete'])->middleware('auth');

// Client Site Route
// Portal Berita Route
// Route::group(['prefix' => '', 'middleware' => ['counter']], function () {
// });

Route::get('/', [FrontendController::class, 'index'])->name('index')->middleware('counter');
Route::get('/artikel/{slug}', [FrontendController::class, 'detail_artikel'])->name('detail_artikel');
Route::get('/kategori/{slug}', [FrontendController::class, 'artikel_kategori'])->name('artikel_kategori');

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


//kliping
Route::get('/kliping', [FrontendController::class, 'kliping'])->name('kliping');
Route::get('/kliping/search', [FrontendController::class, 'search_klipping'])->name('search_klipping');


//karya
Route::get('/karya-buku', [FrontendController::class, 'karyabuku'])->name('karyabuku');
Route::get('/karya-buku/search', [FrontendController::class, 'search_buku'])->name('search_buku');
Route::get('/karya-buku/{slug}', [FrontendController::class, 'detail_karya_buku'])->name('detail_karya_buku');
Route::get('/karya-ilmiah', [FrontendController::class, 'karyailmiah'])->name('karyailmiah');
Route::get('/karya-ilmiah/search', [FrontendController::class, 'search_ilmiah'])->name('search_ilmiah');
Route::get('/karya-ilmiah/{slug}', [FrontendController::class, 'detail_karya_ilmiah'])->name('detail_karya_ilmiah');
Route::get('/karya-publikasi', [FrontendController::class, 'karyapublikasi'])->name('karyapublikasi');
Route::get('/karya-publikasi/search', [FrontendController::class, 'search_publikasi'])->name('search_publikasi');
Route::get('/karya-publikasi/{slug}', [FrontendController::class, 'detail_karya_publikasi'])->name('detail_karya_publikasi');
