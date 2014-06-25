<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>Home | IST 351 </title>








<?php include('includes/header.php'); ?>

<?php

//Connect to database
require_once 'login.php';

$link = mysqli_connect($db_hostname,$db_username,$db_password,$db_database) or die("Error " . mysqli_connect_error());



$salt1="p%$@@%&*^FDS";
$salt2="F%&*%#%^%$#@";


//CHECKING INPUT ERRORS AND SAVING FORM VARIABLES
if (isset($_POST['formSubmit']))
{
	$errorMessage = "";
	if (empty($_POST["fname"])) {

		$errorMessage .= "<span class=alerts><li> Sign up First Name field cannot be empty</li></span>";
	}
	if (empty($_POST["lname"])) {

		$errorMessage .= "<span class=alerts><li>Sign up Last Name field cannot be empty</li></span>";
	}
	if (empty($_POST["usernamereg"])) {

		$errorMessage .= "<span class=alerts><li> Username field cannot be empty</li></span>";

	}

	if (empty($_POST['passwordreg'])) {

		$errorMessage .= "<span class=alerts><li>  Password field cannot be empty</li></span>";
	}
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$usernamereg = $_POST['usernamereg'];
	$pwordreg = $_POST['passwordreg'];

	if(!empty($errorMessage))
	{
		echo("<p>There was an error with your form:</p>\n");
		echo("<ul>" . $errorMessage . "</ul>\n");
	}






	//Querying a database to Insert the salted username and password into the database
	if (isset($_POST['passwordreg']) &&
	isset($_POST['usernamereg'])  && isset($_POST['fname']) && isset($_POST['lname']))
	{
		echo "<p class=alerts>Thanks for signing up. Log in below to access your account</p>";




		$token = sha1("$salt1$pwordreg$salt2");

		add_user($fname, $lname, $usernamereg, $token, $link);


	}

}









if (isset($_POST['loginsubmit']))
{


	$errorMessage = "";

	if (empty($_POST["usernamelogin"])) {

		$errorMessage .= "<span class=alerts><li> Log in Username field cannot be empty</li></span>";
	}

	if (empty($_POST['passwordlogin'])) {

		$errorMessage .= "<span class=alerts><li>  Log in Password field cannot be empty</li></span>";
	}

	$usernamelogin = $_POST['usernamelogin'];
	$pwordlogin = $_POST['passwordlogin'];


	if(!empty($errorMessage))
	{
		echo("<span class=alerts><p>There was an error with your form:</p>\n</span>");
		echo("<ul>" . $errorMessage . "</ul>\n");
	}

	if(!empty($_POST['usernamelogin']) && !empty($_POST['passwordlogin']))
	{
	
		$query = "SELECT * FROM users WHERE username='$usernamelogin'";
		$result = mysqli_query($link, $query);
		if(!$result) die ("Database access failed:" . mysqli_error($link));
		elseif (mysqli_num_rows($result))
		{
			$row = mysqli_fetch_row($result);
			$token = sha1("$salt1$pwordlogin$salt2");
				
			if ($token == $row[3])
			{
				session_start();
				$_SESSION['username'] = $usernamelogin;
				$_SESSION['password'] = $pwordlogin;
				$_SESSION['fname'] = $row[0];
				$_SESSION['lname']  = $row[1];
				$_SESSION['log']  = "in";
//				echo "$row[0] $row[1] : Hi $row[0],
//				you are now logged in as '$row[2]'";
//				die ("<p>Click <a href=userhomepage.php>here</a> to continue to your Profile</p>");
				header('location:userhomepage.php'); exit();
			}
			else echo "<span class=alerts>ATTENTION: Invalid password. Please use the correct password for the username entered</span>";
		}
		else echo "<span class=alerts>ATTENTION: Invalid username/password combination</span>";
	}
	else
	{
		//REMAIN ON PAGE withouth any link to user login page
			echo "<span class=alerts>Please enter a valid username & password</span>";
	}


}









function add_user($fn, $sn, $un, $pw, $link)
{
	$query = "INSERT INTO users VALUES('$fn', '$sn', '$un', '$pw')";
	$result = mysqli_query($link, $query);
	if (!$result) die ("Database access failed: " . mysqli_error($link));
}

mysqli_close($link);

?>



<div id="login">
<form name="login" action="Userpassword.php" method="post">
<h2>Log In</h2>
<p>Username<br>
<input name="usernamelogin" type="text" value ="<?php $usernamelogin;?>"></p>
<p>Password<br>
<input name="passwordlogin" type="password" value ="<?php $pwordlogin;?>"></p>
<p><input name="loginsubmit" type="submit" value ="Submit" style="font-size: 17px;"></p>
</form>
</div>





</div> <!-- end #content -->
<?php include('includes/footer.php'); ?>