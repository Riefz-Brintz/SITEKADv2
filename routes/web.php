<?php

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
Route::get('/layout', function(){
	return view('admin.dasboard');
})->name('layout');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    //


Route::get('/settingperusahaan', 'settingperusahaanController@index')->name('settingperusahaan');
Route::get('/settingperusahaan/add', 'settingperusahaanController@create')->name('settingperusahaan.tambah');
Route::get('/settingperusahaan/{id}/edit', 'settingperusahaanController@edit')->name('settingperusahaan.ubah');
Route::get('/settingperusahaan/hapus/{id}', 'settingperusahaanController@destroy')->name('settingperusahaan.hapus');
Route::post('/settingperusahaan/{id}/edit', 'settingperusahaanController@update')->name('settingperusahaan.ubahdata');
Route::post('/settingperusahaan/add', 'settingperusahaanController@store')->name('settingperusahaan.simpandata');


Route::get('/Tad', 'TadController@index')->name('Tad');
Route::post('/Tadlist', 'TadController@TadList')->name('Tadlist');
Route::get('/Tad/add', 'TadController@create')->name('Tad.tambah');
Route::get('/Tad/{id}/edit', 'TadController@edit')->name('Tad.ubah');
Route::get('/Tad/hapus/{id}', 'TadController@destroy')->name('Tad.hapus');
Route::post('/Tad/{id}/edit', 'TadController@update')->name('Tad.ubahdata');
Route::post('/Tad/add', 'TadController@store')->name('Tad.simpandata');
Route::post('/Tad/export', 'TadController@export')->name('Tad.export');
Route::get('/getKota/{id}', 'TadController@getKota')->name('Tad.getkota');
Route::get('/getProvinsi/{id}', 'TadController@getProvinsi')->name('Tad.getprovinsi');
Route::get('/getFaskes/{id}', 'TadController@getFaskes')->name('Tad.getfaskes');
Route::get('/getProviderAsuransi/{id}', 'TadController@getProviderAsuransi')->name('Tad.getProviderAsuransi');
Route::get('/getProgramAsuransi/{id}', 'TadController@getProgramAsuransi')->name('Tad.getProgramAsuransi');
Route::get('/getBank/{id}', 'TadController@getBank')->name('Tad.getBank');

Route::get('/User', 'UserController@index')->name('User');
Route::get('/User/add', 'UserController@create')->name('User.tambah');
Route::get('/User/{id}/edit', 'UserController@edit')->name('User.ubah');
Route::get('/User/hapus/{id}', 'UserController@destroy')->name('User.hapus');
Route::post('/User/{id}/edit', 'UserController@update')->name('User.ubahdata');
Route::post('/User/add', 'UserController@store')->name('User.simpandata');
Route::post('/User/export', 'UserController@export')->name('User.export');
Route::get('/getRole/{id}', 'UserController@getRole')->name('User.getrole');
Route::get('/getCabang/{id}', 'UserController@getCabang')->name('User.getcabang');

Route::get('/Role', 'RoleController@index')->name('Role');
Route::get('/Role/add', 'RoleController@create')->name('Role.tambah');
Route::get('/Role/{id}/edit', 'RoleController@edit')->name('Role.ubah');
Route::get('/Role/hapus/{id}', 'RoleController@destroy')->name('Role.hapus');
Route::post('/Role/{id}/edit', 'RoleController@update')->name('Role.ubahdata');
Route::post('/Role/add', 'RoleController@store')->name('Role.simpandata');
Route::post('/Role/export', 'RoleController@export')->name('Role.export');
Route::get('/getMenu/{id}', 'RoleController@getMenu')->name('Role.getmenu');
Route::get('/Role/tampil_data_role','RoleController@tampil_data_role')->name('tampil_data_role');







Route::get('/Barang', 'BarangController@index')->name('Barang');
Route::get('/Barang/add', 'BarangController@create')->name('Barang.tambah');
Route::get('/Barang/{id}/edit', 'BarangController@edit')->name('Barang.ubah');
Route::get('/Barang/hapus/{id}', 'BarangController@destroy')->name('Barang.hapus');
Route::post('/Barang/{id}/edit', 'BarangController@update')->name('Barang.ubahdata');
Route::post('/Barang/add', 'BarangController@store')->name('Barang.simpandata');
Route::post('/Barang/export', 'BarangController@export')->name('Barang.export');



Route::get('/Customer', 'CustomerController@index')->name('Customer');
Route::get('/Customer/add', 'CustomerController@create')->name('Customer.tambah');
Route::get('/Customer/{id}/edit', 'CustomerController@edit')->name('Customer.ubah');
Route::get('/Customer/hapus/{id}', 'CustomerController@destroy')->name('Customer.hapus');
Route::post('/Customer/{id}/edit', 'CustomerController@update')->name('Customer.ubahdata');
Route::post('/Customer/add', 'CustomerController@store')->name('Customer.simpandata');

Route::get('/Satuan', 'SatuanController@index')->name('Satuan');
Route::get('/Satuan/add', 'SatuanController@create')->name('Satuan.tambah');
Route::get('/Satuan/{id}/edit', 'SatuanController@edit')->name('Satuan.ubah');
Route::get('/Satuan/hapus/{id}', 'SatuanController@destroy')->name('Satuan.hapus');
Route::post('/Satuan/{id}/edit', 'SatuanController@update')->name('Satuan.ubahdata');
Route::post('/Satuan/add', 'SatuanController@store')->name('Satuan.simpandata');

Route::get('/Supplier', 'SupplierController@index')->name('Supplier');
Route::get('/Supplier/add', 'SupplierController@create')->name('Supplier.tambah');
Route::get('/Supplier/{id}/edit', 'SupplierController@edit')->name('Supplier.ubah');
Route::get('/Supplier/hapus/{id}', 'SupplierController@destroy')->name('Supplier.hapus');
Route::post('/Supplier/{id}/edit', 'SupplierController@update')->name('Supplier.ubahdata');
Route::post('/Supplier/add', 'SupplierController@store')->name('Supplier.simpandata');


Route::get('/Penjualan', 'PenjualanController@index')->name('Penjualan');
Route::get('/Penjualan/add', 'PenjualanController@create')->name('Penjualan.tambah');
Route::get('/Penjualan/{id}/edit', 'PenjualanController@edit')->name('Penjualan.ubah');
Route::get('/Penjualan/hapus/{id}', 'PenjualanController@destroy')->name('Penjualan.hapus');
Route::post('/Penjualan/{id}/edit', 'PenjualanController@update')->name('Penjualan.ubahdata');
Route::post('/Penjualan/add', 'PenjualanController@store')->name('Penjualan.simpandata');

Route::get('/Pembelian', 'PembelianController@index')->name('Pembelian');
Route::get('/Pembelian/add', 'PembelianController@create')->name('Pembelian.tambah');
Route::get('/Pembelian/{id}/edit', 'PembelianController@edit')->name('Pembelian.ubah');
Route::get('/Pembelian/hapus/{id}', 'PembelianController@destroy')->name('Pembelian.hapus');
Route::post('/Pembelian/{id}/edit', 'PembelianController@update')->name('Pembelian.ubahdata');
Route::post('/Pembelian/add', 'PembelianController@store')->name('Pembelian.simpandata');

});
// Route::resource('/kuda', 'SatuanController');
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
