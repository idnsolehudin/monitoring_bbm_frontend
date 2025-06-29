<x-layout :title="$title">
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tambah Data Kendaraan</h2>
                        <div class="clearfix"></div>
                        @if ($errors->has('input_error'))
                            <div style="color: red;">
                                {{ $errors->first('input_error') }}
                            </div>
                        @endif
                    </div>
                    <div class="x_content">

                    <div class=" ">
                    <form action="{{ route('store.reports') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                        <div class="product-image">
                            <div class="col-md-8 col-sm-8">
                                <div class="position relative col-md-5 col-sm-5 p-3" style="position: relative;">
                                    <img 
                                    id="odometerFoto"
                                    src="../public/images/up_odometer.png"
                                    width="75%" height="300px">
                                    <div class="position-absolute bg-dark rounded rounded-circle pt-2 pb-1 pl-2 pr-2" style="position: absolute; bottom: 15px; right:50px;">
                                        <label for="fotoOdometer"><i class="fa fa-camera-retro fa-2xl" style="color: #e7e1e1; font-size:20px;"></i></label>
                                        <input type="file" name="odometer" id="fotoOdometer" accept="image/*" style="display: none;"><br>
                                    </div>
                                </div>
                                <div class="position relative col-md-5 col-sm-5 p-3" style="position: relative;">
                                    <img 
                                    id="fulfillmentFoto"
                                    src="../public/images/up_spbu.png"
                                    width="75%" height="300px">
                                    <div class="position-absolute bg-dark rounded rounded-circle pt-2 pb-1 pl-2 pr-2" style="position: absolute; bottom: 15px; right:50px;">
                                        <label for="fotoFulfillment"><i class="fa fa-camera-retro fa-2xl" style="color: #e7e1e1; font-size:20px;"></i></label>
                                        <input type="file" name="fulfillment" id="fotoFulfillment" accept="image/*" style="display: none;"><br>
                                    </div>
                                </div>
                                <div class="position relative col-md-5 col-sm-5 p-3" style="position: relative;">
                                    <img 
                                    id="dispenserFoto"
                                    src="../public/images/up_dispenser.png"
                                    width="75%" height="300px">
                                    <div class="position-absolute bg-dark rounded rounded-circle pt-2 pb-1 pl-2 pr-2" style="position: absolute; bottom: 15px; right:50px;">
                                        <label for="fotoDispenser"><i class="fa fa-camera-retro fa-2xl" style="color: #e7e1e1; font-size:20px;"></i></label>
                                        <input type="file" name="dispenser" id="fotoDispenser" accept="image/*" style="display: none;"><br>
                                    </div>
                                </div>
                                <div class="position relative col-md-5 col-sm-5 p-3" style="position: relative;">
                                    <img 
                                    id="receiptFoto"
                                    src="../public/images/up_struk.png"
                                    width="75%" height="300px">
                                    <div class="position-absolute bg-dark rounded rounded-circle pt-2 pb-1 pl-2 pr-2" style="position: absolute; bottom: 15px; right:50px;">
                                        <label for="fotoReceipt"><i class="fa fa-camera-retro fa-2xl" style="color: #e7e1e1; font-size:20px;"></i></label>
                                        <input type="file" name="receipt" id="fotoReceipt" accept="image/*" style="display: none;"><br>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-4 col-sm-4 " style="border:0px solid #e5e5e5;"> 
                               
                                    
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle">No.Shipment : </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <input class="form-control" type="number" style="border: none; border-bottom: 2px solid #333; outlineL none; background:transparent; padding:2px; font-size: 24px;" name="shipment" required="required" placeholder="Nomor Shipment"/>                                      
                                        </div>
                                    </div>                        
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle"> Kode SPBU: </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <input class="form-control" type="number" style="border: none; border-bottom: 2px solid #333; outlineL none; background:transparent; padding:2px; font-size: 24px;" name="spbu_code" required="required" placeholder="Kode SPBU"/>                                      
                                        </div>
                                    </div>                                               
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle">Kode Mobil : </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <select name="vehicle_id" id="" class="form-control" style="border: none; border-bottom: 2px solid #333; outline none; background:transparent; padding:2px; font-size: 16px;">
                                                    <option>-- Pilih Kode Mobil --</option>
                                                @foreach ($vehicles as $vehicle)                                        
                                                    <option value="{{ $vehicle['id'] }}">{{ $vehicle['code'] . " - " .$vehicle['nopol'] }} </option>
                                                @endforeach
                                            </select>
                                            {{-- <input class="form-control" style="border: none; border-bottom: 2px solid #333; outlineL none; background:transparent; padding:2px; font-size: 24px;" name="code" value="{{ $vehicle['type_id'] }}" required="required" />                                       --}}
                                        </div>
                                    </div>                     
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle">Rute Pengiriman : </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <select name="route_id" id="" class="form-control" style="border: none; border-bottom: 2px solid #333; outline none; background:transparent; padding:2px; font-size: 16px;">
                                                    <option>-- Pilih Rute Pengiriman --</option>
                                                @foreach ($routes as $route)                                        
                                                    <option value="{{ $route['id'] }}">{{ $route['code'] . " - " .$route['description'] }} </option>
                                                @endforeach
                                            </select>
                                            {{-- <input class="form-control" style="border: none; border-bottom: 2px solid #333; outlineL none; background:transparent; padding:2px; font-size: 24px;" name="code" value="{{ $vehicle['type_id'] }}" required="required" />                                       --}}
                                        </div>
                                    </div>                     
                                    <input type="hidden" name="created_by" value="{{ session('user')['id'] }}">
                                    <div class="mt-5 d-flex">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>                                
                                        @if (session('user')['status'] == 'admin')
                                            <a href="{{ route('show.reports') }}" class="btn btn-danger">
                                                <i class="fa fa-cancel mr-2"></i>Batalkan                             
                                            </a>
                                            @elseif (session('user')['status'] == 'deliveryman')
                                            <a href="{{ route('menu.deliveryman', session('user')['id']) }}" class="btn btn-danger">
                                                <i class="fa fa-cancel mr-2"></i>Batalkan                             
                                            </a>
                                        @endif
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