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


                    @can('thana-list')
                        <li>
                            <a href="{{ route('admin.thanas.index') }}" >
                                <i data-feather="flag" ></i>
                                <span class="{{ Route::currentRouteName()=='admin.thanas.index' ? 'left-sidebar-active':'' }}"  data-key="t-thanas">Thana</span>
                            </a>
                        </li>
                    @endcan

                    @can('faq-list')
                        <li>
                            <a href="{{ route('admin.faqs.index') }}" >
                                <i data-feather="message-circle" ></i>
                                <span class="{{ Route::currentRouteName()=='admin.faqs.index' ? 'left-sidebar-active':'' }}"  data-key="t-faqs">FAQ</span>
                            </a>
                        </li>
                    @endcan

                    @can('slide-list')
                        <li>
                            <a href="{{ route('admin.slides.index') }}" >
                                <i data-feather="image" ></i>
                                <span class="{{ Route::currentRouteName()=='admin.slides.index' ? 'left-sidebar-active':'' }}"  data-key="t-slides">Slide</span>
                            </a>
                        </li>
                    @endcan

                    @can('registration-list')
                        <li>
                            <a href="{{ route('admin.registrations.index') }}" >
                                <i data-feather="users" ></i>
                                <span class="{{ Route::currentRouteName()=='admin.registrations.index' ? 'left-sidebar-active':'' }}"  data-key="t-registrations">Registrations</span>
                            </a>
                        </li>
                    @endcan

                    @can('notice-board-list')
                        <li>
                            <a href="{{ route('admin.noticeboards.index') }}" >
                                <i data-feather="clipboard" ></i>
                                <span class="{{ Route::currentRouteName()=='admin.noticeboards.index' ? 'left-sidebar-active':'' }}"  data-key="t-noticeboard">Notice Board</span>
                            </a>
                        </li>
                    @endcan

                    @can('event-schedules-list')
                        <li>
                            <a href="{{ route('admin.event.schedules.index') }}" >
                                <i data-feather="clock" ></i>
                                <span class="{{ Route::currentRouteName()=='admin.event.schedules.index' ? 'left-sidebar-active':'' }}"  data-key="t-event_schedules">Event Schedule</span>
                            </a>
                        </li>
                    @endcan

                    @can('dessert-image-download')
                        <li>
                            <a href="{{ route('admin.dessert.image.download.index') }}" >
                                <i data-feather="download" ></i>
                                <span class="{{ Route::currentRouteName()=='admin.dessert.image.download.index' ? 'left-sidebar-active':'' }}"  data-key="t-event_schedules">
                                    Dessert Image Download
                                </span>
                            </a>
                        </li>
                    @endcan

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


