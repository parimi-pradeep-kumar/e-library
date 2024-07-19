<?php
include "database.php";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>New User</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="container">
			<div id="header" class="bg-secondary">
				<h1>E-Library Management System</h1>
			</div>
			<div id="wrapper">
				<h3 id="heading" class="text-primary">New User Registration</h3>
				<div id="center">
				<?php 
					if(isset($_POST["submit"]))
					{
						
							$sql="insert into student(NAME,PASS,MAIL,DEP) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
							$db->query($sql);
							echo "<p class='success'>User Registration Success</p>";
						
					}
				?>
					<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
						<label>Name</label>
						<input type="text" name="name" required>
						<label>Password</label>
						<input type="password" name="pass" required>
						<label>Email ID</label>
						<input type="email" name="mail" required>
						<label>Department</label>
						<select name="dep" required>
							<option value="">Select</option>
							<option value="B.SC(cs)">B.SC(cs)</option>
							<option value="BCA">BCA</option>
							<option value="B.COM(cs)">B.COM(cs)</option>
							<option value="B.COM">B.COM</option>
							<option value="BA">BA</option>
							<option value="BBA">BBA</option>
							<option value="Others">Others</option>
						</select>
						<button type="submit" name="submit">Register Now</button>
					</form>
				</div>
				
			</div>
			<div id="navi" class="bg-secondary-subtle">
				<?php
					include "sideBar.php";
				?>
			</div>
			<div id="footer" class="bg-dark-subtle">
				<p>Copyright: &copy 2024. Designed and Developed by PK</p>
			</div>
		</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>