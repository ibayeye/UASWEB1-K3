<?php
require_once 'koneksi.php';

header("Content-type:application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=reportdata.xls");
?>

<h3 style="text-align: center;">REPORT DATA</h3>
<table border="1" class="table table-striped table-hover table-bordered">
    <tr>
        <th>No.</th>
        <th>Item Code</th>
        <th>Item Name</th>
        <th>Option</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Date Received</th>
    </tr>

    <?php
    $no = 1;
    $koneksi;
    $data = mysqli_query($koneksi, "SELECT * FROM tbarang");
    while ($tampil = mysqli_fetch_array($data)) :
    ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $tampil['kode'] ?></td>
            <td><?= $tampil['nama'] ?></td>
            <td><?= $tampil['asal'] ?></td>
            <td><?= $tampil['jumlah'] ?></td>
            <td><?= $tampil['satuan'] ?></td>
            <td><?= $tampil['tanggal_diterima'] ?></td>
        </tr>

    <?php
    endwhile;
    ?>
</table>