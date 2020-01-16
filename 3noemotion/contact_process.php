<?php session_start();
if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['body']))
{
    $name = $_POST['name'];$_SESSION['akshit'] = $name;
    $email = $_POST['email'];
    $bodyinp = $_POST['body'];
    
    $to = "akshit.arora1995@gmail.com, prateek@dtrl.drdo.in";
    $subject = 'Contact submitted by '.$name;
    $body = $bodyinp;
    $headers = 'From: '.$email;
    
    if(mail($to,$subject,$body,$headers)) {  $_SESSION['mail'] = true;   header('Location: http://pratik.acslab.org/contact.php') ; die();
                                          }else
echo 'not okay';
    
} else
echo 'not okay';
?>