<x-layout :title="$title">
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ubah Data Kendaraan</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                    <div class=" ">
                    <form action="{{ route('update.vehicle', $vehicle['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="product-image">
                            <div class="col-md-8 col-sm-8">
                                <div class="position relative" style="position: relative;">
                                    <img 
                                    id="previewFoto"
                                    src="{{ $vehicle['images'] ? 'https://monitoringbbm.com/files/'.$vehicle['images'] : '/images/mobil_kiriman.png'}}"
                                    width="75%" height="600px">
                                    <div class="position-absolute bg-dark rounded rounded-circle pt-4 pb-3 pl-3 pr-3" style="position: absolute; bottom: 15px; right:90px;">
                                        <label for="fotoInput"><i class="fa fa-camera-retro fa-2xl" style="color: #e7e1e1; font-size:40px;"></i></label>
                                        <input type="file" name="images" id="fotoInput" accept="image/*" style="display: none;"><br>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-4 col-sm-4 " style="border:0px solid #e5e5e5;"> 
                               
                                    
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle">Kode Mobil : </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <input class="form-control" style="border: none; border-bottom: 2px solid #333; outline: none; background:transparent; padding:2px; font-size: 24px;" name="code" value="{{ $vehicle['code'] }}" required="required" />                                      
                                        </div>
                                    </div>                        
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle"> Nomor Polisi: </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <input class="form-control" style="border: none; border-bottom: 2px solid #333; outline: none; background:transparent; padding:2px; font-size: 24px;" name="nopol" value="{{ $vehicle['nopol'] }}" required="required" />                                      
                                        </div>
                                    </div>       
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle"> Kilometer Awal : </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <input  type="number" class="form-control" style="border: none; border-bottom: 2px solid #333; outline: none; background:transparent; padding:2px; font-size: 24px;" value="{{ $vehicle['first_km'] }}" name="first_km" required="required" placeholder="KM Awal"/>                                      
                                        </div>
                                    </div>                                         
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle">Shiptype : </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <select name="type_id" id="" class="form-control" style="border: none; border-bottom: 2px solid #333; outline: none; background:transparent; padding:2px; font-size: 16px;">
                                                    <option value="{{ $vehicle['type_id'] }}">{{ $vehicle['type'] ." - ". $vehicle['merk']  }}</option>
                                                @foreach ($vehicle_types as $kendaraan)                                        
                                                    <option value="{{ $kendaraan['id'] }}">{{ $kendaraan['type'] . " - " .$kendaraan['merk'] }} </option>
                                                @endforeach
                                            </select>
                                            {{-- <input class="form-control" style="border: none; border-bottom: 2px solid #333; outline: none; background:transparent; padding:2px; font-size: 24px;" name="code" value="{{ $vehicle['type_id'] }}" required="required" />                                       --}}
                                        </div>
                                    </div>                     
                                    <div class="mt-5 d-flex">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>                                
                                        <a href="{{ route('show.vehicle') }}" class="btn btn-danger">
                                            <i class="fa fa-cancel mr-2"></i>Batalkan                             
                                        </a>
                                    </div>                
                                </div>                    
                            </div>                    
                        </div>
                    </div>
                </form>                     
            </div>
        </div>
    </div>
</div>
</x-layout>