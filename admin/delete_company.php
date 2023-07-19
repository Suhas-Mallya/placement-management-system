<?php
    include '../connection.php';
    $id = $_GET['id'];
    $sql = "delete from company where comp_id = $id";
    if(mysqli_query($conn, $sql)){
        header("location:view_company.php");
    }else{
        echo "delete not success";
    }
?>