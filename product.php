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
<div class="wrapper-pro" >
      <?php include_once('includes/sidebar.php');?>
        <!-- Header top area start-->
       <?php include_once('includes/header.php');?>
            <!-- Header top area end-->    
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
			
			<div class="data-table-area mg-b-15" style=margin-left:200px>
                <div class="container-fluid">
<div class="row">
	<div class="col-md-12">

		

		<div class="panel panel-default">
			
			<div class="panel-body">

				

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-success button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Asset </button>
				</div> <!-- /div-action -->				
				
				<table class="table table-hover table-striped table-bordered" id="manageProductTable">
					<thead>
						<tr>
							
							<th style="width:15%;">Chassis Number</th>							
							<th>Type</th>
							<th> Status</th>
							<th> Installation Date</th>
						<th>Specifications</th>
							<th style="width:20%;"> Service Routine (Days)</th>
							
							<th style="width:15%;">Options</th>
						</tr>
					</thead>




					
				</table>
				<!-- /table -->








				
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	
  
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Asset</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

	      		     	           	       
			  <div class="form-group">
	        	<label for="chassis" class="col-sm-3 control-label">Chassis Number </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="chassis" placeholder="Chassis Number" name="chassis" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
	       
			<div class="form-group">
			        	<label for="type" class="col-sm-3 control-label">Type </label>
			        
						    <div class="col-sm-8">
						      <select class="form-control" id="type" name="type">
						      	<option value="">~~SELECT~~</option>
						      	<option value="1">Transformer</option>
						      	<option value="2">Not Available</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->		    
					<div class="form-group">
			        	<label for="status" class="col-sm-3 control-label">Status</label>
			        	
						    <div class="col-sm-8">
						      <select class="form-control" id="status" name="status">
						      	<option >~~SELECT~~</option>
						      	<option >Operational</option>
						      	<option >Unused</option>
								  <option >Used</option>
								  <option >Faulted</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	
	        <div class="form-group">
	        	<label for="date" class="col-sm-3 control-label">Installation Date </label>
	        	
				    <div class="col-sm-8">
				      <input type="date"  class="form-control" id="date" placeholder="Installation Date" name="date" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 
			<div class="form-group">
	        	<label for="specifications" class="col-sm-3 control-label">Specifications </label>
	        	
				    <div class="col-sm-8">
				      <input type="text"  class="form-control" id="specifications" placeholder="Specifications" name="specifications" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	
			<div class="form-group">
	        	<label for="service" class="col-sm-3 control-label">Service Routine (Days) </label>
	        	
				    <div class="col-sm-8">
				      <input type="number"  class="form-control" id="service" placeholder="Service Routine (Days)" name="service" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	  
			<div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
  </div>
  </div>

  <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Product</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    
				    <li role="presentation"><a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab">Product Info</a></li>    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				  	
				         	           	       
				    	
			      		     	           	       

			       
				    <!-- product image -->
				    <div role="tabpanel" class="tab-pane" id="productInfo">
				    	<form class="form-horizontal" id="editProductForm" action="php_action/editProduct.php" method="POST">				    
				    	<br />


						
				    	<div id="edit-product-messages"></div>
						<div class="form-group">
			        	<label for="editchassis" class="col-sm-3 control-label">Chassis Number </label>
			        	
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editchassis" placeholder="Chassis Number" name="editchassis" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	
					<div class="form-group">
			        	<label for="edittype" class="col-sm-3 control-label">Type </label>
			        
						    <div class="col-sm-8">
						      <select class="form-control" id="edittype" name="edittype">
						      	<option value="">~~SELECT~~</option>
						      	<option >Transformer</option>
						      	<option >Not Available</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->		    
					<div class="form-group">
			        	<label for="editstatus" class="col-sm-3 control-label">Status</label>
			        	
						    <div class="col-sm-8">
						      <select class="form-control" id="editstatus" name="editstatus">
						      	<option >~~SELECT~~</option>
						      	<option >Operational</option>
						      	<option >Unused</option>
								  <option >Used</option>
								  <option >Faulted</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	
			        <div class="form-group">
			        	<label for="editdate" class="col-sm-3 control-label">Installation Date </label>
			        	
						    <div class="col-sm-8">
						      <input type="date"  class="form-control" id="editdate" placeholder="Installation Date" name="editdate" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->
					<div class="form-group">
			        	<label for="editspecification" class="col-sm-3 control-label">Specifications </label>
			        	
						    <div class="col-sm-8">
						      <input type="text"  class="form-control" id="editspecification" placeholder="Specification" name="editspecification" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->
					<div class="form-group">
			        	<label for="editservice" class="col-sm-3 control-label">Service Routine (Days) </label>
			        	
						    <div class="col-sm-8">
						      <input type="number"  class="form-control" id="editservice" placeholder="Service Routine" name="editservice" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->
					<div class="modal-footer editProductFooter">
				        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				        
				        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /product info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
  </div>
  </div>
  </div>


  <div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Product</h4>
      </div>
      <div class="modal-body">

      	<div class="removeProductMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="custom/js/product.js"></script>
  <div style="margin-left:-200px;margin-right:10px;margin-top:100px">
    <?php include_once('includes/footer.php');?>
  </div>

	

</body>

</html><?php }  ?>