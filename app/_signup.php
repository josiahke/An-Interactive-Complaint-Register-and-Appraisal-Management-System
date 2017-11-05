<?php
session_start();
session_regenerate_id();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--js -->
<script src="js/jquery-1.7.1.min.js" type="text/javascript" ></script>
<script src="js/jquery_notification_v.1.js" type="text/javascript" ></script>
<script src="js/modal-window.min.js" type="text/javascript" ></script>
<script src="js/modernizr-2.0.6.js" type="text/javascript"></script>
<script src="js/webforms2-0.5.4/webforms2-p.js" type="text/javascript" ></script>
<script src="js/placeholder/jquery.placehold-0.2.min.js" type="text/javascript" ></script>
<script src="js/html5forms.fallback.js" type="text/javascript"></script>	
<script src="js/ui/jquery.ui.core.js" type="text/javascript"></script>
<script src="js/ui/jquery.ui.widget.js" type="text/javascript"></script>
<script src="js/ui/jquery.ui.tabs.js" type="text/javascript" ></script>
<script src="js/ui/jquery.ui.datepicker.js" type="text/javascript" ></script>
<script src="js/atooltip.jquery.js" type="text/javascript"></script>   
<script src="js/script_normaltip.js" type="text/javascript" ></script>
<script src="js/gen_validatorv31.js" language="JavaScript"  type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
		$("#tabs").tabs();
	});
	$(function() {
		$('#datepicker').datepicker();
	});
	</script>
   
 <link href="js/themes/mint-choc/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<link href="css/modal-window.css" type="text/css" rel="stylesheet" />   
<link href="css/page_styling.css" rel="stylesheet" type="text/css" />
<title>Signup</title>
</head>

<body>
<?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo "<ul>";
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li><img src="images/icons/icn_alert_info.png">  <font color="red">',$msg ,'</font></li>'; 
		}
		echo "</ul>";
		unset($_SESSION['ERRMSG_ARR']);
	}
?>
<h2> Sign up </h2>
<form action="_save_user.php" method="post" name="register" id="register">
<div style="width:250px; float:left; margin-left:5px;">
<label for="fullnames"> Full names:</label><br />
<input name="fullnames" type="text"   title="your names" required id="fullnames" class="normaltip" placeholder='john james' autocomplete="off" /><br />
<label > Registration number:<br /> (format:bis/2003/82/df)</label><br />
<input name="regno" type="text" title="your registration number" required id="regno" class="normaltip" placeholder='format:bis/2003/82/df'  autocomplete="off" /><br />
<label for="password1"> Select password: (four characters and above)</label> <br />
<input name="password1" type="password" title="password" required id="password1" class="normaltip" placeholder='*****'  autocomplete="off" /><br />
<label for="password2" >Confirm password:</label><br />
<input name="password2" type="password" title="confirm password" required id="password2" class="normaltip" placeholder='*****'  autocomplete="off" /><br />

</div>
<div style="width:250px; float:left; margin-left:5px;">
<label for="password2" >Gender:</label><br />
<select name="gender" title="gender" required  class="normaltip">
<option value=""> -select gender-</option>
<option value="male"> male</option>
<option value="female"> female</option>
</select><br />
<label  > Security word one:</label><br />
<input name="word1" type="text" title="security word one" required id="word1" class="normaltip" placeholder='*******'  autocomplete="off" /><br />
<label  > Security word one</label><br />
<input name="word2" type="text" title="security word two" required id="word1" class="normaltip" placeholder='*******'  autocomplete="off" /><br />
<label  > Email:</label><br />
<input name="emailc" type="email" title="your registration number" required id="emailc" class="normaltip" placeholder='you@domain.com'  autocomplete="off" /><br />
<input name="Sign up" type="submit" value="Sign up" />
</div>
</form>
</body>
</html>