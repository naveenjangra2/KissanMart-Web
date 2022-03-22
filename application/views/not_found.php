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
			<?php $this->load->view('includes/header'); ?>
			<!-- /Header --> 
			<!-- Page Content -->
			<main class="page-main">
				<div class="block fullwidth fullheight page_404">
					<div class="container">
						<div class="image-404">
							<img src="<?=base_url()?>assets/images/404.png" alt="">
							<div class="text-404">The page cannot be found</div>
						</div>
						<div><a href="<?=base_url()?>" class="btn">Return Back</a></div>
					</div>
				</div>
			</main>
		</div>
		<!-- Page Content -->
	</div> 

	<!-- jQuery Scripts  -->
	<?php $this->load->view('includes/footerjs'); ?>


</body>

</html>