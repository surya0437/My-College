<div class="header">

    <div class="header-left active">
        <a href="{{ route('staff.dashboard') }}" class="logo">
            <img src="/assets/img/logo/logo.png" alt="">
        </a>
        <a href="index.html" class="logo-small">
            <img src="/assets/img/logo/logo-sm.png" alt="">
        </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <ul class="nav user-menu">

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-img">
                    {{-- <img src="/assets/img/icons/users.svg" alt=""> --}}
                    <img src="{{ Auth::guard('staff')->user()->image ? asset(Auth::guard('staff')->user()->image) : '/assets/img/icons/users.svg' }}"
                        alt="">
                    <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        {{-- <span class="user-img">
                            <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : '/assets/img/icons/users.svg' }}" alt="">
                        </span> --}}

                        <div class="profilesets">

                            @if (Auth::guard('staff')->check())
                                <h6>{{ Auth::guard('staff')->user()->name }}</h6>
                                <h5>{{ Auth::guard('staff')->user()->role }}</h5>
                            @endif

                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}"> <i class="me-2"
                            data-feather="user"></i>
                        My
                        Profile</a>

                    <hr class="m-0">
                    <form method="POST" action="{{ route('staff.logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('staff.logout')"
                            onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                            class="dropdown-item has-icon text-danger">
                            <img src="/assets/img/icons/log-out.svg" class="me-2" alt="img">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </li>
    </ul>


    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('staff.profile.edit') }}"> <i class="me-2"
                    data-feather="user"></i>
                My
                Profile</a>
            <form method="POST" action="{{ route('staff.logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('staff.logout')"
                    onclick="event.preventDefault();
                                            this.closest('form').submit();"
                    class="dropdown-item has-icon text-danger">
                    <img src="/assets/img/icons/log-out.svg" class="me-2" alt="img">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>

</div>

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">

            <ul>
                <li class="{{ Request::routeIs('staff.dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('staff.dashboard') }}"><img src="/assets/img/icons/dashboard.svg"
                            alt="img"><span>Dashboard</span> </a>
                </li>
                <li class="{{ Request::routeIs('staff.student*') ? 'active' : '' }}">
                    <a href="{{ route('staff.student.index') }}"><img src="/assets/img/icons/users1.svg"
                            alt="img"><span>Student</span> </a>
                </li>
                @if (Auth::guard('staff')->user()->role == 'Librarian')
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="/assets/img/icons/book.svg" alt="img"><span>
                                Library</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li>
                                <a href="{{ route('staff.category.index') }}"
                                    class="{{ Request::routeIs('staff.category*') ? 'active' : '' }}"><span>
                                        Category</span> </a>
                            </li>

                            <li>
                                <a href="{{ route('staff.author.index') }}"
                                    class="{{ Request::routeIs('staff.author*') ? 'active' : '' }}"><span>
                                        Author</span> </a>
                            </li>

                            <li>
                                <a href="{{ route('staff.rack.index') }}"
                                    class="{{ Request::routeIs('staff.rack*') ? 'active' : '' }}"><span>
                                        Rack</span> </a>
                            </li>


                            <li>
                                <a href="{{ route('staff.book.index') }}"
                                    class="{{ Request::routeIs('staff.book*') ? 'active' : '' }}"><span>
                                        Books</span> </a>
                            </li>

                        </ul>
                    </li>
                @endif
                <li class="{{ Request::routeIs('staff.subject*') ? 'active' : '' }}">
                    <a href="{{ route('staff.subject.index') }}"><img src="/assets/img/icons/subject.svg"
                            alt="img"><span>Subject</span> </a>
                </li>

                <li class="{{ Request::routeIs('staff.leave*') ? 'active' : '' }}">
                    <a href="{{ route('staff.leave.index') }}"><img src="/assets/img/icons/subject.svg"
                            alt="img"><span>Leave</span> </a>
                </li>

            </ul>
        </div>
    </div>
</div>
