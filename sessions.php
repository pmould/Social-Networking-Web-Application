<?php
session_start();
if (isset($_SESSION['username']))
{
	$currentcity = $_SESSION['current_city'];
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	$forename = $_SESSION['fname'];
	$surname  = $_SESSION['lname'];
	$bday     = $_SESSION['birthday'];
	$pword    = $_SESSION['password'];
	$profpic  =  $_SESSION['profilepic'];
	$nationality = $_SESSION['nationality_name'];
	$currentcountry = $_SESSION['hometown'];
	$hometown = $_SESSION['current_country_name'];
	

	//echo "Profile Picture:$profpic";

	//	destroy_session_and_data();


}
?>