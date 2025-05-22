<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

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

// お問い合わせ一覧（管理画面など）
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

//Route::post('admin/contacts', [ContactController::class, 'store']);

Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');

Route::post('/contacts/complete', [ContactController::class, 'store'])->name('contacts.store');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/contacts/thanks', function () {
    return view('contacts.thanks');
})->name('contacts.thanks');

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');

Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

// 登録確認画面へのルート
Route::post('auth/register.confirm', [RegisterController::class, 'confirm'])->name('register.confirm');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// 管理者用
Route::middleware(['auth', 'can:access-admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{id}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
});

//Route::get('/test-permission', function () {$user = Auth::user();

    //if (!$user) return '未ログインです';

    //$isAdmin = $user->isAdmin() ? 'YES' : 'NO';
    //$canAccess = Gate::allows('access-admin') ? 'OK ✅' : 'NG ❌';

    //Log::info("ログインユーザー: {$user->name}, role: {$user->role}, isAdmin(): {$isAdmin}, Gate: {$canAccess}");

    //return "ユーザー名: {$user->name}<br>isAdmin(): {$isAdmin}<br>access-admin Gate: {$canAccess}";})->middleware('auth');
