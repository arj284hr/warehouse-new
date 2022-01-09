{{-- <nav class="navbar navbar-default no-margin navbar-fixed-top">    
    <div class="fixed-brand">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
            <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
        </button>
        <a class="navbar-brand" href="#"><span>EXE Data Center</span></a>        
         fa fa-rocket fa-4 
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="active">
                <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2" style = "display: none;"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></button>
            </li>
            <li id = "dp">
                <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre >
                    {{ Auth::user()->first_name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a id = "dpa" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }} 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>    
</nav> --}}


 <header class="header body-pd" id="header">
        <div class="header__toggle d-flex align-items-center">
            <i class='bx bx-menu bx-x' id="header-toggle"></i>
            <span class="pl-4 for-hide-dash">Dashboard</span>
        </div>

        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                        <ul class="navbar-nav d-flex align-items-center flex-row cus-padd">
                         {{--  <li class="nav-item active">
                            <a class="nav-link" href="#"> <span class="sr-only">(current)</span><i class="fa fa-shopping-cart"></i></a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-bell"></i></a>
                        </li> --}}
                        <li class="nav-item dropdown d-flex justify-content-end" width="auto">
                            <a class="nav-link dropdown-toggle d-flex" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <p class="pr-3 mb-0 d-flex align-items-center">{{ Auth::user()->first_name }}</p> <img 
                              src="{{asset('/assets/img/avatar.png')}}" alt="User" class="rounded-circle img-fluid" width="40px" >
                          </a>
                          <div class="dropdown-menu dropdown-menu2" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="#">Profile</a>
                            {{--   <a class="dropdown-item" href="#">Logout</a> --}}
                               <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{ __('Logout') }} 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                          </div>
                      </li>
                  </ul>

              </nav>
          </div>
      </div>
  </div>
</header>
