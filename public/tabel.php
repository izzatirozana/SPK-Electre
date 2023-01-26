<?php
require '../config/connection.php';
session_start();
?>

<?php
if (isset($_POST["tambahdata"])) {
    $nama  = $_POST['nama'];
    $tujuan_nama = $_POST['tujuan_nama'];
    $jum_pinjaman    = $_POST['jum_pinjaman'];
    $gaji    = $_POST['gaji'];
    $simpanan    = $_POST['simpanan'];

    $tujuan = 0;

    if ($tujuan_nama   == "Lainnya") {
        $tujuan = 1;
    } elseif ($tujuan_nama == "Usaha") {
        $tujuan = 2;
    } elseif ($tujuan_nama == "Pernikahan") {
        $tujuan = 3;
    } elseif ($tujuan_nama == "Pendidikan") {
        $tujuan = 4;
    } elseif ($tujuan_nama == "Kesehatan") {
        $tujuan = 5;
    }

    $sql = "INSERT INTO `alternatif` (`nama`, `tujuan_nama`, `tujuan`, `jum_pinjaman`, `gaji`, `simpanan`) 
        VALUES (:nama, :tujuan_nama, :tujuan, :jum_pinjaman , :gaji , :simpanan)";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':nama', $nama);
    $stmt->bindValue(':tujuan_nama', $tujuan_nama);
    $stmt->bindValue(':tujuan', $tujuan);
    $stmt->bindValue(':jum_pinjaman', $jum_pinjaman);
    $stmt->bindValue(':gaji', $gaji);
    $stmt->bindValue(':simpanan', $simpanan);
    $stmt->execute();

    if (mysqli_connect_errno()) {
        echo "<script>alert('Gagal Menambah Data!');</script>";
    } else {
        echo "<script>alert('Berhasil Menambah Data!');window.location='index.php'</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "template/header.php" ?>

<body>
    <style type="text/css">
        * {
            box-sizing: border-box;
        }

        /* Button used to open the contact form - fixed at the bottom of the page */
        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            /*position: fixed;*/
            /*bottom: 23px;
  right: 28px;
  width: 280px;*/
        }

        /* The popup form - hidden by default */
        .form-popup {
            display: none;
            /*position: fixed;*/
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
            max-width: 300px;
            padding: 10px;
            background-color: white;
        }

        /* Full-width input fields */
        .form-container input[type=text],
        .form-container input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus,
        .form-container input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            /*opacity: 0.8;*/
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
            background-color: red;
        }
    </style>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>SPK Electre<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul class="navbar">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a class="active" href="#">Alternatif</a></li>
                    <li><a href="perhitungan.php#RANKING">Perhitungan</a></li>
                    <li><a href="about.php">Tentang Kami</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a style="display: none;" class="btn-book-a-table" href="logout.php" type="submit">Logout</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= alternatif Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">

            <!-- data peserta -->
            <h1 data-aos="fade-up" style="text-align: center; margin-top: -1rem; margin-bottom: 2rem">Data Anggota</h1>

            <!-- table -->
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Jumlah Pinjaman</th>
                        <th scope="col">Gaji</th>
                        <th scope="col">Simpanan</th>
                        <th scope="col" style="display: none;">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../config/connection.php";
                    $no = 1;
                    $query = mysqli_query($selectdb, "select * from alternatif");
                    while ($d = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['tujuan_nama']; ?></td>
                            <td><?php echo $d['jum_pinjaman']; ?></td>
                            <td><?php echo $d['gaji']; ?></td>
                            <td><?php echo $d['simpanan']; ?></td>
                            <td style="display: none;">
                                <a class="btn btn-warning btn-sm text-center" href="edit.php?id_data=<?php echo $d['id']; ?>">Edit</a>
                                <a class="btn btn-danger btn-sm text-center" href="hapus.php?id_data=<?php echo $d['id']; ?>" onclick="return confirm('apakah anda yakin akan menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <!-- end of table -->

            <!-- form tambah data -->
            <center class="py-3 pb-5">
                <button class="open-button btn btn-primary btn-lg btn-block" onclick="openForm()" style="display: none;">+</button>

                <div class="form-popup" id="myForm">
                    <form action="index.php" method="POST" class="form-container">
                        <h3>Tambah Data</h3>
                        <label for="nama"><b>Nama</b></label>
                        <input type="text" placeholder="Nama" name="nama" required>
                        <label for="Tujuan"><b>Tujuan</b></label>
                        <div class="col-sm-9">
                            <select class="form-control" style="display: block; margin-bottom: 20px;" required name="tujuan_nama">
                                <option disabled selected value="">Pilih</option>
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Usaha">Usaha</option>
                                <option value="Kesehatan">Kesehatan</option>
                                <option value="Pernikahan">Pernikahan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <label for="jum_pinjaman"><b>Jumlah Pinjaman</b></label>
                        <input type="text" placeholder="Jumlah Pinjaman" name="jum_pinjaman" required>
                        <label for="gaji"><b>Gaji</b></label>
                        <input type="text" placeholder="Gaji" name="gaji" required>
                        <label for="simpanan"><b>Simpanan</b></label>
                        <input type="text" placeholder="Simpanan" name="simpanan" required>
                        <button type="submit" class="btn" name="tambahdata">Simpan</button>
                        <button type="button" class="btn cancel open-button " onclick="closeForm()">X</button>
                    </form>
                </div>

            </center>
            <!-- form tambah data selesai -->

            <script>
                function openForm() {
                    document.getElementById("myForm").style.display = "block";
                }

                function closeForm() {
                    document.getElementById("myForm").style.display = "none";
                }
            </script>
            <!-- end of form tambah data -->


            <!-- end of data peserta -->
        </div>
    </section><!-- End alternatif Section -->

    <?php include "template/footer.php" ?>

</body>

</html>