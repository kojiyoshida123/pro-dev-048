<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

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
    return view('login');
});

//// 一般ユーザー ////

//ログイン画面へ遷移
Route::get('/login', [UserController::class, 'login'])->name('user.login');
//ユーザー登録画面へ遷移
Route::get('/register', [UserController::class, 'register'])->name('user.register');
//会員情報のデータベースへの登録。
Route::post('/userStore', [UserController::class, 'userStore'])->name('user.store');
//ログイン認証
Route::post('/signin', [UserController::class, 'signin'])->name('user.signin');
//ログアウト処理
Route::get('/logout', [UserController::class, 'signout'])->name('user.logout');
//商品一覧へ遷移
Route::get('/index', [ItemController::class, 'index'])->name('item.index');
//商品詳細画面へ
Route::get('/detail/{id}', [ItemController::class, 'detail'])->name('item.detail');


//// 管理者 ////

Route::middleware(['auth', 'can:admin'])->group(function (){
    //ユーザー一覧へ遷移
    Route::get('/user', [UserController::class, 'userList'])->name('user.list');
    //ユーザー編集へ遷移
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    //編集画面_編集処理
    Route::post('/userEdit', [UserController::class, 'userEdit'])->name('userEdit');
    //編集画面_削除処理
    Route::get('/userDelete/{id}', [UserController::class, 'userDelete']);
    //商品登録画面へ遷移
    Route::get('/itemRegister', [ItemController::class, 'itemRegister'])->name('item.register');
    //商品情報のデータベースへの登録
    Route::post('/store', [ItemController::class, 'store'])->name('item.store');
    //商品編集へ遷移
    Route::get('/moveToEdit/{id}', [ItemController::class, 'moveToEdit'])->name('item.edit');
    //編集画面_編集処理
    Route::post('/itemEdit', [ItemController::class, 'itemEdit'])->name('itemEdit');
    //編集画面_削除処理
    Route::get('/itemDelete/{id}', [ItemController::class, 'itemDelete']);
});
