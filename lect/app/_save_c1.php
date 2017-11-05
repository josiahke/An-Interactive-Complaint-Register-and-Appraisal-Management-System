<?php
	session_start();
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//db
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
	$category = 'result complaint';
	$lectname = clean($_POST['lectname']);
	$examth = clean($_POST['exammonth']);
	$examyr = clean($_POST['examyear']);
	$markscat= clean($_POST['marks']);
	$coursecode = clean($_POST['coursecode']);	
	$year = substr("{$coursecode}", 2, 1);
	$sem = substr("{$coursecode}", 3, 1);
	$reg = $user;
	$coursename =clean($_POST['course']);
	
	//Input Validations
	
	$todayyear=date(Y);
	
	if($lectname == '') {
		$errmsg_arr[] = 'lecturer name field is  missing';
		$errflag = true;
	}
	if($coursecode == '') {
		$errmsg_arr[] = 'course code field is missing';
		$errflag = true;
	}
	if ($examyr > $todayyear) {
		$errmsg_arr[] = 'you cant have complaint in the future, select previous exams';
		$errflag = true;
	}
	if ($examyr == '' ) {
		$errmsg_arr[] = 'exam year field is missing';
		$errflag = true;
	}
	
	if($examth == '') {
		$errmsg_arr[] = 'exam month field is missing';
		$errflag = true;
	}
	if ($markscat == '') {
		$errmsg_arr[] = 'marks field is missing';
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
	
//Check for duplicate complaint
if($userid!= '') {
		$qry = "SELECT * FROM complain WHERE regno='$reg' and xyear='$examyr' and xmonth='$examth' and cunit='$coursecode' and category='$category'";
		//$result = mysql_query($qry);
		$result = $connector->query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = ' Complain already exists, please wait for your response';
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
		header("location: _new_complains.php");
		exit();
	}
	//date
	$today = date("Y-m-d");
	//Create INSERT query
$qry = "INSERT INTO complain (user,category,regno,course,cunit,datein,lecturer,year,sem,xmonth,xyear,markscat) VALUES ('$user','$category','$reg','$coursename','$coursecode','$today','$lectname','$year','$sem','$examth','$examyr','$markscat')";
	
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

			
		header("location: new_complains.php");
		exit();
	}else {
		die("Query failed, couldnt add the new record");
		header("location: _new_complains.php");
		exit();
	}
?>