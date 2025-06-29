<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ReportController extends Controller
{
    public function index()
    {
        Carbon::setLocale('id');
        $tanggal = Carbon::now()->format('d-m-Y');
        $response = self::httpClient()->get(self::$url.'reports');
        $data = $response->json();
        $title = 'Laporan Isi BBM';

        foreach ($data as &$item) {
            $item['created_at'] = Carbon::parse($item['created_at'])->translatedFormat('l, d F Y');
        }
        return view('reports/show', compact('data','tanggal','title'));
    }
    
    public function show()
    {
        Carbon::setLocale('id');
        $tanggal = Carbon::now()->format('d-m-Y');
        $title = 'Laporan Isi BBM Hari Ini';

        $response = self::httpClient()->get(self::$url.'current_reports');

        if ($response->successful()) {
            $data = $response->json();

            foreach ($data as &$item) {
                $item['created_at'] = Carbon::parse($item['created_at'])->translatedFormat('l, d F Y');
            }

            return view('reports.show_daily', compact('data', 'tanggal', 'title'))
                ->with('success', 'Data berhasil ditemukan!');
        } else {
            $error = 'Belum Ada Laporan Transaksi BBM Hari Ini...';
            return view('reports.show_daily', compact('tanggal', 'title', 'error'))
                ->with('error', 'Belum Ada Laporan Transaksi BBM Hari Ini!');
        }
    }

    public function userReports($id)
    {
        Carbon::setLocale('id');
        $tanggal = Carbon::now()->format('d-m-Y');
        $title = 'Laporan Isi BBM';

        $response = self::httpClient()->get(self::$url."/user_reports/{$id}");

        if ($response->successful()) {
            $data = $response->json();
            // dd($data);
            foreach ($data as &$item) {
                $item['created_at'] = Carbon::parse($item['created_at'])->translatedFormat('l, d F Y');
            }

            return view('reports.show', compact('tanggal', 'title', 'data'))
                ->with('success','Data Berhasil Ditemukan'); 
        } else {
            $error = "Belum ada Laporan BBM yang anda inputkan";
            return view('reports.show', compact('tanggal', 'title'))
            ->with('error', 'Belum ada Data Laporan yang Anda Masukkan!');

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Form Input Laporan BBM";
        $routes_data = self::httpClient()->get(self::$url."routes");
        $routes = $routes_data->json();
        $vehicles_data = self::httpClient()->get(self::$url."vehicles");
        $vehicles = $vehicles_data->json();

        return view('reports.create', compact('title','routes','vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $receipt = $request->file('receipt');
        $odometer = $request->file('odometer');
        $dispenser = $request->file('dispenser');
        $fulfillment = $request->file('fulfillment');
        $multipart = [
            [
                'name' => 'shipment',
                'contents' => (int) $request->input('shipment')
            ],
            [
                'name' => 'spbu_code',
                'contents' => (int) $request->input('spbu_code')
            ],
            [
                'name' => 'vehicle_id',
                'contents' => (int) $request->input('vehicle_id')
            ],
            [
                'name' => 'route_id',
                'contents' => (int) $request->input('route_id')
            ],
            [
                'name' => 'created_by',
                'contents' => (int) $request->input('created_by')
            ],
        ];

        #ambil gambar
        if ($receipt) {
            $multipart[] = [
                'name' => 'receipt',
                'contents' => fopen($receipt->getRealPath(), 'r'),
                'filename' => $receipt->getClientOriginalName(),
            ];
        };
        if ($odometer) {
            $multipart[] = [
                'name' => 'odometer',
                'contents' => fopen($odometer->getRealPath(), 'r'),
                'filename' => $odometer->getClientOriginalName(),
            ];
        };
        if ($dispenser){
            $multipart[] = [
                'name' => 'dispenser',
                'contents' => fopen($dispenser->getRealPath(), 'r'),
                'filename' => $dispenser->getClientOriginalName(),
            ];
        };
        if ($fulfillment) {
            $multipart[] = [
                    'name' => 'fulfillment',
                    'contents' => fopen($fulfillment->getRealPath(), 'r'),
                    'filename' => $fulfillment->getClientOriginalName(),
            ];
        };

        $response = self::httpClient()
        ->timeout(240)
        ->withHeaders([
            'Accept' => 'application/json',
        ])
        ->send('POST', self::$url."reports",
        ['multipart' => $multipart]
        );
        // dd($response->body());
         if ($response->successful()) {
            if (session('user')['status'] == 'admin') {
                return redirect()->route('show.reports')->with('success' , 'Data Berhasil Ditambahkan');
            } elseif (session('user')['status'] == 'deliveryman') {
                 return redirect()->route('user.reports', session('user')['id'])->with('success' , 'Data Berhasil Ditambahkan');
            }
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
        $response = self::httpClient()->get(self::$url."reports/{$id}");
        $title = "Data Detail Reports";
        
        if ($response->successful()) {
            $report = $response->json();
            $report['created_at'] = Carbon::parse($report['created_at'])->translatedFormat('l, d F Y H:i:s');

            return view ('reports/detail', compact('report', 'title'));
        } else {
            return abort(404, 'Data tidak ditemukan!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $response = self::httpClient()->delete(self::$url."reports/{$id}");
            if ($response->successful()) {
                return redirect()->route('show.reports')->with('success', 'Data Berhasil DIhapus...');
            } else {
                return redirect()->route('show.reports')->with('error', 'Data gagal dihapus!');
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan dalam mengambil data API!',
                'error' => $e->getMessage()
            ], 500);
        }

        
    }

    public function formFilteredReports() 
    {
        $title = "Cari Data Laporan Per Tanggal";

        return view('reports.formFilteredReports', compact('title'));
    }
public function showdataperdate(Request $request) 
{
    $validated = $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date',
    ]);

    // Validasi manual tambahan (karena 'after' tidak digunakan)
    if ($validated['end_date'] < $validated['start_date']) {
        return back()->withInput()->with('error', 'Tanggal akhir tidak boleh lebih kecil dari tanggal mulai.');
    }

    try {
        $response = self::httpClient()->get(self::$url."filtered_reports", [
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
        ]);

        if ($response->successful()) {
            $data = $response->json();

            if (empty($data)) {
                return back()->withInput()->with('error', 'Tidak ada data ditemukan untuk rentang tanggal tersebut.');
            }

            // Format tanggal
            Carbon::setLocale('id');
            foreach ($data as &$item) {
                $item['created_at'] = Carbon::parse($item['created_at'])->translatedFormat('l, d F Y');
            }

            $tanggal = Carbon::now()->format('d-m-Y');
            $title = "Data Laporan BBM dari {$validated['start_date']} sampai {$validated['end_date']}";

            return view('reports.show', compact('data', 'tanggal', 'title'));
        }

        return back()->withInput()->with('error', 'Data Tidak Ditemukan!');
    } catch (\Exception $e) {
        return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}



    // pubic function getFilteredReports (Request $request)
    // {

    // }
}
