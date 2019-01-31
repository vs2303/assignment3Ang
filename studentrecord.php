<?php
    session_start();
    if(isset($_SESSION['user'])){
        require 'connDB.php';

        $_POST=json_decode(file_get_contents('php://input'),true);
        if(isset($_POST) && !empty($_POST)){
            if (filter_var($_POST['limit'], FILTER_VALIDATE_INT,array("options" => array("min_range"=>1)))){
                try{
                    $countRows = "SELECT count(*) as num FROM student_info";
                    $stmt1 = $conn->prepare($countRows);
                    $stmt1->execute();
                    $num = $stmt1->fetch();
                    if($_POST['limit']<=$num['num']){
                        
                        try{
                            $selectSQL = "select * from student_info where marks >= (select marks from (select marks from student_info order by marks desc limit ?) as t1 order by marks asc limit 1) order by marks desc";
                            $stmt = $conn->prepare($selectSQL);
                            $stmt->execute([$_POST['limit']]);
                            $abc = $stmt->fetchAll(PDO::FETCH_OBJ);
                            echo '{"data":'.json_encode($abc).',"success":true}';
                            
                        }catch(PDOException $e)
                        {
                            echo '{"data":"There is Some Error Contact Admin!!","success":false}';
                        }
                    }else{
                        echo '{"data":"Only '.$num['num'].' Records are There!!!","success":false}';
                    }
                }catch(PDOException $e)
                {
                    echo '{"data":"There is Some Error Contact Admin!!","success":false}';
                }
            }else{
                echo '{"data":"Values more than 1 are only Allowed!!","success":false}';
            }
        }else{
            echo '{"data":"only Post requests","success":false}';
        }
    }else{
        echo "<script>alert('Session Expired Login Again')</script>";
    }
    
?>