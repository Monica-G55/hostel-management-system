<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <title>Hostel Management System</title>
    <link href="{{ asset('extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            @include('students.includes.navbar')
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                @include('students.includes.sidebar')
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3>Welcome </h3>
                    </div>
                </div>
            </div>

               <div class="container-fluid">
                
                <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">My Log Activities</h4>
                </div>

<!-- By CodeAstro - codeastro.com -->
                <div class="col-12">
                        <div class="card">
                            
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User ID</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Logged In Time</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                        @forelse($logs as $index => $log)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $log->userId }}</td>
                                                <td>{{ $log->userEmail }}</td>
                                                <td>{{ $log->loginTime }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No log activities found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


            </div>
            @include('includes.footer')      
        </div>
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
