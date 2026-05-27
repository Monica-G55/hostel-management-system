<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
    <link href="{{ asset('extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
</head>

<body>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- Topbar header -->
        <header class="topbar" data-navbarbg="skin6">
            @include('includes.navigation')
        </header>
        <!-- Left Sidebar -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                @include('includes.sidebar')
            </div>
        </aside>
   

        <div class="page-wrapper">
        <div class="container-fluid">
            <a href="{{ url('courses/create') }}" class="btn btn-success">Add New Course Details</a>
            <hr>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-hover table-bordered no-wrap">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Course Full Name</th>
                            <th>Shortform</th>
                            <th>Course Code</th>
                            <th>Published On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $index => $course)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $course->course_fn }}</td>
                                <td>{{ $course->course_sn }}</td>
                                <td>{{ $course->course_code }}</td>
                                <td>{{ $course->posting_date->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ url('courses/' . $course->id . '/edit') }}" title="Edit">
                                        <i class="icon-note"></i>
                                    </a>
                                    <form action="{{ url('courses/' . $course->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Do you want to delete?')" title="Delete" style="border:none; background:none;">
                                            <i class="icon-close" style="color:red;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('includes.footer')
    </div>

    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <script src="{{ asset('extra-libs/c3/d3.min.js') }}"></script>
    <script src="{{ asset('extra-libs/c3/c3.min.js') }}"></script>
    <script src="{{ asset('libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboards/dashboard1.min.js') }}"></script>
    <script src="{{ asset('extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
</body>

</html>
