<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        // Ambil data user dari Google menggunakan access token
        $googleUser = Socialite::driver('google')
            ->user();

        // Cek apakah user sudah terdaftar di database berdasarkan email
        $user = User::where('email', $googleUser->email)->first();

        // Jika user belum ada, create user baru dengan data dari Google
        if (! $user) {
            $user = User::create([
                'name' => $googleUser->name,         // Nama dari Google
                'email' => $googleUser->email,        // Email dari Google
                'google_id' => $googleUser->id,           // Google ID untuk login berikutnya
                'avatar' => $googleUser->avatar,       // Profile picture dari Google
                'password' => bcrypt(Str::random(16)),   // Password random (tidak digunakan saat Google login)
            ]);
        }

        Auth::login($user);

        return redirect()->route('home');
    }
}
