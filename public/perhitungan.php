<?php
require '../config/connection.php';
error_reporting(0)
?>

<!-- JANGAN PERNAH RUBAH NAMA VARIABLE -->

<?php
// bebas rubah VALUE
$total_rank = 3; // max nilai = total baris / total row data
$decimal = 7;
$options = 1;
// bebas rubah

// jangan dirubah
$result = mysqli_query($selectdb, "select * from alternatif");
$baris = mysqli_num_rows($result);
// jangan dirubah


// bisa dirubah VALUE tapi harus match
$position = 0;
while ($n = mysqli_fetch_array($result)) {
    $name[$position] = $n['nama'];
    $position += 1;
}

$k1 = 11;
$k2 = 12;
$k3 = 13;
$k4 = 14;
$w[$k1] = 0.55802;
$w[$k2] = 0.26334;
$w[$k3] = 0.12188;
$w[$k4] = 0.05677;
$jum_kriteria = 4;

$position = 0;
$result = mysqli_query($selectdb, "select * from alternatif");
while ($data_alt_t = mysqli_fetch_array($result)) {
    $cel[strval($position + $k1)] = $data_alt_t['tujuan'];
    $cel[strval($position + $k2)] = $data_alt_t['jum_pinjaman'];
    $cel[strval($position + $k3)] = $data_alt_t['gaji'];
    $cel[strval($position + $k4)] = $data_alt_t['simpanan'];
    // jangan dirubah
    $position += 10;
    // jangan dirubah
}
// bisa dirubah VALUE tapi harus match

// Jangan dirubah VALUE
$kolom = $baris - 1;
$normal = $cel;
$hasil = 0;
$jumCon = 0;
$jumDis = [];
$totCon = 0;
$totDes = 0;
$rata2 = 0;
$ranking = [];
// Jangan dirubah VALUE
?>

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
            <nav id="navbar" class="navbar">
                <ul class="navbar">
                    <li><a href="index.php">Beranda</a></li>
                    <li><a href="tabel.php">Alternatif</a></li>
                    <li><a class="active" href="perhitungan.php">Perhitungan</a></li>
                    <li><a href="about.php">Tentang Kami</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a style="display: none;" class="btn-book-a-table" href="logout.php" type="submit">Logout</a>


        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <h1 data-aos="fade-up" style="text-align: center;">Hasil Perhitungan Electre</h1>
                <div class="card dropdown-toggle-split pt-4">
                    <div class="text-center " style="padding-top: 1rem">
                    </div>
                    <?php include "data.php" ?>
                </div>

                <div class="pt-4 mb-2">
                    <h4>
                        <center>NORMALISASI</center>
                    </h4>
                </div>
                <?php include "perhitungan/normalisasi.php" ?>
                <div class="pt-4 mb-2">
                    <h4>
                        <center>BOBOT KRITERIA</center>
                    </h4>
                </div>
                <?php include "perhitungan/bobot.php" ?>
                <div>
                    <div class="pt-4 mb-2">
                        <h4>
                            <center>CONCORDANCE DAN DISCORDANCE</center>
                        </h4>
                    </div>
                    <h6>
                        <center>CONCORDANCE</center>
                    </h6>
                    <?php include "perhitungan/concordance_discorcondance/concordance.php" ?>
                    <h6>
                        <center>DISCORDANCE</center>
                    </h6>
                    <?php include "perhitungan/concordance_discorcondance/discorcondance.php" ?>
                </div>

                <div>
                    <div class="pt-4 mb-2">
                        <h4>
                            <center>NILAI DOMINAN</center>
                        </h4>
                    </div>
                    <h6>
                        <center>CONCORDANCE</center>
                    </h6>
                    <?php include "perhitungan/dominan/concordance.php" ?>
                    <h6>
                        <center>DISCORDANCE</center>
                    </h6>
                    <?php include "perhitungan/dominan/discorcondance.php" ?>
                </div>

                <div>
                    <div class="pt-4 mb-2">
                        <h4>
                            <center>HASIL CONCORDANCE X DISCORDANCE</center>
                        </h4>
                    </div>

                    <?php include "perhitungan/hasil/cxd.php" ?>
                </div>
                <div>
                    <div class="pt-4 mb-2">
                        <h4>
                            <center>RANKING</center>
                        </h4>
                    </div>
                    <?php include "perhitungan/ranking.php" ?>
                </div>
            </div>
        </div>
        </div>
    </section><!-- End Hero Section -->


    <?php include "template/footer.php" ?>

</body>

</html>