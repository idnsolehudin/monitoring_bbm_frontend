<x-layout :title="$title">
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>{{ $title }}</h3>
              </div>
            </div>

            <div class="clearfix"></div>
                  @if (session('success'))
                      <div class="bg-success">
                          <p class="text-light">{{ session('success') }}</p>
                      </div>
                  @endif
            <div class="row">
                <div class="x_panel">
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12  text-center">

                      </div>

                      <div class="clearfix"></div>
                      @foreach ($data as $user)                        
                        <div class="col-md-4 col-sm-4  profile_details">
                          <div class="w-100 well profile_view">
                            <div class="col-sm-12">
                              <h4 class="brief"><i>{{ $user['nik'] }}</i></h4>
                              <div class="left col-md-7 col-sm-7">
                                <h2>{{ strtoupper($user['name']) }}</h2>
                                <p><strong>Status: </strong> {{ strtoupper($user['status']) }}</p>
                                <ul class="list-unstyled">
                                  <li><strong>Telepon : </strong>{{ $user['phone'] }}   </li>
                                </ul>
                                <div class="col-md-6 col-sm-6 d-flex">
                                  <a href="{{ route('detail.user', $user['id']) }}" type="button" class="btn btn-success btn-sm" title="Lihat Detail"> 
                                    <i class="fa fa-eye"></i> 
                                  </a>
                                  <a href="{{ route('edit.user', $user['id']) }}" type="button" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fa fa-edit"> </i>
                                  </a>
                                  <form action="{{ route('delete.user',$user['id']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus" class="btn btn-danger btn-sm d-inline">
                                      <i class="fa fa-trash"> </i>
                                    </button>
                                  </form>
                                </div>
                              </div>
                              <div class="right col-md-5 col-sm-5 text-center">
                                @if ($user['images'] == "")                                  
                                <img src="/images/user.png" alt="" class="img-circle img-fluid">
                                @else
                                <img src="https://monitoringbbm.com/files/{{ $user['images'] }}" alt="" class="img-circle img-fluid" style="height: 130px; width: 130px;">
                                @endif
                              </div>
                            </div>
                            <div class=" profile-bottom text-center">
                              
                            </div>
                          </div>
                        </div>
                      @endforeach

                    
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
</x-layout>