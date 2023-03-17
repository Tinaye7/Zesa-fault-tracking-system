var manageProductTable;

$(document).ready(function() {
	// top nav bar 
	$('#navProduct').addClass('active');
	// manage product data table
	manageProductTable = $('#manageProductTable').DataTable({
		'ajax': 'php_action/fetchProduct.php',
		'order': []
	});

	// add product modal btn clicked
	$("#addProductModalBtn").unbind('click').bind('click', function() {
		// // product form reset
		$("#submitProductForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		
		// submit product form
		$("#submitProductForm").unbind('submit').bind('submit', function() {

			// form validation
			
			var chassis = $("#chassis").val();
			var type = $("#type").val();
			var status = $("#status").val();
			var date = $("#date").val();
			var specifications = $("#specifications").val();
			var service = $("#service").val();
			
			
			if(chassis == "") {
				$("#chassis").after('<p class="text-danger">Chassis Number field is required</p>');
				$('#chassis').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#chassis").find('.text-danger').remove();
				// success out for form 
				$("#chassis").closest('.form-group').addClass('has-success');	  	
			}	// /else
			if(type == "") {
				$("#type").after('<p class="text-danger">Type field is required</p>');
				$('#type').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#type").find('.text-danger').remove();
				// success out for form 
				$("#type").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(status == "") {
				$("#status").after('<p class="text-danger">Status field is required</p>');
				$('#status').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#status").find('.text-danger').remove();
				// success out for form 
				$("#status").closest('.form-group').addClass('has-success');	  	
			}	// /else
			if(date == "") {
				$("#date").after('<p class="text-danger">Installation Date field is required</p>');
				$('#date').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#date").find('.text-danger').remove();
				// success out for form 
				$("#date").closest('.form-group').addClass('has-success');	  	
			}	// /else
			if(specifications == "") {
				$("#specifications").after('<p class="text-danger">Specifications field is required</p>');
				$('#specifications').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#specifications").find('.text-danger').remove();
				// success out for form 
				$("#specifications").closest('.form-group').addClass('has-success');	  	
			}	// /else

			

			if(service == "") {
				$("#service").after('<p class="text-danger">Service Routine field is required</p>');
				$('#service').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#service").find('.text-danger').remove();
				// success out for form 
				$("#service").closest('.form-group').addClass('has-success');	  	
			}	// /else

			

			if( chassis && type && status && date && specifications  && service) {
				// submit loading button
				$("#createProductBtn").button('loading');

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {

						if(response.success == true) {
							// submit loading button
							$("#createProductBtn").button('reset');
							
							$("#submitProductForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-product-messages').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert

		          // reload the manage student table
							manageProductTable.ajax.reload(null, true);

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');

						} // /if response.success
						
					} // /success function
				}); // /ajax function
			}	 // /if validation is ok 					

			return false;
		}); // /submit product form

	}); // /add product modal btn clicked
	

	// remove product 	

}); // document.ready fucntion

function editProduct(productId = null) {

	if(productId) {
		$("#productId").remove();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedProduct.php',
			type: 'post',
			data: {productId: productId},
			dataType: 'json',
			success:function(response) {		
			
				// modal spinner
				$('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');				

				

				// $("#editProductImage").fileinput({
		  //     overwriteInitial: true,
			 //    maxFileSize: 2500,
			 //    showClose: false,
			 //    showCaption: false,
			 //    browseLabel: '',
			 //    removeLabel: '',
			 //    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
			 //    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			 //    removeTitle: 'Cancel or reset changes',
			 //    elErrorContainer: '#kv-avatar-errors-1',
			 //    msgErrorClass: 'alert alert-block alert-danger',
			 //    defaultPreviewContent: '<img src="stock/'+response.product_image+'" alt="Profile Image" style="width:100%;">',
			 //    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
		  // 		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
				// });  

				// product id 
				$(".editProductFooter").append('<input type="hidden" name="productId" id="productId" value="'+response.product_id+'" />');				
				$(".editProductPhotoFooter").append('<input type="hidden" name="productId" id="productId" value="'+response.product_id+'" />');
								
				$("#editchassis").val(response.chassisnumber);
				// product name
				$("#edittype").val(response.type);
				// quantity
				$("#editstatus").val(response.status);
				// rate
				$("#editdate").val(response.installationdate);
				$("#editspecification").val(response.specification);
				// category name
				$("#editservice").val(response.serviceroutine);
				// status
				
				// update the product data function
				$("#editProductForm").unbind('submit').bind('submit', function() {

					// form validation
					
					var chassis = $("#editchassis").val();
					var type = $("#edittype").val();
					var status = $("#editstatus").val();
					var date = $("#editdate").val();
					var specification = $("#editspecification").val();
					var service = $("#editservice").val();
					
					if(chassis == "") {
						$("#editchassis").after('<p class="text-danger">Chassis field is required</p>');
						$('#editchassis').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editchassis").find('.text-danger').remove();
						// success out for form 
						$("#editchassis").closest('.form-group').addClass('has-success');	  	
					}	// /else


					if(type == "") {
						$("#edittype").after('<p class="text-danger">type field is required</p>');
						$('#edittype').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#edittype").find('.text-danger').remove();
						// success out for form 
						$("#edittype").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(status == "") {
						$("#editstatus").after('<p class="text-danger">status is required</p>');
						$('#editstatus').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editstatus").find('.text-danger').remove();
						// success out for form 
						$("#editstatus").closest('.form-group').addClass('has-success');	  	
					}	// /else
					if(date == "") {
						$("#editdate").after('<p class="text-danger">date field is required</p>');
						$('#editdate').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editdate").find('.text-danger').remove();
						// success out for form 
						$("#editdate").closest('.form-group').addClass('has-success');	  	
					}	// /else
					

					if(specification == "") {
						$("#editspecification").after('<p class="text-danger">specification field is required</p>');
						$('#editspecification').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editspecification").find('.text-danger').remove();
						// success out for form 
						$("#editspecification").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(service == "") {
						$("#editservice").after('<p class="text-danger">service field is required</p>');
						$('#editservice').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editservice").find('.text-danger').remove();
						// success out for form 
						$("#editservice").closest('.form-group').addClass('has-success');	  	
					}	// /else					

					if(chassis && type && status &&date &&specification && service ) {
						// submit loading button
						$("#editProductBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								console.log(response);
								if(response.success == true) {
									// submit loading button
									$("#editProductBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-product-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageProductTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // update the product data function

				 // /update the product image

			} // /success function
		}); // /ajax to fetch product image

				
	} else {
		alert('error please refresh the page');
	}
} // /edit product function

// remove product 
function removeProduct(productId = null) {
	if(productId) {
		// remove product button clicked
		$("#removeProductBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeProductBtn").button('loading');
			$.ajax({
				url: 'php_action/removeProduct.php',
				type: 'post',
				data: {productId: productId},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("#removeProductBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeProductModal").modal('hide');

						// update the product table
						manageProductTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					} else {

						// remove success messages
						$(".removeProductMessages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert

					} // /error
				} // /success function
			}); // /ajax fucntion to remove the product
			return false;
		}); // /remove product btn clicked
	} // /if id
} // /remove product function

function clearForm(oForm) {
	// var frm_elements = oForm.elements;									
	// console.log(frm_elements);
	// 	for(i=0;i<frm_elements.length;i++) {
	// 		field_type = frm_elements[i].type.toLowerCase();									
	// 		switch (field_type) {
	// 	    case "text":
	// 	    case "password":
	// 	    case "textarea":
	// 	    case "hidden":
	// 	    case "select-one":	    
	// 	      frm_elements[i].value = "";
	// 	      break;
	// 	    case "radio":
	// 	    case "checkbox":	    
	// 	      if (frm_elements[i].checked)
	// 	      {
	// 	          frm_elements[i].checked = false;
	// 	      }
	// 	      break;
	// 	    case "file": 
	// 	    	if(frm_elements[i].options) {
	// 	    		frm_elements[i].options= false;
	// 	    	}
	// 	    default:
	// 	        break;
	//     } // /switch
	// 	} // for
}