<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.php">MarieTeam</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
						<?php $page = basename($_SERVER['PHP_SELF']); ?>
							<ul>
							<li class="<?php if($page == 'index.php'){ echo ' active"';}?>"><a href="index.php" >Accueil</a></li>
								<li class="has-dropdown" class="<?php if($page == 'offres.php'){ echo ' active"';}?>">
									<a href="offres.php">Nos offres</a>
									<ul class="dropdown">
										<li><a href="#">Promotions</a></li>
										<li><a href="#">Transport de marchandises</a></li>
										<li><a href="#">Transport de véhicules</a></li>
										<li><a href="#">Transport de passagers</a></li>
									</ul>
								</li>
								<li class="<?php if($page == 'tarif.php'){ echo ' active"';}?>"><a href="tarif.php" >Tarif</a></li>
								<li class="<?php if($page == 'reservationVoyageur.php'){ echo ' active';}?>"><a href="reservationVoyageur.php" >Réservation</a></li>
								<li class="<?php if($page == 'connexion.php'){ echo ' active"';}?>"><a href="connexion.php" >Connexion/Inscription</a></li>
								<li class="<?php if($page == 'contact.php'){ echo ' active"';}?>"><a href="contact.php" >Contact</a></li> 								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>