<?php
include("users.php");
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Kod Bloğum</title>
</head>

<body style="background-color: #F0F2F5;">
    <?php include('header.php'); ?>

    <h3 align="center">İçerik Ekle</h3>

    <form action="" method="POST" class="form border-0">
        <?php include('formerrors.php'); ?>
        <?php include('messages.php'); ?>

        <ul>
            <li>
                <label for="title">Makale Başlığı</label>
                <input style="font-weight: 100;" placeholder="Makale Başlığını Girin" minlength="5"  class="form-control border" maxlength="75" required type="text" id="title" name="title" value="">
            </li>
            <li>
                <label for="category">Makale Kategorisi</label>
                <select  class="form-control" id="category" name="category" required>
                    <option disabled>Seçin</option>
                    <?php if (count($rows2) > 0) : ?>
                        <?php foreach ($rows2 as $row) : ?>
                            <option style="font-weight: 100;" value="<?php echo  $row[0]; ?>"><?php echo  $row[0]; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </li>
            <li>
                <label for="content">Makale İçeriği</label>
                <textarea style="font-weight: 100;" placeholder="Makale İçeriğini Girin" class="form-control" minlength="25"  maxlength="10000" required value="" name="content" id="content" cols="60" rows="10"></textarea>
            </li>
            <div>
                <button style="display: flex;" class="btn btn-primary mx-auto" name="newpost-btn" type="submit">PAYLAŞ</button>
            </div>
        </ul>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>