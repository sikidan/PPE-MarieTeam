<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contact - MarieTeam</title>
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
                                    <h3 class="title">Vous souhaitez nous contacter ?</h3>	                                    				
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		</aside>

<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Formulaire de contact</h3>
						<form action="#">
							<div class="row form-group">
								<div class="col-md-6 padding-bottom">
									<label for="prenom">Prénom</label>
									<input type="text" id="prenom" class="form-control" placeholder="Votre prénom">
								</div>
								<div class="col-md-6">
									<label for="nom">Nom</label>
									<input type="text" id="nom" class="form-control" placeholder="Votre nom">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Email</label>
									<input type="text" id="email" class="form-control" placeholder="Votre adresse mail">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="sujet">Sujet</label>
									<input type="text" id="sujet" class="form-control" placeholder="Le sujet de votre message">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="message">Message</label>
									<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Que voullez vous nous dire ?"></textarea>
								</div>
							</div>
							<div class="form-group text-center">
								<input type="submit" value="Envoyer" class="btn btn-primary">
							</div>

						</form>		
					</div>
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3>Information de contact</h3>
						<div class="row contact-info-wrap">
							<div class="col-md-5">
								<p><span><i class="icon-location"></i></span> 5 Avenue Anatole France, <br> Champ de Mars -  Paris 75000</p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span> <a href="tel://0600000000">+ 06.00.00.00.00</a></p>
							</div>
							<div class="col-md-4">
								<p><span><i class="icon-paperplane"></i></span> <a href="mailto:marieteam.contact@gmail.com">marieteam.contact@gmail.com</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

         <!-- appel du footer -->                                           
            <?php
            include("footer.php");
            ?>

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

