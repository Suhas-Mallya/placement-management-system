
<?php
    session_start();
    include '../connection.php';
    $usn = $_SESSION['usn'];
    $sql = "select * from student s,student_report sr where s.s_usn='$usn' and s.s_usn=sr.s_usn;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $s_name = $row['s_name'];
    $s_email = $row['s_email'];
    $s_phone = $row['s_phone'];
    $s_sem = $row['s_sem'];
    $s_branch = $row['s_branch'];
    $s_cgpa = $row['s_cgpa'];
    $placed = $row['is_placed'];
    $image = $row['s_image'];
?>

<?php include '../includes/stu_header.php'; ?>
<h2 class="mt-3 text-center p-3 border border-3 border-dark rounded-3 bg-warning">YOUR PROFILE</h2>
<div class="d-flex justify-content-center align-items-center">
    <table
        class="w-100 table table-striped table-info table-bordered border border-3 rounded-3 border-dark text-center">
        <thead>
            <tr>
                <th rowspan="8"><img src="profile_pics/<?php echo $image;?>" alt="" width="250" height="250"></th>
                <th>Student Name</th>
                <th><?php echo $s_name;?></th>
            </tr>
            <tr>
                <th>USN</th>
                <th><?php echo $usn;?></th>
            </tr>
            <tr>
                <th>Email </th>
                <th><?php echo $s_email; ?></th>
            </tr>
            <tr>
                <th>Phone Number</th>
                <th><?php echo $s_phone; ?></th>
            </tr>
            <tr>
                <th>Semester</th>
                <th><?php echo $s_sem; ?> </th>
            </tr>
            <tr>
                <th>Branch</th>
                <th><?php echo $s_branch; ?></th>
            </tr>
            <tr>
                <th>CGPA</th>
                <th><?php echo $s_cgpa; ?></th>
            </tr>
            <tr>
                <th>Got Placement</th>
                <th><?php echo $placed; ?></th>
            </tr>
            <tr>
                <th colspan="3">
                    <button type="submit" class="btn btn-primary w-100" name="update"><a class="text-white text-decoration-none" href="update_profile.php">UPDATE YOUR DETAILS</a></button>
                </th>
            </tr>
        </thead>
    </table>
</div>
<?php include '../includes/footer.php'; ?>