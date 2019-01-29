<?php
    require 'connDB.php';
    $_POST=json_decode(file_get_contents('php://input'),true);
    if(isset($_POST) && !empty($_POST)){
        $abc=$_POST;

        try{

            foreach($abc as $value){
                // $sql = 
                $a=(array)$value;
                $name=$a['name'];
                $marks=$a['marks'];
                // use exec() because no results are returned
                $conn->exec("INSERT INTO student_info (name, marks)VALUES ('$name', '$marks')");
            }
        
            echo '{"message":"success"}';
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }
        // echo "<script>console.log(".json_encode($abc).")</script>";
        // echo json_encode($abc[0]);
    }
    
?>