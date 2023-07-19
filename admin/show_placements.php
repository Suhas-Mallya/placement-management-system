<?php
    session_start();
    include '../connection.php';
?>
<?php include '../includes/header.php'; ?>

<h4 class="text-center p-3 border border-3 border-dark rounded-3">Recently Placed Students</h4>
<div class="d-flex justify-content-around flex-wrap" style="height:auto;width:100%;">
    <?php 
        $sql = "select s.s_usn, s.s_name, c.comp_name, cd.designation, s.s_image, cd.package, a.updated_at from applicants a, student s, company c, comp_designation cd, student_report sr where s.s_usn=a.s_usn and s.s_usn=sr.s_usn and a.comp_id=c.comp_id and a.designation_id=cd.designation_id and c.comp_id=cd.comp_id and a.is_placed='YES' order by updated_at desc;";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $usn = $row['s_usn'];
            $sname = $row['s_name'];
            $comp = $row['comp_name'];
            $desig = $row['designation'];
            $img = $row['s_image'];
            $package = $row['package'];
    ?>
    <div class="card" style="width:250px;">
        <img src="../student/profile_pics/<?php echo $img; ?>" class="card-img-top" width="250px" height="240px">
        <div class="card-body">
            <h5 class="card-title"><?php echo $comp; ?></h5>
            <p >USN : <?php echo $usn; ?></p>
            <p >Name : <?php echo $sname; ?></p>
            <p >Designation : <?php echo $desig; ?></p>
            <p >package : <?php echo $package; ?></p>
        </div>
    </div>
    <?php
        }
    ?>
</div>
<?php include '../includes/footer.php'; ?>