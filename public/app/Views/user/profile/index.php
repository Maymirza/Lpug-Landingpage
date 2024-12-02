<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<style>
    .half {
        width: 37%;
    }


    .center {
        bottom: 300px;
        left: 40px;
    }

    .size {

        height: 90%;
        width: 100%;
        object-fit: contain;
    }

    .move {
        left: 30px;
    }
</style>
<div class="container-fluid">
    <div class="card mb-3 move" style="max-width: 540px;">
        <?php if (session()->getFlashdata('Update')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('Update'); ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('messageSu')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('messageSu'); ?>
            </div>
        <?php endif; ?>
        <form action="/user/update/<?= $user['npm']; ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/img/<?= $user['image'] ?>" class="card-img size" style="margin-left: 50px;">
                    <div class="col-sm-8">
                        <div class="form-file form-file-sm">
                            <input type="file" class="form-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image">
                            <div class="invalid-feedback">
                                <?= $validation->getError('image'); ?>
                            </div>
                            <label class="form-file-label center" for="customFileSm">
                                <span class="form-file-button center" id="image">Browse</span>
                            </label>
                            <input type="hidden" name="email" value="<?= $user['email']; ?>">
                            <input type="hidden" id="imageLama" name="imageLama" value="<?= $user['image']; ?>">
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card-body" style="margin-left: 50px;">
                        <div class="input-group mb-3">
                            <span class="input-group-text half" id="basic-addon1"> Npm</span>
                            <input type="text" id="Npm" name="npm" class="form-control <?= ($validation->hasError('npm')) ? 'is-invalid' : ''; ?>" value="<?= (old('npm')) ? old('npm') :  $user['npm']; ?>" readonly>
                            <div class="invalid-feedback">
                                <?= $validation->getError('npm'); ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text half">Full Name</span>

                            <input type="text" size="50" id="name" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" value="<?= (old('name')) ? old('name') :  $user['name']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('name'); ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text half" id="basic-addon1">Phone</span>
                            <input type="integer" id="phone" name="phone" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>" value="<?= (old('phone')) ? old('phone') :  $user['phone']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('phone'); ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text half" id="basic-addon1">Email</span>
                            <input type="email" id="email" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= (old('email')) ? old('email') :  $user['email']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                        <div class="input-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" style="margin-left: 30px;">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>





    <?= $this->endSection();  ?>