<?php
    include '../connection.php';
    $usn = $_GET['usn'];
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $sql = "update student set s_name='$name',s_email='$email', s_phone='$phone' where s_usn = '$usn';";
        if(mysqli_query($conn, $sql)){
            header("location:view_students.php");
        }else{
            echo "update not success";
        }
    }
?>

<?php include '../includes/header.php';?>
<?php
        $sql = "select * from student where s_usn = '$usn';";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    ?>
<div class="d-flex justify-content-center align-items-center">
    <form action="update_student.php?usn=<?php echo $usn; ?>" method="post"
        class="w-75 ps-5 pe-5 pt-4 pb-3 border border-success border-2 rounded bg-light">
        <div class="mb-5 text-center">
            <h2>Update Student Details</h2>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="usn" class="form-label">Student USN</label>
            <input type="text" style="width:400px;" id="usn" name="usn" value="<?php echo $row['s_usn']; ?>" required
                disable>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="name" class="form-label">Student Name</label>
            <input type="text" style="width:400px;" id="name" name="name" value="<?php echo $row['s_name']; ?>"
                required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="email" class="form-label">Email</label>
            <input type="email" style="width:400px;" id="email" name="email" value="<?php echo $row['s_email']; ?>"
                required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" style="width:400px;" id="phone" name="phone" value="<?php echo $row['s_phone']; ?>"
                required>
        </div>
        <div class="pt-2 row justify-content-center">
            <button type="submit" class="btn btn-primary w-25" name="submit">Submit</button>
        </div>
    </form>
</div>
<?php include '../includes/footer.php';?>