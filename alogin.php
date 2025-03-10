<?php
session_start();
	include "database.php";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin Login</title>
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
				<h3 id="heading" class="text-primary">Admin Login here</h3>
				<div id="center">
				<?php 
					if(isset($_POST["submit"]))
					{
						$sql="SELECT * FROM admin where ANAME='{$_POST["aname"]}' and APASSWORD='{$_POST["apassword"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$row=$res->fetch_assoc();
							$_SESSION["AID"]=$row["AID"];
							$_SESSION["ANAME"]=$row["ANAME"];
							header("location:ahome.php");
						}
						else
						{
							echo "<p class='error'>Invalid User Details</p>";
						}
					}
				?>
					<form action="alogin.php" method="post">
						<label>Admin Name</label>
						<input type="text" name="aname" required>
						<label>Password</label>
						<input type="password" name="apassword" required>
						<button type="submit" name="submit">Login Now</button>
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