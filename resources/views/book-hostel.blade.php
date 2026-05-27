<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Management System</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <link href="{{ asset('extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
</head>
<script>
    function getSeater(val) {
        $.ajax({
            type: "POST",
            url: "{{ route('get-seater') }}",
            data: {
                roomid: val,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                $('#seater').val(data);
            }
        });

        $.ajax({
            type: "POST",
            url: "{{ route('ajax.getFpm') }}",
            data: {
                rid: val,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                $('#fees_per_month').val(data);
            }
        });
    }
</script>

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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Hostel Bookings</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (session('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Warning: </strong> {{ session('warning') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <form method="POST" action="{{ route('registrations.store') }}">
                    @csrf

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Room Number</h4>
                                    <div class="form-group mb-4">
                                        <select class="custom-select mr-sm-2" name="room_no" id="room_no" onchange="getSeater(this.value);" onblur="checkAvailability()" required>
                                            <option selected>Select...</option>
                                            @foreach($rooms as $room)
                                            <option value="{{ $room->room_no }}">{{ $room->room_no }}</option>
                                            @endforeach
                                        </select>
                                        <span id="room-availability-status" style="font-size:12px;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Start Date</h4>
                                    <div class="form-group">
                                        <input type="date" name="stay_from" id="stay_from" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Seater</h4>
                                    <div class="form-group">
                                        <input type="text" id="seater" name="seater" placeholder="Enter Seater No." required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Duration</h4>
                                    <div class="form-group mb-4">
                                        <select class="custom-select mr-sm-2" id="duration" name="duration" required>
                                            <option selected>Choose...</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">{{ $i }} Month{{ $i > 1 ? 's' : '' }}</option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Food Status</h4>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" value="1" name="food_status" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1">Required <code>Extra $211 Per Month</code></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" value="0" name="food_status" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Not Required</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Fees Per Month</h4>
                                    <div class="form-group">
                                        <input type="text" name="fees_per_month" id="fees_per_month" placeholder="Your total fees" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Amount</h4>
                                    <div class="form-group">
                                        <input type="text" name="total_amount" id="total_amount" placeholder="Total Amount here.." required class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="card-title mt-5">Student's Personal Information</h4>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Registration Number</h4>
                                    <div class="form-group">
                                        <input type="text" name="reg_no" id="reg_no" placeholder="Enter registration number" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">First Name</h4>
                                    <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" placeholder="Enter first name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Middle Name</h4>
                                    <div class="form-group">
                                        <input type="text" name="middle_name" id="middle_name" placeholder="Enter middle name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Last Name</h4>
                                    <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" placeholder="Enter last name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Email</h4>
                                    <div class="form-group">
                                        <input type="email" name="email_id" id="email_id" placeholder="Enter email address" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Gender</h4>
                                    <div class="form-group">
                                        <select name="gender" class="form-control" required="required">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Contact Number</h4>
                                    <div class="form-group">
                                        <input type="tel" name="contact_no" id="contact_no" placeholder="Enter contact number" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Emergency Contact Number</h4>
                                <div class="form-group">
                                    <input type="number" name="emergency_contact_no" id="emergency_contact_no" placeholder="Enter emergency contact number" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                    

                    <h4 class="card-title mt-5">Guardian's Information</h4>

                    <div class="row">

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Guardian Name</h4>
                                    <div class="form-group">
                                        <input type="text" name="guardian_name" id="guardian_name" class="form-control" placeholder="Enter Guardian's Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Relation</h4>
                                    <div class="form-group">
                                        <input type="text" name="guardian_relation" id="guardian_relation" required class="form-control" placeholder="Student's Relation with Guardian">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Contact Number</h4>
                                    <div class="form-group">
                                        <input type="text" name="guardian_contact_no" id="guardian_contact_no" required class="form-control" placeholder="Enter Guardian's Contact No.">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <h4 class="card-title mt-5">Current Address Information</h4>

                    <div class="row">

                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Address</h4>
                                    <div class="form-group">
                                        <input type="text" name="correspondence_address" id="correspondence_address" class="form-control" placeholder="Enter Address" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">City</h4>
                                    <div class="form-group">
                                        <input type="text" name="correspondence_city" id="correspondence_city" class="form-control" placeholder="Enter City Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Postal Code</h4>
                                    <div class="form-group">
                                        <input type="text" name="correspondence_pincode" id="correspondence_pincode" class="form-control" placeholder="Enter Postal Code" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <h4 class="card-title mt-5">Permanent Address Information</h4>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-subtitle"><code>Ignore this CHECK BOX if you have different permanent address</code> </h6>
                                    <fieldset class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="adcheck"> My permanent address is same as above!
                                        </label>
                                    </fieldset>

                                </div>
                            </div>
                        </div>


                    </div>


                    <h5 class="card-title mt-5">Please fill up the form "ONLY IF" you've different permanent address!</h5>

                    <div class="row">


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Address</h4>
                                    <div class="form-group">
                                        <input type="text" name="permanent_address" id="permanent_address" class="form-control" placeholder="Enter Address" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">City</h4>
                                    <div class="form-group">
                                        <input type="text" name="permanent_city" id="permanent_city" class="form-control" placeholder="Enter City Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Postal Code</h4>
                                    <div class="form-group">
                                        <input type="text" name="permanent_pincode" id="permanent_pincode" class="form-control" placeholder="Enter Postal Code" required>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="form-group mb-0 mt-4 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
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

    <!-- Custom Ft. Script Lines -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="checkbox"]').click(function() {
                if ($(this).prop("checked")) {
                    // When checked, copy values from correspondence to permanent address
                    $('#permanent_address').val($('#correspondence_address').val());
                    $('#permanent_city').val($('#correspondence_city').val());
                    $('#permanent_pincode').val($('#correspondence_pincode').val());
                } else {
                    // When unchecked, clear the permanent address fields
                    $('#permanent_address').val('');
                    $('#permanent_city').val('');
                    $('#permanent_pincode').val('');
                }
            });
        });
    </script>


    <script>
        function checkAvailability() {
            $("#loaderIcon").show();
            $.ajax({
                url: "{{ route('ajax.checkAvailability') }}",
                data: {
                    roomno: $("#room_no").val(),
                    _token: '{{ csrf_token() }}'
                },
                type: "POST",
                success: function(data) {
                    $("#room-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#duration').keyup(function() {
                var fetch_dbid = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: "{{ route('ajax.getAmount') }}",
                    data: {
                        userinfo: fetch_dbid,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('.result').val(data);
                    }
                });
            });
        });

        $(document).ready(function() {
            function calculateTotalAmount() {
                var duration = parseInt($('#duration').val()); // Get the duration (in months)
                var fpm = parseFloat($('#fees_per_month').val()); // Get the fee per month
                var foodStatus = $('input[name="food_status"]:checked').val(); // Get the food status (1 or 0)
                var foodCost = 211; // Cost per month for food
                var totalAmount;

                if (isNaN(duration) || isNaN(fpm)) {
                    $('#total_amount').val(''); // Clear the total amount field if inputs are invalid
                    return;
                }

                if (foodStatus == 1) {
                    totalAmount = (fpm + foodCost) * duration; // Add food cost if required
                } else {
                    totalAmount = fpm * duration; // Calculate total without food
                }

                $('#total_amount').val(totalAmount.toFixed(2)); // Set the total amount in the input field
            }

            // Trigger calculation on duration, fees, or food status change
            $('#duration, #fees_per_month, input[name="food_status"]').change(function() {
                calculateTotalAmount();
            });
        });
    </script>
</body>

</html>