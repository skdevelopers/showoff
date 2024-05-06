<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}} | Outlet Login </title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('') }}admin-assets/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('') }}admin-assets/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('') }}admin-assets/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('') }}admin-assets/assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="{{ asset('') }}admin-assets/assets/img/favicon/safari-pinned-tab.svg" color="#ac772b">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('admin-assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/assets/css/users/login-3.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/plugins/jqvalidation/custom-jqBootstrapValidation.css') }}">
    <link href="{{ asset('admin-assets/plugins/notification/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />

    <style type="text/css">
        .invalid-feedback{
            color: red;
            display: block;
        }
        .form-login{
            width: 100%;
            max-width: 100%;
        }
        .create-account-section{
            width: 100%;
            margin: auto;
            background: rgba( 0, 0, 0, 0.25 );
            /* box-shadow: 0 8px 32px 0 rgb(31 38 135 / 37%); */
            backdrop-filter: blur( 20px );
            -webkit-backdrop-filter: blur( 20px );
            border-radius: 10px;
            border: 1px solid #0090EF;
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
        }
        .create-account-section span{
            padding: 8px 12px;
            margin-bottom: 20px !important;
            color: #fff !important;
            background: #0090EF;
            box-shadow: none;
            border-radius: 50rem;
        }
        .create-account-section h3 {
            font-size: 32px;
            color: #fff;
            font-weight: 800;
        }
        .create-account-section p{
            color: #fff;
            line-height: 1.8;
        }
        @media(max-width: 650px){
            body{
                padding: 40px 0px;
                height: auto !important;
            }
        }
        .form-login label.error{
            color: #B94A48 !important;
        }
    </style>

</head>
<body class="login" style="background: url('{{ asset('') }}admin-assets/assets/img/5454008.jpg'); background-color: #767c8a; background-size: contain; background-position: center; background-repeat: no-repeat;">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <form method="POST" class="form-login" action="{{ route('vendor.check_login') }}" >
                    @csrf
                    <input type="hidden" name="admin" value="1">
                    <div class="row">
                        <div class="col-md-12 text-center mb-4">
                            <img alt="logo" src="{{ asset('') }}admin-assets/assets/img/new-logo.png" style="height: 60px;" class="theme-logo">
                        </div>
                        <div class="col-md-12">

                            <div class="mb-4">
                                <label for="inputEmail" style="color:#000 !important;" class="">Email address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="mb-4">
                            <label for="inputPassword" style="color:#000 !important;" class="">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                <i calss="fa fa-eye"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                            <button type="submit" class="btn btn-gradient-dark btn-rounded btn-block ml-0">Login</button>

                            <!-- <div style="margin-top: 30px; text-align: center;">
                                <p class="text-muted"> Don't have an account? <b> <a href="{{url('/register')}}" class="text-white"> SignUp </a> </b> </p>
                            </div> -->

                            <div style="margin-top: 30px; text-align: right;">
                                <p class="text-muted"> <a href="{{url('/forgot-password')}}" class="text-black"> Forgot Password </a> </b> </p>
                            </div>
 
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 mb-4">
                    <div class="create-account-section h-100">
                        <span>New Provider</span>
                        <h3  class="mt-3 mb-2">Create an Account</h3>
                        <p class="mb-4">Whether you are a vendor or outlet owner, Deals Drive registration process is more easier than you think. Simply fill out the registration details to register with Deals Drive. Vendors can then provide their company name, products and offers to be sold, and other important business details through the vendor panel.</p>
                        <a href="{{url('/register')}}" class="btn btn-gradient-dark btn-rounded btn-block ml-0">Create an account</a>
                    </div>
            </div>
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin-assets/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin-assets/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin-assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/jqvalidation/jqBootstrapValidation-1.3.7.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script src="{{ asset('admin-assets/plugins/notification/toastr/toastr.min.js') }}"></script>
    <script>
        // Toaster options
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "rtl": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": 300,
            "hideDuration": 1000,
            "timeOut": 2000,
            "extendedTimeOut": 1000,
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        $(document).ready(function() {
        @if (\Session::has('error') && \Session::get('error') != null)
            toastr["error"]("{{\Session::get('error')}}");
        @endif

        })
        $(".form-login").submit(function(e) {
            e.preventDefault();
        }).validate({
            rules: {
                username: {
                    required: true,
                    email: true
                },
                password: "required"
            },
            messages: {
                username: {
                    required: "Password field is required",
                    email: "Please enter valid email address"
                },
                password: "Password field is required"
            },
            submitHandler: function(form) {
                $.ajax({
                    type:'POST',
                    url: "{{ route("vendor.check_login")}}",
                    data:{
                        '_token': $('input[name=_token]').val(),
                        'email': $("#email").val(),
                        'password': $("#password").val(),
                        'timezone': Intl.DateTimeFormat().resolvedOptions().timeZone
                    },
                    success: function(response) {
                        if(response.success){
                            toastr["success"](response.message);
                            setTimeout(function(){
                                window.location.href = "{{ route("vendor.dashboard")}}";
                            }, 1000);

                        } else {
                            toastr["error"](response.message);
                        }
                    }
                });
            }
        });
    </script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>
