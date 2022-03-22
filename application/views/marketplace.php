<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view("includes/head"); ?>
		<!-- Fix Internet Explorer ______________________________________-->

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->
			
	</head>

	<body>
		<div class="main-page-wrapper">


			<!-- ********************** Loading Transition ************************ -->
			<div id="loader-wrapper">
				<div id="loader"></div>
			</div>

			<div class="html-top-content">
				<!-- ********************** Theme Top Banne & Header ************************ -->
				<div class="theme-top-section">
					
				<!-- ^^^^^^^^^^^^^^^^^ Theme Menu ^^^^^^^^^^^^^^^ -->
				<?php $this->load->view("includes/header"); ?>	
				<!-- /.theme-main-menu -->
					


					<!-- ^^^^^^^^^^^^^^^^^ Theme Banner ^^^^^^^^^^^^^^^ -->
					<div id="theme-banner" class="theme-banner-one ">
						
						
						<!--  -->
						<div class="container main-text-wrapper2">
						<div class="row single-block">
							<div class="col-lg-3" style="border-right: 1px solid #e7e2e2;">
								<div class="text">
									<span class="title bold">Select Commodity</span>
									 <!-- <ul>
        
        								<li>
        								    <input type="radio" name="radio-btn" />Male</li>
        								<li>
        								    <input type="radio" name="radio-btn" />Female</li>
    								</ul> -->
    								<ul>
        
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Chana</span>

   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Tur Dal</span>
								
   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Moong</span>

   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Urad</span>
								
   								     </li>

   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Moong Dal</span>
								
   								     </li>

   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Kahuta</span>
								
   								     </li>
									<hr>
									<span class="title bold">Location</span>
									 <!-- <ul>
        
        								<li>
        								    <input type="radio" name="radio-btn" />Male</li>
        								<li>
        								    <input type="radio" name="radio-btn" />Female</li>
    								</ul> -->
    								<ul>
        
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Lahore</span>

   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Islamabad</span>
								
   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Karachi</span>

   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Gujrawala</span>
								
   								     </li>

   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Punjab</span>
								
   								     </li>

   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Kahuta</span>
								
   								     </li>
    							</ul>
   								<!--  <ul>
        
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Commodity-1</span>

   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Commodity-2</span>
								
   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Commodity-3</span>

   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Commodity-4</span>
								
   								     </li>
    							</ul>
									<br>
									<span class="title bold"><span>Select Market</span></span>
									<ul>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Market-1</span>

   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Market-2</span>
								
   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Market-3</span>

   								     </li>
   								     <li>
   								         <input type="checkbox" name="check-box" /> <span>Market-4</span>
								
   								     </li>
    							</ul> -->
								</div> <!-- /.text -->
							</div> <!-- /.col- -->
							<div class="col-lg-9 img-box">
								<div>
									<ul class="market-list">
										<li>
											
											<div class="row">
												<div class="col-3 col-lg-2 gap"><img class="img-circle" src="<?=base_url()?>assets/images/crops/1.jpg" alt=""></div>
												<div class="col-9 col-lg-10">
													<span class="pull-left">
													<span class="bold">Sunflower</span>
													<span class="block " style="padding:0px;"><span class="list-padd0">Lahore Mandi</span>
													</span></span>
													<span class="pull-right">
														<span class="block black">PKR 986</span>
														<span class="list-padd0" style="font-size:14px; ">Per Quintal</span>
													</span>
												</div>
											</div>
										</li>

										<li>
											
											<div class="row">
												<div class="col-3 col-lg-2 gap"><img class="img-circle" src="<?=base_url()?>assets/images/crops/2.jpg" alt=""></div>
												<div class="col-9 col-lg-10">
													<span class="pull-left">
													<span class="bold">Rice</span>
													<span class="block " style="padding:0px;"><span class="list-padd0">Lahore Mandi</span>
													</span></span>
													<span class="pull-right">
														<span class="block black">PKR 986</span>
														<span class="list-padd0" style="font-size:14px; ">Per Quintal</span>
													</span>
												</div>
											</div>
										</li>


										<li>
											
											<div class="row">
												<div class="col-3 col-lg-2 gap"><img class="img-circle" src="<?=base_url()?>assets/images/crops/3.jpg" alt=""></div>
												<div class="col-9 col-lg-10">
													<span class="pull-left">
													<span class="bold">Tomato</span>
													<span class="block " style="padding:0px;"><span class="list-padd0">Lahore Mandi</span>
													</span></span>
													<span class="pull-right">
														<span class="block black">PKR 986</span>
														<span class="list-padd0" style="font-size:14px; ">Per Quintal</span>
													</span>
												</div>
											</div>
										</li>

										<li>
											
											<div class="row">
												<div class="col-3 col-lg-2 gap"><img class="img-circle" src="<?=base_url()?>assets/images/crops/4.jpg" alt=""></div>
												<div class="col-9 col-lg-10">
													<span class="pull-left">
													<span class="bold">Melon</span>
													<span class="block " style="padding:0px;"><span class="list-padd0">Lahore Mandi</span>
													</span></span>
													<span class="pull-right">
														<span class="block black">PKR 986</span>
														<span class="list-padd0" style="font-size:14px; ">Per Quintal</span>
													</span>
												</div>
											</div>
										</li>

										<li>
											
											<div class="row">
												<div class="col-3 col-lg-2 gap"><img class="img-circle" src="<?=base_url()?>assets/images/crops/1.jpg" alt=""></div>
												<div class="col-9 col-lg-10">
													<span class="pull-left">
													<span class="bold">Sunflower</span>
													<span class="block " style="padding:0px;"><span class="list-padd0">Lahore Mandi</span>
													</span></span>
													<span class="pull-right">
														<span class="block black">PKR 986</span>
														<span class="list-padd0" style="font-size:14px; ">Per Quintal</span>
													</span>
												</div>
											</div>
										</li>

										<li>
											
											<div class="row">
												<div class="col-3 col-lg-2 gap"><img class="img-circle" src="<?=base_url()?>assets/images/crops/2.jpg" alt=""></div>
												<div class="col-9 col-lg-10">
													<span class="pull-left">
													<span class="bold">Rice</span>
													<span class="block " style="padding:0px;"><span class="list-padd0">Lahore Mandi</span>
													</span></span>
													<span class="pull-right">
														<span class="block black">PKR 986</span>
														<span class="list-padd0" style="font-size:14px; ">Per Quintal</span>
													</span>
												</div>
											</div>
										</li>

										<li>
											
											<div class="row">
												<div class="col-3 col-lg-2 gap"><img class="img-circle" src="<?=base_url()?>assets/images/crops/3.jpg" alt=""></div>
												<div class="col-9 col-lg-10">
													<span class="pull-left">
													<span class="bold">Tomato</span>
													<span class="block " style="padding:0px;"><span class="list-padd0">Lahore Mandi</span>
													</span></span>
													<span class="pull-right">
														<span class="block black">PKR 986</span>
														<span class="list-padd0" style="font-size:14px; ">Per Quintal</span>
													</span>
												</div>
											</div>
										</li>
										
									</ul>		
								</div>
							</div>
						</div> <!-- /.row -->

						

						
					</div>

					</div> <!-- /.theme-banner-one -->
				</div> <!-- /.theme-top-section -->
				



		        <!--
				=====================================================
					Our Feature
				=====================================================
				-->
				 <!-- /.our-features -->



		        <!--
				=====================================================
					Our Feature Two
				=====================================================
				-->
				 <!-- /.our-feature-two -->



				<!--
				=====================================================
					Apps Overview
				=====================================================
				-->
				<!-- /.apps-overview -->
				
				


				<!--
				=====================================================
					Theme Counter
				=====================================================
				-->
				<!-- /.theme-counter -->


				<!--
				=====================================================
					Our Work Progress
				=====================================================
				-->
				 <!-- /.our-work-progress -->





				<!--
				=====================================================
					Testimonial Section
				=====================================================
				-->
				 <!-- /.testimonial-section -->



				<!-- 
				=============================================
					Contact Us One
				============================================== 
				-->
				 <!-- /.contact-us-one -->


				<!--
				=====================================================
					Partner Slider
				=====================================================
				-->
				




				<!--
				=====================================================
					Footer 
				=====================================================
				-->
				<?php $this->load->view("includes/footer");?>

			</div> <!-- /.html-top-content -->


			
	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s color-one-bg">
				<i class="fa fa-long-arrow-up" aria-hidden="true"></i>
			</button>

  <!-- Trigger the modal with a button -->
 

  <!-- Modal -->

<!-- Js File_________________________________ -->
<?php $this->load->view("includes/footerjs");?>

<script type="text/javascript">
	$('input[name="radio-btn"]').wrap('<div class="radio-btn"><i></i></div>');
	$(".radio-btn").on('click', function () {
    var _this = $(this),
        block = _this.parent().parent();
		block.find('input:radio').attr('checked', false);
		block.find(".radio-btn").removeClass('checkedRadio');
		_this.addClass('checkedRadio');
		_this.find('input:radio').attr('checked', true);
	});
	$('input[name="check-box"]').wrap('<div class="check-box"><i></i></div>');
	$.fn.toggleCheckbox = function () {
		this.attr('checked', !this.attr('checked'));
	}
	$('.check-box').on('click', function () {
		$(this).find(':checkbox').toggleCheckbox();
		$(this).toggleClass('checkedBox');
	});

</script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>