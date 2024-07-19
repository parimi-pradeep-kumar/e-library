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
		<title>Comments</title>
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
				<h3 id="heading" class="text-primary">Send Your Comment</h3>
					<?php
					if(isset($_POST["submit"]))
					{
						
							$sql="insert into comment(BID,SID,COMM,LOGGS) values({$_GET["id"]},{$_SESSION["ID"]},'{$_POST["mes"]}',now())";
							$db->query($sql);
							
						
					}
						$sql="SELECT * from book where BID=".$_GET["id"];
						$res=$db->query($sql);
						if($res->num_rows>0)
						{
							echo "<table>";
							$row=$res->fetch_assoc();
							echo "
								<tr>
									<th>Book Name</th>
									<td>{$row["BTITLE"]}</td>
								</tr>
								<tr>
									<th>Keywords</th>
									<td>{$row["KEYWORDS"]}</td>
								</tr>
							";
							echo "</table>";
						}
						else
						{
							echo "<p class='error'>No Books Found</p>";
						}
					?>
				<div id="center">
					<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
						<label>Your Comments</label>
						<textarea name="mes" required></textarea>
						<button type="submit" name="submit">Post Now</button>
					</form>
					
				</div>
				<?php 
					$sql="SELECT student.NAME,comment.COMM,comment.LOGGS FROM comment INNER JOIN student ON comment.SID=student.ID WHERE comment.BID={$_GET["id"]} ORDER BY comment.CID DESC";
					$res=$db->query($sql);
					if($res->num_rows>0)
					{
						while($row=$res->fetch_assoc())
						{
							echo "<p><strong>{$row["NAME"]}</strong>  :     {$row["COMM"]}<i>{$row["LOGGS"]}</i></p>";
						}
					}
					else
					{
						echo "<p class='error'>No Comments</p>";
					}		
				?>
				
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