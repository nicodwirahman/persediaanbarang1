<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'Username' => 'required',
            'Password' => 'required',
        ]);

        // Cek ke tabel users
        $user = User::where('Username', $request->Username)
                    ->where('Password', $request->Password) // ❗ kalau bisa diganti pakai Hash::check nanti
                    ->first();

        if ($user) {
            session(['user' => $user, 'role' => $user->role]);

            if ($user->role == 'admin') {
                return redirect()->route('dashboard.admin');
            } elseif ($user->role == 'manager') {
                return redirect()->route('dashboard.manager');
            } else {
                return redirect()->route('login.form')->with('error', 'Role tidak dikenali.');
            }
        }

        return back()->with('error', 'Username atau Password salah.');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login.form');
    }
}
