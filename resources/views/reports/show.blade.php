<x-layout :title="$title">

<!-- page content -->
  
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">            
            <h2>{{ $title }} <small>({{ $tanggal }})</small></h2> 
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">    
                      @if (session('success'))
                        <div class="bg bg-info"><p class="text-light">{{ session('success') }}</p></div>
                        @else
                        <div class="bg bg-danger"><p class="text-light">{{ session('error') }}</p></div>
                      @endif
                      @if (isset($data))  
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Tanggal</th>
                              <th>Kode Mobil</th>
                              <th>Shipment</th>
                              <th>Rute</th>
                              <th>Pengisi</th>
                              <th>Rasio</th>
                              <th>Kecocokan</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>


                          <tbody>
                            @foreach ($data as $data)  
                              <tr>
                                <td>{{ $data['created_at'] }}</td>
                                <td>{{ $data['vehicle_id'] }}</td>
                                <td>{{ $data['shipment'] }}</td>
                                <td>{{ $data['route'] }}</td>
                                <td>{{ $data['created_by'] }}</td>
                                <td>{{ $data['ratio'] }}</td>
                                <td>
                                  @if ($data['compliance'] <= 0.85)
                                    <p><b class="text-danger">{{ $data['compliance']*100 }}%</b></p>
                                    @else
                                    <p><b class="text-success">{{ $data['compliance']*100 }}%</b></p>
                                  @endif
                                </td>
                                <td>
                                  @if ($data['status'] == -1)
                                  <button class="btn-danger w-75 rounded">Anomali</button>
                                  @else
                                  <button class="btn-success w-75 rounded">Normal</button>
                                  @endif
                                </td>
                                <td class="text-center">
                                  {{-- <a href="{{ route('edit.report', $data['id']) }}" title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #c79d03;"></i></a> --}}
                                  <a href="{{ route('detail.report', $data['id']) }}" title="Detail"><i class="fa-solid fa-eye" style="color: #083ac2;"></i></a>
                                  <form class="d-inline" action="{{ route('destroy.report', $data['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button style="background : none; border:none; display:inline;" type="submit" onclick="return confirm('apakah anda yakin ingin menghapus?')" title="Hapus">
                                      <i class="fa-solid fa-trash-can" style="color: #e60a0a;"></i>
                                    </button>
                                  </form>
                                </td>
                              </tr>
                            @endforeach
                          </tbody> 
                        </table>
                        @elseif (!isset($data))
                        <div class="text-center"><h3>{{ $error }}</h3></div>
                      @endif
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
</x-layout>