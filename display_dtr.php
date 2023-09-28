<?php
	$con = mysqli_connect("localhost","root","","dtr");

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	  $idnum=$_GET['employeenumber'];
	  $dtoday=$_GET['date'];

	  $displaydtr = mysqli_query($con,"SELECT * FROM `dtr` WHERE idnum = '$idnum' AND edate='$dtoday'");

	  $row = mysqli_fetch_assoc($displaydtr);
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
</head>
<body>

<div class="container">
<h3><?php echo $dtoday; ?></h3>
 <table class="table">
 	<th>AM-IN</th>
 	<th>AM-OUT</th>
 	<th>PM-IN</th>
 	<th>PM-OUT</th>
 	<th>OT-IN</th>
 	<th>OT-OUT</th>

 	<tr>
 		<td><?php echo $row['am_in']; ?></td>
 		<td><?php echo $row['am_out']; ?></td>
 		<td><?php echo $row['pm_in']; ?></td>
 		<td><?php echo $row['pm_out']; ?></td>
 		<td><?php echo $row['ot_in']; ?></td>
 		<td><?php echo $row['ot_out']; ?></td>
 	</tr>
 </table>
 </div>

</body>
</html>