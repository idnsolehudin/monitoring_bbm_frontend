<x-layout :title="$title">
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3> Data Kendaraan <small> Pengiriman</small> </h3>
     
          </div>
          <div class="clearfix"></div>
          
          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_content">                  
                  @if (session('success'))
                      <div class="bg-success">
                          <p class="text-light">{{ session('success') }}</p>
                      </div>
                  @endif
                  @if (session('error'))
                      <div class="bg-danger">
                          <p class="text-light">{{ session('error') }}</p>
                      </div>
                  @endif
                  <div class="row">
                  @foreach ($data as $vehicle)                    
                    <div class="col-md-55">
                      <div class="thumbnail">
                        <div class="image view view-first">
                          @if ($vehicle['images'] == "")                            
                            <img style="width: 100%; display: block;" src="../public/images/mobil_kiriman.png" />
                          @else
                            <img style="width: 100%; display: block;" src="https://monitoringbbm.com/files/{{ $vehicle['images'] }}" alt="image" />
                          @endif
                          <div class="mask">
                            <p>{{ $vehicle['code'] }}</p>
                            <div class="tools tools-bottom">
                              <a href="{{ route("detail.vehicle", $vehicle['id']) }}"><i class="fa fa-eye"></i></a>
                              <a href="{{ route("edit.vehicle", $vehicle['id']) }}"><i class="fa fa-pencil"></i></a>
                              <form class="d-inline" action="{{ route("delete.vehicle", $vehicle['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border:none;" onclick="return confirm('Yakin ingin menghapus data?')">
                                  <i class="fa fa-times" style="color:aliceblue;"></i>
                                </button>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="caption">
                          <p><strong>{{ $vehicle['nopol'] }}</strong></p>
                          <p>{{ $vehicle['merk'] }}</p>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content -->
</x-layout>