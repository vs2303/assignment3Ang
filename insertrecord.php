<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        require 'connDB.php';
        $_POST=json_decode(file_get_contents('php://input'),true);
        if(isset($_POST) && !empty($_POST)){
            $abc=$_POST;
            try{
                foreach($abc as $value){
                    $a=(array)$value;
                    $stmt = $conn->prepare("INSERT INTO student_info (name, marks)VALUES (:name, :marks)");
                    $stmt->execute($a);
                }            
                echo '{"message":"Data Submitted Successfully!!","success":true}';
            }
            catch(PDOException $e)
            {
                echo '{"message":"There is some error!!!","success":false}';
            }
        }
    }else{
        echo '{"message":"Session Expired Login Again!!","success":false}';
    }
?>