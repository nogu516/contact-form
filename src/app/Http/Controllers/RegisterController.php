<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    // フォーム表示
    public function show()
    {
        return view('auth.register');
    }
    // フォーム送信・登録処理
    public function submit(RegisterRequest $request)
    {
        // ユーザー登録
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 登録完了後のリダイレクト
        return redirect()->route('register.show')->with('success', '登録が完了しました！');
    }
}
