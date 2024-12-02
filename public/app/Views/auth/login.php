<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/css/chat.css" rel="stylesheet">
    <link href="../assets/css/typing.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<style>
    .tester {
        background-color: #c2bfc7;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='18' viewBox='0 0 100 18'%3E%3Cpath fill='%236200ff' fill-opacity='0.36' d='M61.82 18c3.47-1.45 6.86-3.78 11.3-7.34C78 6.76 80.34 5.1 83.87 3.42 88.56 1.16 93.75 0 100 0v6.16C98.76 6.05 97.43 6 96 6c-9.59 0-14.23 2.23-23.13 9.34-1.28 1.03-2.39 1.9-3.4 2.66h-7.65zm-23.64 0H22.52c-1-.76-2.1-1.63-3.4-2.66C11.57 9.3 7.08 6.78 0 6.16V0c6.25 0 11.44 1.16 16.14 3.42 3.53 1.7 5.87 3.35 10.73 7.24 4.45 3.56 7.84 5.9 11.31 7.34zM61.82 0h7.66a39.57 39.57 0 0 1-7.34 4.58C57.44 6.84 52.25 8 46 8S34.56 6.84 29.86 4.58A39.57 39.57 0 0 1 22.52 0h15.66C41.65 1.44 45.21 2 50 2c4.8 0 8.35-.56 11.82-2z'%3E%3C/path%3E%3C/svg%3E");
    }

    /* .tester2 {
        background-color: #deccf9;
        background-image: url("data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%236200ff' fill-opacity='0.65' fill-rule='evenodd'%3E%3Cpath d='M5 0h1L0 6V5zM6 5v1H5z'/%3E%3C/g%3E%3C/svg%3E");
    } */

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

    .bold {

        color: blue;
    }

    .info-panel .row {
        background-color: white;
        position: fixed;
        z-index: 1;
        margin: auto;
        margin-top: 70px;
        margin-left: 90px;
        width: 37%;
        padding-left: 5px;
        border-radius: 10px;
        color: palevioletred;

    }

    @media (min-width: 992px) {
        .info-panel .row {
            background-color: white;
            position: fixed;
            z-index: 1;
            margin: auto;
            margin-left: 300px;
            margin-top: 15px;
            padding-left: 70px;
            width: 20%;
            border-radius: 10px;
            color: palevioletred;

        }
    }

    .info-panel h1 {
        font-weight: bold;
        text-shadow: 3px 2px skyblue;

    }

    .imgchat {
        width: 50px;
    }
</style>

<body class="bg-gradient-primary tester">

    <br><br><br>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-10 info-panel">
                <div class="row">
                    <h1 style="padding-left: 20px;">Login</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">

                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row purple tester2">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <br>
                                        <br>

                                        <?php if (session()->getFlashdata('pesan')) : ?>
                                            <div class="alert alert-success" role="alert">
                                                <?= session()->getFlashdata('pesan'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (session()->getFlashdata('messageWo')) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= session()->getFlashdata('messageWo'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <form class="user" method="post" action="/auth/Llogin">
                                        <?= csrf_field(); ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?= ($validation->hasError('npm')) ? 'is-invalid' : ''; ?>" id=" npm" name="npm" placeholder="Enter Npm / Nik">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('npm'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id=" password" name="password" placeholder="Password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!-- <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div> -->
                                        </div>
                                        <button type="submit" class="btn btn-purple btn-user btn-block">Login</button>
                                    </form>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="medium bold" href="/auth/registration">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="medium bold" href="/auth/forgotpswd">Forgot password!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <!-- <div class="chatbox">
            <div class="chatbox__support">
                <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img src="../chatbox/image.png" alt="image">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">Chat support</h4>
                        <p class="chatbox__description--header">There are many variations of passages of Lorem Ipsum available</p>
                    </div>
                </div>
                <div class="chatbox__messages">
                    <div>
                        <div class="messages__item messages__item--visitor">
                            Can you let me talk to the support?
                        </div>
                        <div class="messages__item messages__item--operator">
                            Sure!
                        </div>
                        <div class="messages__item messages__item--visitor">
                            Need your help, I need a developer in my site.
                        </div>
                        <div class="messages__item messages__item--operator">
                            Hi... What is it? I'm a front-end developer, yay!
                        </div>
                        <div class="messages__item messages__item--typing">
                            <span class="messages__dot"></span>
                            <span class="messages__dot"></span>
                            <span class="messages__dot"></span>
                        </div>
                    </div>
                </div>
                <div class="chatbox__footer">
                    <img src="../chatbox/icons/emojis.svg" alt="">
                    <img src="../chatbox/icons/microphone.svg" alt="">
                    <input type="text" placeholder="Write a message...">
                    <p class="chatbox__send--footer">Send</p>
                    <img src="../chatbox/icons/attachment.svg" alt="">
                </div>
            </div>
            <div class="chatbox__button">
                <button>button</button>
            </div>
        </div> -->
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
    <script>
        $('.alert').delay(3000).slideUp('slow');
    </script>

    <script src="../assets/js/Chat.js"></script>
    <script src="../assets/js/app.js"></script>
</body>

</html>