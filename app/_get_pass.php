<?php
	
	session_start();
	
	//Include database connection details
	include("_opener_db.php"); 
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	
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
	$w1 = clean($_POST['word1']);
	$w2 = clean($_POST['word2']);
	
	//Input Validations
	if($jinamsee == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($w1 == '') {
		$errmsg_arr[] = 'security word 1  missing';
		$errflag = true;
	}
	if ($w2 != '') {
		$errmsg_arr[] = 'security word 1  missing';
		$errflag = true;
	}
		
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _forgot.php");
		exit();
	}
	//un-encrypt password
		 include('_enc_dec.php');
		 $encw1=enc($w1);
		 $encw2=enc($w2);
   
	 //login query
	$qry = "SELECT * FROM user  WHERE regno='$jinamsee' and word1='$encw1' and word2='$encw2'";

	$result = $connector->query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) > 0) {
		   while($data = mysql_fetch_assoc($result))
			{ $pswd=$data['password'];
			  $errmsg_arr[] = 'Your password is'. dec($pswd);
			  $errflag = true;
			}

		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _forgot.php");
		exit(); 
		}
		
		}
		else {
			//Login failed
			//header("location: accessdenied.php");
			//exit();
		$errmsg_arr[] = 'Enter correct user details';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _forgot.php");
		exit();
	}
		}
	}else {
		die("Query failed, couldnt complete the query");

	}
		
		mysql_close();

?>