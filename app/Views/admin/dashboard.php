<?= $this->extend('layout/template');  ?>
<?= $this->section('content'); ?>
<style>
    .my-custom-scrollbar {
        position: relative;
        height: 200px;
        overflow: auto;
    }

    .table-wrapper-scroll-y {
        display: block;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="column">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <form action="/admin/updateperiode" method="post">
                        <?= csrf_field(); ?>
                        <h5 class="card-title">Change Period And course</h5>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Npm</span>
                            </div>
                            <input type="text" name="npm" class="form-control" placeholder="Input here" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <select name="periode" class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option selected> Select Plan Period</option>
                            <?php foreach ($periperi as $p) : ?>
                                <option value={"perios":"<?= $p['periode'] ?>","year":"<?= $p['year'] ?>"}><?= $p['value'] ?><span><?= $p['year'] ?></span></option>
                            <?php endforeach; ?>
                        </select>
                        <hr>
                        <select name="course" class="custom-select" id="inputGroupSelect01">
                            <option selected>Course</option>
                            <option value="oracle">OWDP [Admin] ----Sabtu----</option>
                            <option value="sap">SAP [PLM200] ----Sabtu----</option>
                            <option value="cisco_malam">CNAP ----Malam----</option>
                            <option value="cisco_sabtu">CNAP ----Sabtu----</option>
                        </select>
                        <hr>

                        <button type="submit" class="btn btn-primary">Submit</button>


                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <form action="/admin/addperiod" method="post">
                    <?= csrf_field(); ?>
                    <h5 class="card-title">ADD New Period</h5>
                    <select name="course" class="custom-select" id="inputGroupSelect01">
                        <option selected>Period</option>
                        <option value="ond">Oktober-November-Desember</option>
                        <option value="jfm">Januari-Februari-Maret</option>
                        <option value="amj">April-Mei-Juni</option>
                        <option value="jas">July-Agustus-September</option>
                    </select>
                    <hr>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Year</span>
                        </div>

                        <input type="number" name="year" placeholder="YYYY" min="2017" max="2100" id="datepicker" class="form-control" placeholder="Input here" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <br><br><br>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>

        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title" style="margin-left:150px">Information</h5>

                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1 ?>
                            <?php foreach ($information as $in) : ?>

                                <tr>
                                    <th><?= $i ?></th>
                                    <th><?= $in['judul'] ?></th>
                                    <th>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="mycheck[<?= $in['id'] ?>]" name="mychecks[<?= $in['id'] ?>]" <?= check_access($id = $in['id']) ?> data-id="<?= $in['id']; ?>" data-rule="<?= $in['is_active']; ?>">
                                            <label class="custom-control-label" for="mycheck[<?= $in['id'] ?>]" name="mychecks[<?= $in['id'] ?>]"></label>
                                        </div>
                                    </th>

                                </tr>
                                <?php $i++ ?>
                        </tbody>
                    <?php endforeach; ?>


                    <tr>
                        <th>


                        </th>
                    </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <?= $this->endSection();  ?>