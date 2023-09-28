<?php
	$con = mysqli_connect("localhost","root","","dtr");

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }


	if (isset($_GET['empnum'])) {
		$idnum = $_GET['empnum'];
		$time = $_GET['hours'].":".$_GET['mins'].":".$_GET['secs'];
		$dtoday = $_GET['dtoday'];


		$checkid = mysqli_query($con,"SELECT * FROM `employee_info` WHERE idnum = '$idnum'");

		$row = mysqli_fetch_assoc($checkid);
		$fullname = $row['fullname'];
		$position = $row['position'];

		if (mysqli_num_rows($checkid)!=0) {
			# code...
			$checkdtr = mysqli_query($con,"SELECT * FROM `dtr` WHERE idnum = '$idnum' AND edate = '$dtoday'");

			if (mysqli_num_rows($checkdtr)==0) { ?>

					  <!-- Modal -->
					  <div class="modal show" id="myModal3" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <h4 class="modal-title text-uppercase"><?php echo $fullname; ?></h4>
					        </div>
					        <div class="modal-body">
					          <p>You are about to Time-in at <?php echo $time; ?>.
					          Are you sure you want to proceed?</p>
					        </div>
					        <div class="modal-footer">
					          <a href="http://localhost/DTR/" type="button" class="btn btn-default" data-dismiss="modal">No</a>
					          <a href="dtr_exe.php?empnum=<?php echo $idnum.'&time='.$time.'&dtoday='.$dtoday.'&fullname='.$fullname.'&position='.$position.'&am_in'; ?>" class="btn btn-default btn-primary" data-dismiss="modal" autofocus>Yes</a>
					        </div>
					      </div>
					      
					    </div>
					  </div>

			<?php	

			}else{

				$checkamout = mysqli_query($con,"SELECT * FROM `dtr` WHERE idnum = '$idnum' AND edate = '$dtoday' AND am_out = ''");
				$checkpmin = mysqli_query($con,"SELECT * FROM `dtr` WHERE idnum = '$idnum' AND edate = '$dtoday' AND am_out != '' AND pm_in = ''");
				$checkpmout = mysqli_query($con,"SELECT * FROM `dtr` WHERE idnum = '$idnum' AND edate = '$dtoday' AND am_out != '' AND pm_in != '' AND pm_out = ''");
				$checkotin = mysqli_query($con,"SELECT * FROM `dtr` WHERE idnum = '$idnum' AND edate = '$dtoday' AND am_out != '' AND pm_in != '' AND pm_out != '' AND ot_in = ''");
				$checkotout = mysqli_query($con,"SELECT * FROM `dtr` WHERE idnum = '$idnum' AND edate = '$dtoday' AND am_out != '' AND pm_in != '' AND pm_out != '' AND ot_in != '' AND ot_out = ''");
				$checkall = mysqli_query($con,"SELECT * FROM `dtr` WHERE idnum = '$idnum' AND edate = '$dtoday' AND am_out != '' AND pm_in != '' AND pm_out != '' AND ot_in != '' AND ot_out != ''");

				if (mysqli_num_rows($checkamout)!=0) { ?>

					<!-- Modal -->
					  <div class="modal show" id="myModal3" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <h4 class="modal-title text-uppercase"><?php echo $fullname; ?></h4>
					        </div>
					        <div class="modal-body">
					          <p>You are about to Time-out at <?php echo $time; ?>.
					          Are you sure you want to proceed?</p>
					        </div>
					        <div class="modal-footer">
					        <a href="" class="btn btn-info myidnum" data-date="<?php echo $dtoday; ?>" data-idnum="<?php echo $_GET['empnum']; ?>" onclick="openWin()">Check DTR</a> 
					          <a href="http://localhost/DTR/" type="button" class="btn btn-default" data-dismiss="modal">No</a>
					          <a href="dtr_exe.php?empnum=<?php echo $idnum.'&time='.$time.'&dtoday='.$dtoday.'&fullname='.$fullname.'&position='.$position.'&am_out'; ?>" class="btn btn-default btn-primary" data-dismiss="modal" autofocus="on">Yes</a>
					        </div>
					      </div>
					      
					    </div>
					  </div>

					<?php
				}

				if (mysqli_num_rows($checkpmin)!=0) { ?>

									<!-- Modal -->
					  <div class="modal show" id="myModal3" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <h4 class="modal-title text-uppercase"><?php echo $fullname; ?></h4>
					        </div>
					        <div class="modal-body">
					          <p>You are about to Time-in at <?php echo $time; ?>.
					          Are you sure you want to proceed?</p>
					        </div>
					        <div class="modal-footer">
					        <a href="" class="btn btn-info myidnum" data-date="<?php echo $dtoday; ?>" data-idnum="<?php echo $_GET['empnum']; ?>" onclick="openWin()">Check DTR</a> 
					          <a href="http://localhost/DTR/" type="button" class="btn btn-default" data-dismiss="modal">No</a>
					          <a href="dtr_exe.php?empnum=<?php echo $idnum.'&time='.$time.'&dtoday='.$dtoday.'&fullname='.$fullname.'&position='.$position.'&pm_in'; ?>" class="btn btn-default btn-primary" data-dismiss="modal" autofocus="on">Yes</a>
					        </div>
					      </div>
					      
					    </div>
					  </div>

					<?php
				}
				if (mysqli_num_rows($checkpmout)!=0) { ?>


									<!-- Modal -->
					  <div class="modal show" id="myModal3" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <h4 class="modal-title text-uppercase"><?php echo $fullname; ?></h4>
					        </div>
					        <div class="modal-body">
					          <p>You are about to Time-out at <?php echo $time; ?>.
					          Are you sure you want to proceed?</p>
					        </div>
					        <div class="modal-footer">
					        <a href="" class="btn btn-info myidnum" data-date="<?php echo $dtoday; ?>" data-idnum="<?php echo $_GET['empnum']; ?>" onclick="openWin()">Check DTR</a> 
					          <a href="http://localhost/DTR/" type="button" class="btn btn-default" data-dismiss="modal">No</a>
					          <a href="dtr_exe.php?empnum=<?php echo $idnum.'&time='.$time.'&dtoday='.$dtoday.'&fullname='.$fullname.'&position='.$position.'&pm_out'; ?>" class="btn btn-default btn-primary" data-dismiss="modal" autofocus="on">Yes</a>
					        </div>
					      </div>
					      
					    </div>
					  </div>

				<?php
				}
				if (mysqli_num_rows($checkotin)!=0) { ?>

							<!-- Modal -->
					  <div class="modal show" id="myModal3" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <h4 class="modal-title text-uppercase"><?php echo $fullname; ?></h4>
					        </div>
					        <div class="modal-body">
					          <p>You are about to Time-in at <?php echo $time; ?>.
					          Are you sure you want to proceed?</p>
					        </div>
					        <div class="modal-footer">
					        <a href="" class="btn btn-info myidnum" data-date="<?php echo $dtoday; ?>" data-idnum="<?php echo $_GET['empnum']; ?>" onclick="openWin()">Check DTR</a> 
					          <a href="http://localhost/DTR/" type="button" class="btn btn-default" data-dismiss="modal">No</a>
					          <a href="dtr_exe.php?empnum=<?php echo $idnum.'&time='.$time.'&dtoday='.$dtoday.'&fullname='.$fullname.'&position='.$position.'&ot_in'; ?>" class="btn btn-default btn-primary" data-dismiss="modal" autofocus="on">Yes</a>
					        </div>
					      </div>
					      
					    </div>
					  </div>
				<?php
				}
				if (mysqli_num_rows($checkotout)!=0) { ?>

					<!-- Modal -->
					  <div class="modal show" id="myModal3" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <h4 class="modal-title text-uppercase"><?php echo $fullname; ?></h4>
					        </div>
					        <div class="modal-body">
					          <p>You are about to Time-out at <?php echo $time; ?>.
					          Are you sure you want to proceed?</p>
					        </div>
					        <div class="modal-footer">
					        <a href="" class="btn btn-info myidnum" data-date="<?php echo $dtoday; ?>" data-idnum="<?php echo $_GET['empnum']; ?>" onclick="openWin()">Check DTR</a> 
					          <a href="http://localhost/DTR/" type="button" class="btn btn-default" data-dismiss="modal">No</a>
					          <a href="dtr_exe.php?empnum=<?php echo $idnum.'&time='.$time.'&dtoday='.$dtoday.'&fullname='.$fullname.'&position='.$position.'&ot_out'; ?>" class="btn btn-default btn-primary" data-dismiss="modal" autofocus="on">Yes</a>
					        </div>
					      </div>
					      
					    </div>
					  </div>
				<?php
				}

				if (mysqli_num_rows($checkall)!=0) { ?>

				<!-- Modal -->
					  <div class="modal show" id="myModal3" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <h4 class="modal-title text-uppercase"><?php echo $fullname; ?></h4>
					        </div>
					        <div class="modal-body">
					          <p>Your DTR for this day is full. Please contact administrator.</p>
					        </div>
					        <div class="modal-footer">
					          <a href="" class="btn btn-info myidnum" data-date="<?php echo $dtoday; ?>" data-idnum="<?php echo $_GET['empnum']; ?>" onclick="openWin()">Check DTR</a> 
					          <a href="http://localhost/DTR/" type="button" class="btn btn-default" data-dismiss="modal">Ok</a>
					        </div>
					      </div>
					      
					    </div>
					  </div>

			<?php	}


			}
		}else{ ?>
<!-- Modal -->
					  <div class="modal show" id="myModal3" role="dialog">
					    <div class="modal-dialog">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <h4 class="modal-title text-uppercase"><?php echo $_GET['empnum']; ?></h4>
					        </div>
					        <div class="modal-body">
					          <p>Error Time-in. Please try again.</p>
					        </div>
					        <div class="modal-footer">
					          <a href="http://localhost/DTR/" type="button" class="btn btn-default" data-dismiss="modal">Ok</a>
					        </div>
					      </div>
					      
					    </div>
					  </div>

					  		<?php }





	 	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">

@font-face {
    font-family: 'BebasNeueRegular';
    src: url('BebasNeue-webfont.eot');
    src: url('BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
         url('BebasNeue-webfont.woff') format('woff'),
         url('BebasNeue-webfont.ttf') format('truetype'),
         url('BebasNeue-webfont.svg#BebasNeueRegular') format('svg');
    font-weight: normal;
    font-style: normal;

}


.clock {width:800px; margin:0 auto; padding:30px; border:1px solid #333; color:#fff;background:#202020;
 }

#Date { font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; font-size:20px; text-align:center; text-shadow:0 0 5px #00c6ff; }

ul { width:200px; margin:0 auto; padding:0px; list-style:none; text-align:center; }
ul li { display:inline; font-size:1em; text-align:center; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; text-shadow:0 0 5px #00c6ff; }

#point { position:relative; -moz-animation:mymove 1s ease infinite; -webkit-animation:mymove 1s ease infinite; padding-left:10px; padding-right:10px; }

@-webkit-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }	
}


@-moz-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }	
}

</style>
<script type="text/javascript">
$(document).ready(function() {
// Create two variable with the names of the months and days in an array
var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

// Create a newDate() object
var newDate = new Date();
// Extract the current date from Date object
newDate.setDate(newDate.getDate());
// Output the day, date, month and year    
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
$('#dateval').val(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

setInterval( function() {
	// Create a newDate() object and extract the seconds of the current time on the visitor's
	var seconds = new Date().getSeconds();
	// Add a leading zero to seconds value
	$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);
	
setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
	
setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);



setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$("#hh").val(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);


setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$("#mm").val(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);

setInterval( function() {
	// Create a newDate() object and extract the seconds of the current time on the visitor's
	var seconds = new Date().getSeconds();
	// Add a leading zero to seconds value
	$("#ss").val(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);


}); 
</script>
<link rel="canonical" href="http://www.alessioatzeni.com/wp-content/tutorials/jquery/CSS3-digital-clock/index.html" />
</head>
<body>
<div class="container">
	<div class="clock">
		<div id="Date"></div>

		<ul>
			<li id="hours"> </li>
		    <li id="point">:</li>
		    <li id="min"> </li>
		    <li id="point">:</li>
		    <li id="sec"> </li>
		</ul>

	</div>
	<hr/>

		<div>
			<form method="GET">
			    <div class="form-group">
			      <label for="EPN">Employee Number <i>(ID Number)</i>:</label>
			      <input type="hidden" name="hours" id="hh">
			      <input type="hidden" name="mins" id="mm">
			      <input type="hidden" name="secs" id="ss">
			      <input type="hidden" name="dtoday" id="dateval">
			      <input type="password" id="EPN" name="empnum" class="form-control text-uppercase" style="font-size: 50px; margin:0 auto; padding:50px;text-align: center;" autofocus="autofocus" autocomplete="off" required/>
			      <span class="help-block"><span class="glyphicon glyphicon-question-sign"></span> Press Entr to submit.</span>
			    </div>
			  </form>
		</div>

		<div style="overflow: auto;width: 100%; height: 300px;">
			<table class="table table-condensed table-striped">

				<th>Date</th>
				<th>Employee</th>
				<th>Position</th>
				<th>Time</th>
				<th>Status</th>

				<?php
					$displaylog = mysqli_query($con,"SELECT * FROM `time_log` ORDER BY id DESC LIMIT 20");
					while ($row = mysqli_fetch_assoc($displaylog)) { ?>
						<tr>
							<td><?php echo $row['date']; ?></td>
							<td><?php echo $row['fullname']; ?></td>
							<td><?php echo $row['position']; ?></td>
							<td><?php echo $row['time']; ?></td>
							<td><?php echo $row['status']; ?></td>
						</tr>
					<?php }
				 ?>

			</table>
		</div>
	<hr/>

</div>
<script type="text/javascript">
	var myWindow;

function openWin() {
	var idnum = $('.myidnum').attr('data-idnum');
	var dtoday = $('.myidnum').attr('data-date');
    myWindow = window.open("display_dtr.php?employeenumber="+idnum+"&date="+dtoday, "myWindow", "width=800,height=200");
}

function closeWin() {
    myWindow.close();
}
</script>
</body>
</html>
