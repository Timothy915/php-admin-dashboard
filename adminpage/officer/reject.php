<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rejected Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
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

/* Styles for the sidebar brand */
.sidebar-brand {
    padding: 15px;
    font-size: 1.5rem;
    text-align: center;
    color: #fff;
    background-color: #212529;
    margin-top: 10px;
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
        .btn-action {
            padding: 6px 12px;
            font-size: 14px;
        }

        .actions {
            white-space: nowrap;
        }

        .application-type {
            font-weight: bold;
            margin-left: 50px;
        }
        .table {
    margin-top: 20px; /* Adjust the margin-top value as desired */
    margin-left: 120px; /* Align content to the right side */
    margin-right: auto; /* Add right margin for spacing */
    padding: 20px;
}
.container{
    margin-top: 100px;
  
}
.container h2 {
    margin-left: 50%;
}
</style>
<body>
<div class="nav-bar">
    <div class="admin-info">
        <img src="uploads/user.jpg" alt="Admin Profile Picture">
        <span>John Doe</span>
    </div>
    <div class="admin-actions">
        <button class="btn btn-primary">Create Admin</button>
    </div>
   
</div>

<div class="sidebar">

    <ul class="sidebar-nav">
    <div class="admin-actions">
        <a href="admin.php" class="btn btn-primary"><i class="fas fa-home"></i> Home</a>
    </div>
        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link active" data-tab="pending-tab" href="pending.php"><i class="fas fa-clock"></i> Pending</a>
        </li>

        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link" data-tab="approved-tab" href="approve.php"><i class="fas fa-check"></i> Approved</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link" data-tab="rejected-tab" href="reject.php"><i class="fas fa-times"></i> Rejected</a>
        </li>
        <li class="sidebar-nav-item">
            <a class="sidebar-nav-link" data-tab="rejected-tab" href="mail/contact-form.php"><i class="fas fa-envelope"></i> Send email</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="logout.php" class="nav-link"><button class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button></a>
        </li>
    </ul>
</div>

    <div class="container">
        <h2>Rejected applications</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include config file
                require_once "config.php";
                
                // Attempt select query execution
                $sql = "SELECT * FROM Person WHERE Status = 'reject'";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            echo '<tr>';
                            echo '<td>' . $row['username'] . '</td>';
                            echo '<td>' . $row['first_name'] . '</td>';
                            echo '<td>' . $row['last_name'] . '</td>';
                            echo '<td>' . $row['age'] . '</td>';
                            echo '<td>' . $row['gender'] . '</td>';
                            echo '<td>' . $row['address'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['phone_number'] . '</td>';
                            echo '</tr>';
                        }
                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo '<tr><td colspan="8">No records found.</td></tr>';
                    }
                } else{
                    echo '<tr><td colspan="8">Oops! Something went wrong. Please try again later.</td></tr>';
                }
                // Close connection
                mysqli_close($link);
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>





















