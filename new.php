<?php
	include_once("db.php");
	include_once("header.html");

	if(isset($_POST['Submit'])) {	
		$name = mysqli_real_escape_string($mysqli, $_POST['name']);
		$day = mysqli_real_escape_string($mysqli, $_POST['day']);
		$signin = mysqli_real_escape_string($mysqli, $_POST['signin']);
		$signout = mysqli_real_escape_string($mysqli, $_POST['signout']);
		
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else { 
			// if all the fields are filled (not empty) 
			//insert data to database
			$result = mysqli_query($mysqli, "INSERT INTO `visitors` (`id`, `name`, `day`, `sign in`, `sign out`) VALUES (NULL, '{$_POST["name"]}', '{$_POST["day"]}', '{$_POST["signin"]}', '{$_POST["signout"]}')");
			//Get the last user_id
			$last_id = $mysqli->insert_id;
			//redirectig to the view page
			header("Location: view.php?id=$last_id");
		}
	}
?>

<html>
<head>
	<title>New Guest</title>
</head>

<body>
	<a href="index.php" style="margin-left: 10px; font-size: 1.3em;">Home</a>
	<br/><br/>
	<div>
		<form action="new.php" method="POST" name="form1">
			<table class="color" width="30%" align="center" style="border: 1px solid black;">
				<tr> 
					<td>Name:</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr> 
					<td>Day:</td>
					<td><input type="date" name="day"></td>
				</tr>
				<tr> 
					<td>Sign in:</td>
					<td><input type="time" name="signin"></td>
				</tr>
				<tr> 
					<td>Sign out:</td>
					<td><input type="time" name="signout"></td>
				</tr>
				<tr> 
					<td></td>
					<td><input class="btn-success btn-lg" style="border: none;" type="Submit" name="Submit" value="Add"></td>
				</tr>
			</table>
		</form>		
	</div>
	
<?php
	include_once("footer.html");
?>