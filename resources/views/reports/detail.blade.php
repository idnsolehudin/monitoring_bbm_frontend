<x-layout :title="$title">
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ $title }}</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                    <div class=" ">
                        <div class="product-image">
                            <div class="col-md-8 col-sm-8">
                                <div class="d-flex col-md-8 col-sm-8">
                                    <div>
                                        <img src="https://monitoringbbm.com/files/{{ $report['receipt'] }}" style="width: 300px; padding: 10px; height:400px;" alt="..." />
                                    </div>
                                    <div>
                                        <img src="https://monitoringbbm.com/files/{{ $report['dispenser'] }}" style="width: 300px; padding: 10px; height:400px;" alt="..." />
                                    </div>
                                </div>
                                <div class="d-flex col-md-8 col-sm-8">
                                    <div>
                                        <img src="https://monitoringbbm.com/files/{{ $report['fulfillment'] }}" style="width: 300px; padding: 10px; height:250px;" alt="..." />
                                    </div>                        
                                    <div>
                                        <img src="https://monitoringbbm.com/files/{{ $report['odometer'] }}" style="width: 300px; padding: 10px; height:250px;" alt="..." />
                                    </div>                        
                                </div>
                            </div>
                            

                            <div class="col-md-4 col-sm-4 " style="border:0px solid #e5e5e5;">
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Kode Mobil : </div>
                                    <div class="pt-2 pb-0 mb-0"><h1 class="mb-0">{{ $report['vehicle'] }}</h1></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Nomor Shipment : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $report['shipment'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Rute Pengiriman : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $report['route'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">KM Awal : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $report['first_km'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">KM Akhir : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $report['last_km'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Jarak Tempuh : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $report['distance'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Volume Isi : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $report['volume'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Rasio : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $report['ratio'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Kecocokan Gambar SPBU : </div>
                                    @if ( $report['compliance'] <= 0.85 )
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0 text-danger">{{ $report['compliance'] * 100 }}%</h5></div>
                                    @else
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0 text-success">{{ $report['compliance'] * 100 }}%</h5></div>
                                    @endif
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Status : </div>
                                    @if ($report['status'] == '-1')
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0 text-danger">Anomali</h5></div>
                                    @else
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0 text-success">Normal</h5></div>
                                    @endif
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Tanggal Pengisian : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $report['created_at'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Diisi Oleh : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $report['created_by'] }}</h5></div>
                                </div>                        
                            </div>                    
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>