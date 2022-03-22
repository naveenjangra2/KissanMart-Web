<!DOCTYPE html>

<html lang="en">



<head>

	<?php $this->load->view('includes/head'); ?>

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

			<!-- Header -->

			<?php $this->load->view('includes/header'); ?>

			<!-- /Header --> 

			<!-- Page Content -->

			<main class="page-main">

				<div class="block">

					<div class="container">

						<ul class="breadcrumbs">

							<li><a href="<?=base_url()?>"><i class="icon icon-home"></i></a></li>

							<li>/<span><?=$page->headline?></span></li>

						</ul>

					</div>

				</div>

				<div class="block">

					<div class="container">

						<div class="row">

							<div class="col-sm-5">

								<div class="text-wrapper">

									<h2>Contact Details</h2>

									<div class="address-block">

										<h3>ADDRESS</h3>

										<ul class="simple-list">

											<li><i class="icon icon-location-pin"></i>Adress: FANCY POINT(PVT)LTD,85, Galle Road, Wellawatte, Colombo-06, Sri Lanka</li>

											<li><i class="icon icon-phone"></i>Phone: +94 (0)11 2599877</li>

											<li><i class="icon icon-phone"></i>Fax: +94 (0)11 2505710</li>

											<li><i class="icon icon-close-envelope"></i>Email: <a href="mailto:info@fancypoint.lk">info@fancypoint.lk</a></li>

										</ul>

									</div> 

								</div>

							</div>

							<div class="col-sm-7">

								<div class="text-wrapper">

									<h2>Contact Information</h2> 

									<form id="contact-form" class="contact-form white" data-toggle="validator" method="post">

										<div class="form-group">

											<label>Name<span class="required">*</span></label>

											<input type="text" class="form-control input-lg" name="fname" pattern="^[a-zA-Z. ]+$" data-minlength="3" placeholder="Full Name" data-pattern-error="Invalid full name" data-error="Minimum of 3 characters" data-required-error="Full name is required" required>

											<div class="help-block with-errors"></div>

										</div>

										<div class="form-group">

											<label>E-mail<span class="required">*</span></label>

											<input type="email" class="form-control input-lg" name="email" placeholder="Email Address" data-error="Please enter a valid email address." required>

											<div class="help-block with-errors"></div>

										</div>

										<div class="form-group">

											<label>Mobile<span class="required">*</span></label>

											<input  type="number" class="form-control input-lg" name="mobile" placeholder="Mobile Number" data-minlength="9" data-error="Mobile number is invalid" data-required-error="Mobile number is required" required>

											<div class="help-block with-errors"></div>

										</div>

										<div class="form-group">

											<label>Subject<span class="required">*</span></label>

											<input class="form-control input-lg" type="text" name="subject" placeholder="Subject" data-minlength="3" data-error="Minimum of 3 characters" data-required-error="Subject is required" required>

											<div class="help-block with-errors"></div>

										</div>

										<div class="form-group">

											<label>Message<span class="required">*</span></label>

											<textarea class="form-control input-lg" name="message" rows="6" placeholder="Message" data-minlength="5" data-error="Minimum of 5 characters" data-required-error="Message is required" required></textarea>

											<div class="help-block with-errors"></div>

										</div>

										<div>

											<button class="btn btn-lg" id="submit">Submit</button>

										</div> 

									</form>

								</div>

							</div>

						</div>

					</div>

				</div> 

			</main>

			<!-- /Page Content -->

			<!-- Footer -->

			<!-- whatsapp -->
			<?php $this->load->view('includes/whatsapp'); ?>

			<?php $this->load->view('includes/footer'); ?>

			<!-- /Footer -->

		</div>

		<!-- Page Content -->

	</div> 



	<!-- jQuery Scripts  -->

	<?php $this->load->view('includes/footerjs'); ?>

	<script type="text/javascript">

        $('#contact-form').validator().on('submit', function (e) {

            if (!(e.isDefaultPrevented())) {

                e.preventDefault();

                $.ajax({

                    type: "POST",

                    url: "<?=base_url()?>send-message",

                    data: $('#contact-form').serialize(),

                    success: function(result) {

                        var responsedata = $.parseJSON(result);

                        if(responsedata.status=='success'){

                            document.getElementById('contact-form').reset(); 

                            $('#contact-form').find("input").val("");

                            $('#contact-form').find("textarea").val("");

                            $('#contact-form').validator('destroy').validator();

                            toastr["success"](responsedata.message)

                        }else{

                            toastr["error"](responsedata.message)

                        }

                    },

                    error: function(result) {

                        toastr["error"]('Error :'+result)

                    }

                });

            }

        });

    </script>

	</div>

</body>



</html>