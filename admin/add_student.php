<?php
    include '../connection.php';
    if(isset($_POST['submit'])){
        $usn = $_POST['usn'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $pwd = $_POST['pwd'];
        $sql = "INSERT INTO `student` (s_usn, s_name, s_email, s_phone, s_password) VALUES ('$usn','$name','$email','$phone','$pwd');";
        echo  $sql;
        if(mysqli_query($conn, $sql)){
            header("location:view_students.php");
        }else{
            echo "insertion not success";
        }
    }
?>

<?php include '../includes/header.php'; ?>
<div class="w-100 mt-2 d-flex justify-content-center align-items-center">
    <form action="add_student.php" method="post"
        class="w-75 ps-5 pe-5 pt-4 pb-3 border border-success border-2 rounded bg-light">
        <div class="mb-5 text-center">
            <h2>Add Student</h2>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="usn" class="form-label">Student USN</label>
            <input type="text" style="width:400px;" id="usn" name="usn" required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="name" class="form-label">Student Name</label>
            <input type="text" style="width:400px;" id="name" name="name" required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="email" class="form-label">Email</label>
            <input type="email" style="width:400px;" id="email" name="email" required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" style="width:400px;" id="phone" name="phone" required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="pwd" class="form-label">Initial Password</label>
            <input type="text" style="width:400px;" id="pwd" name="pwd" required>
        </div>
        <div class="pt-2 row justify-content-center">
            <button type="submit" class="btn btn-primary w-25" name="submit">Submit</button>
        </div>
    </form>
</div>
<?php include '../includes/footer.php'; ?>