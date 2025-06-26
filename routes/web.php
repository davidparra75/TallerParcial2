<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayController;


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

route::middleware(['auth'])->group(function (){
    route::get('pays', [PayController::class,'index'])->name('pays.index');
    route::delete('pays/{id}', [PayController::class,'destroy'])->name('pays.destroy');
    route::get('pays/{id}',[PayController::class,'edit'])->name('pays.edit');
    route::put('pays/{id}',[PayController::class,'update'])->name('pays.update');
    route::post('pays',[PayController::class,'store'])->name('pays.store');
});

Route::get('/menu', function () {
    return view('menu');
})->middleware('check.payment')->name('menu');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
