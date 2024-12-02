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
    <link href="/assets//vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .backroundpurple {
        background-color: #D2B4DE;

    }

    .purple {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;

        background-color: #D2B4DE;
    }

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

    .center {
        margin-left: 60px;
    }

    .center label {
        text-shadow: aqua;
        color: blueviolet;
        font-weight: bold;
    }

    .left {
        margin-left: 10px;
    }

    .left label {
        text-shadow: aqua;
        color: blueviolet;
        font-weight: bold;
    }

    .bg-register-image {
        margin-top: 100px;
        margin-left: -10px;

    }

    .dor label {
        font-weight: bold;
        margin-top: 20ox;
    }

    .info-panel .row {
        background-color: white;
        position: absolute;
        z-index: 1;
        margin: auto;
        margin-top: 20px;
        margin-left: -12px;
        width: 100%;
        padding-left: 23px;
        border-radius: 10px;
        color: palevioletred;

    }

    @media (min-width: 992px) {
        .info-panel .row {
            background-color: white;
            position: absolute;
            z-index: 1000;
            margin: auto;
            margin-left: 260px;
            margin-top: -50px;
            padding-left: 50px;
            width: 35%;
            border-radius: 10px;
            color: palevioletred;

        }
    }

    .info-panel h1 {
        font-weight: bold;
        text-shadow: 3px 2px skyblue;

    }
</style>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="row justify-content-center">
                <div class="col-10 info-panel">
                    <div class="row">
                        <h1>Re-Registration</h1>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="purple">
                    <?php if (session()->getFlashdata('salah') == true) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('salah') ?>
                        </div>
                    <?php endif; ?>
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <!-- <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1> -->
                                    <br>
                                </div>
                                <form class="user" method="post" action="/auth/signup">
                                    <?= csrf_field(); ?>

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="Full name (For Certificate)" autofocus value="<?= old('name'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('name'); ?>
                                        </div>
                                    </div>
                                    <div class="dor">
                                        <!-- <label class="form-check-label">Majors</label>
                                        <div class="form-check form-check-inline  left">
                                            <input class="form-check-input" onclick="s2ia()" style="visibility: visible;" type="checkbox" name="sia" id="s2sia" value="S2SIA">
                                            <label class="form-check-label" for="s2sia">S2 SIA</label>
                                        </div>
                                        <div class="form-check form-check-inline  left">
                                            <input class="form-check-input" name="sib" type="checkbox" id="s2sib" value="S2SIB">
                                            <label class="form-check-label" for="s2sib">S2 SIB</label>
                                        </div>
                                        <div class="form-check form-check-inline  left">
                                            <input class="form-check-input" name="plsi" type="checkbox" id="s2plsi" value="S2PLSI">
                                            <label class="form-check-label" for="s2plsi">S2 PLSI</label>
                                        </div>
                                        <div class="form-check form-check-inline  left">
                                            <input class="form-check-input" name="elektro" type="checkbox" id="s2elektro" value="S2ELEKTRO">
                                            <label class="form-check-label" for="s2elektro">S2 ELEKTRO</label>
                                        </div> -->
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Majors</label>
                                            </div>
                                            <select name="majors" class="custom-select" id="inputGroupSelect01">
                                                <option selected>Choose...</option>
                                                <option value="S2SIA">S2 SIA</option>
                                                <option value="S2SIB">S2 SIB</option>
                                                <option value="S2PLSI">S2 PLSI</option>
                                                <option value="S2ELEKTRO">S2 ELEKTRO</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <input type="checkbox" onclick="hide()" aria-label="Checkbox for following text input" id="hallo">
                                                    <label class="form-check-label" for="hallo">Other</label>
                                                </div>
                                            </div>

                                            <input type="text" name="others" class="form-control" id="sia" aria-label="Text input with checkbox" style="visibility: hidden;">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?= ($validation->hasError('npm')) ? 'is-invalid' : ''; ?>" id="npm" name="npm" placeholder="NPM / NIK" autofocus value="<?= old('npm'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('npm'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control form-control-user <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>" id="phone" name="phone" placeholder="Phone" autofocus value="<?= old('phone'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('phone'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="Email Address" autofocus value="<?= old('email'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!-- <input type="text" class="form-control form-control-user <?= ($validation->hasError('majors')) ? 'is-invalid' : ''; ?>" id="majors" name="majors" placeholder="majors" autofocus value="<?= old('majors'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('majors'); ?>
                                        </div> -->

                                            <hr>
                                            <div class="form-group row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" placeholder="Password">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('password'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="password" class="form-control form-control-user <?= ($validation->hasError('confirm_password')) ? 'is-invalid' : ''; ?>" id=" confirm_password" name="confirm_password" placeholder="Repeat Password">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('confirm_password'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-purple btn-user btn-block">Register Account</button>
                                </form>
                            </div>

                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <div class="text-center">
                                <a class="small" href="/">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function hide() {
            const sia = document.getElementById("sia");
            const tok = document.getElementById("inputGroupSelect01");
            const selektro = document.getElementById("s2elektro");
            if (sia.style.visibility === "visible") {
                sia.style.visibility = "hidden";
                tok.style.visibility = "visible";
                tok.disabled = false;
                sia.disabled = true;

            } else {
                sia.style.visibility = "visible";
                // tok.style.visibility = "hidden";
                tok.disabled = true;
                sia.disabled = false;

            }
        }
    </script>
    <script>
        $('.alert').delay(3000).slideUp('slow');
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

</body>

</html>