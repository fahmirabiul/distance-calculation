<?php
$this->load->view('templates/table');

function hitungJarak($lokasi1_lat, $lokasi1_long, $lokasi2_lat, $lokasi2_long, $unit = 'km', $desimal = 5)
{
    global $didalam;
    global $diluar;

    // Menghitung jarak dalam derajat
    // derajat = (abs(lat1-lat2)+abs(long1-long2))
    $derajat = (abs($lokasi1_lat - $lokasi2_lat) + abs($lokasi1_long - $lokasi2_long));

    // Mengkonversi derajat kedalam unit yang dipilih (kilometer, mil atau mil laut)
    switch ($unit) {
        case 'km':
            // informa = *111.319
            $jarak = $derajat * 111.322; // 1 derajat = 111.13384 km, berdasarkan diameter rata-rata bumi (12,735 km)
            break;
        case 'mi':
            $jarak = $derajat * 69.05482; // 1 derajat = 69.05482 miles(mil), berdasarkan diameter rata-rata bumi (7,913.1 miles)
            break;
        case 'nmi':
            $jarak = $derajat * 59.97662; // 1 derajat = 59.97662 nautic miles(mil laut), berdasarkan diameter rata-rata bumi (6,876.3 nautical miles)
    }
    // if ($jarak <= 0.18076) {
    if ($jarak <= 0.18346) {
        $didalam++;
    } else {
        $diluar++;
    }
    return round($jarak, $desimal);
}
