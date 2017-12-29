<?php
// including the database connection file
	include_once("db.php");
	include_once("header.html");

	if(isset($_POST['update'])) {	
		$id = mysqli_real_escape_string($mysqli, $_POST['id']);
		$name = mysqli_real_escape_string($mysqli, $_POST['name']);
		$day = mysqli_real_escape_string($mysqli, $_POST['day']);
		$signin = mysqli_real_escape_string($mysqli, $_POST['signin']);
		$signout = mysqli_real_escape_string($mysqli, $_POST['signout']);	
		
		// checking empty fields
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else {	
			//updating the table
			$result = mysqli_query($mysqli, "UPDATE `visitors` SET `name`='{$_POST["name"]}',`day`='{$_POST["day"]}',`sign in`='{$_POST["signin"]}',`sign out`='{$_POST["signout"]}' WHERE id=$id");
			//redirectig to the display page. In our case, it is index.php
			header("Location: index.php");
		}
	}
?>

<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM visitors WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$day = $res['day'];
	$signin = $res['sign in'];
	$signout = $res['sign out'];
}
?>

<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php" style="margin-left: 10px; font-size: 1.3em;">Home</a>
	<br/><br/>
	
	<form name="form1" method="POST" action="edit.php">
		<table class="color" width="30%" align="center" style="border: 1px solid black;">
			<tr> 
				<td>Name:</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Day:</td>
				<td><input type="date" name="day" value="<?php echo $day;?>"></td>
			</tr>
			<tr> 
				<td>Sign in:</td>
				<td><input type="time" name="signin" value="<?php echo $signin;?>"></td>
			</tr>
			<tr> 
				<td>Sign out:</td>
				<td><input type="time" name="signout" value="<?php echo $signout;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" class="btn-success btn-lg" style="border: none;" name="update" value="Update"></td>
			</tr>
		</table>
	</form>

<?php
	include_once("footer.html");
?>