<?php
// include("users.php");
// if (!isset($_SESSION)) {
//     session_start();
// }
?>
<header class="header">
    <div class="container">
        <a class="btn btn-secondary" href="index.php" class=""> ANA SAYFA
        </a>
        <nav>
            <ul class="my-auto">
                <?php if (isset($_SESSION['username'])) : ?>


                    <?php
                    if (count($categories) > 0) : ?>
                        <?php foreach ($categories as $category) : ?>
                            <li>
                                <a id="cats" class="btn border-0" href="index.php?category=<?php echo $category[0]; ?>">
                                    <?php echo $category[0]; ?></a>
                            </li>
                        <?php endforeach; ?>

                    <?php endif; ?>

                    <li class="btn ml-5">
                        <a href="index.php?user=<?php echo $_SESSION['username']; ?>"><?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="btn mx-0">
                        <a href="newpost.php">İçerik Ekle</a>
                    </li>
                    <li>
                        <a class="btn btn-danger pt-1 ml-4 float-right" href="logout.php">Çıkış</a>
                    </li>
                <?php else : ?>
                    <li class="btn mx-0">
                        <a href="login.php">Giriş</a>
                    </li>

                    <li class="btn mx-0">
                        <a href="register.php">Kayıt</a>
                    </li>
                <?php endif; ?>


            </ul>
        </nav>

    </div>
</header>