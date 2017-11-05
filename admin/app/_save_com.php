
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
	$userid = clean($_GET['author']);
	$tpid = clean($_GET['tpid']);
	//Input Validations
if ($body ==''){
		$errmsg_arr[] = 'comment desription is missing';
		$errflag = true;
	}

//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _add_com.php");
		exit();
	}
	//date
	$today = date("Y-m-d");

	
	//Create INSERT query
	$qry = "INSERT INTO comment (author,datein,body,tid) VALUES ('$userid','$today','$body','$tpid')";
	
		//$result = @mysql_query($qry);
		$result = $connector->query($qry);
	//Check whether the query was successful or not
	if($result) {
	$errmsg_arr[] = 'Comment succesfully added, Thanks for participating <br> Reload page to view your comment';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _add_com.php");
		exit();
	}
		header("location: _add_com.php");
		exit();
	}else {
		die("Query failed, couldn't add the new record");
		header("location: _add_com.php");
		exit();
	}
?>
