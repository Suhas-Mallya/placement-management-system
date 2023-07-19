<?php
    session_start();
    include '../connection.php';
    $name = $_SESSION['admin'];
    $msg = "";
    if(isset($_POST['change'])){
        $pwd = $_POST['cur_pwd'];
        $sql = "select * from admin where username='$name' and password='$pwd';";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $new_pwd = $_POST['new_pwd'];
            $confirm_pwd = $_POST['confirm_pwd'];
            if($new_pwd == $confirm_pwd){
                $sql = "update admin set password='$new_pwd';";
                if(mysqli_query($conn,$sql)){
                    $msg = "password changed successfully";
                }else{
                    $msg = "error in updating new password";
                }
            }else{
                $msg = "New passwords does not match";
            }
        }else{
            $msg = "Your current password entered is invalid";
        }
    }
?>

<?php include '../includes/header.php'; ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <?php if($msg != "") echo $msg; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<h2 class="text-center p-3 border border-3 border-dark rounded-3 bg-warning">CHANGE YOUR PASSWORD</h2>
<div class="d-flex justify-content-center align-items-center">
    <form action="change_password.php" method="post"  class="w-100">
    <table
        class="w-100 table table-striped table-info table-bordered border border-3 rounded-3 border-dark text-center">
        <thead>
            <tr>
                <th>Enter Current Password </th>
                <th><input type="password" name="cur_pwd" class="form-control" required></th>
            </tr>
            <tr>
                <th>Enter New Password </th>
                <th><input type="password" name="new_pwd" class="form-control" required></th>
            </tr>
            <tr>
                <th>Confirm New Password </th>
                <th><input type="password" name="confirm_pwd" class="form-control" required></th>
            </tr>
            <tr>
                <th colspan="2">
                    <button type="submit" class="btn btn-primary w-100" name="change">CHANGE PASSWORD</button>
                </th>
            </tr>
        </thead>
    </table>
    </form>
</div>
<?php include '../includes/footer.php'; ?>