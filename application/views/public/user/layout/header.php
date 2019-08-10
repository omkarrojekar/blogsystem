<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/normalize.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/linearicons.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/owl.theme.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/prettyPhoto.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/flipclock.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/slick.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/slick-theme.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/color.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/transitions.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/local/css/responsive.css">
	<script src="<?php echo base_url();?>assets/local/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body class="tg-home">
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="tg-header" class="tg-header tg-haslayout">
			<div class="clearfix"></div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<div class="tg-logoarea">
							<strong class="tg-logo"><a href="index.html"><img src="<?php echo base_url(); ?>assets/local/images/loo.png" alt="image description"></a></strong>
							<div class="tg-addbox"><a href="javascript:void(0);"><img src="<?php echo base_url(); ?>assets/local/images/placeholder/add-01-770x0.jpg" alt="image description"></a></div>
						</div>
						<div class="tg-navigationarea">
							<nav id="tg-nav" class="tg-nav">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#tg-navigation" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
									<ul>
										<li class="current-menu-item menu-item-has-children">
											<a href="<?php echo base_url(); ?>">Home</a>
											<ul class="sub-menu">
												<li><a href="<?php echo base_url(); ?>home/category/<?= strtolower(url_title('Pathogenesis of Disease')) ?>">Pathogenesis of Disease</a></li>
											</ul>
										</li>
										<li class="menu-item-has-children"><a href="<?php echo base_url(); ?>home/category/<?= strtolower(url_title('Diseases')) ?>">Diseases</a>
											<ul class="sub-menu">
												<li class="menu-item-has-children"><a href="<?php echo base_url(); ?>home/category/<?= strtolower(url_title('Lymphoma')) ?>">Lymphoma</a>
													<ul class="sub-menu">
														<li><a href="#">Nodular Lymphocytic Predominant Hodgkin’s Lymphoma</a></li>
													</ul>
												</li>
												<li class="menu-item-has-children"><a href="#">Haematological Emergencies</a>
													<ul class="sub-menu">
														<li><a href="#">Superior Vana Caval Syndrome</a></li>
														<li><a href="#">Overwhelming Post-Splenectomy Infection</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li class="menu-item-has-children"><a href="<?php echo base_url(); ?>home/category/<?= strtolower(url_title('Manifestation of Disease')) ?>">Manifestation of Disease</a>
											<ul class="sub-menu">
												<li><a href="#">Evaluating Anaemia</a></li>
												<li><a href="#">Types of Bleeding</a></li>
												<li><a href="#">Clinical Features of Megaloblastic Anaemia</a></li>
												<li><a href="#">Clinical Features of Antiphospholipid Syndromes</a></li>
											</ul>
										</li>
										<li class="menu-item-has-children"><a href="<?php echo base_url(); ?>home/category/<?= strtolower(url_title('Laboratory Tests')) ?>">Laboratory Tests</a>
											<ul class="sub-menu">
												<li><a href="#">ESR</a></li>
												<li class="menu-item-has-children"><a href="#">Haemogram</a>
													<ul class="sub-menu">
														<li><a href="postdetail-numberreview.html">Lymphocytosis in Adults</a></li>
														<li><a href="postdetail-percentagereview.html">Platelet Counts and Platelet Indices</a></li>
													</ul>
												</li>
												<li class="menu-item-has-children"><a href="#">Laboratory Evaluation of Coagulation</a>
													<ul class="sub-menu">
														<li><a href="postdetail-numberreview.html">Activated Partial Thromboplastin Time</a></li>
														<li><a href="<?php echo base_url(); ?>home/view/case-2-thrombocytopenia-due-to-large-platelets">Bleeding Time</a></li>
														<li><a href="postdetail-numberreview.html">Mixing Studies</a></li>
														<li><a href="postdetail-percentagereview.html">Prothrombin Time	</a></li>
													</ul>
												</li>
												<li><a href="#">Reticulocyte Count</a></li>
											</ul>
										</li>
										<li class="menu-item-has-children"><a href="<?php echo base_url(); ?>home/category/<?= strtolower(url_title('Cases And Atlas')) ?>">Cases And Atlas</a>
											<ul class="sub-menu">
												<li class="menu-item-has-children"><a href="#">Haematology Atlas</a>
													<ul class="sub-menu">
														<li><a href="postdetail-numberreview.html">Haematopathology</a></li>
														<li><a href="postdetail-percentagereview.html">Radiology</a></li>
														<li><a href="postdetail-percentagereview.html">Clinical Manifestations</a></li>
													</ul>
												</li>
												<li class="menu-item-has-children"><a href="#">Cases</a>
													<ul class="sub-menu">
														<li class="menu-item-has-children"><a href="postdetail-numberreview.html">Anaemia</a>
															<ul class="sub-menu">
																<li><a href="postdetail-numberreview.html">Severe Microcytic Anaemia</a></li>
																<li><a href="postdetail-numberreview.html">Anaemia with Thrombocytosis</a></li>
																<li><a href="postdetail-numberreview.html">Anaemia with Hyperbilirubinaemia</a></li>
															</ul>
														</li>
														<li class="menu-item-has-children"><a href="postdetail-percentagereview.html">Platelet and Coagulation</a>
															<ul class="sub-menu">
																<li><a href="postdetail-numberreview.html">Thrombocytopenia Due to Large Platelets</a></li>
															</ul>
														</li>
													</ul>
												</li>
											</ul>
										</li>
										<li></li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!--************************************
				Header End
		*************************************-->