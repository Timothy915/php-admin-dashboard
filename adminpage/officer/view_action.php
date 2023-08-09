<?php
// Retrieve the username from the URL parameter
if (isset($_GET['id'])) {
    $username = $_GET['id'];
} else {
    // Handle the case when the username parameter is not present
    $username = "Username not found";
}

$db = mysqli_connect("localhost", "root", "", "LoginSystem");

// Retrieve data for the specified username
$query = "SELECT * FROM data WHERE username = '$username'";
$result = mysqli_query($db, $query);

$personQuery = "SELECT * FROM Person WHERE username = '$username'";
$personResult = mysqli_query($db, $personQuery);
$personData = mysqli_fetch_assoc($personResult);

$parentsQuery = "SELECT * FROM Parents WHERE username = '$username'";
$parentsResult = mysqli_query($db, $parentsQuery);
$parentsData = mysqli_fetch_assoc($parentsResult);

$travelQuery = "SELECT * FROM Travel WHERE username = '$username'";
$travelResult = mysqli_query($db, $travelQuery);
$travelData = mysqli_fetch_assoc($travelResult);

$accountQuery = "SELECT * FROM Account WHERE username = '$username'";
$accountResult = mysqli_query($db, $accountQuery);
$accountData = mysqli_fetch_assoc($accountResult);

mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    <style>
            body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #0C4160;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .user-image {
            width: 150px;
            height: auto;
            border: 1px solid #ccc;
        }
        .user-pdf {
            display: inline-block;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .section-data {
            margin-left: 20px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
</head>
<body>
    <h1>User Data</h1>

    <div class="section">
        <div class="section-title">Personal Information</div>
        <div class="section-data">
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>First Name:</strong> <?php echo isset($personData['first_name']) ? $personData['first_name'] : 'N/A'; ?></p>
            <p><strong>Last Name:</strong> <?php echo isset($personData['last_name']) ? $personData['last_name'] : 'N/A'; ?></p>
            <p><strong>Age:</strong> <?php echo isset($personData['age']) ? $personData['age'] : 'N/A'; ?></p>
            <p><strong>Gender:</strong> <?php echo isset($personData['gender']) ? $personData['gender'] : 'N/A'; ?></p>
            <p><strong>Address:</strong> <?php echo isset($personData['address']) ? $personData['address'] : 'N/A'; ?></p>
            <p><strong>Occupation:</strong> <?php echo isset($personData['occupation']) ? $personData['occupation'] : 'N/A'; ?></p>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Parents Information</div>
        <div class="section-data">
            <p><strong>Father's First Name:</strong> <?php echo isset($parentsData['father_first_name']) ? $parentsData['father_first_name'] : 'N/A'; ?></p>
            <p><strong>Father's Last Name:</strong> <?php echo isset($parentsData['father_last_name']) ? $parentsData['father_last_name'] : 'N/A'; ?></p>
            <p><strong>Mother's First Name:</strong> <?php echo isset($parentsData['mother_first_name']) ? $parentsData['mother_first_name'] : 'N/A'; ?></p>
            <p><strong>Mother's Last Name:</strong> <?php echo isset($parentsData['mother_last_name']) ? $parentsData['mother_last_name'] : 'N/A'; ?></p>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Travel Information</div>
        <div class="section-data">
            <p><strong>Travel Reason:</strong> <?php echo isset($travelData['travel_reason']) ? $travelData['travel_reason'] : 'N/A'; ?></p>
            <p><strong>Duration of Travel:</strong> <?php echo isset($travelData['duration_of_travel']) ? $travelData['duration_of_travel'] : 'N/A'; ?></p>
        </div>
    </div>
    <div class="section">
    <div class="section-title">Account Information</div>
    <div class="section-data">
        <p><strong>Card Number:</strong> <?php echo isset($accountData['card_number']) ? $accountData['card_number'] : 'N/A'; ?></p>
        <p><strong>Card Name:</strong> <?php echo isset($accountData['card_name']) ? $accountData['card_name'] : 'N/A'; ?></p>
        <p><strong>Expiry Date:</strong> <?php echo isset($accountData['expiry_date']) ? $accountData['expiry_date'] : 'N/A'; ?></p>
        <p><strong>CCV:</strong> <?php echo isset($accountData['ccv']) ? $accountData['ccv'] : 'N/A'; ?></p>
        <p><strong>Amount:</strong> <?php echo isset($accountData['amount']) ? $accountData['amount'] : 'N/A'; ?></p>
    </div>
</div>


    <div class="section">
        <div class="section-title">Uploaded Documents</div>
        <table>
            <tr>
                <th>Front NRC</th>
                <th>Back NRC</th>
                <th>PDF</th>
            </tr>
            <?php while ($data = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td>
                        <?php if (!empty($data['front_nrc'])): ?>
                            <a href="http://localhost:/test/second/uploads/<?php echo $data['front_nrc']; ?>" data-lightbox="front-nrc">
                                <img class="user-image" src="http://localhost/test/second/uploads/<?php echo $data['front_nrc']; ?>" alt="Front NRC">
                            </a>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($data['back_nrc'])): ?>
                            <a href="http://localhost:/test/second/uploads/<?php echo $data['back_nrc']; ?>" data-lightbox="back-nrc">
                                <img class="user-image" src="http://localhost/test/second/uploads/<?php echo $data['back_nrc']; ?>" alt="Back NRC">
                            </a>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!empty($data['pdf'])): ?>
                            <a class="user-pdf" href="http://localhost/test/second/uploads/<?php echo $data['pdf']; ?>" target="_blank"><?php echo $data['pdf']; ?></a>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
    
