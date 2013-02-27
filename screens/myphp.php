<html>

<head>
<title> findagig </title>

<link rel='stylesheet' type="text/css" href="styles.css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script> 

</head>

<body>
<?php
set_time_limit(300);

$destination = $_POST["destination"];
$startloc= (string) $_POST["startloc"];

echo $destination;
echo $startloc;
	//Adding to the table
/*
	$db_host = "localhost";
	$db_username = "avartakavi3";
	$db_pass = "Kje5vh19";
	$db_name = "avartakavi36313";
	$table_name_1 ="top_artists";

@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to MySQL");
@mysql_select_db("$db_name") or die ("No Database of that name");

 foreach($full as $val) {
        $query = mysql_query("INSERT IGNORE INTO $table_name_1 (Artist) VALUES ('$val') ") or die(mysql_error());
    } 
	

/
	// Add current location to first row of database
 $query = mysql_query("INSERT IGNORE INTO $table_name_2 (ID,Artists,Venue,Geo_lat,Geo_long, URL,Date) VALUES ('$my_distance','My Location','blank','$my_lat','$my_long','blank',0000) ") or die(mysql_error());
	 
	for ($t=0; $t<$dim; $t++)
  { //Search to see if any of the artists are the same as my top artists

 

  $var1 = $events['events'][$i]['artists'][$t];
  //echo $var1 . "</br>";
 
  $result = mysql_query("SELECT Artist FROM top_artists WHERE Artist = '".$var1."' ");
  
  if(mysql_num_rows($result) > 0)
   {  // Add the event to the database
	  // echo "Adding event";
	   $ev_id =  $events['events'][$i]['id'];
	   $ev_ven = $events['events'][$i]['venue']['name'];
	   $ev_lat = $events['events'][$i]['venue']['location']['point']['lat'];
	   $ev_long = $events['events'][$i]['venue']['location']['point']['long'];
	   $ev_url = $events['events'][$i]['url'];
	   $ev_date = $events['events'][$i]['startDate'];
	   $ev_artists= '';
	 //  echo $ev_id . '</br>';
	 
	   for ($j=0; $j<$dim; $j++) {
	   $ev_artists.= $events['events'][$i]['artists'][$j] . ", ";
	   } // End of inner database
	//	echo $ev_ven. '</br>';
	$ev_artists=substr($ev_artists, 0, -1); 
	    
	 $query = mysql_query("INSERT IGNORE INTO $table_name_2 (ID,Artists,Venue,Geo_lat,Geo_long, URL,Date) VALUES ('$ev_id','$ev_artists','$ev_ven','$ev_lat','$ev_long','$ev_url','$ev_date') ") or die(mysql_error());
     break;
	 } // End of if

	 
	
	} //end of for
	 
$i++;
} // end of while

} // end of if

else {
	die('<b>Error '.$geoClass->error['code'].' - </b><i>'.$geoClass->error['desc'].'</i>');
}

header("Location: geo_trial1.php"); /* Redirect browser */

?>



</html>
</body>
</html> 