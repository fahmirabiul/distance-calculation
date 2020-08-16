<?php if (!isset($_GET['tanggal']) || !isset($_GET['npp'])) { ?>

    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="ml-auto mr-auto">
                    <h5><b>Masukkan Tanggal dan NPP</b></h5>
                </div>
            </div>
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" name="tanggal" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="npp" placeholder="Nomor Pokok Pegawai" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="mr-auto ml-auto">
                            <button type="submit" class="btn btn-info">Set Tanggal & NPP</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php
} else {
?>

    <?php

    $tanggal = $this->input->get('tanggal');
    $npp = $this->input->get('npp');

    ?>

    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="ml-auto mr-auto">
                    <h5><b>Masukkan Tanggal dan NPP</b></h5>
                </div>
            </div>
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" name="tanggal" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center">
                            <div class="input-group mb-3">
                                <input name="npp" type="number" class="form-control" placeholder="Nomor Pokok Pegawai">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="mr-auto ml-auto">
                            <button type="submit" class="btn btn-info">Set Tanggal & NPP</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="d-flex">
                <div class="mr-auto ml-auto">
                    Tanggal : <?= $tanggal; ?>
                    <br>
                    NPP : <?= $npp; ?>
                </div>
            </div>

            <div class="mt-3">
                <div class="d-flex">
                    <div class="mr-auto ml-auto">
                        <a href="<?= base_url('comparison/eksekusi/') ?><?= $tanggal . '/' ?><?= $npp ?>" target="_blank" class="btn btn-info">Compare !</a>
                    </div>
                </div>
            </div>
            <div class="mt-1">
                <div class="d-flex">
                    <div class="mr-auto ml-auto">
                        <a href="<?= base_url('comparison/excel/') ?><?= $tanggal . '/' ?><?= $npp ?>" target="_blank">Download File Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>