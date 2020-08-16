<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=SelisihWaktu.xls");
?>

<table border="1">
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