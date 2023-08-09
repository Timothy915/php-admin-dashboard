<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Human Resource Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <style>
        /* General styles for the body */


        /* Styles for the nav link */
        .nav-link {
            cursor: pointer;
        }

        /* Styles for the sidebar */
        .sidebar {
            position: fixed;
            top: 60px;
            bottom: 0;
            left: 0;
            height: calc(100vh - 60px);
            width: 200px;
            background-color: #343a40;
            color: #fff;
        }

        /* Styles for the sidebar navigation */
        .sidebar-nav {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        /* Styles for the sidebar navigation item */
        .sidebar-nav-item {
            padding: 10px;
        }

        /* Hover styles for the sidebar navigation item */
        .sidebar-nav-item:hover {
            background-color: #495057;
        }

        /* Styles for the sidebar navigation link */
        .sidebar-nav-link {
            color: #fff;
            text-decoration: none;
        }

        /* Styles for the sidebar navigation link icon */
        .sidebar-nav-link i {
            margin-right: 5px;
        }

        /* Styles for the content area */
        .content {
            margin-left: 200px;
            padding: 20px;
        }

        /* Styles for the center content */
        .center-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Styles for the welcome card */
        .welcome-card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Styles for the welcome card heading */
        .welcome-card h2 {
            margin-bottom: 10px;
            color: #212529;
        }

        /* Styles for the welcome card paragraph */
        .welcome-card p {
            margin-bottom: 0;
            color: #6c757d;
        }

        /* Styles for the logout button */
        .logout-btn {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Hover styles for the logout button */
        .logout-btn:hover {
            background-color: #c82333;
        }

        /* Styles for the admin profile */
        .admin-profile {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Styles for the admin profile image */
        .admin-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        /* Styles for the admin profile actions */
        .admin-profile .admin-actions {
            display: flex;
            align-items: center;
        }

        /* Styles for the admin actions button */
        .admin-actions button {
            margin-left: 10px;
        }

        /* Styles for the navigation bar */
        .nav-bar {
            background-color: #343a40;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
        }

        /* Styles for the admin info in the navigation bar */
        .nav-bar .admin-info {
            display: flex;
            align-items: center;
        }

        /* Styles for the admin info image in the navigation bar */
        .nav-bar .admin-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        /* Styles for the admin info span in the navigation bar */
        .nav-bar .admin-info span {
            color: #fff;
        }

        /* Styles for the admin actions in the navigation bar */
        .nav-bar .admin-actions {
            display: flex;
            align-items: center;
        }

        /* Styles for the admin actions button in the navigation bar */
        .nav-bar .admin-actions button {
            margin-left: 10px;
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Hover styles for the admin actions button in the navigation bar */
        .nav-bar .admin-actions button:hover {
            background-color: #0056b3;
        }

        /* Styles for the description section */
        .description-section {
            background-color: lightgreen;
            padding: 20px;
            margin-top: 61px;
            margin-bottom: 200px;
            margin-left: 200px;
        }

        /* Styles for the description text */
        .description-text {
            color: white;
            font-size: 18px;
        }

        .statistics-section {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .statistics-section h3 {
            margin-bottom: 10px;
        }

        .statistics-section canvas {
            max-width: 100%;
        }

        /* Styles for the total statistics */
        .total-statistics {
            margin-top: 20px;
            text-align: center;
        }

        .total-statistics p {
            margin-bottom: 5px;
        }

        .total-statistics span {
            font-weight: bold;
        }

        .search-box {
            display: flex;
            align-items: center;
        }

        .search-input {
            width: 200px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        .search-icon {
            margin-left: 5px;
            color: #555;
            cursor: pointer;
        }

        .search-icon:hover {
            color: #333;
        }

/* Styles for the breadcrumb */
.breadcrumb {
    margin: 10px 0px !important;
}

/* Styles for the four-grids section */
.four-grids {
    margin-bottom: 30px;
    margin-top: 20px;
    margin-left: 200px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Styles for the four-grid item */
.four-grid {
    width: 100%;
}

/* Styles for the card */
.card {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

/* Styles for the icon */
.four-grid .icon {
    font-size: 36px;
    margin-bottom: 10px;
    text-align: center;
}

/* Styles for the four-text */
.four-grid .four-text {
    text-align: center;
}

/* Styles for the card title */
.card-title {
    font-size: 18px;
    margin-bottom: 5px;
}

/* Styles for the card subtitle */
.card-subtitle {
    font-size: 24px;
    color: #007bff;
    margin-bottom: 0;
}



    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".nav-link").click(function(){
                var tab_id = $(this).attr("data-tab");

                // Hide all tab content
                $(".tab-content").hide();

                // Show the selected tab content
                $("#" + tab_id).show();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
<div class="nav-bar">
    <div class="admin-info">
    <img src="uploads/<?=$pp?>" width="30" height="30" alt="" />
    <span><?= $username ?></span>
    </div>
    <div class="admin-actions">
    <a href="create.php" class="btn btn-primary">Create Admin</a>
</div>

</div>

<div class="four-grids" style="margin-bottom: 30px; margin-top: 100px;">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <a href="employeeview.php">
                    <div class="icon">
                        <i class="fas fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3 class="card-title">Employee</h3>
                        <h4 class="card-subtitle mb-2"><?php echo(isset($TotalEmployees['employees'])) ? $TotalEmployees['employees'] : ""; ?></h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <a href="leaverequest.php">
                    <div class="icon">
                        <i class="fas fa-list-alt" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3 class="card-title">Leave Request</h3>
                        <h4 class="card-subtitle mb-2"><?php echo(isset($tpandingleave['pleave'])) ? $tpandingleave['pleave'] : ""; ?></h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <a href="viewproject.php">
                    <div class="icon">
                        <i class="fas fa-folder-open" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3 class="card-title">Projects</h3>
                        <h4 class="card-subtitle mb-2"><?php echo "$num_rows"; ?></h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <a href="viewvacancy.php">
                    <div class="icon">
                        <i class="fas fa-briefcase" aria-hidden="true"></i>
                    </div>
                    <div class="four-text">
                        <h3 class="card-title">Vacancies</h3>
                        <h4 class="card-subtitle mb-2"><?php echo "$res"; ?></h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>




<div class="sidebar">
    <ul class="sidebar-nav">
        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link active" data-tab="recruitment-selection-tab" href="#"><i class="fas fa-users"></i> Recruitment</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link" data-tab="performance-management-tab" href="#"><i class="fas fa-chart-line"></i> Performance</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link" data-tab="policy-implementation-tab" href="#"><i class="fas fa-file-alt"></i> Policy </a>
        </li>
        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link" data-tab="engagement-retention-tab" href="#"><i class="fas fa-handshake"></i> Employee</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link" data-tab="training-development-tab" href="#"><i class="fas fa-chalkboard-teacher"></i> Training</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link" data-tab="compliance-tab" href="#"><i class="fas fa-balance-scale"></i> Compliance</a>
        </li>

    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="logout.php" class="nav-link"><button class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button></a>
        </li>
    </ul>
</div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
