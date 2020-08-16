<?php
$time_pre = microtime(true);
// Itenas
$currentLat = "-6.8971795";
$currentLong = "107.63647";
global $didalam;
global $diluar;
$didalam = 0;
$diluar = 0;
?>

<div class="mt-3 mb-3">
    <h3><b>Metode Perhitungan <?= ucwords($metode); ?></b></h3>
    Tanggal : <?= $tanggal; ?>
    <br>
    NPP : <?= $npp; ?>
    <hr>
</div>

<!-- Table -->
<table id="table_hasil" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Waktu</th>
            <th>Latitude</th>
            <th>longitude</th>
            <th>Jarak (km)</th>
            <th>Hasil</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $no = 1;
        foreach ($lokasi as $lok) :

            $destLat = $lok['latitude'];
            $destLon = $lok['longitude'];

            $jarak = hitungJarak($currentLat, $currentLong, $destLat, $destLon);
            if ($jarak <= 0.18346) {
                $lokasi = "di dalam kampus";
            } else {
                $lokasi = "di luar kampus";
            }
        ?>

            <!-- Table Content -->
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $lok['waktu']; ?></td>
                <td><?= $lok['latitude']; ?></td>
                <td><?= $lok['longitude']; ?></td>
                <td><?= $jarak; ?></td>
                <?php
                if ($jarak <= 0.18346) {
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