<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .btn-purple {
        color: #fff;
        background-color: #8B008B;
        border-color: #8B008B;
    }

    .btn-purple:hover {
        color: #fff;
        background-color: #2e59d9;
        border-color: #2653d4;
    }

    .purple {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;
        background-color: #D2B4DE;
    }
</style>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 purple">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Reset Password</h1>
                                        <p class="mb-4 text-gray-900">Change your password on field below</p>
                                    </div>
                                    <form class="user" method="post" action="/auth/changepassword">
                                        <?= csrf_field(); ?>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id=" password" name="password" placeholder="Enter new password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user <?= ($validation->hasError('confirm_password')) ? 'is-invalid' : ''; ?>" id=" confirm_password" name="confirm_password" placeholder="confirm_password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('confirm_password'); ?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-purple btn-user btn-block">Submit </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/auth/registration">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="/auth/login">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>