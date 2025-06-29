<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = self::httpClient()->get(self::$url.'user');
        $data = $response->json();
        $title = 'Data User';

        return view('users.show', compact('data', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Form Input User";

        return view('users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $images = $request->file('images');

        $multipart = [
            [
                'name' => 'nik',
                'contents' => (int) $request->input('nik')
            ],
            [
                'name' => 'name',
                'contents' => $request->input('name')
            ],
            [
                'name' => 'phone',
                'contents' => '+62' . (int) $request->input('phone')
            ],
            [
                'name' => 'password',
                'contents' => $request->input('password')
            ],
            [
                'name' => 'status',
                'contents' => $request->input('status')
            ],
        ];

        #ambil gambar
        if ($images) {
            $multipart[] = [
                'name' => 'images',
                'contents' => fopen($images->getRealPath(), 'r'),
                'filename' => $images->getClientOriginalName(),
            ];
        };

        $response = self::httpClient()
        ->withHeaders([
            'Accept' => 'application/json',
        ])
        ->send('POST', self::$url."user",
        ['multipart' => $multipart]
        );

        if ($response->successful()) {
            return redirect()->route('show.user')->with('success' , 'Data Berhasil Ditambahkan');
        } else {
            $errorBody = $response->json();

            $errorMessage = $errorBody['error'] ?? 'Gagal Input Data!';
            $fieldErrors = $errorBody['errors'] ?? [];

            return back()
                ->withErrors(['input_error' => $errorMessage])
                ->withInput();
        };
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {   Carbon::setLocale('id');
        $response = self::httpClient()->get(self::$url."user/{$id}");

        if ($response->successful()) {
            $user = $response->json();
            $title = "Detail User";

            $user['created_at'] = Carbon::parse($user['created_at'])->translatedFormat('l, d F Y H:i:s');
            if ($user['updated_at']== "0000-00-00 00:00:00") {
               $user['updated_at'] = "Null" ;
            } else {
                $user['updated_at'] = Carbon::parse($user['updated_at'])->translatedFormat('l, d F Y H:i:s');
            }

            return view('users.detail', compact('user', 'title'));
        } else {
            return abort(404, 'Data tidak ditemukan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $response = self::httpClient()->get(self::$url."user/{$id}");

        if ($response->successful()) {
            $user = $response->json();
            $title = "Form Ubah Data";

            return view('users.edit', compact('user', 'title'));
        } else {
            return abort(404, 'Data tidak ditemukan');
        }
    }
    public function editprofil($id)
    {
        $response = self::httpClient()->get(self::$url."user/{$id}");

        if ($response->successful()) {
            $user = $response->json();
            $title = "Form Ubah Data Profil";

            return view('users.editprofile', compact('user', 'title'));
        } else {
            return abort(404, 'Data tidak ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $images = $request->file('images');

        $multipart = [
            [
                'name' => 'nik',
                'contents' => (int) $request->input('nik')
            ],
            [
                'name' => 'name',
                'contents' => $request->input('name')
            ],
            [
                'name' => 'phone',
                'contents' => '+62' .(int) $request->input('phone')
            ],
            [
                'name' => 'password',
                'contents' => $request->input('password')
            ],
            [
                'name' => 'status',
                'contents' => $request->input('status')
            ],
        ];

        #ambil gambar
        if ($images) {
            $multipart[] = [
                'name' => 'images',
                'contents' => fopen($images->getRealPath(), 'r'),
                'filename' => $images->getClientOriginalName(),
            ];
        };

        $response = self::httpClient()
        ->withHeaders([
            'Accept' => 'application/json',
        ])
        ->send('PUT', self::$url."user/{$id}",
        ['multipart' => $multipart]
        );

        if ($response->successful()) {
            return redirect()->route('detail.user', $id)->with('success' , 'Data Berhasil Diubah');
        } else {
            $errorBody = $response->json();

            $errorMessage = $errorBody['error'] ?? 'Gagal Ubah Data!';
            $fieldErrors = $errorBody['errors'] ?? [];

            return back()
                ->withErrors(['input_error' => $errorMessage])
                ->withInput();
        };
    }
    public function updateprofil(Request $request, $id)
    {
        $images = $request->file('images');

        $multipart = [
            [
                'name' => 'nik',
                'contents' => (int) $request->input('nik')
            ],
            [
                'name' => 'name',
                'contents' => $request->input('name')
            ],
            [
                'name' => 'phone',
                'contents' => '+62' .(int) $request->input('phone')
            ],
            [
                'name' => 'password',
                'contents' => $request->input('password')
            ],
            [
                'name' => 'status',
                'contents' => $request->input('status')
            ],
        ];

        #ambil gambar
        if ($images) {
            $multipart[] = [
                'name' => 'images',
                'contents' => fopen($images->getRealPath(), 'r'),
                'filename' => $images->getClientOriginalName(),
            ];
        };

        $response = self::httpClient()
        ->withHeaders([
            'Accept' => 'application/json',
        ])
        ->send('PUT', self::$url."user/{$id}",
        ['multipart' => $multipart]
        );

        if ($response->successful()) {
            return redirect()->route('detail.user', $id)->with('success' , 'Data Berhasil Diubah');
        } else {
            $errorBody = $response->json();

            $errorMessage = $errorBody['error'] ?? 'Gagal Ubah Data!';
            $fieldErrors = $errorBody['errors'] ?? [];

            return back()
                ->withErrors(['input_error' => $errorMessage])
                ->withInput();
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            try {
            $response = self::httpClient()->delete(self::$url."user/{$id}");

            if ($response->successful()) {
                return redirect()->route('show.user')->with('success', 'Berhasil Hapus Data.');
            } else {
                return redirect()->route('show.user')->with('error', 'Gagal Hapus Data');
            }

        } catch (\Exception $e){
            return response()->json([
                'message' => 'Terjadi kesalahan saat mengambil API!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function deliveryman($id)
    {
        $response = self::httpClient()->get(self::$url."/user/{$id}");
        $user = $response->json();
        return view('deliveryman.index', compact('user'));
    }
}
