<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function create()
    {
        return view('contacts.index');
    }

    public function confirm(ContactRequest $request)
    {
        $inputs = $request->validated();
        return view('contacts.confirm', compact('inputs'));
    }

    public function store(ContactRequest $request)
    {
        if ($request->input('action') !== 'submit') {
            return redirect()->route('contacts.create')->withInput();
        }

        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building', 'content_type',  'content', 'category_id']);

        $contact['detail'] = $request->input('detail') ?: 'N/A';

        return redirect()->route('contacts.thanks');
    }

    public function send(ContactRequest $request)
    {
        // バリデーションと保存処理

        // 送信成功後、サンクスページへリダイレクト
        return redirect()->route('contact.thanks');
    }
}
