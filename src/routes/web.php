<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;


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

//Route::get('/', function () {return view('welcome');});

Route::get('/', [ContactController::class, 'index']);

// お問い合わせフォーム画面（入力画面）
Route::get(
    '/contacts/create',
    [ContactController::class, 'create']
)->name('contacts.create');

Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');

Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');

// お問い合わせ一覧（管理画面など）
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');

Route::post('/register', [RegisterController::class, 'submit'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/contacts/thanks', function () {
    return view('contacts.thanks');
})->name('contacts.thanks');

// 管理者用
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
});

Route::get('/test', function () {
    return view('test');
});

Route::post('/test-confirm', function () {
    return '確認画面に遷移しました！';
})->name('test.confirm');
