<?php
require_once '../helper/koneksi.php';
require_once '../helper/tambah.php';
require_once '../helper/aksibtn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        <?php include "../assets/style/styles.css" ?>
    </style>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Dashboard</title>
</head>

<body>
    <header class="header">
        <a href="page-landing.php" class="logo">Toko Xyz</a>
        <nav class="navbar">
            <i class='bx bxs-user' onclick="toggleMenu()"></i>
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <a href="../page/page-profil.php" class="sub-menu-link">
                        <p>Profil</p>
                    </a>
                    <a href="../helper/logout.php" class="sub-menu-link">
                        <p>Logout</p>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <h3 class="text-center">Inventory Data</h3>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        Form Input
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label">Item Code</label>
                                <input type="text" name="kodebrg" value="<?= $vkode ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Item Name</label>
                                <input type="text" name="namabrg" value="<?= $vnama ?>" class="form-control" placeholder="Enter Item Name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Option</label>
                                <select class="form-select" name="asalbrg">
                                    <option value="<?= $vasal ?>"><?= $vasal ?></option>
                                    <option value="Purchase">Purchase</option>
                                    <option value="Grant">Grant</option>
                                    <option value="Help">Help</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" name="jumlahbrg" value="<?= $vjumlah ?>" class="form-control" placeholder="Enter Quantity">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Unit</label>
                                        <select class="form-select" name="satuanbrg">
                                            <option value="<?= $vsatuan ?>"><?= $vsatuan ?></option>
                                            <option value="Unit">Unit</option>
                                            <option value="Pcs">Pcs</option>
                                            <option value="Box">Box</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">Date Received</label>
                                        <input type="date" name="tglterima" value="<?= $vtanggal_diterima ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <hr>
                                    <button class="btn btn-primary" name="btnsimpan" type="submit">Save</button>
                                    <button class="btn btn-danger" name="btnkosongkan" type="reset">Clear</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                Item Data
            </div>
            <div class="card-body">
                <div class="col-md-6 mx-auto">
                    <form method="post">
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="tcari" value="<?= @$_POST['tcari'] ?>" placeholder="Enter Keyword!">
                            <button class="btn btn-primary" name="bcari" type="submit">Search</button>
                            <button class="btn btn-danger" name="breset" type="submit">Clear</button>
                        </div>
                    </form>
                </div>

                <div class="col float-end mb-3">
                    <a href="../helper/excel.php">
                        <button class="btn btn-success">
                            <i class="fas fa-download"></i>Download Excel
                        </button>
                    </a>
                    <a href="../helper/pdf.php" target="_blank">
                        <button class="btn btn-danger">
                            <i class="fas fa-download"></i> Download PDF
                        </button>
                    </a>
                </div>

                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Option</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Date Received</th>
                        <th>Action</th>
                    </tr>

                    <?php

                    if (isset($_POST['bcari'])) {
                        $keyword = $_POST['tcari'];
                        $q = " SELECT * FROM tbarang WHERE kode like '%$keyword%' or nama like '%$keyword%' or asal like '%$keyword%' order by id_barang desc ";
                    } else {
                        $q = " SELECT * FROM tbarang order by id_barang desc ";
                    }



                    $no = 1;
                    $tampil = mysqli_query($koneksi, $q);
                    while ($data = mysqli_fetch_array($tampil)) :
                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['kode'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['asal'] ?></td>
                            <td><?= $data['jumlah'] ?></td>
                            <td><?= $data['satuan'] ?></td>
                            <td><?= $data['tanggal_diterima'] ?></td>
                            <td>
                                <a href="index.php?hal=edit&id=<?= $data['id_barang'] ?>" class="btn btn-warning">Edit</a>
                                <a href="index.php?hal=hapus&id=<?= $data['id_barang'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this item?')">Delete</a>
                            </td>
                        </tr>

                    <?php
                    endwhile;
                    ?>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }

        function downloadExcel() {
            var selectedYear = document.getElementById('tahunSelect').value;
            fetchData(selectedYear)
                .then(response => {
                    var data = response.data;

                    var ws = XLSX.utils.json_to_sheet(data);

                    var wb = XLSX.utils.book_new();
                    XLSX.utils.book_append_sheet(wb, ws, "Laporan");

                    XLSX.writeFile(wb, "laporan_excel_" + selectedYear + ".xlsx");
                })
                .catch(error => {
                    console.error('Error fetching data for Excel:', error);
                });
        }

        function downloadPDF() {
            var table = document.getElementById('table');

            var imgData = canvas.toDataURL('image/png');

            var selectedYear = document.getElementById('tahunSelect').value;

            var docDefinition = {
                content: [{
                        text: 'Laporan Tahun ' + selectedYear,
                        style: 'header'
                    },
                    {
                        image: imgData,
                        width: 500
                    }
                ],
                style: {
                    header: {
                        fontSize: 18,
                        bold: true,
                        margin: [0, 0, 0, 10],
                    },
                },
            };

            pdfMake.createPdf(docDefinition).download('laporan_' + selectedYear + '_pdf.pdf');
        }
    </script>


</body>

</html>