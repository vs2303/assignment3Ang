<?php
    session_start();
    require 'connDB.php';
    $_POST=json_decode(file_get_contents('php://input'),true);
    if(isset($_POST) && !empty($_POST))
    {   
        $username=$_POST['username'];
        $password=$_POST['password'];

        try{
            $selectSQL = "SELECT username, password FROM login WHERE username = '$username' AND password = '$password'";
            $stmt = $conn->prepare($selectSQL);
            $stmt->execute();
            $abc = $stmt->fetch();
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        if($username== $abc['username'] && $password==$abc['password'])
        {
            $_SESSION['user']=$abc['username'];
?>


    {
        "success":true,
        "secret":"Login Succesful"
    } 
<?php
        }else{
?>
    {
        "success":false,
        "message":"Invalid Login Details"
    }
<?php
        }
        }else{

?>
{
    "success":true,
    "message":"Only POST accepted"
}
<?php
}
?>  