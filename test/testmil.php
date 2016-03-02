<!DOCTYPE html>
<!-- Type of document-->


<html>
<head>
<meta name="course" content="GN52">
<meta name="award" content="BSc/ITManForBus">
<meta name="type" content="student">
<!-- Please do not remove the above tags -->
<link rel="stylesheet" href="site.css">
<title>#DSAAssignment</title>
<!-- Tab Title -->
</head>


<?php  #opening up php document
include ('login.php');
include ('Milan.php');
	print_r($_GET);
	exit;
	$dcxn = mysqli_connect($host, $username, $password, $database) or die ("Couldn't connect to server");
	
	mysqli_select_db($dcxn, $username) or die("Unable to select database:" . mysqli_error()); 
	
	$result = mysqli_query($dcxn, "SELECT * FROM DSA_POIMILAN WHERE name = '" . $name . "'");

	if ($result === FALSE) {
		die("Query Failed: ". mysqli_error($dcxn));
	}
	echo "<center><table border = '0'>
<tr>
<th>GeoLocation</th>
<th>Name</th>
<th>Type</th>
<th>Capacity</th>
<th>Image</th>
<th>Opening Times</th>
<th>URL</th>
<th>Year Opened</th>
</tr></center>";

while ($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>" . $row['geolocation'] . "</td>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['type'] . "</td>";
	echo "<td>" . $row['capacity'] . "</td>";
	echo "<td>" . $row['IMG_SRC'] . "</td>";
	echo "<td>" . $row['openingTimes'] . "</td>";
	echo "<td>" . $row['URL'] . "</td>";
	echo "<td>" . $row['yearopen'] . "</td>";
	echo "</tr>";
	}	
echo "</table>";


mysqli_close($dcxn);
	
	
	
	?>
