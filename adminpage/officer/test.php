<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
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
        .content {
    margin-top: 0px; /* Adjust the margin-top value as desired */
    margin-left: 150px; /* Align content to the right side */
    margin-right: auto; /* Add right margin for spacing */
    padding: 20px;
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
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="content">
        <div class="center-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="statistics-section">
                            <h3>Applicants Statistics</h3>
                            <canvas id="statisticsChart"></canvas>
                        </div>
                        <!-- Rest of the code for the table goes here -->
                        <?php
                        // Connect to the database
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "LoginSystem";

                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Fetch data from the database
                        $query = "SELECT status, COUNT(*) AS count FROM Person GROUP BY status";
                        $result = mysqli_query($conn, $query);
                        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        // Prepare data for the chart
                        $statusLabels = [];
                        $statusCounts = [];
                        $totalApplicants = 0;
                        foreach ($data as $row) {
                            $statusLabels[] = $row['status'];
                            $statusCounts[] = $row['count'];
                            $totalApplicants += $row['count'];
                        }
                        ?>

                        <script>
                            // Chart.js initialization and configuration
                            var ctx = document.getElementById('statisticsChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: <?php echo json_encode($statusLabels); ?>,
                                    datasets: [{
                                        label: 'Applicants',
                                        data: <?php echo json_encode($statusCounts); ?>,
                                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>

                        <div class="total-statistics">
                            <p>Total Applicants: <span><?php echo $totalApplicants; ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
