<?php
//Permet de démarrer une session visiteur
session_start();
    $errors = array(); //Création d'une vérification des champs
if(!array_key_exists('nom', $_POST) || $_POST['nom'] == '') { //Verification de l'existence du champ
    $errors ['nom'] = "Vous n'avez pas renseigné votre nom";
}
if(!array_key_exists('prenom', $_POST) || $_POST['prenom'] == '') { //Verification de l'existence du champ
    $errors ['prenom'] = "Vous n'avez pas renseigné votre prénom";
}
if(!array_key_exists('email', $_POST) || $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { //On vérifie l'existence
    $errors ['mail'] = "Vous n'avez pas renseigné votre email";
}
if(!array_key_exists('sujet', $_POST) || $_POST['sujet'] == '') { //Verification de l'existence du champ
    $errors ['sujet'] = "Vous n'avez pas renseigné de sujet";
}
if(!array_key_exists('message', $_POST) || $_POST['message'] == '') { //Verification de l'existence du champ
    $errors ['message'] = "Vous n'avez pas renseigné votre message";
}

//Verification des infos transmises lors de la vérification
if(!empty($errors)){ // si erreur on renvoie vers la page précédente
  $_SESSION['errors'] = $errors;//on stocke les erreurs
  $_SESSION['inputs'] = $_POST;
  header('Location: contact.php');
  }else{
  $_SESSION['success'] = 1;
  
    $from = $_POST['email'];
    
    $to = 'marieteam.contact@gmail.com';
        
    $subject = $_POST['sujet'];
        
    $message = $_POST['message'];
    
    $headers = "From:" . $from;
    
    mail($to, $subject, $message, $headers);
  }
?>