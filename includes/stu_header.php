<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/admin_dashboard.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    th {
        vertical-align: middle;
    }
    </style>
    <title> Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-shield me-2"></i>STUDENT PANEL</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Profile</a>
                <a href="view_company.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-building me-2"></i>Companies List</a>
                <a href="view_applications.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-laptop-medical me-2"></i>Your applications</a>
                <a href="change_password.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-laptop-medical me-2"></i>change password</a>
                <a href="logout.php"
                    class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid pt-4">