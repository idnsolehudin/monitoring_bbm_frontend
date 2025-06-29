<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required|integer',
            'password' => 'required|string',
        ]);

        // Kirim data ke API Flask
        $response = Http::asForm()->post(self::$url.'/login', [
            'nik' => $request->nik,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $json =  $response->json();

            $accessToken = $json['data']['access_token'];
            $userData = $json['data']['data'];

            Session::put('access_token', $accessToken);
            Session::put('user', $userData);

            if ($userData['status'] == 'admin') {
                return redirect()->route('show.currentreports');
            } elseif ($userData['status'] == 'deliveryman') {
                return redirect()->route('menu.deliveryman', $userData['id']); 
            } else {
                return redirect()->route('login')->withErrors(['status' => 'Status tidak dikenali.']);
            }

        } else {
             // Tangkap response body dari API
            $errorBody = $response->json();

            $errorMessage = $errorBody['message'] ?? 'Login gagal!';
            $fieldErrors = $errorBody['errors'] ?? [];

            return back()
                ->withErrors(['login_error' => $errorMessage])
                ->withInput(); // agar input tidak hilang
        }
    }
     public function logout()
    {
        $token = Session::get('access_token');

        if ($token) {
            try {
                // Kirim request logout ke API Flask
                self::httpClient()->post(self::$url.'auth/logout');
            } catch (\Exception $e) {
                // Bisa log error di sini jika perlu
            }
        }

        // Hapus session
        Session::forget('access_token');
        Session::forget('user');

        return redirect('/login')->with('status', 'Logged out successfully');
    }
}
