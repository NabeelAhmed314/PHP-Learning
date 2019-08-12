<?php require 'partials/partial-head.php'?>
<?php session_start();?>

<?php if(isset($_SESSION['id'])): ?>
<?php require('partials/partial-nav.php') ?>
<div class='hero'>
    <h1>All Users</h1>

    <ul>
        <?php foreach ($users as $user): ?> 
        <li><?= $user->name ?></li>
        <?php endforeach ?>
    </ul>

    <?php echo $_SESSION['id']; ?>
</div>
<?php else : ?>

<?php return redirect('');?>


<?php  endif ?>


<?php require 'partials/partial-foot.php'?>