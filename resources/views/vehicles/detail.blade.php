<x-layout :title="$title">
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Data Detail Kendaraan</h2>
                    
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                    <div class=" ">
                        <div class="product-image">
                            <div class="col-md-8 col-sm-8">
                                <div>
                                    @if ($vehicle['images'] == "")
                                        <img src="../public/images/mobil_kiriman.png" style="width: 80%; height: 60%;" alt="image" />
                                    @else
                                        <img src="https://monitoringbbm.com/files/{{ $vehicle['images'] }}" style="width: 80%; height: 60%;" alt="image" />
                                    @endif
                                </div>
                                                     
                            </div>
                            

                            <div class="col-md-4 col-sm-4 " style="border:0px solid #e5e5e5;">                      
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Kode Mobil : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $vehicle['code'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Nomor Polisi : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $vehicle['nopol'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Merk : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $vehicle['merk'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Shiptype : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $vehicle['type'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">KM Awal : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $vehicle['first_km'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">dibuat oleh : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $vehicle['created_by'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Tanggal Dibuat : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $vehicle['created_at'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Tanggal Diperbarui : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $vehicle['updated_at'] }}</h5></div>
                                </div>    
                                <div class="mt-5 d-flex">
                                    <a href="{{ route('edit.vehicle', $vehicle['id']) }}" class="btn btn-warning text-dark"><i  class="fa fa-edit mr-2"></i>Edit</a>
                                    <form action="{{ route('delete.vehicle', $vehicle['id']) }}" method="POST" onclick="return confirm('Apakah anda yakin hapus data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="d-inline btn btn-danger"><i class="fa fa-trash mr-2"></i>Hapus</button>
                                    </form>
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