<?php
require_once 'koneksi.php';
require_once '../page/page-profil.php';

if (isset($_POST['btnsimpan'])) {

    // UBAH

    $edit = mysqli_query($koneksi, " UPDATE user SET username = '$_POST[uname]', 
                                                            nama = '$_POST[name]', 
                                                            email = '$_POST[email]', 
                                                            no_hp = '$_POST[no_hp]'
                                        WHERE id = '$_GET[id]' ");

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
}
