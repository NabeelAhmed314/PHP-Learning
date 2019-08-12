<?php require 'partials/partial-head.php'?>
<?php session_start();?>

<?php if(isset($_SESSION['id'])): ?>
<?php require('partials/partial-nav.php') ?>
<div class='hero'>
    <h1>Contact</h1>
    <?php echo $_SESSION['id']; ?>
</div>
<?php else : ?>
<?php return redirect('');?>

<?php  endif ?>
<?php require 'partials/partial-foot.php'?>