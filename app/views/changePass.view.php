<?php require 'partials/partial-head.php'?>
<?php session_start(); ?>
<?php $expiry= 86400 ; ?>
<?php 
    $_SESSION['forgetid'] = $_GET['reqid'];
    $_SESSION['vkey'] = $_GET['vkey'];
?> 
<?php 

    if($forgetPass == Null )
    {
        $linkEXP = true;
    }
    else
    {
        foreach ($forgetPass as $forgetPass)
        {
            $afterExpiry = strtotime($forgetPass->TimeCreated) + $expiry;
            if($forgetPass->id == $_GET['reqid'])
            {
                if( $expiry < $currentTime ) 
                {
                    $linkEXP = true ;
                    App::get('database')->deleteWhere('forgetPass',$_SESSION['forgetid']);
                }
                else
                {
                    if($forgetPass->vkey == $_GET['vkey'])
                    {
                        $linkEXP = false ;
                        $_SESSION['UserID'] = $forgetPass->UserID;
                    }
                    else
                    {
                        $linkEXP = true ;
                    }
                }
            }
            else
            {
                $linkEXP = true ;
            }    
        }
    }    
?>

<?php if($linkEXP) : ?>

    <div class="formbox">
        <h1>Link Expired</h1>
        <p>
        Kindly request a new password request using the Link below.<br>
        Or you can login if you remember your password.<br><br>
        <a href="/">Login</a> <a href="/forgetPass">Forget Password</a>
        </p>


    </div>

<?php else: ?>

<h1 style="margin-left:auto;margin-right:auto;margin-top:50px;width:50%;">Change Password</h1>
    <div class="form-box" style="margin-left:auto;margin-right:auto;margin-top:50px;width:50%;">
        <?php require 'partials/partial-error-para.php' ?>		
        <form action="/changePassword" method="POST">
            <label for="newPass">New Password</label>
            <input class='form-input' type="password" id="newPass" name="newPass"  placeholder="New Password">

            <label for="retypeNewPass">Retype New Password</label>
            <input class='form-input' type="password" id="retypeNewPass" name="retypeNewPass"  placeholder="Retype New Password">

            <input class='form-input' type="submit" value="Submit">
        </form>
    </div>
<?php endif ?>
    
 <style>
    .formbox {
        width:50%;
        background:#f2f2f2;
        border-radius:10px;
        height:330px;
        padding-left:50px;
        padding-top:20px;
        padding-bottom:20px;
        margin-left:auto;
        margin-right:auto;
        margin-top:50px;
    }

    .formbox h1{
        font-size:38px;
    }
    .formbox p {
        font-size:22px;        
    }
    .formbox p a{
        border: 1px solid black;
        text-decoration:none;
        font-size:32px;
        margin-right:15px;
        margin-left:15px;
        padding:6px;
        background:#000;
        color:#fff;
        border-radius:6px;
    }

    .formbox p a:hover {
        background:#fff;
        color:#000;
        border:none;    
    }


</style>   
<?php require 'partials/partial-foot.php'?>



