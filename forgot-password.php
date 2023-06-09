<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['username'];
$newpassword=md5($_POST['newpassword']);
$role=$_POST['role'];
switch ($role){
  case 'Customer':
  $sql ="SELECT email FROM customers WHERE Email=:email and Username=:username";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':username', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update customers set Password=:newpassword where Email=:email and Username=:username";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':username', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Username is invalid');</script>"; 
}

break;
case 'Employee':
  $sql ="SELECT Email FROM employees WHERE Email=:email and Username=:username";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':email', $email, PDO::PARAM_STR);
  $query-> bindParam(':username', $mobile, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  if($query -> rowCount() > 0)
  {
  $con="update employees set Password=:newpassword where Email=:email and Username=:username";
  $chngpwd1 = $dbh->prepare($con);
  $chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
  $chngpwd1-> bindParam(':username', $mobile, PDO::PARAM_STR);
  $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
  $chngpwd1->execute();
  echo "<script>alert('Your Password succesfully changed');</script>";
  }
  else {
  echo "<script>alert('Email id or Username is invalid');</script>"; 
  }

break;
case 'Administrator':
  $sql ="SELECT Email FROM admin WHERE Email=:email and Username=:username";
  $query= $dbh -> prepare($sql);
  $query-> bindParam(':email', $email, PDO::PARAM_STR);
  $query-> bindParam(':username', $mobile, PDO::PARAM_STR);
  $query-> execute();
  $results = $query -> fetchAll(PDO::FETCH_OBJ);
  if($query -> rowCount() > 0)
  {
  $con="update admin set Password=:newpassword where Email=:email and Username=:username";
  $chngpwd1 = $dbh->prepare($con);
  $chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
  $chngpwd1-> bindParam(':username', $mobile, PDO::PARAM_STR);
  $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
  $chngpwd1->execute();
  echo "<script>alert('Your Password succesfully changed');</script>";
  }
  else {
  echo "<script>alert('Email id or Username is invalid');</script>"; 
  }

  break;
  }
  }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title>Forgot Password</title>
   
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- form CSS
		============================================ -->
    <link rel="stylesheet" href="css/form.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style2.css">
    
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Fields do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>

<body class="materialdesign">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Header top area start-->
    <div class="wrapper-pro">

      
            <!-- login Start-->
            <div class="login-form-area mg-t-30 mg-b-40">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <form class="adminpro-form" method="post" name="chngpwd" onSubmit="return valid();">
                            <div class="col-lg-4">
                                <div class="login-bg">
                                    <div class="row">
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Email Address</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                                <input type="text" placeholder="Email Address" required="true" name="email">
                                                <i class="fa fa-envelope login-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Username</p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-8" >
                                            <div class="login-input-area" >
                                                <input type="text" style="background: white;" name="username" placeholder="Username" required="true">
                                                <i class="fa fa-mobile login-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class ="row">
                              <div class="col-lg-4">
                                    <div class="login-input-head">
                                            <p>Role</p>
                                   </div>
                              </div>
                                
                                  <div class="col-lg-8">
                                       
				                                    <select class="login-input-area" style="width:225px;background-color: light-grey;margin-top:12px;border: 1px ;" type="text" name="role" required>
		                                           
			                                         <option>Customer</option>
			                                         <option>Employee</option>
			                                        <option>Administrator</option>
			
			                                      </select>
                                         
                                  
                           </div>
                                </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>New Password</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                                <input type="password" name="newpassword" placeholder="New Password" required="true"/>
                                                <i class="fa fa-lock login-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="login-input-head">
                                                <p>Confirm Password</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="login-input-area">
                                                <input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" required="true" />
                                                <i class="fa fa-lock login-user" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="row">
                                        <div class="col-lg-4">

                                        </div>
                                        <div class="col-lg-8" >
                                            <div class="login-button-pro" >
                                               
                                                <button type="submit" style="background: rgb(18, 19, 18);" class="login-button login-button-lg" name="submit">Reset</button>

                                            </div>
                                            <p><a href="index.php" style="color: rgb(18, 19, 18);margin-left:-30px">Already Have Account ? Sign In</a></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
            <!-- login End-->
        </div>
    </div>
    <?php include_once('includes/footer.php');?>
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- form validate JS
		============================================ -->
    <script src="js/jquery.form.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/form-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>