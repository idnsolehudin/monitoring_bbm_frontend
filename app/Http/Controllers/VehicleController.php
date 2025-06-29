<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use function PHPUnit\Framework\returnSelf;

class VehicleController extends Controller
{
    public function index()
    {
     $response = self::httpClient()->get(self::$url."vehicles");
     $data = $response->json();
     $title = "Data Kendaraan";

     return view('vehicles/show', compact("data","title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicle = self::httpClient()->get(self::$url."vehicletypes");
        $vehicle_types = $vehicle->json();
        $title = "Tambah Kendaraan";
        return view("vehicles.create", compact("vehicle_types", "title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $images = $request->file('images');

        $multipart = [
            [
                'name' => 'code',
                'contents' => $request->input('code'),
            ],
            [
                'name' => 'nopol',
                'contents' => $request->input('nopol'),
            ],
            [
                'name' => 'first_km',
                'contents' => (int) $request->input('first_km'),
            ],
            [
                'name' => 'type_id',
                'contents' => (int) $request->input('type_id'),
            ],
            [
                'name' => 'created_by',
                'contents' => (int) $request->input('created_by'),
            ]
        ];

         #ambil gambar
        if ($images) {
            $multipart[] = [
                'name'  => 'images',
                'contents' => fopen($images->getRealPath(), 'r'),
                'filename' => $images->getClientOriginalName(),
            ];
        };
        
         $response = self::httpClient()
            ->withHeaders([
                'Accept' => 'application/json',
            ])
            ->send('POST', self::$url. "vehicles" ,
            ['multipart' => $multipart]
        );

     if ($response->successful()) {
            return redirect()->route('show.vehicle')->with('success', 'Data Berhasil Ditambahkan.');
        }else {
            $errorBody = $response->json();

            $errorMessage = $errorBody['error'] ?? 'Gagal Input Data!';
            $fieldErrors = $errorBody['errors'] ?? [];

            return back()
                ->withErrors(['input_error' => $errorMessage])
                ->withInput(); // agar input tidak hilang
        }

    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {   
        Carbon::setLocale('id');
        $response = self::httpClient()->get(self::$url."vehicles/{$id}");

        if ($response->successful()) {
            $vehicle = $response->json();
            $title = "Detail Kendaraan";

            $vehicle['created_at'] = Carbon::parse($vehicle['created_at'])->translatedFormat('l, d F Y H:i:s');
            if ($vehicle['updated_at'] == "0000-00-00 00:00:00") {
                $vehicle['updated_at'] = "Null";
            } else {
                $vehicle['updated_at'] = Carbon::parse($vehicle['updated_at'])->translatedFormat('l, d F Y H:i:s');
            }
            return view("vehicles.detail", compact("vehicle", "title"));
        } else {
            return abort(404, "Data Tidak Ditemukan!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        Carbon::setLocale("id");
        $vehicletypes = self::httpClient()->get(self::$url."vehicletypes");
        $response = self::httpClient()->get(self::$url."vehicles/{$id}");
        $vehicle_types = $vehicletypes->json();
        $title = "Ubah Data Kendaraan";
        if ($response->successful()) {
            $vehicle = $response->json();
            
            $vehicle['created_at'] = Carbon::parse($vehicle['created_at'])->translatedFormat('Y-m-d');
            $vehicle['updated_at'] = Carbon::parse($vehicle['updated_at'])->translatedFormat('Y-m-d');
            return view("vehicles.edit", compact("vehicle","vehicle_types","title"));
        } else {
            return abort (404, "Data Tidak ada!");
        }        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Ambil file gambar
        $images = $request->file('images');

        // siapkan data untuk dikirim
        $multipart = [
            [
                'name' => 'code',
                'contents' => $request->input('code'),
            ],
            [
                'name' => 'nopol',
                'contents' => $request->input('nopol'),
            ],
            [
                'name' => 'first_km',
                'contents' => (int) $request->input('first_km'),
            ],
            [
                'name' => 'type_id',
                'contents' => (int) $request->input('type_id'),
            ],
        ];
        #ambil gambar
        if ($images) {
            $multipart[] = [
                'name'  => 'images',
                'contents' => fopen($images->getRealPath(), 'r'),
                'filename' => $images->getClientOriginalName(),
            ];
        };

        $response = self::httpClient()
            ->withHeaders([
                'Accept' => 'application/json',
            ])
            ->send('PUT', self::$url. "vehicles/{$id}" ,
            ['multipart' => $multipart]
        );

        if ($response->successful()) {
            return redirect()->route('show.vehicle')->with('success', 'Data Berhasil Diubah.');
        }
        
        return back()->withErrors('Gagal Memperbarui data');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $response = self::httpClient()->delete(self::$url."vehicles/{$id}");

            if ($response->successful()) {
                return redirect()->route('show.vehicle')->with('success', 'Berhasil Hapus Data.');
            } else {
                return redirect()->route('show.vehicle')->with('error', 'Gagal Hapus Data');
            }

        } catch (\Exception $e){
            return response()->json([
                'message' => 'Terjadi kesalahan saat mengambil API!',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
