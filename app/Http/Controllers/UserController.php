<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function register(Request $request)
{

    $this->validate($request, [
        'username' => 'required|string|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed'
    ], [
        'email.required' => 'Email ini sudah terdaftar.',
        'password.min' => 'Password harus minimal 8 karakter.',
        'password_confirmation.required' => 'Silahkan masukkan password sekali lagi untuk konfirmasi.'
    ]);

    $username = $request->input('username');
    $email = $request->input('email');
    $password = Hash::make($request->input('password'));

    $user = User::create([
        'username' => $username,
        'email' => $email,
        'password' => $password,
    ]);

    return response()->json(['message' => 'Akun berhasil ditambahkan'], 201);
}

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user=User::where('email', $email)->first();
        if (!$user) {
            return response()->json(['message' => 'Gagal Login'], 401);
        }

        $isValidPassword = Hash::check($password, $user->password);
      if (!$isValidPassword) {
        return response()->json(['message' => 'Gagal Login'], 401);
      }

      $generateToken = bin2hex(random_bytes(40));
      $user->update([
          'token' => $generateToken
      ]);

      return response()->json($user);
      }
}

    

