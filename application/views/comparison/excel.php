<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=compare_euclidean_haversine.xls");

// Itenas
$currentLat = "-6.897140";
$currentLong = "107.636404";
?>

<table border="1">
    <thead>
        <tr>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Euclidean(m)</th>
            <th>Haversine(m)</th>
            <th>Selisih(m)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($karyawan as $kyw) :

            $destLat = $kyw['latitude'];
            $destLon = $kyw['longitude'];

            $euclidean = euclidean($currentLat, $currentLong, $destLat, $destLon);
            $haversine = haversine($currentLat, $currentLong, $destLat, $destLon);

        ?>
            <!-- Table Content-->
            <tr>
                <td><?= $kyw['latitude']; ?></td>
                <td><?= $kyw['longitude']; ?></td>
                <td><?= $euclidean; ?></td>
                <td><?= $haversine; ?></td>
                <td><?= round($euclidean - $haversine, 5); ?></td>
            </tr>
            <!-- End Of Table -->
        <?php
        endforeach;
        ?>
        <!-- End of Table Content -->
    </tbody>
</table>

<!-- Pengukuran Euclidean -->
<?php
function euclidean($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $unit = 'km', $desimal = 5)
{
    global $didalam;
    global $diluar;

    // Menghitung jarak dalam derajat
    $derajat = (sqrt((($lokasi2_lat - $lokasi1_lat) * ($lokasi2_lat - $lokasi1_lat)) + (($lokasi2_long - $lokasi1_long) * ($lokasi2_long - $lokasi1_long))));

    // Mengkonversi derajat kedalam unit yang dipilih (kilometer, mil atau mil laut)
    switch ($unit) {
        case 'km':
            $jarak = $derajat * 111.319; // 1 derajat = 111.13384 km, berdasarkan diameter rata-rata bumi (12,735 km)
            break;
        case 'mi':
            $jarak = $derajat * 69.05482; // 1 derajat = 69.05482 miles(mil), berdasarkan diameter rata-rata bumi (7,913.1 miles)
            break;
        case 'nmi':
            $jarak = $derajat * 59.97662; // 1 derajat = 59.97662 nautic miles(mil laut), berdasarkan diameter rata-rata bumi (6,876.3 nautical miles)
    }

    return round($jarak * 1000, $desimal);
}

// Pengukuran Haversine
function haversine($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $unit = 'km', $desimal = 5)
{
    global $didalam;
    global $diluar;

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

    if ($d <= 0.18076) {
        $didalam++;
    } else {
        $diluar++;
    }
    return round($d * 1000, $desimal);
}
