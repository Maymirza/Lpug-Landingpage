<?= $this->extend('layout/template');  ?>
<?= $this->section('content'); ?>

<style>

</style>
<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="input-group flex-nowrap">
        <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping">Virtual Account</span>
        </div>
        <input type="number" class="form-control" name="va" id="va" placeholder="..">
    </div>
    <br>
    <div class="input-group flex-nowrap">
        <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping">Npm</span>
        </div>
        <input type="text" class="form-control" name="npm" id="npm" placeholder="..">
    </div>
    <br>
    <div class="input-group flex-nowrap">
        <div class="input-group-prepend">
            <span class="input-group-text" id="addon-wrapping">Rp.</span>
        </div>
        <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="..">
    </div>
    <br>
    <div class="form-group files">
        <label class="text">Upload Invoice
        </label>
        <input type="file" class="form-control" name="image">
        <div class="invalid-feedback">

        </div>
    </div>
    <button type="submit" class="btn btn-primary"> Submit</button>



    <?= $this->endSection();  ?>