        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                @if (session('user')['status'] === 'admin')
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                @endif
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      @if (session('user')['image'] == "")
                      <img src="/images/user.png" alt=""> 
                      @else
                      <img src="https://monitoringbbm.com/files/{{ session('user')['image'] }}" alt="">                      
                      @endif
                      {{ session('user')['name'] }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="{{ route('edit.profil', session('user')['id']) }}"> Profile</a>
                    <a class="dropdown-item"  href="javascript:;">Help</a>
                    <form action="{{ route('logout') }}" method="POST" class="ml-3">
                        @csrf
                        <button type="submit" class="d-inline" style="background: none; border:none;"><i class="fa fa-sign-out pull-right"></i>Logout</button>
                    </form>

                    </div>
                  </li>
  
                 
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->
