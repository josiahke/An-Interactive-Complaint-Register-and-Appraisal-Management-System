<?php
	session_start();
	//Include database connection details
	require("_opener_db.php");
	
	//valid sessions
	require 'sessions-listed.php';	
	
	//Array to store validation errors
	$errmsg_arr = array();
	
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
	
	
	//upload area

	$njia ="uploads/";	
	
	//valid formats
	    $valid_formats = array("jpg","bmp","jpeg","png");
	
	
//If there are input validations, redirect back to the registration form
	if($errflag) {
		
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_regenerate_id ();
		session_write_close();
		header("location: pic.php");
		exit();
	}
	
		//date
		$today = date("Y-m-d");
	
		//handle file
		$filename = $_FILES['pic']['name'];
		$njia2= $njia. basename( $_FILES['pic']['name']);
		
		if(strlen($filename))
			{
  				 list($txt, $ext) = explode(".", $filename);
  				 if(in_array($ext,$valid_formats)&& $_FILES['pic']['size'] <= 1048576*5)
			{
		if(move_uploaded_file($_FILES['pic']['tmp_name'], $njia2)) {
        //$new_name = $njia.time().".jpg";
                     
	 //Create update query
		$qry2 = "update user SET picture='$njia2',lastedit='$today' where regno='$user'";
			
	    $result2 = $connector->query($qry2);
	//Check whether the query was successful or not
	if($result2) {
		$errmsg_arr[] = 'file '.$filename.' uploaded Successfully!';
		$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_regenerate_id ();
		session_write_close();
		header("location: pic.php");
		exit();
	}

			
		header("location: pic.php");
		exit();
	}else {
		die("Query failed, couldnt add the record");
		header("location: pic.php");
		exit();
	}
	
   
    }
		}
	else
	//$msg="File size Max 5mb or Invalid file format supports .jpg and .bmp";
	$errmsg_arr[] = "File size May be bigger than 5MB or Invalid file format. <br> supported file formats include jpg,bmp,jpeg, pdf,doc, docx,xls,xlsx,tiff,png,txt";
	$errflag = true;
		if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
			header("location: pic.php");
			exit(); }
	}
	
		
	mysql_close();
?>


