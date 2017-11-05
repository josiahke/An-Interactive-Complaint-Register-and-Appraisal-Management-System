<?php
session_start();
session_regenerate_id();
require 'sessions-listed.php';
require '_enc_dec.php';
require '_opener_db.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Register & Appraisal MGT System</title>
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
<script type="text/javascript" language="javascript" src="table_media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable( {
					"bJQueryUI": true,
					"sPaginationType": "full_numbers"
				} );
			} );
		</script>

<script type="text/javascript">
	$(function() {
		$("#tabs").tabs();
	});
	$(function() {
		$('#datepicker').datepicker();
	});
	</script>
   
<link href="css/modal-window.css" type="text/css" rel="stylesheet" />   
<link href="css/page_styling.css" rel="stylesheet" type="text/css" />
<style type="text/css" title="currentStyle">
@import "table_media/css/jquery.dataTables_themeroller.css";
@import "table_media/themes/smoothness/jquery-ui-1.8.4.custom.css";
</style>
<link href="css/jquery.notice.css" type="text/css" media="screen" rel="stylesheet" />
<script src="js/jquery.notice.js" type="text/javascript"></script>
<script type="text/javascript"> 
	
	$(document).ready(function()
	{
		
			jQuery.noticeAdd({
				text: 'You are logged in as <strong><?php echo $user;?></strong>.',
				stay: true
				//type:'success'
			});
		
	});
</script>
<script type="text/javascript">  /* configure date picker */
	$(function() {
	  $(".datepicker").datepicker({ 
	    dateFormat: 'd M yy', 
	    firstDay: 1, 
	    changeMonth: true, changeYear: true, 
	    showOtherMonths: true,
	    mandatory: true
	  });
	});
	</script>
<script src="js/jgcharts.js" type="text/javascript"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/modules/exporting.js"></script>
</head>
<?php
    
           //prof
            $list = "select * from user where regno='$user' ";
            $result = $connector->query($list);
			if(mysql_num_rows($result) > 0)
				{
				while($data = mysql_fetch_assoc($result))
					{ 
					if (($data['names']=='') || ($data['dob']=='') || ($data['tel']=='') || ($data['faculty']=='') || ($data['course']=='') || ($data['doe']=='') || ($data['moe']=='')) {
						echo "
						<script type='text/javascript'> 
						$(document).ready(function()
						{
						jQuery.noticeAdd({
						text: 'Your profile is incomplete, please update it from the users menu.',
					stay: true
				//type:'success'
			});
		
	});
</script>
						
						";
					}
					}
				}
	
	?>
<body>
<table width="990" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    <div class="header">
    <img src="images/header.PNG"  alt="LOGO" align="left" />
    </div>
    </td>
  </tr>
    <tr>
    <td id='content_top'>
    </td>
  </tr>
  <tr>
    <td id='content_mid'> 
    <div id='contentholder'>
    <p>
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
    </p>
   <div style="width:950px; margin-left:10px;"  >
    <div id="sidebar" class="column">
    <h3>Home</h3>
        <ul class="toggle">
		    <li class='icn_categories'><a href='index.php'>Home</a></li>
		</ul>
		<h3>Complains</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="_new_complains.php">New Complains</a></li>
		</ul>
        
        <hr />
        <h3>Forum</h3>
		<ul class="toggle">
			<li class='icn_categories'><a href='_view_topic.php'>Listed Topics</a></li>
            <li class='icn_new_article'><a href='_add_topic.php'>Add Topic</a></li>
		</ul>
        
        <hr />
        <h3>Appraisal</h3>
		<ul class="toggle">
			<li class='icn_categories'><a href='_view_lect.php'>Listed Lecturers</a></li>
		</ul>
        
        <hr />
		<h3>Users</h3>
		<ul class="toggle">
			<li class="icn_profile"><a href="_view_prof.php">Your Profile</a></li>
            <li class="icn_jump_back"><a href="_logout_all.php">Logout</a></li>
		</ul>
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2011 <br />
			Josiah Ngige Ng'ang'a</strong></p>
		</footer>
				
	</div>

   <div id='content' >
   <h3>Your profile</h3>
	<?php
    
           //prof
            $list = "select * from user where regno='$user' ";
            $result = $connector->query($list);
			if(mysql_num_rows($result) > 0)
				{
				while($data = mysql_fetch_assoc($result))
					{ 
					echo "<img src='{$data['picture']}' align='left' height='200' width='200' alt='{$data['regno']}'>";
					echo " &nbsp; Names : {$data['names']} <br>";
					echo " &nbsp; Regno : {$data['regno']} <br>";
					echo " &nbsp; DOB : {$data['dob']} <br>";
					echo " &nbsp; Gender : {$data['gender']} <br>";
					echo " &nbsp; Tel : {$data['tel']} <br>";
					echo " &nbsp; Faculty : {$data['faculty']} <br>";
					echo " &nbsp; Course : {$data['course']} <br>";
					echo " &nbsp; Date of entry : {$data['doe']} <br>";
					echo " &nbsp; Mode of entry : {$data['moe']} <br><br><br><br> 
					<a href='pic.php?user=$user' onclick='$(this).modal({width:400, height:100}).open(); return false;'>Change picture </a>
					<hr>
					";
					if (($data['names']=='') || ($data['dob']=='') || ($data['tel']=='') || ($data['faculty']=='') || ($data['course']=='') || ($data['doe']=='') || ($data['moe']=='')) {
					echo "<h3 align='center'>Update your profile</h3>";
					echo"<form action='_upd_user.php' id='updateuser' method='post'>";
					if ($data['dob']=='') {echo "<label>Date of Birth</label><br> <input type='text'  name='dob' required  class='datepicker' /><br>";} else{}
					if ($data['tel']=='') {echo "<label>Telephone</label><br> <input type='text' name='tel' required  /><br>";} else{}
					if ($data['faculty']=='') {echo "<label>Faculty</label><br> <select name='faculty' required id='selectmenu' title='Faculty' required>
<option value='computer school'> Computer School </option>
</select><br>";} else{}
					if ($data['course']=='') {echo "<label>Course</label><br> <input type='text' name='course' required /><br>";} else{}
					if ($data['doe']=='') {echo "<label>Date of entry</label><br> <input type='text' name='doe' required  class='datepicker'/><br>";} else{}
					if ($data['moe']=='') {echo "<label>Mode of Entry</label><br> <select name='moe' required > <option value=''> -select mode of entry- </option> 
					<option value='direct entry'>direct entry</option> 
					<option value='access program'>access program</option> 
					</select><br>";} else{}
					echo "<input name='Update' type='submit' value='Update' /> ";
					echo "</form>";
					} else {}
					}
				}
	
	?>
    
  
   	</div>
    
    
    </div>
    </div>

    </td>
 </tr>  
   <tr>
    <td id='content_bottom'> </div></td>
  </tr> 
    <tr>
    <td>&nbsp;</td>
  </tr>  
</table>

</body>
</html>