<?php require 'partials/partial-head.php'?>
<?php session_start(); ?>    

<?php if(isset($_SESSION['id'])): ?>
    <?php require('partials/partial-nav.php') ?>
    
    <div class='hero'>
            
            <ul class="ver-nav">
                <li class="ver-nav-item"><a class="" href="/settings">Edit Profile</a></li>
                <li class="ver-nav-item"><a class="passwordSetting" href="/passwordSetting">Change Password</a></li>
                <li class="ver-nav-item"><a class="verification" href="/verification">Verification</a></li>
            </ul>

            <div style="margin-left:16%;padding-top:10px;padding-left:10px;">
                <div class="form-box" style="width:50%;background:#f2f2f2;border-radius:10px;height:330px;padding:20px;">
            			<?php require 'partials/partial-error-para.php' ?>		

                  <form action="/updatePassword" method="POST">
                      <label for="oldPass">Old Password</label>
                      <input class='form-input' type="password" id="oldPass" name="oldPass"  placeholder="Old Password">

                      <label for="newPass">New Password</label>
                      <input class='form-input' type="password" id="newPass" name="newPass"  placeholder="New Password">

                      <label for="retypeNewPass">Retype New Password</label>
                      <input class='form-input' type="password" id="retypeNewPass" name="retypeNewPass"  placeholder="Retype New Password">

                      <input class='form-input' type="submit" value="Submit">
                    </form>
                </div>
            </div>
    </div>


<?php else : ?>
        <?php return redirect('');?>
<?php  endif ?>

<?php  unset($_SESSION['error']);	?>


<style>

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