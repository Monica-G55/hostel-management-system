<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
    <link href="{{ asset('extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            @include('includes.navigation')
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                @include('includes.sidebar')
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Room</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Form Start -->
                <form method="POST" action="{{ route('rooms.update', $room->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Room Number</h4>
                                    <div class="form-group">
                                        <input type="text" name="room_no" value="{{ $room->room_no }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Seater</h4>
                                    <div class="form-group mb-4">
                                        <select class="custom-select mr-sm-2" name="seater" required>
                                            <option value="{{ $room->seater }}" selected>{{ $room->seater }}</option>
                                            <option value="1">Single Seater</option>
                                            <option value="2">Two Seater</option>
                                            <option value="3">Three Seater</option>
                                            <option value="4">Four Seater</option>
                                            <option value="5">Five Seater</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Fees</h4>
                                    <div class="form-group">
                                        <input type="number" name="fees" value="{{ $room->fees }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
                <!-- Form End -->

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
</body>

</html>
