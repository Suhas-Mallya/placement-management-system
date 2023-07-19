<?php 
    include '../connection.php';
    $usn = $_GET['usn'];
    $comp_id = $_GET['cid'];
    $desig_id = $_GET['did'];
    if(isset($_GET['placed'])){
        $sql = "update applicants set is_placed = 'YES' where s_usn='".$usn."' and comp_id=". $comp_id." and designation_id=". $desig_id;
        if(mysqli_query($conn, $sql)){
            $sql1 = "update student_report set is_placed='YES' where s_usn='$usn';";
            if(mysqli_query($conn, $sql1)){
                header("location:view_applicants.php");
            }else{
                echo "error in updating into student_report";
            }
        }else{
            echo "error in updating into applicant";
        }
    }

    if(isset($_GET['status'])){
        if($_GET['status'] == 'approve'){
            $sql = "update applicants set is_approved = 'YES' where s_usn='".$usn."' and comp_id=". $comp_id." and designation_id=". $desig_id;
        }else{
            $sql = "update applicants set is_approved = 'NO' where s_usn='".$usn."' and comp_id=". $comp_id." and designation_id=". $desig_id;
        }
        if(mysqli_query($conn, $sql)){
            header("location:view_new_applicants.php");
        }else{
            echo "error in updating into applicant";
        }
    }
?>