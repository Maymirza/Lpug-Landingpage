<?= $this->extend('layout/template');  ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="cointainer-fluid">
        <?php if (session()->getFlashdata('pesan') == true) : ?>
            <div class="alert alert-warning" role="alert">
                <?= session()->getFLashdata('pesan') ?>
            </div>
        <?php endif; ?>
        <div class="card mb-4" style="max-width:670px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="/img/<?= $user['image'] ?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                            </div>
                            <input type="text" readonly value="<?= $user['name'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Npm</span>
                            </div>
                            <input type="text" readonly value="<?= $user['npm'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Phone</span>
                            </div>
                            <input type="text" readonly value="<?= $user['phone'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Class</span>
                            </div>
                            <input type="text" readonly value="<?= $user['kelas'] ? "$user[kelas]" : "-"  ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Status</span>
                            </div>
                            <input type="text" readonly value="<?= $user['status'] ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>

                        <?php if ($user['kelas'] == true) : ?>
                            <button class="btn btn-primary" href=''>Link Zoom</button>
                        <?php endif; ?>

                        <?php if ($user['status'] == 'Waiting') : ?>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">
                                Select Period And Course
                            </button>
                        <?php endif; ?>
                        <?php if ($user['status'] == 'Telah Lulus') : ?>
                            <form action="/user/download" method="POST">
                                <button type="submit" class="btn btn-success fa fa-download">
                                    <input type="text" value="<?= session()->get('npm') ?>" hidden name="getdatas">
                                    Download Certificate
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>

                </div>

            </div>


        </div>

    </div>


    <!-- /.container-fluid -->

    <!-- End of Main Content -->

    <?= $this->endSection();  ?>