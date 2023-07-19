<?php include '../includes/stu_header.php'; ?>
<div>
    <h2 class="mt-3 text-center p-3 border border-3 border-dark rounded-3">Companies List</h2>
    <table class="table table-striped table-info table-bordered border border-3 rounded-3 border-dark text-center">
        <thead class="table-dark bg-opacity-50">
            <tr>
                <th scope="col">Company ID</th>
                <th scope="col">Company Name</th>
                <th scope="col">Address</th>
                <th scope="col">Email ID</th>
                <th scope="col">operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include '../connection.php';
                $sql = "select * from company;";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    echo '<tr>
                            <th scope="row">'.$row['comp_id'].'</th>
                            <td>'.$row['comp_name'].'</td>
                            <td>'.$row['address'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>
                                <button class="btn btn-primary"><a href="company_report.php?id='.$row['comp_id'].'" class="text-white text-decoration-none">DETAILS</a></button>
                            </td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>