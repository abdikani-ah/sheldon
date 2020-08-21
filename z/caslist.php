<?php
	session_start();
	require_once 'conn.php';
	
	if(ISSET($_POST['casregister'])){
		$username = $_POST['username'];
		$service = $_POST['service'];
		$creativity = $_POST['creativity'];
		$activity = $_POST['activity'];
		$studentjob = $_POST['studentjob'];

		$stm=$db=$query = "INSERT INTO `caschoices`(userid, username, service, creativity, activity, studentjob) VALUES('$_SESSION[id]', :username, :service, :creativity, :activity, :studentjob)";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':service', $service);
		$stmt->bindParam(':creativity', $creativity);
		$stmt->bindParam(':activity', $activity);
		$stmt->bindParam(':studentjob', $studentjob);
		if($stmt->execute()){
			$_SESSION['submitted'] = "Successfully submitted CAS choices";
			header('location: casform.php');

	}
}

ini_set('display_errors', 1);
?>
