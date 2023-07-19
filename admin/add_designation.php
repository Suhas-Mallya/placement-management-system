<?php
    include '../connection.php';
    if(isset($_POST['submit'])){
        $comp_id  = $_POST['comp_id'];
        $designation_id = $_POST['d_id'];
        $designation = $_POST['d_name'];
        $description = $_POST['desc'];
        $package = $_POST['pkg'];
        $min_cgpa = $_POST['min_cgpa'];
        $sql = "insert into comp_designation values($comp_id, $designation_id, '$designation', '$description', $package, $min_cgpa);";
        if(mysqli_query($conn, $sql)){
            header("location:dashboard.php");
        }else{
            echo "error in inserting designation";
        }
    }
?>
<?php include '../includes/header.php'; ?>
<div class="w-100 mt-2 d-flex justify-content-center align-items-center">
    <form action="add_designation.php" method="post"
        class="w-75 ps-5 pe-5 pt-4 pb-3 border border-success border-2 rounded bg-light">
        <div class="mb-5 text-center">
            <h2>Add Designation</h2>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="comp_name" class="form-label">Company Name</label>
            <select name="comp_id" id="comp_name" style="width:400px;" onmousedown="if(this.options.length>4){this.size=4;}" onchange="this.size=0;" onblur="this.size=0;">
                <?php
                        $sql = "select * from company;";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<option value="'.$row['comp_id'].'">'.$row['comp_name'].'</option>';
                        }
                    ?>
            </select>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="d_id" class="form-label">Designation ID</label>
            <input type="number" style="width:400px;" id="d_id" name="d_id" required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="d_name" class="form-label">Designation</label>
            <input type="text" style="width:400px;" id="d_name" name="d_name" required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="desc" class="form-label">Description</label>
            <input type="text" style="width:400px;" id="desc" name="desc" required>
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="pkg" class="form-label">Package</label>
            <input type="text" style="width:400px;" id="pkg" name="pkg">
        </div>
        <div class="mb-3 d-flex justify-content-between">
            <label for="min_cgpa" class="form-label">Minimum CGPA</label>
            <input type="text" style="width:400px;" id="min_cgpa" name="min_cgpa">
        </div>
        <div class="pt-2 row justify-content-center">
            <button type="submit" class="btn btn-primary w-25" name="submit">Submit</button>
        </div>
    </form>
</div>
<?php include '../includes/footer.php'; ?>