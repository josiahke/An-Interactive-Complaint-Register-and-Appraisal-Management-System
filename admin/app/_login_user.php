<?php
	
	session_start();
	
	//Include database connection details
	include("_opener_db.php"); 
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//action=+new
	if (isset($_GET["action"]) && ($_GET["action"] != "login")) {
		$errmsg_arr[] = 'invalid request ';
		$errflag = true;
		
	}
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//sanitize post values
	$jinamsee = clean($_POST['username']);
	$keymsee = clean($_POST['password']);
	$mseecaptcha=clean($_POST['captcha']);
	
	//Input Validations
	if($jinamsee == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($keymsee == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if ($mseecaptcha != $_SESSION['efile_captcha']) {
		$errmsg_arr[] = 'captcha code is missing or incorrect';
		$errflag = true;
	}
		
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ../index.php");
		exit();
	}
	//un-encrypt password
		 include('_enc_dec.php');
		 $enc_mseekey=enc($keymsee);
		 
   //random no
  		 include('_random_key_mgr.php');
		 $rd=generatePassword ('12','3');
	
	 //login query
	$qry = "SELECT * FROM user  WHERE regno='$jinamsee' AND password='$enc_mseekey' AND cat='admin'";

	$result = $connector->query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
		
			session_register('cramis_sys_admin');
			$_SESSION['cramis_sys_admin']['jinamsee'] = $jinamsee;
			$_SESSION['cramis_sys_admin']['mseerd'] =enc($rd);
			$_SESSION['cramis_in_admin'] = true;
			$session = "1";
			session_write_close();
			header("location: index.php");
			exit();
		}
		else {
			//Login failed
			//header("location: accessdenied.php");
			//exit();
		$errmsg_arr[] = 'Enter correct login details';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: ../index.php");
		exit();
	}
		}
	}else {
		die("Query failed, couldnt complete the query");

	}
		
		mysql_close();

?>