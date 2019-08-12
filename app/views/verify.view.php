<?php require 'partials/partial-head.php'?>

<?php   if ($linkEXP == true ): ?> 
    <div class="card">
        <div class="card-content">
            <h3>This Link has been Expired!</h3>
            <p>Login and use verification option in setting to get a new verification link. <a href="/">Login</a></p>
        </div>
    </div>

<?php  else : ?>
<?php  App::get('database')->
                        update('users' ,['evstatus' => true ],$_SESSION['UserID']); ?>
    <div class="card">
        <img src="https://icon2.kisspng.com/20180611/zt/kisspng-social-media-instagram-verified-badge-symbol-compu-5b1eedb564fc38.3684025715287535894136.jpg">        
        <div class="card-content">
            <h3>Your account has been verified!</h3>
            <h5>Now you can enjoy posting pictures without any interuption!</h5>
            <p>You will need to login if not already logged! <a href="/">Login</a></p>
        </div>
    </div>
<?php  App::get('database')->deleteWhere('verificationrequest',$_SESSION['reqid']); ?>
<?php endif ?>

<?php unset($_SESSION['UserID']); ?>

<style>

.card{
    background:#f2f2f2;
    width:40%;
    height:500px;
    border-radius:30px;
    overflow:hidden;
    margin-left:auto;
    margin-right:auto;
    margin-top:50px;
}
.card-content{
    width:50%;
    margin-left:auto;
    margin-right:auto;
    margin-top:10px;
    text-align:center;
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 20px;
  width: 40%;
  border-radius: 50px;
}
</style>
<?php require 'partials/partial-foot.php'?>