<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        Carbon::setLocale('id');
        $response = self::httpClient()->get(self::$url.'vehicletypes');
        $vehicletypes = $response->json();
        $title = "Data Tipe Kendaraan";

        foreach ($vehicletypes as &$vehicletype) {
            $vehicletype['created_at'] = Carbon::parse($vehicletype['created_at'])->translatedFormat('l, d F Y H:i:s');
            
            if($vehicletype['updated_at'] == "0000-00-00 00:00:00") {
                $vehicletype['updated_at'] = '';
            } else {
                $vehicletype['updated_at'] = Carbon::parse($vehicletype['updated_at'])->translatedFormat('l, d F Y H:i:s');
            }
        }

        return view('vehicletypes.show', compact('vehicletypes','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Tipe Kendaraan";

        return view('vehicletypes.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $multipart = [
            [
                "name" => "merk",
                "contents" => $request->input('merk')
            ],
            [
                "name" => "cc",
                "contents" => (int) $request->input('cc')
            ],
            [
                "name" => "ratio",
                "contents" => (int) $request->input('ratio')
            ],
            [
                "name" => "type",
                "contents" => $request->input('type')
            ],
            [
                "name" => "created_by",
                "contents" => (int) $request->input('created_by')
            ],
        ];

        $response = self::httpClient()
        ->withHeaders([
            'Accept' => 'Application/json',
        ])
        ->send('POST', self::$url."vehicletypes",
        ['multipart' => $multipart]);

            if ($response->successful()) {
                return redirect()->route('show.vehicletype')->with('success', "Data Berhasil Ditambahkan");
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
        $response = self::httpClient()->get(self::$url."vehicletypes/{$id}");
        $vehicletypes = $response->json();
        return view('vehicletypes.edit', compact("title", "vehicletypes"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $multipart = [
             [
                "name" => "merk",
                "contents" => $request->input('merk')
            ],
            [
                "name" => "cc",
                "contents" => (int) $request->input('cc')
            ],
            [
                "name" => "ratio",
                "contents" => (int) $request->input('ratio')
            ],
            [
                "name" => "type",
                "contents" => $request->input('type')
            ]
        ];

        $response = self::httpClient()
        ->withHeaders([
            'Accept' => 'Application/json',
        ])
        ->send('PUT', self::$url."vehicletypes/{$id}",
        ['multipart' => $multipart]);

            if ($response->successful()) {
                return redirect()->route('show.vehicletype')->with('success', "Data Berhasil Diubah");
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
            $response = self::httpClient()->delete(self::$url."vehicletypes/{$id}");

            if  ($response->successful()) {
                return redirect()->route('show.vehicletype')->with('success', 'Data Berhasil Dihapus!');
            } else {
                return redirect()->route('show.vehicletype')->with('error', 'Gagal Hapus Data!');
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan dalam mengambil data API!',
                'error' => $e->getMessage()
            ], 500);
        }

    }
}
