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
        <!-- Single pro tab start-->
        <div class="single-product-tab-area mg-b-30">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                <li><a href="#liaison"><i class="icon nalika-edit" aria-hidden="true"></i>Liaisons</a></li>
                                    <li class="active"><a href="#ajout"><i class="icon nalika-edit" aria="true"></i>Ajouter une liaison</a></li>
                                    <li><a href="#INFORMATION"><i class="icon nalika-chat" aria-hidden="true"></i> Review</a></li>
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
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="button" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
														</button>
                                                    <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Discard
														</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Onglet ajouter liaison -->
                                    <div class="product-tab-list tab-pane fade active in" id="ajout">
                                    <form method="POST" action="#ajout" name="validationSecteur">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                <!-- Choix du secteur -->
                                                    <!-- <select name="secteur" class="form-control pro-edt-select form-control-primary">
<?php /* 
echo "<option value='".NULL."'>Veuillez choisir un secteur</option>";
    while($ajoutSecteur = $reqAjoutSecteur->fetch()) {                                            
        echo "<option value='".$ajoutSecteur['id']."'>".$ajoutSecteur['nom']."</option>";
    } */
?> -->
<!--                                                     </select>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Distance" name="distance">
                                                    </div>
                                                </div>
                                            </div> -->
<!-- Verification si le secteur à ete choisis + affichage des port qui correspondent à ce secteur -->
<?php
if(!isset($_POST['validationSecteur'])){
echo '<select name="secteur" class="form-control pro-edt-select form-control-primary">
        <option value="'.NULL.'">Veuillez choisir un secteur</option>';
        while($ajoutSecteur = $reqAjoutSecteur->fetch()) {                                            
            echo "<option value='".$ajoutSecteur['code']."'>".$ajoutSecteur['nom']."</option>";
        }
echo '</select>
<div class="input-group mg-b-pro-edt">
    <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
    <input type="text" class="form-control" placeholder="Distance" name="distance">
</div>
</div>
</div>';

echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="review-content-section">
        <!-- Choix du port de depart -->
        <select name="portDep" class="form-control pro-edt-select form-control-primary">
            <option value="NULL">Veuillez choisir un secteur</option>
        </select>
        <!-- Choix du port d\'arrivee -->
            <select name="portArr" class="form-control pro-edt-select form-control-primary">
                <option value="NULL">Veuillez choisir un secteur</option>
            </select>
    </div>';
} else {
$secteur = $_POST['secteur'];
$reqNomSecteur = $bdd->prepare("SELECT nom FROM secteur WHERE code =".$secteur);
$reqNomSecteur->execute();
$resultNomSecteur = $reqNomSecteur->fetch();
$reqAjoutPortDep = $bdd->prepare("SELECT id, nom FROM port WHERE secteur =".$secteur);
$reqAjoutPortDep->execute();
$reqAjoutPortArr = $bdd->prepare("SELECT id, nom FROM port WHERE secteur =".$secteur);
$reqAjoutPortArr->execute();

    echo '<select name="secteur" class="form-control pro-edt-select form-control-primary">
        <option selected value="'.$secteur.'">'.$resultNomSecteur['nom'].'</option>';
            while($ajoutSecteur = $reqAjoutSecteur->fetch()) {                                            
                echo "<option value='".$ajoutSecteur['code']."'>".$ajoutSecteur['nom']."</option>";
            }
    echo '</select>
    <div class="input-group mg-b-pro-edt">
        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
        <input type="text" class="form-control" placeholder="Distance" name="distance">
    </div>
    </div>
    </div>';

// Choix du port de depart
echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="review-content-section">            
            <select name="portDep" class="form-control pro-edt-select form-control-primary">';
            if(isset($_POST['validationSecteur'])){
                while($ajoutPortDep = $reqAjoutPortDep->fetch()) {                                            
                    echo "<option value='".$ajoutPortDep['id']."'>".$ajoutPortDep['nom']."</option>";
                }
            } else {
                echo "<option value='".$secteur."'>".$ajoutPortDep['nom']."</option>";
            }
//Choix du port d'arrivee
            echo '</select>
                <select name="portArr" class="form-control pro-edt-select form-control-primary">';
                while($ajoutPortArr = $reqAjoutPortArr->fetch()) {                                            
                    echo "<option value='".$ajoutPortArr['id']."'>".$ajoutPortArr['nom']."</option>";
                }
            echo '</select>
            </div>
        </div>';
        if(isset($_POST['formAjoutLiaison'])){
            $reqAjout = $bdd->prepare("INSERT INTO liaison (code, distance, idSecteur, portArr, portDep) VALUES (NULL, '".$_POST['distance']."', '".$_POST['formAjoutLiaison']."', '".$_POST['portArr']."', '".$_POST['portDep']."');");
            $reqAjout->execute();
        }
}
?>
                                            

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="button" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
														</button>
                                                        <input type="submit" name="validationSecteur" class="btn btn-ctl-bt waves-effect waves-light m-r-10" value="Valider le secteur">
<?php
    if(isset($_POST['validationSecteur'])){  
        echo '<input type="submit" name="formAjoutLiaison" class="btn btn-ctl-bt waves-effect waves-light m-r-10" value="Ajouter la liaison">';
    }                                                      
?>             
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="card-block">
                                                        <div class="text-muted f-w-400">
                                                            <p>No reviews yet.</p>
                                                        </div>
                                                        <div class="m-t-10">
                                                            <div class="txt-primary f-18 f-w-600">
                                                                <p>Your Rating</p>
                                                            </div>
                                                            <div class="stars stars-example-css detail-stars">
                                                                <div class="review-rating">
                                                                    <fieldset class="rating">
                                                                        <input type="radio" id="star5" name="rating" value="5">
                                                                        <label class="full" for="star5"></label>
                                                                        <input type="radio" id="star4half" name="rating" value="4 and a half">
                                                                        <label class="half" for="star4half"></label>
                                                                        <input type="radio" id="star4" name="rating" value="4">
                                                                        <label class="full" for="star4"></label>
                                                                        <input type="radio" id="star3half" name="rating" value="3 and a half">
                                                                        <label class="half" for="star3half"></label>
                                                                        <input type="radio" id="star3" name="rating" value="3">
                                                                        <label class="full" for="star3"></label>
                                                                        <input type="radio" id="star2half" name="rating" value="2 and a half">
                                                                        <label class="half" for="star2half"></label>
                                                                        <input type="radio" id="star2" name="rating" value="2">
                                                                        <label class="full" for="star2"></label>
                                                                        <input type="radio" id="star1half" name="rating" value="1 and a half">
                                                                        <label class="half" for="star1half"></label>
                                                                        <input type="radio" id="star1" name="rating" value="1">
                                                                        <label class="full" for="star1"></label>
                                                                        <input type="radio" id="starhalf" name="rating" value="half">
                                                                        <label class="half" for="starhalf"></label>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                        </div>
                                                        <div class="input-group mg-b-15 mg-t-15">
                                                            <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" placeholder="User Name">
                                                        </div>
                                                        <div class="input-group mg-b-15">
                                                            <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" placeholder="Last Name">
                                                        </div>
                                                        <div class="input-group mg-b-15">
                                                            <span class="input-group-addon"><i class="icon nalika-mail" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" placeholder="Email">
                                                        </div>
                                                        <div class="form-group review-pro-edt mg-b-0-pt">
                                                            <button type="submit" class="btn btn-ctl-bt waves-effect waves-light">Submit
																</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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