<aside class="main-sidebar">
    @auth
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/avatar.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <p>{{ Auth::user()->role->role }}</p>
                {{-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> --}}
            </div>
        </div>
        <!-- search form -->
        {{-- @cannot('admin')
        <form action="{{ route('search')}}" method="POST" class="sidebar-form" role="search" onSubmit="return searchChk()" id="searchForm">
            @csrf

            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="string" id="searchString" value="{{ old('task') }}">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        @endcannot --}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class=" {{isset($active) && $active == 'home'? 'active' : ''}}">
                <a href="{{url('/admin')}}">
                    <i class="fa fa-tachometer-alt"></i> <span>Dashboard</span>
                </a>
            </li>
            
            {{-- @can('access','admin') --}}
            <li class=" {{isset($active) && $active == 'applicationfilter'? 'active' : ''}}">
                <a href="{{route('applicationfilter')}}">
                    <i class="fa fa-table"></i> <span>Applications</span>
                </a>
            </li>
            @yield('filters')
            {{-- @endcan --}}
            
            {{-- @can('access','admin') --}}
            <li class=" treeview  {{isset($active) && $active == 'schedules'? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Schedules</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{isset($activelink) && $activelink == 'schedules'? 'active' : ''}}"><a href="{{route('schedules')}}"><i class="fa fa-circle"></i> Schedules</a></li>
                    <li class=" {{isset($activelink) && $activelink == 'newschedule'? 'active' : ''}}"><a href="{{route('newschedule')}}"><i class="fa fa-circle"></i> New Schedule</a></li>
                    <li class=" {{isset($activelink) && $activelink == 'schedules'? 'active' : ''}}"><a href="#"><i class="fa fa-circle"></i> Rental Assistance</a></li>
                    <li class=" {{isset($activelink) && $activelink == 'schedules'? 'active' : ''}}"><a href="#"><i class="fa fa-circle"></i> Household</a></li>
                    <li class=" {{isset($activelink) && $activelink == 'schedules'? 'active' : ''}}"><a href="#"><i class="fa fa-circle"></i> Clothing</a></li>
                    <li class=" {{isset($activelink) && $activelink == 'schedules'? 'active' : ''}}"><a href="#"><i class="fa fa-circle"></i> School Supplies</a></li>
                </ul>
            </li>
            {{-- @endcan --}}
            
            {{-- @can('access','admin') --}}
            <li class=" treeview  {{isset($active) && $active == 'logs'? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Logs</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{isset($activelink) && $activelink == 'logs'? 'active' : ''}}"><a href="{{route('logs')}}"><i class="fa fa-circle"></i> Logs</a></li>
                    <li class=" {{isset($activelink) && $activelink == 'emaillogs'? 'active' : ''}}"><a href="{{route('emaillogs')}}"><i class="fa fa-circle"></i> Email Logs</a></li>
                    <li class=" {{isset($activelink) && $activelink == 'errorlogs'? 'active' : ''}}"><a href="{{route('errorlogs')}}"><i class="fa fa-circle"></i> Error Logs</a></li>
                    <li class=" {{isset($activelink) && $activelink == 'userlogs'? 'active' : ''}}"><a href="{{route('userlogs')}}"><i class="fa fa-circle"></i> User Logs</a></li>
                    <li class=" {{isset($activelink) && $activelink == 'versionlog'? 'active' : ''}}"><a href="{{route('versionlog')}}"><i class="fa fa-circle"></i> Version Log</a></li>
                </ul>
            </li>
            <li class=" treeview  {{isset($active) && $active == 'users'? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>User Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" {{isset($activelink) && $activelink == 'users'? 'active' : ''}}"><a href="{{route('users')}}"><i class="fa fa-circle"></i> Users</a></li>
                    <li class=" {{isset($activelink) && $activelink == 'newuser'? 'active' : ''}}"><a href="{{route('newuser')}}"><i class="fa fa-circle"></i> New User</a></li>
                </ul>
            </li>
            {{-- @endcan --}}
        </ul>

        
    </section>
    <!-- /.sidebar -->
    @endauth
</aside>