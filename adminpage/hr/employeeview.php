<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    margin-left: 220px; /* Increased margin to create space for the sidebar */
    padding: 20px;
    margin-top: 80px; /* Added top margin to prevent overlap with the navigation bar */
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

.wrapper {
    width: 1200px;
    margin: 0 auto;
    margin-left: 200px;
}

table tr td:last-child {
    width: 120px;
}
.btn btn-success{
    margin-left:
}

    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<section class="id">
<div class="nav-bar">
    <div class="admin-info">
    <img src="uploads/<?=$pp?>" width="30" height="30" alt="" />
    <span><?= $username ?></span>
    </div>
    <div class="admin-actions">
    <a href="create.php" class="btn btn-primary">Create Admin</a>
</div>
    </section>
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

<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-5 mb-5">
                <h2 class="text-center">Employees Details</h2>
                <div class="text-center mb-5">
                    <a href="create.php" class="btn btn-success"><i class="fa fa-plus"></i> Add New Employee</a>
                </div>
                <?php
                // Include config file
                require_once "config.php";
                
                // Attempt select query execution
                $sql = "SELECT * FROM employees";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th>#</th>";
                                    echo "<th>Name</th>";
                                    echo "<th>Job title</th>";
                                    echo "<th>Email</th>";
                                    echo "<th>Address</th>";
                                    echo "<th>Salary</th>";
                                    echo "<th>Action</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" .$row['job_title']."</td>";
                                    echo "<td>" .$row['email']."</td>";
                                    echo "<td>" . $row['address'] . "</td>";
                                    echo "<td>" . $row['salary'] . "</td>";
                                    echo "<td>";
                                        echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                        echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                        echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                    echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";                            
                        echo "</table>";
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>        
    </div>
</div>

</body>
</html>