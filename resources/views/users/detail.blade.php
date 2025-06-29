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
                    @if (session('success'))
                        <div class="bg bg-success">
                            <p class="text-light">{{ session('success') }}</p>
                        </div>
                    @endif

                    <div class="x_content">

                    <div class="">
                        <div class="product-image">
                            <div class="col-md-8 col-sm-8">
                                <div>
                                    @if ($user['images'] == "")
                                        <img src="../public/images/user-icon.png" style="width: 80%; height: 60%;" alt="image" />
                                    @else
                                        <img src="https://monitoringbbm.com/files/{{ $user['images'] }}" style="width: 80%; height: 60%;" alt="image" />
                                    @endif
                                </div>
                                                     
                            </div>
                            

                            <div class="col-md-4 col-sm-4 " style="border:0px solid #e5e5e5;">                      
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">NIK : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $user['nik'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Nama : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $user['name'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Status : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $user['status'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">No. Telepon/WA : </div>
                                    @if (!$user['phone'])
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">Null</h5></div>
                                    @else
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $user['phone'] }}</h5></div>
                                    @endif
                                </div>                                 
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Tanggal Dibuat : </div>
                                    <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $user['created_at'] }}</h5></div>
                                </div>                        
                                <div class="position-relative border-bottom border-dark rounded p-0 mb-2">
                                    <div class="d-inline position-absolute top-0 start-0 translate-middle">Tanggal Diperbarui : </div>
                                     <div class="pt-4 pb-0 mb-0"><h5 class="mb-0">{{ $user['updated_at'] }}</h5></div>
                                </div>    
                                @if (session('user')['status'] == 'admin')
                                <div class="mt-5 d-flex">
                                    <a href="{{ route('edit.user', $user['id']) }}" class="btn btn-warning text-dark"><i  class="fa fa-edit mr-2"></i>Edit</a>
                                    <form action="{{ route('delete.user', $user['id']) }}" method="POST" onclick="return confirm('Apakah anda yakin hapus data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="d-inline btn btn-danger"><i class="fa fa-trash mr-2"></i>Hapus</button>
                                    </form>
                                </div>                
                                @elseif (session('user')['status'] == 'deliveryman')
                                <div class="mt-5 d-flex">
                                    <a href="{{ route('menu.deliveryman', $user['id']) }}" class="btn btn-info">Kembali</a>
                                </div>       
                                @endif
                            </div>                    
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout>