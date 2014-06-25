<?php require 'connection_sessions.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>Your Account | Kingdom Connect</title>
<?php 
$actionurl = "account.php";
 ?>
<?php include('includes/headeruser.php'); 
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
	<div class = content>
	<article>
	<h1>Update Profile Picture <span style="color:grey"><i>(<?php echo $username?>)</i></span></h1>
	<ul>
		<li><a onclick="showUploadPicture()" href="#">Update Profile Picture</a></li>
		<li><a href="#">Change Password</a></li>
	</ul>
	</article>
	</div>
	<?php } ?>


<?php include('includes/footer.php'); ?>