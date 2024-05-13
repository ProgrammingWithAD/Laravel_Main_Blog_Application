<?php

use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('register',[UserController::class,'index']);
Route::post('register',[UserController::class,'store'])->name("register");
Route::get('login',[LoginController::class,'index']);
Route::post('login',[LoginController::class,'login'])->name("login");
Route::get('/dashboard', function () {
    return view('dashboard')->with('title','Dashboard');
})->middleware('auth')->name('dashboard');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::get('/blog-add',[BlogController::class,'index'])->middleware('auth');
Route::post('/blog-add',[BlogController::class,'store'])->name('blog-add');
Route::get('/category',[BlogCategoryController::class,'index'])->middleware('auth');
Route::post('/category',[BlogCategoryController::class,'store'])->name('category');
Route::post('/category-show',[BlogCategoryController::class,'show'])->name('category-show');
Route::post('/fileupload',[FileUploadController::class,'ckupload'])->name('fileupload');
Route::get('/generate_uri',[BlogController::class,'generatePrettyURL'])->name('generate_uri');
Route::get('/blog-list',[BlogController::class,'blog_list_index'])->middleware('auth');
Route::post('/blog-list',[BlogController::class,'show'])->name('blog-list');
Route::get('/blog/delete/{id}', [BlogController::class, 'deleteRow'])->name('blog.delete');






