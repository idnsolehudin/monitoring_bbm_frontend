<x-layout :title="$title">

<!-- page content -->
  
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="container">
        
      </div>
    </div>

    <div class="clearfix"></div>

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
          @if (session('error'))
            <div class="bg bg-danger">
              <p class="text-light">{{ session('error') }}</p>
            </div>
          @endif
          <div class="x_content">
              <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Merk</th>
                            <th>Tipe</th>
                            <th>CC/Silinder</th>
                            <th>Rasio</th>
                            <th>Dibuat Oleh</th>
                            <th>Tanggal Dibuat</th>
                            <th>Tanggal Diubah</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach ($vehicletypes as $data)  
                            <tr>
                              <td>{{ $data['merk'] }}</td>
                              <td>{{ $data['type'] }}</td>
                              <td>{{ $data['cc'] }}</td>
                              <td>{{ $data['ratio'] }}</td>
                              <td>{{ $data['created_by'] }}</td>
                              <td>{{ $data['created_at'] }}</td>
                              <td>{{ $data['updated_at'] }}</td>
                              <td class="text-center">
                                <a href="{{ route('edit.vehicletype', $data['id']) }}" title="Edit"><i class="fa-solid fa-pen-to-square" style="color: #c79d03;"></i></a>
                                <form class="d-inline" action="{{ route('delete.vehicletype', $data['id']) }}" method="POST">
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