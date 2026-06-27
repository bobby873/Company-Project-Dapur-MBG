<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('admin_id')) {
            return redirect('/admin/dashboard');
        }
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session([
                'admin_id'   => $admin->id,
                'admin_name' => $admin->name,
            ]);

            return redirect('/admin/dashboard')->with('success', 'Selamat Datang Kembali, ' . $admin->name);
        }

        return back()->withErrors(['login_error' => 'Username atau Password salah!'])->withInput();
    }


    public function logout()
    {

        session()->forget(['admin_id', 'admin_name']);

        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
