<?php
$sel_eu = 0;
$sel_ma = 0;
$sel_hav = 0;

$tot_real = 0;
?>

<div class="mt-3 mb-3">
    <h3><b>Perbandingan Keakurasian Tiga Metode</b></h3>
    <a href="<?= base_url('tigametode/hasilmanualexcel'); ?>">File Excel</a>
    <p><a href="<?= base_url('tigametode/selisih'); ?>">Perbandingan Selisih</a></p>
    <hr>
</div>

<!-- Table -->
<table id="table_hasil" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Latitude1</th>
            <th>Longitude1</th>
            <th>Latitude2</th>
            <th>Longitude2</th>
            <th>Manual (m)</th>
            <th>Euclidean (m)</th>
            <th>Manhattan (m)</th>
            <th>Haversine (m)</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $no = 1;
        foreach ($manual as $man) :

            $currentLat = $man['lat1'];
            $currentLong = $man['lng1'];
            $destLat = $man['lat2'];
            $destLon = $man['lng2'];

            $euclidean = euclidean($currentLat, $currentLong, $destLat, $destLon);
            $manhattan = manhattan($currentLat, $currentLong, $destLat, $destLon);
            $haversine = haversine($currentLat, $currentLong, $destLat, $destLon);
        ?>

            <!-- Table Content -->
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $man['lat1']; ?></td>
                <td><?= $man['lng1']; ?></td>
                <td><?= $man['lat2']; ?></td>
                <td><?= $man['lng2']; ?></td>
                <td><?= $man['jarak']; ?></td>
                <td><?= $euclidean; ?></td>
                <td><?= $manhattan; ?></td>
                <td><?= $haversine; ?></td>
            </tr>
            <!-- End Of Table -->

            <!-- Persentase Error -->
            <?php
            $sel_eu = $sel_eu + (abs($man['jarak'] - $euclidean));
            $sel_ma = $sel_ma + (abs($man['jarak'] - $manhattan));
            $sel_hav = $sel_hav + (abs($man['jarak'] - $haversine));

            $tot_real = ($tot_real + $man['jarak']);
            ?>
        <?php
        endforeach;
        ?>

        <!-- Table -->
    </tbody>
</table>

<div class="card" style="width: 50%;">
    <div class="card-body">
        <?php
        $no = $no - 1;
        $avg_real = $tot_real / $no;

        $avg_eu = ($sel_eu / $no) / $avg_real * 100;
        $avg_ma = ($sel_ma / $no) / $avg_real * 100;
        $avg_hav = ($sel_hav / $no) / $avg_real * 100;



        print "<b>Tingkat Keakurasian</b> : " . "<br>"
            . "Euclidean : " . number_format(100 - $avg_eu, 2) . "%" . "<br>"
            . "Manhattan : " . number_format(100 - $avg_ma, 2) . "%" . "<br>"
            . "Haversine :" . number_format(100 - $avg_hav, 2) . "%" . "<br>"
        ?>
    </div>
</div>

<?php

function euclidean($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $desimal = 2)
{
    // Menghitung jarak dalam derajat
    $derajat = (sqrt((($lokasi2_lat - $lokasi1_lat) * ($lokasi2_lat - $lokasi1_lat)) + (($lokasi2_long - $lokasi1_long) * ($lokasi2_long - $lokasi1_long))));

    // Mengkonversi derajat kedalam unit yang dipilih (kilometer)
    $jarak = $derajat * 111.322 * 1000;

    return round($jarak, $desimal);
}

function manhattan($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $desimal = 2)
{
    // Menghitung jarak dalam derajat
    $derajat = (abs($lokasi1_lat - $lokasi2_lat) + abs($lokasi1_long - $lokasi2_long));

    // Mengkonversi derajat kedalam unit yang dipilih (kilometer, mil atau mil laut)
    $jarak = $derajat * 111.322 * 1000;

    return round($jarak, $desimal);
}

function haversine($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $desimal = 2)
{
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
    $d = $earth_radius * $c * 1000;

    return round($d, $desimal);
}
?>