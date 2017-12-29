<?php
	include_once("db.php");
	include_once("header.html");
?>

<html>
<head>
	<title>View Guest</title>
</head>

<body>
	<a href="index.php" style="margin-left: 10px; font-size: 1.3em;">Home</a>
	<br/><br/>

	<div class="container">
		<div class="jumbotron" style="width: 70%; margin: auto;">
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

				echo "<h2 style=\"font-weight: bold;\" class=\"title\">"."$name"."</h2>"."<hr>";
				echo "<p class=\"description\">"."$day"."</p>";
				echo "<p class=\"date\">"."$signin"."</p>";
				echo "<p class=\"date\">"."$signout"."</p>";

				echo "<td><a href=\"view.php?id=$res[id]\" class=\"btn btn-success btn-sm butt\"><span class=\"glyphicon glyphicon-info-sign\"></span> View</a>  <a href=\"edit.php?id=$id\" class=\"btn btn-info btn-sm\"><span class=\"glyphicon glyphicon-edit\"></span> Edit</a>  <a href=\"delete.php?id=$id\" class=\"btn btn-info btn-sm\" onClick=\"return confirm('Are you sure you want to delete?')\"><span class=\"glyphicon glyphicon-trash\"></span> Delete</a></td>";	
			?>
		</div>
	</div>


<?php
	include_once("footer.html");
?>