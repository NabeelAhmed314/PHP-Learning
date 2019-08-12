<?php  
    $inactive = 5; 
    session_start(); 
	$_SESSION['expire'] = time() + $inactive;

    if(isset($_SESSION['id'])) 
    {
        require('partial-nav.php'); 		
         return redirect('index');  
    }
	else 
         require('partial-log-nav.php'); 
          