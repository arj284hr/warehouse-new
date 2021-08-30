<div id="sidebar-wrapper" style = "margin-top: 11px;">
      <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
        <li class="active">
          <a href="{{ route('manager.dashboard') }}"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a>
         {{--  <ul class="nav-pills nav-stacked" style="list-style-type:none;">
            <li><a href="#">link1</a></li>
            <li><a href="#">link2</a></li>
          </ul> --}}
        </li>
        <li>
          <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span>Profile &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i class = "fa fa-chevron-down"></i></a>
          <ul class="nav-pills nav-stacked" style="list-style-type:none;">
            <li><a href="{{ route('manager.manager.index') }}"><i class = "fa fa-user"></i>&emsp;Manager</a></li>
            <li><a href=""><i class = "fa fa-user"></i>&emsp;Change Password</a></li>
          </ul>
        </li>
        
            <li>
                <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-product-hunt fa-stack-1x "></i></span>Employees &emsp;&emsp;&emsp;&emsp;&emsp;<i class = "fa fa-chevron-down"></i></a>
                <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                  <li><a href="{{ route('manager.employee.index') }}"><i class = "fa fa-product-hunt"></i>&emsp;All Employee</a></li>
                  <li><a href=""><i class = "fa fa-product-hunt"></i>&emsp;Add Employee</a></li>
                  
                </ul>
              </li>
                <li>
          <a href="{{ route('manager.inoutloads.index') }}"><i class="fa fa-cart-plus"></i>&emsp;Loads</a>
        </li>

       {{--         <li>
          <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-users fa-stack-1x "></i></span> Load &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i class = "fa fa-chevron-down"></i></a>
          <ul class="nav-pills nav-stacked" style="list-style-type:none;">
            <li><a href=""><i class = "fa fa-user"></i>&emsp;Add Inbound</a></li>
            <li><a href=""><i class = "fa fa-user"></i>&emsp;Inbound Load</a></li>
            <li><a href=""><i class = "fa fa-user"></i>&emsp;Add Outbound</a></li>
            <li><a href=""><i class = "fa fa-user"></i>&emsp;Outbound Load</a></li>
          </ul>
        </li> --}}
             {{--  <li>
          <a href=""><span class="fa-stack fa-lg pull-left"><i class="fa fa-ambulance fa-stack-1x "></i></span>Emergency Cases</a>
         
        </li>
        <li>
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
        </li>    --}}
      </ul>
    </div>
