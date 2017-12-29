<?php
//including the database connection file
include_once("db.php");
include_once("header.html");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM visitors ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Homepage</title>
	<style>
		table, th, td {
		    border: none;
		}
		
	</style>
</head>

<body>
	<a href="new.php" class="btn btn-success" style="margin-left: 10px";>New Guest</a><br/><br/>

	<div class="container">
		<div class="jumbotron">
			<table class="table">
			<thead>
			<tr>
				<th scope="col">Name</th>
				<th scope="col">Day</th>
				<th scope="col">Sign in</th>
				<th scope="col">Sign out</th>
				<th scope="col"></th>
			</tr>
			</thead>
			<tbody>
			<?php 
				//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
				while($res = mysqli_fetch_array($result)) { 		
					echo "<tr scope=\"row\">";
					echo "<td>".$res['name']."</td>";
					echo "<td>".date($res['day'])."</td>";
					echo "<td>".$res['sign in']."</td>";
					echo "<td>".$res['sign out']."</td>";	
					echo "<td><a href=\"view.php?id=$res[id]\" class=\"btn btn-success btn-sm\"><span class=\"glyphicon glyphicon-info-sign\"></span> View</a>  <a href=\"edit.php?id=$res[id]\" class=\"btn btn-info btn-sm\"><span class=\"glyphicon glyphicon-edit\"></span> Edit</a>  <a href=\"delete.php?id=$res[id]\" class=\"btn btn-danger btn-sm\" onClick=\"return confirm('Are you sure you want to delete?')\"><span class=\"glyphicon glyphicon-trash\"></span> Delete</a></td>";		
				}
			?>
			</tbody>
			</table>
		</div>
	</div>
	
<?php
	include_once("footer.html");
?>