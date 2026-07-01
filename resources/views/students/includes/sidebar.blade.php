<!-- Sidebar navigation -->
<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{ route('student.dashboard') }}" aria-expanded="false">
                <i data-feather="home" class="feather-icon"></i>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>

        <li class="list-divider"></li>

        <li class="nav-small-cap">
            <span class="hide-menu">Features</span>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{ route('book-hostel') }}" aria-expanded="false">
                <i class="fas fa-h-square"></i>
                <span class="hide-menu">Book Hostel</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{ route('room-details') }}" aria-expanded="false">
                <i class="fas fa-bed"></i>
                <span class="hide-menu">My Room Details</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="{{ route('log-activity') }}" aria-expanded="false">
                <i class="fas fa-cogs"></i>
                <span class="hide-menu">Log Activites</span>
            </a>
        </li>


    </ul>
</nav>
<!-- End Sidebar navigation -->