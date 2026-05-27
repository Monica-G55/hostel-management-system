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
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">

    <script type="text/javascript">
        function valid() {
            if (document.registration.password.value != document.registration.password_confirmation.value) {
                alert("Password and Confirm Password does not match");
                document.registration.password_confirmation.focus();
                return false;
            }
            return true;
        }
    </script>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Student Registration Form</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ url('/register-student') }}" name="registration" onsubmit="return valid();">
                    @csrf
                    <div class="row">
                        <!-- Registration Number -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Registration Number</h4>
                                    <div class="form-group">
                                        <input type="text" name="regNo" placeholder="Enter Registration Number" id="regNo" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- First Name -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">First Name</h4>
                                    <div class="form-group">
                                        <input type="text" name="firstName" id="firstName" placeholder="Enter First Name" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Middle Name -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Middle Name</h4>
                                    <div class="form-group">
                                        <input type="text" name="middleName" id="middleName" placeholder="Enter Middle Name" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Last Name</h4>
                                    <div class="form-group">
                                        <input type="text" name="lastName" id="lastName" placeholder="Enter Last Name" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Gender</h4>
                                    <div class="form-group mb-4">
                                        <select class="custom-select mr-sm-2" id="gender" name="gender" required>
                                            <option selected>Choose...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Number -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Contact Number</h4>
                                    <div class="form-group">
                                        <input type="number" name="contactNo" id="contactNo" placeholder="Your Contact" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email ID -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Email ID</h4>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" placeholder="Your Email" onblur="checkAvailability()" required class="form-control">
                                        <span id="user-availability-status" style="font-size:12px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Password</h4>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" placeholder="Enter Password" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Confirm Password</h4>
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-success">Register</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </form>
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
    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            $.ajax({
                url: "{{ url('/check-availability') }}",
                data: {
                    emailid: $("#email").val()
                },
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                }
            });
        }
    </script>
</body>
</html>
