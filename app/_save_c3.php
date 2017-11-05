<?php
	session_start();
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	include ('_opener_db.php');	
	include ('sessions-listed.php');
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$category = 'other complaint';
	$details = clean($_POST['details']);		
	$userid = $user;
	$reg = $user;
	$coursename = substr("{$user}", 0, 3);
	
	//Input Validations
	
	$todayyear=date(Y);

		if ($details ==''){
		$errmsg_arr[] = 'complaint desription is missing';
		$errflag = true;
	}

//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _new_complains.php");
		exit();
	}
	//date
	$today = date("Y-m-d");
	//Create INSERT query
	$qry = "INSERT INTO complain (user,category,regno,course,datein,details) VALUES ('$userid','$category','$reg','$coursename','$today','$details')";
	
		$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
	$errmsg_arr[] = 'Complain succesfully added, please wait for your response';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _new_complains.php");
		exit();
	}

			
		header("location: _new_complains.php");
		exit();
	}else {
		die("Query failed, couldn't add the new record");
		header("location: _new_complains.php");
		exit();
	}
?>
