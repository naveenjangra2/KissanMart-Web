<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('includes/head'); ?>
	<style type="text/css">
        svg {
          width: 100px;
          display: block;
          margin: 40px auto 0;
        }
        @-webkit-keyframes dash {
          0% {
            stroke-dashoffset: 1000;
          }
          100% {
            stroke-dashoffset: 0;
          }
        }
        @keyframes dash {
          0% {
            stroke-dashoffset: 1000;
          }
          100% {
            stroke-dashoffset: 0;
          }
        }
        @-webkit-keyframes dash-check {
          0% {
            stroke-dashoffset: -100;
          }
          100% {
            stroke-dashoffset: 900;
          }
        }
        @keyframes dash-check {
          0% {
            stroke-dashoffset: -100;
          }
          100% {
            stroke-dashoffset: 900;
          }
        }
    </style>
</head>
<body class="boxed">
	<!-- Loader -->
	<div id="loader-wrapper">
		<div class="cube-wrapper">
			<div class="cube-folding">
				<span class="leaf1"></span>
				<span class="leaf2"></span>
				<span class="leaf3"></span>
				<span class="leaf4"></span>
			</div>
		</div>
	</div>
	<!-- /Loader -->
	<div class="fixed-btns">
		<!-- Back To Top -->
		<a href="#" class="top-fixed-btn back-to-top"><i class="icon icon-arrow-up"></i></a>
		<!-- /Back To Top -->
	</div>
	<div id="wrapper">
		<!-- Page -->
		<div class="page-wrapper">
			<!-- Header -->
			<?php $this->load->view('includes/header'); ?>
			<!-- /Header -->
			<!-- Sidebar --> 
			<!-- Page Content -->
			<main class="page-main">
				<div class="block">
					<div class="container">
						<ul class="breadcrumbs">
							<li><a href="<?=base_url()?>"><i class="icon icon-home"></i></a></li>
							<li>/<span>Reset Password</span></li>
						</ul>
					</div>
				</div>
				<?php if($valid==2||$valid==3){?>
				<div class="block">
					<div class="container">
						<div class="row row-eq-height"> 
							<div class="col-sm-12">
								<div class="form-card">
									<h4>Reset Password</h4>
									<div class="ps-container" style="text-align: center;">
						                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
						                  <circle class="path circle" fill="none" stroke="#D06079" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
						                  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3"/>
						                  <line class="path line" fill="none" stroke="#D06079" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" x2="34.4" y2="92.2"/>
						                </svg>
						                <div style="margin: 40px 10% 0;line-height: 2em;">
						                  <?php if($valid==2){?>
						                    <p><strong>SORRY!!</strong> This link is expired.</p>
						                    <p>Please get a new link from provid your email in the signin page.</p>
						                    <p>Thank You</p>
						                    <p>Have a Wonderful day.</p>
						                  <?php }elseif ($valid==3) {?>
						                    <p><strong>SORRY!!</strong> This link is invalid.</p>
						                    <p>Please get a new link from provid your email in the signin page.</p>
						                    <p>Thank You</p>
						                    <p>Have a Wonderful day.</p>
						                  <?php } ?>
						                </div>
						                <h5 class="countdownDiv">
						                  Back to home after <b id="countdown">10</b> seconds
						                </h5>
						            </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php }elseif ($valid==1) {?>
				<div class="block">
					<div class="container">
						<div class="row row-eq-height">
							<div class="col-sm-6">
								<div class="form-card">
									<h4>Reset Password</h4>
									<form class="account-create" data-toggle="validator" id="reset-form">
										<div class="form-group">
											<label>New Password<span class="required">*</span></label>
											<input type="password" placeholder="New Password" class="form-control input-lg" data-minlength="6" name="password" id="password" data-error="Minimum of 6 characters" data-required-error="New Password is Required" required>
											<div class="help-block with-errors"></div>
										</div>
										<div class="form-group">
											<label>Confirm Password<span class="required">*</span></label>
											<input type="password" class="form-control input-lg" data-match="#password" data-match-error="Password doesn't match" placeholder="Confirm password" data-required-error="Confirm Password is Required" required>
										</div> 
										<div>
											<button type="submit" class="btn btn-lg">submit</button></div> 
									</form>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-card"> 
									<h3>Something Coming...</h3>
									<p>
										By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more. By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more. 
									</p> 
									<p>
										By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more. By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more. 
									</p>  
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</main>
			<!-- /Page Content -->

			<!-- whatsapp -->
			<?php $this->load->view('includes/whatsapp'); ?>

			<!-- Footer -->
			<?php $this->load->view('includes/footer'); ?>
			<!-- /Footer -->
		</div>
		<!-- Page Content -->
	</div>  
	<!-- jQuery Scripts  -->
	<?php $this->load->view('includes/footerjs'); ?>
	<script type="text/javascript">
        <?php if($valid==2||$valid==3){?>
          var seconds = 10;
          function countdown() {
              seconds = seconds - 1;
              if (seconds < 0) {
                window.location = "<?=base_url()?>";
              } else {
                  document.getElementById("countdown").innerHTML = seconds;
                  window.setTimeout("countdown()", 1000);
              }
          }
          countdown();
        <?php }elseif ($valid==1) {?>
            $('#reset-form').validator().on('submit', function (e) {
                if (!(e.isDefaultPrevented())) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url()?>reset-pass",
                        data: $('#reset-form').serialize(),
                        success: function(result) {
                            var responsedata = $.parseJSON(result);
                            if(responsedata.status=='success'){
                                toastr["success"](responsedata.message)
                                document.getElementById('reset-form').reset(); 
                                $('#reset-form').find("input").val("");
                            }else{
                                toastr["error"](responsedata.message)
                            }
                            setTimeout(function(){
                                window.location = "<?=base_url()?>";
                            }, 500);
                        },
                        error: function(result) {
                            toastr["error"]('Error :'+result)
                        }
                    });
                }
            });
        <?php } ?>
    </script>
</body>
</html>