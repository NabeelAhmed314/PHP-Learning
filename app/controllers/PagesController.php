<?php

namespace App\controllers;

use App\core\App;


class PagesController 
{
    
    public function login()  
    {   
        return view('login');
    }

    public function home()  
    {   
        return view('index');
    }

    public function settings()  
    {   
        return view('settings');
    }
    public function passwordSetting()  
    {   
        return view('passwordSetting');
    }

    public function verification()  
    {   
        session_start();
        $user=App::get('database')->selectWhere('users',$_SESSION['id']);
        return view('verification',compact('user'));
    }

    public function verify()  
    {   
        session_start();
        date_default_timezone_set("Asia/Karachi");
        $verifyRequest = App::get('database')->selectWhere('verificationRequest',$_GET['id']);
        $currentTime = date('Y-m-d h:i:s a', time()); 
        $expiry= 86400 ; 
        
        if($verifyRequest == Null )
        {
            $linkEXP = true;
        }
        else
        {
            foreach ($verifyRequest as $verifyRequest)
            {
                $afterExpiry = strtotime($verifyRequest->TimeCreated) + $expiry;
                $user = App::get('database')->selectWhere('users',$verifyRequest->UserID);            
                if( $afterExpiry < strtotime( $currentTime) ) 
                {
                    $linkEXP = true ;
                    App::get('database')->deleteWhere('verificationrequest',$_GET['id']);
                }
                else
                {
                    if($verifyRequest->vkey == $_GET['evkey'])
                    {
                        $linkEXP = false ;
                        $_SESSION['UserID'] = $verifyRequest->UserID;
                    }
                    else
                    {
                        $linkEXP = true ;
                    }
                }    
            }
        }    
      
        return view('verify',compact('linkEXP'));
    }

    public function about()  
    {   
        return view('about');
    }

    public function forgetPass()  
    {   
        return view('forgetPass');
    }

    public function changePass()  
    {   
        date_default_timezone_set("Asia/Karachi");
        $user = App::get('database')->selectALL('users');
        $forgetPass = App::get('database')->selectALL('forgetPass');
        $currentTime = date('Y-m-d h:i:s a', time());
        return view('changePass',compact('user','forgetPass','currentTime'));
    }
    public function aboutCulture()  
    {   
        return view('about-culture');
    }

    public function contact()  
    {   
        return view('contact');
    }

    public function signup()  
    {   
        return view('signup');
    }

}