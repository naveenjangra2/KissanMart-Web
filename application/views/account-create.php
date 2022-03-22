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
				<div class="block">
					<div class="container">
						<ul class="breadcrumbs">
							<li><a href="index.html"><i class="icon icon-home"></i></a></li>
							<li>/<span>My Dashboard</span></li>
						</ul>
					</div>
				</div>
				<div class="block">
					<div class="container">
						<div class="page-title">
							<div class="title">
								<h1>My Dashboard</h1>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="white-sideblock">
									<ul class="category-list">
										<li class="active"><a href="#">Account Details</a></li>
										<li><a href="myaccount-adresses.html">My Addresses</a></li>
										<li><a href="myaccount-wishlist.html">My Wishlist</a></li>
										<li><a href="myaccount-history.html">My Order History</a></li>
									</ul>
								</div>
								<div class="divider divider-lg"></div>
							</div>
							<div class="col-md-9">
								<h2>Account Details</h2>
								<div class="white-card">
									<p><b>Name:</b> Jenny Raider</p>
									<p><b>E-mail:</b> jennyraider@hotmail.com</p>
									<p><b>Phone:</b> 876-432-4323</p>
									<p>
										<a href="#">Edit</a> |
										<a href="#">Delete</a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="divider"></div>
			</main>
			<!-- /Page Content -->
			<!-- Footer -->
			<?php $this->load->view('includes/footer'); ?>
			<!-- /Footer -->
		</div>
		<!-- Page Content -->
	</div>
	<!-- ProductStack -->
	<div class="productStack disable hide_on_scroll"> <a href="#" class="toggleStack"><i class="icon icon-cart"></i> (6) items</a>
		<div class="productstack-content">
			<div class="products-list-wrapper">
				<ul class="products-list">
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-10.jpg" alt=""></a> <span class="item-qty">3</span>
						<div class="actions"> <a href="#" class="action edit" title="Edit item"><i class="icon icon-pencil"></i></a> <a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-11.jpg" alt=""></a> <span class="item-qty">3</span>
						<div class="actions"> <a class="action edit" href="#" title="Edit item"><i class="icon icon-pencil"></i></a> <a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-12.jpg" alt=""></a> <span class="item-qty">3</span>
						<div class="actions"> <a class="action edit" href="#" title="Edit item"><i class="icon icon-pencil"></i></a> <a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-13.jpg" alt=""></a> <span class="item-qty">3</span>
						<div class="actions"> <a class="action edit" href="#" title="Edit item"><i class="icon icon-pencil"></i></a> <a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-14.jpg" alt=""></a> <span class="item-qty">3</span>
						<div class="actions"> <a class="action edit" href="#" title="Edit item"><i class="icon icon-pencil"></i></a> <a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
					<li>
						<a href="product.html" title="Product Name Long Name"><img class="product-image-photo" src="images/products/product-15.jpg" alt=""></a> <span class="item-qty">3</span>
						<div class="actions"> <a class="action edit" href="#" title="Edit item"><i class="icon icon-pencil"></i></a> <a class="action delete" href="#" title="Delete item"><i class="icon icon-trash-alt"></i></a>
							<div class="edit-qty">
								<input type="number" value="3">
								<button type="button" class="btn">Apply</button>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="action-cart">
				<button type="button" class="btn" title="Checkout"> <span>Checkout</span> </button>
				<button type="button" class="btn" title="Go to Cart"> <span>Go to Cart</span> </button>
			</div>
			<div class="total-cart">
				<div class="items-total">Items <span class="count">6</span></div>
				<div class="subtotal">Subtotal <span class="price">2.150</span></div>
			</div>
		</div>
	</div>
	<!-- /ProductStack -->

	<!-- Modal Quick View -->
	<div class="modal quick-view zoom" id="quickView">
		<div class="modal-dialog">
			<div class="modalLoader-wrapper">
				<div class="modalLoader bg-striped"></div>
			</div>
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">&#10006;</button>
			</div>
			<div class="modal-content">
				<iframe></iframe>
			</div>
		</div>
	</div>
	<!-- /Modal Quick View -->

	<!-- jQuery Scripts  -->
	<?php $this->load->view('includes/footerjs'); ?> 

</body>

</html>