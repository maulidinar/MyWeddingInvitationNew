<?php

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

// Route::get('/', function () {
//     return redirect('/login');
//     // return view('welcome');
// });
// 

// auth
// Route::get('/login','AuthController@index')->name('auth');
// ticket


Route::get('/', 'FrontController@index')->name('index');
Route::get('/kehadiran-tamu/{code}', 'TamuController@kehadiran');
Route::get('/tulis-ucapan/{code}', 'TamuController@ucapan');
Route::post('/add-ucapan', 'TamuController@addUcapan');
Route::get('/test-undangan', 'TamuController@testUndangan');

Route::get('/test', 'FrontController@test');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
// frontend
Route::post('/redeem-code', 'FrontController@redeem')->name('redeem-code');
Route::get('/user-data', 'FrontController@userdata')->name('user-data');
Route::post('/user-save', 'FrontController@usersave');
Route::post('/user-payment', 'FrontController@payment')->name('user-payment');
Route::get('/user-payment-act', 'FrontController@paymentact')->name('user-payment-act');

Route::group(['middleware' => 'auth'], function () {
  Route::get('/dashboard', 'MainController@index')->name('dash');
  Route::get('logout', 'AuthController@logout')->name('logout');

  // Tamu
  Route::get('/tamu-list', 'TamuController@index')->name('tamu');
  Route::get('/list-tamu/{id}', 'TamuController@listTamu')->name('tamu-list');
  Route::get('/edit-tamu/{id}', 'TamuController@edit')->name('tamu-list');
  Route::post('/tamu-destroy', 'TamuController@destroy')->name('tamu-destroy');
  Route::post('/update-tamu', 'TamuController@doEdit')->name('tamu-destroy');
  Route::post('/tamu-add', 'TamuController@add');
  Route::get('/generate-qr/{code}', 'TamuController@genQR');
  // kehadiran tamu
  Route::get('/laporan-tamu', 'TamuController@laporan')->name('laporan-tamu');
  Route::get('/list-laporan-tamu/{id}', 'TamuController@laporanTamu');
  Route::get('/download-tamu/{id}', 'TamuController@DownloadlaporanTamu');
  // kirim undangan
  Route::get('/kirim-undangan', 'TamuController@kirimUndangan');
  Route::get('/kirim-foto-masal/{id}', 'TamuController@kirimFotoMasal');
  Route::get('/undangan-masal/{id}', 'TamuController@kirimUndanganMasal');

  // Fotograper
  Route::get('/fotograper', 'FotograperController@index')->name('fotograper');
  Route::get('/detail-album/{id}', 'FotograperController@album');
  Route::post('/upload-gambar', 'FotograperController@uploadGambar');
  Route::post('/gambar-destroy', 'FotograperController@hapusGambar');



  // roles
  Route::get('/roles-list', 'RolesController@index')->name('roles');
  Route::post('/role-destroy', 'RolesController@destroy')->name('role-destroy');
  Route::post('/role-add', 'RolesController@add');
  // Areas
  Route::get('/area-list', 'AreaController@index')->name('area');
  Route::post('/area-destroy', 'AreaController@destroy')->name('area-destroy');
  Route::post('/area-add', 'AreaController@add');

  // Badges
  Route::get('/badge-list', 'BadgeController@index')->name('badge');
  Route::get('/badge-detail', 'BadgeController@detail')->name('badge-detail');
  Route::post('/badge-store', 'BadgeController@store')->name('badge-save');
  Route::post('/badge-destroy', 'BadgeController@destroy')->name('badge-destroy');
  Route::get('/badge-print', 'BadgeController@print')->name('badge-print');
  Route::get('/badge-print-act', 'BadgeController@printact')->name('badge-print-act');

  // Undangan
  Route::get('/undangan-list', 'UndanganController@index')->name('undangan-list');
  Route::post('/add-undangan', 'UndanganController@add');
  Route::get('/edit-undangan/{id}', 'UndanganController@edit');
  Route::post('/update-undangan', 'UndanganController@update');
  Route::post('/undangan-destroy', 'UndanganController@destroy')->name('undangan-destroy');
  // template
  Route::get('/template-list', 'TemplateController@index')->name('template');
  Route::post('/add-template', 'TemplateController@add');
  Route::get('/edit-template/{id}', 'TemplateController@edit');
  Route::post('/update-template', 'TemplateController@update');
  Route::post('/template-destroy', 'TemplateController@destroy')->name('template-destroy');
});

Route::get('/undangan/{code}', 'TemplateController@undangan')->name('undangna');
Route::get('/undangan_temp/{code}', 'TemplateController@undangan_temp')->name('undangna');
