	<!-- appel du header -->
    <?php
        include("header.php");
    ?>
	<body>
		<!--[if lt IE 8]>
		<p class="browserupgrade">
			You are using an 
			<strong>outdated</strong>
			 browser. Please 
			<a href="http://browsehappy.com/">upgrade your browser</a>
			 to improve your experience.
		</p>
		<![endif]-->
		<div class="left-sidebar-pro">
			<nav id="sidebar" class="">
				<div class="sidebar-header">
					<a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
					<strong><img src="img/logo/logosn.png" alt="" /></strong>
				</div>
				<div class="nalika-profile">
					<div class="profile-dtl">
						<a href="#"><img src="img/notification/4.jpg" alt="" /></a>
						<h2>Administrateur <span class="min-dtn">MarieTeam</span></h2>
					</div>
				</div>
				<!-- appel de la barre de navigation -->
                <?php
                    include("left-bar.php");
                ?>
				<!-- Start Welcome area -->
				<div class="all-content-wrapper">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="logo-pro">
									<a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
								</div>
							</div>
						</div>
					</div>
					<div class="header-advance-area">
						<div class="header-top-area">
							<div class="container-fluid">
								<!-- appel de la barre de menu (message+info utilisateur) -->
                                <?php
                                    include("menu-bar.php");
                                ?>
							</div>
						</div>
					</div>
