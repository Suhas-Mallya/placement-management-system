<?php
    session_start();
    if(!$_SESSION['usn']){
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Document</title>
</head>

<body>
    <h1><?php echo "Hello  ". $_SESSION['usn'];?></h1>
    <p><a href="logout.php">LOGOUT</a></p>
    <script src="../js/bootstrap.js"></script>
</body>

</html>