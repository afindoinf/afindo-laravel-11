<!-- - var menuBorder = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description"
            content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords"
            content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>Afindo Template</title>
        <link rel="apple-touch-icon" href="{{ asset("app-assets/images/ico/logo.svg") }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset("app-assets/images/ico/logo.svg") }}">
        <link
            href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
            rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/vendors.min.css") }}">
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
        <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/pages/error.css") }}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/style.css") }}">
        <!-- END: Custom CSS-->

    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->

    <body class="vertical-layout vertical-menu 1-column   blank-page blank-page" data-open="click"
        data-menu="vertical-menu" data-col="1-column">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-lg-4 col-md-8 col-10 p-0">
                                <div class="card-header bg-transparent border-0">
                                    <h2 class="error-code text-center mb-2">500</h2>
                                    <h3 class="text-uppercase text-center">Internal Server Error</h3>
                                </div>
                                <div class="card-content">
                                    <div class="row py-2">
                                        <div class="col-12 col-sm-12 col-md-12 mb-1">
                                            <a href="{{ url("/") }}" class="btn btn-primary btn-block"><i
                                                    class="feather icon-home"></i> Home</a>
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
        <script src="{{ asset("app-assets/vendors/js/forms/validation/jqBootstrapValidation.js") }}"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{ asset("app-assets/js/core/app-menu.js") }}"></script>
        <script src="{{ asset("app-assets/js/core/app.js") }}"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="{{ asset("app-assets/js/scripts/forms/form-login-register.js") }}"></script>
        <!-- END: Page JS-->

    </body>
    <!-- END: Body-->

</html>
