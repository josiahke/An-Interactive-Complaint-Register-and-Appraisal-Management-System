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
   <h3>Complains Graph</h3>
			   <?php

            //complains all
            $count_sqlall1 = "select count(cid) from complain ";
            $count_resall1 = $connector->query($count_sqlall1);
            $countall1 = @mysql_result($count_resall1, 0, "count(cid)");
            
            $count_sql = "select count(cid) from complain where category='result complaint'";
            $count_res = $connector->query($count_sql);
            $count = @mysql_result($count_res, 0, "count(cid)");
            if ($count==0) {$c1=0;} else {$c1=round((($count/$countall1)*100));}
            echo "<strong>$count - $c1 % </strong>".' [result complaints],  ';
            
            $count_sql2 = "select count(cid) from complain where category='lecturer complaint'";
            $count_res2 = $connector->query($count_sql2);
            $count2 = @mysql_result($count_res2, 0, "count(cid)");
            if ($count2==0) {$c1=0;} else {$c1=round((($count2/$countall1)*100));}
            echo "<strong>$count2 - $c1 %</strong>".' [lecturer complaint], ';
            
            $count_sql3 = "select count(cid) from complain where category='other complaint'";
            $count_res3 = $connector->query($count_sql3);
            $count3 = @mysql_result($count_res3, 0, "count(cid)");
            if ($count3==0) {$c1=0;} else {$c1=round((($count3/$countall1)*100));}
            echo "<strong>$count3 - $c1 %</strong>".' [other complaint], ';
                    
               
               ?>
   <p>
   <div id="container3" style="width:700px; height:300px;"></div>
   </p>
   
   <h3>Complains by persons in your course (<?php echo substr("{$user}", 0, 3);?>)</h3>
   
   			   <?php
			$course=substr("{$user}", 0, 3);
            //complains all
            $count_sqlall = "select count(cid) from complain where course='$course'";
            $count_resall = $connector->query($count_sqlall);
            $countall = @mysql_result($count_resall, 0, "count(cid)");
            
            $count_sql = "select count(cid) from complain where category='result complaint' and course='$course'";
            $count_res = $connector->query($count_sql);
            $count = @mysql_result($count_res, 0, "count(cid)");
            if ($count==0) {$c1=0;} else {$c1=round((($count/$countall)*100));}
            echo "<strong>$count - $c1 % </strong>".' [result complaints],  ';
            
            $count_sql2 = "select count(cid) from complain where category='lecturer complaint' and course='$course'";
            $count_res2 = $connector->query($count_sql2);
            $count2 = @mysql_result($count_res2, 0, "count(cid)");
            if ($count2==0) {$c1=0;} else {$c1=round((($count2/$countall)*100));}
            echo "<strong>$count2 - $c1 %</strong>".' [lecturer complaint], ';
            
            $count_sql3 = "select count(cid) from complain where category='other complaint' and course='$course'";
            $count_res3 = $connector->query($count_sql3);
            $count3 = @mysql_result($count_res3, 0, "count(cid)");
            if ($count3==0) {$c1=0;} else {$c1=round((($count3/$countall)*100));}
            echo "<strong>$count3 - $c1 %</strong>".' [other complaint], ';
                    
               
               ?>
               
   <p>
   <div id="container4" style="width:700px; height:300px;"></div>
   </p>
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

<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container3',
						defaultSeriesType: 'bar'
					},
					title: {
						text: 'Complains Collected'
					},
					subtitle: {
						text: 'Source: Online survey'
					},
					xAxis: {
						categories: ['All Complaints'],
						title: {
							text: null
						}
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Complains collected',
							align: 'high'
						}
					},
					tooltip: {
						formatter: function() {
							return ''+
								 this.series.name +': '+ this.y +' ';
						}
					},
					plotOptions: {
						bar: {
							dataLabels: {
								enabled: true
							}
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -100,
						y: 100,
						floating: true,
						borderWidth: 1,
						backgroundColor: '#FFFFFF',
						shadow: true
					},
					credits: {
						enabled: false
					},
				      
				        series: [{
						name: 'Results Complaints',
						data: [<?php echo $count;?> ]
					},
					{
						name: 'Lecturer Complaints',
						data: [<?php echo $count2;?>]
					},
					{
						name: 'Other Complaints',
						data: [<?php echo $count3;?>]
					}]
				});
				
				
			});
				
		</script>
<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container4',
						defaultSeriesType: 'bar'
					},
					title: {
						text: 'Complains Collected'
					},
					subtitle: {
						text: 'Source: Online survey'
					},
					xAxis: {
						categories: ['All Complaints'],
						title: {
							text: null
						}
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Complains collected',
							align: 'high'
						}
					},
					tooltip: {
						formatter: function() {
							return ''+
								 this.series.name +': '+ this.y +' ';
						}
					},
					plotOptions: {
						bar: {
							dataLabels: {
								enabled: true
							}
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -100,
						y: 100,
						floating: true,
						borderWidth: 1,
						backgroundColor: '#FFFFFF',
						shadow: true
					},
					credits: {
						enabled: false
					},
				      
				        series: [{
						name: 'Results Complaints',
						data: [<?php echo $count;?> ]
					},
					{
						name: 'Lecturer Complaints',
						data: [<?php echo $count2;?>]
					},
					{
						name: 'Other Complaints',
						data: [<?php echo $count3;?>]
					}]
				});
				
				
			});
				
		</script>
</body>
</html>