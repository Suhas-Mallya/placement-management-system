<?php 
    session_start(); 
    include '../connection.php';
?>
<?php include '../includes/header.php'; ?>

<h2 class=" text-center p-3 border border-3 border-dark rounded-3">Statistics of Placement Cell</h2>

<div class="row g-3 my-2 d-flex flex-wrap">
    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <?php 
                $sql = "select * from student";
                $result =  mysqli_query($conn, $sql);  
            ?>
            <div>
                <h3 class="fs-2"><?php echo $students = mysqli_num_rows($result); ?></h3>
                <p class="fs-5">Students</p>
            </div>
            <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <?php 
                $sql = "select * from company";
                $result =  mysqli_query($conn, $sql);  
            ?>
            <div>
                <h3 class="fs-2"><?php echo mysqli_num_rows($result); ?></h3>
                <p class="fs-5">Companies</p>
            </div>
            <i class="fas fa-building fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <?php 
                $sql = "select * from comp_designation";
                $result =  mysqli_query($conn, $sql);  
            ?>
            <div>
                <h3 class="fs-2"><?php echo mysqli_num_rows($result); ?></h3>
                <p class="fs-5">Designations</p>
            </div>
            <i class="fas fa-briefcase fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <?php 
                $sql = "select * from applicants";
                $result =  mysqli_query($conn, $sql);  
            ?>
            <div>
                <h3 class="fs-2"><?php echo mysqli_num_rows($result); ?></h3>
                <p class="fs-5">Applications</p>
            </div>
            <i class="fas fa-copy fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
    <div class="col-md-3">
        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
            <?php 
                $sql = "select * from student_report where is_placed='YES';";
                $result =  mysqli_query($conn, $sql);  
            ?>
            <div>
                <h3 class="fs-2"><?php echo $placed = mysqli_num_rows($result); ?></h3>
                <p class="fs-5">Placed Students</p>
            </div>
            <i class="fas fa-map-marked fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        </div>
    </div>
</div>

<div class="gauge w-100 d-flex flex-column">
  <div class="gauge__body">
    <div class="gauge__fill"></div>
    <div class="gauge__cover"></div>
  </div>
  <div>
      <h3 class="text-center p-3">Placement Rate</h3>
  </div>
</div>
<?php

?>

<script>
    const gaugeElement = document.querySelector(".gauge");

    function setGaugeValue(gauge, value) {
    if (value < 0 || value > 1) {
        return;
    }

    gauge.querySelector(".gauge__fill").style.transform = `rotate(${
        value / 2
    }turn)`;
    gauge.querySelector(".gauge__cover").textContent = `${Math.round(
        value * 100
    )}%`;
    }

    setGaugeValue(gaugeElement, <?php echo $placed/$students; ?>);

</script>

<?php include '../includes/footer.php'; ?>