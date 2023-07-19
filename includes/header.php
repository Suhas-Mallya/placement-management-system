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

            .gauge {
                width: 100%;
                max-width: 400px;
                font-family: "Roboto", sans-serif;
                font-size: 32px;
                color: #004033;
                position: absolute;
                right: 50px;
                bottom: 40px;
            }

            .gauge__body {
                width: 100%;
                height: 0;
                padding-bottom: 50%;
                background: #b4c0be;
                position: relative;
                border-top-left-radius: 100% 200%;
                border-top-right-radius: 100% 200%;
                overflow: hidden;
            }

            .gauge__fill {
                position: absolute;
                top: 100%;
                left: 0;
                width: inherit;
                height: 100%;
                background: #009578;
                transform-origin: center top;
                transform: rotate(0.25turn);
                transition: transform 1s ease-out;
            }

            .gauge__cover {
                width: 75%;
                height: 150%;
                background: #ffffff;
                border-radius: 50%;
                position: absolute;
                top: 25%;
                left: 50%;
                transform: translateX(-50%);
                display: flex;
                align-items: center;
                justify-content: center;
                padding-bottom: 25%;
                box-sizing: border-box;
            }
        </style>
        <title>placement cell</title>
    </head>

    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-3 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                        class="fas fa-user-shield me-1"></i>ADMIN PANEL</div>
                <div class="list-group list-group-flush my-3">
                    <a href="dashboard.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-chart-bar me-2"></i>Dashboard</a>
                    <a href="view_company.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-building me-2"></i>Companies List</a>
                    <a href="add_company.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-laptop-medical me-2"></i>Add Company</a>
                    <a href="add_designation.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-briefcase me-2"></i>Add Designation</a>
                    <a href="view_students.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-stream me-2"></i>Students List</a>
                    <a href="add_student.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-user-plus me-2"></i>Add Student</a>
                    <a href="show_placements.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-chart-line me-2"></i>Placements</a>
                    <a href="view_new_applicants.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-list-ol me-2"></i>New Applicants</a>
                    <a href="view_applicants.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-mail-bulk me-2"></i>View Applicants</a>
                    <a href="change_password.php"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-key me-2"></i>Change password</a>
                    <a href="logout.php"
                        class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                            class="fas fa-power-off me-2"></i>Logout</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid pt-4">