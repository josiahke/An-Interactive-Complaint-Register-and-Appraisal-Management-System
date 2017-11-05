<?php
	session_start();
	//Array to store validation errors
	$errmsg_arr = array();
	

	//Include database connection details
	include ("_opener_db.php");
	include ("_enc_dec.php");
	include ("sessions-listed.php");
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
	$dob= clean($_POST['dob']);
	$tel = clean($_POST['tel']);
	$faculty = clean($_POST['faculty']);
	$course = clean($_POST['course']);
	$doe = clean($_POST['doe']);
	$moe = clean($_POST['moe']);
	
	
//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _view_prof.php");
		exit();
	}
	
	
	//date
	$today = date("Y-m-d");

	//Create INSERT query
	//$qry2 = "INSERT INTO user (names,password,regno,gender,email,word1,word2,datein,lastedit,cat,picture) VALUES ('$names','$encpass','$regno','$gender','$emailc','$encwd1','$encwd2','$today','$today','$cat','$pic')";
	$qry2="update user SET dob='$dob',tel='$tel',faculty='$faculty',course='$course',doe='$doe',moe='$moe',lastedit='$today' where regno='$user'";

		//$result = @mysql_query($qry);
	$result2 = $connector->query($qry2);
	//Check whether the query was successful or not
	if($result2) {
	$errmsg_arr[] = 'Successfull,User profile updated';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _view_prof.php");
		exit();
	}

			
		header("location: _view_prof.php");
		exit();
	}else {
		die("Query failed");
		header("location: _view_prof.php");
		exit();
	}
?>