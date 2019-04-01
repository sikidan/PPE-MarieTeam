<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Réservation - MarieTeam</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />
		<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="css/magnific-popup.css">
		<!-- Flexslider  -->
		<link rel="stylesheet" href="css/flexslider.css">
		<!-- Owl Carousel -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<!-- Date Picker -->
		<link rel="stylesheet" href="css/bootstrap-datepicker.css">
		<!-- Flaticons  -->
		<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
		<!-- Theme style  -->
		<link rel="stylesheet" href="css/style.css">
		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="colorlib-loader"></div>
		<div id="page">
			<!-- Appel de la barre de navigation -->
			<?php
			include("nav-bar.php");
			?>
			<aside id="colorlib-hero-loginPage">
				<div id="colorlib-intro" class="intro-img" style="background-image: url(images/cover-img-1.jpg);" data-stellar-background-ratio="0.5">
					<div class="overlay"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-6 animate-box">
								<div class="intro-desc">
									<div class="text-salebox">
										<div class="text-rights">
											<h3 class="title">Votre réservation</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</aside>
			<div id="colorlib-reservation">
				<!--                 
				<div class="container">
					                     -->
					<div class="row">
						<div class="search-wrap">
							<div class="tab-content">
								<form method="post" action="#" class="colorlib-form">
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label for="portDepart">Port de départ</label>
												<div class="form-field">
													<input type="text" id="portDepart" class="form-control" placeholder="D'ou partez-vous ?">
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="dateDepart">Date de départ</label>
												<div class="form-field">
													<i class="icon icon-calendar2"></i>
													<input type="text" id="datetDepart" class="form-control date" placeholder="Date de départ">
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="adultes">Combien d'adulte(s)</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="adultes" id="adultes" class="form-control">
														<option value="" selected disabled hidden>Choisisez un chiffre</option>
														<option value="#">1</option>
														<option value="#">2</option>
														<option value="#">3</option>
														<option value="#">4</option>
														<option value="#">5+</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="vehicule-3m">Combien de véhicule(s) de moins de 3m</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="vehicule-3m" id="vehicule-3m" class="form-control">
														<option value="" selected disabled hidden>Choisisez un chiffre</option>
														<option value="#">1</option>
														<option value="#">2</option>
														<option value="#">3</option>
														<option value="#">4</option>
														<option value="#">5+</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label for="date">Port d'arrivée</label>
												<div class="form-field">
													<input type="text" id="location" class="form-control" placeholder="Ou allez-vous ?">
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<label for="date">Date d'arrivée</label>
												<div class="form-field">
													<i class="icon icon-calendar2"></i>
													<input type="text" id="date" class="form-control date" placeholder="Date d'arrivée">
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="ados">Combien d'adolescent(s)</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="ados" id="ados" class="form-control">
														<option value="" selected disabled hidden>Choisisez un chiffre</option>
														<option value="#">0</option>
														<option value="#">1</option>
														<option value="#">2</option>
														<option value="#">3</option>
														<option value="#">4</option>
														<option value="#">5+</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="vehicule+3m">Combien de véhicule(s) de plus de 3m</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="vehicule+3m" id="vehicule+3m" class="form-control">
														<option value="" selected disabled hidden>Choisisez un chiffre</option>
														<option value="#">1</option>
														<option value="#">2</option>
														<option value="#">3</option>
														<option value="#">4</option>
														<option value="#">5+</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group"></div>
										</div>
										<div class="col-md-2">
											<div class="form-group"></div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="enfants">Combien d'enfant(s)</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="enfants" id="enfants" class="form-control">
														<option value="" selected disabled hidden>Choisisez un chiffre</option>
														<option value="#">0</option>
														<option value="#">1</option>
														<option value="#">2</option>
														<option value="#">3</option>
														<option value="#">4</option>
														<option value="#">5+</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<input type="submit" name="submit" id="submit" value="Rechercher" class="btn btn-primary btn-block">
										</div>
									</div>
									<div class="row"></div>
									<div class="row"></div>
									<form method="post" action="#" class="colorlib-form">
										<table width="100%">
										<div >
											<tr>
												<th style="text-align:center">
													Traversée précedente
												</th>
												<th style="text-align:center">
													Votre traversée
												</th>
												<th style="text-align:center">
													Traversée suivante
												</th>
											</tr>
											<tr>
												<td style="text-align:center">
													Tarif de traversée précedente
												</td>
												<td style="text-align:center">
													Tarif de traversée en cours
												</td>
												<td style="text-align:center">
													Tarif de traversée suivante
												</td>
											</tr></div>
											<tr >
												<td>
													<div class="col-md-12">
														<input type="submit" name="submit" id="submit" value="Réserver cette traversée" class="btn btn-primary btn-block">
													</div>
												</div>
											</td>
											<td>
											<div class="col-md-12">
														<input type="submit" name="submit" id="submit" value="Réserver cette traversée" class="btn btn-primary btn-block">
													</div>
											</td>
											<td>
											<div class="col-md-12">
														<input type="submit" name="submit" id="submit" value="Réserver cette traversée" class="btn btn-primary btn-block">
													</div>
											</td>
										</tr>
									
								</table>
								</form></div>
								<!-- appel du footer -->
								<?php                                            include("footer.php");                                        ?>
							</div>
							<div class="gototop js-top">
								<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
							</div>
							<!-- jQuery -->
							<script src="js/jquery.min.js"></script>
							<!-- jQuery Easing -->
							<script src="js/jquery.easing.1.3.js"></script>
							<!-- Bootstrap -->
							<script src="js/bootstrap.min.js"></script>
							<!-- Waypoints -->
							<script src="js/jquery.waypoints.min.js"></script>
							<!-- Flexslider -->
							<script src="js/jquery.flexslider-min.js"></script>
							<!-- Owl carousel -->
							<script src="js/owl.carousel.min.js"></script>
							<!-- Magnific Popup -->
							<script src="js/jquery.magnific-popup.min.js"></script>
							<script src="js/magnific-popup-options.js"></script>
							<!-- Date Picker -->
							<script src="js/bootstrap-datepicker.js"></script>
							<!-- Stellar Parallax -->
							<script src="js/jquery.stellar.min.js"></script>
							<!-- Main -->
							<script src="js/main.js"></script>
						</body>
					</html>

