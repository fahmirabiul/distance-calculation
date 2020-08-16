<?php
$data['judul'] = "Pengukuran Haversine Formula";
$this->load->view('templates/table_waktu', $data);

function hitungJarak($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $desimal = 5)
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
    return round($d, $desimal);
}
