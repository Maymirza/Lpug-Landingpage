<?= $this->extend('layout/template');  ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <form action="/user/wciscosabtu" method="post">
        <div class="input-group">
            <select name="periode" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                <option selected> Select Plan Period</option>
                <?php foreach ($periperi as $p) : ?>
                    <option value={"perios":"<?= $p['periode'] ?>","year":"<?= $p['year'] ?>"}><?= $p['value'] ?><span><?= $p['year'] ?></span></option>
                <?php endforeach; ?>
            </select>
            <div class="input-group-append">
                <button class="btn btn-success" type="submit">Search</button>
            </div>
    </form>
</div>
<br>

<table class="table">
    <thead>
        <tr>
            <th scope="col" style="background-color:thistle;">#</th>
            <th scope="col" style="background-color:thistle;">Nama</th>
            <th scope="col" style="background-color:thistle;">Npm</th>
        </tr>
    </thead>
    <tbody>

        <?php $i = 1 ?>
        <?php foreach ($ciscosabtu as $o) : ?>
            <tr>
                <th><?= $i ?></th>
                <th><?= $o['name'] ?></th>
                <th><?= $o['npm'] ?></th>
                <th>
                </th>
            </tr>
            <?php $i++ ?>
    </tbody>
<?php endforeach; ?>
</table>





<?= $this->endSection();  ?>