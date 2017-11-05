
<?php
	session_start();
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	include '_opener_db.php';
	include 'sessions-listed.php';
	
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
	$c1 = clean($_POST['choice1']);	
	$c2 = clean($_POST['choice2']);	
	$c3 = clean($_POST['choice3']);	
	$c4 = clean($_POST['choice4']);	
	$cat = 'lecturer polls';	
	$userid = clean($_GET['userid']);
	
	//Input Validations
if ($body ==''){
		$errmsg_arr[] = 'Topics desription is missing';
		$errflag = true;
	}
if ($c1 ==''){
		$errmsg_arr[] = 'choice one desription is missing';
		$errflag = true;
	}
if ($c2 ==''){
		$errmsg_arr[] = 'choice two desription is missing';
		$errflag = true;
	}	
	
//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _view_lect.php");
		exit();
	}
	//date
	$today = date("Y-m-d");
	
	//Create INSERT query
	$qry = "INSERT INTO poll (author,datein,topic,choice1,choice2,choice3,choice4,category) VALUES ('$user','$today','$body','$c1','$c2','$c3','$c4','$cat')";
	
		$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
	$errmsg_arr[] = 'Poll succesfully added';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _view_lect.php");
		exit();
	}
		header("location: _view_lect.php");
		exit();
	}else {
		die("Query failed, couldn't add the new record");
		header("location: _view_lect.php");
		exit();
	}
?>
