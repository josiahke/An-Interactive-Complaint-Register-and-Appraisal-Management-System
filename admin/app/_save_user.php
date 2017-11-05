<?php
	session_start();
	//Array to store validation errors
	$errmsg_arr = array();
	

	//Include database connection details
	include ("_opener_db.php");
	include ("_enc_dec.php");
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
	
	//Sanitize the POST values
	$names = clean($_POST['fullnames']);
	$password1 = clean($_POST['password1']);
	$cpassword = clean($_POST['password2']);
	$regno = clean($_POST['regno']);
	$emailc = clean($_POST['emailc']);
	$word1 = clean($_POST['word1']);
	$word2 = clean($_POST['word2']);
	$gender = clean($_POST['gender']);
	//Input Validations
	
	if($regno == '') {
		$errmsg_arr[] = 'gender field is missing';
		$errflag = true;
	}
	if($gender == '') {
		$errmsg_arr[] = 'gender field is missing';
		$errflag = true;
	}
	if($emailc == '') {
		$errmsg_arr[] = 'email field is missing';
		$errflag = true;
	}
	if($word1 == '') {
		$errmsg_arr[] = 'security word field is missing';
		$errflag = true;
	}
	if($word2 == '') {
		$errmsg_arr[] = 'security word field is missing';
		$errflag = true;
	}	
	
		
	if( strcmp($password1, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	if( strlen($password1) <= 3 ) {
		$errmsg_arr[] = 'Password should more than three characters long';
		$errflag = true;
	}
	if( strcmp($word1, $word2) != 0 ) {
			} else {
		$errmsg_arr[] = 'enter different security words';
		$errflag = true;
		}

//Check for duplicate login ID
	if($regno!= '') {
		$qry1 = "SELECT * FROM user WHERE regno='$regno'";
		$result1 = $connector->query($qry1);
		if($result1) {
			if(mysql_num_rows($result1) > 0) {
				$errmsg_arr[] = 'username is already in use, please select another one';
				$errflag = true;
			}
			@mysql_free_result($result1);
		}
		else {
			die("Query failed, couldn't verify duplicate username on the database");
		}
	}
//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _signup.php");
		exit();
	}
	
	//encrypt password 
	$encpass=enc($password1);
	$encwd1=enc($word1);
	$encwd2=enc($word2);
	//date
	$today = date("Y-m-d");
	//others
	$cat='admin';
	$pic='uploads/default.gif';
	//Create INSERT query
	$qry2 = "INSERT INTO user (names,password,regno,gender,email,word1,word2,datein,lastedit,cat,picture) VALUES ('$names','$encpass','$regno','$gender','$emailc','$encwd1','$encwd2','$today','$today','$cat','$pic')";
	
		//$result = @mysql_query($qry);
	$result2 = $connector->query($qry2);
	//Check whether the query was successful or not
	if($result2) {
	$errmsg_arr[] = 'Success,User created You can now log-in';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _signup.php");
		exit();
	}

			
		header("location: _signup.php");
		exit();
	}else {
		die("Query failed");
		header("location: _signup.php");
		exit();
	}
?>