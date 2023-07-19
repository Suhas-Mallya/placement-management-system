<?php include '../includes/header.php'; ?>
<h2 class="mt-3 text-center p-3 border border-3 border-dark rounded-3">NEW JOB APPLICANTS LIST</h2>
<table class="table table-striped table-info table-bordered border border-3 rounded-3 border-dark text-center">
    <thead class="table-dark bg-opacity-50">
        <tr>
            <th scope="col">Student USN</th>
            <th scope="col">Student Name</th>
            <th scope="col">Copmpany Name</th>
            <th scope="col">Designation</th>
            <th scope="col">Application Status</th>
            <th scope="col">Placed</th>
        </tr>
    </thead>
    <tbody>
        <?php
                include '../connection.php';
               
                $sql ="select a.s_usn, s.s_name, c.comp_name, cd.designation,c.comp_id, a.designation_id, a.is_approved, sr.is_placed from applicants a, company c, comp_designation cd, student s, student_report sr where a.comp_id=c.comp_id and c.comp_id=cd.comp_id and a.designation_id=cd.designation_id and a.s_usn=s.s_usn and s.s_usn=sr.s_usn and a.is_approved is null;";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                            <th scope="row">'.$row['s_usn'].'</th>
                            <td>'.$row['s_name'].'</td>
                            <td>'.$row['comp_name'].'</td>
                            <td>'.$row['designation'].'</td>
                            <td>
                                <button class="btn btn-success"><a href="update_placement.php?usn='.$row['s_usn'].'&cid='.$row['comp_id'].'&did='.$row['designation_id'].'&status=approve" class="text-white text-decoration-none">APPROVE</a></button>
                                <button class="btn btn-danger"><a href="update_placement.php?usn='.$row['s_usn'].'&cid='.$row['comp_id'].'&did='.$row['designation_id'].'&status=reject" class="text-white text-decoration-none">REJECT</a></button>
                            </td>
                            <td>'.$row['is_placed'].'</td>
                        </tr>';
                }
                if(mysqli_num_rows($result) == 0){
                    echo '<tr><td colspan="6">No new job appicants found</td></tr>';
                }
            ?>
    </tbody>
</table>
<?php include '../includes/footer.php'; ?>