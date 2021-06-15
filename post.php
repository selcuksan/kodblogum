<?php include('users.php');
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kod Bloğum</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ea90b6fae9.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #F0F2F5;">
    <?php include('header.php'); ?>
    <main class="main container" style="width: 60rem;">
        <div>            
            <?php
            if (isset($rows_post)) : ?>
                <h3 style="text-align: center;"><?php echo $rows_post['post_title']; ?></h3>
                <div class="post-detail border-0">
                    <?php if ($rows_post['user_name'] == $_SESSION['username']) : ?>
                        <span style="float: right; display: flex;"> <a title="Düzenle" href="edit.php?postedit=<?php echo $rows_post['post_url']; ?>" ><span><i class="fa fa-edit text-warning fa-lg" aria-hidden="true"></i></span></a></span>
                    <?php endif; ?>
                    <?php $data = htmlspecialchars($rows_post['post_content']); ?>
                    <pre class="border-0" style="overflow: auto;text-align: inherit;white-space:pre-wrap;word-break: break-word;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; overflow: hidden; line-height: normal;"><?php echo $data; ?></pre>
                </div>
                <div class="post-meta">
                    <ul>
                        <li>Yazar: <?php echo $rows_post['user_name']; ?></li>
                        <li>Tarih: <?php echo $rows_post['post_date']; ?></li>
                        <li>Kategori: <?php echo $rows_post['category_name']; ?></li>
                    </ul>
                </div>

            <?php else : ?>
                <?php header('location: index.php');  ?>

            <?php endif; ?>
        </div>
    </main>

</body>

</html>