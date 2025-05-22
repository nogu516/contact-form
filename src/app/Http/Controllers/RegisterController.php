<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{
    // フォーム表示
    public function show()
    {
        return view('auth.register');
    }

    // 確認画面表示
    public function confirm(RegisterRequest $request)
    {
        $data = $request->validated();
        return view('auth.register_confirm', compact('data'));
    }

    // 本登録処理
    public function register(RegisterRequest $request)
    {
        $fullName = $request->fullName;

        $data = $request->validated();

        $user = new User();
        $user->fullName = $data['fullName'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        // ここでログインはしない
        // Auth::login($user);

        return redirect()->route('login')->with('success', '登録が完了しました。ログインしてください。');
    }

    protected function redirectTo()
    {
        return '/admin/contacts';
    }
}
