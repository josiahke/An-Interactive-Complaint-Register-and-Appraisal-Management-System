
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
	$vote = clean($_POST['vote']);		
	$userid = clean($_GET['voter']);
	$poll = clean($_GET['pollid']);
	$lect=clean($_GET['lectid']);
	
	//Input Validations
if ($vote ==''){
		$errmsg_arr[] = 'vote is missing';
		$errflag = true;
	}
if ($poll ==''){
		$errmsg_arr[] = 'select poll to respond to';
		$errflag = true;
	}
if ($userid ==''){
		$errmsg_arr[] = 'username of voter is missing';
		$errflag = true;
	}
if ($lect ==''){
		$errmsg_arr[] = 'select lecturer to vote for';
		$errflag = true;
	}		
// check for duplicate
if($vote!= '') {
		$qry = "SELECT * FROM vote WHERE pid='$poll' and userid='$userid' and 

lectid='$lect'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = ' you have already voted for this poll';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed, couldn't verify duplicate  on the database");
		}
	}

//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _open_lect.php?id=$lect");
		exit();
	}
	//date
	$today = date("Y-m-d");
	//Create INSERT query
	$qry = "INSERT INTO vote (pid,userid,vote,lectid,datein) VALUES ('$poll','$userid','$vote','$lect','$today')";
	
		//$result = @mysql_query($qry);
	$result = $connector->query($qry);
	
	//Check whether the query was successful or not
	if($result) {
	$errmsg_arr[] = 'vote succesfully sent';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: _open_lect.php?id=$lect");
		exit();
	}
		header("location: _open_lect.php?id=$lect");
		exit();
	}else {
		die("Query failed, couldn't add the new record");
		header("location: _open_lect.php?id=$lect");
		exit();
	}
?>
