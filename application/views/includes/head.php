<meta charset="UTF-8">
<meta name="keywords" content="crypto, mining, animation, example, examples">
<meta name="author" content="Creativegigs">
<meta name="description" content="Leading the next big agri-innovation..">
<meta name='og:image' content='<?=base_url()?>assets/images/home/ogg.png'>

<!-- For IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- For Resposive Device -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>KisaanMart :: Home</title>

<!-- Favicon -->
<link rel="icon" type="image/png" sizes="56x56" href="<?=base_url()?>assets/images/fav-icon/icon.png">

<!-- Main style sheet -->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/style.css">
<!-- responsive style sheet -->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/responsive.css">
<!-- Color Css -->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/color-one.css">
<!-- toastr Css -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<!-- validate Css -->
<link href="<?=base_url()?>assets/css/validin.css" rel="stylesheet"/>
<!-- multi-select Css -->
<link href="<?=base_url()?>assets/css/filter_multi_select.css" rel="stylesheet"/>


<!-- Fix Internet Explorer ______________________________________-->

<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="vendor/html5shiv.js"></script>
	<script src="vendor/respond.js"></script>
<![endif]-->
<!--custom css-->
<style>
	select{
		width: 100%;
		margin: 7px 0px;
		display: inline-block;
		padding: 12px 25px;
		box-sizing: border-box;
		border-radius: 5px;
		border: 1px solid lightgrey;
		font-size: 1em;
		font-family: inherit;
		background: white;
	}
	#submit_button button{
		background: #80b14a;
		border-radius: 5px;
		padding: 8px 20px;
		display: inline-block;
		margin: 10px;
		/* font-weight: bold; */
		color: white;
		cursor: pointer;
		box-shadow: 0px 2px 5px rgb(0 0 0 / 50%);
	}
	/* Chrome, Safari, Edge, Opera */
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
	-webkit-appearance: none;
	margin: 0;
	}

	/* Firefox */
	input[type=number] {
	-moz-appearance: textfield;
	}

	input.invalid {
		border-color:#e53935; 
	}

	.validation_error {
		margin: .4em 0 1em;
		color: #e53935;
		font-size: .7em;
		text-transform:uppercase;
		/* letter-spacing: .15em; */
	}

	.buttonNew{
		background: #80b14a;
		border-radius: 5px;
		padding: 8px 20px;
		display: inline-block;
		margin: 10px;
		/* font-weight: bold; */
		color: white;
		cursor: pointer;
		box-shadow: 0px 2px 5px rgb(0 0 0 / 50%);
	}

	#validSubmit{
		background: #80b14a;
		/* border-radius: 0px; */
		border: none;
		padding: 8px 20px;
		/* display: inline-block; */
		margin: 10px 0px;
		/* font-weight: bold; */
		color: white;
		cursor: pointer;
		box-shadow: 0px 2px 5px rgb(0 0 0 / 50%);
	}

	#submit{
		box-shadow: none;
		background-color: #ffffff;
	}

	.hideTab{
		display: none; 
		transform: translateX(-100px);
	}
	
	.showTab{
		display: block;
		transform: translateX(0px);
	}
</style>