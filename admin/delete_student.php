<?php
    include '../connection.php';
    $usn = $_GET['usn'];
    $sql = "delete from student where s_usn = '$usn';";
    if(mysqli_query($conn, $sql)){
        header("location:view_students.php");
    }else{
        echo "delete not success";
    }
?>