<?php
$time_pre = microtime(true);
// Itenas
$currentLat = "-6.8971795";
$currentLong = "107.63647";
$jarakmaks = 0.18346;

global $eu_dalam;
global $eu_luar;
$eu_dalam = 0;
$eu_luar = 0;

global $man_dalam;
global $man_luar;
$man_dalam = 0;
$man_luar = 0;

global $hav_dalam;
global $hav_luar;
$hav_dalam = 0;
$hav_luar = 0;
?>

<div class="mt-3 mb-3">
    <h3><b>Perbandingan Hasil Pengukuran Tiga Metode</b></h3>
    Tanggal : <?= $tanggal; ?>
    <br>
    Npp : <?= $npp; ?>
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
            <th>Euclidean (km)</th>
            <th>Manhattan (km)</th>
            <th>Haversine (km)</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $no = 1;
        foreach ($lokasi as $lok) :

            $destLat = $lok['latitude'];
            $destLon = $lok['longitude'];

            $euclidean = euclidean($currentLat, $currentLong, $destLat, $destLon);
            $manhattan = manhattan($currentLat, $currentLong, $destLat, $destLon);
            $haversine = haversine($currentLat, $currentLong, $destLat, $destLon);
        ?>

            <!-- Table Content -->
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $lok['waktu']; ?></td>
                <td><?= $lok['latitude']; ?></td>
                <td><?= $lok['longitude']; ?></td>
                <td><?= $euclidean; ?></td>
                <td><?= $manhattan; ?></td>
                <td><?= $haversine; ?></td>


                <!-- Euclidean -->
                <!-- <?php if ($euclidean <= $jarakmaks) { ?>
                    <td><?= $euclidean; ?></td>
                <?php } else { ?>
                    <td style="background-color: red"><?= $euclidean; ?></td>
                <?php } ?> -->

                <!-- Manhattan -->
                <!-- <?php if ($manhattan <= $jarakmaks) { ?>
                    <td><?= $manhattan; ?></td>
                <?php } else { ?>
                    <td style="background-color: red"><?= $manhattan; ?></td>
                <?php } ?> -->

                <!-- Haversine -->
                <!-- <?php if ($haversine <= $jarakmaks) { ?>
                    <td><?= $haversine; ?></td>
                <?php } else { ?>
                    <td style="background-color: red"><?= $haversine; ?></td>
                <?php } ?> -->
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
$eu_persentase = $eu_dalam * 100 / ($eu_dalam + $eu_luar);
$man_persentase = $man_dalam * 100 / ($man_dalam + $man_luar);
$hav_persentase = $hav_dalam * 100 / ($hav_dalam + $hav_luar);
?>

<div class="card" style="width: 50%;">
    <div class="card-body">
        <!-- <?php
                print "waktu pemrosesan : " . $exec_time . "s <br><br>"
                    . "Euclidean (didalam,diluar)   = (" . $eu_dalam . "," . $eu_luar . ") <br>"
                    . "Manhattan (didalam,diluar)   = (" . $man_dalam . "," . $man_luar . ") <br>"
                    . "Haversine (didalam,diluar)   = (" . $hav_dalam . "," . $hav_luar . ")";
                ?> -->
        <?php
        print "<b>Persentase Hasil</b>" . "<br>" .
            "Euclidean (didalam,diluar)   = (" . number_format($eu_persentase, 2)  . "%" . " , " . number_format(100 - $eu_persentase, 2) . "%" . ") <br>"
            . "Manhattan (didalam,diluar)   = (" . number_format($man_persentase, 2) . "%" . " , " . number_format(100 - $man_persentase, 2) . "%" . ") <br>"
            . "Haversine (didalam,diluar)   = (" . number_format($hav_persentase, 2) . "%" . " , " . number_format(100 - $hav_persentase, 2) . "%" . ")" . "<hr>" .
            "Waktu Pemrosesan : " . $exec_time . "detik";
        ?>
    </div>
</div>

<?php

function euclidean($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $desimal = 5)
{
    global $eu_dalam;
    global $eu_luar;

    // Menghitung jarak dalam derajat
    $derajat = (sqrt((($lokasi2_lat - $lokasi1_lat) * ($lokasi2_lat - $lokasi1_lat)) + (($lokasi2_long - $lokasi1_long) * ($lokasi2_long - $lokasi1_long))));

    // Mengkonversi derajat kedalam unit yang dipilih (kilometer)
    $jarak = $derajat * 111.322;

    // Tambah poin didalam atau diluar
    if ($jarak <= 0.18346) {
        $eu_dalam++;
    } else {
        $eu_luar++;
    }

    return round($jarak, $desimal);
}

function manhattan($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $desimal = 5)
{
    global $man_dalam;
    global $man_luar;

    // Menghitung jarak dalam derajat
    $derajat = (abs($lokasi1_lat - $lokasi2_lat) + abs($lokasi1_long - $lokasi2_long));

    // Mengkonversi derajat kedalam unit yang dipilih (kilometer, mil atau mil laut)
    $jarak = $derajat * 111.322;

    // Tambah poin didalam atau diluar
    if ($jarak <= 0.18346) {
        $man_dalam++;
    } else {
        $man_luar++;
    }

    return round($jarak, $desimal);
}

function haversine($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $desimal = 5)
{
    global $hav_dalam;
    global $hav_luar;

    // Menghitung jarak dalam derajat
    $earth_radius = 6371;
    $dLat = (($lokasi2_lat -
        $lokasi1_lat) * M_PI) / 180;
    $dLon = (($lokasi2_long -
        $lokasi1_long) * M_PI) / 180;
    $a = sin($dLat / 2) *
        sin($dLat / 2) +
        cos(($lokasi1_lat * M_PI) / 180) *
        cos(($lokasi2_lat * M_PI) / 180) *
        sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * asin(sqrt($a));
    $d = $earth_radius * $c;

    // Tambah poin didalam atau diluar
    if ($d <= 0.18346) {
        $hav_dalam++;
    } else {
        $hav_luar++;
    }

    return round($d, $desimal);
}
