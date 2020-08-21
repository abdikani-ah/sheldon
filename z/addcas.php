<?php
	session_start();
	require_once 'conn.php';
	
	if(ISSET($_POST['addcaz'])){
		$service = $_POST['service'];
		$creativity = $_POST['creativity'];
		$activity = $_POST['activity'];
		$studentjob = $_POST['studentjob'];
		$casname = $_POST['casname'];

		$stm=$db=$query = "INSERT  INTO `caschoices`(service, creativity, activity, studentjob) VALUES(:service, :creativity, :activity, :studentjob)";
		$stmt = $conn->prepare($query);
		if(($_POST['options'])=="service"){
			$stmt->bindParam(':service', $casname);
		} elseif(($_POST['options'])=="creativity"){
			$stmt->bindParam(':creativity', $casname);
		} elseif(($_POST['options'])=="activity"){
			$stmt->bindParam(':activity', $casname);
		} elseif(($_POST['options'])=="studentjob"){
			$stmt->bindParam(':studentjob', $casname);
		}
			if($stmt->execute()){
				$_SESSION['sub'] = "Successfully added new CAS";
				header('location: submitcas.php');

	}
}

ini_set('display_errors', 1);
?>
