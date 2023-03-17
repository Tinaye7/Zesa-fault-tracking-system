<?php 	

require_once 'db_connect.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['productId'];
	$chassis 		= $_POST['editchassis']; 
	//$initial 		= $_POST['editinitial']; 
  $type 			= $_POST['edittype'];
  $status				= $_POST['editstatus'];
  $date =$_POST['editdate'];
  $specific 	= $_POST['editspecification'];
  $service 	= $_POST['editservice'];

				
	$sql = "UPDATE assets SET chassisnumber = '$chassis', type = '$type', status = '$status',installationdate='$date', specification= '$specific', serviceroutine = '$service' WHERE product_id = $productId ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
