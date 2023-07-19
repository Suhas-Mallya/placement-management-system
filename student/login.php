<?php
    session_start();
    $msg = "";
    if(isset($_POST['submit'])){
        include '../connection.php';
        $usn = $_POST['usn'];
        $password = $_POST['password'];
        $_SESSION['usn'] = $usn;
        $sql = "select * from student where s_usn='$usn' and s_password='$password';";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            header("location:dashboard.php");
        }else{
            $msg =  "invalid credentials";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        <div class="container">
            <form action="login.php" method="post">
                <div class="login-form">
                    <div class="title">Student Login</div>
                    <div class="input-boxes">

                        <div class="input-box">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="USN" name="usn" required>
                        </div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" name="password" required>
                        </div>

                        <div class="input-box button">
                            <input type="submit" value="Submit" name="submit">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="../js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
</body>

