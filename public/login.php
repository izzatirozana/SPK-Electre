<?php
include '../config/connection.php';
session_start();
if (isset($_POST['submit'])) {

    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($selectdb, $username);

    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($selectdb, $password);

    if (!empty(trim($username)) && !empty(trim($password))) {

        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($selectdb, $query);
        $rows = mysqli_num_rows($result);

        if ($rows != 0) {
            $hash = mysqli_fetch_assoc($result)['password'];

            if (password_verify($password, $hash)) {
                $_SESSION['username'] = $username;
                // $_SESSION['password'] = $password;

                header('location:home.php');
            } else {
                echo "<script>alert('Password Verify Gabisa !!');</script>";
            }
        } else {
            echo "<script>alert('Login Gagal !!');</script>";
        }
    } else {
        echo "<script>alert('Data Tidak Boleh Kosong !!');</script>";
    }
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
        align: center
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


            <!-- login begin -->
            <div class="wrapper">
                <div class="text-center sign"> Sign In </div>
                <form class="" action="login.php" method="post" style="padding-top: 40px;">
                    <input class="un" type="text" name="username" placeholder="Username" required="">
                    <input class="un" type="password" name="password" placeholder="Password" required="">
                    <button class="btn-book-a-table un " type="submit" name="submit">Sign In</button>
                </form>
                <div class="text-center">Belum Punya Akun ?<a href="register.php"> Sign Up</a> </div>
            </div>
            <!-- login end -->

        </div>
    </section><!-- End Hero Section -->

    <?php include "template/footer.php" ?>

</body>

</html>