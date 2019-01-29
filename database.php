<?php
    session_start();
    
    $user=$_SESSION['user'];
    if($user =='admin')
    {
?>
        {
            "message":"Login SuccessFul",
            "success":true
        }
<?php
    }else{
?>
        {
            "message":"invalid Crredentials",
            "success":false
        }
<?php
    }
?>