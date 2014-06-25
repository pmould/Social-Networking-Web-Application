<meta name="author" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script>

	function showUpdateLoc()
	{
		document.getElementById('modal3').style.display='block';
		document.getElementById('fade').style.display='block';
	}
	function showUploadPicture()
	{
		document.getElementById('modal2').style.display='block';
		document.getElementById('fade').style.display='block';

	}
	
	function empty(data)
	{
	  if(typeof(data) == 'number' || typeof(data) == 'boolean')
	  {
	    return false;
	  }
	  if(typeof(data) == 'undefined' || data === null)
	  {
	    return true;
	  }
	  if(typeof(data.length) != 'undefined')
	  {
	    return data.length == 0;
	  }
	  var count = 0;
	  for(var i in data)
	  {
	    if(data.hasOwnProperty(i))
	    {
	      count ++;
	    }
	  }
	 return count == 0;
		return true;
	}
</script>

<script>
	 function validateFields(){
		 //.options[this.selectedIndex].value
		 	//document.getElementById('test').innerHTML="W3Schools";
			 var x = document.getElementsByName("hometown")[0].value;
		

			 var e = document.getElementsByName("nationality")[0];
             var strUser = e.options[e.selectedIndex].value;
             var y1 = e.options[e.selectedIndex].value;
			 var z = document.getElementsByName("current_country")[0];
			 var z1 = z.options[z.selectedIndex].value;
			 var r = document.getElementsByName("current_city")[0];
			 var r2 = r.options[r.selectedIndex].value;
			 if(y1!=0)
			 document.getElementById('test').innerHTML="\'I am "+e.options[e.selectedIndex].text+"'";
			 else
				 document.getElementById('test').innerHTML="";
					 
 		if (!empty(x) && y1!=0 && z1!=0 && r2!=0)
 			{
	 			document.getElementsByName("updatesubmit")[0].removeAttribute("disabled");
 			}
		else
			{
	 			document.getElementsByName("updatesubmit")[0].setAttribute("disabled", "disabled");
			}	
 		
//   		if($('#test').text()  != "")
//  		{
 			   
//   			document.getElementsByClassName("modal")[0].style.height = "650px";
//   		}
//   		else
//   		{
//   			document.getElementsByClassName("modal")[0].style.height = "600px";
//   		}
	 } 	 	 
</script>
<script>
$(function()
		{
	//document.getElementById("modal").style.display = "block";
	
	
	
		});
</script>


<script>
$(function()
		{
			document.getElementsByName("updatesubmit")[0].setAttribute("disabled", "disabled");
			});
</script>	
<script>
$(function()
		{
	<?php if (!isset($_FILES['profilepic']))
	{ ?>
 	 			document.getElementsByName("nextsumbit")[0].setAttribute("disabled", "disabled");
 	 			//document.getElementsByName("updatesubmit")[0].setAttribute("disabled", "disabled");
 	 			
 	 			
	<?php }
	else 
	{
		?>
	
				document.getElementsByName("nextsumbit")[0].removeAttribute("disabled");
		<?php
		 
	}
	?>
		});
 	 </script>
<?php 
$uploadDir="uploads/$username";
?>
 
</head>
	<body>
	<?php
echo "SESSEION- LOG = ".$_SESSION['log'];
?>
<div id="modal" class="modal">
	<a onclick="document.getElementById('modal').style.display='none';document.getElementById('fade').style.display='none'"
    href="javascript:void(0)"><img id="close_button" src="/images/close_button.png"></a>
 <?php 
 include 'includes/defaultValues.php';
 ?>   
<?php 
include 'modal_profileInfoCont.php';
?>
</div>


<div id="modal2" class="modal">
	<a onclick="document.getElementById('modal2').style.display='none';document.getElementById('fade').style.display='none'"
    href="javascript:void(0)"><img id="close_button" src="/images/close_button.png"></a>
<?php 
include 'modal_profileInfoCont2.php';
?>
</div>


<div id="modal3" class="modal">
	<a onclick="document.getElementById('modal3').style.display='none';document.getElementById('fade').style.display='none'"
    href="javascript:void(0)"><img id="close_button" src="/images/close_button.png"></a> 
<?php 
include 'modal_updatelocation.php';
?>
</div>


<div id="modal3" class="modal">
	<a onclick="document.getElementById('modal3').style.display='none';document.getElementById('fade').style.display='none'"
    href="javascript:void(0)"><img id="close_button" src="/images/close_button.png"></a>
<?php 
//include 'modal_updateprofilepic.php';
?>
</div>

</div>
<div id="fade"></div>
		<div id="wrapper">
<?php include('/variables/variables.php'); ?>
<?php include('functions.inc.php'); ?>
<div id="header">
<div id="top-bar">
<span id ="heading-logo"><?php echo $heading ?></span>
<span id="headerbuttons">
<div id="locBtnCont">
<button onclick="showUpdateLoc()" href="javascript:void(0)" type="button" name="" value="" class="css3button">update location</button>
</div>
<a id ="logouttop" href=index.php?log=out>Log out</a>

</span>
 	<?php

 ?>    
    </div> <!-- end of top-bar-->

<div id="nav">	
</div> <!-- end #nav -->
	<div id="nav-user">
	<a href="./userhomepage.php">Home</a>
	<a href="#">Profile</a>
	<a href="#">Pictures</a>
	<a href="#">Community</a>
	<a href="./account.php">Account</a>
	<a id ="location" href="./friendsmap.php" href="">Friends Map</a>
	
</div>


</div> <!-- end #header -->
<div id="main-content">

