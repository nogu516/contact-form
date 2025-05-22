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

        return redirect()->intended('/admin/contacts');

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => '認証情報が正しくありません。',
            ])->withInput();
        }

        $request->session()->regenerate();

        // ログインしたユーザー情報を取得
        $user = Auth::user();

        // 管理者かどうかで遷移先を分岐
        if ($user->is_admin) {
            return redirect()->route('admin.contacts.index');
        }

        return redirect('/'); // 一般ユーザーの場合の遷移先（任意）
    }
}
