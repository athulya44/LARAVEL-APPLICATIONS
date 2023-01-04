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
    Route::view('/', 'welcome');
    Auth::routes();

    Route::get('/login/frontend', 'App\Http\Controllers\Auth\LoginController@showLoginForm');
    Route::get('/login/backend', 'App\Http\Controllers\Auth\LoginController@showbackendLoginForm');
    Route::get('/register/frontend', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm');
    Route::get('/register/backend', 'App\Http\Controllers\Auth\RegisterController@showbackendRegisterForm');
  

    Route::post('/login/frontend', 'App\Http\Controllers\Auth\LoginController@frontendLogin');
    Route::post('/login/backend', 'App\Http\Controllers\Auth\LoginController@backendLogin');
    Route::post('/register/frontend', 'App\Http\Controllers\Auth\RegisterController@createfrontend');
    Route::post('/register/backend', 'App\Http\Controllers\Auth\RegisterController@createbackend');

    Route::view('/home', 'home')->middleware('auth');
    Route::view('/frontend', 'frontend');
    Route::view('/backend', 'backend');
    
    use App\Http\Controllers\productController;
    Route::resource('products', productController::class);
   
    Route::get('/logout', function () {
        return view('home');
    });
    Route::get('/file', function () {
        return view('images.create');
    }); 
    Route::get('/display', function () {
        return view('images.index');
    });
    Route::any('/index', [App\Http\Controllers\ProductController::class, 'index'])->name('images.index');
    Route::any('/collections', [App\Http\Controllers\ProductController::class, 'categories']);
             
    Route::any('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('images.create');
//multiimages
    Route::any('/forms', [App\Http\Controllers\FormController::class, 'create'])->name('create');
             
    Route::any('/form', [App\Http\Controllers\FormController::class, 'store'])->name('store');
    Route::any('/formedit', [App\Http\Controllers\FormController::class, 'edit'])->name('edit');
    Route::any('/formindex', [App\Http\Controllers\FormController::class, 'index'])->name('index');
    Route::any('/formshow', [App\Http\Controllers\FormController::class, 'show'])->name('show');
    Route::any('/formdelete', [App\Http\Controllers\FormController::class, 'delete'])->name('delete');
    Route::any('/formupdate', [App\Http\Controllers\FormController::class, 'update'])->name('update');

//
Route::get('/display', function () {
    return view('images.index');
});
Route::get('/display', function () {
    return view('productfrontend.index');
});
 ?>