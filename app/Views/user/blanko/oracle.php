<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">



    <?php if ($user['oracle'] == session()->get('npm')) : ?>
        <div class="jumbotron">
            <h1 class="display-4">Hello, <?= session()->get('name') ?></h1>
            <p>Selamat datang di pelatihan <?= $user['course'] ?> universitas gunadarma , </p>
            <p>mengingat sedang terjadinya pandemic covid-19 maka pelatihan akan dilakukan secara online , berikut adalah tata cara pelatihan online</p>
            <p class="lead">=========Tata Cara pelatihan sistem online=========</p>
            <p>Sesi Pagi : 09.00-17.00</p>
            <p>Sesi Pagi : 17.30-21.00</p>
            <p>1.Silahkan login pada web pendaftaran.ecourse456.com , pada tanggal pelatihan yang telah ditentukan</p>
            <p>2.Silahkan klik tombol zoom pada dashboard</p>
            <p>Untuk tata tertib dan tata cara, pelaksanaan secara lengkap akan disampaikan pada pertemuan pertama</p>
            <hr class="my-4">
            <p>Regards ,LPUG</p>
        </div>


    <?php endif; ?>
    <?php if ($user['oracle'] == 2) : ?>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1>Silahkan Melihat Virtual Account anda pada student site ,</h1>
                <h3>Jika sudah membayar silahkan upload bukti transaksi pada kolom yang telah disediakan</h3>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/user/uoracle" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group files">
                        <label class="text">Upload your proof of payment for oracle course
                        </label>
                        <input type="file" class="form-control <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" name="image">
                        <div class="invalid-feedback">
                            <?= $validation->getError('image'); ?>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit </button>
                </form>
            </div>


        </div>
    <?php endif; ?>

    <?= $this->endSection();  ?>