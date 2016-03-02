<?php			
	//connects to the database
	// include login.php: the code reads all the data that is within file called 'login.php' so for example you can use variables
	include ('login.php');
	// connect to the database using variables from 'login.php' file. If it fails to connect, display an error.
	$conn = mysql_connect($host, $username, $password) or die ("Cannot Connect");
	//selecting database
	mysql_select_db($database);
?>

<!----- defining the site to be html 
charset=UTF-8 is used to display foreign language letters properly-->
<html>
	<meta charset="UTF-8">
<head>

<!-- title of the website-->
<title>Multiple Location Marker in One Google Map</title>
<!-- Mobile viewport optimisation provided by Google Maps API -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link media="all" type="text/css" href="assets/dashicons.css" rel="stylesheet">
<link media="all" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet">
<link rel='stylesheet' id='style-css'  href='style.css' type='text/css' media='all' />
<script type='text/javascript' src='assets/jquery.js'></script>
<script type='text/javascript' src='assets/jquery-migrate.js'></script>

<?php /* === GOOGLE MAP JAVASCRIPT NEEDED (JQUERY) ==== */ ?>
<script src="http://maps.google.com/maps/api/js" type="text/javascript"></script>
<script type='text/javascript' src='assets/gmaps.js'></script>

</head>

<body>
	<div id="container">

		<article class="entry">

			<header class="entry-header">
			<meta charset="UTF-8">
			<!-- header named 'Milan'-->
				<h1>Milan</h1>
			<!-- Paragraph-->
				<p>Highlights in Milan.</br>
				
				<!-- php code that pulls the data about the weather, using YahooWeather API-->
				<?php
				include 'basicweather/YahooWeather.class.php';

				//variables to define required information about the weather
				$weather = new YahooWeather(718345, 'c');
				$temperature = $weather->getTemperature();
				$city = $weather->getLocationCity();
				$country = $weather->getLocationCountry();
				$forecast = $weather->getForecastTomorrowHigh();
				//displaying current and tomorrow's temperature
				echo "Current Temperature is $temperature. ";
				echo "Tomorrow's max Temperature is $forecast. ";
				?>
				
				
				
				</p>
			</header>


			
	<!DOCTYPE html >
	<!--GoogleMaps API-->
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>PHP/MySQL & Google Maps Example</title>
	<!-- pulling the script from the source-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdCa-aHYJNffWvjWeMX3L8EmCWgRA9Bpc"
            type="text/javascript"></script>
    <script type="text/javascript">
	

	
    //<![CDATA[
	//defining custom icons per marker depending on the type, e.g. type 'Church' will display 'cross-2.png' image
    var customIcons = {
      Church: {
        icon: 'images/marker/cross-2.png'
      },
      Library: {
        icon: 'images/marker/library.png'
      },
      Palace: {
        icon: 'images/marker/palace.png	'
      },
      Mall: {
        icon: 'images/marker/mall.png'
      },
      Theatre: {
        icon: 'images/marker/theater.png'
      },
      Galleries: {
        icon: 'images/marker/artgallery.png'
      },
      Planetarium: {
        icon: 'images/marker/planetarium.png'
      },
    };

	//loading the map
    function load() {
		var map = new google.maps.Map(document.getElementById("map"), {
		  //defining the location
        center: new google.maps.LatLng(45.466963, 9.188733),
		//defining default map zoom
        zoom: 14,
		//disable scroll wheel function
		scrollwheel: false,
		//disable navigation control
		navigationControl: false,
		//disable map type control
		mapTypeControl: false,
		//disable scaling function
		scaleControl: false,
		//allowing the map to be dragable
		draggable: true,
		//disable user interface e.g. + and - buttons for zoom control
		disableDefaultUI: true

      });
	  //creates window that contains defined information
		infoWindow = new google.maps.InfoWindow;


      //pulling the data from the file
      downloadUrl("phpsqlajax_genxml2.php", function(data) {
		  
		 //defining variables using data pulled over


        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 1; i < markers.length; i++) {
			var name = markers[i].getAttribute("name");
			var address = markers[i].getAttribute("address");
			var type = markers[i].getAttribute("type");
			var point = new google.maps.LatLng(
				parseFloat(markers[i].getAttribute("lat")),
				parseFloat(markers[i].getAttribute("lng")));
			var html = "<b>" + name + "</b> <br/>" + address;
			var idd = markers[i].getAttribute("identity");
			var icon = customIcons[type] || {};
			var marker = new google.maps.Marker({
		        map: map,
				position: point,
				icon: icon.icon
			});
		  //when marker is clicked, it opens the URL of the location
          bindInfoWindow(marker, map, infoWindow, html);
				  google.maps.event.addListener(marker, 'click', function () {
							window.open(idd, '_blank');
							}); 
		}
      });
    }
	//when the mouse moves over a marker, the function will display an info window that contains name and address of location
    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'mouseover', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });

	  //when the mouse moves away from the marker,the info window will be closed
	  google.maps.event.addListener(marker, 'mouseout', function() {
        infoWindow.close();
});
    }
	// ??????????????????????????????????????????????
    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}
	// ??????????????????????????????????????????????
    //]]>

  </script>

  </head>

  <body onload="load()">
    <div id="map" style="width: 100%; height: 450px"></div>
  </body>

</html>
			
			
			
				
			<script>
			jQuery( document ).ready( function($) {
			<?php
				//variables to define each code to prevent repetition
				//query_select defines the query used to pull the data. Selecting all from table "markers" to match city "Milan" and order "ID" by Ascending
				$query_select = "SELECT * FROM markers WHERE city = 'Milan' ORDER BY id ASC ";
				$result_select = mysql_query($query_select) or die(mysql_error());
				$locations = array();
			
				while($row = mysql_fetch_array($result_select))
					$locations[] = $row;
				//defining variables for the pulled data, e.g. "$desc" defines "description" that has been pulled from the database
				foreach($locations as $row){ 
					$map_lat = ($row['DSAlat']);
					$map_lng = ($row['DSAlng']);
					$name = ($row['name']);
					$addr = ($row['address']);
					$imagine = ($row['IMG_SRC']);
					$marker = ($row['markertype']);
					$desc = ($row['description']);
					$URL = ($row['URL']);
				}	?>

	
				
				}
				);
				</script>


				

				<div class="map-list">

					<ul class="google-map-list" itemscope itemprop="hasMap" itemtype="http://schema.org/Map">
						
						<?php 
						foreach( $locations as $row ){
							
							?>
							<li>
							<!-- displaying table that contains name, address, description of each monument.
							Name of each monument is also an URL to the Wikipedia page-->
								<a target="_blank" itemprop="url" href="<?php echo $row['URL'] ;?>"><?php echo $row['name']; ?></a>
								<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><p class="address"><?php echo $row['address']; ?></p></span>
								<span> <?php echo $row['description'] ?></span>
							</li>
						
						<?php } //end foreach ?>

					</ul><!-- .google-map-list -->
				</div>

			</div><!-- .entry-content -->

		</article>

	</div><!-- #container -->

</body>

</html>
<!--END OF THE CODE-->