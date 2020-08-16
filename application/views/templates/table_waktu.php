<?php
$time_pre = microtime(true);
// Itenas
$currentLat = "-6.897140";
$currentLong = "107.636404";
global $didalam;
global $diluar;
$didalam = 0;
$diluar = 0;
?>

<div class="mt-3 mb-3">
    <h3><b>Metode Perhitungan <?= ucwords($metode); ?></b></h3>
    Tanggal : <?= $tanggal; ?>
    <br>
    Waktu : <?= $jam . '0' . '0'; ?>
    <hr>
</div>

<!-- Table -->
<table id="table_hasil" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>NPP</th>
            <th>Waktu</th>
            <th>Latitude</th>
            <th>longitude</th>
            <th>Jarak (km)</th>
            <th>Hasil</th>
        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($lokasi as $lok) :
            if ($lok['waktu'] >= $jam . "00:00" && $lok['waktu'] <= $jam . "59:59") {

                $destLat = $lok['latitude'];
                $destLon = $lok['longitude'];

                $jarak = hitungJarak($currentLat, $currentLong, $destLat, $destLon);
                if ($jarak <= 0.18076) {
                    $lokasi = "di dalam kampus";
                } else {
                    $lokasi = "di luar kampus";
                }

        ?>

                <!-- Table Content-->
                <tr>
                    <td><?= $lok['npp']; ?></td>
                    <td><?= $lok['waktu']; ?></td>
                    <td><?= $lok['latitude']; ?></td>
                    <td><?= $lok['longitude']; ?></td>
                    <td><?= $jarak; ?></td>
                    <?php
                    if ($jarak <= 0.18076) {
                    ?>
                        <td><?= $lokasi; ?></td>
                    <?php
                    } else {
                    ?>
                        <td style="background-color: red"><?= $lokasi; ?></td>
                    <?php
                    }
                    ?>
                </tr>
                <!-- End Of Table -->

        <?php
            }
        endforeach;
        ?>

        <!-- Table -->
    </tbody>
</table>

<!-- Calculate Execution Time -->
<?php
$time_post = microtime(true);
$exec_time = $time_post - $time_pre;
$persentase = $didalam * 100 / ($didalam + $diluar);
?>

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <?php
        print "<b>Persentase Hasil</b>" . "<br>" .
            "Di dalam : " . number_format($persentase, 2) . "%" . "<br>" .
            "Di luar : " . number_format((100 - $persentase), 2) . "%" . "<hr>" .
            "Waktu Pemrosesan : " . $exec_time . "detik";
        ?>
    </div>
</div>