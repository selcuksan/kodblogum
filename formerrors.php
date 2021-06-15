<?php
if (count($errors) > 0) : ?>

    <?php foreach ($errors as $error) : ?>
        <div class="alert alert-danger">
            <li><?php echo $error; ?></li>
        </div>
    <?php endforeach; ?>
<?php endif; ?>