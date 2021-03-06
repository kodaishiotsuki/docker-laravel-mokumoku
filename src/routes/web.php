<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
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

//一覧画面
Route::get('/', [EventController::class, 'index'])->name('event.index');


//登録画面
Route::get('/event/register', [EventController::class, 'register'])->name('event.register');

//登録処理
Route::post('/event/create', [EventController::class, 'create'])->name('event.create');

//詳細画面
Route::get('/event/{id}', [EventController::class, 'show'])->name('event.show');

//編集画面
Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');

//編集処理
Route::post('/event/update', [EventController::class, 'update'])->name('event.update');

//削除処理
Route::post('/event/delete/{id}', [EventController::class, 'delete'])->name('event.delete');

//カテゴリー一覧画面
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
