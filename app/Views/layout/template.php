<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://use.fontawesome.com/6e6b006101.js"></script>
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/css/cssgw.css" rel="stylesheet">

</head>

<body id="page-top">



    <?= $this->include('layout/sidebar'); ?>
    <?= $this->include('layout/navbar'); ?>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; LPUGDEV 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-purple" href="/auth/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ===============ModalPeriode==============
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Make Period</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/admin/addperiod">
                        <div class="form-group">
                            <label for="cars">Choose a course:</label>
                            <select id="jenis" name="jenis">
                                <option value="oracle">Oracle</option>
                                <option value="sap">Sap</option>
                                <option value="cisco">Cisco</option>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                </div>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="period" id="period">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-purple">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div> -->
    <!-- =======================dashboard modal================= -->
    <form action="/user/adperiods" method="post">
        <?= csrf_field(); ?>
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Select Period And Course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php if (session()->get('role_id') == 2) : ?>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Choose</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="periode">
                                    <option selected> Select Plan Period</option>
                                    <?php foreach ($periperi as $p) : ?>
                                        <option value={"perios":"<?= $p['periode'] ?>","year":"<?= $p['year'] ?>"}><?= $p['value'] ?><span><?= $p['year'] ?></span></option>
                                    <?php endforeach; ?>
                                </select>

                                <!-- <input name="year" type="number" placeholder="YYYY" min="2017" max="2100"> -->
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Choose</label>
                                </div>
                                <select name="course" class="custom-select" id="inputGroupSelect01">
                                    <option selected>Course</option>
                                    <option value="oracle">OWDP [Admin] ----Sabtu----</option>
                                    <option value="sap">SAP [PLM200] ----Sabtu----</option>
                                    <option value="cisco_malam">CNAP ----Malam----</option>
                                    <option value="cisco_sabtu">CNAP ----Sabtu----</option>
                                </select>
                            </div>
                        </div>

                        <p style="padding-left: 100px;">The course will be open when quota fulfilled</p>

                    <?php endif; ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
    </form>
    <!-- end modal  -->



    </div>
    </div>
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <img class="modal-content" id="img01">
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>



    <!-- ========================IMG================= -->
    <!-- The Modal -->
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.card-img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#image").change(function() {
            readURL(this);
        });
    </script>

    <script>
        $('.custom-control-input').on('click', function() {
            const is_active = $(this).data('rule');
            const data_id = $(this).data('id');

            console.log(data_id);
            $.ajax({
                url: "<?= base_url('admin/activeinfo'); ?>",

                type: 'post',

                data: {
                    data_id: data_id,
                    is_active: is_active

                },
                success: function(data) {

                },
                error: function(xhr, status, error) {
                    alert(xhr + status + error);
                },

            });
        });
    </script>





    <!-- <script>
        document.querySelector("input[type=number]")
            .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
    </script> -->
    <script>
        $('.alert').delay(3000).slideUp('slow');
    </script>
    <script>
        document.querySelector("input[type=number]")
            .oninput = e => console.log(new Date(e.target.valueAsNumber, 0, 1))
    </script>


</body>

</html>