<!-- - var menuBorder = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="AFINDO">
        <title>Afindo Template</title>
        <link rel="apple-touch-icon" href="{{ asset("app-assets/images/ico/logo.svg") }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset("app-assets/images/ico/logo.svg") }}">
        <link
            href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
            rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/vendors.min.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/forms/icheck/icheck.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/forms/icheck/custom.css") }}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/bootstrap.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/bootstrap-extended.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/colors.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/components.css") }}">
        <!-- END: Theme CSS-->

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset("app-assets/css/core/menu/menu-types/vertical-menu.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/core/colors/palette-gradient.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/pages/login-register.css") }}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/style.css") }}">
        <!-- END: Custom CSS-->

    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->

    <body class="vertical-layout vertical-menu 1-column blank-page" data-open="click" data-menu="vertical-menu"
        data-col="1-column">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="row flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                                <div class="card border-grey border-lighten-3 m-0">
                                    <div class="card-header border-0">
                                        <div class="card-title text-center">
                                            <div class="p-1"><img
                                                    src="{{ asset("app-assets/images/logo/logo.png") }}"
                                                    alt="branding logo"></div>
                                        </div>
                                        <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                            <span>Login with
                                                Afindo</span>
                                        </h6>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form id="loginForm" class="form-horizontal form-simple" method="post"
                                                novalidate>
                                                {{ csrf_field() }}
                                                <fieldset class="form-group position-relative has-icon-left mb-0">
                                                    <input name="UserName" type="text"
                                                        class="form-control form-control-lg" id="user-name"
                                                        placeholder="Your Username" required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input name="password" type="password"
                                                        class="form-control form-control-lg" id="user-password"
                                                        placeholder="Enter Password" required>
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                    <!-- Toggle Show/Hide Password Button -->
                                                    <div class="form-control-position" style="right: 10px;">
                                                        <i class="feather icon-eye" id="toggle-password"
                                                            style="cursor: pointer;"></i>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 col-12 text-center text-sm-left"></div>
                                                    <div class="col-sm-6 col-12 text-center text-sm-right">
                                                        <a href="recover-password.html" class="card-link">Lupa
                                                            Password?</a>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                    <i class="feather icon-unlock"></i> Login
                                                </button>
                                            </form>

                                            <div id="error-message" style="color: red; display: none;"></div>

                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="">
                                            <p class="float-sm-right text-center m-0">Member baru? <a
                                                    href="register-simple.html" class="card-link">Register</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- END: Content-->

        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset("app-assets/vendors/js/vendors.min.js") }}"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{ asset("app-assets/vendors/js/forms/icheck/icheck.min.js") }}"></script>
        <script src="{{ asset("app-assets/vendors/js/forms/validation/jqBootstrapValidation.js") }}"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{ asset("app-assets/js/core/app-menu.js") }}"></script>
        <script src="{{ asset("app-assets/js/core/app.js") }}"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="{{ asset("app-assets/js/scripts/forms/form-login-register.js") }}"></script>
        <!-- END: Page JS-->
        <script>
            document.getElementById('toggle-password').addEventListener('click', function(e) {
                const passwordInput = document.getElementById('user-password');
                const icon = e.target;
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('icon-eye');
                    icon.classList.add('icon-eye-off');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('icon-eye-off');
                    icon.classList.add('icon-eye');
                }
            });

            document.getElementById('loginForm').addEventListener('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let errorMessageDiv = document.getElementById('error-message');
                errorMessageDiv.style.display = 'none';
                errorMessageDiv.innerHTML = '';

                let userName = formData.get('UserName');
                let password = formData.get('password');
                if (!userName || !password) {
                    errorMessageDiv.innerHTML = 'Username and password are required!';
                    errorMessageDiv.style.display = 'block';
                    return;
                }

                fetch("{{ url("proses_login") }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                            'Accept': 'application/json',
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = '{{ route("home") }}';
                        } else {
                            errorMessageDiv.innerHTML = data.message;
                            errorMessageDiv.style.display = 'block';
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        errorMessageDiv.innerHTML = 'An error occurred while logging in.';
                        errorMessageDiv.style.display = 'block';
                    });
            });
        </script>
    </body>
    <!-- END: Body-->

</html>
