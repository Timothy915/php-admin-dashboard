<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $address = $salary = $job_title = $email  = $password = "";
$name_err = $address_err = $salary_err = $job_title_err = $email_err  = $password_err = "";
 
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";     
    } else {
        $address = $input_address;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if (empty($input_salary)) {
        $salary_err = "Please enter the salary amount.";     
    } elseif (!ctype_digit($input_salary)) {
        $salary_err = "Please enter a positive integer value.";
    } else {
        $salary = $input_salary;
    }

    // Validate job title (optional)
    $input_job_title = trim($_POST["job_title"]);
    if (!empty($input_job_title)) {
        $job_title = $input_job_title;
    }

    // Validate email (optional)
    $input_email = trim($_POST["email"]);
    if (!empty($input_email)) {
        if (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please enter a valid email address.";
        } else {
            $email = $input_email;
        }
    }

    // Validate username
    $input_username = trim($_POST["username"]);
    if (empty($input_username)) {
        $username_err = "Please enter a username.";
    } else {
        $username = $input_username;
    }
    
    // Validate password
    $input_password = trim($_POST["password"]);
    if (empty($input_password)) {
        $password_err = "Please enter a password.";
    } else {
        $password = $input_password;
    }

    $param_password = password_hash($password, PASSWORD_DEFAULT);


    // Check input errors before inserting in the database
    if (empty($name_err) && empty($address_err) && empty($salary_err) && empty($password_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, address, salary, job_title, email, password) VALUES (?, ?, ?, ?, ?, ?)";
         
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_address, $param_salary, $param_job_title, $param_email, $param_password);

            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;
            $param_job_title = $job_title;
            $param_email = $email;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to the landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                       
<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control">
</div>
                        <div class="form-group">
                        <div class="form-group">
        <label>Job Title</label>
        <select name="job_title" class="form-control">
            <option value="">Select a job title</option>
            <option value="Software Engineer">Officer</option>
            <option value="Data Scientist">Manager</option>
            <option value="Web Developer">Human resource</option>
            <option value="Marketing Manager">Accounatant</option>
            <option value="Sales Representative">Software developer</option>
        </select>
    </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control <?php echo (!empty($salary_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $salary; ?>">
                            <span class="invalid-feedback"><?php echo $salary_err;?></span>

                        </div>
                    
<div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
</div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>