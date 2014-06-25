<?php
require_once 'login.php';
$link = mysqli_connect($db_hostname,$db_username,$db_password,$db_database) or die("Error " . mysqli_connect_error());
 $sql = 'SELECT * FROM users';
 $result = mysqli_query($link,$sql);

 $data = array();
 while($row = mysqli_fetch_array($result)){

	//Querying the database to get the country name from the given code
	$query2 = "SELECT name_en FROM countries WHERE code='$row[8]'";
	$result2 = mysqli_query($link, $query2);
	if(!$result2) die ("Database access failed:" . mysqli_error($link));
	elseif (mysqli_num_rows($result2))
	$row3 = mysqli_fetch_row($result2);
	$current_country_name = $row3[0];
	$country  = $row3[0];
 	
 	
//echo "Current City Row: ".$row[9]."<br>";
  $row_data = array(
   'forename' => $row['forename'], 
    'surname' => $row['surname'],
  	'current_country'=> $country,
  	'current_city'=> $row[9]
  	
   );
  
  array_push($data, $row_data);
 } 
 echo json_encode($data);
?>