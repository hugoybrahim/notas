<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoriesNotesController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[LoginController::class,'index']);

Route::get('/register',[RegisterController::class,'index'] )->name('register');
Route::post('/register',[RegisterController::class,'store'] );

Route::get('/login',[LoginController::class,'index'] )->name('login');
Route::post('/login',[LoginController::class,'store'] );
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::prefix('/notes')->group(function(){
    Route::get('/create',[NotasController::class,'create'])->name('notes.create');
    Route::get('/trash',[NotasController::class,'trash'])->name('notes.trash');
    Route::get('/index', [NotasController::class,'index'])->name('notes');
   //->missing(fn($request)=>response()->view(view:'errors.project-not-found'));
    Route::post('/store',[NotasController::class,'store'])->name('notes.store');
    Route::put('/update/{id}',[NotasController::class,'update'])->name('notes.update');
    Route::get('/edit/{id}',[NotasController::class,'edit'])->name('notes.edit');
    Route::post('/destroy/{id}',[NotasController::class,'destroy'])->name('notes.destroy');
    Route::post('/delete/{id}',[NotasController::class,'delete'])->name('notes.delete');
    Route::post('/addnewcategorie/{id}',[Notascontroller::class,'addCategorieNote'])->name('notes.addnew');
});

Route::prefix('/categories')->group(function(){
    Route::get('/index',[CategoriesController::class,'index'])->name('categories');
    Route::get('/create',[CategoriesController::class,'create'])->name('categories.create');
    Route::post('/store',[CategoriesController::class,'store'])->name('categories.store');
    Route::put('/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
    Route::get('/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
    Route::post('/destroy/{id}',[CategoriesController::class,'destroy'])->name('categories.destroy');
});

Route::post('/categorienote/delete/{id}',[CategoriesNotesController::class,'delete'])->name('categorienote');
