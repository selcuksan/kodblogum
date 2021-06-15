<?php
// include("users.php");
// require_once "users.php";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kod Bloğum</title>
    <script src="https://kit.fontawesome.com/ea90b6fae9.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color: #F0F2F5;">


    <?php include('header.php'); ?>
    <?php include('messages.php'); ?>

    <main class="main container" style="width: 60rem;">

        <h3>Gönderiler</h3>

        <div class="articles">

            <?php if (count($rows) > 0) : ?>

                <?php foreach ($rows as $i => $row) : ?>

                    <article class="border-0">
                        <?php if ($row[7] == $_SESSION['username']) : ?>
                            <div style="float: right;"><a title="Sil" href="index.php?posturl=<?php echo $row[1]; ?>"><i style="float: right;" class="fa fa-trash text-danger fa-lg" aria-hidden="true"></i></a></div>

                        <?php endif; ?>
                        <h4> <?php echo $i + 1, ") ", $row[0]; ?></h4>
                        <!-- style="overflow: auto;text-align: inherit;white-space:pre-wrap;word-break: break-word;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; overflow: hidden; line-height: normal;" -->
                        <ul>
                            <?php
                            echo "<li><span class='time'> ", $row[5], "</span></li>";
                            echo "<li><span class='time'> ", $row[7], "</span></li>";
                            echo "<li><span class='time'> ", $row[6], "</span></li>";
                            ?>
                        </ul>
                        <form method="get" action="post.php">
                            <button title="Görüntüle" name="url" type="submit" class="btn btn-primary" value="<?php echo  $row[1]; ?>">Görüntüle</button>

                        </form>


                        <!-- <span ><i class="far fa-trash-alt"></i></span> -->
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>


        </div>

    </main>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>