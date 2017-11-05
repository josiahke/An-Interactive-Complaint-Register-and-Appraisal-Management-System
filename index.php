<?php
session_start();
session_regenerate_id();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Register & Appraisal MGT System</title>
<!--js -->
<script src="app/js/jquery-1.7.1.min.js" type="text/javascript" ></script>
<script src="app/js/jquery_notification_v.1.js" type="text/javascript" ></script>
<script src="app/js/modal-window.min.js" type="text/javascript" ></script>
<script src="app/js/modernizr-2.0.6.js" type="text/javascript"></script>
<script src="app/js/webforms2-0.5.4/webforms2-p.js" type="text/javascript" ></script>
<script src="app/js/placeholder/jquery.placehold-0.2.min.js" type="text/javascript" ></script>
<script src="app/js/html5forms.fallback.js" type="text/javascript"></script>	
<script src="app/js/ui/jquery.ui.core.js" type="text/javascript"></script>
<script src="app/js/ui/jquery.ui.widget.js" type="text/javascript"></script>
<script src="app/js/ui/jquery.ui.tabs.js" type="text/javascript" ></script>
<script src="app/js/ui/jquery.ui.datepicker.js" type="text/javascript" ></script>
<script src="app/js/atooltip.jquery.js" type="text/javascript"></script>   
<script src="app/js/script_normaltip.js" type="text/javascript" ></script>
<script src="app/js/gen_validatorv31.js" language="JavaScript"  type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
		$("#tabs").tabs();
	});
	$(function() {
		$('#datepicker').datepicker();
	});
	</script>
<link href="app/css/jquery.notice.css" type="text/css" media="screen" rel="stylesheet" />
<script src="app/js/jquery.notice.js" type="text/javascript"></script>
<script type="text/javascript"> 
	
	$(document).ready(function()
	{
		
			jQuery.noticeAdd({
				text: 'You are not logged in. Please register with the website for an account.',
				stay: true
				//type:'success'
			});
		
	});
</script>
<link href="app/js/themes/mint-choc/jquery.ui.all.css" rel="stylesheet" type="text/css" />
<link href="app/css/modal-window.css" type="text/css" rel="stylesheet" />   
<link href="app/css/page_styling.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="990" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    <div class="header">
    <img src="app/images/header.PNG"  alt="LOGO" align="left" />
    </div>
    </td>
  </tr>
    <tr>
    <td id='content_top'>
    </td>
  </tr>
  <tr>
    <td id='content_mid'> 
    <div id='holder'>
    <p>
    
    </p>
   <p> <form action="<?php echo 'app/_login_user.php?action=login';?>" id="login" method="post" name="auth" style="width:500px; margin:auto; position:relative;">
   <?php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo "<ul>";
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li><img src="app/images/icons/icn_alert_info.png">  <font color="red">',$msg ,'</font></li>'; 
		}
		echo "</ul>";
		unset($_SESSION['ERRMSG_ARR']);
	}
?>
               <label> Username</label> <br />
               <input name="username" type="text" autocomplete="off" title="enter your username" placeholder="e.g user345" class="normaltip" required/> <br />
               <label> Password</label> <br />
               <input name="password" type="password" autocomplete="off" title="enter your password" placeholder="e.g *******" class="normaltip" required/><br />
                <label>Security Code</label> <br />
                <img src="app/captcha.php" id="captcha" />
<!-- CHANGE TEXT LINK -->
                <a href="#" onclick="
                 document.getElementById('captcha').src='app/captcha.php?'+Math.random();
                    document.getElementById('captcha-form').focus();"
                    id="change-image">Not readable? Change text.</a><br/>
       <label>Validate Security Code</label> <br />             
<input type="text" name="captcha" id="captcha-form" autocomplete="off" title="enter the security code" placeholder="e.g BGterdd" class="normaltip" required/><br/>                
               <input name="token" type="hidden" value="<?php ?>" /> <br />
               <input name="Login" type="submit" value="Login" /> <br /> <br />
               <a href="<?php echo 'app/_signup.php'?>" onclick='$(this).modal({width:550, height:550}).open(); return false;' class="signup-button">Sign Up</a>
			   <a href="<?php echo 'app/_forgot.php'?>" onclick='$(this).modal({width:400, height:400}).open(); return false;' class="forgot-button">Forgot Password</a> 
              
               </form> 

				
    </p>
    
    </div>
				
    </td>
 </tr>  
   <tr>
    <td id='content_bottom'> <div id='content_bottom'> </div><div  style="width:500px; margin:auto; position:relative;">
 <a href='admin/index.php'  class='signup-button' >Admin login</a>
			   <a href='lect/index.php' class='signup-button' >Lecturer login</a>
				</div></td>
  </tr> 
    <tr>
    <td>&nbsp;</td>
  </tr>  
</table>


</body>
</html>