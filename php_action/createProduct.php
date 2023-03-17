<?php 	

require_once 'db_connect.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	
	$chassis 		= $_POST['chassis'];
	$type		= $_POST['type'];
	$status 			= $_POST['status'];
    $date 			= $_POST['date'];
	$specifications 			= $_POST['specifications'];
  $service 	= $_POST['service'];
  

		
				$sql = "INSERT INTO assets (chassisnumber,type,status,installationdate,specification,serviceroutine) 
				VALUES ('$chassis','$type', '$status','$date','$specifications', '$service')";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}		

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST 
