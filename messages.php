<?php
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}
if (isset($_SESSION['message'])) : ?>

    <div style="width: 60rem;" class="container alert alert-<?php echo $_SESSION['type']; ?>">
        <li style="text-align: center;"><?php echo $_SESSION['message']; ?></li>
        <?php unset($_SESSION['message']); ?>
        <?php unset($_SESSION['type']); ?>
    </div>

<?php endif; ?>