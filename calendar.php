<?php
		$bdd = new PDO('mysql:host=127.0.0.1;dbname=marieteam', 'marieteam', 'marieteam');

    //requete pour affichage des differentes liaisons
    $reqAffich = $bdd->prepare("SELECT secteur.nom nomSecteur, P1.nom portArr, P2.nom portDep, liaison.code idLiaison, liaison.distance 
    FROM liaison, secteur, port P1, port P2
    WHERE liaison.idSecteur = secteur.code
    AND liaison.portArr = P1.id
    AND liaison.portDep = P2.id
    ORDER BY nomSecteur ASC");
    $reqAffich->execute();


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