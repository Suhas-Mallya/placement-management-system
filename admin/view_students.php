<?php include '../includes/header.php'; ?>
<h2 class="mt-3 text-center p-3 border border-3 border-dark rounded-3">Students List</h2>
<table class="table table-striped table-info table-bordered border border-3 rounded-3 border-dark text-center">
    <thead class="table-dark bg-opacity-50">
        <tr>
            <th scope="col">USN</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email ID</th>
            <th scope="col">operations</th>
        </tr>
    </thead>
    <tbody>
        <?php
                include '../connection.php';
                $sql = "select * from student;";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                            <th scope="row">'.$row['s_usn'].'</th>
                            <td>'.$row['s_name'].'</td>
                            <td>'.$row['s_phone'].'</td>
                            <td>'.$row['s_email'].'</td>
                            <td>
                                <button class="btn btn-success"><a href="update_student.php?usn='.$row['s_usn'].'" class="text-white text-decoration-none">UPDATE</a></button>
                                <button class="btn btn-danger"><a href="delete_student.php?usn='.$row['s_usn'].'" class="text-white text-decoration-none">DELETE</a></button>
                                <button class="btn btn-primary"><a href="student_report.php?usn='.$row['s_usn'].'" class="text-white text-decoration-none">DETAILS</a></button>
                            </td>
                        </tr>';
                }
                if(mysqli_num_rows($result) == 0){
                    echo '<tr><td colspan="5">No students found</td></tr>';
                }
            ?>
    </tbody>
</table>
<?php include '../includes/footer.php'; ?>