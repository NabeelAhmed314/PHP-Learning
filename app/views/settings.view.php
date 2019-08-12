<?php require 'partials/partial-head.php'?>
<?php session_start(); ?>    

<?php if(isset($_SESSION['id'])): ?>
    <?php require('partials/partial-nav.php') ?>
    
    <div class='hero'>
            
            <ul class="ver-nav">
                <li class="ver-nav-item"><a class="settings" href="/settings">Edit Profile</a></li>
                <li class="ver-nav-item"><a class="passwordSetting" href="/passwordSetting">Change Password</a></li>
                <li class="ver-nav-item"><a class="verification" href="/verification">Verification</a></li>
            </ul>

            <div style="margin-left:16%;padding-top:10px;padding-left:10px;">
                <div class="form-box" style="width:50%;background:#f2f2f2;border-radius:10px;height:400px;padding:20px;">
            			<?php require 'partials/partial-error-para.php' ?>		

                  <form action="/updateSignup" method="POST">
                      <label for="name">Name</label>
                      <input class='form-input' type="text" id="name" name="name" value="<?= $_SESSION['name']?>" placeholder="Name"  >

                      <label for="username">Username</label>
                      <input class='form-input' type="text" id="username" name="username" value="<?= $_SESSION['username']?>" placeholder="Username"  >
                                              
                      <label for="email">Email</label>
                      <input class='form-input' type="text" id="email" name="email" value="<?= $_SESSION['email']?>" placeholder="Email Address"  >

                      <label for="phone">Phone</label>
                      <input class='form-input' type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{7}" value="<?= $_SESSION['phone']?>" placeholder="Phone No."  >

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