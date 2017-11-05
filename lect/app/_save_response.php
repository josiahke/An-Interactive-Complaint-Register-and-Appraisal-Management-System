<?php
session_start();
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	include '_opener_db.php';
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$body = clean($_POST['body']);		
	$userid = clean($_GET['userid']);
	$cid=clean($_GET['cid']);
	
	//Input Validations
if ($body ==''){
		$errmsg_arr[] = 'response desription is missing';
		$errflag = true;
	}
if ($cid ==''){
		$errmsg_arr[] = 'select complain to respond to';
		$errflag = true;
	}
// check for duplicate

if($body!= '') {
		$qry = "SELECT * FROM response WHERE cid='$cid'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = ' this complain had previously been responded to, select another Compliant';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed, couldn't verify duplicate username on the database");
		}
	}
//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: response.php?id=$cid'");
		exit();
	}
	//date
	$today = date("Y-m-d");

	
	//Create INSERT query
	$qry = "INSERT INTO response (author,datein,body,cid) VALUES ('$userid','$today','$body','$cid')";
	
		//$result = @mysql_query($qry);
		$result = $connector->query($qry);
		
	//Check whether the query was successful or not
	if($result) {
	$errmsg_arr[] = 'Response succesfully sent';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: response.php?id=$cid");
		exit();
	}
		header("location: response.php?id=$cid");
		exit();
	}else {
		die("Query failed, couldn't add the new record");
		header("location: response.php?id=$cid");
		exit();
	}
?>
