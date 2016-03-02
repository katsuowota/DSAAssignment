<?php
include('login.php');

try {
    $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    //echo "PDO connection object created";
	echo '<table>';
	foreach($db->query('SELECT geolocation, name, type, capacity, openingTimes, URL, yearopen, address, description FROM DSA_POIMILAN WHERE 1') as $location) {
		echo '<tr>';
			echo '<td>'.$location['geolocation'].'</td>';
			echo '<td>'.$location['name'].'</td>';
			echo '<td>'.$location['type'].'</td>';
			echo '<td>'.$location['capacity'].'</td>';
			echo '<td>'.$location['openingTimes'].'</td>';
			echo '<td>'.$location['URL'].'</td>';
			echo '<td>'.$location['yearopen'].'</td>';
			echo '<td>'.$location['address'].'</td>';
			echo '<td>'.$location['description'].'</td>';
		echo '</tr>';
	}
	echo '</table>';
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }

?>