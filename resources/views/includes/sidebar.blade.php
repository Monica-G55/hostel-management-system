<!-- Sidebar navigation -->
<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                <i data-feather="home" class="feather-icon"></i>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>

        <li class="list-divider"></li>

        <li class="nav-small-cap">
            <span class="hide-menu">Features</span>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{ route('register-student') }}" aria-expanded="false">
                <i class="fas fa-user-plus"></i>
                <span class="hide-menu">Register Student</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{ route('view-students') }}" aria-expanded="false">
                <i class="fas fa-user-circle"></i>
                <span class="hide-menu">View Student Acc.</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{ route('registration.create') }}" aria-expanded="false">
                <i class="fas fa-h-square"></i>
                <span class="hide-menu">Book Hostel</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{ route('manage-students') }}" aria-expanded="false">
                <i class="fas fa-users"></i>
                <span class="hide-menu">Hostel Students</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{ route('manage-rooms') }}" aria-expanded="false">
                <i class="fas fa-bed"></i>
                <span class="hide-menu">Manage Rooms</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{ route('manage-courses') }}" aria-expanded="false">
                <i class="fas fa-book"></i>
                <span class="hide-menu">Manage Courses</span>
            </a>
        </li>


    </ul>
</nav>
<!-- End Sidebar navigation -->