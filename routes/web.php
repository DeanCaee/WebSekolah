<?php
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TransactionController;
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
    return view('welcome');
});
//crud categories
Route::get('/categories',[CategoriesController::class,'index'])->name('categories.index');
Route::get('/categories/create',[CategoriesController::class,'create'])->name('categories.create');
Route::post('/categories',[CategoriesController::class,'store'])->name('categories.store');
Route::get('/categories/{id}/edit',[CategoriesController::class,'edit'])->name('categories.edit');
Route::put('/categories/{id}/update',[CategoriesController::class,'update'])->name('categories.update');
Route::delete('/categories/{id}',[CategoriesController::class,'destroy'])->name('categories.destroy');

//crud customers
Route::get('/customers',[CustomersController::class,'index'])->name('customers.index');
Route::get('/customers/create',[CustomersController::class,'create'])->name('customers.create');
Route::post('/customers',[CustomersController::class,'store'])->name('customers.store');
Route::get('/customers/{id}/edit',[CustomersController::class,'edit'])->name('customers.edit');
Route::put('/customers/{id}/update',[CustomersController::class,'update'])->name('customers.update');
Route::delete('/customers/{id}',[CustomersController::class,'destroy'])->name('customers.destroy');

//crud products
Route::get('/products',[ProductsController::class,'index'])->name('products.index');
Route::get('/products/create',[ProductsController::class,'create'])->name('products.create');
Route::post('/products',[ProductsController::class,'store'])->name('products.store');
Route::get('/products/{id}/edit',[ProductsController::class,'edit'])->name('products.edit');
Route::put('/products/{id}/update',[ProductsController::class,'update'])->name('products.update');
Route::delete('/products/{id}',[ProductsController::class,'destroy'])->name('products.destroy');

//crud users
Route::get('/users',[UsersController::class,'index'])->name('users.index');
Route::get('/users/create',[UsersController::class,'create'])->name('users.create');
Route::post('/users',[UsersController::class,'store'])->name('users.store');
Route::get('/users/{id}/edit',[UsersController::class,'edit'])->name('users.edit');
Route::put('/users/{id}/update',[UsersController::class,'update'])->name('users.update');
Route::delete('/users/{id}',[UsersController::class,'destroy'])->name('users.destroy');

//crud transaction
Route::get('/transactions',[TransactionController::class,'index'])->name('transactions.index');
Route::get('/transactions/create',[TransactionController::class,'create'])->name('transactions.create');
Route::post('/transactions',[TransactionController::class,'store'])->name('transactions.store');
Route::get('/transactions/{id}/edit',[TransactionController::class,'edit'])->name('transactions.edit');
Route::put('/transactions/{id}/update',[TransactionController::class,'update'])->name('transactions.update');
Route::delete('/transactions/{id}',[TransactionController::class,'destroy'])->name('transactions.destroy');