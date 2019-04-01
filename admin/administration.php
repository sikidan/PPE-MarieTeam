<?php 
session_start();
if (isset($_SESSION['id'])) {

    $bdd = new PDO('mysql:host=127.0.0.1;dbname=marieteam', 'marieteam', 'marieteam');

    //requete pour affichage des differentes liaisons
    $reqAffich = $bdd->prepare("SELECT secteur.nom nomSecteur, P1.nom portArr, P2.nom portDep, liaison.code idLiaison, liaison.distance 
    FROM liaison, secteur, port P1, port P2
    WHERE liaison.idSecteur = secteur.code
    AND liaison.portArr = P1.id
    AND liaison.portDep = P2.id
    ORDER BY nomSecteur ASC");
    $reqAffich->execute();
    $affichage = $reqAffich->fetch();
    $reqAffich->execute();

    //requete pour inserer liaison dans la BDD
        $reqAjoutSecteur = $bdd->prepare("SELECT * FROM secteur");
        $reqAjoutSecteur->execute();
        $reqAjoutPortDep = $bdd->prepare("SELECT * FROM port");
		$reqAjoutPortDep->execute();
        $reqAjoutPortArr = $bdd->prepare("SELECT * FROM port");
		$reqAjoutPortArr->execute();
    ?>

    <!doctype html>
    <html class="no-js" lang="fr">
        <title>MarieTeam | Panel d'administration</title>
        <link rel="stylesheet" href="admin.css">
        <!-- appel du header + bar de gauche --> 
        <?php
            include("include/head-global.php");
        ?>
            <!-- debut page hors menu -->  
            <div class="single-product-tab-area mg-b-30">
                <div class="single-pro-review-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="review-tab-pro-inner">
                                    <ul id="myTab3" class="tab-review-design">
                                        <li class="active"><a href="#ajout"><i class="icon nalika-edit" aria="true"></i>Ajouter une liaison</a></li>
                                        <li><a href="#liaison"><i class="icon nalika-edit" aria-hidden="true"></i>Liaisons</a></li>                                        
                                    </ul>
                                    <div id="myTabContent" class="tab-content custom-product-edit">
                                        <div class="product-tab-list tab-pane fade in" id="liaison">
                                            <div class="row">
                                                <table id="t01">
                                                    <tr>
                                                        <th rowspan=2>Secteur</th>
                                                        <th colspan=4 style="padding:0px;">Liaison</th> 
                                                        <tr>
                                                            <th style="margin:30px;">Code liaison</th>
                                                            <th>Distance en milles marin</th>
                                                            <th>Port de départ</th>
                                                            <th>Port d’arrivée</th>
                                                        </tr>
                                                    </tr>
                                                    <?php
                                                        $last = $affichage['nomSecteur'];
                                                        while($affichage = $reqAffich->fetch()) {                                            
                                                            if ($affichage['nomSecteur'] == $last){
                                                                echo "<tr>";
                                                            }else{                                                
                                                                echo "<tr style='border-top:1px solid black;'>";
                                                            }
                                                                echo "<td>".$affichage['nomSecteur']."</td>
                                                                    <td>".$affichage['idLiaison']."</td>
                                                                    <td>".$affichage['distance']."</td>
                                                                    <td>".$affichage['portDep']."</td>
                                                                    <td>".$affichage['portArr']."</td>
                                                                </tr>";
                                                                $last = $affichage['nomSecteur'];
                                                        } 
                                                    ?>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Onglet ajouter liaison -->
                                        <div class="product-tab-list tab-pane fade active in" id="ajout">
                                        
                                        <form method="POST" action="" name="formAjoutLiaison">
	<form method="POST" action="" name="validationSecteur">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="review-content-section">
					<?php
								echo '<select name="secteur" class="form-control pro-edt-select form-control-primary">
									<option value="'.NULL.'">Veuillez choisir un secteur</option>';
										while($ajoutSecteur = $reqAjoutSecteur->fetch()) {                                            
											echo "<option value='".$ajoutSecteur['code']."'>".$ajoutSecteur['nom']."</option>";
										}
								echo '</select>';
							?>
					<div class="input-group mg-b-pro-edt">
						<span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
						<input type="text" class="form-control" placeholder="Distance" name="distance">
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="review-content-section"> 
							<?php
									// Choix du port de depart
                                    echo '<select name="portDep" class="form-control pro-edt-select form-control-primary">
                                        <option value="'.NULL.'">Veuillez choisir un port de départ</option>';
											while($ajoutPortDep = $reqAjoutPortDep->fetch()) {                                            
												echo "<option value='".$ajoutPortDep['id']."'>".$ajoutPortDep['nom']."</option>";
											}
									echo '</select>';
									//Choix du port d'arrivee
                                    echo '<select name="portArr" class="form-control pro-edt-select form-control-primary">
                                    <option value="'.NULL.'">Veuillez choisir un port d\'arrivée</option>';
											while($ajoutPortArr = $reqAjoutPortArr->fetch()) {                                            
												echo "<option value='".$ajoutPortArr['id']."'>".$ajoutPortArr['nom']."</option>";
											}
									echo '</select>
					</div>
				</div>';
									if(isset($_POST['formAjoutLiaison'])){
                                         $reqCount = $bdd->prepare("SELECT * FROM liaison WHERE idSecteur =".$_POST['secteur']." portArr=".$_POST['portArr']." portDep=".$_POST['portDep']);
										$reqCount->execute();
                                        $liaisonExiste = $reqCount->rowCount();
										if(!empty($_POST['distance'])) {
											if($liaisonExiste == 0) {
												if($_POST['portArr'] != $_POST['portDep']){
													$reqAjout = $bdd->prepare("INSERT INTO liaison (code, distance, idSecteur, portArr, portDep) VALUES (NULL, '".$_POST['distance']."', '".$_POST['secteur']."', '".$_POST['portArr']."', '".$_POST['portDep']."');");
													$reqAjout->execute();
                                                    $erreur = "La liaison à etait ajoutées !";
												}else{
                                                    $erreur = "Les ports de départ et d'arrivé doivent être différents !";
												}
											}else{
                                                $erreur = "La liaison existe déjà !";
											}
										}else{
                                            $erreur = "La distance ne peut être nul !";
										} 
									}
                                
                        
                    
							?>
					

		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="text-center custom-pro-edt-ds">
					<button type="reset" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Annuler</button>
					
					<input type="submit" name="formAjoutLiaison" class="btn btn-ctl-bt waves-effect waves-light m-r-10" value="Ajouter la liaison">         
				</div>
			</div>
		</div>
	
   </form>
<?php 
    if(isset($erreur)) {
	    echo '<br><br><center><font color="grey">'.$erreur.'</font></center>';
    }
?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="footer-copyright-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer-copy-right">
                                    <p>Copyright © 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- jquery
                ============================================ -->
            <script src="js/vendor/jquery-1.12.4.min.js"></script>
            <!-- bootstrap JS
                ============================================ -->
            <script src="js/bootstrap.min.js"></script>
            <!-- wow JS
                ============================================ -->
            <script src="js/wow.min.js"></script>
            <!-- price-slider JS
                ============================================ -->
            <script src="js/jquery-price-slider.js"></script>
            <!-- meanmenu JS
                ============================================ -->
            <script src="js/jquery.meanmenu.js"></script>
            <!-- owl.carousel JS
                ============================================ -->
            <script src="js/owl.carousel.min.js"></script>
            <!-- sticky JS
                ============================================ -->
            <script src="js/jquery.sticky.js"></script>
            <!-- scrollUp JS
                ============================================ -->
            <script src="js/jquery.scrollUp.min.js"></script>
            <!-- mCustomScrollbar JS
                ============================================ -->
            <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
            <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
            <!-- metisMenu JS
                ============================================ -->
            <script src="js/metisMenu/metisMenu.min.js"></script>
            <script src="js/metisMenu/metisMenu-active.js"></script>
            <!-- morrisjs JS
                ============================================ -->
            <script src="js/sparkline/jquery.sparkline.min.js"></script>
            <script src="js/sparkline/jquery.charts-sparkline.js"></script>
            <!-- calendar JS
                ============================================ -->
            <script src="js/calendar/moment.min.js"></script>
            <script src="js/calendar/fullcalendar.min.js"></script>
            <script src="js/calendar/fullcalendar-active.js"></script>
            <!-- tab JS
                ============================================ -->
            <script src="js/tab.js"></script>
            <!-- plugins JS
                ============================================ -->
            <script src="js/plugins.js"></script>
            <!-- main JS
                ============================================ -->
            <script src="js/main.js"></script>
        </body>

    </html>
<?php 
} else {

  header('Location: ..\connexion.php');

}
?>