<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">


    <?php if ($user['cisco_malam'] == session()->get('npm')) : ?>
        <div class="jumbotron">
            <h1 class="display-4">Hello, <?= session()->get('name') ?></h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex dolore magnam voluptatem fugiat minus fuga magni saepe cumque neque facere corporis illum, ipsum accusantium blanditiis exercitationem delectus! Error, iure iste.</p>
            <p class="lead">=========Tata Cara kursus sistem online=========</p>
            <hr class="my-4">
            <p>Regards ,LPUG</p>
        </div>


    <?php endif; ?>
    <?php if ($user['cisco_malam'] == 2) : ?>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1>Silahkan Melihat Virtual Account anda pada student site ,</h1>
                <h3>Jika sudah membayar silahkan upload bukti transaksi pada kolom yang telah disediakan</h3>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/user/uciscom" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group files">
                        <label class="text">Upload your proof of payment for the course cisco_malam
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