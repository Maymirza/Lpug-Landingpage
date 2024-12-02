<?= $this->extend('layout/template');  ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <?php if (session()->getFlashdata('wrong')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('wrong'); ?>
        </div>
    <?php endif; ?>
    <form action="/user/cgpswd" method="post">
        <?= csrf_field(); ?>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Old Password</span>
            </div>
            <input style="width: 30%;" type="Password" name="oldpassword" class="form-control <?= ($validation->hasError('oldpassword')) ? 'is-invalid' : ''; ?>" placeholder="..." aria-label="Username" aria-describedby="basic-addon1">
            <div class="invalid-feedback">
                <?= $validation->getError('oldpassword'); ?>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">New Password</span>
            </div>
            <input type="password" class="form-control <?= ($validation->hasError('newpassword')) ? 'is-invalid' : ''; ?>" name="newpassword" placeholder="..." aria-label="Username" aria-describedby="basic-addon1">
            <div class="invalid-feedback">
                <?= $validation->getError('newpassword'); ?>
            </div>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Confirm Password</span>
            </div>
            <input type="password" class="form-control <?= ($validation->hasError('confirmpassword')) ? 'is-invalid' : ''; ?>" name="confirmpassword" placeholder="..." aria-label="Username" aria-describedby="basic-addon1">
            <div class="invalid-feedback">
                <?= $validation->getError('confirmpassword'); ?>
            </div>
        </div>
        <button type="submit" class="btn btn-purple"> Change </button>
    </form>
    <?= $this->endSection();  ?>