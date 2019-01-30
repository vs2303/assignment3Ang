<?php
    session_start();
    if(isset($_SESSION['user'])){
        require 'connDB.php';

        try{
            $selectSQL = "SELECT id,name, marks FROM student_info";
            $stmt = $conn->prepare($selectSQL);
            $stmt->execute();
            $abc = $stmt->fetchAll(PDO::FETCH_OBJ);
            echo json_encode($abc);
            
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }else{
        echo "<script>alert('Session Expired Login Again')</script>";
    }
    
?>