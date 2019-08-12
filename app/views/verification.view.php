<?php require 'partials/partial-head.php'?>

<?php if(isset($_SESSION['id'])): ?>
    <?php require('partials/partial-nav.php') ?>
    
    <div class='hero'>
            
            <ul class="ver-nav">
                <li class="ver-nav-item"><a href="/settings">Edit Profile</a></li>
                <li class="ver-nav-item"><a href="/passwordSetting">Change Password</a></li>
                <li class="ver-nav-item"><a class="verification" href="/verification">Verification</a></li>

            </ul>

            <div style="margin-left:16%;padding-top:10px;padding-left:10px;">
                <div class="email-div">
                    <?php foreach ($user as $user):?>

                        <div class="email-div-content">
                            <h1><?= $user->email?></h1>
                        </div>
                        <div class="email-div-status">
                            <?php if($user->evstatus == 1): ?>
                                <h1>Verified</h1>
                            <?php else: ?>
                                <h1>Not Verified</h1>   
                            <?php endif ?>
                        </div>
                <?php endforeach; ?>
                </div>                    
            </div>
    </div>


<?php else : ?>
        <?php return redirect('');?>
<?php  endif ?>

<?php  unset($_SESSION['error']);	?>

<style>


.email-div{
    background:#f2f2f2;
    width:70%;
    padding:8px;
    border-radius:8px;
    float:left;
}

.email-div-content{ 
    width:70%;
    float:left;
    text-align:center;
}
.email-div-status{
    width:28%;
    text-align:center;
    float:left;
    border-left:1px solid #000;
}

.ver-nav {
  list-style-type: none;
  padding: 0;
  margin:0;
  width: 15%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.ver-nav-item a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

.ver-nav-item a:hover:not(.<?php echo $view ?>) {
  background-color: #555;
  color: white;
}
.<?php echo $view ?>{
  background-color: #4CAF50;
  color: white;
}


</style>


<?php require 'partials/partial-foot.php'?>