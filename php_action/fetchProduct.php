<?php 	



require_once 'db_connect.php';

$sql = "SELECT product_id,chassisnumber,type,status,installationdate,specification,serviceroutine,active from assets where active=1";

$result = $connect->query($sql);

$output = array('data' => array());

	

	

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 

 while($row = $result->fetch_array()) {
	$productId = $row[0];
 	// active 
 	

	 
	
 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" id="editProductModalBtn" data-target="#editProductModal" onclick="editProduct('.$productId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>

	    <li><a type="button" data-toggle="modal" data-target="#removeProductModal" id="removeProductModalBtn" onclick="removeProduct('.$productId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }
	

	

 	$output['data'][] = array( 		
 		// image
 		
		 $row[1],
 		// product name
 		$row['type'], 
 		// rate
 		$row['status'],
 		// quantity 
 		$row['installationdate'],		 	
 		// brand
 		$row['specification'],
 		// category 		
 		$row['serviceroutine'],
 		// active
 		
 		// button
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);