<!-- Sidebar navigation-->
<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="{{Auth::user()->urlfoto}}" alt="user-img" width="30px" height="30px" class="img-circle"><span class="hide-menu">{{Auth::user()->username}}</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="javascript:void(0)"><i class="ti-user"></i> Profile</a></li>
                <li><a href="javascript:void(0)"><i class="ti-settings"></i> Setting</a></li>
                <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
        </li>
        <li class="nav-small-cap">--- INPUT</li>
        <li> <a class="waves-effect waves-dark" href="{{url('')}}"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
        </li>
        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Apps</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="app-calendar.html">Calendar</a></li>
                <li><a href="app-chat.html">Chat app</a></li>
                <li><a href="app-ticket.html">Support Ticket</a></li>
                <li><a href="app-contact.html">Contact / Employee</a></li>
                <li><a href="app-contact2.html">Contact Grid</a></li>
                <li><a href="app-contact-detail.html">Contact Detail</a></li>
            </ul>
        </li>
        
        <li class="nav-small-cap">--- MASTER</li>
        <li> <a class="waves-effect waves-dark" href="#"><i class="ti-calendar"></i><span class="hide-menu">Users</span></a>
        </li>
        
        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Library</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="university-library-assets.html">Library Assets</a></li>
                <li><a href="university-add-asset.html">Add Library Asset</a></li>
                <li><a href="university-edit-asset.html">Edit Library Asset</a></li>
            </ul>
        </li>
        
    </ul>
</nav>
<!-- End Sidebar navigation -->