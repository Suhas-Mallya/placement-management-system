<?php
    include '../connection.php';
    $id = $_GET['id'];
    $sql = "select * from company where comp_id=$id;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['comp_name'];
    $email = $row['email'];
    $address = $row['address'];
    $desc = $row['description'];
    $image = $row['image'];
?>

<?php include '../includes/header.php'; ?>
<div class="d-flex justify-content-center align-items-center">
    <table class="w-75 table table-striped table-info table-bordered border border-3 rounded-3 border-dark text-center">
        <tbody>
            <tr>
                <th scope="col" rowspan="3"><img src="uploads/<?php echo $image;?>" width="200px"></th>
                <th scope="col" colspan="3">
                    <h1><?php echo $name;?></h1>
                </th>
            </tr>
            <tr>
                <th>email</th>
                <th colspan="2"><?php echo $email;?></th>
            </tr>
            <tr>
                <th>location</th>
                <th colspan="2"><?php echo $address;?></th>
            </tr>
            <tr>
                <th>Company description</th>
                <th colspan="3" class="text-start"><?php echo $desc; ?></th>
            </tr>
            <tr>
                <th colspan="4">
                    <table class="table table-striped table-bordered border-success">
                        <tr>
                            <th>Job Designation</th>
                            <th>Package</th>
                            <th>Job Description</th>
                            <th>Min CGPA</th>
                        </tr>
                        <?php
                            $sql = "select * from comp_designation where comp_id = $id;";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){
                                $designation = $row['designation'];
                                $eligibity = $row['description'];
                                $package = $row['package'];
                                $min_cgpa = $row['min_cgpa'];
                                echo ' <tr>
                                <th>'. $designation .'</th>
                                <th>'. $package .'LPA</th>
                                <th>'. $eligibity .'</th>
                                <th>'. $min_cgpa .'</th>
                                </tr>';
                            }
                            if(mysqli_num_rows($result) == 0){
                                echo '<tr><td colspan="4">No job designations found</td></tr>';
                            }
                        ?>
                    </table>
                </th>
            </tr>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>