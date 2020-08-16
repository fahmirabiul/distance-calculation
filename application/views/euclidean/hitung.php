<?php
$this->load->view('templates/table_waktu');

function hitungJarak($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $desimal = 5)
{
    global $didalam;
    global $diluar;

    // Menghitung jarak dalam derajat
    $derajat = (sqrt((($lokasi2_lat - $lokasi1_lat) * ($lokasi2_lat - $lokasi1_lat)) + (($lokasi2_long - $lokasi1_long) * ($lokasi2_long - $lokasi1_long))));

    // Mengkonversi derajat ke kilometer
    $jarak = $derajat * 111.322;

    if ($jarak <= 0.18076) {
        $didalam++;
    } else {
        $diluar++;
    }
    return round($jarak, $desimal);
}
