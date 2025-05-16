<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('name')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->name . '%')
                    ->orWhere('last_name', 'like', '%' . $request->name . '%');
            });
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('content_type')) {
            $query->where('content_type', 'like', '%' . $request->content_type . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        if ($request->has('export')) {
            return $this->exportCSV($query->get());
        }

        $contacts = Contact::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.contacts.index', compact('contacts'));
    }

    //public function show(Contact $contact){
    //return response()->json($contact);}

    public function show($id)
    {
        //$contact = Contact::findOrFail($id);
        //return view('admin.contacts.index', compact('contact'));
        return response()->json(Contact::findOrFail($id));
    }


    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return response()->json(['message' => '削除しました']);
    }

    public function exportCSV($contacts)
    {
        $filename = 'contacts_export_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($contacts) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', '名前', 'メール', '性別', 'お問い合わせ種類', '内容', '作成日']);
            foreach ($contacts as $contact) {
                fputcsv($handle, [
                    $contact->id,
                    $contact->last_name . ' ' . $contact->first_name,
                    $contact->email,
                    $contact->gender,
                    $contact->content_type,
                    $contact->detail,
                    $contact->created_at,
                ]);
            }
            fclose($handle);
        };

        return Response::stream($callback, 200, $headers);
    }
}
