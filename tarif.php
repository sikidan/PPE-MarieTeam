<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=marieteam', 'marieteam', 'marieteam');

$reqAffich = $bdd->prepare("SELECT secteur.nom nomSecteur, P1.nom portArr, P2.nom portDep, liaison.code idLiaison, liaison.distance 
       FROM liaison, secteur, port P1, port P2
       WHERE liaison.idSecteur = secteur.code
       AND liaison.portArr = P1.id
       AND liaison.portDep = P2.id
       ORDER BY nomSecteur ASC");
       $reqAffich->execute();
       $affichage = $reqAffich->fetch();
       $reqAffich->execute();
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Tarifs - MarieTeam</title>
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
											<h3 class="title">Nos tarifs</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</aside>
			<div id="colorlib-reservation">
				<!-- Corps de la page -->
            <div id="colorlib-tarif">
                <div class="container">
                    <div class="search-wrap">
                        <div class="tab-content">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="liaisonBlock">
                                        <label class="lblLiaison" for="tableTarif">Liaisons :</label>
                                        <div class="form-field">
                                                <?php
                                                echo '<select name="secteur" class="form-control pro-edt-select form-control-primary">
                                                <option value="'.NULL.'">Veuillez choisir un secteur</option>';
                                                $liaisonPrec = $liaisonReq['nomSecteur'];
                                                    while($liaisonReq = $reqAffich->fetch()) {     
                                                        if($liaisonPrec == $liaisonReq['nomSecteur']){
                                                            echo "<option value='".$liaisonReq['idLiaison']."'>".$liaisonReq['portDep']." - ".$liaisonReq['portArr']."</option>";

                                                        }else{
                                                            echo "<option disabled value='NULL'>".$liaisonReq['nomSecteur']."</option>";
                                                            echo "<option value='".$liaisonReq['idLiaison']."'>".$liaisonReq['portDep']." - ".$liaisonReq['portArr']."</option>";
                                                        }
                                                        $liaisonPrec = $liaisonReq['nomSecteur'];
                                                    }
                                                echo '</select>';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="dateBlock">
                                        <label class="lblDate" for="tableTarif">Date :</label>
                                        <div class="form-field">
                                            <?php
                                            echo '<input type="date" id="dateDepart" class="form-control" placeholder="Date de départ">';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="buttonBlock">
                                        <?php
                                        echo '<input type="submit" value="Afficher les tarifs" id="btnAfficher" name="btnAfficher" class="form-control">';
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="ResultBlock">
                                        <!-- <label class="lblResult"><?php echo htmlspecialchars($_POST['nomSecteur']); ?></label> -->
                                    </div>
                                </div>
                            </div>
                            
                            <table class="table table-dark">
                                <thead>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 3</td>
                                        <td>Cell 4</td>
                                    </tr>
                                    <tr>
                                        <td>Cell 1</td>
                                        <td>Cell 2</td>
                                        <td>Cell 3</td>
                                        <td>Cell 4</td>
                                    </tr>
                                </tbody>
                            </table>
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
