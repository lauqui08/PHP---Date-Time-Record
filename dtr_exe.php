<?php

$con = mysqli_connect("localhost","root","","dtr");

	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	    $idnum = $_GET['empnum'];
		$time = $_GET['time'];
		$dtoday = $_GET['dtoday'];
		$fullname = $_GET['fullname'];
		$position = $_GET['position'];


if (isset($_GET['am_in'])) {
	# code...
					$insertdtr = mysqli_query($con,"INSERT INTO `dtr`(`id`, `idnum`, `fullname`, `position`, `edate`, `am_in`) VALUES ('','$idnum','$fullname','$position','$dtoday','$time')");

					$insertlogamin = mysqli_query($con,"INSERT INTO `time_log`(`id`, `idnum`, `fullname`, `date`, `position`, `status`,`time`) VALUES ('','$idnum','$fullname','$dtoday','$position','time-in','$time')");
}

if (isset($_GET['am_out'])) {
	# code...
					$insertamout = mysqli_query($con,"UPDATE `dtr` SET `am_out`='$time' WHERE idnum = '$idnum' AND edate = '$dtoday'");

					$insertlogamout = mysqli_query($con,"INSERT INTO `time_log`(`id`, `idnum`, `fullname`, `date`, `position`, `status`,`time`) VALUES ('','$idnum','$fullname','$dtoday','$position','time-out','$time')");
}

if (isset($_GET['pm_in'])) {
	# code...
					$insertpmin = mysqli_query($con,"UPDATE `dtr` SET `pm_in`='$time' WHERE idnum = '$idnum' AND edate = '$dtoday'");

					$insertlogpmin = mysqli_query($con,"INSERT INTO `time_log`(`id`, `idnum`, `fullname`, `date`, `position`, `status`,`time`) VALUES ('','$idnum','$fullname','$dtoday','$position','time-in','$time')");
}

if (isset($_GET['pm_out'])) {
	# code...
					$insertpmout = mysqli_query($con,"UPDATE `dtr` SET `pm_out`='$time' WHERE idnum = '$idnum' AND edate = '$dtoday'");

					$insertlogpmout = mysqli_query($con,"INSERT INTO `time_log`(`id`, `idnum`, `fullname`, `date`, `position`, `status`,`time`) VALUES ('','$idnum','$fullname','$dtoday','$position','time-out','$time')");
}

if (isset($_GET['ot_in'])) {
	# code...
					$insertamout = mysqli_query($con,"UPDATE `dtr` SET `ot_in`='$time' WHERE idnum = '$idnum' AND edate = '$dtoday'");

					$insertlogotin = mysqli_query($con,"INSERT INTO `time_log`(`id`, `idnum`, `fullname`, `date`, `position`, `status`,`time`) VALUES ('','$idnum','$fullname','$dtoday','$position','time-in','$time')");
}

if (isset($_GET['ot_out'])) {
	# code...
					$insertamout = mysqli_query($con,"UPDATE `dtr` SET `ot_out`='$time' WHERE idnum = '$idnum' AND edate = '$dtoday'");

					$insertlogotout = mysqli_query($con,"INSERT INTO `time_log`(`id`, `idnum`, `fullname`, `date`, `position`, `status`,`time`) VALUES ('','$idnum','$fullname','$dtoday','$position','time-out','$time')");
}

header("Location:http://localhost/DTR");
 ?>