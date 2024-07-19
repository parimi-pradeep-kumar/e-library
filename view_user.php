<?php
session_start();
include "database.php";
if(!isset($_SESSION["AID"]))
{
	header("location:alogin.php");
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>View User</title>
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
				<h3 id="heading" class="text-primary">View User Details</h3>
				<?php
					$sql="SELECT * FROM student";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						echo "<table>
								<tr>
									<th>SNo</th>
									<th>Name</th>
									<th>Email</th>
									<th>Department</th>
								</tr>";
									$i=0;
								while($row=$res->fetch_assoc())
								{
									$i++;
									echo "<tr>";
									echo "<td>{$i}</td>";
									echo "<td>{$row["NAME"]}</td>";
									echo "<td>{$row["MAIL"]}</td>";
									echo "<td>{$row["DEP"]}</td>";
									echo "</tr>";
								}
									echo "</table>";
					}
					else
					{
						echo "<p class='error'>No User Records Found!!!</p>";
					}
				?>
				
			</div>
			<div id="navi" class="bg-secondary-subtle">
				<?php
					include "adminsideBar.php";
				?>
			</div>
			<div id="footer" class="bg-dark-subtle">
				<p>Copyright: &copy 2024. Designed and Developed by PK</p>
			</div>
		</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>