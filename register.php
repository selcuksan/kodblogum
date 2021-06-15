<?php
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
    <title>Kaydol</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="background-color: #F0F2F5;">


    <?php include('header.php'); ?>
    <main class="main container">

        <h3>Kayıt ol</h3>

        <form action="register.php" method="POST" class="form border-0" style="border-radius: 5%;box-shadow: 0 2px 4px rgb(0 0 0 / 10%);margin: auto;width: 396px;">

            <?php include('formerrors.php'); ?>
            <div>
                <ul>
                    <li>
                        <label for="username">Kullanıcı Adı</label>
                        <input style="font-weight: 100;" placeholder="Ad Soyad" minlength="3" maxlength="32" required type="text" name="username" value="<?php echo $username ?>">
                    </li>
                    <li>
                        <label for="username">E-posta</label>
                        <input style="font-weight: 100;" placeholder="isim@example.com" required type="email" name="email" value="<?php echo $email ?>">
                        <small id="emailHelp" class="form-text text-muted">E-postanızı asla başkalarıyla paylaşmayacağız.</small>
                    </li>
                    <li>
                        <label for="password">Şifre</label>
                        <input style="font-weight: 100;" placeholder="Şifre" aria-describedby="emailHelp" minlength="8" maxlength="20" aria-describedby="passwordHelpBlock" required type="password" name="password" value="<?php echo $password ?>">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Şifreniz 8-20 karakter uzunluğunda olmalı, harf ve rakamlardan oluşmalı ve boşluk, özel karakter veya emoji içermemelidir.

                        </small>
                    </li>
                    <li>
                        <label for="password">Şifre (Tekrar)</label>
                        <input style="font-weight: 100;" placeholder="Şifre" required minlength="8" maxlength="20" type="password" name="re_password" value="<?php echo $re_password ?>">
                    </li>

                </ul>
            </div>
            <div>
                <button style="display: flex;" class="btn btn-success btn-lg mx-auto" name="register-btn" type="submit">Kayıt ol</button>
            </div>
            <div class="mt-3">
                <span class="or">Hesabın var mı?</span>
                <a style="text-decoration: none;" href="login.php" class="form-url">Hemen giriş yap!</a>
            </div>
        </form>

    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>