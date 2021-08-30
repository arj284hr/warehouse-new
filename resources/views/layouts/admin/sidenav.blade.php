{{-- <div id="sidebar-wrapper" style = "margin-top: 11px;">
      <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
        <li class="active">
          <a href="{{ route('admin.dashboard') }}"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a> --}}
         {{--  <ul class="nav-pills nav-stacked" style="list-style-type:none;">
            <li><a href="#">link1</a></li>
            <li><a href="#">link2</a></li>
          </ul> --}}
      {{--   </li> --}}
       {{--  <li>
          <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span>Warehouses &emsp;&emsp;&emsp;&emsp;<i class = "fa fa-chevron-down"></i></a>
          <ul class="nav-pills nav-stacked" style="list-style-type:none;">
            <li><a href="{{ route('admin.warehouse.index') }}"><i class = "fa fa-user"></i>&emsp;All Warehouses</a></li>
            <li><a href="{{ route('admin.warehouse.create') }}"><i class = "fa fa-user"></i>&emsp;Add Warehouse</a></li>
          </ul>
        </li> --}}
       {{--   <li><a href="{{ route('admin.warehouse.index') }}"><i class="fa fa-bank"></i>&emsp;Customers</a></li>
        <li>
          <a href="{{ route('admin.departments.index') }}"><span class="fa-stack fa-lg pull-left"><i class="fa fa-plus-square"></i></span>&emsp;Products</a>
        </li>
        <li><a href="{{ route('admin.manager.index') }}"><i class = "fa fa-user"></i>&emsp;Managers</a></li>
         <li><a href="{{ route('admin.employee.index') }}"><i class = "fa fa-user"></i>&emsp;Employees</a></li> --}}
      {{--   <li>
          <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span>Managers &emsp;&emsp;&emsp;&emsp;&emsp;<i class = "fa fa-chevron-down"></i></a>
          <ul class="nav-pills nav-stacked" style="list-style-type:none;">
            <li><a href="{{ route('admin.manager.index') }}"><i class = "fa fa-user"></i>&emsp;All Managers</a></li>
            <li><a href="{{ route('admin.manager.create') }}"><i class = "fa fa-user"></i>&emsp;Add Manager</a></li>
          </ul>
        </li>

            <li>
                <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-product-hunt fa-stack-1x "></i></span>Employees&emsp;&emsp;&emsp;&emsp;&emsp;<i class = "fa fa-chevron-down"></i></a>
                <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                  <li><a href="{{ route('admin.employee.index') }}"><i class = "fa fa-product-hunt"></i>&emsp;All Employee</a></li>
                  <li><a href="{{ route('admin.employee.create') }}"><i class = "fa fa-product-hunt"></i>&emsp;Add Employee</a></li>

                </ul>
              </li> --}}

         {{--  <li>
          <a href="{{ route('admin.inoutloads.index') }}"><i class="fa fa-cart-plus"></i>&emsp;Loads</a>
        </li> --}}
      {{--   <li>
          <a href="https://joinhomebase.com" target="_blank"><span class="fa-stack fa-lg pull-left"><i class="fa fa-link fa-stack-1x "></i></span>Join Homebase</a>
        </li>
        <li>
          <a href="https://emgr.efsllc.com/mgnt/CheckAuthorization.action?_ga=2.230029080.569485358.1614876550-800784614.1614876550" target="_blank"><span class="fa-stack fa-lg pull-left"><i class="fa fa-link fa-stack-1x "></i></span>EFS</a>
        </li> --}}

             {{--   <li>
          <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span> Load &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i class = "fa fa-chevron-down"></i></a>
          <ul class="nav-pills nav-stacked" style="list-style-type:none;">
            <li><a href="{{ route('admin.inboundload.create') }}"><i class = "fa fa-user"></i>&emsp;Add Inbound</a></li>
            <li><a href=""><i class = "fa fa-user"></i>&emsp;Inbound Load</a></li>
            <li><a href="{{ route('admin.outboundload.create') }}"><i class = "fa fa-user"></i>&emsp;Add Outbound</a></li>
            <li><a href=""><i class = "fa fa-user"></i>&emsp;Outbound Load</a></li>
          </ul>
        </li> --}}
              {{-- <li>
          <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-ambulance fa-stack-1x "></i></span>Emergency Cases</a>

        </li> --}}
     {{--    <li>
          <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-list fa-stack-1x "></i></span>Categories</a>
        </li>
        <li>
          <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-list fa-stack-1x "></i></span>Boards</a>
        </li>
        <li>
          <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-pencil fa-stack-1x "></i></span>Posts</a>
        </li>
        <li>
          <a href="" onclick = "alert('Comming Soon!')" ><span class="fa-stack fa-lg pull-left"><i class="fa fa-money fa-stack-1x "></i></span>Transactions</a>
        </li>  --}}
    {{--   </ul>
    </div> --}}




     <div class="l-navbar show" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="nav__logo border-bottom text-decoration-none text-dark">
                {{-- <img src="#" class="img-fluid" alt="logo" > --}}
                <i class="fas fa-warehouse"></i>
                <span class="nav__logo-name">Exe Data Center</span>
            </a>

            <div class="nav__list">
              <ul class="nav flex-column flex-nowrap overflow-hidden">
                <li class="nav-item">
                    <a class="nav-link text-truncate nav__link" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="d-none d-sm-inline nav__name">Dashboard</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-truncate nav__link" href="{{ route('admin.warehouse.index') }}">
                        <i class="fas fa-users"></i>
                        <span class="d-none d-sm-inline nav__name">Customers</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-truncate nav__link" href="{{ route('admin.departments.index') }}">
                        <i class="fa fa-plus-square"></i>
                        <span class="d-none d-sm-inline nav__name">Products</span>
                    </a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link text-truncate nav__link" href="{{ route('admin.manager.index') }}">
                        <i class="fas fa-user-tie"></i>
                        <span class="d-none d-sm-inline nav__name">Managers</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-truncate nav__link" href="{{ route('admin.employee.index') }}">
                        <i class="fas fa-user-tie"></i>
                        <span class="d-none d-sm-inline nav__name">Employees</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-truncate nav__link" href="{{ route('admin.inoutloads.index') }}">
                        <i class="fa fa-cart-plus"></i>
                        <span class="d-none d-sm-inline nav__name">Loads</span>
                       {{--  <span class="bg-primary btn-sm">
                          <?php echo \App\Ticket::where('status','pending')->count()?>
                        </span> --}}
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link nav-link2 collapsed  nav__link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">
                        <i class="fas fa-file-invoice"></i>
                        <span class="d-none d-sm-inline nav__name">Invoicing Reports</span>
                    </a>
                    <div class="collapse" id="submenu1" aria-expanded="false">
                        <ul class="flex-column pl-2 nav">
                            <li class="nav-item">
                                <a class="nav-link nav-link2 py-0 text-muted" href="{{ route('admin.customer-invoice') }}">
                                    <i class="fa fa-cutlery nav-icon"></i>
                                    <span>Customer Invoice</span>
                                </a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link nav-link2 py-0 text-muted" href="{{ route('admin.carrier-invoice') }}">
                                    <i class="fa fa-cutlery nav-icon"></i>
                                    <span>Carrier Invoice</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link2 py-0 text-muted" href="{{ route('admin.driver-invoice') }}">
                                    <i class="nav-icon fa fa-commen"></i>
                                    <span>Driver Invoice</span></a>
                            </li>
                            </ul>
                        </div>
                    </li>
                       <li class="nav-item">
                    <a class="nav-link nav-link2 collapsed  nav__link" href="#submenu2" data-toggle="collapse" data-target="#submenu2">
                        <i class="fas fa-file-invoice"></i>
                        <span class="d-none d-sm-inline nav__name">Payroll Reports</span>
                    </a>
                    <div class="collapse" id="submenu2" aria-expanded="false">
                        <ul class="flex-column pl-2 nav">
                            <li class="nav-item">
                                <a class="nav-link nav-link2 py-0 text-muted" href="{{ route('admin.hourly-report') }}">
                                    <i class="fa fa-cutlery nav-icon"></i>
                                    <span>Hourly Only</span>
                                </a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link nav-link2 py-0 text-muted" href="{{ route('admin.fix-report') }}">
                                    <i class="fa fa-cutlery nav-icon"></i>
                                    <span>Fixed Only</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link2 py-0 text-muted" href="{{ route('admin.hourly-fix-report') }}">
                                    <i class="nav-icon fa fa-commen"></i>
                                    <span>Hourly/Fixed</span></a>
                            </li>
                            </ul>
                        </div>
                    </li>
                        <li class="nav-item">
                    <a class="nav-link nav-link2 collapsed  nav__link" href="#submenu3" data-toggle="collapse" data-target="#submenu3">
                        <i class="fas fa-file-invoice"></i>
                        <span class="d-none d-sm-inline nav__name">Productivity Reports</span>
                    </a>
                    <div class="collapse" id="submenu3" aria-expanded="false">
                        <ul class="flex-column pl-2 nav">
                            <li class="nav-item">
                                <a class="nav-link nav-link2 py-0 text-muted" href="{{ route('admin.load-revenue') }}">
                                    <i class="fa fa-cutlery nav-icon"></i>
                                    <span>Load Revenue Rebate</span>
                                </a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link nav-link2 py-0 text-muted" href="{{ route('admin.load-productivity') }}">
                                    <i class="fa fa-cutlery nav-icon"></i>
                                    <span>Load Productivity</span>
                                </a>
                            </li>
                            </ul>
                        </div>
                    </li> 
                 <li class="nav-item">
                    <a class="nav-link text-truncate nav__link" href="https://joinhomebase.com" target="_blank">
                        <i class="fa fa-link"></i>
                        <span class="d-none d-sm-inline nav__name">Join Homebase</span>
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-truncate nav__link"  href="https://emgr.efsllc.com/mgnt/CheckAuthorization.action?_ga=2.230029080.569485358.1614876550-800784614.1614876550" target="_blank">
                        <i class="fa fa-link"></i>
                        <span class="d-none d-sm-inline nav__name">EFS</span>
                    </a>
                </li>
           {{--       <li class="nav-item">
                    <a class="nav-link text-truncate nav__link" href="{{ route('admin.questions.index') }}">
                        <i class="fas fa-question-circle"></i>
                        <span class="d-none d-sm-inline nav__name">Common Q&A</span>
                    </a>
                </li> --}}

               {{--  <h6 class="nav-header d-none">App Management</h6> --}}

               {{--  <li class="nav-item">
                    <a class="nav-link nav-link2 collapsed  nav__link" href="#submenu1" data-toggle="collapse" data-target="#submenu1">
                        <i class="fa fa-cutlery"></i>
                        <span class="d-none d-sm-inline nav__name">Customers</span>
                    </a>
                    <div class="collapse" id="submenu1" aria-expanded="false">
                        <ul class="flex-column pl-2 nav">
                            <li class="nav-item">
                                <a class="nav-link nav-link2 py-0 text-muted" href="#">
                                    <i class="fa fa-cutlery nav-icon"></i>
                                    <span>View Customers</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link2 py-0 text-muted" href="#">
                                    <i class="nav-icon fa fa-comments"></i>
                                    <span>Customer Requests</span></a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                {{--     <li class="nav-item">
                        <a class="nav-link nav-link2 collapsed  nav__link" href="#submenu2" data-toggle="collapse" data-target="#submenu2">
                            <i class="fa fa-archive"></i>
                            <span class="d-none d-sm-inline nav__name">Orders</span>
                        </a>
                        <div class="collapse" id="submenu2" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                <li class="nav-item">
                                    <a class="nav-link nav-link2 py-0 text-muted" href="#">
                                        <i class="nav-icon fa fa-archive"></i>
                                        <span>Orders</span></a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link2 collapsed  nav__link" href="#submenu3" data-toggle="collapse" data-target="#submenu3">
                                <i class=" fa fa-support"></i>
                                <span class="d-none d-sm-inline nav__name">Faqs</span>
                            </a>
                            <div class="collapse" id="submenu3" aria-expanded="false">
                                <ul class="flex-column pl-2 nav">
                                    <li class="nav-item">
                                        <a class="nav-link nav-link2 py-0 text-muted" href="#">
                                            <i class=" nav-icon fa fa-support"></i>
                                            <span>Faqs</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <h6 class="nav-header d-none">Settings</h6>
                            <li class="nav-item">
                                <a class="nav-link nav-link2 collapsed  nav__link" href="#submenu4" data-toggle="collapse" data-target="#submenu4">
                                    <i class=" fa fa-credit-card"></i>
                                    <span class="d-none d-sm-inline nav__name">Payments</span>
                                </a>
                                <div class="collapse" id="submenu4" aria-expanded="false">
                                    <ul class="flex-column pl-2 nav">
                                        <li class="nav-item">
                                            <a class="nav-link nav-link2 text-muted py-0" href="#" >
                                                <i class="nav-icon fa fa-money"></i>
                                                <span>Payments</span></a>
                                            </li>

                                        </ul>
                                    </div>
                                </li> --}}
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>

