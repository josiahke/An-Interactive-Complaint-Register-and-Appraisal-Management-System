<?php
session_start();
session_regenerate_id();
require 'sessions-listed.php';
require '_enc_dec.php';
require '_opener_db.php';
$id=$_GET['id'];
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
<script src="js/jgcharts.js" type="text/javascript"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/modules/exporting.js"></script>
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
<table cellpadding="0" cellspacing="0" border="0" class="display"  width="100%">
	<thead>
		<tr>
			<th>Complaint Description</th>
		</tr>
	</thead>
	<tbody>
     <?php
      $list = "SELECT * FROM complain where cid='$id'";
			$result = $connector->query($list);
			if(mysql_num_rows($result) > 0)
				{
				while($data = mysql_fetch_assoc($result))
					{ 
					echo "<tr>  ";
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
												
					echo "</tr>";
					}
					}
					
	 ?>
	</tbody>
	<tfoot> </tfoot>
</table>
<br />
<form action="_save_response.php?userid=<?php echo $user; ?>&cid=<?php echo $id; ?>" method="post" name="saveresponse" >
<label>Write Response:</label> 
<textarea name="body" cols="50" rows="5" required title="Add your Response"></textarea><br />
<input name="Send Response" type="submit" value="Send Response" /> 
</form>
</body>
</html>