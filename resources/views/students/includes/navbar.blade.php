<nav class="navbar top-navbar navbar-expand-md">
    <div class="navbar-header" data-logobg="skin6">
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
        </a>
        <div class="navbar-brand">
            <a href="{{ route('dashboard') }}">
                <b class="logo-icon">
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('images/logo-icon-nav.png') }}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset('images/logo-icon-nav.png') }}" alt="homepage" class="light-logo" />
                </b>
                <!-- Logo text -->
                <span class="logo-text">
                    <img src="{{ asset('images/logo-text-nav.png') }}" alt="homepage" class="dark-logo" />
                    <img src="{{ asset('images/logo-light-text.png') }}" class="light-logo" alt="homepage" />
                </span>
            </a>
        </div>
        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
            data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-more"></i>
        </a>
    </div>
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
        </ul>
        <ul class="navbar-nav float-right">
            <!-- ============================================================== -->
            <!-- User profile -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('images/users/admin-icn.png') }}" alt="user" class="rounded-circle"
                        width="35">

                    @php
                        $student = Auth::guard('student')->user();
                    @endphp

                    @if($student)
                    <span class="ml-2 d-none d-lg-inline-block">
                        <span>Hello,</span>
                        <span class="text-dark">{{ $student->firstName }}</span>
                        <i data-feather="chevron-down" class="svg-icon"></i>
                    </span>
                    @else
                    <span class="ml-2 d-none d-lg-inline-block">
                        <span>Hello, {{ $student->first_name }}</span>
                        <i data-feather="chevron-down" class="svg-icon"></i>
                    </span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                    <a class="dropdown-item" href="{{ route('profile') }}">
                        <i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                        My Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('settings') }}">
                        <i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                        Account Setting
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>
    </div>
</nav>