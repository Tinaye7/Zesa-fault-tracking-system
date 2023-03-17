<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  
    <title>Dashboard | Fault Tracking System</title>
    
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
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- charts CSS
		============================================ -->
    <link rel="stylesheet" href="css/c3.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style2.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

	<!-- bootstrap theme-->
	
	<!-- font awesome -->
	
  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
</head>

<body class="materialdesign">
    
    <!-- Header top area start-->
    <div class="wrapper-pro" >
      <?php include_once('includes/sidebar.php');?>
        <!-- Header top area start-->
       <?php include_once('includes/header.php');?>
            <!-- Header top area end-->
            <!-- Breadcome start-->
            <div class="breadcome-area mg-b-30 small-dn" >
                <div class="container-fluid" >
                    <div class="row" >
                        <div class="col-lg-12">
                            <div class="breadcome-list map-mg-t-40-gl shadow-reset" >
                                <div class="row">
                                   
                                    <div class="col-lg-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="dashboard.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcome End-->
      
            <!-- Breadcome End-->
            <!-- income order visit user Start -->
            <div class="income-order-visit-user-area" style=margin-left:200px>
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-4">
                            <?php 
                            $sql ="SELECT ID from assets  ";
                            $query = $dbh -> prepare($sql);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $totalnewapp=$query->rowCount();
                            ?>

<div class="income-dashone-total income-monthly shadow-reset nt-mg-b-30">
                               
                               <div class="income-title">
                                   <div class="main-income-head">
                                       <h2>Assets</h2>
                                       <div class="main-income-phara">
                                           <p></p>
                                       </div>
                                   </div>
                               </div>
                               <div class="income-dashone-pro">
                                   <div class="income-rate-total">
                                       <div class="price-adminpro-rate">
                                           <h3><span class="counter"><?php echo htmlentities($totalnewapp);?></span></h3>
                                       </div>
                                       <div class="price-graph">
                                           <span id="sparkline1"></span>
                                       </div>
                                   </div>
                                   <div class="income-range">
                                      
                                       <a class="block text-center" href="new-birth-application2.php"><strong style="color:white">View Details</strong></a>
                                   </div>
                                   <div class="clear"></div>
                               </div>
                           </div>
                       </div>
                       <div class="col-lg-4">
                           <?php 
$sql ="SELECT ID from nodes ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalverapp=$query->rowCount();
?>
                            <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30">
                                 
                                <div class="income-title">

                                    <div class="main-income-head">
                                        <h2 style="color: black">Nodes</h2>
                                        <div class="main-income-phara order-cl">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter"><?php echo htmlentities($totalverapp);?></span></h3>
                                        </div>
                                        <div class="price-graph">
                                            <span id="sparkline6"></span>
                                        </div>
                                    </div>
                                    <div class="income-range order-cl">
                                        <a class="block text-center" href="verified-birth-application2.php"><strong style="color:white">View Detail</strong></a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <?php 
$sql ="SELECT ID from faults where Status='Rejected' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalrejapp=$query->rowCount();
?>
                            <div class="income-dashone-total visitor-monthly shadow-reset nt-mg-b-30">
                                
                                <div class="income-title">
                                    <div class="main-income-head">
                                        <h2>Faults</h2>
                                        <div class="main-income-phara visitor-cl">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="income-dashone-pro">
                                    <div class="income-rate-total">
                                        <div class="price-adminpro-rate">
                                            <h3><span class="counter"><?php echo htmlentities($totalrejapp);?></span></h3>
                                        </div>
                                        <div class="price-graph">
                                            <span id="sparkline2"></span>
                                        </div>
                                    </div>
                                    <div class="income-range visitor-cl">
                                        <a class="block text-center" href="rejected-birth-application2.php"><strong style="color:white">View Detail</strong></a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        
                    
                        
                       
                       
  
        
        
         
        </div>
    </div>
    <div style="margin-left:-200px;margin-right:10px;margin-top:170px">
    <?php include_once('includes/footer.php');?>
  </div>
    <!-- Footer End-->
   
   
</body>

</html><?php }  ?>