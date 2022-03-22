<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script src="<?=base_url()?>assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/plugins/owl-carousel/owl.carousel.min.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="<?=base_url()?>assets/plugins/imagesloaded.pkgd.js"></script>
<script src="<?=base_url()?>assets/plugins/masonry.pkgd.min.js"></script>
<script src="<?=base_url()?>assets/plugins/isotope.pkgd.min.js"></script>
<script src="<?=base_url()?>assets/plugins/slick/slick/slick.min.js"></script>
<script src="<?=base_url()?>assets/plugins/jquery.matchHeight-min.js"></script>
<script src="<?=base_url()?>assets/plugins/elevatezoom/jquery.elevatezoom.js"></script>
<!-- <script src="<?=base_url()?>assets/plugins/gmap3.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="<?=base_url()?>assets/plugins/waitMe/waitMe.js"></script>
<!-- Custom scripts-->
<script src="<?=base_url()?>assets/js/main.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-validator/validator.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAckIeA7eVaNv2fKmIKl-udHqlZW2tYxME&amp;region=GB"></script> -->


<script type="text/javascript">
	function productSearch() {
		var search = $('#proSearch').val();
		window.location = "<?=base_url()?>product/search/"+search;
	}

	$('#loginForm').on('submit', function (e) {
        if (!(e.isDefaultPrevented())) {
            e.preventDefault();
	        $.ajax({
	            type: "POST",
	            url: "<?=base_url()?>sign-in",
	            data: $('#loginForm').serialize(),
	            success: function(result) {
	                var responsedata = $.parseJSON(result);
	                if(responsedata.status=='success'){
	                    window.location.href = "<?=base_url()?>"+responsedata.message;
	                }else{
	                    document.getElementById('loginForm').reset(); 
	                    $('#loginForm').find("input").val("");
	                    toastr["error"](responsedata.message);
	                }
	            },
	            error: function(result) {
	                toastr["error"](result);
	            }
	        });
	    }
    });

    $('#subscribe_form').on('submit', function (e) {
        if (!(e.isDefaultPrevented())) {
            e.preventDefault();
	        $.ajax({
	            type: "POST",
	            url: "<?=base_url()?>subscribe-mail",
	            data: $('#subscribe_form').serialize(),
	            success: function(result) {
	                var responsedata = $.parseJSON(result);
	                if(responsedata.status=='success'){
	                    toastr["success"](responsedata.message);
	                }else if(responsedata.status=='info'){
	                    toastr["info"](responsedata.message);
	                }else{
	                    toastr["error"](responsedata.message);
	                }
	                document.getElementById('subscribe_form').reset(); 
	                $('#subscribe_form').find("input").val("");
	            },
	            error: function(result) {
	                toastr["error"](result);
	            }
	        });
	    }
    });

    function forgotPass() {
    	var email = $('#modalloginemail').val().trim();
    	if (email!='') {
    		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    	if (re.test(String(email).toLowerCase())) {
	    		$.ajax({
		            type: "POST",
		            url: "<?=base_url()?>forgot-password",
		            data: 'email='+email,
		            success: function(result) {
		                var responsedata = $.parseJSON(result);
		                if(responsedata.status=='success'){
		                    toastr["success"](responsedata.message);
		                }else{
		                    toastr["error"](responsedata.message);
		                }
		                $('#loginForm').find("input").val("");
		                $('#login-popup').modal('hide');
		            },
		            error: function(result) {
		                toastr["error"](result);
		            }
		        });
	    	}else{
	    		toastr["error"]("Enter valid email address");
	    	}
    	}else{

    	}
    }
</script>