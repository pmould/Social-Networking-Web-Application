
<?php


//Connect to database
// require_once 'login.php';

 $link = mysqli_connect($db_hostname,$db_username,$db_password,$db_database) or die("Error " . mysqli_connect_error());
// 	@session_start();
 	$uploadDir="uploads/\$username"; 	
	if(isset($_POST['nextsumbit']))
	{
		?>
						<script>
				$(function()
						{
							$("#modal").hide();
							 $("#modal2").hide(); 
							$("#fade").hide();
	});
						</script>
						<?php
						rename("$uploadDir/preview","$uploadDir/$username");
						echo $username;
						$_SESSION['profilepic'] = $username;
						
	}


//CHECKING INPUT ERRORS AND SAVING FORM VARIABLES
if (isset($_POST["sumbitpic"]))
{	
	//echo "\$uploadDir: $uploadDir <br>";
	if (isset($_FILES['profilepic']))
	{
		?>
								<script>
						$(function()
								{
									$("#modal").hide();
									 $("#modal2").show(); 
									$("#fade").show();
								});
								</script>
								<?php
			
		$errors     = array();
		$maxsize    = 2097152;
		$acceptable = array(
				'application/pdf',
				'image/jpeg',
				'image/jpg',
				'image/gif',
				'image/png'
		);
		
		if(($_FILES['profilepic']['size'] >= $maxsize) || ($_FILES["profilepic"]["size"] == 0)) {
			$errors[] = 'File too large. File must be less than 2 megabytes.';
		}
		
		if(!in_array($_FILES['profilepic']['type'], $acceptable) && (!empty($_FILES["profilepic"]["type"]))) {
			$errors[] = 'Invalid file type. Only PDF, JPG, GIF and PNG types are accepted.';
		}
		
		// 	if(count($errors) === 0) {
		// 		move_uploaded_file($_FILES['uploaded_file']['tmpname'], '/store/to/location.file');
		// 	} else {
		// 		foreach($errors as $error) {
		// 			echo '<script>alert("'.$error.'");</script>';
		// 		}
		
		
		
		//echo "Upload Folder:$uploadDir<br>";
		if(!file_exists($uploadDir))
		{
			mkdir($uploadDir, 0777, true);
			chmod('uploads', 0777);
			chmod("uploads/\$username", 0777);
		}
	
		$name = $_FILES['profilepic']['name'];
		//echo "File Name:$name<br>";
		
		//echo "name of profile pic: $name";
		//echo "\$name: $name<br>";
		move_uploaded_file($_FILES['profilepic']['tmp_name'],"$uploadDir/preview");
		$previewphoto = true;
	//	echo "\$_FILES[\'profilepic\']['tmp_name']: ";
	//	echo $_FILES['profilepic']['tmp_name'];
	//	echo "<br>";
	//	echo "\$uploadDir\$name: $uploadDir\$name <br>";
	}
	else
	{
	?>
	<script type="text/javascript">
<!--

//-->
</script>
	<?php 
	}

	


	if(!empty($errorMessage))
	{
		echo("<p>There was an error with your form:</p>\n");
		echo("<ul>" . $errorMessage . "</ul>\n");
	}

	//Querying a database to Insert the salted username and password into the database

	
		echo "<p class=alerts>Thanks for completing this section of the sign up process</p>";

	$query = "UPDATE users
			 SET profile_picture='$name', hometown = '$hometown'
			 WHERE username = '$username'";
	$result = mysqli_query($link, $query);
	if (!$result) die ("Database access failed: " . mysqli_error($link));

	}
?>
<div class="modalContent">
<h1 >Update Profile Picture </h1>
<div id="profilethumb">
 
	<script>
	$(function()
			{
		//Show change profile picture screen

	<?php 
	if (isset($_POST["deletephoto"]) ==true)
	{?>
	var x = confirm("Are you sure you want to delete the current Profile Picture")
// 			$("#modal").hide();
// 		 $("#modal2").show(); 
// 		$("#fade").show();
	if(x==true)
	{
// 		$("#modal").hide();
// 		 $("#modal2").show(); 
// 		$("#fade").show();
		var variableToSend = 'yes';
		$.post('userhomepage.php', {variable: variableToSend});
		location.reload();
		}
	else
	{
	$("#modal").hide();
	 $("#modal2").show(); 
	$("#fade").show();

	}
	<?php } ?>

	}); </script>

	<script>
	$(function()
	{
		<?php 
		if(isset($_POST["variable"]))
		{
			$_SESSION['profilepic']= null;
			unlink("$uploadDir/$username");
		
			//$showProfileModal = true;
			?>	
		location.reload();
		location.reload();
		location.reload();
 		$("#modal").hide();
 		 $("#modal2").show(); 
 		$("#fade").show();
			
	<?php }?>
	
	}); </script>
	
<?php 

if (isset($_FILES['profilepic']) && $_FILES['profilepic']['name'] != "")
{
	
	echo "<img alt='profile picture\' src=\"$uploadDir\preview\">";
	$_FILES['profilepic']['name'] = "";
}
else
{
	if(empty($_SESSION['profilepic']) && !file_exists("$uploadDir/$username") )
	echo "<img alt=\"profile picture\" src=\"images/defaultthumbpic.jpg\">";
	else
	{
		echo "<img alt='profile picture\' src=\"$uploadDir/$username\">";
	}
}

?>

</div>
<h1 id="test" ></h1>
<p><?php echo @$forename ?>,</p>
<p><span> Update your Profile picture by either:
<ul>
<li>Uploading your Profile Picture</li>
<li>Previewing the Picture</li>
<li>Saving the Picture</li>
<li> Or choose to have a profile picture</li>
</ul>

</span></p>
<p><span><?php echo "$forename $surname" ?>, please upload your Profile Picture:</span></p>
</article>
<div id="profile_fields2">



<form action="userhomepage.php" method="POST" enctype="multipart/form-data">
<p>
 <input type="file" onclick="validateF2()" name="profilepic" class="uploadbutton"></input></p>
 
 <p> <input class="updateButtons" onblur="validateF2()" onclick="validateF2()" name="sumbitpic" type="submit" value="Preview"></p>
<p><input id="next" type="submit" value="Save" name="nextsumbit"></p>
<p><input id="next" type="submit" value="Resest to Default" name="deletephoto"></p>

</form>

</div> <!-- Profile Select  -->
</div><!-- Update box  -->
