<?php 
    session_start();
    if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
        include "../connection.php";

        echo "<pre>";
        print_r($_FILES['my_image']);
        echo "</pre>";

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
                $img_upload_path = 'uploads/'.$new_img_name;
                copy($tmp_name, $img_upload_path);

                $name = $_POST['comp_name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $desc = $_POST['desc'];
                $sql = "INSERT INTO `company` (comp_name, address, email, description, image) VALUES ('$name','$address','$email','$desc','$new_img_name');";
                if(mysqli_query($conn, $sql)){
                    header("location:view_company.php");
                }else{
                    echo "insertion not success";
                }
            }else {
                $em = "You can't upload files of this type";
                header("Location: add_company.php?error=$em");
            }
        }
    }
?>

<?php include '../includes/header.php';?>

<div class="w-100 mt-2 d-flex justify-content-center align-items-center">
    <form action="add_company.php" enctype="multipart/form-data" method="post"
        class="w-75 ps-5 pe-5 pt-4 pb-3 border border-success border-2 rounded bg-light">
        <div class="mb-5 text-center">
            <h2>Add Company</h2>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="comp_name" class="form-label">Company Name</label>
            <input type="text" style="width:400px;" id="comp_name" name="comp_name" required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="email" class="form-label">Email</label>
            <input type="email" style="width:400px;" id="email" name="email" required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="address" class="form-label">Address</label>
            <input type="text" style="width:400px;" id="address" name="address" required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="desc" class="form-label">Description</label>
            <input type="text" style="width:400px;" id="desc" name="desc" required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="image" class="form-label">Image</label>
            <input type="file" style="width:400px;" id="image" name="my_image">
        </div>
        <div class="pt-2 row justify-content-center">
            <button type="submit" class="btn btn-primary w-25" name="submit">Submit</button>
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>