<?php include "script.php"; ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<head>
	<meta charset="utf-8">
	<title>Contact Form</title>
	<style>
	body {
		font-family:"Open Sans", Helvetica, Arial, sans-serif;
		line-height: 1.5;
	}
	.container {
		max-width:500px;
		width:100%;
		margin:0 auto;
	}
	form{
		width: 100%;
	}
	label{
		font-weight: bold;
		margin-bottom: 10px;
	}
	input, textarea {
		font-family:"Open Sans", Helvetica, Arial, sans-serif;
		width:100%;
		border:1px solid #CCC;
		background:#FFF;
		margin:0 0 5px;
		padding:10px;
	}
	fieldset {
		border: medium none !important;
		margin: 0 0 10px;
		min-width: 100%;
		padding: 0;
		width: 100%;
	}
	button{
		cursor:pointer;
		width: 100%;
		border:none;
		background:rgb(3, 153, 212);
		color:#FFF;
		margin:0 0 5px;
		padding:10px;
		font-size:15px;
	}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"><i class="fas fa-cogs"></i> Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" data-tab="pending-tab" href="pending.php"><i class="fas fa-clock"></i> Pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-tab="approved-tab" href="approve.php"><i class="fas fa-check"></i> Approved</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-tab="rejected-tab" href="reject.php"><i class="fas fa-times"></i> Rejected</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-tab="rejected-tab" href="mail/contact-form.php"><i class="fas fa-envelope"></i> Send email</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="admin_logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </div>
</nav>


	<div class="container">
		<h1>Contact Form</h1>
		<form method="post">
			<fieldset>
				<label>Name</label>
				<input type="text" name="name" placeholder="Enter Name">
			</fieldset>
			<fieldset>
				<label>Mobile</label>
				<input type="text" name="mobile" placeholder="Enter Mobile">
			</fieldset>
			<fieldset>
				<label>Email</label>
				<input type="email" name="email" placeholder="Enter Email">
			</fieldset>
			<fieldset>
				<label>Message</label>
				<textarea name="message" placeholder="Type your Message..."></textarea>
			</fieldset>
			<fieldset>
				<button type="submit" name="submit">SUBMIT</button>
			</fieldset>
		</form>
	</div>

</body>
</html>
