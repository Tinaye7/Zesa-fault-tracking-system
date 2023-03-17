<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['customer_name'];
    $meter=$_POST['meter_number'];
    $add=$_POST['address'];
	$contact=$_POST['contact'];
	$username=$_POST['username'];
    $password=md5($_POST['password']);
	$email=$_POST['email'];
	$district=$_POST['district'];
    $ret="select meter_number from customers where meter_number=:meter_number";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':meter_number', $meter, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into customers(customer_name,meter_number,address,contact,username,password,email,district)Values(:customer_name,:meter_number,:address,:contact,:username,:password,:email,:district)";
$query = $dbh->prepare($sql);
$query->bindParam(':customer_name',$fname,PDO::PARAM_STR);
$query->bindParam(':meter_number',$meter,PDO::PARAM_STR);
$query->bindParam(':address',$add,PDO::PARAM_STR);
$query->bindParam(':contact',$contact,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':district',$district,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('Account has been Succesfully Created');</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{

echo "<script>alert('This Meter Number is already registered to a Customer. Please try again');</script>";
}
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  		<title>LOGIN</title>
		  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="style.css">
		<script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value!= document.chngpwd.confirmpassword.value)
{
alert("Password and Confirm Password Fields do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>

</head>
<body>
<strong><strong><i >**Please note that signup is for customers only!!</i></strong></strong>
<div class="login-wrap" style="min-height:980px; ">

	<div class="login-html" style="margin-top: -68px">
		<input id="tab-2" type="radio" name="tab" class="sign-in" checked><label for="tab-2" class="tab" > Sign Up</label>
		<input id="tab-1" type="radio" name="tab" class="sign-up"><label for="tab-1" class="tab"><a href="register.php"></a></label>
		
			
		<div class="login-form">
			<form  method="post" name="chngpwd" onSubmit="return valid();" >
			<div class="sign-in-htm">
				
				<div class="group">
					<label for="customer_name" class="label">Full Name</label>
					<input type="text" name="customer_name" required="true" class="input"/>
				</div>
				<div class="group">
					<label for="meter_number" class="label">Meter Number</label>
					<input type="number" name="meter_number" required="true" class="input" />
				</div>
				<div class="group">
					<label for="address" class="label">Address</label>
					<input type="text" name="address"  required="true" class="input"/>
				</div>
        <div class="group">
					<label for="contact" class="label">Mobile Number</label>
					<input type="number" name="contact" maxlength="10" pattern="[0-9]+" class="input"/>
				</div>
				<div class="group">
					<label for="username" class="label">Username</label>
					<input type="text" name="username"  required="true" class="input"/>
				</div>
				<div class="group">
					<label for="password" class="label">Password</label>
					<input type="password" name="password" required="true" class="input"/>
				</div>
				<div class="group">
					<label for="confirmpassword" class="label">Confirm Password</label>
					<input type="password" name="confirmpassword" required="true" class="input"/>
				</div>
				<div class="group">
					<label for="email" class="label">Email Address</label>
					<input type="text" name="email"  required="true" class="input"/>
				</div>
				<div class="group">
					<label for="district" class="label">District</label>
					<input type="text" name="district"  required="true" class="input"/>
				</div>
				<div class="group">
				<button type="submit" class="button" name="submit" style="margin-top:40px">Sign Up</button>
				</div>
			
				<div class="foot-lnk" style="margin-top:70px">
					<label for="tab-1"><a href="index.php" style="margin-top:90px"><u>Already Registered?</u></a>
				</div>
			</div>
		</form>

			
		</div>
	</div>
</div>
<div style="text-align:center;background:white">
<?php include_once('includes/footer.php');?>
</div>
</body>
</html>
