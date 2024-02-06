<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact.main');
    }

    public function send(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ], [
            'name.required' => 'Silahkan isi nama anda',
            'email.required' => 'Silahkan isi email anda',
            'email.email' => 'Email tidak valid',
            'message.required' => 'Silahkan isi pesan anda',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('nihutasangkar@gmail.com')->send(new SendMail($data));

        return redirect()->back()->with('success', 'Pesan anda berhasil dikirim');
    }
}
