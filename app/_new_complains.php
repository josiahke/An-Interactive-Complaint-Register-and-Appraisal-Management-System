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
<script src="js/jgcharts.js" type="text/javascript"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/course_codes.js"></script>
<script type="text/javascript" src="js/course_codes_2.js"></script>
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
        <hr />
        
		<h3>Complains</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="_new_complains.php">New Complains</a></li>
		</ul>
        
        <hr />
        <h3>Forum</h3>
		<ul class="toggle">
			<li class='icn_categories'><a href='_view_topic.php'>Listed Topics</a></li>
		</ul>
        
        <hr />
        <h3>Appraisal</h3>
		<ul class="toggle">
			<li class='icn_categories'><a href='_view_lect.php'>Listed Lecturers</a></li>
            <li class='icn_tags'><a href='_poll_sum.php'>Appraisal Summary</a></li>
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
			Josiah Ngige Ng'ang'a</strong><br />
			BIS/20003/82/DF
            </p>
		</footer>
				
	</div>

   <div id='content' >
   <div id="tabs" style="font-size:12px;">
	<ul>
		<li><a href="#tabs-1">Add New Result Complaint</a></li>
		<li><a href="#tabs-2">Add New Lecturer Complaint</a></li>
        <li><a href="#tabs-3">Add Other Complaint</a></li>
	</ul>
	<!-- begin tab 1 -->   
	<div id="tabs-1">
 <?php //echo substr("mc1100", 2, 2);
/*  	$year = substr("cs3201", 2, 1);
	$sem = substr("cs3201", 3, 1);
 echo "year >". $year."while sem > ".$sem; */
 ?> 
   <form action="_save_c1.php" method="post" name="savecomplain" id="result complaint">
   <label> Select you Course</label> <br />
   <select name='course' required onchange="setOptions(document.savecomplain.course.options[document.savecomplain.course.selectedIndex].value);">
   <option value="">-select your course-</option> 
   <option value="BIS">BIS </option>
   <option value="BIT">BIT </option>
   <option value="BCS">BCS </option>
   <option value="BCI">BCI </option>
   </select> <br />
   
   <label> Course Codes</label> <br> 
   <select name="coursecode" size="1" required >
   <option value=" " selected="selected">-Please select course first-</option>
	</select> <br />
   <label for="lectname">Lecturer Name:</label> <br />
	<select name="lectname" size="" id="lectname">
	<option value="">-select lecturer name-</option>
	<?php
    $query  = "SELECT * FROM lecturer";
    //$result = mysql_query($query);
	$result = $connector->query($query);
    while($row = mysql_fetch_assoc($result))
    {
    ?>
    <option value="<?php echo $row['username'];  ?>" > <?php echo   $row['names']; } ?> </option>
    <?php echo "}"; ?>
    </select>
  <label for="exammonth">Exam session-month</label> <br />
    <select name="exammonth" required>
    <option value=""> -select exam month- </option>
    <option value="may"> may </option> 
    <option value="dec"> dec </option> 
    </select><br />
    <label for="examyear">Exam session-year</label> <br />
    <select name="examyear" required>
    <option value=""> -select exam year- </option>
    <option value="2001"> 2001 </option> 
    <option value="2002"> 2002 </option> 
    <option value="2003"> 2003 </option> 
    <option value="2004"> 2004 </option> 
    <option value="2005"> 2005 </option> 
    <option value="2006"> 2006 </option> 
    <option value="2007"> 2007 </option> 
    <option value="2008"> 2008 </option> 
    <option value="2009"> 2009 </option> 
    <option value="2010"> 2010 </option> 
    <option value="2011"> 2011 </option> 
    <option value="2012"> 2012 </option>
    <option value="2010"> 2010 </option> 
    <option value="2011"> 2011 </option> 
    <option value="2012"> 2012 </option>
    <option value="2013"> 2013 </option> 
    <option value="2014"> 2014 </option> 
    <option value="2015"> 2015 </option>
    <option value="2016"> 2016 </option> 
    <option value="2017"> 2017 </option> 
    <option value="2018"> 2018 </option>
    <option value="2019"> 2019 </option> 
    <option value="2020"> 2020 </option> 
    </select> <br />
    <label for="marks">Select Missing Marks:</label> <br />
    <select name="marks" required> 
    <option value=""> -select missing marks </option>
    <option value="coursework"> Coursework </option>
    <option value="exam"> Exam </option> 
    <option value="coursework and exam"> Both Exam and Coursework </option>
    </select> <br />
    <input name="Save Complain" type="submit" value="Save Complain" /> 
</form>

   </div><!-- end tabs1 -->
   
   <div id="tabs-2">
   <form action="_save_c2.php" method="post" name="savecomplain2" id="lecture complaint">
	<label> Select you Course</label> <br />
   <select name='course' required onchange="setOptions2(document.savecomplain2.course.options[document.savecomplain2.course.selectedIndex].value);">
   <option value="">-select your course-</option> 
   <option value="BIS">BIS </option>
   <option value="BIT">BIT </option>
   <option value="BCS">BCS </option>
   <option value="BCI">BCI </option>
   </select> <br />
   
   <label> Course Codes</label> <br> 
   <select name="coursecode" size="1" required >
   <option value=" " selected="selected">-Please select course first-</option>
	</select> <br />
  
	<label for="lectname">Lecturer Name:</label> <br />
	<select name="lectname" size="" id="lectname">
	<option value="">-select lecturer name-</option>
	<?php
    $query  = "SELECT * FROM lecturer";
    //$result = mysql_query($query);
	$result = $connector->query($query);
    while($row = mysql_fetch_assoc($result))
    {
    ?>
    <option value="<?php echo $row['username'];  ?>" > <?php echo   $row['names']; } ?> </option>
    <?php echo "}"; ?>
    </select>

    <label for="roomno">Room Number [provide if complains is on lectures]</label> <br />
    <input name="roomno" type="text" title="Room number"/><br />
    
    <label for="details">Complain Details:</label> <br />
    <textarea name="details" cols="50" rows="10" required></textarea>

        <br />
        <input name="Save Complain" type="submit" value="Save Complain" /> 
        </form>
   </div><!-- end tabs2 -->
   
   <div id="tabs-3">
   <form action="_save_c3.php" method="post" name="savecomplain4" id="Other">
    <label for="details" required>Complain Details:</label> <BR />
    <textarea name="details" cols="50" rows="10" required></textarea><BR />
	<input name="Save Complain" type="submit" value="Save Complain" /> 
</form>
   </div><!-- end tabs3 -->
   
   </div>
   <h3> Complaints you have submitted [<a href="export_c2.php?user=<?php echo $user;?>" title="export to pdf" target="_blank">export all pdf</a>]</h3>
   <table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
	<thead>
		<tr>
			<th>Description</th>
			<th>Functions</th>
		</tr>
	</thead>
	<tbody>
     <?php
      $list = "SELECT * FROM complain where user='$user' order by cid desc";
			$result = $connector->query($list);
			if(mysql_num_rows($result) > 0)
				{
				while($data = mysql_fetch_assoc($result))
					{ 
					echo "<tr>";
					if ($data['category']=='result complaint') {
						echo "<td> 
					<strong>Complaint category:</strong><br> {$data['category']}<br>
					<strong>course details [unit,course,year,sem]:</strong><br> {$data['cunit']} ({$data['course']}) (year {$data['year']}, sem {$data['sem']})<br>
					<strong>Marks missing:</strong><br> {$data['markscat']}<br>
					<strong>Exam session:</strong><br> in {$data['xyear']} {$data['xmonth']} <br>
					</td> ";
					}
					if ($data['category']=='lecturer complaint') {
						echo "<td> 
					<strong>Complaint category:</strong><br> {$data['category']}<br>
					<strong>Description:</strong><br> {$data['details']}<br>
					<strong>Lecturer names:</strong><br> {$data['lecturer']}<br>
					<strong>course unit:</strong><br> {$data['cunit']} ({$data['course']}) (year {$data['year']}, sem {$data['sem']})<br>
					<strong>Room no:</strong><br> {$data['room']}<br>
					
					</td> ";
					}
					
					if ($data['category']=='other complaint') {
						echo "<td> 
					<strong>Complaint category:</strong><br> {$data['category']}<br>
					<strong>Complaint details:</strong><br> {$data['details']}<br>
					
					</td> ";
					}
					
					
					echo "<td>
		<a href='export_c1.php?id={$data['cid']}&user=$user' title='export folder information' target='_blank'>Export to PDF</a> <br> <br>";
		
			$list2 = "SELECT * FROM response where cid='{$data['cid']}'";
			$result2 = $connector->query($list2);
			if(mysql_num_rows($result2) > 0)
				{
				while($data2 = mysql_fetch_assoc($result2))
					{ 
					if ($data2['body'] =='') {echo "No response as of now";} else { echo "Your response is <br> <i>". $data2['body']."</i>";}
					}}
					
					echo "</td> 
							
					</tr>";
					}
					}
					
	 ?>
	</tbody>
	<tfoot> </tfoot>
</table>
   
   </div>
    
    
   </div>
    </div>

    </td>
 </tr>  
   <tr>
    <td id='content_bottom'> <div id='content_bottom'> </div></td>
  </tr> 
    <tr>
    <td>&nbsp;</td>
  </tr>  
</table>

</body>
</html>