@section('leftsidebar_content')
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu bg-green1">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i data-feather="grid"></i>
                            <span class="{{ Route::currentRouteName()=='admin.dashboard' ? 'left-sidebar-active':'' }}"  data-key="t-dashboard">Dashboard</span>
                        </a>
                    </li>



                    @if (!empty(array_intersect(['user-list', 'role-list'], Auth::user()->getAllPermissions()->pluck('name')->toArray())))
                        <li>
                            <a href="javascript: void(0);" class="has-arrow">
                                <i data-feather="shield"></i>
                                <span data-key="t-usermanagement">User Management</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                @can('user-list')
                                    <li>
                                        <a href="{{ route('admin.users.index') }}">
                                            <span class="{{ Route::currentRouteName()=='admin.users.index' ? 'left-sidebar-active':'' }}" data-key="t-users">Users</span>
                                        </a>
                                    </li>
                                @endcan

                                @can('role-list')
                                    <li>
                                        <a href="{{ route('admin.roles.index') }}">
                                            <span class="{{ Route::currentRouteName()=='admin.roles.index' ? 'left-sidebar-active':'' }}" data-key="t-roles">Roles</span>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif


            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->


@endsection


