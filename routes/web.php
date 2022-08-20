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
Route::get('/', function () {
    return view('home');
});

Route::prefix('kan_teen')->group(function(){
	Route::get('/', [App\Http\Controllers\AppController::class, 'home'])->name('home');

	Route::prefix('seller')->group(function(){
		Route::get('/', [App\Http\Controllers\SellerController::class, 'sellerPage'])->name('seller');
		Route::get('/see-seller/{seller_id}/categories', [App\Http\Controllers\SellerController::class, 'seeSeller'])->name('see.seller');
	});

	Route::get('/categories', [App\Http\Controllers\AppController::class, 'categories'])->name('categories');

	Route::get('/categories/food/{seller_id}', [App\Http\Controllers\AppController::class, 'food'])->name('cat.food');
	Route::get('/categories/beverage/{seller_id}', [App\Http\Controllers\AppController::class, 'beverage'])->name('cat.beverage');
	Route::get('/categories/dessert{seller_id}', [App\Http\Controllers\AppController::class, 'dessert'])->name('cat.dessert');
	Route::get('/categories/snack/{seller_id}', [App\Http\Controllers\AppController::class, 'snack'])->name('cat.snack');
	Route::get('/status-order', [App\Http\Controllers\AppController::class, 'statusOrder'])->name('status.order');

	Route::prefix('auth')->group(function(){
		Route::get('/daftar/user', [App\Http\Controllers\SessionController::class, 'daftarUserPage'])->name('daftar.user.page');
		Route::post('/daftar/user', [App\Http\Controllers\SessionController::class, 'daftarUserAuth'])->name('daftar.user.auth');
		Route::get('/daftar/user/complete', [App\Http\Controllers\SessionController::class, 'daftarUserCompletePage'])->name('daftar.user.complete.page');
		Route::post('/daftar/user/complete', [App\Http\Controllers\SessionController::class, 'daftarUserComplete'])->name('daftar.user.complete');

		Route::get('/daftar/seller', [App\Http\Controllers\SessionController::class, 'daftarSellerPage'])->name('daftar.seller.page');
		Route::post('/daftar/seller', [App\Http\Controllers\SessionController::class, 'daftarSellerAuth'])->name('daftar.seller.auth');
		Route::get('/daftar/seller/complete', [App\Http\Controllers\SessionController::class, 'daftarSellerCompletePage'])->name('daftar.seller.complete.page');
		Route::post('/daftar/seller/complete', [App\Http\Controllers\SessionController::class, 'daftarSellerComplete'])->name('daftar.seller.complete');
		Route::get('/keluar', [App\Http\Controllers\SessionController::class, 'keluar'])->name('keluar');
		Route::get('/masuk', [App\Http\Controllers\SessionController::class, 'masuk'])->name('masuk');
		Route::post('/masuk', [App\Http\Controllers\SessionController::class, 'masukAuth'])->name('masuk.auth');
	});

	Route::prefix('cart')->group(function(){
		Route::get('/add/{id_produk}/{nama_produk}/{harga}/{seller}', [App\Http\Controllers\ShoppingCartController::class, 'keepProduct'])->name('keep.product');
		Route::get('/view', [App\Http\Controllers\ShoppingCartController::class, 'viewCart'])->name('view.cart');
		Route::get('/delete/item/{id}', [App\Http\Controllers\ShoppingCartController::class, 'deleteItem'])->name('delete.item');
	});

	Route::prefix('dapur')->group(function(){
		Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.home');
		Route::get('/products', [App\Http\Controllers\DashboardController::class, 'index'])->name('products');
		Route::get('/orders', [App\Http\Controllers\DashboardController::class, 'myOrder'])->name('orders');
		Route::get('/add', [App\Http\Controllers\DashboardController::class, 'addProduct'])->name('add.product');
		Route::post('/store', [App\Http\Controllers\DashboardController::class, 'storeProduct'])->name('store.product');
		Route::get('/delete/{id_produk}', [App\Http\Controllers\DashboardController::class, 'deleteProduct'])->name('delete.product');
		Route::post('/update/{id}', [App\Http\Controllers\DashboardController::class, 'updateProduct'])->name('update.product');
	});

	Route::prefix('order')->group(function(){
		Route::post('/submit', [App\Http\Controllers\OrderController::class, 'submitOrder'])->name('submit.order');
		Route::get('/cook/{id}', [App\Http\Controllers\OrderController::class, 'cook'])->name('cook');
		Route::get('/finish/{id}', [App\Http\Controllers\OrderController::class, 'finish'])->name('finish');
		Route::get('/tolak/{id}', [App\Http\Controllers\OrderController::class, 'tolakPesanan'])->name('tolak.pesanan');
	});
});
