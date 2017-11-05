
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
	$category = 'lecturer complaint';
	$lectname = clean($_POST['lectname']);
	$coursecode = clean($_POST['coursecode']);	
	$year = substr("{$coursecode}", 2, 1);
	$sem = substr("{$coursecode}", 3, 1);
	$roomno = clean($_POST['roomno']);
	$details = clean($_POST['details']);		
	$userid = $user;
	$reg = $user;
	$coursename=clean($_POST['course']);
	//Input Validations
	
	$todayyear=date(Y);
	
	if($coursecode == '') {
		$errmsg_arr[] = 'course unit code field is  missing';
		$errflag = true;
	}	
	if($lectname == '') {
		$errmsg_arr[] = 'lecturer name field is  missing';
		$errflag = true;
	}
	
	if ($year == ''){
		$errmsg_arr[] = 'year field is missing';
		$errflag = true;
	}
	if ($sem ==''){
		$errmsg_arr[] = 'semester field is missing';
		$errflag = true;
	}
	
		if ($details=='' ) {
		$errmsg_arr[] = 'desription of the complaint is missing';
		$errflag = true;
	}
//Check for duplicate complaint
	if($userid!= '') {
	$qry = "SELECT * FROM complain WHERE year='$year' and sem='$sem' and cunit='$coursecode' and category='$category'";
		//$result = mysql_query($qry);
		$result = $connector->query($qry);
		if($result) {
		if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'these complaint already exists, please wait for a response';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed, couldn't verify duplicate record");
		}
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
	$qry = "INSERT INTO complain (user,category,regno,course,cunit,datein,lecturer,year,sem,room,details) VALUES ('$userid','$category','$reg','$coursename','$coursecode','$today','$lectname','$year','$sem','$roomno','$details')";
	
		//$result = @mysql_query($qry);
	$result = $connector->query($qry);
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

