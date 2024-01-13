<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Login &mdash; Stisla</title>

        <!-- General CSS Files -->
        <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">
        
        <style>
            :-webkit-autofill { /* also works for firefox! */
                filter:none; /* u need this for firefox */
                box-shadow: 0 0 0 100px whitesmoke inset;
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div id="app bg-gray-900">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                            <div class="card shadow-md shadow-gray-200">
                                <div class="card-header">
                                    <h4>Register</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ url('register') }}" class="needs-validation" novalidate="">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                                            <div class="invalid-feedback"> Please fill in your email </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" class="form-control" name="email" tabindex="2" required autofocus>
                                            <div class="invalid-feedback"> Please fill in your email </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Password</label>
                                            </div>
                                            <input id="password" type="password" class="form-control" name="password" tabindex="3" required>
                                            <div class="invalid-feedback"> Please fill in your password </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password_confirmation" class="control-label">Password Confirmation</label>
                                            </div>
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" tabindex="4" required>
                                            <div class="invalid-feedback"> Please fill in your password </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="role_id">Role</label>
                                            <select id="role_id" class="form-control" name="role_id" tabindex="1" required autofocus>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                            <div class="invalid-feedback"> Please fill in your email </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="5" id="remember-me">
                                                <label class="custom-control-label" for="remember-me">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4"> Login </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-5 text-muted text-center"> Don't have an account? <a href="{{ url('/register') }}">Create One</a>
                            </div>
                            <div class="simple-footer"> Copyright &copy; IPOS 5 2024 </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- General JS Scripts -->
        <script src="assets/modules/jquery.min.js"></script>
        <script src="assets/modules/popper.js"></script>
        <script src="assets/modules/tooltip.js"></script>
        <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="assets/modules/moment.min.js"></script>
        <script src="assets/js/stisla.js"></script>
        <!-- JS Libraies -->
        <!-- Page Specific JS File -->
        <!-- Template JS File -->
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>