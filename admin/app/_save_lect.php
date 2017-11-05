<?php
	session_start();

	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	include '_opener_db.php';
	include '_enc_dec.php';
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$names = clean($_POST['names']);
	$username = clean($_POST['username']);
	$edu = clean($_POST['edu']);
	$exp= clean($_POST['exp']);
	$gender = clean($_POST['gender']);
	$tel = clean($_POST['tel']);
	$emailcontact = clean($_POST['emailcontact']);

	//Input Validations
	if($emailcontact == '') {
		$errmsg_arr[] = 'email field is missing';
		$errflag = true;
	}
	if($tel == '') {
		$errmsg_arr[] = 'telephone field is missing';
		$errflag = true;
	}
	if($exp == '') {
		$errmsg_arr[] = 'experience field is missing';
		$errflag = true;
	}
	if($edu == '') {
		$errmsg_arr[] = 'education field is missing';
		$errflag = true;
	}
	if($gender == '') {
		$errmsg_arr[] = 'gender field is missing';
		$errflag = true;
	}
	if($names == '') {
		$errmsg_arr[] = 'names field is missing';
		$errflag = true;
	}
	if($username == '') {
		$errmsg_arr[] = 'username field is missing';
		$errflag = true;
	}

//Check for duplicate login ID
	if($username!= '') {
		$qry = "SELECT * FROM lecturer WHERE username='$username'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = ' username is already in use, please select another one';
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
		header("location: _view_lect.php");
		exit();
	}
	
	//encrypt password 
	$encpass=enc("456456");

	//date
	$today = date("Y-m-d");
	//others
	$pic='uploads/default.gif';
	//Create INSERT query
	$qry = "INSERT INTO lecturer(names,username,password,experience,education,gender,tel,email,picture,datein,lastedit) VALUES ('$names','$username','$encpass','$exp','$edu','$gender','$tel','$emailcontact','$pic','$today','$today')";
	
		$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
	$errmsg_arr[] = 'Lecturer User profile  created Successfully';
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
		die("Query failed, couldnt create the new record");
		header("location: _view_lect.php");
		exit();
	}
?>


