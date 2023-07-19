<?php include '../includes/stu_header.php'; ?>
<h2 class="mt-3 text-center p-3 border border-3 border-dark rounded-3">APPLICATION LIST</h2>
<table class="table table-striped table-info table-bordered border border-3 rounded-3 border-dark text-center">
    <thead class="table-dark bg-opacity-50">
        <tr>
            <th scope="col">Copmpany Name</th>
            <th scope="col">Designation</th>
            <th scope="col">Package</th>
            <th scope="col">Approve Status</th>
            <th scope="col">Placement Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            session_start();
            include '../connection.php';
            $sql = "select c.comp_name, d.designation, d.package, a.is_approved, a.is_placed from company c, applicants a, comp_designation d where c.comp_id=d.comp_id and d.comp_id=a.comp_id and d.designation_id= a.designation_id and a.s_usn='".$_SESSION['usn']."';";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                echo '<tr>
                        <td>'.$row['comp_name'].'</td>
                        <td>'.$row['designation'].'</td>
                        <td>'.$row['package'].' LPA </td>';
                    if($row['is_approved'])
                        echo '<td>'.$row['is_approved'].'</td>';
                    else
                        echo '<td>Pending..</td>';
                    echo '<td>'.$row['is_placed'].'</td></tr>';
            }
        ?>
    </tbody>
</table>
<?php include '../includes/footer.php'; ?>