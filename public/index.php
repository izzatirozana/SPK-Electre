</html>
<!DOCTYPE html>
<html lang="en">
<?php include "template/header.php" ?>
<body>
    <style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 14px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 17px;
  transition: 0.4s;
}

.activee, .accordion:hover {
  background-color: #ccc;
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <h1>SPK Electre<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul class="navbar">
                    <li><a class="active" href="#">Beranda</a></li>
                    <li><a href="tabel.php">Alternatif</a></li>
                    <li><a href="perhitungan.php#RANKING">Perhitungan</a></li>
                    <li><a href="about.php">Tentang Kami</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a style="display: none;" class="btn-book-a-table" href="logout.php" type="submit">Logout</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= alternatif Section ======= -->
     

    <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <div class="row" style="text-align: left;">
             <div><h4><b>Metode Electre</b></h4>
                <p>Metode Electre merupakan salah satu metode pengambilan keputusan multikriteria berdasarkan pada konsep outranking dengan menggunakan perbandingan berpasangan dari alternatif – alternatif berdasarkan setiap kriteria yang sesuai.</p>
                <br/>
                <h4><b>Tahapan</b></h4>
                Terdapat 7 tahap dalam pengambilan keputusan menggunakan metode Electre, antara lain:
                <br/>
                <button class="accordion">1. Normalisasi matriks keputusan</button>
                <div class="panel">
                  <p><img src="../assets/img/tahap1.jpeg" ></p>
                </div>
                <button class="accordion">2. Pembobotan pada matriks yang telah dinormalisasi</button>
                <div class="panel">
                  <p><img src="../assets/img/tahap2.jpeg" ></p>
                </div>
                <button class="accordion">3. Penentuan himpunan Concordance dan Discordance</button>
                <div class="panel">
                  <p><img src="../assets/img/tahap3.jpeg" ></p>
                </div>
                <button class="accordion">4. Hitung matriks Concordance dan Discordance</button>
                <div class="panel">
                  <p><img src="../assets/img/tahap4.jpeg" ></p>
                </div>
                <button class="accordion">5. Penentuan matriks dominan Concordance dan Discordance</button>
                <div class="panel">
                  <p><img src="../assets/img/tahap5.jpeg" ></p>
                </div>
                <button class="accordion">6. Menentukan aggregate dominance matrix</button>
                <div class="panel">
                  <p><img src="../assets/img/tahap6.jpeg" ></p>
                </div>
                <button class="accordion">7. Eliminasi alternatif yang less favourable</button>
                <div class="panel">
                  <p><img src="../assets/img/tahap7.jpeg" ></p>
                </div>
             
                <h4><b>Studi Kasus</b></h4>
                Pada kasus ini terdapat 4 kriteria, yaitu Tujuan (K1), Jumlah Pinjaman (K2), Gaji (K3), dan Simpanan (K4) guna mengambil keputusan untuk <b> Penerimaan Pengajuan Pinjaman Anggota Koperasi.</b> Kriteria Tujuan bersifat kualitatif sehingga perlu di konversi menjadi kuantitatif. Kriteria Jumlah Pinjaman, Gaji, dan Simpanan bersifat kuantitatif dalam rupiah.
            </div>
        </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="../assets/img/beranda.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

    <?php include "template/footer.php" ?>

    <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("activee");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

</body>

   
</html>