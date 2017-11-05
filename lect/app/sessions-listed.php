
<?php

error_reporting();
	//=$_SESSION['cramis_user_is']['username'];
	$msee=$_SESSION['cramis_sys_lect']['jinamsee'];
	//$_SESSION['cramis_sys']['mseerd'] =enc($rd);
	
if (empty($msee)) {
		@session_unregister('cramis_sys_lect');
		@session_unset();
		//session_destroy(); 
require('redirect.php');
exit;
}
$user =  $msee;
if (!$user) { 
		@session_unregister('cramis_sys_lect');
		@session_unset();
		//session_destroy(); 
require('redirect.php');
exit;
}
?>