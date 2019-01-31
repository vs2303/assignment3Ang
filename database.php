<?php
    session_start();

    if(isset($_SESSION['user']))
    {
        echo '{"message": "'.$_SESSION['user'].'","success":true}';
    }else{
?>
        {
            "message":"invalid Crredentials",
            "success":false
        }
<?php
    }
?>