<?php
     require 'connDB.php';
    //  $_POST=json_decode(file_get_contents('php://input'),true);
    //  if(isset($_POST) && !empty($_POST))
    // //  {   
    //      $username=$_POST['username'];
    //      $password=$_POST['password'];
 
         try{
             
             $selectSQL = "SELECT username, password FROM login WHERE username = 'admin' AND password = 'admin'";
             $stmt = $conn->prepare($selectSQL);
             
             $stmt->execute();
             
             $abc = $stmt->fetch();
             echo $abc['username'];
            
         }catch(PDOException $e)
         {
             echo $sql . "<br>" . $e->getMessage();
         }
?>




<!-- {
    "success":true,
    "secret":"Login Succesful"
} -->
<?php
        // }else{
?>
<!-- {
    "success":false,
    "message":"Invalid Login Details"
} -->
<?php
        // }
        // }else{
        //     //var_dump($_POST)
?>
<!-- {
    "success":true,
    "message":"Only POST accepted"
} -->
<?php
// }
?>  
<!-- {
    "success":true,
    "secret":"Login Succesful"
} -->
<?php
        // }else{
?>
<!-- {
    "success":false,
    "message":"Invalid Login Details"
} -->
<?php
        // }
        // }else{
        //     //var_dump($_POST)
?>
<!-- {
    "success":true,
    "message":"Only POST accepted"
} -->
<?php
// }
?>  