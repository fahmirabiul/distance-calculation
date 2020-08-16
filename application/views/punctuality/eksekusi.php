<?php
global $akurat;
global $noakurat;
$akurat = 0;
$noakurat = 0;
$total_waktu = 0;
?>

<!-- Table -->
<div>
    <div class="mt-3 mb-3">
        <h3><b>Waktu Pengiriman Data</b></h3>
        Tanggal : <?= $tanggal; ?>
        <br>
        NPP : <?= $npp; ?>
        <hr>
    </div>

    <table id="table_hasil" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Waktu Pengiriman</th>
                <th>Waktu Penyimpanan</th>
                <th>Selisih (s)</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($karyawan as $kyw) :
            ?>

                <!-- Table Content-->
                <tr>
                    <td><?= $kyw['waktu']; ?></td>
                    <td><?= $kyw['updated_at']; ?></td>
                    <td>
                        <?php
                        $selisih = strtotime($kyw['updated_at']) - strtotime($kyw['waktu']);
                        if ($selisih == 0) {
                            $akurat++;
                        } else {
                            $noakurat++;
                        }
                        $total_waktu += $selisih;
                        echo $selisih
                        ?>
                    </td>
                </tr>
                <!-- End Of Table -->

            <?php
            endforeach;
            ?>

            <!-- End of Table Content -->
        </tbody>
    </table>
</div>

<div class="card" style="width: 28rem;">
    <div class="card-body">
        0 detik : <?= $akurat; ?> data <br>
        > 0 detik : <?= $noakurat; ?> data
        <hr>
        Jumlah Data : <?= $akurat + $noakurat; ?> <br>
        Waktu Rata-rata : <?= $total_waktu / ($akurat + $noakurat); ?> detik
    </div>
</div>