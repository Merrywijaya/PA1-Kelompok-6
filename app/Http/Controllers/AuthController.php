<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\VerifMail;
use App\Mail\PasswordReset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('do_logout');
    }

    public function login()
    {
        return view('pages.auth.login');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function forgot()
    {
        return view('pages.auth.forgot');
    }

    public function reset()
    {
        return view('pages.auth.reset');
    }

    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Silahkan isi email anda',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Silahkan isi password anda',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');
            } else {
                return redirect()->back()->with('error', 'Password anda salah');
            }
        } else {
            return redirect()->back()->with('error', 'Email anda tidak terdaftar');
        }
    }

    public function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'email' => 'required|email|max:255',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ], [
            'username.required' => 'Silahkan isi username anda',
            'username.unique' => 'Username sudah terdaftar',
            'email.required' => 'Silahkan isi email anda',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'phone.required' => 'Silahkan isi nomor telepon anda',
            'phone.unique' => 'Nomor telepon sudah terdaftar',
            'password.required' => 'Silahkan isi password anda',
            'password.min' => 'Password minimal 8 karakter',
            'confirm_password.required' => 'Silahkan isi konfirmasi password anda',
            'confirm_password.same' => 'Konfirmasi password tidak sama',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->save();

        Mail::to($user->email)->send(new VerifMail($user, $user->verification_token));

        return redirect()->route('login')->with('success', 'Akun anda berhasil dibuat. Silahkan cek email anda untuk verifikasi akun.');
    }

    public function activate(Request $request)
    {
        if ($request->session()->get('token') == $request->token) {
            $user = User::where('verification_token', $request->token)->first();
            $user->email_verified_at = Carbon::now();
            $user->save();
            return redirect('/login')->with('success', 'Akun anda telah aktif, silahkan login');
        } else {
            return redirect('/login')->with('error', 'Akun anda tidak ditemukan');
        }
    }

    public function do_forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:dns',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $token = mt_rand(100000, 999999);
            $request->session()->put('token', $token);
            $request->session()->put('email', $request->email);
            Mail::to($user->email)->send(new PasswordReset($token));
            return redirect('/new_password')->with('success', 'Silahkan cek email anda untuk mereset password');
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }



    public function do_reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }

        if ($request->session()->get('token') == $request->code) {
            $user = User::where('email', $request->session()->get('email'))->first();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Password anda berhasil diubah');
        } else {
            return redirect()->back()->with('error', 'Token tidak valid');
        }
    }

    public function do_logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
