<?php require 'connection_sessions.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>Friends Map | Kingdom Connect</title>
<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript">	
  function initialize() {

	  //Varibles for getting array from php @countries @cities
	  var countries = new Array();
	  var cities = new Array();
	  var url = 'getnames.php';
	  var whereString;
	  $.getJSON(url, function(data) {
	       $.each(data, function(index, data) {
	       	countries.push(data.current_country);
	       	cities.push(data.current_city);  
	       	  	
	  }); 	
			if(countries.length ==1)
			{
	        	whereString ="col2 = ";
			}
	        else
	        {
	        	whereString ="col2 in (";
	        }
		     
	       for(i=0;i<countries.length;i++)
	       {
	       	 whereString = whereString.concat("'");
	       	
	       	whereString = whereString.concat(countries[i]);
	       	//document.write('Countries: ', countries[i],"<br>");
	       	if (i < (countries.length-1))
	       	{	
		       	
	       		whereString = whereString.concat("', ");
	       	}
	       	
	       	else
	       	{
// 	       		document.write(i);
// 	       		document.write(countries.length-1);
				if(countries.length ==1)
				{
					whereString = whereString.concat("'");
				}
		        else
		        {
		        	whereString = whereString.concat("')");
		        }
	       		
	       	}
	       }
	       
			if(cities.length ==1)
			{  
	        	whereString +=" and col1 = ";
			}
	        else
	        {
	        	whereString +=" and col1 in (";
	        }
	        
	       for(i=0;i<countries.length;i++)
	       {	
	    	   whereString = whereString.concat("'");
	       		whereString = whereString.concat(cities[i]);
	       	if (i < (cities.length-1))
	       	{	
	       		whereString = whereString.concat("\x27, ");
	       	}
	       	else
	       	{
				if(countries.length ==1)
				{
					whereString = whereString.concat("'");
				}
		        else
		        {
		        	whereString = whereString.concat("')");
		        }
	       	}
	       	//document.write('Cities: ', cities[i],"<br>");
	       	//document.write('where(',i,')', whereString);
	       } 
	      	//document.write('whereALL: ', whereString,"<br>");
	      //where: "col2 in (\x27Albania\x27, \x27United States\x27) and col1 \x3d \x27Atlanta\x27"

	       google.maps.visualRefresh = true;
	       var isMobile = (navigator.userAgent.toLowerCase().indexOf('android') > -1) ||
	         (navigator.userAgent.match(/(iPod|iPhone|iPad|BlackBerry|Windows Phone|iemobile)/));
	       if (isMobile) {
	         var viewport = document.querySelector("meta[name=viewport]");
	         viewport.setAttribute('content', 'initial-scale=1.0, user-scalable=no');
	       }
	       var styles = 
	       	[
	       	  {
	       	    "stylers": [
	       	      { "hue": "#cead00" },
	       	      { "saturation": 25 },
	       	      { "lightness": -53 }
	       	    ]
	       	  }
	       	];
	       var mapDiv = document.getElementById('googft-mapCanvas');
	       mapDiv.style.width = isMobile ? '100%' : '1024px';
	       mapDiv.style.height = isMobile ? '100%' : '400px';
	       var map = new google.maps.Map(mapDiv, {
	         //center: new google.maps.LatLng(1.8250847331460742, 0.1114370607122055),
	         center: new google.maps.LatLng(11,3),
	         zoom: 2,
	         mapTypeId: google.maps.MapTypeId.ROADMAP,
	         backgroundColor: '#cead00',
	         disableDefaultUI:true,
	         disableDoubleClickZoom:true,
	         draggable: false,
	         keyboardShortcuts:false,
	         mapMaker:false,
	         mapTypeControl:false,
	         scrollwheel:false,
	         	 styles: styles  
	         
	       });
	       layer = new google.maps.FusionTablesLayer({
		       
	         map: map,
	         heatmap: { enabled: false },
	         query: {
	           select: "col3",
	           from: "1gY2eBCpN0ZhKtFLzsJndijnpWg6KK5-kBXLGYHKj",
	           where: whereString 
	        	//   "col2 in ('Bahamas', 'United States') and col1 in ('Abidjan', 'Atlanta')"
	         },
	         options: {
	           styleId: 2,
	           templateId: 2
	         }
	       });
	       


			

	       
	  });


    if (isMobile) {
      var legend = document.getElementById('googft-legend');
      var legendOpenButton = document.getElementById('googft-legend-open');
      var legendCloseButton = document.getElementById('googft-legend-close');
      legend.style.display = 'none';
      legendOpenButton.style.display = 'block';
      legendCloseButton.style.display = 'block';
      legendOpenButton.onclick = function() {
        legend.style.display = 'block';
        legendOpenButton.style.display = 'none';
      }
      legendCloseButton.onclick = function() {
        legend.style.display = 'none';
        legendOpenButton.style.display = 'block';
      }
    }
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!-- PHP CODE   -->
<?php
include('includes/headeruser.php'); 
$actionurl = "friendsmap.php";
?>
<?php
?>

<?php 
//checking if a log SESSION VARIABLE has been set
if( !loggedin() ){
	//if the user is not allowed, display a message and a link to go back to login page
	echo "You are not allowed. <a href=login.php>back to login page</a>";

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

	<!-- HTML CODE  -->
<div class="content">
<h1 class="textcenter maptext">Friend's Map</h1>
<div id="googft-mapCanvas" class="margincenter"></div>
<h1 class="textcenter kingdomtextcolor">Table of Friends</h1>
<table id="friendsmaptable" class=" margincenter homefieldstable">
  <thead>
   <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Current Country</th>
    <th>Current City</th>
   </tr>
  </thead>
  <tbody id="tablebody">
  </tbody>
 </table>
</div> <!-- End of Content  -->
<!-- <div id="where"> -->

<!-- </div> -->

	<?php } ?>

<script type="text/javascript">
  $(document).ready(function(){
		
   var url = 'getnames.php';
      $.getJSON(url, function(data) {
          $.each(data, function(index, data) {
           $('#tablebody').append('<tr>');
       $('#tablebody').append('<td>'+data.forename+'</td>');
       $('#tablebody').append('<td>'+data.surname+'</td>');
       $('#tablebody').append('<td>'+data.current_country+'</td>');
       $('#tablebody').append('<td>'+data.current_city+'</td>');
       $('#tablebody').append('</tr>');
    });
 
   });
                    });
              

               
</script>
<?php include('includes/footer.php'); ?>





