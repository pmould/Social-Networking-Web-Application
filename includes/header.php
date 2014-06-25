<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
</head>
	<body>

		<div id="wrapper">
<?php include('variables/variables.php'); ?>
<?php include('includes/functions.inc.php'); ?>
<div id="header">
<div id="top-bar">
<span id ="heading-logo"><?php echo $heading ?>
<a id="headinglink" href="index.php"><span ></span></a>
</span>

 	<?php
	session_start();
	
	 if(!loggedin()){ ?>
    	<div id="headerlogin">

<form name="login" action="Userpassword.php" method="post">

<span>Username
<input name="usernamelogin" type="text" value ="<?php $usernamelogin;?>"></span>
<span>Password
<input name="passwordlogin" type="password" value ="<?php $pwordlogin;?>"></span>
<span><input name="loginsubmit" type="submit" value ="Log in"></span>
</form>
</div>

   
    <?php
	}
	else 
	{
		echo "<span id=\"headerbuttons\"><a id =\"logouttop\" href=?log=out>Log out</a></span>";
	}
	?>


    </div> <!-- end of top-bar-->

<div id="nav">


	<a href="http://www.myvisionafrica.co.nf" target ="_blank">My Vision Africa</a>
	<a href="http://paulmould.co.nf" target="_blank">About the Creator</a>
	<a href="#" target ="_blank">About Us</a>
	<a href="#">Media</a>
	<a class="logintab" href="userpassword.php">Sign Up</a>
	<a class="logintab" href="loginpage.php">Log in</a>
	
	<?php 
	
	//checking if a log SESSION VARIABLE has been set
	if( !isset($_SESSION['log']) || ($_SESSION['log'] != 'in') ){
		//if the user is not allowed, display a message and a link to go back to login page
// 		echo "You are not allowed. <a href=UserPassword.php>back to login page</a>";
	
// 		//then abort the script
// 		exit();
	}
	####  CODE FOR LOG OUT ####
	if(isset($_GET['log']) && ($_GET['log']=='out')){
	//if the user logged out, delete any SESSION variables
	destroy_session_and_data();
	header('location:index.php'); exit();

	}//end log out

	?>
	
</div> <!-- end #nav -->



<?php 
if (loggedin())
{
	?>
<!-- 	
	<div id="nav-user">
	<a href="userhomepage.php">Home</a>
	<a href="profile.php">Profile</a>
	<a href="pictures.php">Pictures</a>
	<a href="members.php">Members</a>
	<a href="account.php">Account</a>
</div> -->
<?php
}   ?>

</div> <!-- end #header -->
<div id="main-content">
<div class="contenthead">