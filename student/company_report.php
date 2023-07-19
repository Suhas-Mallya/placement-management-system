<?php
    session_start();
    include '../connection.php';
    $id = $_GET['id'];

    if(isset($_GET['desig_id'])){
        $comp_id = $_GET['id'];
        $desig_id = $_GET['desig_id'];
        $usn = $_SESSION['usn'];
        $placed = $_GET['placed'];
        $sql = "insert into applicants(s_usn,comp_id,designation_id,is_placed) values ('$usn',$comp_id,$desig_id,'$placed');";
        if(mysqli_query($conn, $sql)){
            $loc = "company_report.php?id=$id";
            header("location:$loc");
        }else{
            echo "error in inserting into applicants";
        }
    }

    $sql = "select * from company where comp_id=$id;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['comp_name'];
    $email = $row['email'];
    $address = $row['address'];
    $desc = $row['description'];
    $image = $row['image'];

    $sql = "select * from student_report where s_usn='".$_SESSION['usn']."';";
    $result = mysqli_query($conn, $sql);
    $stu = mysqli_fetch_assoc($result);
    $s_cgpa = $stu['s_cgpa'];
?>

<?php include '../includes/stu_header.php'; ?>
<div class="d-flex justify-content-center align-items-center">
    <table class="w-75 table table-striped table-info table-bordered border border-3 rounded-3 border-dark text-center">
        <tbody>
            <tr>
                <th scope="col" rowspan="3"><img src="../admin/uploads/<?php echo $image;?>" width="200px"></th>
                <th scope="col" colspan="3">
                    <h1><?php echo $name;?></h1>
                </th>
            </tr>
            <tr>
                <th>email</th>
                <th colspan="2"><?php echo $email;?></th>
            </tr>
            <tr>
                <th>location</th>
                <th colspan="2"><?php echo $address;?></th>
            </tr>
            <tr>
                <th>Company description</th>
                <th colspan="3" class="text-start"><?php echo $desc; ?></th>
            </tr>
            <tr>
                <th colspan="4">
                    <table class="table table-striped table-bordered border-success">
                        <tr>
                            <th>Job Designation</th>
                            <th>Package</th>
                            <th>Job Description</th>
                            <th>Min CGPA</th>
                            <th>Apply for Job</th>
                        </tr>
                        <?php
                            $sql = "select * from comp_designation where comp_id = $id;";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $designation = $row['designation'];
                                $eligibity = $row['description'];
                                $package = $row['package'];
                                $min_cgpa = $row['min_cgpa'];
                                echo ' <tr>
                                <th>'. $designation .'</th>
                                <th>'. $package .'LPA</th>
                                <th>'. $eligibity .'</th>
                                <th>'. $min_cgpa .'</th>';
                                if($s_cgpa >= $min_cgpa){
                                    $sql = "select * from applicants where comp_id=".$row['comp_id']." and designation_id=".$row['designation_id']." and s_usn='".$_SESSION['usn']."';";
                                    if(mysqli_num_rows(mysqli_query($conn, $sql)) > 0){
                                        echo '<th><button class="btn btn-success">APPLIED<button></th>';
                                    }else{
                                    echo '<th><button class="btn btn-primary"><a href="company_report.php?id='.$id.'&desig_id='.$row['designation_id'].'&placed=NO" class="text-white text-decoration-none">APPLY</a></button></th>';
                                    }
                                }else{
                                    echo '<th><button class="btn btn-danger">NOT ELIGIBLE<button></th>';
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                </th>
            </tr>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>