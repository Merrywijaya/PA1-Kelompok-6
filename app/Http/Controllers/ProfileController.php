<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('pages.profile.main');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'username' => 'required|unique:users,username,' . auth()->user()->id,
            'nik' => 'required|unique:users,nik,' . auth()->user()->id,
            'email' => 'required',
            'phone' => 'required|unique:users,phone,' . auth()->user()->id,
            'address' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'profession' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(auth()->user()->id);
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->nik = $request->nik;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->place_of_birth = $request->place_of_birth;
        $user->date_of_birth = $request->date_of_birth;
        $user->profession = $request->profession;
        $user->status = $request->status;
        $user->update();

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
}
