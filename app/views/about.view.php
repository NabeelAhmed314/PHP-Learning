<?php require 'partials/partial-head.php'?>
<?php session_start(); ?>
<?php if(isset($_SESSION['id'])): ?>
<?php require('partials/partial-nav.php') ?>

<div class='hero'>
    <h1>About </h1>
    <?php echo $_SESSION['id']; ?>
    <ul>
            <li><?= $_SESSION['id']; ?></li>
            <li><?= $_SESSION['name']; ?></li>
            <li><?= $_SESSION['username']; ?></li>
            <li><?= $_SESSION['email']; ?></li>
            <li><?= $_SESSION['phone']; ?></li>
    </ul>
</div>

<?php else : ?>
<?php return redirect('');?>

<?php  endif ?>
<?php require 'partials/partial-foot.php'?>