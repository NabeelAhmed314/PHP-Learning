<?php

namespace App\controllers;

use App\core\App;

    class UsersController 
    {
        public function login()
        {
            session_start();

            $users = App::get('database')->selectAll('users');
            $_SESSION['error'] = NULL;

            if($users == NULL){
                $_SESSION['error'] = 'No user Found';                    
            }

            

            if( !empty($_POST['loginName'])  &&  !empty($_POST['password']) )
            {
                foreach ($users as $user) 
                {
                    if($_POST['loginName'] == $user->username || $_POST['loginName'] == $user->email || $_POST['loginName'] == $user->phone)
                    {
                        if( sha1($_POST['password']) == $user->password )
                        {
                            $_SESSION['id'] = $user->id;
                            $_SESSION['name'] = $user->name;
                            $_SESSION['username'] = $user->username;
                            $_SESSION['email'] = $user->email;
                            $_SESSION['phone'] = $user->phone;
                            $_SESSION['password'] = $user->password;
                            $_SESSION['error'] = NULL;
                            return redirect('index');
                        }
                        else
                        {
                            $_SESSION['error'] = 'Password Incorrect';                
                            break;
                        }
                    }
                    else
                    {
                        $_SESSION['error'] = 'No user Found';                    
                    }
                    
                }
            }
            else
            {
                $_SESSION['error'] = 'Both Inputs are required';                    
            }    
        
            if(!( $_SESSION['error'] == NULL ))
            {
                return redirect('');                
            }
        }

        public function logout()
        {
            session_start();
            session_destroy();
            return redirect('');
        }

        public function index()
        {
            $users = App::get('database')->selectAll('users');
            return view('users',compact('users'));
        }

        public function signup()
        {
            session_start();
            
            $users = App::get('database')->selectAll('users');
            $evkey = sha1(time().$_POST['email']);
            $_SESSION['error'] = NULL;

            if( !empty($_POST['name'])  &&  !empty($_POST['username'])  &&  !empty($_POST['email'])  &&  
                !empty($_POST['phone'])  && !empty($_POST['password'])  && !empty($_POST['retypepassword'])   
                )
            {
                    if (preg_match("/^[a-zA-Z ]*$/",$_POST['name'])) 
                    {
                            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
                            {
                                foreach ($users as $user) 
                                {
                                    if(!($_POST['username'] == $user->username))
                                    {
                                        if(!($_POST['email'] == $user->email))
                                        {
                                            if(!($_POST['phone'] == $user->phone))
                                            {
                                                if($_POST['password'] == $_POST['retypepassword'])
                                                {
                                                    continue;
                                                }
                                                else
                                                {
                                                    $_SESSION['error'] = 'Password doesnot match';
                                                    break;
                                                }
                                            }
                                            else
                                            {
                                                $_SESSION['error'] = 'Phone No. is already registered';
                                                break;
                                            }
                                        }
                                        else
                                        {
                                            $_SESSION['error'] = 'Email already taken';
                                            break;
                                        }
                                    }
                                    else
                                    {
                                        $_SESSION['error'] = 'Username already taken';
                                        break;
                                    }
                                }
                            }
                            else
                            {
                                $_SESSION['error'] = 'Invalid email format'; 
                            }
                    }
                    else 
                    {
                        $_SESSION['error'] = 'Only letters and white space allowed in Name';         
                    }
            }
            else{
                $_SESSION['error'] = 'All Inputs are necessary to be filled';
            }

            
            if($_SESSION['error'] == NULL)
            {
                $lastID = App::get('database')->
                insert('users',[
                    'name' =>$_POST['name'],
                    'username' =>$_POST['username'],
                    'email' =>$_POST['email'],
                    'password' =>sha1($_POST['password']),
                    'phone' =>$_POST['phone']
                ]);    

                $lastRequestID = App::get('database')->
                insert('verificationRequest',[
                    'UserID' => $lastID,
                    'vkey' => $evkey,
                ]);    

                

                $email = $_POST['email'];
                $subject = 'Verify Your Account';
                $message = 'Hi'. " {$_POST['name']}". ',' . "\n\n"; 
                $message .= 'Welcome to FaceInsta!.'. "\n\n"; 
                $message .= 'Use this Link to verify your email address:'. "\n";
                $message .= "<a href='http://localhost:8888/verify?evkey={$evkey}&id={$lastRequestID}'>Verify</a>". "\n\n"; 
                $message .= 'Sincerely,'. "\n";
                $message .= 'FaceInsta Team';

                $msg = nl2br($message);
                
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                
                if(mail($email,$subject,$msg,$headers))
                {
                    $_SESSION['error'] = "Verification Email Sent!";
                }
                else
                {
                    $_SESSION['error'] = "Error in sending Email";
                }
                return redirect('');
            }
            else
            {
                return redirect('signup');
            }

        }

        public function update()
        {
            session_start();
            
            $users = App::get('database')->selectAll('users');
            $_SESSION['error'] = NULL;


               if(  $_SESSION['name'] == $_POST['name'] && $_SESSION['username'] == $_POST['username'] &&
                    $_POST['email'] == $_SESSION['email'] && $_SESSION['phone'] == $_POST['phone'])
                {
                    return redirect('settings');
                }
                else
                {
                    if( !empty($_POST['name'])  &&  !empty($_POST['username'])  &&  
                        !empty($_POST['email'])  &&  !empty($_POST['phone']) )
                    {
    
                        if (preg_match("/^[a-zA-Z ]*$/",$_POST['name'])) 
                        {
                                if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
                                {
                                    foreach ($users as $user) 
                                    {
                                        if($user->id != $_SESSION['id'])
                                        {
                                            if(!($_POST['username'] == $user->username))
                                            {
                                                if(!($_POST['email'] == $user->email))
                                                {
                                                    if(!($_POST['phone'] == $user->phone))
                                                    {
                                                        $_SESSION['error'] = 'Updated';
                                                    }
                                                    else
                                                    {
                                                        $_SESSION['error'] = 'Phone No. is already registered';
                                                        break;
                                                    }
                                                }
                                                else
                                                {
                                                    $_SESSION['error'] = 'Email already taken';
                                                    break;
                                                }
                                            }
                                            else
                                            {
                                                $_SESSION['error'] = 'Username already taken';
                                                break;
                                            }    
                                        }
                                        else
                                        {
                                            $_SESSION['error'] = 'Updated';
                                        }
                                    }
                                }
                                else
                                {
                                    $_SESSION['error'] = 'Invalid email format'; 
                                }
                        }
                        else 
                        {
                            $_SESSION['error'] = 'Only letters and white space allowed in Name';         
                        }
                }
                else{
                    $_SESSION['error'] = 'All Inputs are necessary to be filled';
                }
    
                if($_SESSION['error'] == 'Updated')
                {    
                    App::get('database')->
                        update('users',[
                            'name' =>$_POST['name'],
                            'username' =>$_POST['username'],
                            'email' =>$_POST['email'],
                            'phone' =>$_POST['phone']    
                        ],$_SESSION['id']
                    );    
                    $_SESSION['name'] = $_POST['name'];
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['email'] = $_POST['email'];
                    $_SESSION['phone'] = $_POST['phone'];

                    return redirect('settings');  
                }
                else{
                    return redirect('settings');  
                }
        }
    }

    public function updatePassword()
    {
        session_start();
        if( !empty($_POST['oldPass'])  &&  !empty($_POST['newPass'])  &&  
                !empty($_POST['retypeNewPass']) )
        {

            if(sha1($_POST['oldPass']) == $_SESSION['password']){

                if($_POST['newPass'] == $_POST['retypeNewPass']){
                    App::get('database')->
                    update('users',[
                        'password' =>sha1($_POST['newPass'])
                    ],$_SESSION['id']);    
                    $_SESSION['password'] = sha1($_POST['newPass']);
                    $_SESSION['error'] = 'Password Changed!'; 
                    return redirect('passwordSetting');  
                }
                else{
                    $_SESSION['error'] = 'New Password donot match!'; 
                }
            }
            else
            {
                $_SESSION['error'] = 'Old Password doesnot match the record!'; 
            }

        }
        else{
            $_SESSION['error'] = 'All Fields are required!';
        }

        if($_SESSION['error'] != 'Password Changed!'){
            return redirect('passwordSetting');  
        }
    }

    public function changePassword()
    {
        session_start();
        
        if( !empty($_POST['newPass'])  &&  !empty($_POST['retypeNewPass']) )
        {

            if($_POST['newPass'] == $_POST['retypeNewPass']){
                App::get('database')->
                    update('users',[
                        'password' =>sha1($_POST['newPass'])
                    ],$_SESSION['UserID']);    
                App::get('database')->deleteWhere('forgetPass',$_SESSION['forgetid']);
                $_SESSION['error'] = 'Password Changed!'; 
                return redirect('');  
                }
                else{
                    $_SESSION['error'] = 'New Password donot match!'; 
                }
        }
        else{
            $_SESSION['error'] = 'All Fields are required!';
        }

        if($_SESSION['error'] != 'Password Changed!'){
            return redirect("changePass?reqid={$_SESSION['forgetid']}&vkey={$_SESSION['vkey']}");  
        }
    }

    public function forgetPass()
    {
        session_start();

        $users = App::get('database')->selectAll('users');
        $_SESSION['error'] = NULL;

        if($users == NULL){
            $_SESSION['error'] = 'No user Found';                    
        }

        if( !empty($_POST['email']))
        {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false ){
                $_SESSION['error'] = 'Wrong Email format';                    
            }
            else
            {
                foreach ($users as $user) 
                {
                    if($_POST['email'] == $user->email)
                    {
                        $vkey = sha1(Time().$user->email);
                        $lastID = App::get('database')->
                        insert('forgetPass',[
                            'UserID' =>$user->id,
                            'vkey' => $vkey
                        ]);    
        
                        $email = $_POST['email'];
                        $subject = 'Change Password';
                        $message = 'Hi'. " {$user->name}". ',' . "\n\n"; 
                        $message .= 'FaceInsta Team Here!.'. "\n\n"; 
                        $message .= 'Somebody requested a password change for your account'. "\n\n";
                        $message .= 'Follow this link to change your password'. "\n";
                        $message .= "<a href='http://localhost:8888/changePass?reqid={$lastID}&vkey={$vkey}'>Change Password</a>". "\n\n"; 
                        $message .= 'Sincerely,'. "\n";
                        $message .= 'FaceInsta Team';
        
                        $msg = nl2br($message);
                        
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        
                        if(mail($email,$subject,$msg,$headers))
                        {
                            $_SESSION['error'] = "Change Password Link Sent!";
                        }
                        else
                        {
                            $_SESSION['error'] = "Error in sending Email";
                        }
                        return redirect('');                            
                    }
                    else
                    {
                        $_SESSION['error'] = 'No user Found'; 
                    }                
                }
            }    
        }
        else
        {
            $_SESSION['error'] = 'Input is required';                    
        }    
    
        if(!( $_SESSION['error'] == NULL ))
        {
            return redirect('forgetPass');                
        }
    }

}

