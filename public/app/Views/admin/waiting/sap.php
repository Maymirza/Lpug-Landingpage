<?= $this->extend('layout/template');  ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1><?= $title ?></h1>
    <form action="/admin/wsap" method="post">
        <?= csrf_field(); ?>
        <div class="input-group" style="width: 30%;">
            <select name="periode" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                <option selected> Select Plan Period</option>
                <?php foreach ($periperi as $p) : ?>
                    <option value={"perios":"<?= $p['periode'] ?>","year":"<?= $p['year'] ?>"}><?= $p['value'] ?><span><?= $p['year'] ?></span></option>
                <?php endforeach; ?>
            </select>
            <div class="input-group-append">
                <button class="btn btn-success" type="submit">Search</button>
            </div>
        </div>
    </form>

    <form class="user" method="post" action="/admin/approves">

        <?= csrf_field(); ?>
        <div style="padding-left: 900px;" class="hallow">
            <label for="start">Start date:
                <input type="date" id="start" name="dates" required>
                <span class="validity"></span>
            </label>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Npm</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1 ?>
                <?php foreach ($sap as $o) : ?>
                    <tr>
                        <th><?= $i ?></th>
                        <th><?= $o['name'] ?></th>
                        <th><?= $o['npm'] ?></th>
                        <th>
                            <div class="form-check">
                                <input class="form-check-input position-static" type="checkbox" name="waitaps[]" value="<?= $o['npm'] ?>">
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