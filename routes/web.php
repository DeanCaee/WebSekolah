<?php
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
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