<x-layout :title="$title">
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Buat User Baru</h2>
                        <div class="clearfix"></div>
                        @if ($errors->has('input_error'))
                        <div class="bg bg-danger">
                            <div style="color: white;">
                                {{ $errors->first('input_error') }}
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="x_content">

                    <div class=" ">
                    <form action="{{ route('store.user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                        <div class="product-image">
                            <div class="col-md-8 col-sm-8">
                                <div class="position relative" style="position: relative;">
                                    <img 
                                    id="previewFoto"
                                    src="/images/user-icon.png"
                                    width="75%" height="600px">
                                    <div class="position-absolute bg-dark rounded rounded-circle pt-4 pb-3 pl-3 pr-3" style="position: absolute; bottom: 15px; right:90px;">
                                        <label for="fotoInput"><i class="fa fa-camera-retro fa-2xl" style="color: #e7e1e1; font-size:40px;"></i></label>
                                        <input type="file" name="images" id="fotoInput" accept="image/*" style="display: none;"><br>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-md-4 col-sm-4 " style="border:0px solid #e5e5e5;"> 
                               
                                    
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle">NIK : </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <input  type="number" class="form-control" style="-moz-appearance: textfield; border: none; border-bottom: 2px solid #333; outlineL none; background:transparent; padding:2px; font-size: 24px;" name="nik" required="required" placeholder="NIK"/>                                      
                                        </div>
                                    </div>                        
                                                         
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle"> Password : </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <input type="password" class="form-control" style="border: none; border-bottom: 2px solid #333; outlineL none; background:transparent; padding:2px; font-size: 24px;" name="password" required="required" placeholder="Password"/>                                      
                                        </div>
                                    </div> 
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle"> Nama : </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <input class="form-control" style="border: none; border-bottom: 2px solid #333; outlineL none; background:transparent; padding:2px; font-size: 24px;" name="name" required="required" placeholder="Nama"/>                                      
                                        </div>
                                    </div> 
                                     <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle">No. Telepon/WA : </div>
                                        <div class="pt-4 pb-0 mb-0">
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">+62</span>
                                            <input type="text" class="form-control" style="-moz-appearance: textfield; border: none; border-bottom: 2px solid #333; outlineL none; background:transparent; padding:2px; font-size: 24px;" name="phone" required="required" placeholder="8xxxxx">
                                        </div>
                                    </div>                                                
                                    <div class="position-relative p-0 mb-2">
                                        <div class="d-inline position-absolute top-0 start-0 translate-middle">Status : </div>
                                        <div class="pt-4 pb-0 mb-0">
                                            <select name="status" id="" class="form-control" style="border: none; border-bottom: 2px solid #333; outline none; background:transparent; padding:2px; font-size: 16px;" required="required">
                                                    <option></option>
                                                    <option value="admin">Admin</option>
                                                    <option value="deliveryman">Deliveryman</option>
                                               
                                            </select>
                                            {{-- <input class="form-control" style="border: none; border-bottom: 2px solid #333; outlineL none; background:transparent; padding:2px; font-size: 24px;" name="code" value="{{ $vehicle['type_id'] }}" required="required" />                                       --}}
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