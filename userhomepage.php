<?php require 'connection_sessions.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>User Home Page | Kingdom Connect</title>
<?php 
$actionurl = "userhomepage.php";
 ?>

</head>
<body>
<?php include('includes/headeruser.php');
// echo  $currentcity."<br>";
// echo "Session:profpic: ".$_SESSION['profilepic'];
// echo "Session:hometown: ".$_SESSION['hometown'];
?>

<?php 
//checking if a log SESSION VARIABLE has been set
if( !loggedin() ){
	//if the user is not allowed, display a message and a link to go back to login page
	echo "You are not allowed. <a href=UserPassword.php>back to login page</a>";

	//then abort the script
	//exit();
}
else 
{
	if($hometown==null)
	{
		?>
		<script>

			$("#modal").show();
			 $("#modal2").hide(); 
			$("#fade").show();

		</script>
		<?php

		
	}
	elseif($hometown!= null && $profpic == null)
	{
		?>
				<script>
		
					$("#modal").hide();
					 $("#modal2").show(); 
					$("#fade").show();
		
				</script>
				<?php
	}
	
	?>
	
	<div class ="clear content">
	<div class="profileheading">
	<span class ="nameheading"><?php echo $forename." ".$surname ?></span>
	<?php if (!isset($profpic) || $profpic == "")
	{
	 echo "<img class=\"profilepic\" src=\"images/defaultthumbpic.jpg\">";
	}
	 else { 
	echo $profpic;?>             
	<img class="profilepic" src="uploads/<?php echo "".$username."/".$profpic.""; ?>" >
	
	<?php 
	}
	?>
	
	
	</div>

	
<!-- <p>Full Name: $forename $surname<br /></p>
	<p>Username: $username<br></p>
	<p>Password: $password<br></p>
	<p>Birthday: $bday<br></p>
	<p>Password: $pword<br></p>  -->
	
	<div class="leftprofile">
	<div class="connectabout">
	
	

	
	
<table class="homefieldstable" style="border-bottom:none">
<tr>
<th colspan="2">Origin</th>
</tr>
<tr>
  <td>Nationality: </td>
  <td><?php echo $nationality; ?></td>
</tr>
<tr>
  <td>Hometown: </td>
  <td><?php echo $hometown; ?></td>
 </tr>		
 </table>
 
<table class="homefieldstable">
<tr>
<th colspan="2">Current Location</th>
</tr>
<tr>
  <td>Country: </td>
  <td><?php echo  $currentcountry;?></td>
</tr>
<tr>	
  <td>City:</td>
  <td><?php echo  $currentcity;?></td>	
</tr>
</table>
	
	
	
	
	
	</div><!-- Connect About Div-->
	</div><!-- Left Profile Div  -->
	</div><!-- End of Content -->
	
	<span class="welcomeback"> Welcome back <?php echo $forename?></span>
<?php }?>
<?php include('includes/footer.php'); ?>