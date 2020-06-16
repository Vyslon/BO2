<?php

require_once 'Vue/Vue.php';
require_once 'Modele/Compte.php';

class ControleurInscription  {

  public static function inscription($nom, $prenom, $date_naissance, $statut, $datefincertifmed, $estresponsablemateriel, $estresponsableplanning, $adresse, $numero_telephone) {
    $nom = trim($nom);
    $nom = str_replace(" ", "_", $nom);
    $compte = new Compte();
    $login = strtolower($prenom[0]) . strtolower($nom);
    $date = explode("-", $date_naissance);
    $mot_de_passe =  $date[2] . $date[1] . $date[0];
    $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $date_naissance = $date[0] . '-' . $date[1] . '-' . $date[2];
    $date = explode("-", $datefincertifmed);
    $datefincertifmed = $date[0] . '-' . $date[1] . '-' . $date[2];
    $inscription = $compte->creerCompte($nom, $prenom, $date_naissance, $datefincertifmed, $login, $mot_de_passe, $statut, $estresponsablemateriel, $estresponsableplanning, $adresse, $numero_telephone);
    if ($inscription) {
      $vue = new Vue("Accueil");
      $vue->generer();
    }
    else {
      $vue = new Vue("InscriptionSource");
      $vue->generer();
    }
  }
}
