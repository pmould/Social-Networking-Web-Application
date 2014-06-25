<?php
function loggedin() {
	

	
	if( (isset($_SESSION['log'])) &&   ($_SESSION['log'] == 'in')    )
	{
		return true;
	}
	else
	{
		return false;
	}

}

function destroy_session_and_data()
{
	$_SESSION = array();

	// if (session_id() != "" || isset($_COOKIE[session_name()]))
	//           The above line appears in the book but is not
	//           actually required and should be ignored

	setcookie(session_name(), '', time() - 2592000, '/');
	session_destroy();
}

function makedirectories($directories)
{
	
}


?>