<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
    <title>Hostel Management System</title>
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">

    <script type="text/javascript">
    function valid() {
        if(document.registration.password.value != document.registration.cpassword.value) {
            alert("Password and Re-Type Password Field do not match  !!");
            document.registration.cpassword.focus();
            return false;
        }
        return true;
    }
    </script>
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url('{{ asset('/images/big/auth-bg.jpg') }}') no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url('{{ asset('/images/adimg.jpg') }}');">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="{{ asset('images/big/icon.png') }}" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Admin Login</h2>
                        
                        <form class="mt-4" method="POST" action="{{ route('login') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Email or Username</label>
                                        <input class="form-control" name="username" id="uname" type="text"
                                            placeholder="Email or Username" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input class="form-control" name="password" id="pwd" type="password"
                                            placeholder="Enter your password" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-danger">LOGIN</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    <a href="{{ url('index.php') }}" class="text-danger">Go Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>
