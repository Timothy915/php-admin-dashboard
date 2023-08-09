<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'LoginSystem';

// Connect to the database
$con = mysqli_connect($host, $username, $password, $database);
if (!$con) {
    die("Error: Could not connect to the database");
}

// When form submitted, check and create user session.
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $query = "SELECT * FROM employees WHERE id='$id' AND password='$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $jobTitle = $row['job_title'];
        
        switch ($jobTitle) {
            case 'Officer':
                // Redirect to the software engineer page
                header("Location: officer/admin.php");
                break;
            case 'Data Scientist':
                // Redirect to the data scientist page
                header("Location: hr/it.php");
                break;
            case 'Manager':
                // Redirect to the manager page
                header("Location: manager.php");
                break;
            case 'Human Resource':
                // Redirect to the human resource page
                header("Location: hr/index.php");
                break;
            case 'Accountant':
                // Redirect to the accountant page
                header("Location: accountant.php");
                break;
            case 'Sales Representative':
                // Redirect to the sales representative page
                header("Location: sales_representative.php");
                break;
            default:
                // Redirect to the admin dashboard page
                $_SESSION['id'] = $id;
                header("Location: admin.php");
                break;
        }
        
        exit();
    } else {
        $errorMessage = "Invalid id or password.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Admin Login</title>
    <style>
        /* Styles for the login page */
        body {
            font-weight: 800;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .form {
            width: 80%;
            max-width: 500px;
            padding: 30px;
            background: white;
            opacity: 0;
            animation: fade-in 1s forwards;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        h1.login-title {
            color: #666;
            margin: 0px auto 25px;
            font-size: 30px;
            font-weight: 300;
            text-align: center;
        }

        .login-input {
            font-size: 15px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 25px;
            height: 25px;
            width: 100%;
        }

        .login-input:focus {
            border-color: #6e8095;
            outline: none;
        }

        .login-button {
            color: #fff;
            background: #55a1ff;
            border: 0;
            outline: 0;
            width: 100%;
            height: 50px;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
        }

        .link {
            color: #666;
            font-size: 15px;
            text-align: center;
            margin-bottom: 0px;
        }

        .link a {
            color: #666;
        }

        h3 {
            font-weight: normal;
            text-align: center;
        }

        .animation-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
            overflow: hidden;
        }

        .animation-bg .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: linear-gradient(135deg, #55a1ff 0%, #9933ff 100%);
            opacity: 0.2;
            animation: animate-bg 20s infinite;
        }

        @keyframes animate-bg {
            0% {
                transform: translate(-50%, -50%) scale(0.2);
                opacity: 0;
            }
            50% {
                opacity: 0.6;
            }
            100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0;
            }
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            .form {
                width: 90%;
                max-width: 400px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="login-title">Admin Login</h1>
    <form class="form" method="post" name="login">
        <h2 class="login-title">Login</h2>
        <input type="text" class="login-input" name="id" placeholder="id" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <?php if (isset($errorMessage)): ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </form>
    <div class="animation-bg">
        <div class="bg-circle"></div>
    </div>
</div>
</body>
</html>
