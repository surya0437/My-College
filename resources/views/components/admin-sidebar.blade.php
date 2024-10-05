<div class="header">

    <div class="header-left active">
        <a href="index.html" class="logo">
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
                    <img src="/assets/img/icons/users.svg" alt="">
                    {{-- <img src="{{ asset(Auth::user()->image) ? '/assets/img/icons/users.svg' }}" alt=""> --}}
                    <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        {{-- <span class="user-img">
                            <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : '/assets/img/icons/users.svg' }}" alt="">
                        </span> --}}

                        <div class="profilesets">

                                <h6>{{ Auth::user()->name }}</h6>
                                <h5>Admin</h5>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}"> <i class="me-2"
                            data-feather="user"></i>
                        My
                        Profile</a>

                    <hr class="m-0">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
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
            <a class="dropdown-item" href="{{ route('profile.edit') }}"> <i class="me-2" data-feather="user"></i>
                My
                Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
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
                <li class="{{ Request::routeIs('dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><img src="/assets/img/icons/dashboard.svg"
                            alt="img"><span>Dashboard</span> </a>
                </li>
                <li class="submenu ">
                    <a href="javascript:void(0);"><img src="/assets/img/icons/users1.svg" alt="img"><span>
                            People</span> <span class="menu-arrow"></span></a>
                    <ul>

                        <li class="{{ Request::routeIs('student*') ? 'active' : '' }}">
                            <a href="{{ route('student.index') }}"><span>Student</span> </a>
                        </li>

                        <li class="{{ Request::routeIs('employee*') ? 'active' : '' }}">
                            <a href="{{ route('employee.index') }}"><span>Employee</span> </a>
                        </li>
                        <li class="{{ Request::routeIs('teacher*') ? 'active' : '' }}">
                            <a href="{{ route('teacher.get') }}"><span>Teacher</span> </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><img src="/assets/img/icons/book.svg" alt="img"><span>
                            Library</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li>
                            <a href="{{ route('category.index') }}"
                                class="{{ Request::routeIs('category*') ? 'active' : '' }}"><span>
                                    Category</span> </a>
                        </li>

                        <li>
                            <a href="{{ route('author.index') }}"
                                class="{{ Request::routeIs('author*') ? 'active' : '' }}"><span>
                                    Author</span> </a>
                        </li>

                        <li>
                            <a href="{{ route('rack.index') }}"
                                class="{{ Request::routeIs('rack*') ? 'active' : '' }}"><span>
                                    Rack</span> </a>
                        </li>


                        <li>
                            <a href="{{ route('book.index') }}"
                                class="{{ Request::routeIs('book*') ? 'active' : '' }}"><span>
                                    Books</span> </a>
                        </li>


                        <li>
                            <a href="{{ route('UserBook') }}"
                                class="{{ Request::routeIs('UserBook*') ? 'active' : '' }}"><span>
                                    Books</span> </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::routeIs('program*') ? 'active' : '' }}">
                    <a href="{{ route('program.index') }}"><img src="/assets/img/icons/program.svg"
                            alt="img"><span>Program</span> </a>
                </li>

                <li class="{{ Request::routeIs('shift*') ? 'active' : '' }}">
                    <a href="{{ route('shift.index') }}"><img src="/assets/img/icons/shift.svg"
                            alt="img"><span>Shift</span> </a>
                </li>

                <li class="{{ Request::routeIs('academicPeriod*') ? 'active' : '' }}">
                    <a href="{{ route('academicPeriod.index') }}"><img src="/assets/img/icons/shift.svg"
                            alt="img"><span>Academic Period</span> </a>
                </li>

                <li class="{{ Request::routeIs('subject*') ? 'active' : '' }}">
                    <a href="{{ route('subject.index') }}"><img src="/assets/img/icons/subject1.svg"
                            alt="img"><span>Subject</span> </a>
                </li>

                <li class="{{ Request::routeIs('assignSubject*') ? 'active' : '' }}">
                    <a href="{{ route('assignSubject.index') }}"><img src="/assets/img/icons/assignsubject.svg"
                            alt="img"><span>Assign Subject</span> </a>
                </li>

                <li class="{{ Request::routeIs('leave*') ? 'active' : '' }}">
                    <a href="{{ route('leave.index') }}"><img src="/assets/img/icons/leave.svg"
                            alt="img"><span>Staff Leave</span> </a>
                </li>

                <li class="{{ Request::routeIs('holiday*') ? 'active' : '' }}">
                    <a href="{{ route('holiday.index') }}"><img src="/assets/img/icons/leave.svg"
                            alt="img"><span>Holiday</span> </a>
                </li>
            </ul>
        </div>
    </div>
</div>
