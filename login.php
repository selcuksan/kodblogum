<?php
// session_start();
include("users.php");

if (isset($_SESSION['username'])) {
    header('location: index.php');
    exit();
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color: #F0F2F5;" >

    <?php include('header.php'); ?>
    <main class="main container">

        <h3>Giriş yap</h3>

        <form action="login.php" method="POST" class="form border-0" style="border-radius: 5%;box-shadow: 0 2px 4px rgb(0 0 0 / 10%);margin: auto;width: 396px;">
            <?php include('formerrors.php'); ?>

            <ul>
                <li>
                    <label for="username">Kullanıcı adı</label>
                    <input style="font-weight: 100;" placeholder="Kullanıcı adınızı girin" type="text" name="username">
                </li>
                <li>
                    <label for="password">Şifre</label>
                    <input style="font-weight: 100;" placeholder="Şifrenizi girin" aria-describedby="passwordHelpBlock" type="password" name="password">
                
                </li>
                <li>
                    <button type="submit" name="login-btn">Giriş yap</button>
                </li>
            </ul>
            <span class="or">Hesabın yok mu?</span>
            <!-- <a style="text-decoration: none;" href="register.php" class="form-url">Hemen kayıt ol!</a> -->
            <div>
                <button onclick="location.href='register.php'" style="display: flex;" class="btn btn-success btn-lg mx-auto"  type="button" >Yeni Hesap Oluştur</button>
            </div>
        </form>

    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>