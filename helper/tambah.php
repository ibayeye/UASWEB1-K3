<?php
require_once '../helper/koneksi.php';
require_once '../page/index.php';

if (isset($_POST['btnsimpan'])) {

    if (isset($_GET['hal']) == "edit") {

        // UBAH

        $edit = mysqli_query($koneksi, " UPDATE tbarang SET nama = '$_POST[namabrg]', 
                                                            asal = '$_POST[asalbrg]', 
                                                            jumlah = '$_POST[jumlahbrg]', 
                                                            satuan = '$_POST[satuanbrg]',
                                                            tanggal_diterima = '$_POST[tglterima]' 
                                        WHERE id_barang = '$_GET[id]' ");

        if ($edit) {
            echo "<script>
            alert('Edit item successfully!');
            document.location='index.php';
        </script>";
        } else {
            echo "<script>
            alert('Edit item failed!');
            document.location='index.php';
        </script>";
        }
    } else {

        // SIMPAN
        
        $simpan = mysqli_query($koneksi, " INSERT INTO tbarang (kode, nama, asal, jumlah, satuan, tanggal_diterima) VALUE
                                                            ( '$_POST[kodebrg]', '$_POST[namabrg]', '$_POST[asalbrg]',
                                                            '$_POST[jumlahbrg]', '$_POST[satuanbrg]', '$_POST[tglterima]' )
                                                            ");
        if ($simpan) {
            echo "<script>
        alert('Insert item successfully');
        document.location='index.php';
    </script>";
        } else {
            echo "<script>
        alert('Insert item failed!');
        document.location='index.php';
    </script>";
        }
    }
}
