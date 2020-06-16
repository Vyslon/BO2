<?php

require_once 'Vue/Vue.php';
require_once 'Modele/Compte.php';

class ControleurConnexion {

  public static function connexion($login, $mot_de_passe) {
    $compte = new Compte();
    $id = strtoupper($login);
    $infosCompte = $compte->infosCompte($id);
    $adherentActif = $compte->adherentActif($id);
    if (password_verify($mot_de_passe, $infosCompte['mdp_adh']) && $adherentActif) {
      $_SESSION['id'] = $infosCompte['id_adh'];
      $statut = $compte->statutsAdherent($id);
      $_SESSION['statut'] = $statut;
      $vue = new Vue("Accueil");
      $vue->generer();
    }
    else {
      $vue = new Vue("ConnexionSource");
      $vue->generer();
    }
  }

}
