<?php
require '../config/connection.php';
?>

<?php
if (isset($_POST["editdata"])) {
    $id_data  = $_POST['id_data'];
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



    $sql = "UPDATE `alternatif` set `nama`=:nama, `tujuan_nama`=:tujuan_nama, 
     `tujuan`=:tujuan, `jum_pinjaman`=:jum_pinjaman, 
     `gaji`=:gaji, `simpanan`=:simpanan where `id`=:id_data";

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id_data', $id_data);
    $stmt->bindValue(':nama', $nama);
    $stmt->bindValue(':tujuan_nama', $tujuan_nama);
    $stmt->bindValue(':tujuan', $tujuan);
    $stmt->bindValue(':jum_pinjaman', $jum_pinjaman);
    $stmt->bindValue(':gaji', $gaji);
    $stmt->bindValue(':simpanan', $simpanan);
    $stmt->execute();

    header("location:index.php");
}
?>

</html>

<!DOCTYPE html>
<html lang="en">

<?php include "template/header.php" ?>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>SPK Electre<span>.</span></h1>
            </a>

            <a class="btn-book-a-table" href="logout.php" type="submit">Logout</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= alternatif Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">

            <!-- edit data peserta -->
            <h1 data-aos="fade-up" style="text-align: center;">Edit Data Anggota</h1>

            <a class="btn btn-primary" href="index.php" role="button">Kembali</a>

            <!-- table edit -->
            <div class="card">
                <?php
                include "../config/connection.php";
                $id_data = $_GET['id_data'];
                $data = mysqli_query($selectdb, "select * from alternatif where id='$id_data'");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <form method="post" action="">
                        <input type="hidden" name="id_data" value="<?php echo $d['id']; ?>">
                        <!--kolom nama-->
                        <div class="form-group row m-sm-3">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" value="<?php echo $d['nama']; ?>">
                            </div>
                        </div>
                        <!--kolom tujuan nama-->
                        <div class="form-group row m-sm-3">
                            <label class="col-sm-3 col-form-label">Tujuan</label>
                            <div class="col-sm-9">
                                <select class="form-control" style="display: block; margin-bottom: 4px;" required name="tujuan_nama">
                                    <option disabled selected value=""><?php echo $d['tujuan_nama']; ?></option>
                                    <option value="Pendidikan">Pendidikan</option>
                                    <option value="Usaha">Usaha</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Pernikahan">Pernikahan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <!--kolom jum_pinjaman-->
                        <div class="form-group row m-sm-3">
                            <label class="col-sm-3 col-form-label">Jumlah Pinjaman</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jum_pinjaman" value="<?php echo $d['jum_pinjaman']; ?>">
                            </div>
                        </div>
                        <!--kolom gaji-->
                        <div class="form-group row m-sm-3">
                            <label class="col-sm-3 col-form-label">Gaji</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="gaji" value="<?php echo $d['gaji']; ?>">
                            </div>
                        </div>
                        <!--kolom simpanan-->
                        <div class="form-group row m-sm-3">
                            <label class="col-sm-3 col-form-label">Simpanan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="simpanan" value="<?php echo $d['simpanan']; ?>">
                            </div>
                        </div>
                        <!-- button simpan -->
                        <div class="m-sm-3 pe-sm-3 d-flex justify-content-end">
                            <button type="submit" name="editdata" class="btn btn-success ">SIMPAN</button>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <?php include "template/footer.php" ?>

</body>

</html>