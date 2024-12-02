<?= $this->extend('layout/template');  ?>
<?= $this->section('content'); ?>

<div class="container-fluid">


    <h1><?= $title ?></h1>

    <?php foreach ($periode as $p) : ?>
        <form class="user" method="post" action="/admin/periodsora">
            <?= csrf_field(); ?>
            <select class="custom-select dor" name="periode">
                <option selected>Periode</option>
                <option value="<?= $p['periode'] ?>"><?= $p['periode'] ?></option>
            </select>
        <?php endforeach; ?>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Npm</th>
                    <th scope="col">Course</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1 ?>
                <?php foreach ($user as $o) : ?>
                    <tr>
                        <th><?= $i ?></th>
                        <th><?= $o['name'] ?></th>
                        <th><?= $o['npm'] ?></th>
                        <th>Oracle</th>
                        <th>
                            <div class="form-check">
                                <input class="form-check-input position-static" type="checkbox" name="periodora[]" value="<?= $o['npm'] ?>">
                            </div>
                        </th>
                    </tr>
                    <?php $i++ ?>
            </tbody>
        <?php endforeach; ?>
        </table>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>







        <?= $this->endSection();  ?>