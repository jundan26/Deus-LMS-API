<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json(['message' => 'Masukkan tidak valid'], 401);
        }

        $generateToken = bin2hex(random_bytes(40));
        $admin->update([
            'token' => $generateToken,
        ]);

        return response()->json([
            'message' => 'Sukses login',
            'token' => $generateToken, 
        ]);
    }
}