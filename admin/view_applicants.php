<?php include '../includes/header.php'; ?>
<h2 class="mt-3 text-center p-3 border border-3 border-dark rounded-3">JOB APPLICANTS LIST</h2>
<div>
    <form action="view_applicants.php" method="post" class="d-flex justify-content-between align-items-center w-50">
        <label for="applicanttype" class="form-label">View Applicants type by</label>
        <select name="list" id="applicanttype" style="width:200px;">
            <option selected> -- SELECT-- </option>
            <option value="APPROVED">APPROVED</option>
            <option value="NOTAPPROVED">NOT APPROVED</option>
            <option value="ALL">ALL</option>
        </select>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<table class="table table-striped table-info table-bordered border border-3 rounded-3 border-dark text-center">
    <thead class="table-dark bg-opacity-50">
        <tr>
            <th scope="col">Student USN</th>
            <th scope="col">Student Name</th>
            <th scope="col">Copmpany Name</th>
            <th scope="col">Designation</th>
            <th scope="col">Approve Status</th>
            <th scope="col">operations</th>
        </tr>
    </thead>
    <tbody>
        <?php
                include '../connection.php';
                $sql = "select a.s_usn, s.s_name, c.comp_name, cd.designation,c.comp_id, a.designation_id, a.is_approved, a.is_placed from applicants a, company c, comp_designation cd, student s, student_report sr where a.comp_id=c.comp_id and c.comp_id=cd.comp_id and a.designation_id=cd.designation_id and a.s_usn=s.s_usn and s.s_usn=sr.s_usn and a.is_approved is not null";
                if(isset($_POST['list'])){
                    if($_POST['list']=='APPROVED'){
                        $sql .= " and a.is_approved='YES';";
                    }else if($_POST['list']=='NOTAPPROVED'){
                        $sql .= " and a.is_approved='NO';";
                    }else{
                        $sql .= ";";
                    }
                }
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                            <th scope="row">'.$row['s_usn'].'</th>
                            <td>'.$row['s_name'].'</td>
                            <td>'.$row['comp_name'].'</td>
                            <td>'.$row['designation'].'</td>
                            <td>'.$row['is_approved'].'</td>';
                    if($row['is_placed']=='NO' && $row['is_approved']=='YES'){
                        echo '<td>
                                <button class="btn btn-primary"><a href="update_placement.php?usn='.$row['s_usn'].'&placed=true&cid='.$row['comp_id'].'&did='.$row['designation_id'].'" class="text-white text-decoration-none">UPDATE PLACED</a></button>
                            </td>';
                    }
                    elseif($row['is_approved']=='NO'){
                        echo '<td><button class="btn btn-danger">NOT PLACED</button></td>';
                    }else{
                        echo '<td><button class="btn btn-success">Already Placed </button></td>';
                    }
                    echo '</tr>';
                }
                if(mysqli_num_rows($result) == 0){
                    echo '<tr><td colspan="6">No job appicants found</td></tr>';
                }
            ?>
    </tbody>
</table>
<?php include '../includes/footer.php'; ?>