<?php
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
?>