<?php
require_once '../helper/koneksi.php';
require_once '../page/index.php';



$q = mysqli_query($koneksi, "SELECT kode FROM tbarang order by kode desc limit 1");
$datax = mysqli_fetch_array($q);
if ($datax) {
    $no_terakhir = substr($datax['kode'], -3);
    $no = $no_terakhir + 1;

    if ($no > 0 and $no < 10) {
        $kode = "000" . $no;
    } else if ($no > 10 and $no < 100) {
        $kode = "0" . $no;
    } else if ($no > 100) {
        $kode = $no;
    }
} else {
    $kode = $no;
}

$tahun = date('Y');
$vkode = "CITM-" . $tahun . '-' . $kode;

$vnama = "";
$vasal = "";
$vjumlah = "";
$vsatuan = "";
$vtanggal_diterima = "";


// MEMUNCULKAN YANG DIKLIK
if (isset($_GET['hal'])) {
    if ($_GET['hal'] == "edit") {
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbarang WHERE id_barang = '$_GET[id]'");
        $data = mysqli_fetch_array($tampil);
        if ($data) {

            $vkode = $data['kode'];
            $vnama = $data['nama'];
            $vasal = $data['asal'];
            $vjumlah = $data['jumlah'];
            $vsatuan = $data['satuan'];
            $vtanggal_diterima = $data['tanggal_diterima'];
        }
    } else if ($_GET['hal'] == "hapus") {
        $hapus = mysqli_query($koneksi, " DELETE FROM tbarang WHERE id_barang = '$_GET[id]'");

        if ($hapus) {
            echo "<script>
            alert('Delete item successfully!');
            document.location='index.php';
        </script>";
        } else {
            echo "<script>
            alert('Delete item failed!');
            document.location='index.php';
        </script>";
        }
    }
}
