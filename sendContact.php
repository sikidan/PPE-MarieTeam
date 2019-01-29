<?php
//Permet de démarrer une session visiteur
session_start();

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
    $passage_ligne = "\r\n";
}
else {
    $passage_ligne = "\n";
}

//Déclaration du message
$message_texte = $_POST['message'];

//Création d'un boundary
$boundary = "-----=".md5(rand());

//Création d'un sujet
$sujet = $_POST['sujet'];

//Création du header de l'email
$header = 'From: \"Client\"<'$_POST['email']'>'.$passage_ligne;
$header.= "Reply-to: \"MarieTeam\" <marieteam.contact@gmail.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

//Création du message
$message = $passage_ligne."--".$boundary.$passage_ligne;

//Ajout du message
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

//Envoi de l'email
mail($mail,$sujet,$message,$header);

?>