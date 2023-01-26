<?php
include '../config/connection.php';

$error = '';
$validate = '';

//mengecek apakah form registrasi di submit atau tidak
if (isset($_POST['submit'])) {
    // menghilangkan backshlases
    $username = stripslashes($_POST['username']);
    //cara sederhana mengamankan dari sql injection
    $username = mysqli_real_escape_string($selectdb, $username);

    $name     = stripslashes($_POST['name']);
    $name     = mysqli_real_escape_string($selectdb, $name);

    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($selectdb, $password);


    //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
    if (!empty(trim($name)) && !empty(trim($username)) && !empty(trim($password))) {

        //memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
        if (cek_nama($username, $selectdb) == 0) {

            //hashing password sebelum disimpan didatabase
            $pass  = password_hash($password, PASSWORD_DEFAULT);

            //insert data ke database
            $query = "INSERT INTO users(`nama`, `username`,`password`) VALUES ('$name','$username','$pass')";
            $result   = mysqli_query($selectdb, $query);

            if (mysqli_connect_errno()) {
                // echo "gagal : " . mysqli_connect_error();
                echo "<script>alert('Gagal Mendaftar!');</script>";
            } else {
                echo "<script>alert('Pendaftaran Berhasil!');window.location='login.php'</script>";
            }
        } else {
            echo "<script>alert('Username Sudah Terdaftar!!');</script>";
        }
    }
} else {
    $error =  'Data tidak boleh kosong !!';
}

function cek_nama($username, $selectdb)
{
    $nama = mysqli_real_escape_string($selectdb, $username);
    $query = "SELECT * FROM users WHERE username = '$username'";
    if ($result = mysqli_query($selectdb, $query)) return mysqli_num_rows($result);
}

?>

<!DOCTYPE html>
<html lang="en">

<style type="text/css">
    .wrapper {
        /* max-width: 400px;
  min-height: 400px;*/
        /*margin: 30px auto;*/
        padding: 40px 30px 30px 30px;
        background-color: #ecf0f3;
        border-radius: 15px;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
        /*justify-content: center*/
        ;
    }

    .un {
        width: 76%;
        color: rgb(38, 50, 56);
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 1px;
        background: rgba(136, 126, 126, 0.04);
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        outline: none;
        box-sizing: border-box;
        border: 2px solid rgba(0, 0, 0, 0.02);
        margin-bottom: 50px;
        margin-left: 46px;
        text-align: center;
        margin-bottom: 27px;
        font-family: 'Ubuntu', sans-serif;
    }

    .sign {
        /*padding-top: 40px;*/
        color: #ce1212;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;

    }
</style>

<?php include "template/header.php" ?>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="../index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>SPK Electre<span>.</span></h1>
            </a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container col-lg-5">


            <!-- register begin -->
            <div class="wrapper" style="justify-content: center">
                <div class="text-center sign"> Sign Up </div>
                <form autocomplete="off" class="" action="" method="post" style="padding-top: 40px;">
                    <input class="un" type="text" name="username" placeholder="Username" required>
                    <input class="un" type="test" name="name" placeholder="name" required>
                    <input class="un" type="password" name="password" placeholder="Password" required>
                    <button class="btn-book-a-table un " type="submit" name="submit">Sign Up</button>
                </form>
                <div class="text-center">Sudah Punya Akun ?<a href="login.php"> Sign In</a> </div>
            </div>
            <!-- login end -->



        </div>
    </section><!-- End Hero Section -->

    <?php include "template/footer.php" ?>

</body>

</html>