<?php
    session_start();
    include '../connection.php';
    $msg = "";
    if(isset($_POST['submit'])){
        $usn = $_POST['usn'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $branch = $_POST['branch'];
        $sem = $_POST['sem'];
        $cgpa = $_POST['cgpa'];
        $password = $_POST['pwd'];
        $sql = "insert into student values('$usn','$name','$email','$password','$phone','');";
        if(mysqli_query($conn, $sql)){
            $sql = "insert into student_report values('$usn',$sem,'$branch','$cgpa','NO');";
            if(mysqli_query($conn, $sql)){
                header("location:login.php");
            }else{
                $msg = "sign up failed due error in student report";
            }
        }else{
            $msg = "sign up failed due error in student records";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/sign_page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Document</title>
</head>

<body>
    <?php if($msg != ""){ ?>        
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $msg; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>
    <div class="page">
        <div class="container signup-student">
            <form action="signup.php" method="post">
                <div class="login-form signup-page">
                    <div class="title">Sign Up</div>
                    <div class="input-boxes signup">
                        <div class="left">
                            <div class="input-box">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="USN" id="usn" name="usn" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-signature"></i>
                                <input type="text" placeholder="Name" id="name" name="name" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" placeholder="Email" id="email" name="email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-phone"></i>
                                <input type="text" placeholder="Phone Number" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="right">

                            <div class="input-box">
                                <i class="fas fa-code-branch"></i>
                                <input type="text" placeholder="Branch" id="branch" name="branch" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-drafting-compass"></i>
                                <input type="number" placeholder="Semester" id="sem" name="sem" min="1" max="8"
                                    required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-poll"></i>
                                <input type="text" placeholder="CGPA" id="cgpa" name="cgpa" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-key"></i>
                                <input type="text" placeholder="Password" id="pwd" name="pwd" required>
                            </div>
                        </div>
                    </div>
                    <div class="button signup-submit">
                        <input type="submit" value="Submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
</body>