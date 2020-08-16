<?php if (!isset($_GET['tanggal']) || !isset($_GET['jam'])) { ?>

    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="ml-auto mr-auto">
                    <h5><b>Masukkan Tanggal dan Waktu</b></h5>
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
                                <select class="custom-select" name="jam" required>
                                    <option value="08:">jam 8</option>
                                    <option value="09:">jam 9</option>
                                    <option value="10:">jam 10</option>
                                    <option value="11:">jam 11</option>
                                    <option value="12:">jam 12</option>
                                    <option value="13:">jam 13</option>
                                    <option value="14:">jam 14</option>
                                    <option value="15:">jam 15</option>
                                    <option value="16:">jam 16</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="mr-auto ml-auto">
                            <button type="submit" class="btn btn-info">Set Tanggal & Waktu</button>
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
    $jam = $this->input->get('jam');

    ?>

    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="ml-auto mr-auto">
                    <h5><b>Masukkan Tanggal dan Waktu</b></h5>
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
                                <select class="custom-select" name="jam">
                                    <option value="08:">jam 8</option>
                                    <option value="09:">jam 9</option>
                                    <option value="10:">jam 10</option>
                                    <option value="11:">jam 11</option>
                                    <option value="12:">jam 12</option>
                                    <option value="13:">jam 13</option>
                                    <option value="14:">jam 14</option>
                                    <option value="15:">jam 15</option>
                                    <option value="16:">jam 16</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex">
                        <div class="mr-auto ml-auto">
                            <button type="submit" class="btn btn-info">Set Tanggal & Waktu</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="d-flex">
                <div class="mr-auto ml-auto">
                    Tanggal : <?= $tanggal; ?>
                    <br>
                    Waktu : <?= $jam . '00'; ?>
                </div>
            </div>

            <div class="mt-3">
                <div class="d-flex">
                    <div class="mr-auto ml-auto">
                        <a href="<?= base_url('euclidean/hitung/') ?><?= $tanggal . '/' ?><?= $jam . '/' ?>euclidean" target="_blank" class="btn btn-info">Euclidean</a>
                        <a href="<?= base_url('manhattan/hitung/') ?><?= $tanggal . '/' ?><?= $jam . '/' ?>manhattan" target="_blank" class="btn btn-info">Manhattan</a>
                        <a href="<?= base_url('haversine/hitung/') ?><?= $tanggal . '/' ?><?= $jam . '/' ?>haversine" target="_blank" class="btn btn-info">Haversine</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>