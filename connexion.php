<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=marieteam', 'marieteam', 'marieteam');

if(isset($_POST['formInscription'])) {
   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['prenom']);
   $telephone = htmlspecialchars($_POST['telephone']);
   $dateNaiss = ($_POST['annee'])."-".($_POST['mois'])."-".($_POST['jours']);
   $dateNaiss = htmlspecialchars($dateNaiss);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $adresse = htmlspecialchars($_POST['adresse']);
   $CP = htmlspecialchars($_POST['CP']);
   $ville = htmlspecialchars($_POST['ville']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   $regex = '`[0-9]{10}`';
   if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['telephone']) AND !empty($_POST['dateNaiss']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['adresse']) AND !empty($_POST['CP']) AND !empty($_POST['ville']) AND !empty($_POST['mdp'])) {
      $pseudolength = strlen($nom);
      if($pseudolength <= 255) {		 	 
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM client WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                    $insertmbr = $bdd->prepare('INSERT INTO client(nom, prenom, telephone, dateNaiss, mail, adresse, CP, ville, nbPoints, MotDePasse) VALUES(\''.$nom.'\',\''.$prenom.'\',\''.$telephone.'\',\''.$dateNaiss.'\',\''.$mail.'\',\''.$adresse.'\',\''.$CP.'\',\''.$ville.'\',\'0\',\''.$mdp.'\')');
					$insertmbr = $insertmbr->execute(array('INSERT INTO client(nom, prenom, telephone, dateNaiss, adresse, CP, ville, nbPoints, MotDePasse) VALUES(\''.$nom.'\',\''.$prenom.'\',\''.$telephone.'\',\''.$dateNaiss.'\',\''.$mail.'\',\''.$adresse.'\',\''.$CP.'\',\''.$ville.'\',\'0\',\''.$mdp.'\')'));
                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
	  } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM client WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['nom'];
         $_SESSION['mail'] = $userinfo['mail'];
		 if($mailconnect == "marieteam.contact@gmail.com") {
			header("Location: admin/index.php"); 
		 } else {
			header("Location: profil.php?id=".$_SESSION['id']); 
		 }         
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Connexion/Inscription - MarieTeam</title>
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
			<!--<div class="flexslider-loginPage">
				<ul class="slides-loginPage">
			   	<li style="background-image: url(images/login-1.jpg);">
			   		<div class="overlay-loginPage"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   		</div>
			   		</div>
			   	</li>			
			  	</ul>
              </div>-->
            <div id="colorlib-intro" class="intro-img" style="background-image: url(images/cover-img-1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 animate-box">
						<div class="intro-desc">
							<div class="text-salebox">								
								<div class="text-rights">
                                    <h3 class="title">Vous avez un compte chez nous ? Connectez-vous !</h3>	
                                    <p>Vous n'avez pas encore de compte ? Inscrivez-vous pour profitez de nos avantages clients !</p>								
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		</aside>

		<div class="colorlib-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="wrap-division">
								<div class="col-md-6 col-sm-6 animate-box">
									<div class="hotel-entry">										
										<div class="desc">
											<h3><p>Connexion</p></h3>
                                            <form method="POST" action="">
                                            <table>
                                                <tr>
                                                	<div class="col-md-2">
				                  						<div class="form-group">
                                                			<td>Votre email :</td>
                                                			<td><input type="email" name="mailconnect" placeholder="Mail" /><br /></td>
                                                		</div>
                                                	</div>
                                                </tr>
                                                <tr>
                                                <td>Votre mot de passe :</td>
                                                <td><input type="password" name="mdpconnect" placeholder="Mot de passe" /></td>
                                                </tr>
                                            </table> <br>
                                                <input type="submit" name="formconnexion" value="Se connecter !" />
                                                                                       
										</div>
									</div>
								</div>

								<div class="col-md-6 col-sm-6 animate-box">
									<div class="hotel-entry">
										
										<div class="desc">
											<h3><p>Inscription</p></h3>
                                            <form method="POST" action="">
<table>
                                                <tr>
                                                <td>Votre nom :</td>
                                                <td><input type="text" name="nom" placeholder="Nom" /><br /></td>
                                                </tr>
                                                <tr>
                                                <td>Votre prénom :</td>
                                                <td><input type="text" name="prenom" placeholder="Prénom" /><br /></td>
                                                </tr>
                                                <tr>
                                                <td>Votre téléphone :</td>
                                                <td><input type="tel" pattern="[0-9]{10}" name="telephone" placeholder="Téléphone" /><br /></td>
                                                </tr>
                                                <tr>
                                                <td>Votre email :</td>
                                                <td><input type="email" name="mail" placeholder="Mail" /><br /></td>
                                                </tr>
												<tr>
                                                <td>Confirmer votre email :</td>
                                                <td><input type="email" name="mail2" placeholder="Confirmation du mail" /><br /></td>
                                                </tr>
                                                <tr>
                                                <td>Votre date de naissance :</td>
                                                <td>
                                                <?php
                                                // Select pour jour
                                                    echo "<select name=\"jours\">";
                                                    for ($jour = 1; $jour <= 31; $jour++) {                                                        
                                                        echo "<option value=".$jour.">".$jour."</option>";
                                                        }                                                                                                           
                                                    echo "</select>";
                                                ?>
                                                <select name="mois">
                                                    <option value="01">Janvier</option>
                                                    <option value="02">Février</option>
                                                    <option value="03">Mars</option>
                                                    <option value="04">Avril</option>
                                                    <option value="05">Mai</option>
                                                    <option value="06">Juin</option>
                                                    <option value="07">Juillet</option>
                                                    <option value="08">Août</option>
                                                    <option value="09">Septembre</option>
                                                    <option value="10">Octobre</option>
                                                    <option value="11">Novembre</option>
                                                    <option value="12">Décembre</option>
                                                </select> 
												
												<?php
                                                // Select pour année
                                                echo "<select name=\"annee\">";
                                                echo "<option selected=\"selected\" value=".date('Y').">".date('Y')."</option>";
                                                for ($annee = date('Y')-1; $annee >= 1950; $annee--) {                                                        
                                                    echo "<option value=".$annee.">".$annee."</option>";
                                                    }
                                                                                                                                                             
                                                echo "</select>";
                                                ?>                                                
                                                </td>                                                
                                                </tr>
                                                <tr>
                                                <td>Votre adresse :</td>
                                                <td><input type="text" name="adresse" placeholder="Adresse" /><br /></td>
                                                </tr>
                                                <tr>
                                                <td>Votre code postal :</td>
                                                <td><input type="text" name="CP" placeholder="Code postal" /><br /></td>
                                                </tr>
                                                <tr>
                                                <td>Votre ville :</td>
                                                <td><input type="text" name="ville" placeholder="Ville" /><br /></td>
                                                </tr>
                                                <tr>
                                                <td>Votre mot de passe :</td>
                                                <td><input type="password" name="mdp" placeholder="Mot de passe" /></td>
                                                </tr>
                                                <td>Confirmation du mot de passe :</td>
                                                <td><input type="password" name="mdp2" placeholder="Mot de passe" /></td>
                                                </tr>
                                            </table> <br>
                                                <input type="submit" name="formInscription" value="S'inscrire !" />
                                            </form> 
											<?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
										</div>
									</div>
								</div>



								
							</div>
						</div>
						
					</div>

                    <!-- SIDEBAR-->
                    <?php
                    include("search-bar.php");
                    ?>
					
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

