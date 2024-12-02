<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/admin/uploadcertif" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group files">
                    <label class="text">Upload Data Certificate
                    </label>
                    <input type="file" class="form-control" name="files[]" multiple="">
                </div>
                <button class="btn btn-primary" type="submit">Submit </button>
            </form>
        </div>


    </div>

    <?= $this->endSection();  ?>