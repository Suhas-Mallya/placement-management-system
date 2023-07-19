<?php
    session_start();
    include '../connection.php';
    $usn = $_SESSION['usn'];

    if (isset($_POST['save']) && isset($_FILES['my_image'])) {
        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];
    
        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png"); 

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = './profile_pics/'.$new_img_name;
                copy($tmp_name, $img_upload_path);
                $sql = "update student set s_image='$new_img_name' where s_usn = '$usn';";
                mysqli_query($conn, $sql);
            }else {
                $em = "You can't upload files of this type";
                header("Location: dashboard.php?error=$em");
            }
        }
    }

    if(isset($_POST['save'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $sql = "update student set s_name='$name',s_email='$email',s_phone='$phone' where s_usn = '$usn';";
        if(mysqli_query($conn, $sql)){
            $sem = $_POST['sem'];
            $branch = $_POST['branch'];
            $cgpa = $_POST['cgpa'];
            $sql = "update student_report set s_sem=$sem, s_branch='$branch', s_cgpa=$cgpa where s_usn='$usn';";
            if(mysqli_query($conn, $sql)){
                header("location:dashboard.php");
            }else{
                echo "update not success for student report";
            }
        }else{
            echo "update not success for student";
        }
    }
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
?>

<?php include '../includes/stu_header.php'; ?>
<h2 class="text-center p-3 border border-3 border-dark rounded-3 bg-warning">YOUR PROFILE</h2>
<div class="d-flex justify-content-center align-items-center">
    <form action="update_profile.php" enctype="multipart/form-data" method="post"  class="w-100">
    <table
        class="w-100 table table-striped table-info table-bordered border border-3 rounded-3 border-dark text-center">
        <thead>
            <tr>
                <th>Student Name</th>
                <th><input type="text" name="name" class="form-control" value="<?php echo $s_name;?>"></th>
            </tr>
            <tr>
                <th>USN</th>
                <th><input type="text" name="usn" class="form-control" value="<?php echo $usn;?>" disabled></th>
            </tr>
            <tr>
                <th>Email </th>
                <th><input type="text" name="email" class="form-control" value="<?php echo $s_email; ?>"></th>
            </tr>
            <tr>
                <th>Phone Number</th>
                <th><input type="text" name="phone" class="form-control" value="<?php echo $s_phone; ?>"></th>
            </tr>
            <tr>
                <th>Semester</th>
                <th><input type="text" name="sem" class="form-control" value="<?php echo $s_sem; ?>"></th>
            </tr>
            <tr>
                <th>Branch</th>
                <th><input type="text" name="branch" class="form-control" value="<?php echo $s_branch; ?>"></th>
            </tr>
            <tr>
                <th>CGPA</th>
                <th><input type="text" name="cgpa" class="form-control" value="<?php echo $s_cgpa; ?>"></th>
            </tr>
            <tr>
                <th>Got Placement</th>
                <th><input type="text" name="placed" class="form-control" value="<?php echo $placed; ?>" disabled></th>
            </tr>
            <tr>
                <th>Profile Picture</th>
                <th><input type="file" name="my_image" class="form-control"></th>
            </tr>
            <tr>
                <th colspan="2">
                    <button type="submit" class="btn btn-primary w-100" name="save">SAVE YOUR DETAILS</button>
                </th>
            </tr>
        </thead>
    </table>
    </form>
</div>
<?php include '../includes/footer.php'; ?>