<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class RouteController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        Carbon::setLocale('id');
        $route = self::httpClient()->get(self::$url.'routes');
        $routes = $route->json();
        $title = "Data Rute Pengiriman";

        foreach ($routes as &$route) {
            $route['created_at'] = Carbon::parse($route['created_at'])->translatedFormat('l, d F Y H:i:s');
            
            if($route['updated_at']) {
                $route['updated_at'] = Carbon::parse($route['updated_at'])->translatedFormat('l, d F Y H:i:s');
            }
        }

        

        return view('routes_delivery.show', compact('routes','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Rute Pengiriman";

        return view('routes_delivery.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $multipart = [
            [
                "name" => "code",
                "contents" => (int) $request->input('code')
            ],
            [
                "name" => "description",
                "contents" => $request->input('description')
            ],
            [
                "name" => "distance",
                "contents" => (int) $request->input('distance')
            ],
            [
                "name" => "created_id",
                "contents" => (int) $request->input('created_id')
            ],
        ];

        $response = self::httpClient()
        ->withHeaders([
            'Accept' => 'Application/json',
        ])
        ->send('POST', self::$url."routes",
        ['multipart' => $multipart]);

            if ($response->successful()) {
                return redirect()->route('show.route')->with('success', "Data Berhasil Ditambahkan");
            } else {
                $errorBody = $response->json();

                $errorMessage = $errorBody['error'] ?? 'Gagal Menambahkan Data!';
                $fieldErrors = $errorBody['errors'] ?? [];

                return back()
                ->withErrors(['input_error' => $errorMessage])
                ->withInput();
            };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Form Edit Rute Pengiriman";
        $response = self::httpClient()->get(self::$url."routes/{$id}");
        $route = $response->json();
        return view('routes_delivery.edit', compact("title", "route"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $multipart = [
            [
                "name" => "code",
                "contents" => (int) $request->input('code')
            ],
            [
                "name" => "description",
                "contents" => $request->input('description')
            ],
            [
                "name" => "distance",
                "contents" => (int) $request->input('distance')
            ]
        ];

        $response = self::httpClient()
        ->withHeaders([
            'Accept' => 'Application/json',
        ])
        ->send('PUT', self::$url."routes/{$id}",
        ['multipart' => $multipart]);

            if ($response->successful()) {
                return redirect()->route('show.route')->with('success', "Data Berhasil Diubah");
            } else {
                $errorBody = $response->json();

                $errorMessage = $errorBody['error'] ?? 'Gagal Update Data!';
                $fieldErrors = $errorBody['errors'] ?? [];

                return back()
                ->withErrors(['input_error' => $errorMessage])
                ->withInput();
            };
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $response = self::httpClient()->delete(self::$url."routes/{$id}");

            if  ($response->successful()) {
                return redirect()->route('show.route')->with('success', 'Data Berhasil Dihapus!');
            } else {
                return redirect()->route('show.route')->with('error', 'Gagal Hapus Data!');
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan dalam mengambil data API!',
                'error' => $e->getMessage()
            ], 500);
        }

    }
}
