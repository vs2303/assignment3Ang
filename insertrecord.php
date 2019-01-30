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
                    $name=$a['name'];
                    $marks=$a['marks'];
                    // use exec() because no results are returned
                    $conn->exec("INSERT INTO student_info (name, marks)VALUES ('$name', '$marks')");
                }
            
                echo '{"message":"Data Submitted Successfully!!","success":true}';
            }
            catch(PDOException $e)
            {
                echo '{"message":"There is some error!!!","success":false}';
            }
            // echo "<script>console.log(".json_encode($abc).")</script>";
            // echo json_encode($abc[0]);
        }
    }else{
        echo '{"message":"Session Expired Login Again!!","success":false}';
    }
    
    
?>