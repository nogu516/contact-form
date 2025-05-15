<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => '認証情報が正しくありません。',
            ])->withInput();
        }

        $request->session()->regenerate();

        // 管理者かどうかで分岐してもOK（任意）
        return redirect()->route('admin.contacts.index');
    }
}
