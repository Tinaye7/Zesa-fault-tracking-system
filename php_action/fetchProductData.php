<?php 	

require_once './includes/dbconnection.php';

$sql = "SELECT product_id,product_code, product_name FROM product WHERE status = 1 AND active = 1";
$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);