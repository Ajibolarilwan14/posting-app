<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function __construct() {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        # code...
        return view('auth.register');
    }

    public function store(Request $request) {
        // dd($request->email);
        #Task to be done
        // validation
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        // \dd('store');

        // store the user
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // sign the user in
        auth()->attempt($request->only('email', 'password'));

        // redirect the user
        return \redirect()->route('dashboard');
    }
}
