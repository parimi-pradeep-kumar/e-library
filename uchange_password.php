<?php
session_start();
include "database.php";
if(!isset($_SESSION["ID"]))
{
	header("location:ulogin.php");
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>User Password</title>
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
				<h3 id="heading" class="text-primary">Change Password</h3>
				<div id="center">
				<?php 
					if(isset($_POST["submit"]))
					{
						$sql="SELECT * from student WHERE PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							$s="update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
							$db->query($s);
							echo "<p class='success'>Password Changed</p>";
						}
						else
						{
							echo "<p class='error'>Invalid Password</p>";
						}
					}
				?>
					<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
						<label>Old Password</label>
						<input type="password" name="opass" required>
						<label>New Password</label>
						<input type="password" name="npass" required>
						<button type="submit" name="submit">Update Password</button>
					</form>
				</div>
				
			</div>
			<div id="navi" class="bg-secondary-subtle">
				<?php
					include "usersideBar.php";
				?>
			</div>
			<div id="footer" class="bg-dark-subtle">
				<p>Copyright: &copy 2024. Designed and Developed by PK</p>
			</div>
		</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>